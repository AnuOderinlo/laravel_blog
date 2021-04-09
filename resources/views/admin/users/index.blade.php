<x-admin-master>
    @section('content')
        <h1>All Users</h1>
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
              <h6 class="m-0 font-weight-bold text-primary">Users Details</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                @if (!$users->isEmpty())
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Profile Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Profile Image</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="{{ route('user.show', $user->id) }}">
                                        {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <img src="{{ $user->profile_image }}" alt="Profile Image" height="40px"> 
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <form action="{{ route('user.destroy',$user->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <button type="submit" title="delete" class="btn btn-sm  btn-danger"> <i class=" far fa-trash-alt"></i> </button>
                                        </form>

                                        {{-- <a class="dropdown-item user-id" data-userid = "{{ $user->id }}" href="#"  data-toggle="modal" data-target="#deleteModal">
                                            <i class=" far fa-trash-alt text-danger"></i>
                                        </a> --}}
                                    </td>
                                    
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                    
                @else
                    <h2>No User available</h2>   
                
                @endif

                {{-- <x-delete-modal></x-delete-modal> --}}

              {{--   This is the modal for the deleting user --}}
                {{-- <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Do you really want to delete this user?</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                                
                                <form action="{{ route('user.destroy', $user->id) }}" id="modal-form" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <input type="hidden" id="" name="id" value="{{ $user->id }}">
                                    <button class="btn btn-danger" type="submit" >Yes</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  --}}
                
              </div> 
            </div>
          </div>

        {{-- {{ $users->links()}} --}}
    @endsection


    @section('scripts')
        <!-- Page level plugins -->
        <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <!-- Page level custom scripts -->
        <script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    @endsection

    

</x-admin-master>
<script type="text/javascript">
        let userId = document.getElementsByClassName('user-id');
        let modalForm = document.getElementById('modal-form');
        
        for (let i = 0; i < userId.length; i++) {
            userId[i].addEventListener('click', function (e) {
                e.preventDefault();
                
                let value = userId[i].getAttribute("data-userid");
                let actionValue = "{{ route('user.destroy', $user->id) }}" ;
                modalForm.setAttribute('action', actionValue);

             
                console.log(value);

          })
        }


        
</script>