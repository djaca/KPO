<?php

namespace KPO;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['taxpayer_id', 'description', 'date', 'product_value', 'service_value'];

    protected $casts = [
        'date' => 'date'
    ];

    public function taxpayer()
    {
        return $this->belongsTo(Taxpayer::class);
    }

    protected static function boot()
    {
        parent::boot();

        $events = collect(['saved', 'updated', 'deleted']);

        $events->each(function ($event) {
            static::$event(function ($model) {
                cache()->flush();
            });
        });
    }
}
