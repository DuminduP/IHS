<?php

namespace App\Http\Controllers;

use App\Models\Grievance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{

    public function dashboard()
    {
        $all = Grievance::all();
        $done = Grievance::where('status', 'done')->get();
        $data['grievances_count'] = count($all);
        $data['grievances_completed'] = count($done);
        $data['grievances_new'] = Grievance::where('status', 'open')->count();
        $data['grievances_inp'] = Grievance::where('status', 'In-prograss')->count();
        $data['grievances_weekly'] = $this->getWeeklyCount($all);
        $data['grievances_new_monthly'] = $this->getMonthlyCount($all);
        $data['grievances_done_monthly'] = $this->getMonthlyCount($done);
       
        return view('dashboard', $data);
    }

    private function getMonthlyCount(Collection $grievances): array
    {
        $month = ['Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0, 'Aug' => 0, 'Sep' =>0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0];
        foreach($grievances as $grievance)  {
            $month[$grievance->created_at->shortEnglishMonth] += 1;
        }
        return $month;
    }

    private function getWeeklyCount(Collection $grievances): array
    {
        $week = ['Mo' => 0, 'Tu' => 0, 'We' => 0, 'Th' => 0, 'Fr' => 0, 'Sa' => 0, 'Su' => 0 ];
        foreach($grievances as $grievance)  {
            $week[$grievance->created_at->minDayName] += 1;
        }
        return $week;
    }
   

}
