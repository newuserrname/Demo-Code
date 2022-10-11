<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xaphuong extends Model
{
    use HasFactory;
    protected $table = "xaphuongthitran";

    public function quanhuyen()
    {
        return $this->belongsTo('App\Models\Quanhuyen', 'maqh', 'maqh');
    }
}
