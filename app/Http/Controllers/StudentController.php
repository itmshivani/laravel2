<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $students=student::orderBy("id","desc")->get();
        //print_r($students);
        return view('student.index',compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        //print_r($request->file("image"));die;
        //$file=$request->file("image");
        //echo"File name:".$file->getClientOriginalName()."<br/>";
        //echo"File Extension:".$file->getClientOriginalExtension()."<br/>";
        //echo"File Real Path:".$file->getRealPath()."<br/>";
        //echo"File Size:".$file->getSize()."<br/>";
        //echo"File Mime Type:".$file->getMimeType()."<br/>";
        //die;

        if($request->hasfile("image")){
            $file=$request->file("image");
            $file->move("upload/",$file->getClientOriginalName());
        }
        





         $data=validator::make($request->all(),[
              
              "name"=>"required",
              "email"=>"required"
              
        ],[
               "name.required"=>"name is needed",
               "email.required"=>"email should be needed",
    
        


        ])->validate();

        $obj=new student;
        $obj->name =$request->name;
        $obj->email=$request->email;
        $obj->st_image=$file->getClientOriginalName();

        
        $is_saved=$obj->save();
        //dd($obj);

        if($is_saved){
            session()->flash("studentmessage","student has been inserted");
            return view("student/view",compact('obj'));
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $student=students::find($id);
        return view('student.edit',compact('student'));
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
        
        $data=validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required'

        ],[
            'name.required'=>'name is required',
            'email.required'=>'email is required'
        ])->validate();


        $o =students::find($id);
        $o->name=$request->name;
        $o->email=$request->email;
        $save = $o->save();

        if($save)
        {
            session()->flash('studentMessage',"SECCESFULLY UPDATED");
            return redirect("student/".$id."/edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $student = students::find($id);
        $del=$student->delete();
        if($del != null)
        {
            session()->flash("studentMessage","student has deleted");;
            return redirect ("student");
        }
    }
}
