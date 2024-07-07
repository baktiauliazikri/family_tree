<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyTree extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'parent_id',
    ];
}
