<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    protected $table="pangkat";

    protected $primaryKey = "kode_pangkat";

    public $incrementing = false;
}
