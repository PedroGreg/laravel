<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $response = Product::all();
        return response()->json($response);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->hasFile('foto') && $request->file('foto')->isValid()) {
            
            $caminho = $request->file('foto')->store('produtos', 'public');

            $data['foto'] = $caminho;
        }
        
        $product = Product::create($data);
        return response()->json($product, 201);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(["message" => "Produto não existe"], 404);
        } else {
            return response()->json($product, 200);
        }
    }

    public function update(Request $request, $id){
        $product = Product::find($id);
        if (!$product) {
            return response()->json(["message"=> ""],404);
        }
        $product->update($request->all());
        return response()->json($product, 200);
    }

    public function destroy($id){
        $product = Product::find($id);
        if (!$product){
            return response()->json(["message"=> "O produto não existe"],404);
        }
        else{
            $product->delete();
            return response()->json(["message" => "O produto {$product->nome} foi deletado!"], 200);
        }
    }
}
