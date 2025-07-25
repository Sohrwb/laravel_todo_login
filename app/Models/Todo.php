<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];

    public function Category() {
        return $this->belongsTo(Category::class);
    }

}
