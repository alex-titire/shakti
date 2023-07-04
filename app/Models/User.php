<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Billable, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'last_name',
        'baptism_name',
        'gender',
        'yoga_year',
        'city',
        'dob',
        'phone',
        'aza',
        'yoga_attendance',
        'is_instructor',
        'is_in_ashram',
        'language',
        'newsletter',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'dob' => 'date',
        'is_instructor' => 'boolean',
        'is_in_ashram' => 'boolean',
        'newsletter' => 'boolean',
    ];

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

    public function updateDetails($data) {

        $this->fill([
            'first_name' => Str::upper($data->first_name),
            'last_name' => Str::upper($data->last_name),
            'baptism_name' => strlen(trim($data->baptism_name)) ? Str::upper($data->baptism_name) : '',
            'name' => Str::title($data->baptism_name ?? $data->first_name) .' '. Str::title($data->last_name),
            'gender' => Str::upper($data->gender),
            'yoga_year' => (int) $data->group > 0 ? Carbon::now()->year - (Carbon::now()->month < 9 ? $data->group : $data->group - 1) : null,
            'city' => Str::upper($data->city),
            'dob' => $data->dob_year ."-". $data->dob_month ."-". $data->dob_day,
            'phone' => $data->phone,
            'email' => $data->email,
            'aza' => (int) $data->aza,
            'yoga_attendance' => Str::upper($data->student),
            'is_instructor' => (int) (bool) $data->is_instructor,
            'is_in_ashram' => (int) (bool) $data->is_in_ashram,
            'language' => $data->language,
        ]);

        $this->save();
    }
}
