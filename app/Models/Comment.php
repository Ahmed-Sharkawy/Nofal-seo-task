<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'comment',
        'post_id'
    ];

    /**
     * Relations
     */
    public function post()
    {
        return $this->belongsTo(User::class);
    }
}
