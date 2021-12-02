<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use App\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Services\AuthorService;

class CourseController extends Controller
{
    use ApiResponser;

    public $courseService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    public function index()
    {
        return $this->successResponse($this->courseService->obtainCourses());
    }

    public function store(Request $request)
    {
        //$this->authorService->obainAuthors($request->author_id);
        return $this->successResponse($this->courseService->createCourse($request->all()), Response::HTTP_CREATED);
    }

    public function show($course)
    {
        return $this->successResponse($this->courseService->obtainCourse($course));
    }

    public function update(Request $request, $course)
    {
        return $this->successResponse($this->courseService->editCourse($request, $course));
    }

    public function destroy($course)
    {
        return $this->successResponse($this->courseService->deleteCourse($course));
    }

}
