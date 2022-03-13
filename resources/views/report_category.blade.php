@extends('layouts.report')
@section('maintitle', 'Grievances by Categories Report')
    
@section('content')
<table id="dTable">
        <thead>
            <tr>
                <th>Grievance Category</th>
                <th>Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $row)
            <tr>
                <td>{{$row->category?->type}}</td>
                <td>{{$row->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table
@endsection
