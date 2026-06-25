@extends('admin.layouts.admin')

@section('title', 'Bénévoles')

@section('content')
 <section class="page-content page-content--wide">

    <div class="table-card">
      <div class="table-card__header">
        <div>
          <h2 class="table-card__title">Tous les bénévoles</h2>
        </div>
        <div class="table-card__actions">
          <div class="search-box">
            <input type="text" class="search-box__input" placeholder="Rechercher un bénévole...">
          </div>
       </div>

       <table class="data-table">
            <thead>
                <tr>
                    <th>Nom</th> 
                    <th>Email</th>
                    <th>Numéro</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
       
            <tbody>
                @foreach ( $volunteers as $volunteer )
                    <tr>
                       <td>{{ $volunteer->name }}</td>  
                       <td>{{ $volunteer->email }}</td>
                       <td>{{ $volunteer->phone }}</td>  
                       <td>{{ $volunteer->created_at->format('d/m/Y') }}</td>  
                       <td>
                            @if($volunteer->status === 'approved')
                                <span class="badge badge--active">
                                    Actif
                                </span>
                            @elseif($volunteer->status === 'pending')
                                <span class="badge badge--pending">
                                    En attente
                                </span>
                            @else
                                <span class="badge badge--inactive">
                                    Rejeté
                                </span>
                            @endif
                        </td> 

                        <td>
                            <a href="{{ route('admin.volunteers.show', $volunteer) }}" class="action-btn action-btn--view" title="Voir"> <i class="fas fa-eye"> </i> </a>
                            <form action="{{ route('admin.volunteers.destroy', $volunteer) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-btn action-btn--delete" title="Supprimer" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bénévole?')" style="color : red ; background-color :rgba(248, 247, 244, 0.874)">
                                  <i class="fas fa-trash"></i></button>
                            </form>
                        </td>

                    </tr>

                @endforeach


                </tbody>

        </table>
    </div>
 </section>
       
@endsection