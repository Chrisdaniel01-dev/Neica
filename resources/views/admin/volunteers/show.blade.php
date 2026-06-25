@extends('admin.layouts.admin')

@section('title', 'Profil du bénévole')

@section('content')

<section class="page-content">

    <div class="volunteer-profile-card">

        <div class="profile-header">

            <div class="profile-avatar">
                {{ strtoupper(substr($volunteer->name, 0, 1)) }}
            </div>

            <div class="profile-info">
                <h1>{{ $volunteer->name }}</h1>
                <p>{{ $volunteer->email }}</p>
                @if($volunteer->status === 'approved')
                    <span class="status-badge active">
                        Actif
                    </span>
                @elseif($volunteer->status === 'pending')
                    <span class="status-badge pending">
                        En attente
                    </span>
                @else
                    <span class="status-badge rejected">
                        Rejeté
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="profile-grid">

        <div class="info-card" style="display:inline-block;">

            <h3>Informations personnelles</h3>

            <div class="info-item">
                <span>Téléphone</span>
                <strong>{{ $volunteer->phone }}</strong>
            </div>

            <div class="info-item">
                <span>Disponibilité</span>
                <strong>
                    {{ $volunteer->availability ?? 'Non renseignée' }}
                </strong>
            </div>

            <div class="info-item">
                <span>Date d'inscription</span>
                <strong>
                    {{ $volunteer->created_at->format('d/m/Y') }}
                </strong>
            </div>

        </div>

        <div class="info-card">

            <h3>Compétences : </h3>

            <p>
                {{ $volunteer->skills ?: 'Aucune compétence renseignée.' }}
            </p>

        </div>

        <div class="info-card motivation-card">
      
            <h3>Motivation : </h3>

            <p>
                {{ $volunteer->motivation ?: 'Aucune motivation renseignée.' }}
            </p>

        </div>

        <div class="info-card">
            <h3>Projets affectés : </h3>
            @forelse($volunteer->projects as $project)
                <div class="project-item">
                   <strong> {{ $project->title }} </strong>
                </div>
            @empty
                <p>
                    Aucun projet attribué.
                </p>
            @endforelse
        </div>

    </div>


   

    <div class="profile-actions">

        @if($volunteer->status === 'pending')

            <form action="{{ route('admin.volunteers.approve', $volunteer) }}"
                method="POST">

                @csrf
                @method('PATCH')

                <button type="submit"
                        class="btn-profile btn-success">

                    <i class="fas fa-check"></i>
                    Approuver

                </button>

            </form>

            <form action="{{ route('admin.volunteers.reject', $volunteer) }}"
                method="POST">

                @csrf
                @method('PATCH')

                <button type="submit"
                        class="btn-profile btn-danger">

                    <i class="fas fa-times"></i>
                    Rejeter

                </button>

            </form>

        @endif

        @if($volunteer->status === 'approved')

            <a href="{{ route('admin.volunteers.assign-project', $volunteer) }}"
            class="btn-profile btn-project">

                <i class="fas fa-folder-open"></i>
                Affecter à un projet

            </a>

        @endif

        <a href="{{ route('admin.volunteers.index') }}"
        class="btn-profile btn-back">

            <i class="fas fa-arrow-left"></i>
            Retour

        </a>

    </div>

   

</section>

@endsection