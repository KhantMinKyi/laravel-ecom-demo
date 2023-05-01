<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
            'condition'=>'required',
            'type'=>'required',
            'photo'=>'required|mimes:jpg,jpeg,png',
            'owner_name'=>'required',
            'owner_phone'=>'required',
            'owner_address'=>'required',
        ]);
        $file = request()->file('photo');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images/Items/'),$file_name);

        $owner = Owner::create([
            'name'=>$request->owner_name,
            'phone'=>$request->owner_phone,
            'address'=>$request->owner_address,
            'latitude'=>'96.45645645456',
            'longitude'=>'16.1231231231',
        ]);

        Item::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'status'=>$request->status,
            'description'=>$request->description,
            'condition'=>$request->condition,
            'type'=>$request->type,
            'photo'=>$file_name,
            'owner_id'=>$owner->id,
        ]);
        return redirect()->back()->with('success','Items Created Successfully');
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
        $categories=Category::all();
        $item=Item::where('id',$id)->first();
        if(!$item){
            return redirect()->back()->with('error','Item Not Found');
        }
        return view('admin.item.edit',compact('item','categories'));
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
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'price'=>'required',
            'description'=>'required',
            'condition'=>'required',
            'type'=>'required',
            'photo'=>'mimes:jpg,jpeg,png',
            'owner_name'=>'required',
            'owner_phone'=>'required',
            'owner_address'=>'required',
        ]);
        $item=Item::where('id',$id)->first();
        if(!$item){
            return redirect()->back()->with('error','No Item Found');
        }
        $owner=Owner::where('id',$item->owner->id)->first();
                // Check Photo
                if($file=$request->file('photo')){
                    $file_name=uniqid().$file->getClientOriginalName();
                    $file->move(public_path('/images/Items/'),$file_name);
                    File::delete(public_path('/images/Items/'.$item->photo));
                }else{
                    $file_name =$item->photo;
                }
        $item->update([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'price'=>$request->price,
            'status'=>$request->status,
            'description'=>$request->description,
            'condition'=>$request->condition,
            'type'=>$request->type,
            'photo'=>$file_name,
            'owner_id'=>$owner->id,
        ]);
        $owner->update([
            'name'=>$request->owner_name,
            'phone'=>$request->owner_phone,
            'address'=>$request->owner_address,
            'latitude'=>'96.45645645456',
            'longitude'=>'16.1231231231',
        ]);
        return redirect()->back()->with('success','Items Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=Item::where('id',$id)->first();
        File::delete(public_path('/images/Items/'.$item->photo));
        Owner::where('id',$item->owner->id)->delete();

        $item->delete();
        return redirect()->back()->with('success','Item Deleted');
    }
}
