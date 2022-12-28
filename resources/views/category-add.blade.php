@extends('template.tmpDashboard')
@section('title','Add Category')

@section('content')
    <h1>Add New Category</h1>

    <div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="category-add" method="POST">
            @csrf
            <div class="mt-5 w-25">
                <div class="form-outline mb-3">
                    <input type="text" id="name" class="form-control form-control-lg" name="name" required/>
                    <label class="form-label" for="name">Category Name</label>
                </div>
                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection