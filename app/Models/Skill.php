<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Skill extends Model
{
    /** @use HasFactory<\Database\Factories\SkillFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',

        'name',
        'description',

        'tags',
        'metadata',
    ];

    protected $casts = [
        'tags' => 'array',
        'metadata' => 'array',
    ];

    ## Relations

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    ## Getters & Setters

    ## Scopes

    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = json_encode(array_values($value));
    }

    public function scopeTagged($query, array $tags)
    {
        if (empty($tags)) return $query;
        
        return $query->where('tags', '@>', json_encode($tags));
    }

    public function scopeSearch($query, ?string $term)
    {
        if (! $term) return $query;

        return $query->whereRaw(
            "to_tsvector('english', name || ' ' || coalesce(description, '')) @@ plainto_tsquery('english', ?)",
            [$term]
        );
    }
    ## Other Methods

    public function remove(): bool
    {
        return $this->delete();
    }
}
