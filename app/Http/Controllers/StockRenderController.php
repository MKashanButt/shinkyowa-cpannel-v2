<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockRenderController extends Controller
{
    public function index()
    {
        $stock = Stock::with('make', 'bodyType', 'category', 'currency', 'country')->paginate(10);
        return request()->json($stock);
    }
}
