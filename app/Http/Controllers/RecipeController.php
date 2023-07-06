<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('recipe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'ingredient' => 'required',
            'step' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $fileName = auth()->user()->id . $request['title'] . '.' . $request->image->extension();
        $request->image->move(public_path() . '/images', $fileName);
        $validate['image'] = $fileName;
        // dd($validate);
        Recipe::create($validate);
        return redirect()->route('dashboard')->with('create', 'succes');
    }

    public function liking($id)
    {
        // auth()->user->like($recipe);

        $user = User::find(auth()->user()->id);
        $hasLike = $user->likes()->where('recipe_id', $id)->first();
        if ($hasLike) {
            $user->likes()->detach($id);
            return redirect()->back()->with('unlike', 'success');
        } else {
            $user->likes()->attach($id);
            return redirect()->back()->with('like', 'success');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        //
        $resep = Recipe::find($recipe->id);
        return view('recipe.index', compact('resep'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
