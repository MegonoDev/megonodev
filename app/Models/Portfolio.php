<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = ['nama', 'slug', 'keterangan', 'thumbnail'];
}
