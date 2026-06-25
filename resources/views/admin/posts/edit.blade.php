@extends('admin.layouts.admin')

@section('title', 'Modifier le Post — NEICA Admin')

@section('content')
    <div class="page-content page-content--narrow">

        <div class="form-card">
            <div class="form-card__header">
                    <h2 class="form-card__title">
                        <i class="fas fa-pen"></i>
                        Modifier le Projet
                    </h2>
                    <p class="form-card__subtitle">Mettez à jour les informations du projet.</p>
            </div>

            <form class="admin-post-form" method="POST" action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Project Name -->
                <div class="form__group">
                    <label class="form__label" for="post_name">
                        <i class="fas fa-pen"></i> Titre du post
                    </label>
                    <input
                        type="text"
                        id="post_title"
                        name="title"
                        class="form__input"
                        placeholder="ex: Eau Potable pour Tous"
                        value="{{ old('title', $post->title ?? '') }}"
                        required
                    />
                </div>

                <div class="form__group">
                    <label class="form__label" for="post_content">
                        <i class="fas fa-align-left"></i> Contenu du Post
                    </label>
                    <textarea
                        id="content"
                        name="content"
                        class="form__textarea"
                        placeholder="Entrez le contenu du post..."
                        rows=""   >{{ old('content' , $post->content ?? '') }}
                    </textarea>
                </div>

                <div class="form__group">
                    <label class="form__label" for="post_category">
                        <i class="fas fa-tag"></i> Catégorie
                    </label>
                    <input
                        type="text"
                        id="post_category"
                        name="category"
                        class="form__input"
                        placeholder="Category"
                        value="{{ old('category' , $post->category ?? '') }}"
                    />
                </div>

                <div class="form__group">
                    <label class="form__label" for="post_status">
                        <i class="fas fa-check-circle"></i> Statut
                    </label>
                    <select id="post_status" name="status" class="form__select" required>
                        <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Brouillon</option>
                        <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Publié</option>
                    </select>
                </div>


                <div class="form__group">
                    <label class="form__label" for="post_images">
                        <i class="fas fa-images"></i> Image du Post
                    </label>

                    <div class="upload-box" id="uploadBox">
                        <input
                        type="file"
                        id="imageInput"
                        name="image"
                        class="form__file-input"
                        accept="image/*"
                        />

                        <img id="imagePreview" style="display: none;" />

                        <div class="upload-overlay" id="uploadOverlay">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Click or drag image here</p>
                        </div>

                    <button type="button" id="removeImage" class="remove-btn" aria-label="Remove image">✕</button>
                </div>
                </div>

                <div class="form__actions">
                    <button type="submit" class="btn btn--primary">
                        <i class="fas fa-plus"></i> Modifier le Post
                    </button>
                <a href="{{ route('admin.posts.index') }}" class="btn btn--secondary">Annuler</a>
                </div>
            </form>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/tinymce@7/tinymce.min.js"></script>  <script>
        document.addEventListener('DOMContentLoaded', function () {
        const uploadBox = document.getElementById('uploadBox');
        const input = document.getElementById('imageInput');
        const preview = document.getElementById('imagePreview');
        const removeBtn = document.getElementById('removeImage');

        if (uploadBox && input) {
            uploadBox.addEventListener('click', () => input.click());
        }

        if (input) {
            input.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                showImage(this.files[0]);
            }
            });
        }

        if (uploadBox) {
            uploadBox.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadBox.style.borderColor = '#3b82f6';
            });

            uploadBox.addEventListener('dragleave', () => {
            uploadBox.style.borderColor = '#d1d5db';
            });

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

        function showImage(file) {
            if (!preview) return;
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
            if (uploadBox) uploadBox.classList.add('has-image');
        }

        if (removeBtn && input) {
            removeBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            input.value = '';

            if (preview) {
                preview.src = '';
                preview.style.display = 'none';
            }

            if (uploadBox) uploadBox.classList.remove('has-image');
            });
        }
        });

        tinymce.init({
        selector: '#content',
        height: 500,

        plugins: [
            'lists',
            'table',
        ],

        toolbar:
            'undo redo | styles | bold italic underline | alignleft aligncenter alignright | bullist numlist | table'
    });
    </script>
@endsection