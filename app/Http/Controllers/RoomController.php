<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;

class RoomController extends Controller
{
    public function getRooms($id)
{
    $rooms = Room::select('id', 'description')->where('type_id', $id)->where('availability', 0)->get();

    return response()->json([
        'success' => true,
        'data' => $rooms
    ]);
}
}
