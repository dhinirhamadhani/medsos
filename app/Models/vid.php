<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vid extends Model
{
    use HasFactory;
    protected $table = 'vids';
    protected $primaryKey = 'id';

    protected $fillable = [
        'created_by','vid','caption'
    ];
}
