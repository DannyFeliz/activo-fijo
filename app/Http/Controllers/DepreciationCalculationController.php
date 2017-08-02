<?php

namespace App\Http\Controllers;

use App\DepreciationCalculation;
use App\FixedAssets;
use App\TypesAssets;
use Illuminate\Http\Request;
use GuzzleHttp\Client;



class DepreciationCalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Do not show assets that where already fully depreciated;
        $fixed_assets = FixedAssets::all()->filter(function($asset, $key){
            return ($asset->amount - $asset->accumulated_depreciation) > 1;
        });
        return view('depreciation-calculation.index', compact('fixed_assets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FixedAssets $fixed_asset)
    {
        $type_assets = TypesAssets::find($fixed_asset->type_asset_id);
        $depreciation_calculation = new DepreciationCalculation();
        $depreciation_calculation->process_year = date('Y');
        $depreciation_calculation->process_month = date('m');
        $depreciation_calculation->fixed_asset_id = $fixed_asset->id;
        $depreciation_calculation->parchuse_account = $type_assets->accounting_accounts_purchase;
        $depreciation_calculation->depreciation_account = $type_assets->accounting_accounts_depreciation;
        $depreciation_calculation->process_date = date('d-m-Y');

        //Calculate Depreciation
        //Depreciation based on a FIXED amount of time of one Year
        $monthly_depreciation = $fixed_asset->amount / 12;

        $depreciation_calculation->despised_amount = $monthly_depreciation;
        $depreciation_calculation->save();

        $accumulated_depreciation = $fixed_asset->accumulated_depreciation + $monthly_depreciation;
        $fixed_asset->accumulated_depreciation = $accumulated_depreciation;
        $fixed_asset->save();

        //Send info to Accountants
        $response = (new Client)->request('POST', 'http://accountingintegration.azurewebsites.net/api/accountingentry', [
              'json' => [
                    "description" => "Depreciacion de activo Fijo",
                    "auxiliary" => [ 
                        "id" => 4
                    ],
                    "transactions" => [
                        "accountingAccount" => [
                            "id" => [$type_assets->accounting_accounts_depreciation]
                        ],
                        "origin" => "CREDIT",
                        "amount" => $monthly_depreciation
                    ]
            ]
        ]);

        return redirect('/calculo-depreciaciones');
    }
}
