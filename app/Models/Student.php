<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'birthday',
        'group_id',
    ];

    public function group():BelongsTo{
        return $this->belongsTo(Group::class);
    }
}
