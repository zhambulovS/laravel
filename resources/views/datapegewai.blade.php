@extends('layouts.admin')
@section('content')
<body>
<h1 class="text-center">Data Table</h1>
<div class="container">
    <a type="button" class="btn btn-success mb-4" href="{{ route('add') }}">Add</a>

    <div class="row">
        @if($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
        <div class="row g-3 align-items-center mt-2">
            <div class="col-auto">
                <form action="/pegawai" method="get">
                    <input type="search" name="search" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search">
                </form>
            </div>
            <div class="col-auto">
                <a type="button" class="btn btn-info" href="{{route('export')}}">Export PDF</a>
            </div>

        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Info</th>
                <th scope="col">Phone</th>
                <th scope="col">Photo</th>
                <th scope="col">Created at</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $index => $row)
                <tr>
                    <th scope="row">{{ $index + $data ->firstItem() }}</th>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->jeniskelamin }}</td>
                    <td>{{ $row->notelpon }}</td>
                    <td>
                        <img src="{{ asset('photos/' . $row->foto) }}" alt="" style="width: 40px;">
                    </td>
                    <td>{{ $row->created_at->diffForHumans() }}</td>
                    <td>
                        <a href="/edit/{{ $row->id }}" type="button" class="btn btn-info">Edit</a>
                        <a href="/delete/{{ $row->id }}" type="button" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
            <div class="d-flex justify-content mt-4">
                {{ $data->links('pagination::bootstrap-4') }}
            </div>
    </div>
</div>
</body>
@endsection
