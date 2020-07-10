<div class="col-lg-4 col-md-4">

    <!-- -->
    <div class="sidebarblock">
        <h3>Categories</h3>
        <div class="divline"></div>
        <div class="blocktxt">
            @if($categories)
                <ul class="cats">
                @foreach ($categories as $key => $category)
                    <li><a href="{{ route('fr.topic.category', $category->id) }}">{{ $category->name }} <span class="badge pull-right">{{ count($category->questions) }}</span></a></li>
                @endforeach
                </ul>
            @endif
        </div>
    </div>


</div>