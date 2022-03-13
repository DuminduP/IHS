<?php

namespace App\Http\Controllers;

use App\Models\Grievance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(Request $request)
    {
        $this->data['from'] = $request->from ?? Carbon::now()->firstOfMonth()->format('Y-m-d');
        $this->data['to'] =  $request->to ?? Carbon::now()->format('Y-m-d');
        $this->data['today'] =  Carbon::now()->format('Y-m-d');
        
    }
    public function category(Request $request)
    {

        $this->data['list'] = Grievance::select('*', DB::raw('Count(*) as total'))->where('grievance_type_id', '>', 0)
            ->whereDate('created_at', '>=', $this->data['from'])
            ->whereDate('created_at', '<=', $this->data['to'])
            ->groupBy('grievance_type_id')->get();
        return view('report_category', $this->data);
    }

    public function status(Request $request)
    {
        $this->data['list'] = Grievance::select('*', DB::raw('Count(*) as total'))
            ->whereDate('created_at', '>=', $this->data['from'])
            ->whereDate('created_at', '<=', $this->data['to'])
            ->groupBy('status')->get();
        return view('report_status', $this->data);
    }

    public function location(Request $request)
    {
        $this->data['list'] = DB::table('grievances')->select('districts.name as district_name', 'provinces.name as province_name', DB::raw('Count(*) as total'))
            ->leftJoin('institutions', 'institution_id', '=', 'institutions.id')
            ->leftJoin('districts', 'districts.id', '=', 'institutions.district_id')
            ->leftJoin('provinces', 'provinces.id', '=', 'institutions.province_id')
            ->whereDate('grievances.created_at', '>=', $this->data['from'])
            ->whereDate('grievances.created_at', '<=', $this->data['to'])
            ->groupBy('institutions.district_id')->get();

        return view('report_location', $this->data);
    }
}
