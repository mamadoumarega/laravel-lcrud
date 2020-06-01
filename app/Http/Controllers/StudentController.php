<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Students;

class StudentController extends Controller
{
  
    public function index()
    {
        $students = Students::paginate(5);
        return view('Welcome', compact('students'));
    }


    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
       $this->validate($request, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'     => 'required',
            'phone'     => 'required'
       ]);

       $student = new Students;

       $student->first_name = $request->first_name;
       $student->last_name = $request->last_name;
       $student->email = $request->email;
       $student->phone = $request->phone;

       $student->save();
       
       return redirect(route('home'))->with('successMsg', 'Etudiant ajouté avec succès');
    }


    public function edit($id)
    {
        $student = Students::find($id);

        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'     => 'required',
            'phone'     => 'required'
        ]);

        $student =  Students::find($id);

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();

        return redirect(route('home'))->with('successMsg', 'La modification a été  éffectuée avec succès !!!');
    }

    public function delete($id)
    {
        Students::find($id)->delete();
        return redirect(route('home'))->with('successMsg', 'La suppression a été  éffectuée avec succès !!!');
    }
}
