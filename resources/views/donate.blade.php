
@extends('layouts.app')

@section('content')

<!-- PAGE HEADER -->
<section class="page-header donate-head">
    <div class="overlay"></div>
    <div class="page-header-content">
        <span class="badge">Soutenez notre action</span>
        <h1>Faites un <span class="highlight">don</span></h1>
        <p>Chaque contribution, quelle que soit sa taille, transforme des vies. Ensemble, construisons un avenir meilleur.</p>
    </div>
</section>

<!-- WHY DONATE -->
<section class="why-donate">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Pourquoi donner ?</span>
            <h2>Votre don change <span class="text-gradient">des vies</span></h2>
        </div>
        <div class="why-grid">
            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                </div>
                <h3>Impact mesurable</h3>
                <p>100% de vos dons sont destinés aux projets sur le terrain. Aucun frais administratif ne est prélevé sur votre contribution.</p>
            </div>
            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                <h3>Transparence totale</h3>
                <p>Nous publions un rapport financier annuel détaillé. Vous savez exactement comment chaque euro est utilisé.</p>
            </div>
            <div class="why-card">
                <div class="why-icon" style="background: linear-gradient(135deg, #fc4a1a 0%, #f7b733 100%);">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3>Communauté engagée</h3>
                <p>Rejoignez plus de 2,400 donateurs qui partagent notre vision. Recevez des nouvelles directement du terrain.</p>
            </div>
        </div>
    </div>
</section>

<!-- HOW MONEY IS USED -->
<section class="money-usage">
    <div class="container">
        <div class="usage-grid">
            <div class="usage-text">
                <span class="section-tag">Transparence</span>
                <h2>Comment votre argent est <span class="text-gradient">utilisé</span></h2>
                <p>Nous croyons que vous méritez de savoir exactement où va votre argent. Voici la répartition de chaque euro donné.</p>

                <div class="usage-bars">
                    <div class="usage-bar-item">
                        <div class="bar-header">
                            <span>Projets sur le terrain</span>
                            <strong>85%</strong>
                        </div>
                        <div class="bar-track">
                            <div class="bar-fill" style="width: 85%; background: linear-gradient(90deg, #11998e 0%, #38ef7d 100%);"></div>
                        </div>
                    </div>
                    <div class="usage-bar-item">
                        <div class="bar-header">
                            <span>Formation & capacitation</span>
                            <strong>10%</strong>
                        </div>
                        <div class="bar-track">
                            <div class="bar-fill" style="width: 10%; background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);"></div>
                        </div>
                    </div>
                    <div class="usage-bar-item">
                        <div class="bar-header">
                            <span>Frais administratifs</span>
                            <strong>5%</strong>
                        </div>
                        <div class="bar-track">
                            <div class="bar-fill" style="width: 5%; background: linear-gradient(90deg, #fc4a1a 0%, #f7b733 100%);"></div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="usage-impact">
                <h3>Ce que votre don permet</h3>
                <div class="impact-list">
                    <div class="impact-list-item">
                        <strong>50 €</strong>
                        <span>Scolarise un enfant pendant 1 an</span>
                    </div>
                    <div class="impact-list-item">
                        <strong>100 €</strong>
                        <span>Construit 10 mètres de puits</span>
                    </div>
                    <div class="impact-list-item">
                        <strong>250 €</strong>
                        <span>Équipe un centre de santé</span>
                    </div>
                    <div class="impact-list-item">
                        <strong>500 €</strong>
                        <span>Finances une campagne médicale mobile</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DONATION FORM -->
<section class="donation-form-section">
    <div class="container">
        <div class="form-section-header">
            <span class="section-tag">Faire un don</span>
            <h2>Choisissez votre <span class="text-gradient">montant</span></h2>
        </div>

        <form class="donation-form" action="#" method="POST">
            <!-- AMOUNT SELECTION -->
            <div class="amount-section">
                <label class="form-label">Montant du don</label>
                <div class="amount-grid">
                    <button type="button" class="amount-btn" data-amount="20">20 €</button>
                    <button type="button" class="amount-btn" data-amount="50">50 €</button>
                    <button type="button" class="amount-btn active" data-amount="100">100 €</button>
                    <button type="button" class="amount-btn" data-amount="250">250 €</button>
                    <button type="button" class="amount-btn" data-amount="500">500 €</button>
                    <div class="amount-custom">
                        <input type="number" id="custom-amount" name="amount" placeholder="Autre montant" value="100">
                        <span>€</span>
                    </div>
                </div>

                <div class="frequency-toggle">
                    <label class="freq-option active">
                        <input type="radio" name="frequency" value="once" checked>
                        <span>Don unique</span>
                    </label>
                    <label class="freq-option">
                        <input type="radio" name="frequency" value="monthly">
                        <span>Don mensuel</span>
                    </label>
                </div>
            </div>

            <div class="form-columns">
                <!-- PERSONAL INFO -->
                <div class="form-column">
                    <h3 class="form-section-title">Vos informations</h3>
                    <div class="form-group">
                        <label for="don-firstname">Prénom</label>
                        <input type="text" id="don-firstname" name="firstname" placeholder="Jean" required>
                    </div>
                    <div class="form-group">
                        <label for="don-lastname">Nom</label>
                        <input type="text" id="don-lastname" name="lastname" placeholder="Dupont" required>
                    </div>
                    <div class="form-group">
                        <label for="don-email">Email</label>
                        <input type="email" id="don-email" name="email" placeholder="jean.dupont@email.com" required>
                    </div>
                    <div class="form-group">
                        <label for="don-phone">Téléphone</label>
                        <input type="tel" id="don-phone" name="phone" placeholder="+33 6 12 34 56 78">
                    </div>
                </div>

                <!-- PAYMENT METHOD -->
                <div class="form-column">
                    <h3 class="form-section-title">Mode de paiement</h3>
                    <div class="payment-methods">
                        <label class="payment-method active">
                            <input type="radio" name="payment" value="card" checked>
                            <div class="pm-content">
                                <div class="pm-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>
                                </div>
                                <div class="pm-info">
                                    <strong>Carte bancaire</strong>
                                    <span>Visa, Mastercard, CB</span>
                                </div>
                            </div>
                        </label>

                        <label class="payment-method">
                            <input type="radio" name="payment" value="mobile_money">
                            <div class="pm-content">
                                <div class="pm-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                                </div>
                                <div class="pm-info">
                                    <strong>Mobile Money</strong>
                                    <span>Orange Money, MTN Mobile, Wave</span>
                                </div>
                            </div>
                        </label>

                        <label class="payment-method">
                            <input type="radio" name="payment" value="bank_transfer">
                            <div class="pm-content">
                                <div class="pm-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="4" y1="9" x2="20" y2="9"/><line x1="4" y1="15" x2="20" y2="15"/><line x1="10" y1="3" x2="8" y2="21"/><line x1="16" y1="3" x2="14" y2="21"/></svg>
                                </div>
                                <div class="pm-info">
                                    <strong>Virement bancaire</strong>
                                    <span>IBAN / RIB</span>
                                </div>
                            </div>
                        </label>

                        <label class="payment-method">
                            <input type="radio" name="payment" value="paypal">
                            <div class="pm-content">
                                <div class="pm-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7.144 19.532l.478-3.06c.086-.547.527-.95 1.09-.95h.002c2.076 0 3.93-.858 5.268-2.428 1.338-1.57 1.944-3.65 1.666-5.724-.504-3.82-3.89-6.37-7.674-6.37H4.96c-.582 0-1.074.424-1.164 1.002L1.618 18.456c-.073.467.282.898.758.898h1.846c.54 0 1.01-.38 1.12-.91l.002-.01.8-3.902z"/></svg>
                                </div>
                                <div class="pm-info">
                                    <strong>PayPal</strong>
                                    <span>Paiement sécurisé en ligne</span>
                                </div>
                            </div>
                        </label>
                    </div>

                    <!-- Bank Transfer Details (shown conditionally) -->
                    <div class="bank-details" id="bank-details">
                        <div class="bd-card">
                            <h4>Coordonnées bancaires</h4>
                            <div class="bd-row">
                                <span>Bénéficiaire</span>
                                <strong>NEICA ASSO</strong>
                            </div>
                            <div class="bd-row">
                                <span>IBAN</span>
                                <strong>FR76 3000 1007 1600 0000 0000 123</strong>
                            </div>
                            <div class="bd-row">
                                <span>BIC / SWIFT</span>
                                <strong>SOGEFRPP</strong>
                            </div>
                            <div class="bd-row">
                                <span>Banque</span>
                                <strong>Société Générale, Paris</strong>
                            </div>
                            <p class="bd-note">Veuillez indiquer votre email en référence du virement pour que nous puissions vous envoyer le reçu fiscal.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-submit-area">
                <button type="submit" class="btn-primary btn-donate-submit">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                    Je fais un don de <span id="donation-amount">100</span> €
                </button>
                <p class="secure-note">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    Paiement 100% sécurisé. Vos données sont chiffrées et ne sont jamais stockées.
                </p>
            </div>
        </form>
    </div>
</section>

<!-- TRUST BADGES -->
<section class="trust-section">
    <div class="container">
        <div class="trust-grid">
            <div class="trust-item">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                <h4>Paiement sécurisé SSL</h4>
            </div>
            <div class="trust-item">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                <h4>Reçu fiscal sous 48h</h4>
            </div>
            <div class="trust-item">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                <h4>Annulation sous 14 jours</h4>
            </div>
            <div class="trust-item">
                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                <h4>Transparence totale</h4>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="{{ asset('js/donate.js') }}"></script>
@endpush

@endsection
