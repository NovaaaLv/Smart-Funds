<?php

namespace App\Charts;

use App\Models\Deposit;
use App\Models\Expenses;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardChart
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
        $dataTotalIncome = [];

        for ($i = 1; $i <= $bulan; $i++) {
            // expenses
            $totalExpenses = Expenses::where('user_id', $userId)
                ->whereYear('date', $tahun)
                ->whereMonth('date', $i)
                ->sum('total');

            // deposit
            $totalIncome = Deposit::where('user_id', $userId)
                ->whereYear('date', $tahun)
                ->whereMonth('date', $i)
                ->sum('income');


            if ($totalIncome > 0 || $totalExpenses > 0) {

                $dataBulan[] = Carbon::create()->month($i)->format('F');
                $dataTotalIncome[] = $totalIncome;
                $dataTotalExpenses[] = $totalExpenses;
            }
        }

        // Membuat chart hanya untuk bulan yang ada datanya
        return $this->chart->areaChart()
            ->setTitle('Monthly Expenses & Deposits')
            ->addArea('Total Deposit', $dataTotalIncome)
            ->addArea('Total Expenses', $dataTotalExpenses)
            ->setXAxis($dataBulan)
            ->setHeight(400)
            ->setColors(['#0d9488', '#b91c1c'])
            ->toVue();
    }
}
