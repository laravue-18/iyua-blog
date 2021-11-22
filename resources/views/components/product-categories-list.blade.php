<div class="card border">
    <div class="card-body">
        <div>
            <h5 class="font-size-14 mb-3">Categories</h5>
            <ul class="list-unstyled product-list">
                <li>
                    <a href="/store">
                        <i class="mdi mdi-chevron-right mr-1"></i>
                        All
                    </a>
                </li>
                @foreach($categories as $category)
                    <li>
                        <a href="/store?category={{ $category->id }}">
                            <i class="mdi mdi-chevron-right mr-1"></i>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
