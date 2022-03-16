<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteModels extends Model
{
    use HasFactory;
    protected $table = 'quotes';
    protected $fillable = [
        'id', 'content', 'created_at', 'updated_at'
    ];
}
