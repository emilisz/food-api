<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::with('ingredients')->get();

        return \response($foods, 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $food = new Food;
        $food->title = $request->title;
        $food->description = $request->description;
        $food->save();

        $food->ingredients()->attach($request->ingredients);

        return \response()->json(['message' => 'New food created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Food::where('id', $id)->exists()) {
            $food = Food::where('id', $id)->with('ingredients')->get();
            return \response()->json($food, 200);
        } else {
            return response()->json([
                "message" => "Food not found"
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Food::where('id', $id)->exists()) {
            $food = Food::find($id);
            $food->title = is_null($request->title) ? $food->title : $request->title;
            $food->description = is_null($request->description) ? $food->description : $request->description;
            $food->save();

            $food->ingredients()->sync($request->ingredients);

            return response()->json([
                "message" => "record updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Food not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Food::where('id', $id)->exists()) {
            Food::find($id)->delete();

            return response()->json([
                "message" => "record deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Food not found"
            ], 404);
        }
    }
}
