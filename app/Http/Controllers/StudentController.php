<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\District;
use App\Division;
use App\Upazila;
use App\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Student::orderBy('id',"DESC")->paginate(25);
        $devision= Division::all();
        return view('page.view_student',compact('data','devision'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $devision= Division::all();
        return view('page.student',compact('devision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);
        $data = new Student;
        $data['name'] =$request->name;
        $data['father_name'] =$request->father_name;
        $data['mother_name'] =$request->mother_name;
        $data['gmail'] =$request->gmail;
        $data['number'] =$request->number;
        $data['division_id'] =$request->division_id;
        $data['district_id'] =$request->district_id;
        $data['upazila_id'] =$request->upazila_id;
        $data['address'] =$request->address;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Student Store Successful!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);  
        }else{
            $notification = array(
                'message' => 'Pleace Try agin',
                'alert-type' => 'success'
            );

          return Redirect()->back()->with($notification);   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function Search(Request $request)
    {
        $division_id =$request->Division;
        $district_id =$request->District;
        $upazila_id =$request->Upazila;
        $search =$request->Search;


        if ($division_id  && $district_id && $upazila_id ) {
            $data = Student::where('division_id', 'LIKE', "%$division_id%")
                ->where('district_id', 'LIKE', "%$district_id%")
                ->where('upazila_id', 'LIKE', "%$upazila_id%")
                ->where('name', 'LIKE', "%$search%")
                ->paginate(25);
        }
        elseif ($division_id && $district_id) {
            $data = Student::where('division_id', 'LIKE', "%$division_id%")
                ->where('district_id', 'LIKE', "%$district_id%")
                ->where('name', 'LIKE', "%$search%")
                ->paginate(25);
        }
        elseif ($division_id) {
            $data = Student::where('division_id', 'LIKE', "%$division_id%")
                ->where('name', 'LIKE', "%$search%")
                ->paginate(25);
        }
        else{
            $data = Student::where('name', 'LIKE', "%$search%")->paginate(25);
        }
        return view('page.view_student',compact('data'));

    }


}
