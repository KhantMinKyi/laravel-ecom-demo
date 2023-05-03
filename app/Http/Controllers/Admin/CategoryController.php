<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(9);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required|string',
            'photo'=>'required|mimes:jpg,jpeg,png|max:2048'
        ]);
        $file = request()->file('photo');
        $file_name = uniqid().$file->getClientOriginalName();
        $file->move(public_path('/images/Category/'),$file_name);
        if($request->status == null){
            $status = 'none';
        }else{
            $status = $request->status;
        }
        Category::create([
            'name'=>$request->name,
            'photo'=>$file_name,
            'status'=>$status
        ]);
        return redirect()->back()->with('success','Category Created Successfully');
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
        $category = Category::where('id',$id)->first();

        return view('admin.category.edit',compact('category'));
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
            'name'=>'required|string'
        ]);
        $category=Category::where('id',$id)->first();
        if(!$category){
            return redirect()->back()->with('error','No Category Found');
        }

        // Check Photo
        if($file=$request->file('photo')){
            $file_name=uniqid().$file->getClientOriginalName();
            $file->move(public_path('/images/Category/'),$file_name);
            File::delete(public_path('/images/Category/'.$category->photo));
        }else{
            $file_name =$category->photo;
        }
        if($request->status == null){
            $status = 'none';
        }else{
            $status = $request->status;
        }
        $category->update([
            'name'=>$request->name,
            'photo'=>$file_name,
            'status'=>$status
        ]);
        return redirect()->back()->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::where('id',$id)->first();
        File::delete(public_path('/images/Category/'.$category->photo));
        Item::where('category_id',$id)->delete();

        $category->delete();
        return redirect()->back()->with('success','Category Deleted');
    }
}
