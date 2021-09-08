<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use App\Models\OnlineStore;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewSellerApplicationRequest;

class SellerController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewSellerApplicationRequest $request)
    {
        $validatedData = $request->validated();
        $seller = Seller::create($validatedData['seller']);

        if($request->get('online_stores') != null)
        {
            //-- Updates or Creates OnlineStores and returns a collection of their id's
            //-- for attachment to the seller
            $onlineStores = collect(explode(',', $request->get('online_stores')))
                ->map( function($storeUrl){
                    return OnlineStore::updateOrCreate(['url' => $storeUrl])->id;
                });

            $seller->onlineStores()->attach($onlineStores->all());
        }

        return response($seller);
    }
}
