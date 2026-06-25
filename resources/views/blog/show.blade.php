@extends('layouts.app')
@section('title', $post->title)
@section('content')


<!-- HERO ARTICLE -->
<section class="page-header article-header">
    @if($post->image)
        <div class="article-header-bg">
            <img src="{{ asset('storage/'.$post->image) }}"
                 alt="{{ $post->title }}"
                 class="hero-image">
        </div>
    @endif

    <div class="overlay"></div>

    <div class="page-header-content">
        <span class="badge">
            Actualité
        </span>
       
        <h1>
            {{ $post->title }}
        </h1>
        @if($post->excerpt)
            <p>
                {{ $post->excerpt }}
            </p>
        @endif
    </div>
</section>

<!-- ARTICLE -->
<section class="article-section">
    <div class="container">

        <div class="article-container">
            <article class="article-card">

                <div class="article-header-info">
                    <span>📅 {{ $post->created_at->format('d M Y') }}</span>
                </div>

                <div class="article-content">
                    {!! $post->content !!}
                </div>

                <div class="article-actions">
                    <a href="{{ route('blog.index') }}"
                       class="btn-back">
                        ← Retour
                    </a>
                </div>

            </article>
        </div>
    </div>

</section>


<!-- ARTICLES SIMILAIRES -->
@if($recentPosts->count())

<section class="related-section">
    <div class="container">
        <div class="section-header">
            <h2>Autres actualités</h2>
            <p>
                Découvrez d'autres actions et initiatives de NEICA .
            </p>
        </div>

        <div class="blog-grid">
            @foreach($recentPosts as $related)
                <div class="blog-card">
                    <div class="blog-image">
                        <img
                            src="{{ $related->image
                                ? asset('storage/'.$related->image)
                                : 'https://via.placeholder.com/400x250' }}"
                            alt="{{ $related->title }}">
                    </div>

                    <div class="blog-content">
                        <h3>
                            {{ $related->title }}
                        </h3>
                        <p>
                            {{ Str::limit($related->excerpt, 100) }}
                        </p>
                        <a href="{{ route('blog.show', $post) }}" class="btn-primary btn-small">
                            Voir plus 
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</section>

@endif

@endsection