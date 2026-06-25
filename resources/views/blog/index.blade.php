
@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="overlay"></div>
    <div class="page-header-content">
        <span class="badge">Actualités</span>
        <h1>Notre <span class="highlight">blog</span></h1>
        <p>Retrouvez nos actualités, témoignages et analyses sur le terrain.</p>
    </div>
</section>

<!-- BLOG GRID -->
<section class="blog-container">
    <div class="blog-grid">

        @foreach($posts as $post)
        <div class="blog-card">

            <div class="blog-image">
                <img src="{{ $post->image ? asset('storage/'.$post->image) : 'https://via.placeholder.com/400x250' }}">
            </div>

            <div class="blog-content">
                <h2>{{ $post->title }}</h2>

                <p class="blog-desc">
                            {{ Str::limit($post->content, 100) }}
                </p>

                <a href="{{ route('blog.show', $post) }}" class="btn-primary btn-small">
                    Voir plus 
                </a>

            </div>

        </div>
        @endforeach

    </div>
</section>        

@endsection

