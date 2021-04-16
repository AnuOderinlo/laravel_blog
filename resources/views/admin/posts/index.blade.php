<x-admin-master>
    @section('content')
        <h1>All posts</h1>
        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @elseif(session('success-message'))
            <div class="alert alert-success">
                {{ session('success-message') }}
            </div>
        @elseif(session('update-message'))
            <div class="alert alert-success">
                {{ session('update-message') }}
            </div>
        @endif
        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if (!$posts->isEmpty())
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>No of Comment</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>No of Comment</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>{{ $post->title }}</td>
                                    {{-- <td>{{ Str::ucfirst($post->category->name)  }}</td> --}}
                                    {{-- <td>{{ !empty($post->category) ? $post->category->name:'No category'   }}</td> --}}
                                    <td>{{ optional($post->category)->name  }}</td>
                                    <td>
                                        <img src="{{ $post->post_image }}" alt="post Image" height="40px"> 
                                    </td>
                                    <td>{{ $post->comment->count() }}</td>
                                    <td>{{ $post->created_at->diffForHumans() }}</td>
                                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('post.destroy',$post->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" title="delete" class="btn btn-sm  btn-danger"> <i class=" far fa-trash-alt"></i> </button>
                                        </form>
                                        <a href="{{ route('post.edit', $post->id) }}" title="Edit" class="btn btn-sm btn-primary" title="edit"><i class="fas fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                @else
                    <h2>No Post available</h2>   
                
                @endif
              </div>
            </div>
          </div>

        {{-- {{ $posts->links()}} --}}
    @endsection


    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        {{-- <script src="{{ asset('js/demo/datatables-demo.js') }}"></script> --}}
    @endsection

</x-admin-master>