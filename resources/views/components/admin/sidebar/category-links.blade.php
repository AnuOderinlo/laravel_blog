<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
        {{-- <i class="fas fa-fw fa-cog"></i> --}}
        <i class="fas fa-closed-captioning"></i>
        <span>Categories</span>
    </a>
    <div id="collapseCategory" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Categories</h6>
            <a class="collapse-item" href="{{ route('category.index') }}">View all Categories</a>
        </div>
    </div>
</li>