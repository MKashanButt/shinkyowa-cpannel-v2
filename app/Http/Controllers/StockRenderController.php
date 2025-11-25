<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Country;
use App\Models\Make;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockRenderController extends Controller
{
    public function index()
    {
        $stock = Stock::with('make', 'bodyType', 'category', 'currency', 'country')->paginate(6);
        return response()->json($stock);
    }

    public function byCategory()
    {
        $stocks = Stock::with('make', 'bodyType', 'category', 'currency', 'country')
            ->orderBy('id', 'DESC')
            ->limit(8)
            ->get()
            ->groupBy(fn($stock) => $stock->category->name ?? 'Uncategorized');

        return response()->json($stocks);
    }
    public function single($id)
    {
        $stock = Stock::with('make', 'bodyType', 'category', 'currency', 'country')->findOrFail($id);

        return response()->json($stock);
    }

    public function totalStock()
    {
        $count = Stock::count();

        return response()->json($count);
    }

    public function makes()
    {
        $makes = Make::all();

        return response()->json($makes);
    }

    public function makesCount()
    {
        $makes = Make::withCount('stock')
            ->orderBy('name')
            ->get()
            ->mapWithKeys(function ($make) {
                return [
                    $make->name => $make->stock_count
                ];
            });

        $bodytype = BodyType::withCount('stock')
            ->orderBy('name')
            ->get()
            ->mapWithKeys(function ($bodytype) {
                return [
                    $bodytype->name => $bodytype->stock_count
                ];
            });

        $mergedCount = $makes->union($bodytype);

        return response()->json($mergedCount);
    }
    public function countryCount()
    {
        $country = Country::withCount('stock')
            ->orderBy('name')
            ->get()
            ->mapWithKeys(function ($country) {
                return [
                    $country->name => $country->stock_count,
                ];
            });

        return response()->json($country);
    }

    public function vehicleOfTheDay()
    {
        $stock = Stock::with('make', 'bodyType', 'category', 'currency', 'country')
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();

        return response()->json($stock);
    }

    public function filterOptions()
    {
        $filterOptions = [
            'make' => Make::distinct()->get(),
            'model' => Stock::select('model')->distinct()->get(),
            'year' => Stock::select('year')->distinct()->orderBy('year', 'ASC')->get(),
        ];

        return response()->json($filterOptions);
    }
}
