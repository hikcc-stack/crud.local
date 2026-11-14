<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    // Защищенное заполняемые поля - title, description, user_id, category_id
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'category_id',
    ];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }
}
