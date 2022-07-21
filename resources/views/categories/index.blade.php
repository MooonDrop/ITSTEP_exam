@extends('layouts.main')

@section('content')
<main class="main">
    <div class="container">
        <section class="content content__container">
            <div class="categories">
                <ul class="categories-list">
                    <h2 class="categories__title">Categories</h2>
                    @foreach($categories as $category)
                        <a class="categories-list__item" href="{{ route('category.post.index', $category->id) }}">
                            <h4 class="category__title">
                                <span class="category__link">
                                    {{ $category->title }}
                                </span>
                            </h4>
                            <div class="category__icon">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </a>
                    @endforeach
                </ul>
            </div>
            @include('includes.sidebar')
        </section>
    </div>
</main>
@endsection
