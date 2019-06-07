<?php

namespace KPO;

use Illuminate\Database\Eloquent\Model;

class Taxpayer extends Model
{
    public $incrementing = false;

    protected $fillable = ['id', 'name', 'place', 'taxpayer_code', 'activity_code'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
