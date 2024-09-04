<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tutor;
use App\Models\Rating;
use App\Models\Tution;
use App\Models\Subject;
use App\Models\Discipline;
use App\Models\TutorSubject;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TutorController extends Controller
{
    public function register()
    {
        $data['disciplines'] = Discipline::all();
        $data['subjects'] = Subject::all();
        $data['discipline_id'] = TutorSubject::all();
        $data['tutor_subjects'] = TutorSubject::with('subject')->get();
        return view('tutor.register', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable',
            'address' => 'nullable|min:3|max:200',
            'gender' => 'required',
            'qualification' => 'nullable|min:3|max:200',
            'discipline_id' => 'nullable',
            'subjects' => 'nullable',
            'experiece' => 'nullable',
            'availability' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tuter/images', 'public');
        }

        $tutor = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'qualification' => $request->qualification,
            'experiece' => $request->experiece,
            'availability' => $request->availability,
            'role' => 'tutor',
            'image' =>  $path ?? null,
            'password' => Hash::make($request->password),
        ]);

        foreach ($request->subjects as $subject) {
            TutorSubject::create([
                'tutor_id' => $tutor->id,
                'discipline_id' => $request->discipline_id,
                'subject_id' => $subject,
            ]);
        }

        return redirect()->route('account.login');
    }

    public function profile()
    {
        $data['tutor'] = Auth::user();
        $data['disciplines'] = Discipline::all();
        $data['subjects'] = Subject::all();
        $data['discipline_id'] = TutorSubject::where('tutor_id', auth()->user()->id)->pluck('discipline_id')->first();
        $data['tutor_subjects'] = TutorSubject::where('tutor_id', auth()->user()->id)
            ->with('subject')->get();

        return view('tutor.profile', $data);
    }

    public function index()
    {
        $data['tutors'] = User::where('role', 'tutor')->paginate(10);
        return view('admin.tutor.index', $data);
    }

    public function create()
    {
        $data['disciplines'] = Discipline::all();
        $data['subjects'] = Subject::all();
        $data['discipline_id'] = TutorSubject::where('tutor_id', auth()->user()->id)->pluck('discipline_id')->first();
        $data['tutor_subjects'] = TutorSubject::where('tutor_id', auth()->user()->id)
            ->with('subject')->get();

        return view('admin.tutor.create', $data);
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), 
        [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable',
            'address' => 'nullable|min:3|max:200',
            'gender' => 'required',
            'qualification' => 'nullable|min:3|max:200',
            'subjects' => 'nullable|min:3|max:200',
            'experiece' => 'nullable',
            'availability' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'password' => 'required|min:8|same:confirm_password',
            'confirm_password' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('tuter/images', 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'qualification' => $request->qualification,
            'subjects' => $request->subjects,
            'experiece' => $request->experiece,
            'availability' => $request->availability,
            'type' => $request->type,
            'hourly_rate' => $request->hourly_rate,
            'role' => 'tutor',
            'image' =>  $path ?? null,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('tutor.index');
    }


    public function edit($id)
    {
        $data['tutor'] = User::where('role', 'tutor')->find($id);
        $data['disciplines'] = Discipline::all();
        $data['subjects'] = Subject::all();
        $data['discipline_id'] = TutorSubject::where('tutor_id', auth()->user()->id)->pluck('discipline_id')->first();
        $data['tutor_subjects'] = TutorSubject::where('tutor_id', auth()->user()->id)
            ->with('subject')->get();
        return view('admin.tutor.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'phone' => 'nullable|max:20',
            'address' => 'nullable|max:200',
        ]);

        if ($validator->passes()) {

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->qualification = $request->qualification;
            $user->experiece = $request->experiece;
            $user->availability = $request->availability;
            $user->type = $request->type;
            $user->hourly_rate = $request->hourly_rate;
            $user->save();

            return redirect()->route('tutor.index');
        } else {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }


    public function update_subjects(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'discipline_id' => 'required',
            'subjects' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        TutorSubject::where('tutor_id', Auth::id())->delete();
        foreach ($request->subjects as $subject) {
            TutorSubject::create([
                'tutor_id' => Auth::id(),
                'discipline_id' => $request->discipline_id,
                'subject_id' => $subject,
            ]);
        }

        session()->flash('success', 'Subjects Updated Successfully !!!');
        return redirect()->back();
    }

    public function approve($id)
    {
        $user = User::find($id);
        $user->status = 1;
        $user->save();

        return redirect()->route('tutor.index');
    }

    public function reject($id)
    {
        $user = User::find($id);
        $user->status = 2;
        $user->save();

        return redirect()->route('tutor.index');
    }

    public function show($id)
    {
        $data['tutor'] = User::find($id);
        $data['tutor_id'] = $id;

        $data['reviews'] = Rating::where('tuter_id', $id)->with('user')->take(5)->get();
        return view('tutor.show', $data);
    }


    public function tutors()
    {
        $data['tutors'] = User::where('role', 'tutor')->where('status', 1)
            ->withAvg('rating', 'rating')
            ->take(8)->get();
        return view('tutor.tutors', $data);
    }

    public function search(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'discipline' => 'required',
            'subject_id' => 'required',
            'address' => 'nullable|max:200',
            'hourly_rate' => 'nullable|numeric|max:9999',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Start building the query
        $query = User::whereHas('subject', function ($query) use ($request) {
            $query->where('subject_id', $request->subject_id);
        })
            ->where('role', 'tutor')
            ->where('status', 1);

        if ($request->filled('address')) {
            $query->where('address', 'like', '%' . $request->address . '%');
        }

        if ($request->filled('hourly_rate')) {
            $query->where('hourly_rate', $request->hourly_rate);
        }

        // Execute the query
        $data['tutors'] = $query->get();

        return view('tutor.tutors', $data);
    }

    public function getSubjects(Request $request)
    {
        $disciplineId = $request->input('discipline_id');
        $subjects = Subject::where('discipline_id', $disciplineId)->get();
        return response()->json(['subjects' => $subjects]);
    }

    public function tutions()
    {
        $tutions = Tution::where('tuter_id', Auth::id())
        ->with('student', 'subject')->orderBy('created_at', 'DESC')->paginate(10);

        // dd($tutions);
        return view('tutor.my-tutions', [
            'tutions' => $tutions,
        ]);
    }

    public function subjects()
    {
        $data['subjects'] = TutorSubject::where('tutor_id', Auth::id())
        ->with('subject.discipline')->paginate(10);
        return view('tutor.subjects', $data);
    }

    public function destroySubject($id)
    {
        TutorSubject::where('id', $id)->delete();
        session()->flash('success', 'Subject Deleted Successfully !!!');
        return redirect()->back();
    }
}
