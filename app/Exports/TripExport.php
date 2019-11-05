<?php

namespace App\Exports;

use App\Models\Trip;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TripExport implements FromView
{

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function view(): View
    {
        return view('exports.trips', [
            'positions' => $this->data
        ]);
    }

}