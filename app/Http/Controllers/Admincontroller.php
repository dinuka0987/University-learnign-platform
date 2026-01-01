<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class Admincontroller extends Controller
{
    public function studentDetails(){
        return view('admin.student');
    }
    public function addCourse(){
        return view('admin.addcourse');
    }

    public function postAddCourse(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $course= new Course();
        $course->title = $request->title;
        $course->description = $request->description;
        $image=$request->images;
        
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $course->image=$imagename;
        }
        $course->save();

        if($image && $course->save()){
            $request->image->move('image',$imagename);
        }

        return redirect()->route('admin.viewcourse')->with('Course_message','Course added successfully');
    }

    public function viewCourse(){
        $courses= Course::all();
        return view('admin.viewcourse', compact('courses'));
    }

}