<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

class BarangExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements WithCustomValueBinder, FromView, WithDrawings, ShouldAutoSize
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    public function drawings()
    {
        $barang = Barang::all();
        $images = array();
        foreach ($barang as $key => $b) {
            $drawing = new Drawing();
            $drawing->setName('Logo');
            $drawing->setDescription('This is my logo');
            $drawing->setPath(public_path($b->dokumentasi));
            $drawing->setHeight(90);
            $drawing->setCoordinates('N' . $key + 2);
            array_push($images, $drawing);
        }
        return $images;
    }

    public function  view(): View
    {
        return view('barang.barang-export', [
            'barang' => Barang::all(),
        ]);
    }
}
