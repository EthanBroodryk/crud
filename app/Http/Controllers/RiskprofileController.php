<?php

namespace App\Http\Controllers;

use App\Models\riskprofile;
use Inertia\Inertia;

use Illuminate\Http\Request;

class RiskprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $name   = $request->name;
        $title  = $request->title;
        $email  = $request->email;
        $role   = $request->role;

        riskprofile::create(['name'=>$name,'title'=>$title,'email'=>$email,'role'=>$role]);
        // return Inertia::render('Welcome');
        return \Inertia\Inertia::location('/');


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(riskprofile $riskprofile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(riskprofile $riskprofile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, riskprofile $riskprofile)
    {
  
        $risk_id = $request->risk_id;
        $riskProfile = riskprofile::find($risk_id);
        $riskProfile->update([
            'name'=>$request->name,
            'title'=>$request->title,
            'role'=>$request->role,
            'email'=>$request->email,
        ]);

        return \Inertia\Inertia::location('/');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        
        $risk_id = $request->risk_id;
        $riskProfile = riskprofile::find($risk_id);
        $riskProfile->delete();
        return \Inertia\Inertia::location('/');
        //
    }
}
