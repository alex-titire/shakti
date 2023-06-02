<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class EventPage extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the Event that owns the Page
     */
    public function event() {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the translated Title of the Event Page
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
     * Get the translated Meta Title of the Event Page
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function metaTitle(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes["meta_title_". App::currentLocale()]
        );
    }

    /**
     * Get the translated Content of the Event Page
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Str::markdown($attributes["content_". App::currentLocale()])
        );
    }

    /**
     * Get the translated URL of the Event Page
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function url(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes["url_". App::currentLocale()]
        );
    }
}
