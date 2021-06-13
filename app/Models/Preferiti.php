<?php

use Illuminate\Database\Eloquent\Model;



class Preferiti extends Model
{
    protected $table = 'preferiti';
    protected $fillable = ['cod_articolo', 'username'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function articolo()
    {
        return $this->belongsTo(Articolo::class,'cod_articolo','cod_articolo');
    }
}
?>