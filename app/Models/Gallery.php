<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'ships_gallery';

    protected $fillable = ['ship_id', 'title', 'url', 'ordering'];

    public function ship(){
        return $this->belongsTo(Ship::class);
    }
}
