<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $items = Item::latest();
        $categories =Category::all();
        if($name = request()->name){
            $items->where('name','like',"%$name%");
        }
        if($category_id = request()->category){
            $items->where('category_id',$category_id);
        }
        $items = $items->paginate(10);
        return view('home',compact('items','categories'));
    }

    public function detail($id){
        $item =Item::where('id',$id)->first();
        return view('item.detail',compact('item'));
    }

    public function products(){
        $items = Item::latest();
        $categories =Category::all();

        if($name = request()->name){
            $items->where('name','like',"%$name%");
        }
        if($category_id = request()->category){
            $items->where('category_id',$category_id);
        }
        if($min_price = request()->min_price){
            $items->where('price','>=',$min_price);
        }
        if($max_price = request()->max_price){
            $items->where('price','<=',$max_price);
        }
        if($condition = request()->condition){
            $items->where('condition',$condition);
        }
        if($type = request()->type){
            $items->where('type',$type);
        }

        $items = $items->paginate(10);
        return view('item.index',compact('items','categories'));
    }
}
