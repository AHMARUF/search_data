<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\District;
use App\Upazila;
class UpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data= Upazila::orderBy('id',"DESC")->get();
        $devision= Division::all();
        return view('page.upazila',compact('data','devision'));
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
            'name' => 'required|unique:districts', 
        ]);
        $data = new Upazila;
        $data['name'] =$request->name;
        $data['division_id'] =$request->division_id;
        $data['district_id'] =$request->district_id;
        $data->save();
        if ($data) 
        {
            $notification = array(
                'message' => 'Upazila Store Successful!',
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


    public function district(Request $request)
    {
         
        $division_id = $request->division_id;
         
        $data = District::where('division_id',$division_id)->get();

        return response()->json(['data'=>$data]);

        
    }
    public function upazila(Request $request)
    {
         
        $district_id = $request->district_id;
         
        $data = Upazila::where('district_id',$district_id)->get();

        return response()->json(['data'=>$data]);

        
    }
}
