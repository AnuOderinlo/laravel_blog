<x-home-master>
    @section('content')
        <!-- Title -->
        <h1 class="mt-4">{{ $post->title }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{ $post->user->name }}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{ $post->created_at->diffForHumans() }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{ $post->post_image }}" alt="">

        <hr>

        <!-- Post Content -->
        <div style="word-wrap: break-word; " >
          {!! $post->body !!}
        </div>
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form action="{{ route('comment.store') }}" method="post">
              @csrf
              <input type="hidden" name="post_id" value="{{ $post->id }}">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control">
              </div>
              <div class="form-group">
                <textarea name="body" class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->
        @foreach ($post->comment as $comment)
            
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{{ $comment->name }}</h5>
            {{ $comment->body }}
          </div>
        </div>
        @endforeach

        <!-- Comment with nested comments 
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>    -->
    @endsection
    @section('sidebar')
        <h5 class="card-header">Categories</h5>
        <div class="card-body">
          <div class="row">
            @foreach ($categories as $category)
            <div class="col-lg-6">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="#">{{ $category->name }}</a>
                </li>
                
              </ul>
            </div>
            @endforeach
            
          </div>
        </div>
    @endsection
</x-home-master>