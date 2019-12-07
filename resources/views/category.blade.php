@extends('layouts.app')

@section('content')


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Categories</h1>
</div>

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif

<div class="row justify-content-center">

    <!-- Area Chart -->
    <div class="col-md-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <form method="post" action="/categories/create" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Category or Dokan</label> <br>
                        <label class="radio-inline"><input type="radio" name="type" value="category" checked>Category</label>
                        <label class="radio-inline"><input type="radio" name="type" value="dokan">Dokan</label>
                    </div>

                    <div class="form-group">
                        <label>Category Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Enter category title">
                    </div>

                    <div class="form-group">
                        <label>Category Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Enter category description">
                    </div>

                    <div class="form-group">
                        <label>Thumbnail</label>
                        <input type="file" class="form-control-file" name="thumbnail" placeholder="thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <a href="/categories/delete/{{ $category->id }}">delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection