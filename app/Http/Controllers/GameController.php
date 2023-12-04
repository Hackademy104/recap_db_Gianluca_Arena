<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function create()
    {
        $categories = Category::all();

        return view('games.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $game = Game::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
        ]);
        if ($request->img) {
            $game->img = $request->file('img')->store('public/games/img');
            $game->save();
        }

        $game->categories()->attach($request->categories);
        return redirect(route('index'));
    }
    public function index(){

        $games = Game::all()->sortByDesc('created_at');

        return view('games.index', compact('games'));
    }
    public function show(Game $game){

        return view('games.show', compact('game'));
    }
    public function edit(Game $game){
        $categories = Category::all();
        return view('games.edit', compact('game', 'categories'));
    }
    public function update(Request $request, Game $game){
        
        $game->update([
            $game->name = $request->name,
            $game->price = $request->price,
            $game->description = $request->description,
        ]);

        if($request->img){
            $game->img = $request->file('img')->store('public/games/img');
            $game->save();
        }

        $game->categories()->sync($request->categories);

        return redirect(route('index'));
    }

    public function delete(Game $game){

        $game->categories()->detach();
        $game->delete();

        return redirect(route('index'));
    }
}
