@extends('layouts.report')
@section('maintitle')
    Grievances by District Report
@endsection

@section('content')
<table id="dTable">
        <thead>
            <tr>
                <th>Province</th>
                <th>District</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $row)
            <tr>
                <td>{{$row->province_name}}</td>
                <td>{{$row->district_name}}</td>
                <td>{{$row->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table
@endsection
