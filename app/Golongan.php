<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    protected $table="golongan";

    protected $primaryKey = "kode_golongan";

    public $incrementing = false;
}
