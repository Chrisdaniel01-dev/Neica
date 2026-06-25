@extends('layouts.app')

@section('content')


<!-- PAGE HEADER -->
<section class="page-header-project">
    <div class="overlay"></div>

    <div class="page-header-content">
        <span class="badge">Nos actions</span>

        <h1>
            Nos <span class="highlight">projets</span>
        </h1>

        <p>
            Découvrez les initiatives concrètes qui transforment
            des vies au quotidien dans 12 pays.
        </p>
    </div>
</section>

<!-- PROJECTS SECTION -->
<section class="projects-section">

    <div class="container">

        <div class="section-header">
            <span class="section-tag">
                Sur le terrain
            </span>

            <h2>
                Projets en
                <span class="text-gradient">
                    cours et réalisés
                </span>
            </h2>
        </div>

        <!-- FILTERS -->
        <div class="filter-tabs">
            <button class="filter-tab active" data-filter="all">
                Tous
            </button>

            <button class="filter-tab" data-filter="active">
                En cours
            </button>

            <button class="filter-tab" data-filter="completed">
                Terminés
            </button>
        </div>

        <!-- PROJECT GRID -->
        <div class="projects-full-grid">

            @foreach($projects as $project)
                <div class="project-full-card"
                     data-category="{{ $project->status }}">
                    <!-- IMAGE -->
                    <div class="project-card-image">          
                        <img src="{{ asset('storage/'.$project->image) }}"  alt="{{ $project->title }}">
                    </div>

                    <!-- CONTENT -->
                    <div class="project-card-body">
                        <h3>
                            {{ $project->title }}
                        </h3>

                        <p class="project-desc">
                            {{ Str::limit($project->description, 100) }}
                        </p>

                        <a href="{{ route('projects.show', $project) }}"
                           class="btn-primary btn-small">
                            Voir plus
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>


<!-- CTA -->
<section class="cta">

    <div class="container">

        <div class="cta-content">

            <h2>
                Vous avez un projet ?
            </h2>

            <p>
                Vous représentez une communauté ou une
                association locale ?
                Contactez-nous pour étudier ensemble
                la faisabilité d'un projet.
            </p>

            <div class="cta-buttons">

                <a href="{{ route('contact') }}"
                   class="btn-primary btn-large">
                    Proposer un projet
                </a>

                <a href="#"
                   class="btn-secondary btn-large">
                    Faire un don
                </a>

            </div>

        </div>

    </div>

</section>

@push('scripts')
<script src="{{ asset('js/project.js') }}"></script>
@endpush


@endsection