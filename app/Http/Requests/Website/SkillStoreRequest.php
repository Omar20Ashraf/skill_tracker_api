<?php

namespace App\Http\Requests\Website;

use App\Models\Skill;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class SkillStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:225|min:2',
            'description' => 'nullable|string|min:2',

            'tags' => 'nullable|array|min:1',
            'tags.*' => 'required_with:tags|string|min:3|max:50',

            'metadata' => 'nullable|array|min:1',
            'metadata.*' => 'required_with:metadata|string|min:3|max:50',
        ];
    }


    public function storeSkill(): Skill
    {
        return DB::transaction(function () {
            return Skill::create([
                // 'user_id' => auth()->user()->id,
                'user_id' => 1,

                'name' => $this->name,
                'description' => $this->description,
                'tags' => $this->tags,
                'metadata' => $this->metadata,
            ]);
        });
    }

    public function attributes(): array
    {
        return [
            'name' => 'name',
            'description' => 'description',
            'tags' => 'tags',
            'metadata' => 'metadata',
        ];
    }
}
