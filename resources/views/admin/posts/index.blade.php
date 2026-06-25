@extends('admin.layouts.admin')

@section('title', 'Blogs')

@section('content')
  <section class="page-content page-content--wide">

    <div class="table-card">
      <div class="table-card__header">
        <div>
          <h2 class="table-card__title">Tous les Blogs</h2>
        </div>
        <div class="table-card__actions">
          <div class="search-box">
            <input type="text" class="search-box__input" placeholder="Rechercher un post...">
          </div>
          <a href="{{ route('admin.posts.create') }}" class="btn btn--primary"><i class="fas fa-plus"></i> Créer un Post</a>
       </div>
        


        <table class="data-table">
            <thead>
                <tr>
                    <th>Titre</th> 
                    <th>Categorie</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category }}</td>
                    <td>{{ $post->created_at }}</td>
                    <td classe="a-badge">
                        @if($post->status === 'draft')
                        <span class="badge badge--draft">Brouillon</span>
                        @elseif($post->status === 'published')
                        <span class="badge badge--published">Publié</span>
                        @endif
                    </td>
                    <td>
                            <a href="{{ route('admin.posts.show', $post) }}" class="action-btn action-btn--view" title="Voir"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="action-btn action-btn--edit" title="Modifier"><i class="fas fa-pen"></i></a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn action-btn--delete" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce post?')" style="color : red ; background-color :rgba(248, 247, 244, 0.874)">
                                  <i class="fas fa-trash"></i></button>
                            </form>
                    </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" style="text-align: center;">Aucun post trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
  </section>

@endsection