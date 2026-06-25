@extends('layouts.app')

@section('title', 'Devenir Bénévole | NEICA ASSO')

@section('content')

<!-- PAGE HEADER -->
<section class="page-header-volunteer">
    <div class="overlay"></div>
    <div class="page-header-content">
        <span class="badge">Devenir bénévole</span>
        <h1>Rejoignez-<span class="highlight">nous</span></h1>
        <p>Remplissez le formulaire ci-dessous et dites-nous comment vous souhaitez contribuer à nos actions.</p>
    </div>
</section>

<!-- VOLUNTEER SECTION -->
<section class="volunteer-section">
    <div class="volunteer-container">
          <!-- VOLUNTEER INFO -->
            <div class="volunteer-info">
                <span class="section-tag">Pourquoi s’engager ?</span>
                <h2>Un impact concret pour <span class="text-gradient">les communautés</span></h2>
                <p>Découvrez comment votre énergie, vos compétences et votre motivation peuvent transformer des vies.</p>

                <div class="info-cards">
                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2l3 7 7 3-7 3-3 7-3-7-7-3 7-3 3-7z"/></svg>
                        </div>
                        <div class="info-content">
                            <h4>Impact réel</h4>
                            <p>Contribuez à des actions concrètes en faveur de l’éducation, de la santé et du développement.</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 11c1.66 0 3-1.34 3-3S17.66 5 16 5s-3 1.34-3 3 1.34 3 3 3z"/><path d="M8 11c1.66 0 3-1.34 3-3S9.66 5 8 5 5 6.34 5 8s1.34 3 3 3z"/><path d="M21 19c0-3-2-5-5-5"/><path d="M3 19c0-3 2-5 5-5"/><path d="M15 19c0-2.5-1.5-4-3-4s-3 1.5-3 4"/></svg>
                        </div>
                        <div class="info-content">
                            <h4>Développer vos compétences</h4>
                            <p>Renforcez votre leadership, acquérez de l’expérience et développez votre réseau.</p>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-2l-2 5H6l2-5H6L2 12l4 10h16l4-10-4-10z"/><path d="M12 12a2 2 0 1 0 0 .01"/></svg>
                        </div>
                        <div class="info-content">
                            <h4>Rejoindre une communauté</h4>
                            <p>Participez avec des personnes partageant les mêmes valeurs et la même vision.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FORM -->
            <div class="contact-form-wrapper">
                <form class="contact-form" action="{{ route('volunteer.store') }}" method="POST">
                    @csrf

                    <div class="form-header">
                        <h3>Formulaire d’inscription</h3>
                        <p>Votre candidature sera envoyée à notre équipe. Réponse sous 48h (selon disponibilité).</p>
                    </div>

                    @if(session('success'))
                        <div class="success-message">{{ session('success') }}</div>
                    @endif

                    <div class="form-row">
                        <div class="form-group">
                            <label>Nom complet</label>
                            <input type="text" name="name" placeholder="Votre nom" required>
                        </div>

                        <div class="form-group">
                            <label>Adresse e-mail</label>
                            <input type="email" name="email" placeholder="vous@email.com" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label>Numéro de téléphone</label>
                            <input type="text" name="phone" placeholder="+33 ..." required>
                        </div>

                        <div class="form-group">
                            <label>Disponibilité</label>
                            <select name="availability" required>
                                <option value="">Sélectionnez votre disponibilité</option>
                                <option value="weekends">Week-ends</option>
                                <option value="part_time">Temps partiel</option>
                                <option value="full_time">Temps plein</option>
                                <option value="occasionally">Occasionnellement</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Compétences</label>
                        <textarea name="skills" rows="3" placeholder="Informatique, communication, enseignement, santé..."></textarea>
                    </div>

                    <div class="form-group">
                        <label>Motivation</label>
                        <textarea name="motivation" rows="5" placeholder="Expliquez pourquoi vous souhaitez rejoindre NEICA ASSO..."></textarea>
                    </div>

                    <button type="submit" class="btn-primary btn-submit">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        Soumettre ma candidature
                    </button>
                </form>
            </div>

        
    </div>
</section>

@endsection

