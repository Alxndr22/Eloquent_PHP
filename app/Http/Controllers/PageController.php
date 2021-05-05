<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Item;
use App\Models\Warehouse;


class PageController extends Controller {

    public function getMain() {
        return view('main', ['all_items' => DB::table('items')->get()]);
    }
    public function getTables() {
        $tb = DB::table('items')->where('type', '=', 'Стіл')->get();
        $items_ids = [];
        foreach ($tb as $tt) {
            $items_ids[] = Item::all()->find($tt->id)->owners;
        }

        return view('tables', ['tables' => $tb,
            'materials' => DB::table('items')->join('item__materials', 'items.id',
                '=', 'item__materials.item_id')->join('materials', 'item__materials.material_id',
                '=', 'materials.id')->where('items.type', '=', 'Стіл')->
            select('items.id as ids', 'materials.name as material')->get(), 'ow' => $items_ids]);
    }
    public function getWardrobes() {
        $wb = DB::table('items')->where('type', '=', 'Шафа')->get();
        $items_ids = [];
        foreach ($wb as $ww) {
            $items_ids[] = Item::all()->find($ww->id)->owners;
        }

        return view('wardrobes', ['wardrobes' => $wb,
            'materials' => DB::table('items')->join('item__materials', 'items.id',
                '=', 'item__materials.item_id')->join('materials', 'item__materials.material_id',
                '=', 'materials.id')->where('items.type', '=', 'Шафа')->
            select('items.id as ids', 'materials.name as material')->get(), 'ow' => $items_ids]);
    }
    public function getWarehouses() {
        $wh = DB::table('warehouses')->get();
        $items_ids = [];
        foreach ($wh as $ww) {
            $items_ids[] = Warehouse::all()->find($ww->id)->items;
        }

        return view('warehouses', ['warehouses' => $wh, 'items' => $items_ids]);
    }
    public function getSearch($field, $sch) {
        if ($field !== 'material') {
            return view('search', ['obj' => DB::table('items')->where("$field", '=', "$sch")->get(),
                'materials' => DB::table('items')->join('item__materials', 'items.id',
                    '=', 'item__materials.item_id')->join('materials', 'item__materials.material_id',
                    '=', 'materials.id')->select('items.id as ids', 'materials.name as material')->get()]);
        } else {
            return view('search', ['obj' => DB::table('items')->join('item__materials', 'items.id',
                '=', 'item__materials.item_id')->join('materials', 'item__materials.material_id',
                '=', 'materials.id')->where('materials.name', '=', "$sch")->
            select('items.*', 'materials.name as mat')->get(),
                'materials' => DB::table('items')->join('item__materials', 'items.id',
                    '=', 'item__materials.item_id')->join('materials', 'item__materials.material_id',
                    '=', 'materials.id')->select('items.id as ids', 'materials.name as material')->get()]);
        }
    }
}



//    foreach ($items_ids as $temp) {
//        foreach ($temp as $t)
//            echo $t;
//        //echo $t->surname;
//    }
