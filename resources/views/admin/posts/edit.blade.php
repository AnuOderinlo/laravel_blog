<x-admin-master>
    @section('content')

        <h1>Edit Post</h1>
        <form  action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="title">Title</label>
                <input placeholder="Enter Title" type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" id="" class="form-control">
                    <option value="">choose Category</option>
                    @foreach ($categories as $category)
                        
                        <option value="{{ $category->id }}" @if ($post->category->id === $category->id)
                            selected
                        @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <img width="100px" class="img-fluid" src="{{ $post->post_image }}" alt="">
            </div>
            <div class="form-group">
                <label for="file">Image file</label>
                <input type="file" name="post_image" class="form-control-file" id="file">
            </div>
            
            <div class="form-group">
                <label for="">Body</label>
                <textarea class="form-control" name="body" id=""  rows="10">{{ $post->body }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary"">Edit Post</button>
        </form>
    @endsection
</x-admin-master>