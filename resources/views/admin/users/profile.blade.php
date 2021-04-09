<x-admin-master>
    @section('content')
        <h1>{{ $user->name }} Profile Information</h1>
        <div class="">
            <div class="row">
                <div class="col-md-6">
                    <form  action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <img class="img-profile rounded-circle " style="width: 3.5rem; height:3.5rem" src="{{  $user->profile_image}} ">
                        </div>
                        <div class="form-group">
                             <input type="file" name="profile_image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input placeholder="Enter username" type="text" name="username" value="{{ $user->username }}" class="form-control @error('username')
                                is-invalid
                            @enderror" id="username">
                            @error('username')
                                <span class="invalid-feedback" >{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input placeholder="Enter name" type="text" name="name" class="form-control @error('name')
                                is-invalid
                            @enderror id="name" value="{{ $user->name }}">
                            @error('name')
                                <span class="invalid-feedback" >{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Email</label>
                            <input placeholder="Enter email" type="text" name="email" class="form-control @error('email')
                                is-invalid
                            @enderror" id="email" readonly value="{{ $user->email }}">
                            @error('email')
                                <span class="invalid-feedback" >{{ $message }}</span>
                            @enderror
                          
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input placeholder="Enter Password" type="password" name="password" class="form-control" id="password">

                        </div>

                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input placeholder="Enter Password" type="password"  name="password_confirmation" class="form-control" id="password">
                        </div>

                        
                        <button type="submit" class="btn btn-primary"">update</button>
                    </form>
                </div>

                @if (auth()->user()->userHasRole('Admin'))
                    <div class="col-md-12 mt-5">
                        <table class="table table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Option</th>
                                    <th>S/N</th>
                                    <th>Roles</th>
                                    <th>Attach</th>
                                    <th>Detach</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                                @foreach ($roles as $role)
                                <tr>
                                    <td>
                                    <input type="checkbox" 
                                        @foreach ($user->roles as $user_role)
                                            @if ($user_role->name === $role->name)
                                            checked
                                            @endif
                                        @endforeach
                                    >
                                    
                                    </td>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <form action="{{ route('role.attach', $user) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="role" value="{{ $role->id }}">
                                            <button type="submit" class="btn btn-primary" 
                                                @if ($user->roles->contains($role))
                                                    disabled
                                                @endif
                                            >Attach</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('role.detach', $user) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <input type="hidden" name="role" value="{{ $role->id }}">
                                            <button type="submit" class="btn btn-danger "
                                                @if (!$user->roles->contains($role))
                                                    disabled
                                                @endif
                                            >Detach</button>
                                        </form>
                                    </td>
                                </tr>
                                
                                @endforeach
                            
                                
                            </tbody>
                        </table>
                    </div>
            
                @endif
                
            </div>
        </div>
        
    @endsection
</x-admin-master>