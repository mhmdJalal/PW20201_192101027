<?php

namespace App\Http\Controllers;

use App\Models\Lks;
use Illuminate\Http\Request;

class CekStockController extends Controller
{
    public function index()
    {
        $lksList = Lks::all();
        return view('cekstock', compact('lksList'));
    }
}
