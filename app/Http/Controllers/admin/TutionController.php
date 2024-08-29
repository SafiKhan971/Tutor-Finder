<?php

namespace App\Http\Controllers\admin;

use DateTime;
use App\Models\Tution;
use App\Models\Subject;
use App\Models\Category;
use App\Models\ClassType;
use App\Models\TutorSubject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TutionController extends Controller
{
    public function index()
    {
        $tutions = Tution::orderBy('created_at', 'DESC')->with('user', 'applications')->paginate(10);
        return view('admin.tutions.list', [
            'tutions' => $tutions,
        ]);
    }


    public function create($id)
    {
        $data['tutor_subjects'] = TutorSubject::where('tutor_id', $id)->with('subject')->get();
        $data['tutor_id'] = $id;
        return view('front.account.tution.create', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'week_days' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'subject' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $days = ($request->week_days) ? implode(',', $request->week_days) : '';
        
        $startTime = DateTime::createFromFormat('g:i A', $request->start_time);
        $formattedStartTime = $startTime->format('H:i:s');

        $endTime = DateTime::createFromFormat('g:i A', $request->end_time);
        $formattedEndTime = $endTime->format('H:i:s');


        Tution::create([
            'student_id' => Auth::id(),
            'tuter_id' => $request->tutor_id,
            'title' => $request->title,
            'week_days' => $days,
            'start_time' => $formattedStartTime,
            'end_time' => $formattedEndTime,
            'subject_id' => $request->subject,
            'duration' => $request->duration,
            'status' => 0,
        ]);

        return redirect()->route('checkout');
    }


    public function edit($id)
    {
        $tution = Tution::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->where('status', 1)->get();

        $classType = ClassType::orderBy('id')->where('status', 1)->get();
        return view('admin.tutions.edit', [
            'categories' => $categories,
            'jobTypes' => $classType,
            'tution' => $tution
        ]);
        // return view('admin.tutions.edit');

    }

    public function update(Request $request, $id)
    {
        // dd($id);
        // dd($request);
        $rules = [
            'title' => 'required|min:5|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            // 'location'=>  'required',

            'description' =>  'required',

            'company_name' =>  'required',
            'contactnumber' =>  'required|min:11|max:14',

        ];

        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {
            $tution =  Tution::find($id);

            $tution->title = $request->title;
            $tution->category_id = $request->category;
            $tution->class_type_id = $request->jobType;

            $tution->no_of_stu = $request->vacancy;
            $tution->salary = $request->salary;
            $tution->location = $request->location;
            $tution->description = $request->description;
            $tution->benefits = $request->benefits;
            $tution->responsibility = $request->responsibility;
            $tution->qualifications = $request->qualifications;
            $tution->experience = $request->experience;
            $tution->gurdian_name = $request->company_name;
            $tution->gurdian_location = $request->gurdian_location;
            $tution->gurdian_number = $request->contactnumber;

            $tution->save();


            // session()->flash('success','Tution Updated Successfully');
            // return response()->json([
            //     'status' => true,
            //     'errors' => []
            // ]);
            // return redirect()->route('account.login');
            // return view('front.account.tution.my-tution');
            return redirect()->route('admin.tutions');
        } else {
            // return response()->json([
            //     'status' => false,
            //     'errors' => $validator->errors()
            // ]);


            // dd($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }
}
