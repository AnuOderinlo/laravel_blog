<x-admin-master>
    @section('content')
        <h2>Edit {{ $role->name }}</h2>

         <div class="col-12">
                @if (session('role-update'))
                    <div class="alert alert-success">
                        {{ session('role-update') }}
                    </div>
                @endif
        </div>

        <div class="col-md-6">
            <form action="{{ route("role.update", $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Role name</label>
                    <input type="text" class="form-control" name="role" value="{{ $role->name }}">
                </div>
                <button class="btn btn-primary" type="submit">update</button>
            </form>
        </div>

        @if (auth()->user()->userHasRole('Admin'))
                <div class="col-md-12 mt-5">
                    <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Option</th>
                                <th>S/N</th>
                                <th>Permission</th>
                                <th>Attach</th>
                                <th>Detach</th>
                            </tr>
                        </thead>
                        
                        <tbody>

                            @foreach ($permissions as $permission)
                            <tr>
                                <td>
                                <input type="checkbox" 
                                    @foreach ($role->permissions as $role_permission)
                                        @if ($role_permission->name === $permission->name)
                                        checked
                                        @endif
                                    @endforeach
                                >
                                
                                </td>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>
                                    <form action="{{ route('permission.attach', $role) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="permission" value="{{ $permission->id }}">
                                        <button type="submit" class="btn btn-primary" 
                                            @if ($role->permissions->contains($permission))
                                                disabled
                                            @endif
                                        >Attach</button>
                                    </form>
                                    {{-- <button class="btn btn-primary">Attach</button> --}}
                                </td>
                                <td>
                                    <form action="{{ route('permission.detach', $role) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <input type="hidden" name="permission" value="{{ $permission->id }}">
                                        <button type="submit" class="btn btn-danger" 
                                            @if (!$role->permissions->contains($permission))
                                                disabled
                                            @endif
                                        >Detach</button>
                                    </form>
                                    {{-- <button class="btn btn-danger">Detach</button> --}}
                                </td>
                            </tr>
                            
                            @endforeach
                        
                            
                        </tbody>
                    </table>
                </div>
        
            @endif

        

    @endsection
</x-admin-master>