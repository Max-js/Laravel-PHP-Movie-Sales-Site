<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesDataController extends Controller
{
    public function getTopTheaterBySales(Request $request)
    {
        $result = null;

        if ($request->isMethod('post')) {
            $validated = $request->validate([
                'sales_date' => 'required|date_format:m-d-Y|after_or_equal:11-08-2024|before_or_equal:11-10-2024',
            ]);

            $salesDate = \Carbon\Carbon::createFromFormat('m-d-Y', $validated['sales_date'])->toDateString();

            $result = Sales::getTopSalesByDate($salesDate);
        }

        return view('theaterSales', ['result' => $result]);
    }
}
