@extends('admin.layouts.admin')

@section('title', 'Détails du Post — NEICA Admin')

@section('content')
  <div class="page-content page-content--wide">

    <div class="form-card">
      <div class="form-card__header">
        <h2 class="form-card__title">
          <i class="fas fa-info-circle"></i>
          Détails du Post
        </h2>
        <p class="form-card__subtitle">Consultez les informations principales du post.</p>
      </div>

      @php
        $statusLabel = [
          'draft' => 'Brouillon',
          'published' => 'Publié',
        ];
        $status = $statusLabel[$post->status] ?? $post->status;
      @endphp

      <div class="form__group" style="margin-bottom: 1rem;">
        <label class="form__label" style="margin-bottom: 0.75rem;">
          <i class="fas fa-pen"></i> Titre du Post
        </label>
        <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
          {{ $post->title }}
        </div>
      </div>

      <div class="form__row" style="margin-bottom: 1rem;">
        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-tag"></i> Catégorie
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $post->category ?? '-' }}
          </div>
        </div>

        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-check-circle"></i> Statut
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $status }}
          </div>
        </div>
      </div>

      <div class="form__group" style="margin-bottom: 1rem;">
        <label class="form__label" style="margin-bottom: 0.75rem;">
          <i class="fas fa-align-left"></i> Extrait
        </label>
        <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc; overflow-wrap: break-word; word-break: break-word; white-space: pre-wrap; max-width: 100%;">
          {{ $post->excerpt ?? '-' }}
        </div>
      </div>

      <div class="form__group" style="margin-bottom: 1rem;">
        <label class="form__label" style="margin-bottom: 0.75rem;">
          <i class="fas fa-file-alt"></i> Contenu
        </label>
        <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc; overflow-wrap: break-word; word-break: break-word; white-space: pre-wrap; max-width: 100%;">
          {!! $post->content ?? '' !!}
        </div>
      </div>

      <div class="form__row" style="margin-bottom: 1rem;">
        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-calendar-alt"></i> Date de création
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $post->created_at ? substr($post->created_at, 0, 10) : '-' }}
          </div>
        </div>

        <div class="form__group" style="margin-bottom: 0;">
          <label class="form__label" style="margin-bottom: 0.75rem;">
            <i class="fas fa-calendar-check"></i> Date de publication
          </label>
          <div style="padding: 0.875rem 1rem; border: 2px solid #e2e8f0; border-radius: 12px; background:#f8fafc;">
            {{ $post->published_at ? substr($post->published_at, 0, 10) : '-' }}
          </div>
        </div>
      </div>

      <div class="form__group" style="margin-bottom: 0.75rem;">
        <label class="form__label" style="margin-bottom: 0.75rem;">
          <i class="fas fa-images"></i> Image du Post
        </label>
        <div class="upload-box" style="height: 250px; width: 100%; cursor: default;">
          @if($post->image)
            <img
              id="imagePreview"
              src="{{ asset('storage/' . $post->image) }}"
              style="display:block; width:100%; height:100%; object-fit:cover;"
              alt="Image du post"
            >
          @else
            <div class="upload-overlay" style="opacity:1; pointer-events:none;">
              <i class="fas fa-image"></i>
              <p>Aucune image</p>
            </div>
          @endif
        </div>
      </div>

      <div class="form__actions" style="margin-top: 1.5rem; align-items: center;">
        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn--primary" style="height: 40px;">
          <i class="fas fa-edit"></i> Modifier
        </a>

        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
          @csrf
          @method('DELETE')
          <button
            type="submit"
            class="btn btn--secondary"
            style="height: 40px; background-color : red"
            onclick="return confirm('Etes-vous sure de vouloir supprimer ce post?')"
          >
            <i class="fas fa-trash"></i> Supprimer
          </button>
        </form>

        <a href="{{ route('admin.posts.index') }}" class="btn btn--secondary" style="height: 40px;">
          <i class="fas fa-arrow-left"></i> Retour
        </a>
      </div>

    </div>
  </div>
@endsection

