@extends('admin.layouts.admin')

@section('title', 'Projets')

@section('content')
  <section class="page-content page-content--wide">

    <div class="table-card">
      <div class="table-card__header">
        <div>
          <h2 class="table-card__title">Tous les Projets</h2>
        </div>
        <div class="table-card__actions">
          <div class="search-box">
            <input type="text" class="search-box__input" placeholder="Rechercher un projet...">
          </div>
          <a href="{{ route('admin.projects.create') }}" class="btn btn--primary"><i class="fas fa-plus"></i> Créer un Projet</a>
        </div>
      </div>


      
      <table class="data-table">
        <thead>
          <tr>
            <th>Nom du Projet</th>
            <th>Public Cible</th>
            <th>Impact</th>
            <th>Statut</th>
            <th>Actions</th>
          </tr>
        </thead>


        <tbody>


          @forelse($projects as $project)
          <tr>
            <td><strong>{{ $project->title }}</strong></td>
            <td>{{ $project->target_audience }}</td>
            <td>{{ $project->impact }}</td>
            <td>
              @if($project->status === 'active')
              <span class="badge badge--ongoing">En cours</span>
              @elseif($project->status === 'completed')
              <span class="badge badge--completed">Terminé</span>
              @else
              <span class="badge badge--planned">Planifié</span>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.projects.show', $project) }}" class="action-btn action-btn--view" title="Voir"><i class="fas fa-eye"></i></a>
              <a href="{{ route('admin.projects.edit', $project) }}" class="action-btn action-btn--edit" title="Modifier"><i class="fas fa-pen"></i></a>
              <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="action-btn action-btn--delete" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet?')" style="color : red ; background-color :rgba(248, 247, 244, 0.874)">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" style="text-align: center;">Aucun projet trouvé.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </section>
@endsection

