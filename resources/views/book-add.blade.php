@extends('template.tmpDashboard')
@section('title','Add Book')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  
    <h1>Add New Book</h1>

    <div class="">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="book-add" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mt-5 w-25">
                <div class="form-outline mb-3">
                    <input type="text" id="code" class="form-control form-control-lg" name="book_code" required value="{{ old('book_code') }}" />
                    <label class="form-label" for="code">Book Code</label>
                </div>

                <div class="form-outline mb-3">
                    <input type="text" id="title" class="form-control form-control-lg" name="title" required value="{{ old('title') }}"/>
                    <label class="form-label" for="title">Book Title</label>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="imagecover">Image Cover</label>
                    <input type="file" id="imagecover" class="form-control form-control-lg" name="imagecover"/>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="category" >Category</label>
                    <select name="categories[]" id="category" class="form-control form-control-lg select-multiple" multiple>
                        @foreach ($categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mt-3">
                    <button class="btn btn-success" type="submit">Add Book</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js">
    </script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection