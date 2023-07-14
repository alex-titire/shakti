<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class Notification extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the translated Subject of the Notification
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function subject(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes["subject_". App::currentLocale()]
        );
    }

    /**
     * Get the translated Content HTML of the Notification
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function contentHtml(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes["content_html_". App::currentLocale()]
        );
    }

    /**
     * Get the translated Content Text of the Notification
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function contentText(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes["content_text_". App::currentLocale()]
        );
    }

    /**
     * Get the Users that belongs the Notification
     */
    public function users(): BelongsToMany {

        return $this->belongsToMany(User::class)
            ->using(NotificationUser::class)
            ->withPivot('sent_time', 'error_time');
    }
}
