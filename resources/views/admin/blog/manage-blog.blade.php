@extends('admin.master')
@section('title')
    Manage Blog
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded row">
                        <h6 class="mb-0 text-uppercase">Blog List</h6>
                        @if($message = Session::get('message'))
                            <div class="alert alert-success alert-dismissible fade show">
                                {{$message}}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <hr/>

                            <div class="col-md-12">
                                <div class=" table-responsive">
                                    <table id="example2" class="table table-hover table-bordered table-striped">
                                       <thead>
                                            <tr>
                                                <th>sl</th>
                                                <th>category_id</th>
                                                <th>author_name</th>
                                                <th>title</th>
                                                <th>blog_type</th>
                                                <th>Description</th>
                                                <th>image</th>
                                                <th>date</th>
                                                <th>status</th>
                                                <th>Action</th>
                                            </tr>
                                       </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach($blogList as $data)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $data->category_name }}</td>
                                                <td>{{ $data->author_name }}</td>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->blog_type }}</td>

                                                <td>{{ substr($data->description,0,50) }}</td>

                                                <td>
                                                    <img src="{{ asset($data->image) }}" class="img-fluid"  style="height: 50px" alt="">
                                                </td>
                                                <td>{{ $data->date }}</td>
                                                <td>{{ $data->status==1 ? 'Published' :'UnPublished' }}</td>
                                                <td>
                                                    <a href="{{ route('edit.blog',['id'=>$data->id]) }}" class="btn btn-primary btn-sm">Edit</a>
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
        </div>
    </div>
@endsection
