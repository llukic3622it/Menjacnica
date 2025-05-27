<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Racun extends Model
{
    protected $table = 'racuni';

    protected $fillable = ['user_id', 'broj_racuna', 'iznos_uplate'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
