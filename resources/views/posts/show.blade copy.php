<main class="main">
    <div class="container">
        <section class="content content__container">
            <div class="posts">
                <ul class="post-list">
                    <li class="post-list__item">
                        <article class="blog-post">
                            <h2 class="blog-post__title">
                                <span class="blog-post__title-link">{{ $post->title }}</span>
                            </h2>
                            <time
                                class="blog-post__date blog-post__icon">{{ $post->dateAsCarbon->diffForHumans() }}</time>

                            <ul class="tag-list">
                                @if($post->tags->count() > 0)
                                @foreach($post->tags as $i => $tag)
                                @if($i != count($post->tags) - 1)
                                <li class="tag-list__item">{{ $tag->title . ','}}</li>
                                @else
                                <li class="tag-list__item">{{ $tag->title }}</li>
                                @endif
                                @endforeach
                                @endif
                            </ul>

                            <div class="blog-post__category" href="">
                                <span class="blog-post__category-text">{{ $post->category->title }}</span>
                            </div>

                            <div class="blog-post__image">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="">
                            </div>

                            <p class="blog-post__content">{!! $post->content !!}</p>

                            @auth()
                            <ul class="blog-post__action-list">
                                <li class="blog-post__action-list-item">
                                    <form class="blog-post__like-form"
                                        action="{{ route('post.like.store', $post->id) }}" method="post">
                                        @csrf
                                        <button class="blog-post__icon blog-post__icon--likes">
                                            <i
                                                class="fa-{{ auth()->user()->likedPosts->contains($post->id) ? 'solid' : 'regular' }} fa-heart"></i>
                                            {{ $post->likedUsers->count() }}
                                        </button>
                                    </form>
                                </li>
                                <li class="blog-post__action-list-item">
                                    <a class="blog-post__icon blog-post__icon--comments" href="">
                                        <i class="fa-solid fa-comment"></i>
                                        {{ $post->comments->count() }}
                                    </a>
                                </li>
                            </ul>
                            @endauth
                        </article>
                    </li>
                </ul>
                
            </div>
        </section>
    </div>    
</main>    
