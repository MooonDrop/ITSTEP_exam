<div class="sidebar">
    <div class="blog-post popular-posts">
        <h3 class="blog-post__title popular-posts">POPULAR POSTS</h3>
        <ul class="blog-post__list">
            @foreach($popularPosts as $popularPost)
            <li class="post-list__item popular-posts">
                <article class="blog-post popular-posts__article">

                    <h3 class="blog-post__title blog-title">
                        <a class="blog-post__title-link popular-posts"
                            href="{{ route('post.show', $popularPost->id) }}">{{ $popularPost->title }}</a>
                    </h3>

                    <time class="blog-post__date">{{ $popularPost->dateAsCarbon->diffForHumans() }}</time>

                    <ul class="tag-list">
                        @if($popularPost->tags->count() > 0)
                            @foreach($popularPost->tags as $i => $tag)
                                @if($i != count($popularPost->tags) - 1)
                                    <li class="tag-list__item">{{ $tag->title . ','}}</li>
                                @else
                                    <li class="tag-list__item">{{ $tag->title }}</li>
                                @endif
                            @endforeach
                        @endif
                    </ul>

                    @auth()
                    <ul class="blog-post__action-list popular-posts">
                        <li class="blog-post__action-list-item">
                            <form class="blog-post__like-form" action="{{ route('post.like.store', $popularPost->id) }}"
                                method="post">
                                @csrf
                                <button class="blog-post__icon blog-post__icon--likes">
                                    <i
                                        class="fa-{{ auth()->user()->likedPosts->contains($popularPost->id) ? 'solid' : 'regular' }} fa-heart"></i>
                                    {{ $popularPost->likedUsers->count() }}
                                </button>
                            </form>
                        </li>
                    </ul>
                    @endauth
                </article>
            </li>
            @endforeach
        </ul>
    </div>
</div>
