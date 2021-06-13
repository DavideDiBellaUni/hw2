<?php


use Illuminate\Database\Eloquent\Model;



class User extends Model
{
    protected $table = 'utente';
    protected $fillable = ['username', 'password', 'email', 'nome', 'cognome','num_articolo'];
    //protected $hidden = 'password';
    public $timestamps = false;
    protected $primaryKey= "username";
    protected $autoIncrement = false;
    protected $keyType = "string";

    public function articolo()
    {
        return $this->hasMany(Articolo::class,'username');
    }

    public function preferiti()
    {
        return $this->hasMany(Preferiti::class,'username');
    }
}
?>