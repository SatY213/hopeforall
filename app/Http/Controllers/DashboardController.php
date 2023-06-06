<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Needer;
use App\Models\Donation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  
     public function index(Request $request)
    {
        $month = null;
        $year = null;

          if ($request->has('year') && $request->has('month')) {
           $month = $request->input('month');
           $year = $request->input('year');
          }

        $histogramData = [
            'labels' => [],
            'data' => [],
        ];
    
        if ($year && $month) {
            $donations = Donation::selectRaw('DAY(created_at) as day, SUM(amount) as total')
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month)
                ->groupBy('day')
                ->orderBy('day')
                ->get();
    
            if (!$donations->isEmpty()) {
                foreach ($donations as $donation) {
                    $histogramData['labels'][] = $donation->day;
                    $histogramData['data'][] = $donation->total;
                }
            }
        } else {
            $currentYear = date('Y');
        
            $donations = Donation::selectRaw('MONTH(created_at) as month, SUM(amount) as total')
                        ->whereYear('created_at', $currentYear)
                        ->groupBy('month')
                        ->orderBy('month')
                        ->get();
    
            if (!$donations->isEmpty()) {
                foreach ($donations as $donation) {
                    $histogramData['labels'][] = date('F', mktime(0, 0, 0, $donation->month, 1));
                    $histogramData['data'][] = $donation->total;
                }
            }
        }
    
        $jsData = json_encode($histogramData);
        
return view('dashboard', compact('jsData', 'year', 'month') ?? []);
    }
}