@extends('admin.master')
@section('title')
    Edit Blog
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Blog Update Form</h6>
                        <hr/>
                        <form class="row g-3" action="{{route('update.blog')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="article_id" value="{{$article->id}}" readonly/>
                            <div class="col-12">
                                <label class="form-label">Category Name</label>
                                <select class="form-control" name="category_id" id="">
                                    <option value="">Select Category</option>
                                    @foreach($catList as $category_list)
                                        <option value="{{$category_list->id}}" {{$article->category_id == $category_list->id ? 'selected' : $category_list->id}}>
                                            {{$category_list->category_name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Author Name</label>
                                <input type="text" class="form-control" name="author_name" value="{{$article->author_name}}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="blog_title" value="{{$article->blog_title}}">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="blog_description" id="" cols="30" rows="5">{{$article->blog_description}}</textarea>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Blog Type</label>
                                <select class="form-control" name="blog_type" id="">
                                    <option value="popular"  {{ $article->blog_type == 'popular' ? 'selected' : ' ' }}>Popular</option>
                                    <option value="trending" {{ $article->blog_type == 'trending' ? 'selected' : ' ' }}>Trending</option>
                                    <option value="featured" {{ $article->blog_type == 'featured'? 'selected' : ' ' }}>Featured</option>
                                </select>
                            </div>
                            <div class="col-12 row">
                                <div class="col-11">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="blog_image">
                                </div>
                                <div class="col-1">
                                    <img class="mt-4 img-thumbnail" src="{{asset($article->blog_image)}}" alt="No image" style="height: 4vh">
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="blog_date" value="{{$article->blog_date}}">
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
