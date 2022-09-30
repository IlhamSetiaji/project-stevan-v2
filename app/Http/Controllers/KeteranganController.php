<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Keterangan;
use Illuminate\Http\Request;

class KeteranganController extends Controller
{
    public function index()
    {
        $keterangan = Keterangan::all();
        return view('keterangan.index', compact('keterangan'));
    }

    public function create()
    {
        $payload = request()->validate([
            'name' => 'required|string',
        ]);
        try {
            Keterangan::create($payload);
            return redirect()->back()->with('status', 'Data berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function update($keteranganID)
    {
        $keterangan = Keterangan::find($keteranganID);
        if (!$keterangan) {
            return redirect()->back()->with('status', 'Keterangan tidak ditemukan');
        }
        $payload = request()->validate([
            'name' => 'required|string',
        ]);
        try {
            $keterangan->update($payload);
            return redirect()->back()->with('status', 'Data berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function delete($keteranganID)
    {
        $keterangan = Keterangan::find($keteranganID);
        if (!$keterangan) {
            return redirect()->back()->with('status', 'Keterangan tidak ditemukan');
        }
        try {
            $keterangan->delete();
            return redirect()->back()->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function showTrashed()
    {
        $keterangan = Keterangan::onlyTrashed()->get();
        return view('keterangan.recycle-bin', compact('keterangan'));
    }

    public function restore($keteranganID)
    {
        $keterangan = Keterangan::onlyTrashed($keteranganID)->first();
        if (!$keterangan) {
            return redirect()->back()->with('status', 'Keterangan tidak ditemukan');
        }
        try {
            $keterangan->restore();
            return redirect()->back()->with('status', 'Data berhasil direstore');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function forceDelete($keteranganID)
    {
        $keterangan = Keterangan::onlyTrashed($keteranganID)->first();
        if (!$keterangan) {
            return redirect()->back()->with('status', 'Keterangan tidak ditemukan');
        }
        try {
            $keterangan->forceDelete();
            return redirect()->back()->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }
}
