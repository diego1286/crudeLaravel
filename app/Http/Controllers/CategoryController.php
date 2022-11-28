<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function hello(){

        return  response()->json([
            'message' =>'hola'
        ]);

    }

    public function firstCategory()
    {
        $category = Category:: all()->toArray();

        return response()->json(
            [
                'code' => 200,
                'status' => 'true',
                'data' => $category
            ]
        );
    }

    public function store(Request $request)
    {
        dd($request->all());
         $category = new Category();

         $category->name = $request->name;
        $category->description = $request->description;

         $category->save();



        Category::create($request->all());

    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->description = 'Pizzas y pastas';

        $category->save();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }


}
