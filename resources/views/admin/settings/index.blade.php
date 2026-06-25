@extends('admin.layouts.admin')

@section('title', 'Paramètres')

@section('content')
  <section class="page-content page-content--narrow">

    <div class="form-card">
      <div class="form-card__header">
        <h2 class="form-card__title">
          <i class="fas fa-building"></i>
          Informations de l'Association
        </h2>
      </div>

      <form class="form" action="#" method="POST">
        <div class="form__group">
          <label class="form__label" for="assoc-name">
            <i class="fas fa-building"></i> Nom de l'association
          </label>
          <input type="text" id="assoc-name" name="assoc_name" class="form__input" value="NEICA">
        </div>
        <!-- More fields from prototype -->
        <div class="form__actions">
          <button type="submit" class="btn btn--primary">
            <i class="fas fa-save"></i> Enregistrer
          </button>
        </div>
      </form>
    </div>

  </section>
@endsection

