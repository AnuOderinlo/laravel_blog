<x-admin-master>
    @section('content')
        <h2>Edit {{ $permission->name }}</h2>

         <div class="col-12">
                @if (session('permission-update'))
                    <div class="alert alert-success">
                        {{ session('permission-update') }}
                    </div>
                @endif
        </div>

        <div class="col-md-6">
            <form action="{{ route("permission.update", $permission->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Permission name</label>
                    <input type="text" class="form-control" name="role" value="{{ $permission->name }}">
                </div>
                <button class="btn btn-primary" type="submit">update</button>
            </form>
        </div>

        

    @endsection
</x-admin-master>