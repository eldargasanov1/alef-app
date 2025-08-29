<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSyllabusRequest;
use App\Http\Requests\UpdateSyllabusRequest;
use App\Models\Classroom;
use App\Models\Syllabus;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SyllabusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Classroom $classroom): ResourceCollection
    {
        return $classroom->syllabus()->with('lectures')->get()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSyllabusRequest $request, Classroom $classroom): JsonResource
    {
        $data = $request->validated()['data'];

        if ($classroom->syllabus()->exists()) {
            $classroom->syllabus()->delete();
        }

        $classroom->syllabus()->create();
        $classroom->syllabus->lectures()->attach($data);
        return $classroom->load('syllabus.lectures')->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Syllabus $syllabus): JsonResource
    {
        return $syllabus->load('lectures')->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSyllabusRequest $request, Classroom $classroom): JsonResource
    {
        $data = $request->validated()['data'];

        if (!$classroom->syllabus()->exists()) {
            $classroom->syllabus()->create();
            $classroom->syllabus->lectures()->attach($data);
        } else {
            $classroom->syllabus->lectures()->detach();
            $classroom->syllabus->lectures()->attach($data);
        }

        return $classroom->load('syllabus.lectures')->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom): JsonResponse
    {
        return response()->json($classroom->syllabus()->delete());
    }
}
