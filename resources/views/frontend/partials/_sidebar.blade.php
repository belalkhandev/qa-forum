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

    @if(count($related_posts) > 0)
        <!-- -->
        <div class="sidebarblock">
            <h3>Related Posts</h3>
            <div class="divline"></div>
            <div class="blocktxt">
                <ul class="related_posts_list">
                    @foreach ($related_posts as $related_post)
                        <li>
                            <a href="{{ route('fr.topic.show', $related_post->id) }}">
                                <h4 class="related_post_title">{{ $related_post->title }}</h4>
                                <p class="related_post_desc">{{ Str::limit($related_post->description, 50, '...') }}</p>
                            </a>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    @if(count($latest_posts) > 0)
        <!-- -->
        <div class="sidebarblock">
            <h3>Latest Posts</h3>
            <div class="divline"></div>
            <div class="blocktxt">
                <ul class="related_posts_list">
                    @foreach ($latest_posts as $latest_post)
                        <li>
                            <a href="{{ route('fr.topic.show', $latest_post->id) }}">
                                <h4 class="related_post_title">{{ $latest_post->title }}</h4>
                                <p class="related_post_desc">{{ Str::limit($latest_post->description, 50, '...') }}</p>
                            </a>

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


</div>