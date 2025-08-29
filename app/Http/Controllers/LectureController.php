<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLectureRequest;
use App\Http\Requests\UpdateLectureRequest;
use App\Models\Lecture;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return Lecture::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLectureRequest $request): JsonResource
    {
        $data = $request->validated();
        return Lecture::query()->create($data)->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture): JsonResource
    {
        return $lecture->load('syllabi.classroom.students')->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLectureRequest $request, Lecture $lecture): JsonResource
    {
        $data = $request->validated();
        $lecture->update($data);
        return $lecture->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture): JsonResponse
    {
        return response()->json($lecture->delete());
    }
}
