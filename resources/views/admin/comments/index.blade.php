<x-admin-master>
    @section('content')
        <h1>All comments on all my posts</h1>
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
                {{-- @if (!$comments->isEmpty()) --}}
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>s/n</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Post Title</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>s/n</th>
                                <th>Name</th>
                                <th>Comment</th>
                                <th>Post Title</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts  as $post)
                                @foreach ($post->comment as $comment)
                                    <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->name }}</td>
                                    <td>{{ $comment->body }}</td>
                                    <td> 
                                        <a href="{{ route('post', $post->id) }}">{{ $post->title}}</a>
                                    </td>
                                    <td>{{ $comment->created_at }}</td>
                                    <td>
                                        <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" title="delete" class="btn btn-sm  btn-danger"> <i class=" far fa-trash-alt"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                {{-- @else --}}
                    {{-- <h2>No Comment available</h2>    --}}
                
                {{-- @endif --}}
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