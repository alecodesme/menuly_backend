<?php

namespace App\Http\Controllers;

use App\Http\Requests\Requests\Ingredient\StoreIngredientRequest;
use App\Models\Ingredient;
use Illuminate\Support\Facades\Auth;

class IngredientController extends Controller
{

    public function index()
    {
        $ingredients = Auth::user()->ingredients;

        return response()->json([
            'ingredients' => $ingredients
        ]);
    }

    public function store(StoreIngredientRequest $request)
    {
        $user = Auth::user();
        $ingredient = Ingredient::create([
            'user_id' => $user->id,
            ...$request->validated()
        ]);

        return response()->json([
            'success' => true,
            'data' => $ingredient
        ], 201);
    }
}
