<?php

namespace App\Http\Controllers\Website;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Website\SkillResource;

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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, Skill $skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skill $skill)
    {
        //
    }
}
