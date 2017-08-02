<?php

namespace App\Http\Controllers;

use App\FixedAssets;
use App\TypesAssets;
use App\Department;
use Illuminate\Http\Request;

class FixedAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fixed_assets = FixedAssets::all();
        return view('fixed-assets.index', compact('fixed_assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset_types = TypesAssets::all();
        $departments = Department::all();
        return view('fixed-assets.create', compact('departments', 'asset_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fixed_asset = new FixedAssets;
        $fixed_asset->description = $request->description;
        $fixed_asset->type_asset_id = $request->type_asset_id;
        $fixed_asset->department_id = $request->department_id;
        $fixed_asset->amount = $request->amount;
        $fixed_asset->registration_date = date('d-m-Y');
        $fixed_asset->amount = $request->amount;
        $fixed_asset->accumulated_depreciation = 0;
        $fixed_asset->save();

        return redirect('/activos-fijos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FixedAssets  $fixedAssets
     * @return \Illuminate\Http\Response
     */
    public function show(FixedAssets $fixed_asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FixedAssets  $fixedAssets
     * @return \Illuminate\Http\Response
     */
    public function edit(FixedAssets $fixed_asset)
    {
        $fixed_asset = $fixed_asset;
        $asset_types = TypesAssets::all();
        $departments = Department::all();
        return view('fixed-assets.edit', compact('fixed_asset', 'departments', 'asset_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FixedAssets  $fixedAssets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FixedAssets $fixed_asset)
    {
        $fixed_asset->description = $request->description;
        $fixed_asset->type_asset_id = $request->type_asset_id;
        $fixed_asset->department_id = $request->department_id;
        $fixed_asset->amount = $request->amount;
        $fixed_asset->registration_date = date('d-m-Y');
        $fixed_asset->amount = $request->amount;
        $fixed_asset->update();
        return redirect('/activos-fijos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FixedAssets  $fixedAssets
     * @return \Illuminate\Http\Response
     */
    public function destroy(FixedAssets $fixed_asset)
    {
        $fixed_asset->delete();
        return redirect('/activos-fijos');
    }
}
