<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ResourceCollection
    {
        return Student::all()->toResourceCollection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request): JsonResource
    {
        $data = $request->validated();
        return Student::query()->create($data)->toResource();
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): JsonResource
    {
        return $student->load('classroom.syllabus.lectures')->toResource();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student): JsonResource
    {
        $data = $request->validated();
        $student->update($data);
        return $student->toResource();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): JsonResponse
    {
        return response()->json($student->delete());
    }
}
