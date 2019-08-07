<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        $start = $request->input('start');
        $n = $request->input('n');
        $level = $request->input('level');
        $score = $request->input('score');
        $query = Player::with('level')
            ->select('players.*')
            ->leftJoin('levels', 'players.level_id', '=', 'levels.id');

        if ($start === null || $n === null) {
            return response()->json(null, 400);
        } 
            $query->offset($start)
                ->limit($n);
                if ($level) {
                    $query->where('levels.name', $level)
                        ->orderBy('levels.name');
                }
            return $players = $query->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $player = Player::create($request->all());
        return response()->json($player, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Player::findOrFail($id);
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
        $player = Player::findOrFail($id);
        $player->update($request->all());
        return response()->json($player, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return response()->json(null, 204);
    }
}
