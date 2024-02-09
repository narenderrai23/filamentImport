<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['country_code', 'name', 'status'];

    // public function branches(){
    //     return $this->hasMany(Branch::class);
    // }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
