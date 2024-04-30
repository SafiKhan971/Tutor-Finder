<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ClassType;
use App\Models\Tution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class TutionController extends Controller
{
    //
    public function index()
    {
        $tutions= Tution::orderBy('created_at','DESC')->with('user','applications')->paginate(10);
        // dd($tutions);
        return view('admin.tutions.list',[
            'tutions'=>$tutions,
        ]);



    }


    public function edit($id)
    {
        $tution = Tution::findOrFail($id);
        $categories= Category:: orderBy('name', 'ASC')->where('status',1)->get();

            $classType= ClassType::orderBy('id')->where('status',1)->get();


          



            return view('admin.tutions.edit',[
                'categories' => $categories,
                'jobTypes' => $classType,
                'tution' =>$tution
            ]);
       // return view('admin.tutions.edit');

    }

    public function update(Request $request, $id)
    {
        // dd($id);
        // dd($request);
        $rules=[
            'title'=>'required|min:5|max:200',
            'category'=>'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            // 'location'=>  'required',
            
            'description'=>  'required',
            
            'company_name'=>  'required',
            'contactnumber'=>  'required|min:11|max:14',

        ];

        $validator = Validator::make($request->all(),$rules);


        if($validator->passes()){
            $tution =  Tution::find($id);
            
            $tution->title= $request->title;
            $tution->category_id= $request->category;
            $tution->class_type_id= $request->jobType;
         
            $tution->no_of_stu= $request->vacancy;
            $tution->salary= $request->salary;
            $tution->location= $request->location;
            $tution->description= $request->description;
            $tution->benefits= $request->benefits;
            $tution->responsibility= $request->responsibility;
            $tution->qualifications= $request->qualifications;
            $tution->experience= $request->experience;
            $tution->gurdian_name= $request->company_name;
            $tution->gurdian_location= $request->gurdian_location;
            $tution->gurdian_number= $request->contactnumber;
            
            $tution->save();


            // session()->flash('success','Tution Updated Successfully');
            // return response()->json([
            //     'status' => true,
            //     'errors' => []
            // ]);
            // return redirect()->route('account.login');
            // return view('front.account.tution.my-tution');
            return redirect()->route('admin.tutions');

        }else{
            // return response()->json([
            //     'status' => false,
            //     'errors' => $validator->errors()
            // ]);

            
           // dd($validator);
             return redirect()->back()->withErrors($validator)->withInput();

        }

    }

}
