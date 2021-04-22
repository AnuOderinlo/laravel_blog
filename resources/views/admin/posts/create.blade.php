<x-admin-master>
    @section('content')

        <h1>Create Post</h1>
        <form  action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input placeholder="Enter Title" type="text" name="title" class="form-control" id="title">
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">choose Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="file">Image file</label>
                <input type="file" name="post_image" class="form-control-file" id="file">
            </div>
            
            <div class="form-group">
                <label for="">Body</label>
                <textarea class="form-control ckeditor" name="body" id=""  rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary"">Create Post</button>
        </form>
    @endsection

    @section('scripts')
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javasceript">
            $(document).ready(function () {
                $('.ckeditor').ckeditor();
            });
        </script>
    @endsection
</x-admin-master>
