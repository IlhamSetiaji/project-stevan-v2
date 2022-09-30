<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $payload = request()->validate([
            'name' => 'required|string',
        ]);
        try {
            Room::create($payload);
            return redirect()->back()->with('status', 'Data berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function update($roomID)
    {
        $room = Room::find($roomID);
        if (!$room) {
            return redirect()->back()->with('status', 'Ruangan tidak ditemukan');
        }
        $payload = request()->validate([
            'name' => 'required|string',
        ]);
        try {
            $room->update($payload);
            return redirect()->back()->with('status', 'Data berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function delete($roomID)
    {
        $room = Room::find($roomID);
        if (!$room) {
            return redirect()->back()->with('status', 'Ruangan tidak ditemukan');
        }
        try {
            $room->delete();
            return redirect()->back()->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function showTrashed()
    {
        $rooms = Room::onlyTrashed()->get();
        return view('rooms.recycle-bin', compact('rooms'));
    }

    public function restore($roomID)
    {
        $room = Room::onlyTrashed($roomID)->first();
        if (!$room) {
            return redirect()->back()->with('status', 'Ruangan tidak ditemukan');
        }
        try {
            $room->restore();
            return redirect()->back()->with('status', 'Data berhasil direstore');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function forceDelete($roomID)
    {
        $room = Room::onlyTrashed($roomID)->first();
        if (!$room) {
            return redirect()->back()->with('status', 'Ruangan tidak ditemukan');
        }
        try {
            $room->forceDelete();
            return redirect()->back()->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }
}
