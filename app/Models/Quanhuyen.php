<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quanhuyen extends Model
{
    use HasFactory;
    protected $table = "quanhuyen";

    public function thanhpho()
    {
        return $this->belongsTo('App\Models\Thanhpho', 'matp', 'matp');
    }
}