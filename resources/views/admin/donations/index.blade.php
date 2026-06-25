@extends('admin.layouts.admin')

@section('title', 'Dons')

@section('content')
  <section class="page-content page-content--wide">

    <div class="stats-grid">
      <div class="stats-card">
        <div class="stats-card__icon stats-card__icon--primary">
          <i class="fas fa-hand-holding-heart"></i>
        </div>
        <div class="stats-card__content">
          <div class="stats-card__number">€ 45,200</div>
          <div class="stats-card__label">Total Dons</div>
        </div>
      </div>
      <!-- More stats from prototype -->
    </div>

    <div class="table-card">
      <div class="table-card__header">
        <h2 class="table-card__title">Historique des Dons</h2>
        <p class="table-card__subtitle">8 transactions au total</p>
      </div>
      <table class="data-table">
        <thead>
          <tr>
            <th>Donateur</th>
            <th>Montant</th>
            <th>Date</th>
            <th>Méthode</th>
            <th>Statut</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <!-- Rows from prototype -->
          <tr>
            <td><strong>Jean Dupont</strong></td>
            <td>€ 500</td>
            <td>12 Août 2024</td>
            <td><i class="fas fa-credit-card"></i> Carte Bancaire</td>
            <td><span class="badge badge--completed">Complété</span></td>
            <td><!-- Actions --></td>
          </tr>
        </tbody>
      </table>
    </div>

  </section>
@endsection

