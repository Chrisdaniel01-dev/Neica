@extends('layouts.app')
@section('title', $project->title)
@section('content')

<!-- HERO -->
<section class="project-hero">

    @if($project->image)
    
        <img
            src="{{ asset('storage/'.$project->image) }}"
            alt="{{ $project->title }}"
            class="hero-image">
    @endif

    <div class="overlay"></div>

    <div class="project-hero-content">
        <span class="project-status">
            {{ ucfirst($project->status) }}
        </span>
        <h1>{{ $project->title }}</h1>
    </div>

</section>

<!-- CONTENT -->
<section class="project-details">

    <div class="container">
        <div class="project-grid">

            <!-- MAIN CONTENT -->
            <div class="project-main">

                @if($project->image)

                    <div class="project-cover">

                        <img
                            src="{{ asset('storage/'.$project->image) }}"
                            alt="{{ $project->title }}">

                    </div>

                @endif

                <div class="project-content">

                    <h2>Présentation du projet</h2>

                    <div class="project-description">

                        {!! nl2br(e($project->description)) !!}

                    </div>

                </div>

            </div>

            <!-- SIDEBAR -->
            <aside class="project-sidebar">

                <div class="donation-box">

                    <h3>Soutenir ce projet</h3>

                    <p>
                        Chaque contribution aide à financer nos actions
                        sur le terrain et à renforcer l'impact du projet.
                    </p>

                    <a
                        href="{{ route('donate.create', $project->slug) }}"
                        class="btn-donate-project">

                        Faire un don

                    </a>

                </div>

                <div class="project-info-card">

                    <h3>Informations</h3>

                    <ul>

                        <li>
                            <strong>Statut :</strong>
                            {{ ucfirst($project->status) }}
                        </li>

                        <li>
                            <strong>Publié :</strong>
                            {{ $project->created_at->format('d/m/Y') }}
                        </li>

                    </ul>

                </div>

            </aside>

        </div>

    </div>

</section>

@endsection