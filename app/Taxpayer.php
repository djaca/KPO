<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxpayer extends Model
{
    protected $fillable = ['pib', 'obveznik', 'sediste', 'sifra_poreskog_obveznika', 'sifra_delatnosti'];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
