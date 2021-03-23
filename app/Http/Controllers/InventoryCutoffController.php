<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class InventoryCutoffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::select('SELECT convert(date,Cutoffdate) as date,count(itemID) as Item_Count from InventoryDaily
        group by Cutoffdate');
    }

    public function inventoryItems()
    {
        return DB::select('select ID,ItemName from Item');
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
        $arr = [];
        $val = $request->all();

        foreach ($val as $value) {
            DB::insert('insert into InventoryDaily (Cutoffdate, itemID, Quantity) values (?, ?, ?)',
                [
                    $value['date'],
                    $value['itemID'],
                    $value['quantity'],
                ]);
        }

        return '!';
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
    public function destroy($id)
    {
        //
    }
}
