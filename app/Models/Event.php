<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'qty',
        'initial_qty', //Const QTY
        'price',
        'description',
        'location',
        'age',
        'event_type',
        'starts_at',
        'allow_audience',
    ];   
     public function getStartsAtAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d.m.Y');
    }
    protected static function booted()
    {
        // When creating a new event, set initial_qty to the same value as qty
        static::creating(function ($event) {
            $event->initial_qty = $event->qty;
        });

        // When updating an event, update initial_qty if qty is changed
        static::updating(function ($event) {
            $event->initial_qty = $event->qty;
        });
    }

    public function enrollments()
{
    return $this->hasMany(Enrollment::class);
}

}
