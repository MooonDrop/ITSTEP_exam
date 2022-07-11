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
                                <a class="blog-post__title-link" href="">{{ $post->title }}</a>
                            </h2>
                            <ul class="tag-list">
                                <li class="tag-list__item">Tag 1</li>
                                <li class="tag-list__item">Tag 2</li>
                            </ul>

                            <div class="blog-post__category" href="">
                                <span class="blog-post__category-text">{{ $post->category->title}}</span>
                            </div>

                            <div class="blog-post__image">
                                <img src="{{ 'storage/' . $post->preview_image }}" alt="">
                            </div>

                            <p class="blog-post__content">{{ $post->content }}</p>
                            <time class="blog-post__date"></time>
                        </article>
                    </li>
                    @endforeach
                </ul>
                <div class="m-auto">
                    {{ $posts->links() }}
                </div>
            </div>
            <aside class="sidebar">
                <div class="popular-post">
                    <h3 class="popular-post__title">Popular posts</h3>
                    <ul class="popular-post__list">
                        @foreach($popularPosts as $popularPost)
                        <li class="post-list__item popular-post">
                            <article class="blog-post popular-post__article">
                                <h3 class="blog-post__title blog-title">
                                    <a class="blog-post__title-link" href="">{{ $popularPost->title }}</a>
                                </h3>

                                <ul class="tag-list">
                                    <li class="tag-list__item">Tag 1</li>
                                    <li class="tag-list__item">Tag 2</li>
                                </ul>

                                <div class="blog-post__category" href="">
                                    <span class="blog-post__category-text">{{ $popularPost->category->title}}</span>
                                </div>

                                <p class="blog-post__content">{{ $popularPost->content }}</p>

                                <ul class="blog-post__actions">
                                    <li class="blog-post__likes"></li>
                                    <li class="blog-post__comments"></li>
                                </ul>

                                <time class="blog-post__date"></time>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </section>
    </div>
</main>
@endsection
