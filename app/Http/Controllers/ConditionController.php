<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Condition;
use Illuminate\Http\Request;

class ConditionController extends Controller
{
    public function index()
    {
        $conditions = Condition::all();
        return view('conditions.index', compact('conditions'));
    }

    public function create()
    {
        $payload = request()->validate([
            'name' => 'required|string',
        ]);
        try {
            Condition::create($payload);
            return redirect()->back()->with('status', 'Data berhasil dibuat');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function update($conditionID)
    {
        $condition = Condition::find($conditionID);
        if (!$condition) {
            return redirect()->back()->with('status', 'Kondisi tidak ditemukan');
        }
        $payload = request()->validate([
            'name' => 'required|string',
        ]);
        try {
            $condition->update($payload);
            return redirect()->back()->with('status', 'Data berhasil diupdate');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function delete($conditionID)
    {
        $condition = Condition::find($conditionID);
        if (!$condition) {
            return redirect()->back()->with('status', 'Kondisi tidak ditemukan');
        }
        try {
            $condition->delete();
            return redirect()->back()->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function showTrashed()
    {
        $conditions = Condition::onlyTrashed()->get();
        return view('conditions.recycle-bin', compact('conditions'));
    }

    public function restore($conditionID)
    {
        $condition = Condition::onlyTrashed($conditionID)->first();
        if (!$condition) {
            return redirect()->back()->with('status', 'Kondisi tidak ditemukan');
        }
        try {
            $condition->restore();
            return redirect()->back()->with('status', 'Data berhasil direstore');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }

    public function forceDelete($conditionID)
    {
        $condition = Condition::onlyTrashed($conditionID)->first();
        if (!$condition) {
            return redirect()->back()->with('status', 'Kondisi tidak ditemukan');
        }
        try {
            $condition->forceDelete();
            return redirect()->back()->with('status', 'Data berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('status', $e->getMessage());
        }
    }
}
