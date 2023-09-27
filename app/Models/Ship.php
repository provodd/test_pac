<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ship extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['title', 'spec', 'description', 'ordering', 'state'];

    public function cabins()
    {
        return $this->hasMany(Cabin::class);
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
}
