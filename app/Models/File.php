<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class File extends Model
{



    protected $fillable = [
        'name',
        'type',
        'toType',
        'size',
        'originalFile', //forse da cambiare
        'api'
    ];


}
