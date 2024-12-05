<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    public static function getTopSalesByDate($salesDate) {
        $result = DB::table('sales as s')
            ->join('theaters as t', 's.theater_id', '=', 't.id')
            ->select('s.theater_id', 't.name as theater_name', DB::raw('SUM(s.total_sales) as total_sales'), 's.sales_date')
            ->where('s.sales_date', '=', $salesDate)
            ->groupBy('s.theater_id', 't.name', 's.sales_date')
            ->orderByDesc(DB::raw('SUM(s.total_sales)'))
            ->limit(1)
            ->first();

            return($result);
    }
}
