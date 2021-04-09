<x-admin-master>
    @section('content')
        <h2>Permissions</h2>

        <div class="row">
            <div class="col-12">
                @if (session('permission-delete'))
                    <div class="alert alert-danger">
                        {{ session('permission-delete') }}
                    </div>
                @endif
            </div>
            <div class="col-md-3">
                <form action="{{ route('permission.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Create Permission</label>
                        <input type="text" name="permission" class="form-control @error('permission')
                            is-invalid
                        @enderror">
                        @error('permission')
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
                            @foreach ($permissions  as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>
                                        <a href="{{ route('permission.edit', $permission->id )}}">{{ $permission->name }}</a>
                                        
                                    </td>
                                    <td>{{ $permission->slug }}</td>
                                    <td>{{ $permission->created_at }}</td>
                                    <td>
                                        <form action="{{ route("permission.destroy", $permission->id) }}" method="post">
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