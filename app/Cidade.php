<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{

    protected $fillable = ['cidade', 'estado_id'];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

}
