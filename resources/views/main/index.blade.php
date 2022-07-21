@extends('layouts.main')

@section('content')
<main class="main">
    <div class="container">
        <section class="content content__container">
            <div class="posts">
                <ul class="post-list">
                    @foreach($posts as $post)
                    <li class="post-list__item">
                        <article class="blog-post">
                            <h2 class="blog-post__title">
                                <a class="blog-post__title-link"
                                    href="{{ route('post.show', $post->id) }}">{{ $post->title }}
                                </a>
                            </h2>
                            <time class="blog-post__date blog-post__icon">{{ $post->dateAsCarbon->diffForHumans() }}</time>
                            <ul class="tag-list">
                                <!-- разделение тегов запятыми -->
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
                                {{ $post->category->title }}
                            </div>

                            <div class="blog-post__image">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="">
                            </div>

                            <a class="blog-post__readmore" href="{{ route('post.show', $post->id) }}">
                                <span class="blog-post__readmore-text">Read more</span>
                            </a>

                            <ul class="blog-post__action-list">
                                <li class="blog-post__action-list-item">
                                    @auth()
                                    <form class="blog-post__like-form" action="{{ route('post.like.store', $post->id) }}" method="post"> 
                                        @csrf
                                        <button class="blog-post__icon blog-post__icon--likes">
                                            <i class="fa-{{ auth()->user()->likedPosts->contains($post->id) ? 'solid' : 'regular' }} fa-heart"></i>
                                            {{ $post->likedUsers->count() }}
                                        </button>
                                    </form>
                                    @endauth
                                    
                                    @guest()
                                        <button class="blog-post__icon blog-post__icon--likes disabled">
                                            <i class="fa-regular fa-heart"></i>
                                            {{ $post->likedUsers->count() }}
                                        </button>
                                    @endguest
                                </li>
                            </ul>
                        </article>
                    </li>
                    @endforeach
                </ul>
                <div class="m-auto pagination">
                    {{ $posts->links() }}
                </div>
            </div>
            @include('includes.sidebar')    
        </section>
    </div>
</main>
@endsection
