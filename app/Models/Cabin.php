<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'cabin_categories';
    protected $fillable = [
        'ship_id', 'vendor_code', 'title', 'type', 'description', 'photos', 'ordering', 'state'
    ];

    public function ship(){
        return $this->belongsTo(Ship::class);
    }
}
