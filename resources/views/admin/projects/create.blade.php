
@extends('admin.layouts.admin')

@section('title', 'Créer un Projet — NEICA Admin')

@section('content')
  <div class="page-content page-content--narrow">

    <div class="form-card">
      <div class="form-card__header">
        <h2 class="form-card__title">
          <i class="fas fa-info-circle"></i>
          Information du Projet
        </h2>
        <p class="form-card__subtitle">Remplissez les détails ci-dessous pour créer un nouveau projet.</p>
      </div>

      <form class="form" action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Project Name -->
        <div class="form__group">
          <label class="form__label" for="project_name">
            <i class="fas fa-pen"></i> Nom du Projet
          </label>
          <input type="text" id="project_name" name="title" class="form__input" placeholder="ex: Eau Potable pour Tous" required />
        </div>

        <!-- Project Description -->
        <div class="form__group">
          <label class="form__label" for="project_description">
            <i class="fas fa-align-left"></i> Description du Projet
          </label>
          <textarea id="project_description" name="description" class="form__textarea" placeholder="Donnez un aperçu du projet..." rows="4" required>{{ old('content', $post->content ?? '') }}</textarea>
          <p class="form__helper">Décrivez ce qu'est le projet et pourquoi il est important.</p>
        </div>

        <!-- Row: Target Audience + Project Impact -->
        <div class="form__row">
          <div class="form__group">
            <label class="form__label" for="target_audience">
              <i class="fas fa-users"></i> Public Cible
            </label>
            <input type="text" id="target_audience" name="target_audience" class="form__input" placeholder="ex: enfants, étudiants, femmes" required />
          </div>

          <div class="form__group">
            <label class="form__label" for="project_impact">
              <i class="fas fa-chart-line"></i> Impact du Projet
            </label>
            <input type="text" id="project_impact" name="project_impact" class="form__input" placeholder="ex: 200 enfants soutenus" required />
          </div>
        </div>

        <!-- Row: Project Status + Project Images -->
        <div class="form__row">
          <div class="form__group">
            <label class="form__label" for="project_status">
              <i class="fas fa-check-circle"></i> Statut du Projet
            </label>
            <select id="project_status" name="status" class="form__select" required>
              <option value="" disabled selected>Sélectionnez un statut...</option>
              <option value="ongoing">En cours</option>
              <option value="planned">Planifié</option>
            </select>
          </div>

          <div class="form-group">
              <label for="goal_amount">
                  Objectif de financement (FCFA)
              </label>

              <input
                  type="number"
                  id="goal_amount"
                  name="goal_amount"
                  class="form-control"
                  min="0"
                  step="0.01"
                  value="{{ old('goal_amount') }}"
                  required
              >
          </div>


          <div class="form__group">
            <label class="form__label" for="project_images">
              <i class="fas fa-images"></i> Images du Projet
            </label>
            <div class="upload-box" id="uploadBox">

                <input type="file"
                      id="imageInput"
                      name="image"
                      class="form__file-input"
                      accept="image/*" />


                <!-- Preview -->
                <img id="imagePreview" />

                <!-- Overlay -->
                <div class="upload-overlay" id="uploadOverlay">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Click or drag image here</p>
                </div>

                <!-- Remove button -->
                <button type="button" id="removeImage" class="remove-btn">✕</button>

            </div>
          </div>
        </div>

        <!-- Row: Start Date + End Date -->
        <div class="form__row">
          <div class="form__group">
            <label class="form__label" for="start_date">
              <i class="fas fa-calendar-alt"></i> Date de Début
            </label>
            <input type="date" id="start_date" name="start_date" class="form__input" required />
          </div>

          <div class="form__group">
            <label class="form__label" for="end_date">
              <i class="fas fa-calendar-check"></i> Date de Fin
            </label>
            <input type="date" id="end_date" name="end_date" class="form__input" required />
          </div>
        </div>

        <!-- Form Actions -->
        <div class="form__actions">
          <button type="submit" class="btn btn--primary">
            <i class="fas fa-plus"></i> Créer le Projet
          </button>
          <a href="{{ route('admin.projects.index') }}" class="btn btn--secondary">Annuler</a>
        </div>

      </form>
    </div>

  </div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const uploadBox = document.getElementById('uploadBox');
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('imagePreview');
    const removeBtn = document.getElementById('removeImage');

    // Click upload box
    if (uploadBox && input) {
        uploadBox.addEventListener('click', () => input.click());
    }

    // File select
    if (input) {
        input.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                showImage(this.files[0]);
            }
        });
    }

    // Drag over
    if (uploadBox) {
        uploadBox.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadBox.style.borderColor = '#3b82f6';
        });

        uploadBox.addEventListener('dragleave', () => {
            uploadBox.style.borderColor = '#d1d5db';
        });

        // Drop file
        uploadBox.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadBox.style.borderColor = '#d1d5db';

            const file = e.dataTransfer.files[0];

            if (file) {
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(file);
                input.files = dataTransfer.files;

                showImage(file);
            }
        });
    }

    // Show preview
    function showImage(file) {
        if (!preview) return;

        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';

        if (uploadBox) {
            uploadBox.classList.add('has-image');
        }
    }

    // Remove image
    if (removeBtn && input) {
        removeBtn.addEventListener('click', (e) => {
            e.stopPropagation();

            input.value = '';

            if (preview) {
                preview.src = '';
                preview.style.display = 'none';
            }

            if (uploadBox) {
                uploadBox.classList.remove('has-image');
            }
        });
    }

});
</script>

@endsection


