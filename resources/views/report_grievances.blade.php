@extends('layouts.report')
@section('maintitle')
    Grievances Report
@endsection

@section('content')
<table id="dTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>UUID</th>
                <th>Title</th>
                <th>Institution</th>
                <th>Owner Name</th>
                <th>Owner Mobile</th>
                <th>Status</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($list as $row)
            <tr>
                <td>{{$row->id}}</td>
                <td>{{$row->uuid}}</td>
                <td>{{$row->title}}</td>
                <td>{{$row->institution->name}}</td>
                <td>{{$row->owner->name}}</td>
                <td>{{$row->owner->mobile}}</td>
                <td>{{$row->status}}</td>
                <td>{{$row->created_at}}</td>
            </tr>
            @endforeach
        </tbody>
    </table
@endsection
