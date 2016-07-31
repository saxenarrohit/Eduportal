<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;

use Illuminate\Support\Facades\Session;

class CourseController extends Controller


{
    public function open(){
    	
    	return view('course_display')
    	->with('categories', \App\Category::all())
    	->with('subcategories', \App\Subcategory::all())
    	->with('courses', \App\Course::all())
        ->with('tutorials', \App\Tutorial::all());
    }

    public function view($id){




        $selectedLevel = Input::has('Level') ? Input::get('Level') : null;

        

        if ($selectedLevel == 'beginner') {
        $tutorials = \App\Tutorial::where('level', '=', 'Beginner')->orderBy('id', 'DESC')->get();
        }

        elseif ($selectedLevel == 'intermediate') {
        $tutorials = \App\Tutorial::where('level', '=', 'Intermediate')->orderBy('id', 'DESC')->get();
        }

        else {
        $tutorials = \App\Tutorial::where('level', '=', 'Advanced')->orderBy('id', 'DESC')->get();
        }

       

    	return view('course_display')
        ->with('categories', \App\Category::all())
        ->with('subcategories', \App\Subcategory::all())
        ->with('courses', \App\Course::all())
    	->with('course', \App\Course::find($id))
        ->with('tutorials', $tutorials);




    }


    public function profile()
    {
        return view('profile');
    }


}
