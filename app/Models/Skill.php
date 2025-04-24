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

    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = '{' . implode(',', $value) . '}';
    }

    public function getTagsAttribute($value)
    {
        return str_getcsv(trim($value, '{}'));
    }

    ## Scopes

    ## Other Methods
}
