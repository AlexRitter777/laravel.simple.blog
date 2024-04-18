
@extends('admin.layouts.layout')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Category "{{ $category->title }}"</h3>
            </div>


            <form method="post" role="form" action="{{ route('categories.update', ['category' => $category->id]) }}" >
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Category name</label>
                        <input type="text" value="{{ $category->title }}" class="form-control @error('title') is-invalid @enderror" id="title" name="title" >
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </section>
    <!-- /.content -->


@endsection

