<?php

use Illuminate\Database\Eloquent\Model;



class Articolo extends Model
{
    protected $table = 'articolo';
    protected $fillable = ['cod_articolo', 'username', 'sezione', 'titolo', 'nomefile','data_pubblicazione'];
    public $timestamps = false;
    protected $primaryKey= "cod_articolo";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function preferiti(){
        return $this->hasMany(Preferiti::class,'cod_articolo','cod_articolo');
    }
}
?>