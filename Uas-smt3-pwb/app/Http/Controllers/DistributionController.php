<?php

namespace App\Http\Controllers;

use App\Models\Distribution;
use Illuminate\Http\Request;

class DistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index()
    {
        $distributions = Distribution::all();
        $isCreate = true;

        return view('distribusi.index', compact('distributions', 'isCreate'));
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
     * @return
     */
    public function store(Request $request)
    {
        Distribution::create($request->all());

        return redirect()->route('distribution.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return
     */
    public function show(Distribution $distribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return
     */
    public function edit(Distribution $distribution)
    {
        $distributions = Distribution::all();
        $isCreate = false;

        return view('distribusi.index', compact('distributions', 'isCreate', 'distribution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distribution  $distribution
     * @return
     */
    public function update(Request $request, Distribution $distribution)
    {
        $distribution->update($request->all());

        return redirect()->route('distribution.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distribution  $distribution
     * @return
     */
    public function destroy(Distribution $distribution)
    {
        $distribution->delete();

        return redirect()->route('distribution.index');
    }
}
