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
        $data['grievances_category'] = $this->getCategoryPercent($all);
        $data['grievances_status'] = $this->getStatusPercent($all);
        $data['grievances_district'] = $this->getDistrictPercent($all);
       
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
   
    private function getCategoryPercent(Collection $grievances): array
    {
        $cat = [];
        foreach($grievances as $grievance)  {
            if($grievance->grievance_type_id > 0)   {
                if(!isset($cat[$grievance->category->type])) {
                    $cat[$grievance->category->type] = 0;
                }
                $cat[$grievance->category->type] += 1;
            }
        }
        $sum = array_sum($cat);
        foreach($cat as &$ct)    {
            $ct = round(($ct/$sum)*100);
        }
        return $cat;
    }
   
    private function getStatusPercent(Collection $grievances): array
    {
        $cat = [];
        foreach($grievances as $grievance)  {
                if(!isset($cat[$grievance->status])) {
                    $cat[$grievance->status] = 0;
                }
                $cat[$grievance->status] += 1;
        }
        $sum = array_sum($cat);
        foreach($cat as &$ct)    {
            $ct = round(($ct/$sum)*100);
        }
        return $cat;
    }

       
    private function getDistrictPercent(Collection $grievances): array
    {
        $cat = [];
        foreach($grievances as $grievance)  {
            $district = $grievance->institution->district->name;
                if(!isset($cat[$district])) {
                    $cat[$district] = 0;
                }
                $cat[$district] += 1;
        }
        $sum = array_sum($cat);
        foreach($cat as &$ct)    {
            $ct = round(($ct/$sum)*100);
        }
        return $cat;
    }

}
