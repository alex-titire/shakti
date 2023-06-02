<?php

namespace App\Models;

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

//    /**
//     * Get the human readable is instructor attribute
//     *
//     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
//     */
//    protected function isInstructor(): Attribute
//    {
//        return Attribute::make(
//            get: fn ($value) => $value ? 'Yes' : 'No'
//        );
//    }
//
//    /**
//     * Get the human readable is in ashram attribute
//     *
//     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
//     */
//    protected function isInAshram(): Attribute
//    {
//        return Attribute::make(
//            get: fn ($value) => $value ? 'Yes' : 'No'
//        );
//    }

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

    public function getPaymentLink() {

        switch ($this->price / 100) {

            case 45 :
                $link = 'https://mpy.ro/fxpkbpev';
                break;
                
            case 65 :
                $link = 'https://mpy.ro/fxpkbnev';
                break;

            case 90 :
                $link = 'https://mpy.ro/fxpkbmev';
                break;
            
            case 150 :
                $link = 'https://mpy.ro/fxpkbkev';
                break;

            case 175 :
                $link = 'https://mpy.ro/fxpkbjev';
                break;
                
                
                
            case 205:
                $link = 'https://mpy.ro/fxpkbjev';
                break;
                
            case 180: 
                $link = 'https://mpy.ro/fxpkbkev';
                break;
                
            case 100: 
                $link = 'https://mpy.ro/fxpkbmev';
                break;
                
            case 75: 
                $link = 'https://mpy.ro/fxpkbnev';
                break;
                
            case 55:
                $link = 'https://mpy.ro/fxpkbpev';
                break;

            default:
                $link = '';
        }

        return $link;
    }

    public function updateViaPost($request, $new_order = true) {

        $this->fill([
            'first_name' => Str::upper($request->first_name),
            'last_name' => Str::upper($request->last_name),
            'baptism_name' => Str::upper($request->baptism_name),
            'sex' => Str::upper($request->gender),
            'yoga_year' => (int) $request->group,
            'city' => Str::upper($request->city),
            'dob' => $request->dob_year ."-". $request->dob_month ."-". $request->dob_day,
            'phone' => $request->phone,
            'email' => $request->email,
            'aza' => (int) $request->aza,
            'yoga_attendance' => Str::upper($request->student),
            'language' => $request->language,
            'is_instructor' => (int) (bool) $request->is_instructor,
            'is_in_ashram' => (int) (bool) $request->is_in_ashram,
            'attendance' => $request->attending,
            'price' => $request->price,
            'currency' => $request->currency ?? (strtolower($request->student) == "en" ? 'EUR' : 'RON'),
            'payment' => $request->payment,
            'order_status_id' => $request->order_status_id ?? ($this->order_status_id ?? OrderStatus::where('key', '=', 'new')->first()->id),
            'comments' => $request->comments ?? $this->comments,
            'mtv_code' => $request->mtv_code ?? $this->mtv_code
        ]);

        $this->save();

        $this->picture_front = $this->save_image($request, 'picture_front');

        $this->save();

        // todo: check out what is going on here
        /*$update_image = $new_order ? (is_null($this->status) || $this->status->key === 'new') : true;

        if ($request->file('picture_front') && $update_image) {

            $name = Str::slug($request->last_name ." ". $request->first_name, "-");
            $file_face = $this->id ."-". $name .".". $request->file('picture_front')->extension();

            $img = Image::make($request->picture_front)->resize(null, 1500, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $file = "registrations/{$file_face}";
//            if (Storage::exists($file)) {
//                Storage::delete($file);
//            }


            Storage::put($file, (string) $img->encode('jpg', '80'));
            $this->picture_front = $file_face;
            $this->save();
        }*/
    }

    public function save_image(Request $request, $attribute) {

        $img = Image::make($request->$attribute)->resize(null, 1500, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $name = $this->id ."-". Str::slug($request->last_name ." ". $request->first_name, "-");
        $file = "registrations/{$this->event_id}/". $name .".". $request->file($attribute)->extension();

//        $img->save(public_path() ."/". $file, 80);
        Storage::disk('public')->put($file, (string) $img->encode('jpg', '80'));

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
