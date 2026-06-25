@extends('admin.layouts.admin')

@section('title', 'Tableau de bord')

@section('content')
  <div class="page-content page-content--wide">

    <!-- STATS CARDS -->
    <div class="stats-grid">
      <div class="stats-card">
        <div class="stats-card__icon stats-card__icon--primary">
          <i class="fas fa-folder-open"></i>
        </div>
        <div class="stats-card__content">
          <div class="stats-card__number">
            {{ $stats['projects'] }}
          </div>
          <div class="stats-card__label">Total Projets</div>
        </div>
      </div>

      <div class="stats-card">
        <div class="stats-card__icon stats-card__icon--warning">
          <i class="fas fa-newspaper"></i>
        </div>
        <div class="stats-card__content">
          <div class="stats-card__number">
            {{ $stats['posts'] }}
          </div>
          <div class="stats-card__label">Total Blogs</div>
        </div>
      </div>

      <div class="stats-card">
        <div class="stats-card__icon stats-card__icon--success">
          <i class="fas fa-user-friends"></i>
        </div>
        <div class="stats-card__content">
          <div class="stats-card__number">
             {{ $stats['volunteers'] }}
          </div>
          <div class="stats-card__label">Total Bénévoles</div>
        </div>
      </div>

      <div class="stats-card">
        <div class="stats-card__icon stats-card__icon--info">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="stats-card__content">
          <div class="stats-card__number">
            {{ $stats['messages'] }}
          </div>
          <div class="stats-card__label">Total Messages non lus</div>
        </div>
      </div>
    </div>

    <!-- RECENT ACTIVITIES TABLE -->
    <div class="table-card">

        <div class="table-card__header">
            <h2 class="table-card__title">
                Activités récentes
            </h2>
        </div>

        <div class="activity-list">

            @forelse($stats['activities'] as $activity)

                <div class="activity-item">

                    <div class="activity-item__icon">
                        <i class="{{ $activity['icon'] }}"></i>
                    </div>

                    <div class="activity-item__content">

                        <div class="activity-item__text">
                            {{ $activity['text'] }}
                        </div>

                        <small>
                            {{ $activity['date']->diffForHumans() }}
                        </small>

                    </div>

                </div>

            @empty

                <p>Aucune activité récente.</p>

            @endforelse

        </div>

    </div>

  </div>
@endsection

