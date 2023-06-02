<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventCode extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the Event that owns the Code
     */
    public function event() {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the Order that owns the Code
     */
    public function order() {
        return $this->belongsTo(Order::class);
    }
}
