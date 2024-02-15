<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feed extends Model
{
    use HasFactory;

    protected $table = 'feeds';
    protected $primaryKey = 'id';

    protected $fillable = [
        'created_by','video','caption'
    ];
}
