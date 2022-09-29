<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Room;
use App\Models\Barang;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Keterangan;
use Illuminate\Http\Request;
use App\Exports\BarangExport;
use App\Http\Requests\BarangRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\SearchTahunRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Http\Requests\SearchRuanganRequest;

class BarangController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        $rooms = Room::all();
        $keterangan = Keterangan::all();
        $barang = Barang::with('categories', 'conditions', 'rooms', 'keterangan')->get();
        return view('barang.index', compact('barang', 'categories', 'conditions', 'rooms', 'keterangan'));
    }

    public function create()
    {
        $categories = Category::all();
        $conditions = Condition::all();
        $rooms = Room::all();
        $keterangan = Keterangan::all();
        return view('barang.create', compact('categories', 'conditions', 'rooms', 'keterangan'));
    }

    public function handleUploadImage($request)
    {
        $banner = $request->file('image');
        $name = hexdec(uniqid()) . '.' . $banner->getClientOriginalExtension();
        $banner->move(public_path('uploads/dokumentasi/'), $name);
        $path = 'uploads/dokumentasi/' . $name;

        return $path;
    }

    public function store(BarangRequest $request)
    {
        $payload = $request->validated();
        $path = $this->handleUploadImage($request);
        $payload['dokumentasi'] = $path;
        try {
            Barang::create($payload);
            return redirect()->back()->with('status', 'Input berhasil');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function showUpdate($barangID)
    {
        $barang = Barang::find($barangID);
        if (!$barang) {
            return redirect()->back()->with('status', 'Barang tidak ditemukan');
        }
        $categories = Category::all();
        $conditions = Condition::all();
        $rooms = Room::all();
        $keterangan = Keterangan::all();
        return view('barang.update', compact('categories', 'conditions', 'rooms', 'keterangan', 'barang'));
    }

    public function searchTahun()
    {
        return view('barang.search-tahun');
    }

    public function searchTahunResult(SearchTahunRequest $request)
    {
        $payload = $request->validated();
        $barang = Barang::with('categories', 'conditions', 'rooms', 'keterangan')->where('tahun_perolehan', $payload['tahun'])->get();
        if (sizeof($barang) == 0) {
            return redirect()->back()->with('status', 'Data barang berdasarkan tahun tidak ditemukan, silahkan coba lagi');
        }
        $categories = Category::all();
        $conditions = Condition::all();
        $rooms = Room::all();
        $keterangan = Keterangan::all();
        return view('barang.index', compact('barang', 'categories', 'conditions', 'rooms', 'keterangan'));
    }

    public function searchRuangan()
    {
        $rooms = Room::all();
        return view('barang.search-ruang', compact('rooms'));
    }

    public function searchRuanganResult(SearchRuanganRequest $request)
    {
        $payload = $request->validated();
        $barang = Barang::with('categories', 'conditions', 'rooms', 'keterangan')->where('room_id', $payload['ruangan'])->get();
        if (sizeof($barang) == 0) {
            return redirect()->back()->with('status', 'Data barang berdasarkan ruangan tidak ditemukan, silahkan coba lagi');
        }
        $categories = Category::all();
        $conditions = Condition::all();
        $rooms = Room::all();
        $keterangan = Keterangan::all();
        return view('barang.index', compact('barang', 'categories', 'conditions', 'rooms', 'keterangan'));
    }

    public function updateBarang(UpdateBarangRequest $request, $barangID)
    {
        $barang = Barang::find($barangID);
        if (!$barang) {
            return redirect()->back()->with('status', 'Barang tidak ditemukan');
        }
        $payload = $request->validated();
        if (request()->hasFile('image')) {
            $path = $this->handleUploadImage($request);
            $payload['dokumentasi'] = $path;
        }
        try {
            $barang->update($payload);
            return redirect('barang')->with('status', 'Barang berhasil diupdate');
        } catch (Exception $e) {
            return redirect('barang')->with('status', $e->getMessage());
        }
    }

    public function deleteBarang($barangID)
    {
        $barang = Barang::find($barangID);
        if (!$barang) {
            return redirect()->back()->with('status', 'Barang tidak ditemukan');
        }
        try {
            $barang->delete();
            return redirect('barang')->with('status', 'Barang berhasil dihapus');
        } catch (Exception $e) {
            return redirect('barang')->with('status', $e->getMessage());
        }
    }

    public function excel()
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }

    public function references()
    {
        return response()->download(public_path('Inventarisasi Aset SIMA v.2.accdb'));
    }

    public function referensi()
    {
        return view('reference.index');
    }
}
