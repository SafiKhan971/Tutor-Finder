<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DisciplineController extends Controller
{
    public function index()
    {
        $data['disciplines'] = Discipline::paginate(10);
        return view('admin.discipline.index', $data);
    }

    public function create()
    {
        return view('admin.discipline.create');
    }

    public function store(Request $request){
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
        ]);
    
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Discipline::create([
            'name' => $request->name,
        ]);

        session()->flash('success','Discipline Created Successfully !!!');
        return redirect()->route('discipline.index');
    }

    public function edit($id)
    {
        $data['discipline'] = Discipline::find($id);
        return view('admin.discipline.edit', $data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        Discipline::where('id', $id)->update([
            'name' => $request->name,
        ]);

        session()->flash('success','Discipline Updated Successfully !!!');
        return redirect()->route('discipline.index');
    }

    public function destroy($id)
    {
        Discipline::where('id', $id)->delete();

        session()->flash('success','Discipline Deleted Successfully !!!');
        return redirect()->route('discipline.index');
    }

}
