<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items =Item::all();
        // return $items;
        return view('item.index',compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        // return $categories;
        return view('item.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemRequest $request)
    {
        // return $request;
        $imgName = "default";
        if($request->hasFile('image')){
            $imgName = "gallery_".uniqid().'.'.$request->image->extension();
            $imageFile =  $request->image;
            $imageFile->storeAs('public/gallery',$imgName);
        }
        // return $imgName;
        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->amount = $request->amount;
        $item->category_id = $request->category_id;
        $item->expiredDate = $request->expiredDate;
        $item->image = $imgName;
        $item->save();


        return redirect()->route('item.index')->with('create', 'An item data created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return $item;
        return view('item.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        // return $item;
        $categories = Category::all();
        return view('item.edit',compact('item','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        // return $request;
        if($request->hasFile('image')){
            $updateImg = $request->image;
            $imageName = "gallery_".uniqid().'.'.$updateImg->extension();
            // return $imageName;
            $updateImg->storeAs('public/gallery',$imageName);

            $item->name = $request->name;
            $item->price = $request->price;
            $item->amount = $request->amount;
            $item->category_id = $request->category_id;
            $item->expiredDate = $request->expiredDate;
            $item->image = $imageName;
            $item->update();
        }
        $item->name = $request->name;
        $item->price = $request->price;
        $item->amount = $request->amount;
        $item->category_id = $request->category_id;
        $item->expiredDate = $request->expiredDate;
        $item->update();
        return redirect()->route('item.index')->with('update', 'The item data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        if($item){
            $item->delete();
            return redirect()->route('item.index')->with('delete', 'The item data deleted successfully.');
        }
        return redirect()->route('item.index')->with('delete', 'The item data delete failed.');
    }
}
