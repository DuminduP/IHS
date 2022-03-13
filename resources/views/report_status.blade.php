@extends('layouts.report')
@section('maintitle')
    Grievances by Status Report
@endsection

@section('content')
<table id="dTable">
        <thead>
            <tr>
                <th>Grievance Status</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $row)
            <tr>
                <td>{{$row->status}}</td>
                <td>{{$row->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table
@endsection
