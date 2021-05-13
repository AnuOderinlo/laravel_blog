<x-home-master>

    @section('content')
        <h1 class="my-4">Welcome to your favourite blogging website
          {{-- <small>Secondary Text</small> --}}
        </h1>

        <!-- Blog Post -->
        @foreach ($posts as $post)
          <div class="card mb-4">
            <img class="card-img-top" src="{{ $post->post_image }}" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">{{$post->title}} </h2>
              <p class="text-right">
                <span class="text-muted">category: {{ optional($post->category)->name }}</span>
              </p>
              {{-- <p class="card-text">{!!Str::limit($post->body, 40, '...')  !!}</p> --}}
              <p class="card-text">{!! Str::limit($post->body, 70, '...') !!}</p>
              <a href="{{ route('post', $post->id) }}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on {{$post->created_at->diffForHumans()}} by
              <a href="#">{{ $post->user->name }}</a>
            </div>
          </div>
        @endforeach

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>
    @endsection
    @section('sidebar')
        <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              @foreach ($categories as $category)
              <div class="col-md-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="{{ route('home.category', $category->id) }}">{{ Str::ucfirst($category->name) }}</a>
                  </li>
                  
                </ul>
              </div>
              @endforeach
             
            </div>
          </div>
    @endsection
</x-home-master>
