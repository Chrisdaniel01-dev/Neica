@extends('admin.layouts.admin')

@section('title', 'Détails du Projet — NEICA Admin')

@section('content')
  <div class="page-content page-content--wide">

    <div class="form-card">
      <div class="form-card__header">
        <h2 class="form-card__title">
          <i class="fas fa-info-circle"></i>
          Détails du Projet
        </h2>
        <p class="form-card__subtitle">Consultez les informations principales du projet.</p>
      </div>

      <div class="form__group" style="margin-bottom: 1rem;">
        <label class="form__label" style="margin-bottom: 0.75rem;">
          <i class="fas fa-pen"></i> Nom du Projet
        </label>
        <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
          {{ $project->title }}
        </div>
      </div>

      <div class="form__group" style="margin-bottom: 1rem;">
        <label class="form__label" style="margin-bottom: 0.75rem;">
          <i class="fas fa-align-left"></i> Description
        </label>
        <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;  overflow-wrap: break-word;
        word-wrap: break-word; word-break: break-word; white-space: pre-wrap; max-width: 100%;">
          {{ $project->description }}
        </div>
      </div>

      <div class="form__row" style="margin-bottom: 1rem;">
        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-users"></i> Public Cible
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $project->target_audience }}
          </div>
        </div>

        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-chart-line"></i> Impact
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $project->impact }}
          </div>
        </div>
      </div>

      <div class="form__row" style="margin-bottom: 1rem;">

        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            Objectif de financement (FCFA)
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $project->goal_amount }}
          </div>
        </div>


        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-check-circle"></i> Statut
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            @php
              $statusLabel = [
                'active' => 'En cours',
                'completed' => 'Terminée',
                'draft' => 'Planifiée',
              ];
            @endphp
            {{ $statusLabel[$project->status] ?? $project->status }}
          </div>
        </div> 
      </div>

      <div class="form__row" style="margin-bottom: 1rem;">
        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-calendar-alt"></i> Date de début
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $project->start_date ? substr($project->start_date, 0, 10) : '-' }}
          </div>
        </div>

        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-calendar-check"></i> Date de fin
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $project->end_date ? substr($project->end_date, 0, 10) : '-' }}
          </div>
        </div>
      </div>

      <div class="form__group">
        <label class="form__label" style="margin-bottom: 0.75rem;">
          <i class="fas fa-images"></i> Image
        </label>
        <div class="upload-box" style="height: 250px; width: 100%; cursor: default;">
          @if($project->image)
            <img id="imagePreview" src="{{ asset('storage/' . $project->image) }}" style="display:block; width:100%; height:100%; object-fit:cover;">
          @else
            <div class="upload-overlay" style="opacity:1; pointer-events:none;">
              <i class="fas fa-image"></i>
              <p>Aucune image</p>
            </div>
          @endif
        </div>
      </div>


      <div class="form__group" style="margin-top: 2rem;">
          <label class="form__label" style="margin-bottom: 1rem;">
              <i class="fas fa-hands-helping"></i>
              Bénévoles affectés
          </label>
          <div style="
              border: 2px solid #e2e8f0;
              border-radius: 12px;
              background: #f8fafc;
              padding: 1rem;
          ">
              @forelse($project->volunteers as $volunteer)
                  <div style="
                      display:flex;
                      justify-content:space-between;
                      align-items:center;
                      padding:.75rem 0;
                      border-bottom:1px solid #e5e7eb;
                  ">
                      <div>
                          <strong>
                              {{ $volunteer->name }}
                          </strong>
                          <br>
                          <small>
                              {{ $volunteer->email }}
                          </small>
                      </div>
                      @if($volunteer->status === 'approved')
                          <span class="badge badge--success">
                              Actif
                          </span>
                      @else
                          <span class="badge badge--warning">
                              En attente
                          </span>
                      @endif  
                      <form action="{{ route('admin.projects.remove-volunteer', [$project, $volunteer]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Retirer ce bénévole du projet ?')" style=" border:none; background:#ef4444; color:white; padding:8px 12px; border-radius:8px; cursor:pointer; ">
                            <i class="fas fa-user-minus"></i>
                        </button>
                </form>
                  </div>  
              @empty
                  <div style="text-align:center; padding:2rem;">
                      <i
                          class="fas fa-user-friends"
                          style="
                              font-size:2rem;
                              color:#94a3b8;
                          "
                      ></i>
                      <p style="margin-top:1rem; color:#64748b;">
                          Aucun bénévole affecté à ce projet.
                      </p>
                  </div>
            @endforelse
          </div>
      </div>


      <div class="form__actions" style="margin-top: 1.5rem; align-items: center;">
        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn--primary" style="height: 40px;">
          <i class="fas fa-edit"></i> Modifier
        </a>

        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn--secondary" style="height: 40px; background-color : red;" onclick="return confirm('Etes-vous sure de vouloir supprimer ce projet?')">
            <i class="fas fa-trash"></i> Supprimer
          </button>
        </form>

        <a href="{{ route('admin.projects.index') }}" class="btn btn--secondary" style="height: 40px;">
          <i class="fas fa-arrow-left"></i> Retour
        </a>
      </div>

    </div>

  </div>
@endsection

