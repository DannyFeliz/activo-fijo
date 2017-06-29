<?php

namespace App\Http\Controllers;

use App\TypesAssets;
use function compact;
use function dd;
use Illuminate\Http\Request;
use function redirect;

class TypesAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesAssets = TypesAssets::all();
        return view("type-assets.index", compact("typesAssets"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("type-assets.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typesAssets = new TypesAssets();
        $typesAssets->description = $request->description;
        $typesAssets->accounting_accounts_purchase = $request->accounting_accounts_purchase;
        $typesAssets->accounting_accounts_depreciation = $request->accounting_accounts_depreciation;
        $typesAssets->save();

        return redirect("/tipos-activos");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TypesAssets  $typesAssets
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typesAssets = TypesAssets::where("id",$id)->first();
        return view("type-assets.edit", compact("typesAssets"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TypesAssets  $typesAssets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypesAssets $typesAssets)
    {
        $typesAssets->description = $request->description;
        $typesAssets->accounting_accounts_purchase = $request->accounting_accounts_purchase;
        $typesAssets->accounting_accounts_depreciation = $request->accounting_accounts_depreciation;
        $typesAssets->update();

        return redirect("/tipos-activos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TypesAssets  $typesAssets
     * @return \Illuminate\Http\Response
     */
    public function destroy(TypesAssets $typesAssets)
    {
        $typesAssets->delete();
        return redirect("/tipos-activos");
    }
}
