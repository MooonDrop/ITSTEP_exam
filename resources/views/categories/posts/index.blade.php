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
                                <span class="blog-post__title-link">{{ $post->title }}</span>
                            </h2>
                            <time
                                class="blog-post__date blog-post__icon">{{ $post->dateAsCarbon->diffForHumans() }}</time>
                            <ul class="tag-list">
                                <li class="tag-list__item">Tag 1</li>
                                <li class="tag-list__item">Tag 2</li>
                            </ul>

                            <div class="blog-post__category" href="">
                                <span class="blog-post__category-text">{{ $post->category->title }}</span>
                            </div>

                            <div class="blog-post__image">
                                <img src="{{ asset('storage/' . $post->preview_image) }}" alt="">
                            </div>

                            <ul class="blog-post__action-list popular-posts">
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
                                <li class="blog-post__action-list-item">
                                    @auth()
                                        <a class="blog-post__icon blog-post__icon--comments" href="">
                                            <i class="fa-solid fa-comment blog-post__icon blog-post__icon--comments"></i>
                                            {{ $post->comments->count() }}
                                        </a>
                                    @endauth

                                    @guest()
                                        <span class="blog-post__icon blog-post__icon--comments disabled">
                                            <i class="fa-solid fa-comment blog-post__icon blog-post__icon--comments"></i>
                                            {{ $post->comments->count() }}
                                        </span>
                                    @endguest
                                </li>
                            </ul>
                            
                        </article>
                    </li>
                    @endforeach
                </ul>
            </div>
            @include('includes.sidebar')
        </section>
    </div>
</main>
@endsection
