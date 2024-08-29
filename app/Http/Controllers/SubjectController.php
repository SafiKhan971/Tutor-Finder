<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectController extends Controller
{

    public function subjects()
    {
        $data['subjects'] = Subject::with('discipline')->get();
        return view('front.subjects', $data);
    }
    
    public function index()
    {
        $data['subjects'] = Subject::with('discipline')->paginate(10);
        return view('admin.subject.index', $data);
    }

    public function create()
    {
        $data['disciplines'] = Discipline::all();
        return view('admin.subject.create', $data);
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'discipline_id' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Subject::create([
            'name' => $request->name,
            'discipline_id' => $request->discipline_id,
        ]);

        session()->flash('success','Subject Created Successfully !!!');
        return redirect()->route('subject.index');
    }

    public function edit($id)
    {
        $data['disciplines'] = Discipline::all();
        $data['subject'] = Subject::find($id);
        return view('admin.subject.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'discipline_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Subject::where('id', $id)->update([
            'name' => $request->name,
            'discipline_id' => $request->discipline_id,
        ]);

        session()->flash('success','Subject Updated Successfully !!!');
        return redirect()->route('subject.index');
    }

    public function destroy($id)
    {
        Subject::where('id', $id)->delete();

        session()->flash('success','Subject Deleted Successfully !!!');
        return redirect()->route('subject.index');
    }
}

