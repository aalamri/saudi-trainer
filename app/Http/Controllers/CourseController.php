<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

class CourseController extends Controller {
    /**
     * Show the course list.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $courses = Course::latest()->paginate(15);
        $q = $request->q;
 
        if($request->has('q')) {
            $courses = $courses->where('title', 'LIKE', "%{$q}%");
        }
        
        return view('course.index',compact('courses', 'q'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

        // return view('course.index', compact('courses', 'q'));
    }

    /**
     * Show the course list.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(Request $request, $id)
    {
        $course = Course::where('id', $id)->first();

        if($course === null) {
            abort('404');
        }
    
        return view('course.profile', compact('course'));
    }
}