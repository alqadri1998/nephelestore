<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    protected $fillable = ['name'];
    protected $dates = ['created_at'];
}
