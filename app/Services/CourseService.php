<?php

namespace App\Services;

use App\Traits\ConsumesExternalService;

class CourseService
{
    use ConsumesExternalService;

    public $baseUri;
    public $secret;

    public function __construct()
    {
        $this->baseUri = config('services.courses.base_uri');
        $this->secret = config('services.courses.secret');
    }

    public function obtainCourses()
    {
        return $this->performRequest('GET', '/courses');
    }

    public function createCourse($data)
    {
        return $this->performRequest('POST', '/courses', $data);
    }

    public function obtainCourse($course)
    {
        return $this->performRequest('GET', "/courses/{$course}");
    }

    public function editCourse($data, $course)
    {
        return $this->performRequest('PUT', "/courses/{$course}", $data);
    }

    public function deleteCourse($course)
    {
        return $this->performRequest('DELETE', "/courses/{$course}");
    }
}
