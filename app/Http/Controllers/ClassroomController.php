<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return Classroom::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request): JsonResource
    {
        $data = $request->validated();
        return Classroom::query()->create($data)->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom): JsonResource
    {
        return $classroom->load('students')->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom): JsonResource
    {
        $data = $request->validated();
        $classroom->update($data);
        return $classroom->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom): JsonResponse
    {
        return response()->json($classroom->delete());
    }
}
