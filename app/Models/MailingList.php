<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailingList extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the Events belonging to the List
     */
    public function events() {
        return $this->belongsToMany(Event::class);
    }

    /**
     * Get the Subscribers belonging to the List
     */
    public function subscribers() {
        return $this->belongsToMany(Subscriber::class)->withPivot('last_notification_id', 'status');
    }

    /**
     * Get the Users belonging to the List
     */
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
