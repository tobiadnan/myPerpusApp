@extends('template.tmpDashboard')
@section('title','Deleted Categories')

@section('content')
    <h1>Deleted Category</h1>

    <div class="mt-5 d-flex justify-content-end">
        <a href="categories" class="btn btn-primary me-2">Back</a>
    </div>

    <div class="mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="my-5">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Deleted At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deletedCategories as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->deleted_at }}</td>
                        <td>
                            <a href="category-restore/{{ $item->slug }}">Restore</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection