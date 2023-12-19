<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $student = Student::all();
        $data = [
            'data' => 200,
            'status' => $student
        ];
        return response()->json($data, 200);
    }

    public function upload(Request $request){
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email'
        ]) ;

        if ($validator->fails()){
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $student = new Student;
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();
            $data = [
                'status' => 200,
                'message' => 'Data Uploaded Successfully'
            ];
            return response()->json($data, 200);
        }
    }

    public function edit(Request $request,$id){
        $validator = Validator::make($request->all(),
        [
            'name' => 'required',
            'email' => 'required|email'
        ]) ;

        if ($validator->fails()){
            $data = [
                'status' => 422,
                'message' => $validator->messages()
            ];
            return response()->json($data, 422);
        } else {
            $student = Student::find($id);
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->save();
            $data = [
                'status' => 200,
                'message' => 'Data Updated Successfully'
            ];
            return response()->json($data, 200);
        }
    }
    public function delete($id){
        $student= Student::find($id);
        $student->delete();
        $data=[
            'status'=>200,
            'message'=>'Data Deleted Successfully'
        ];
        return response()->json($data,200);
    }
}
