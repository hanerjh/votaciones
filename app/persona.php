<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class persona extends Authenticatable
{
    use Notifiable;
    //
    protected $table="persona";
    protected $primaryKey = 'idpersona';
    public $timestamps = false; 

   

    protected $fillable = [
        'documento','nombre', 'apellido', 'fechaNacimiento','sexo', 'correo','telefono',
        'comuna','barrio', 'direccion','fkpuesto_votacion', 'fk_mesa', 'municipio',
    ];

    protected $hidden = [
        'password',
    ];

}
