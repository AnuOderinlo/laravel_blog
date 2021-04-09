<x-admin-master>
    @section('content')
        <h2>Edit {{ $category->name }}</h2>

         <div class="col-12">
                @if (session('category-update'))
                    <div class="alert alert-success">
                        {{ session('category-update') }}
                    </div>
                @endif
        </div>

        <div class="col-md-6">
            <form action="{{ route("category.update", $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">category name</label>
                    <input type="text" class="form-control" name="category" value="{{ $category->name }}">
                </div>
                <button class="btn btn-primary" type="submit">update</button>
            </form>
        </div>

        

    @endsection
</x-admin-master>