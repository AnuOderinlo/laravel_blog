<x-admin-master>
    @section('content')
        <h2>Roles</h2>

        <div class="row">
            <div class="col-12">
                @if (session('role-delete'))
                    <div class="alert alert-danger">
                        {{ session('role-delete') }}
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <form action="{{ route('role.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Create Role</label>
                        <input type="text" name="role" class="form-control @error('role')
                            is-invalid
                        @enderror">
                        @error('role')
                           <span class="text-danger">{{ $message }}</span> 
                        @enderror
                    </div>
                
                    <button class="btn btn-primary btn-block"  type="submit">create</button>
                </form>
            </div>

            <div class="col-md-8">
            <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>
                                        <a href="{{ route('role.edit', $role->id )}}">{{ $role->name }}</a>
                                        
                                    </td>
                                    <td>{{ $role->slug }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>
                                        <form action="{{ route("role.destroy", $role->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    @endsection
</x-admin-master>