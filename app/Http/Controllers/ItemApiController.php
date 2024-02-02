<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        // return $items;
        return response()->json($items);
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
        $item = new Item();
        // return $request;

        //for validation
        // if($request->validate([
        //     'category_id' => 'exists:categories,id|integer',
        // ]))
        // {
        //     return "working";
        // }
        // return "passed";

        $imgName = "default";
        if($request->image){
            $image = $request->image;
            $imgName = "gallery_".uniqid().'.'.$image->extension();
            $image->storeAs('public\gallery',$imgName);
        }
        $item->name = $request->name;
        $item->price = $request->price;
        $item->amount = $request->amount;
        $item->category_id = $request->category_id;
        $item->expiredDate = $request->expiredDate;
        $item->image = $imgName;
        $item->save();
        return response()->json("Item stored successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        if($item){
            return response()->json($item);
        }
        return response()->json("Item not found!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::find($id);
        if($item){
            return response()->json($item);
        }
        return response()->json("Item not found!");
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
        // return $request;
        $item = Item::find($id);
        if($item){
            if($request->image){
                $image = $request->image;
                $imgName = "gallery_".uniqid().'.'.$image->extension();
                $image->storeAs('public/gallery',$imgName);

                $item->name = ($request->name != null)? $request->name : $item->name;
                $item->price = ($request->price != null)? $request->price : $item->price;
                $item->amount = ($request->amount != null)? $request->amount : $item->amount;
                $item->category_id = ($request->category_id != null)? $request->category_id : $category_id;
                $item->expiredDate = ($request->expiredDate != null)? $request->expiredDate : $expiredDate;
                $item->image = $imgName;
                $item->update();
                return response()->json("Update Item successfully.");
            }

                $item->name =        ($request->name != null)?        $request->name        : $item->name;
                $item->price =       ($request->price != null)?       $request->price       : $item->price;
                $item->amount =      ($request->amount != null)?      $request->amount      : $item->amount;
                $item->category_id = ($request->category_id != null)? $request->category_id : $item->category_id;
                $item->expiredDate = ($request->expiredDate != null)? $request->expiredDate : $item->expiredDate;
                $item->update();
                return response()->json("Update Item successfully.");
        }
        return response()->json("Item can't be updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if($item){
            $item->delete();
            return response()->json("Item deleted successfully.");
        }
        return response()->json("Deleting Item failed.");
    }
}
