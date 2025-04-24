<?php

namespace App\Http\Controllers\Website;

use App\Models\Skill;
use App\Http\Controllers\Controller;
use App\Http\Resources\Website\SkillResource;
use App\Http\Requests\Website\SkillStoreRequest;
use App\Http\Requests\Website\SkillUpdateRequest;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::paginate(10);

        return SkillResource::collection($skills);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SkillStoreRequest $request)
    {
        $skill = $request->storeSkill();

        return response([
            'skill' => new SkillResource($skill),
            'message' => 'Skill created successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Skill $skill)
    {
        return new SkillResource($skill);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SkillUpdateRequest $request, Skill $skill)
    {
        $skill = $request->updateSkill();

        return response([
            'skill' => new SkillResource($skill),
            'message' => 'Skill updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        if ($skill->remove()) {
            return response([
                'message' => 'Skill deleted successfully',
            ]);
        }

        return response([
            'message' => 'Skill can`t be deleted successfully',
        ], 409);
    }
}
