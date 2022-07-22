@extends('layouts.main')

@section('content')
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
                </ul>
                @if($relatedPosts->count() > 0)
                    <div class="blog-post popular-posts">
                        <h3 class="blog-post__title popular-posts">RELATED POSTS</h3>
                        <ul class="blog-post__list">
                            @foreach($relatedPosts as $relatedPost)
                                <li class="post-list__item popular-posts">
                                    <article class="blog-post popular-posts__article">
                                        <h3 class="blog-post__title blog-title">
                                            <a class="blog-post__title-link popular-posts"
                                                href="{{ route('post.show', $relatedPost->id) }}">{{ $relatedPost->title }}</a>
                                        </h3>
                                        <time
                                        class="blog-post__date blog-post__icon">{{ $relatedPost->dateAsCarbon->diffForHumans() }}</time>
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
                    </div>
                @endif
                <div class="post-comments">
                    <h3 class="post-comments__title">COMMENTS ( {{ $comments->count() }} )</h3>
                    <ul class="post-comments-list">
                        @foreach($comments as $comment)
                        <li class="post-comments-list__item">
                            <div class="post-comment">
                                <div class="post-comment__user">
                                    <span class="post-comment__username">{{ $comment->user->name }}</span>
                                    <time
                                        class="post-comment__date">{{ $comment->dateAsCarbon->diffForHumans() }}</time>
                                </div>
                                <div class="post-comment__message">
                                    {{ $comment->message }}
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @auth()
                    <div class="comments-controll">
                        <form class="comments-controll__form" action="{{ route('post.comment.store', $post->id) }}"
                            method="post">
                            @csrf
                            <p class="comments-controll__label" for="message">Your comment</p>
                            <!-- <a href="message"></a> -->
                            <textarea class="comments-controll__input" name="message" id="" cols="" rows=""
                                placeholder="Write..."></textarea>
                            <button class="comments-controll__send" type="submit">Send</button>
                        </form>
                    </div>
                @endauth
            </div>
            @include('includes.sidebar')
        </section>
    </div>
</main>
@endsection
