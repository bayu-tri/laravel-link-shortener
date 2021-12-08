<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    // Column that can be Bulk Insert
    protected $fillable = [
        'slug',
        'user_id',
        'name',
        'link',
        'status',
        'counter'
    ];

    // Many to Many Relation with users table
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
