<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SearchQuery\FilterQueryString\FilterQueryString;

class Todo extends Model
{
    use HasFactory, FilterQueryString;

    protected $filters = ['search'];

    protected $fillable = [
        'name',
    ];
}
