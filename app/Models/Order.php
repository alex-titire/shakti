<?php

namespace App\Models;

use App\Casts\Currency;
use App\Mail\EmailCodeMtvSent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'price' => Currency::class,
        'dob' => 'date',
        'is_instructor' => 'boolean',
        'is_in_ashram' => 'boolean',
        'code_sent_at' => 'datetime',
        'email_confirmation' => 'datetime'
    ];

    /**
     * Get the Event that owns the Order
     */
    public function event() {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the User that owns the Order
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the Status of the Order
     */
    public function order_status() {
        return $this->belongsTo(OrderStatus::class);
    }

    /**
     * Get the day of birth attribute
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function dayOfBirth(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => (int) substr($attributes->dob, 8, 2)
        );
    }

    /**
     * Get the month of birth attribute
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function monthOfBirth(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => (int) substr($attributes->dob, 5, 2)
        );
    }

    /**
     * Get the year of birth attribute
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function yearOfBirth(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => (int) substr($attributes->dob, 0, 4)
        );
    }

    public function save_image(Request $request, $attribute) {

        try {
            $img = Image::make($request->$attribute)->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        catch(\Exception $e) {

            Log::warning('Image could not be processed.', ['id' => $this->id]);

            return false;
        }

        $name = $this->id ."-". Str::slug($request->last_name ." ". $request->first_name, "-");
        $file = "registrations/{$this->event_id}/". $name .".". $request->file($attribute)->extension();

//        $img->save(public_path() ."/". $file, 80);

        try {

            Storage::disk('public')->put($file, (string) $img->encode('jpg', '80'));
        }
        catch(\Exception $e) {

            Log::warning('Image could not be saved.', ['id' => $this->id, 'file' => $file]);
            return false;
        }

        return $file;
    }

    public function send_registration_code() {

        try {
            Mail::to($this->email)->send(new EmailCodeMtvSent($this));
            $this->code_sent_at = date("Y-m-d H:i:s");
            $this->save();

            return true;
        }
        catch (\Exception $e) {
            Log::warning('Email code failed to send.', ['id' => $this->id, 'email' => $this->email]);

            return false;
        }
    }
}
