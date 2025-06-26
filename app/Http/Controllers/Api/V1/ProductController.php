<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Food;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function get_popular_products(Request $request)
    {
        $list = Food::where('type_is', 2)->take(10)->orderBy('created_at','DESC')->get();

        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] =$Content= preg_replace("/&#?[a-z0-9]+;/i","",$item['description']);
            unset($item['selected_people']);
            unset($item['people']);
        }

        return response()->json([
            'total_size' => $list->count(),
            'type_id' => 2,
            'offset' => 0,
            'products' => $list,
        ], 200);
    }

    public function get_recommended_products(Request $request)
    {
        $list = Food::where('type_is', 3)->take(10)->orderBy('created_at','DESC')->get();

        foreach ($list as $item) {
            $item['description'] = strip_tags($item['description']);
            $item['description'] =$Content= preg_replace("/&#?[a-z0-9]+;/i","",$item['description']);
            unset($item['selected_people']);
            unset($item['people']);
        }

        return response()->json([
            'total_size' => $list->count(),
            'type_id' => 3,
            'offset' => 0,
            'products' => $list,
        ], 200); 
    }
}



