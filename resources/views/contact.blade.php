
@extends('layouts.app')

@section('content')

<!-- PAGE HEADER -->
<section class="page-header">
    <div class="overlay"></div>
    <div class="page-header-content">
        <span class="badge">Restons en contact</span>
        <h1>Contactez-<span class="highlight">nous</span></h1>
        <p>Vous avez une question, un projet ou souhaitez devenir bénévole ? Nous sommes à votre écoute.</p>
    </div>
</section>

<!-- CONTACT SECTION -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <!-- CONTACT INFO -->
            <div class="contact-info">
                <span class="section-tag">Nos coordonnées</span>
                <h2>Parlons de <span class="text-gradient">votre projet</span></h2>
                <p>Que vous soyez un particulier, une entreprise ou une association, nous serons ravis d'échanger avec vous sur la manière dont nous pouvons collaborer.</p>

                <div class="info-cards">
                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div class="info-content">
                            <h4>Siège social</h4>
                            <p>12 rue de la Solidarité<br>75011 Paris, France</p>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div class="info-content">
                            <h4>Email</h4>
                            <p>contact@neica-asso.org<br>partenariats@neica-asso.org</p>
                        </div>
                    </div>
                    <div class="info-card">
                        <div class="info-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <div class="info-content">
                            <h4>Téléphone</h4>
                            <p>+33 1 23 45 67 89<br>Lun-Ven, 9h-18h</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CONTACT FORM -->
            <div class="contact-form-wrapper">
                <form class="contact-form" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    
                    @if(session('success'))
                        <div class="alert alert-success mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-header">
                        <h3>Envoyez-nous un message</h3>
                        <p>Remplissez le formulaire ci-dessous, nous vous répondrons sous 48h.</p>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" placeholder="Jean" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" placeholder="Dupont" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="jean.dupont@email.com" required>
                    </div>

                    <div class="form-group">
                        <label for="sujet">Sujet</label>
                        <select id="sujet" name="sujet" required>
                            <option value="">Choisir un sujet</option>
                            <option value="don">Faire un don</option>
                            <option value="benevolat">Devenir bénévole</option>
                            <option value="partenariat">Partenariat</option>
                            <option value="presse">Presse & Médias</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" rows="5" placeholder="Décrivez votre demande..." required></textarea>
                    </div>

                    <button type="submit" class="btn-primary btn-submit">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        Envoyer le message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- FAQ SECTION -->
<section class="faq-section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">FAQ</span>
            <h2>Questions <span class="text-gradient">fréquentes</span></h2>
        </div>
        <div class="faq-grid">
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Comment puis-je faire un don ?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Vous pouvez faire un don en ligne sécurisé via notre page <a href="/donate">Faire un don</a>. Nous acceptons aussi les virements bancaires et les chèques à l'ordre de NEICA ASSO.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Comment devenir bénévole ?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Remplissez le formulaire de contact en sélectionnant "Devenir bénévole". Notre équipe vous contactera pour un entretien et vous proposera des missions adaptées à vos compétences.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Où intervenez-vous ?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Nous intervenons actuellement dans 12 pays d'Afrique de l'Ouest et centrale : Sénégal, Mali, Burkina Faso, Bénin, Togo, Ghana, Côte d'Ivoire, Niger, Guinée, Liberia, Sierra Leone et Mauritanie.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-question">
                    <h4>Puis-je visiter vos projets sur le terrain ?</h4>
                    <span class="faq-toggle">+</span>
                </div>
                <div class="faq-answer">
                    <p>Oui ! Nous organisons régulièrement des voyages solidaires pour nos donateurs et bénévoles. Contactez-nous pour connaître les prochaines dates disponibles.</p>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script src="{{ asset('js/contact.js') }}"></script>
@endpush

@endsection
