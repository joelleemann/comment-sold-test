<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Matrix\Builder;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalInventory = Auth::user()->inventory()->sum('quantity');

        $query = Auth::user()->inventory()->with('product')->orderBy('product_name', 'asc');
        $appends = [];

        if (request('query')) {  // filter by sku or product name
            $query->where('sku', 'like', '%' . request('query') . '%');
            $query->orWhere('product_name', 'like', '%' . request('query') . '%');
            $appends['query'] = request('query');
        }

        if (request('low-stock')) { // return only low stock skus <= 10
            $query->lowStock();
            $appends['low-stock'] = 1;
        }
        $inventory = $query->paginate(20);

        if (!empty($appends)) {
            $inventory->appends($appends);
        }

        return view('inventory.index', ['totalCount' => $totalInventory, 'inventory' => $inventory, 'hasFilters' => !empty($appends)]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show(Inventory $inventory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventory $inventory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventory $inventory)
    {
        //
    }
}
