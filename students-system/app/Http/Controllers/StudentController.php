<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function getStudents(){
        $students = Student::all();
        return view('student.students', compact('students'));
    }

    public function create(){
        $this->authorize('create', Student::class);
        return view('student.create');
    }
    public function createStudent(Request $request){
        $this->authorize('create', Student::class);

        $request->validate([
            'student_id' => 'required|unique:students',
            'student_name' => 'required',
            'age' => 'required',
            'residence_location' => 'required'
        ]);

        $data['student_id'] = $request->student_id;
        $data['student_name'] = $request->student_name;
        $data['age'] = $request->age;
        $data['residence_location'] = $request->residence_location;

        Student::create($data);

        return redirect(route('students'))->with("success", "Student  has been added successfully!");
    }

    public function update($id){
        $this->authorize('update', Student::class);
        $student = Student::find($id);

        if(is_null($student))
            return redirect(route('students'));
        return view('student.update',compact('student','id'));
    }

   public function updateStudent(Request $request, $id){
        $this->authorize('update', Student::class);

      
        Student::where('id', $id)->update([
            'student_id' => $request->student_id,
            'student_name' => $request->student_name,
            'age' => $request->age,
            'residence_location' => $request->residence_location
            ]);

    
        return redirect(route('students'))->with("success", "Student  has been updated successfully!");
        
    }

    public function delete($id){
        return redirect(route('students'));
    }
    public function deleteStudent($id){
        $this->authorize('delete', Student::class);
        $student = Student::where('id', $id);

        if(!is_null($student))
            $student->delete();
        
        return redirect(route('students'))->with("success", "Student  has been deleted successfully!");
    }
}