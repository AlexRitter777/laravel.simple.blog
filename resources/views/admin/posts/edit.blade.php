
@extends('admin.layouts.layout')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Post</h1>
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
                <h3 class="card-title">Post "{{$post->title}}"</h3>
            </div>


            <form method="post" role="form" action="{{ route('posts.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$post->title}}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="5" >{{$post->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="8" >{{$post->content}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">

                            @foreach($categories as $k =>$v)
                               <option value="{{$k}}" @if($k == $post->category_id) selected @endif>{{$v}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tags</label>
                        <select class="select2" name="tags[]" id="tags" multiple="multiple" data-placeholder="Select Tags" style="width: 100%;" >
                            @foreach($tags as $k =>$v)
                                <option value="{{$k}}" @if($k == in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{$v}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Post Image</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input @error('thumbnail') is-invalid @enderror">
                                <label class="custom-file-label" for="thumbnail">Choose file</label>
                            </div>
                        </div>
                        <div class=""><img src="{{$post->getImage()}}" alt="" class="img-thumbnail mt-2" width="150px"></div>
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

