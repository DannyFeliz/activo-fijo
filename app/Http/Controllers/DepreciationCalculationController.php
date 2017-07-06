<?php

namespace App\Http\Controllers;

use App\DepreciationCalculation;
use App\FixedAssets;
use Illuminate\Http\Request;

class DepreciationCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depreciationCalculations = DepreciationCalculation::all();
        return view('depreciation-calculation.index', compact('depreciationCalculations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fixed_assets = FixedAssets::all();
        return view('depreciation-calculation.create', compact('fixed_assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DepreciationCalculation  $depreciationCalculation
     * @return \Illuminate\Http\Response
     */
    public function show(DepreciationCalculation $depreciationCalculation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DepreciationCalculation  $depreciationCalculation
     * @return \Illuminate\Http\Response
     */
    public function edit(DepreciationCalculation $depreciationCalculation)
    {
        $depreciationCalculation = $depreciationCalculation;
        $fixed_assets = FixedAssets::all();
        return view('depreciation-calculation.edit', compact('fixed_assets', 'depreciationCalculation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DepreciationCalculation  $depreciationCalculation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepreciationCalculation $depreciationCalculation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DepreciationCalculation  $depreciationCalculation
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepreciationCalculation $depreciationCalculation)
    {
        //
    }
}
