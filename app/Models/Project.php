<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\Category;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'type_id', 'cover_image'];
    use HasFactory;
    public function type(): BelongsTo {
        return $this->belongsTo(Type::class);
    }
    public function technologies() {
        return $this->belongsToMany(Technology::class);
    }
}
