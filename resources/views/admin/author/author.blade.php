@extends('admin.master')
@section('title')
    Add Author
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
            <div class="card-body">
                <div class="border p-3 rounded">
                    <h6 class="mb-0 text-uppercase">Create Author</h6>
                    <hr/>

                    <form class="row g-3" action="{{route('new.author')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Author Name</label>
                            <input type="text" name="author_name" class="form-control">
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
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-body">
                    <div class="border p-3 rounded">
                        <h6 class="mb-0 text-uppercase">Category Table</h6>
                        <hr/>
                        <table class="table table-hover table-bordered table-striped text-center">
                            <tr>
                                <th>Sl</th>
                                <th>Author Name</th>
                            </tr>
                            @php $i=1; @endphp
                            @foreach($authors as $author)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $author->author_name }}</td>
                                </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
