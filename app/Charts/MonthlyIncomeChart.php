<?php

namespace App\Charts;

use App\Models\Deposit;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class MonthlyIncomeChart
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
        $dataTotalIncome = [];

        for ($i = 1; $i <= $bulan; $i++) {
            $totalIncome = Deposit::where('user_id', $userId)
                ->whereYear('date', $tahun)
                ->whereMonth('date', $i)
                ->sum('income');

            $dataBulan[] = Carbon::create()->month($i)->format('F');
            $dataTotalIncome[] = $totalIncome;
        }

        // Membuat chart
        return $this->chart->areaChart()
            ->setTitle('Monthly Income')
            ->addArea('Total Income', $dataTotalIncome)
            ->setXAxis($dataBulan)
            ->setHeight(200)
            ->setColors(['#ffc63b'])
            ->toVue();
    }
}
