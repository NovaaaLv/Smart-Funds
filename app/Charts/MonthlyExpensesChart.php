<?php

namespace App\Charts;

use App\Models\Expenses;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MonthlyExpensesChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build()
    {
        $tahun = date('Y');
        $bulan = date('m');
        $userId = Auth::id();

        $dataBulan = [];
        $dataTotalExpenses = [];

        for ($i = 1; $i <= $bulan; $i++) {
            $totalExpenses = Expenses::where('user_id', $userId)
                ->whereYear('date', $tahun)
                ->whereMonth('date', $i)
                ->sum('total');

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalExpenses[] = $totalExpenses;
        }

        // Membuat chart
        return $this->chart->areaChart()
            ->setTitle('Monthly Expenses')
            ->addArea('Total Expenses', $dataTotalExpenses)
            ->setXAxis($dataBulan)
            ->setHeight(200)
            ->setColors(['#ffc63b'])
            ->toVue();
    }
}
