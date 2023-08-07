@extends('admin.master')
@section('title')
    Add Category table
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Category Table</h6>
                        <hr/>
                        <table class="table table-hover table-bordered table-striped text-center">
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->category_name }}</td>
                                <td>
                                    <img src="{{ asset($category->image) }}" class="img-fluid" style="height: 50px;width: 50px" alt="">
                                </td>
                                <td>{{ $category->status == 1 ? 'Published' : ' UnPublished' }}</td>
                                <td class="d-block btn-group ">
                                    <a href="{{route('edit.category',['id'=>$category->id])}}" class="btn btn-primary btn-sm">
                                    edit
                                    </a>
                                    @if($category->status == 1)
                                    <a href="" class="btn btn-warning btn-sm" >UnPublished</a>
                                    @else
                                    <a href="" class="btn btn-success btn-sm">Published</a>
                                    @endif
                                    <form action="{{route('delete.category',['id'=>$category->id])}}" method="post">
                                        @csrf
                                        <input type="submit" class="btn btn-danger" onclick="return confirm('are you sure !!')" value="Delete">
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
