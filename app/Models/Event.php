<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Event extends Model
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
        'date_start' => 'datetime',
        'date_end' => 'datetime',
        'registration_start' => 'datetime',
        'registration_end' => 'datetime',
        'early_bird_deadline' => 'datetime',
    ];

    /**
     * Get the codes belonging to the Event
     */
    public function codes() {
        return $this->hasMany(EventCode::class);
    }

    /**
     * Get the log belonging to the Event
     */
    public function logs() {
        return $this->hasMany(EventLog::class);
    }

    /**
     * Get the mailing lists belonging to the Event
     */
    public function mailingLists() {
        return $this->belongsToMany(MailingList::class);
    }

    /**
     * Get the pages belonging to the Event
     */
    public function pages() {
        return $this->hasMany(EventPage::class);
    }

    /**
     * Get the terms belonging to the Event
     */
    public function terms() {
        return $this->hasMany(EventTerm::class);
    }

    /**
     * Get the Event Type that owns the Event
     */
    public function eventType() {
        return $this->belongsTo(EventType::class);
    }

    /**
     * Get the Notification for card payments
     */
    public function email_card() {
        return $this->belongsTo(Notification::class, 'email_confirmation_card');
    }

    /**
     * Get the Notification for cash payments
     */
    public function email_cash() {
        return $this->belongsTo(Notification::class, 'email_confirmation_cash');
    }

    /**
     * Get the Notification for bank payments
     */
    public function email_bank() {
        return $this->belongsTo(Notification::class, 'email_confirmation_bank');
    }

    /**
     * Get the translated Title of the Event
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes["title_". App::currentLocale()]
        );
    }

    /**
     * Get the translated Picture Info for the Event
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function pictureInfo(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Str::markdown($attributes["picture_info_". App::currentLocale()])
        );
    }

    /**
     * Calculate a price option based on type, currency and early bird options
     * @param $type - price variant: base, coordinator, in_ashram
     * @param $currency
     * @return int
     */
    public function getPrice($type, $currency) {

        $price_field = "price_". ($type == 'base' ? '' : $type ."_") . $currency;
        $discount_field = "early_bird_value_". $currency;

        if (now() < $this->early_bird_deadline) {
            if ($this->early_bird_type == 'fixed')
                return max(0, $this->$price_field - $this->$discount_field);
            else
                return max(0, $this->$price_field * ((100 - $this->$discount_field) / 100));
        }

        return $this->$price_field;
    }

    public function calculatePrice($data) {

        if ($data->student == "ro") {
            $values = [
                "base" => $this->price_ron,
                "online" => $this->price_online_ron,
                "ashram" => $this->price_ashram_ron,
                "coordinator" => $this->price_coordinator_ron
            ];
            $currency = "ron";
        }
        else {
            $values = [
                "base" => $this->price_eur,
                "online" => $this->price_online_eur,
                "ashram" => $this->price_ashram_eur,
                "coordinator" => $this->price_coordinator_eur
            ];
            $currency = "eur";
        }

        $type = "base";

        if ($data->attending == "online" && $values[$type] > $values['online']) {
            $type = 'online';
        }

        if ($data->is_instructor && $values[$type] > $values['coordinator']) {
            $type = 'coordinator';
        }

        if ($data->is_in_ashram && $values[$type] > $values['ashram']) {
            $type = 'ashram';
        }

        return $this->getPrice($type, $currency);
    }

    /**
     * Fetch a page associated to the event
     * @param string $key
     * @return \App\Models\EventPage
     */
    public function getPage($key) {

        return $this->pages->where('key', '=', $key)->first();
    }
}
