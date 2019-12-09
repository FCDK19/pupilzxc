<?php

namespace App\Http\Controllers;

use App\Pupil;
use Illuminate\Http\Request;

class PupilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pupils = Pupil::latest()->paginate(5);
  
        return view('pupils.index',compact('pupils'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pupils.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'kind' => 'required',
        ]);
  
        Pupil::create($request->all());
   
        return redirect()->route('pupils.index')
                        ->with('success','Pupil successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function show(Pupil $pupil)
    {
        return view('pupils.show',compact('pupil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function edit(Pupil $pupil)
    {
        return view('pupils.edit',compact('pupil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pupil $pupil)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'kind' => 'required',
        ]);
  
        $pupil->update($request->all());
  
        return redirect()->route('pupils.index')
                        ->with('success','Pupil successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pupil  $pupil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pupil $pupil)
    {
        $pupil->delete();
  
        return redirect()->route('pupils.index')
                        ->with('success','Pupil successfully deleted');
    }
}
