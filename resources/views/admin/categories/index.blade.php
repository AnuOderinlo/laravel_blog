<x-admin-master>
    @section('content')
        <h2>Categories</h2>

        <div class="row">
            <div class="col-12">
                {{-- @if (session('category-delete'))
                    <div class="alert alert-danger">
                        {{ session('category-delete') }}
                    </div>
                @endif --}}
            </div>
            <div class="col-md-3">
                <form action="{{ route('category.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="">Create category</label>
                        <input type="text" name="category" class="form-control @error('category')
                            is-invalid
                        @enderror">
                        @error('category')
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
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($categories  as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id )}}">{{ $category->name }}</a>
                                        
                                    </td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <form action="{{ route("category.destroy", $category->id) }}" method="post">
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