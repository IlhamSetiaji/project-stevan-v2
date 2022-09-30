<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $payload = request()->validate([
            'name' => 'required|string',
        ]);
        try {
            Category::create($payload);
            return redirect()->back()->with('status', 'Data berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function update($categoryID)
    {
        $category = Category::find($categoryID);
        if (!$category) {
            return redirect()->back()->with('status', 'Category tidak ditemukan');
        }
        $payload = request()->validate([
            'name' => 'required|string',
        ]);
        try {
            $category->update($payload);
            return redirect()->back()->with('status', 'Data berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function delete($categoryID)
    {
        $category = Category::find($categoryID);
        if (!$category) {
            return redirect()->back()->with('status', 'Category tidak ditemukan');
        }
        try {
            $category->delete();
            return redirect()->back()->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function showTrashed()
    {
        $categories = Category::onlyTrashed()->get();
        return view('categories.recycle-bin', compact('categories'));
    }

    public function restore($categoryID)
    {
        $category = Category::onlyTrashed($categoryID)->first();
        if (!$category) {
            return redirect()->back()->with('status', 'Category tidak ditemukan');
        }
        try {
            $category->restore();
            return redirect()->back()->with('status', 'Data berhasil direstore');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function forceDelete($categoryID)
    {
        $category = Category::onlyTrashed($categoryID)->first();
        if (!$category) {
            return redirect()->back()->with('status', 'Category tidak ditemukan');
        }
        try {
            $category->forceDelete();
            return redirect()->back()->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }
}
