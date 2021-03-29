<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use DB;

class InventoryController extends Controller
{
    public function index()
    {
        $data = DB::select("SELECT c.Cutoffdate,a.recId,b.ItemName,a.quantity,isnull((a.quantity-c.Quantity)*100.0 / nullif(a.quantity,0),0) as diff
        from Inventory a
        left join item b
        on a.ItemID = b.ID
		left join InventoryDaily c 
		on c.itemID = a.ItemID
		where c.Cutoffdate = dateadd(DAY,-1,convert(date,getdate()))");

        return response()->json($data);
    }
}
