<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;
use App\Mistake;

class MistakeController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|string|max:255|unique:mistakes,name',
            'incident'=>'required|string|max:22000',
        ]);
        $mistake = new Mistake;
        $mistake->name = $request->mistakeName;
        $mistake->save();
        $incident = new Incident;
        $incident->description = $request->incident;
        $incident->mistake_id = $mistake->id;
        $incident->when = date("Y-m-d H:i:s");
        $incident->iteration = 0;
        $incident->save();
        return back();
        
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
    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            "deactivation_reason"=>"required|min:1"
        ]);
        $mistake = Mistake::find($id);
        $mistake->deactivated_at = date("Y-m-d H:i:s");
        $mistake->deactivation_reason = $request->deactivation_reason;
        $mistake->save();
        return back(); 
    }
}
