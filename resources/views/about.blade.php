
@extends('layouts.app')

@section('content')

<!-- PAGE HEADER -->
<section class="page-header-about">
    <div class="overlay"></div>
    <div class="page-header-content">
        <span class="badge">Qui sommes-nous</span>
        <h1>À propos de <span class="highlight">NEICA </span></h1>
        <p>Découvrez notre histoire, nos valeurs et l'équipe qui œuvre chaque jour pour un monde meilleur.</p>
    </div>
</section>

<!-- STORY SECTION -->
<section class="story">
    <div class="container">
        <div class="story-grid">
            <div class="story-image">
                <div class="">
                    <img src="{{ asset('images/about.jfif') }}" alt="" class="story-image-main">
                </div>
                <div class="">
                    <img src="{{ asset('images/init.jfif') }}" alt="" class="story-image-accent">
                </div>
                <div class="story-badge">
                    <strong>9+</strong>
                    <span>années<br>d'engagement</span>
                </div>
            </div>
            <div class="story-content">
                <span class="section-tag">Notre histoire</span>
                <h2>De l'initiative locale à l'<span class="text-gradient">action internationale</span></h2>
                <p>NEICA est née en 2015 d'une conviction simple : chaque être humain mérite d'avoir accès aux ressources essentielles pour s'épanouir. Ce qui a commencé comme un petit collectif d'amis déterminés à aider une communauté rurale sénégalaise est devenu une association reconnue intervenant dans 12 pays.</p>
                <p>Aujourd'hui, nous comptons plus de 200 bénévoles actifs et avons touché la vie de milliers de personnes à travers nos projets en éducation, santé et développement communautaire.</p>
                <div class="story-stats-row">
                    <div class="s-stat">
                        <strong>2015</strong>
                        <span>Création</span>
                    </div>
                    <div class="s-stat">
                        <strong>12</strong>
                        <span>Pays</span>
                    </div>
                    <div class="s-stat">
                        <strong>200+</strong>
                        <span>Bénévoles</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- VALUES SECTION -->
<section class="values">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Nos valeurs</span>
            <h2>Les principes qui <span class="text-gradient">guident nos actions</span></h2>
        </div>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-number">01</div>
                <h3>Transparence</h3>
                <p>Chaque euro est traçable. Nous publions un bilan annuel détaillé de l'utilisation des fonds et des résultats obtenus sur le terrain.</p>
            </div>
            <div class="value-card">
                <div class="value-number">02</div>
                <h3>Proximité</h3>
                <p>Nous travaillons main dans la main avec les communautés locales. Aucun projet ne voit le jour sans leur participation active.</p>
            </div>
            <div class="value-card">
                <div class="value-number">03</div>
                <h3>Durabilité</h3>
                <p>Nos projets sont conçus pour perdurer dans le temps. Nous formons des relais locaux et créons des structures autosuffisantes.</p>
            </div>
            <div class="value-card">
                <div class="value-number">04</div>
                <h3>Respect</h3>
                <p>Nous respectons les cultures, les traditions et l'autonomie de chaque communauté. Notre rôle est d'accompagner, pas d'imposer.</p>
            </div>
        </div>
    </div>
</section>

<!-- TEAM SECTION -->
<section class="team">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Notre équipe</span>
            <h2>Les visages de <span class="text-gradient">NEICA </span></h2>
            <p>Une équipe passionnée et dévouée qui met son expertise au service des plus vulnérables.</p>
        </div>
        <div class="team-grid">
            <div class="team-card">
                <div class="team-avatar avatar-purple">AM</div>
                <h3>Amadou Mbengue</h3>
                <span class="team-role">Président & Fondateur</span>
                <p>Ancien consultant en développement international, il a créé NEICA après un voyage au Sénégal qui a tout changé.</p>
            </div>
            <div class="team-card">
                <div class="team-avatar avatar-green">SL</div>
                <h3>Sophie Lefebvre</h3>
                <span class="team-role">Directrice des Opérations</span>
                <p>Ingénieure agronome de formation, elle coordonne l'ensemble des projets sur le terrain avec rigueur et passion.</p>
            </div>
            <div class="team-card">
                <div class="team-avatar avatar-orange">KD</div>
                <h3>Kofi Danso</h3>
                <span class="team-role">Responsable Programme Santé</span>
                <p>Médecin urgentiste, il dirige nos campagnes médicales mobiles et la formation des soignants locaux.</p>
            </div>
            <div class="team-card">
                <div class="team-avatar avatar-blue">MB</div>
                <h3>Marie Boucher</h3>
                <span class="team-role">Responsable Communication</span>
                <p>Journaliste reconvertie, elle raconte nos histoires et donne voix aux communautés que nous accompagnons.</p>
            </div>
        </div>
    </div>
</section>

<!-- TIMELINE SECTION -->
<section class="timeline-section">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Notre parcours</span>
            <h2>Les grandes étapes de <span class="text-gradient">notre histoire</span></h2>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2015</span>
                    <h3>La naissance de NEICA</h3>
                    <p>Création de l'association par un groupe d'amis après un voyage au Sénégal. Premier projet : rénovation d'une école à Dakar.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2017</span>
                    <h3>Première campagne médicale</h3>
                    <p>Lancement des campagnes médicales mobiles au Mali. 2,000 personnes soignées lors de la première tournée.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2019</span>
                    <h3>Expansion régionale</h3>
                    <p>NEICA intervient désormais dans 8 pays d'Afrique de l'Ouest. Ouverture de notre premier bureau local au Bénin.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2021</span>
                    <h3>Partenariat avec l'UNICEF</h3>
                    <p>Signature d'un partenariat stratégique pour la scolarisation des filles dans les zones rurales du Mali et du Burkina Faso.</p>
                </div>
            </div>
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <span class="timeline-year">2024</span>
                    <h3>12 pays, 48 projets</h3>
                    <p>Avec plus de 200 bénévoles et des milliers de donateurs, NEICA est devenue une référence de l'aide humanitaire.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta">
    <div class="container">
        <div class="cta-content">
            <h2>Vous souhaitez nous rejoindre ?</h2>
            <p>Devenez bénévole, faites un don ou partagez notre mission. Ensemble, nous pouvons changer des vies.</p>
            <div class="cta-buttons">
                <a href="/donate" class="btn-primary btn-large">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    Faire un don
                </a>
                <a href="/contact" class="btn-secondary btn-large">
                    Nous contacter
                </a>
            </div>
        </div>
    </div>
</section>

@endsection
