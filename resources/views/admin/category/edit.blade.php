@extends('admin.master')
@section('title')
    edit Category form
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Category Edit Form</h6>
                        <hr/>

                        <form class="row g-3" action="{{route('update.category',['id'=>$category->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label class="form-label">Category Name</label>
                                <input type="text" value="{{$category->category_name}}" name="category_name" class="form-control">
                            </div>

                            <div class="col-12">
                                <label class="form-label"> Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset($category->image)}}" style="justify-content: center; height: 100px; width: 100px" class=" mt-3" alt="">
                            </div>

                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
