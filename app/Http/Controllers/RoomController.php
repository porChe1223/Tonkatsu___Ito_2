<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function joinRoom(Request $request)
    {
        // 既存の空き部屋を探す
        $room = Room::where('status', 'waiting')->first();

        if (!$room) {
            // 新しい部屋を作成
            $room = Room::create([
                'status' => 'waiting'
            ]);
        }

        // 部屋に参加者を追加
        RoomUser::firstOrCreate([
            'room_id' => $room->id,
            'user_id' => Auth::id(),
        ]);

        // もし2人揃ったら、部屋のステータスを変更してgameroomにリダイレクト
        if ($room->participants()->count() == 2) {
            $room->update(['status' => 'full']);
            return redirect()->route('games.gameroom', ['room' => $room->id]);
        }

        // 2人になるまで待機画面に移行
        return view('games.matching', ['room' => $room]);
    }

    public function gameRoom(Room $room)
    {
        return view('games.gameroom', ['room' => $room]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
