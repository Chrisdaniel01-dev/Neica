@extends('layouts.app')

@section('content')

<!-- HERO SECTION -->
<section class="hero">
    <div class="overlay"></div>
    <div class="hero-content">
        <span class="badge"> Nouvelle Etudes Inclusives pour la Communauté Africaine</span>
        <h1>Agir aujourd'hui pour un <span class="highlight">avenir meilleur</span></h1>
        <p>Nous accompagnons les communautés vulnérables à travers des projets concrets et durables en éducation, santé et développement.</p>
        <div class="hero-buttons">
            <a href="{{ route('donate.create') }}" class="btn-primary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                Faire un don
            </a>
            <a href="{{ route('projects.index') }}" class="btn-secondary">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                Découvrir nos projets
            </a>
        </div>
        <div class="hero-stats">
            <div class="h-stat">
                <strong>2,500+</strong>
                <span>Vies changées</span>
            </div>
            <div class="h-stat">
                <strong>48</strong>
                <span>Projets réalisés</span>
            </div>
            <div class="h-stat">
                <strong>12</strong>
                <span>Pays intervenus</span>
            </div>
        </div>
    </div>

</section>

<!-- MISSION SECTION -->
<section class="mission">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Notre mission</span>
            <h2>Construire un monde plus <span class="text-gradient">juste et solidaire</span></h2>
            <p>NEICA œuvre depuis 2015 pour offrir à chacun les moyens de s'épanouir et de construire son avenir.</p>
        </div>
        <div class="cards">
            <div class="card" data-aos="fade-up" data-aos-delay="0">
                <div class="card-icon icon-education">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                </div>
                <h3>Éducation</h3>
                <p>Construction d'écoles, bourses scolaires et formation professionnelle pour les jeunes défavorisés.</p>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="100">
                <div class="card-icon icon-health">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                </div>
                <h3>Santé</h3>
                <p>Campagnes médicales mobiles, accès à l'eau potable et sensibilisation aux maladies.</p>
            </div>

            <div class="card" data-aos="fade-up" data-aos-delay="200">
                <div class="card-icon icon-community">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
                <h3>Développement</h3>
                <p>Appui aux petits entrepreneurs agricoles et création d'infrastructures communautaires.</p>
            </div>

        </div>
    </div>
</section>


<!-- IMPACT SECTION -->
<section class="impact">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Notre impact</span>
            <h2>Des résultats <span class="text-gradient">concrets et mesurables</span></h2>
            <p>Depuis 2015, chaque action compte. Voici ce que nous avons accompli ensemble.</p>
        </div>
        <div class="impact-cards">
            <div class="impact-card">
                <div class="impact-circle blue">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2.69l5.74 5.88-5.74 5.88-5.74-5.88z"/><path d="M12 22a8 8 0 0 0 8-8c0-3.5-2-6.5-5-8l-3 3-3-3c-3 1.5-5 4.5-5 8a8 8 0 0 0 8 8z"/></svg>
                </div>
                <div class="impact-number">
                    <span class="counter" data-target="47">0</span>
                </div>
                <div class="impact-label">Puits d'eau potable</div>
                <div class="impact-desc">Construits dans des villages ruraux</div>
            </div>
            <div class="impact-card">
                <div class="impact-circle green">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </div>
                <div class="impact-number">
                    <span class="counter" data-target="18">0</span>
                </div>
                <div class="impact-label">Écoles rénovées</div>
                <div class="impact-desc">Ou construites à neuf</div>
            </div>
            <div class="impact-card">
                <div class="impact-circle orange">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>
                </div>
                <div class="impact-number">
                    <span class="counter" data-target="12500">0</span>
                </div>
                <div class="impact-label">Personnes soignées</div>
                <div class="impact-desc">Chaque année par nos équipes</div>
            </div>
            <div class="impact-card">
                <div class="impact-circle purple">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <div class="impact-number">
                    <span class="counter" data-target="350">0</span>
                </div>
                <div class="impact-label">Agriculteurs</div>
                <div class="impact-desc">Accompagnés et formés</div>
            </div>
        </div>
    </div>
</section>


<!-- PROJECTS PREVIEW -->
<section class="projects-preview">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Nos projets</span>
            <h2>Des actions <span class="text-gradient">sur le terrain</span></h2>
            <p>Découvrez nos dernières initiatives qui changent des vies au quotidien.</p>
        </div>

        <div class="project-cards">
            @forelse($projects as $project)
                <div class="project-card">

                    <div class="project-image">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                style="width:100%;height:100%;object-fit:cover;">
                        @else
                            <div style="width:100%;height:100%;background:linear-gradient(135deg,#11998e 0%,#38ef7d 100%);"></div>
                        @endif
                    </div>

                    <div class="project-info">
                        <h3>{{ $project->title }}</h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit($project->description, 100) }}
                        </p>

                        <a href="{{ route('projects.show', $project) }}"
                        class="card-link">
                            Voir le projet →
                        </a>
                    </div>

                </div>
            @empty
                <p>Aucun projet disponible pour le moment.</p>
            @endforelse

        </div>

        <div class="text-center">
            <a href="{{ route('projects.index') }}" class="btn-primary">Voir tous nos projets</a>
        </div>
    </div>
</section>

<!-- VOLUNTEERS -->
<section class="volunteers">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Bénévoles</span>
            <h2> Dévénez un bénévole et <span class="text-gradient">Créer un impact réel</span> </h2>
        </div>

        <div class="volunteer-features" role ="list">
            <div class="volunteers-content">
                <p class="volunteer-text">
                    Votre temps, votre bienveillance et vos compétences peuvent aider à transformer des vies.
                    Rejoignez NEICA et participez à des projets porteurs en éducation, santé,
                    jeunesse et actions humanitaires.
                </p>

                <div class="feature-item" role="listitem">
                    <span class="feature-icon" aria-hidden="true">-</span>
                    <span>Aidez les communautés vulnérables</span>
                </div>

                <div class="feature-item" role="listitem">
                    <span class="feature-icon" aria-hidden="true">-</span>
                    <span>Acquérez une expérience de terrain</span>
                </div>

                <div class="feature-item" role="listitem">
                    <span class="feature-icon" aria-hidden="true">-</span>
                    <span>Contribuez à des projets durables</span>
                </div>


                <div class="volunteer-stats" aria-label="Volunteer impact stats">
                    <div class="stat-box">
                        <h3>100+</h3>
                        <p>Vies Impactées</p>
                    </div>
                    <div class="stat-box">
                        <h3>20+</h3>
                        <p>Bénévoles</p>
                    </div>
                    <div class="stat-box">
                        <h3>10+</h3>
                        <p>Nos Projets</p>
                    </div>                 
                </div>

            </div>
            

            <!-- Right Image -->
            <div class="volunteer-image" aria-hidden="false">
                <div class="volunteer-image-frame">
                    <img
                        src="{{ asset('images/benevole.jfif') }}"
                        alt="NGO Volunteers"
                    >
                    <div class="volunteer-image-overlay"></div>
                </div>
            </div>

        </div>
        

        <div class="text-center">
            <a href="{{ route ('volunteer.page') }}" class="btn-primary">Dévénir un bénévole</a>
        </div>

    </div>

</section>


<!-- TESTIMONIALS -->
<section class="testimonials">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">Témoignages</span>
            <h2>Ils parlent de <span class="text-gradient">leur expérience</span></h2>
        </div>
        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Grâce à NEICA ASSO, ma fille peut aller à l'école. C'est un rêve devenu réalité pour notre famille."</p>
                <div class="author">
                    <div class="author-avatar" style="background: #667eea;">A</div>
                    <div>
                        <strong>Aminata D.</strong>
                        <span>Bénéficiaire, Vogan</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Participer aux campagnes médicales a été une expérience humaine incroyable. L'impact est immédiat et visible."</p>
                <div class="author">
                    <div class="author-avatar" style="background: #11998e;">M</div>
                    <div>
                        <strong>Dr. Martin L.</strong>
                        <span>Volontaire, France</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Le puits construit par NEICA a changé la vie de tout notre village. Nous avons enfin accès à l'eau potable."</p>
                <div class="author">
                    <div class="author-avatar" style="background: #fc4a1a;">K</div>
                    <div>
                        <strong>Kossi T.</strong>
                        <span>Bénéficiaire, Attivé</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta">
    <div class="container">
        <div class="cta-content">
            <h2>Rejoignez le mouvement</h2>
            <p>Chaque geste compte. Faites un don, devenez bénévole ou partagez notre mission autour de vous.</p>
            <div class="cta-buttons">
                <a href="{{ route('donate.create') }}" class="btn-primary btn-large">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                    Faire un don maintenant
                </a>
                <a href="{{ route('volunteer.page') }}" class="btn-secondary btn-large">Devenir bénévole</a>
            </div>
        </div>
    </div>
</section>

<!-- PARTNERS -->
<section class="partners">
    <div class="container">
        <p class="partners-label">Ils nous font confiance</p>
        <div class="partners-logos">
            <div class="partner-logo">UNICEF</div>
            <div class="partner-logo">Croix Rouge</div>
            <div class="partner-logo">Mairie de Paris</div>
            <div class="partner-logo">Fondation LVMH</div>
            <div class="partner-logo">TotalEnergies</div>
        </div>
    </div>
</section>

@push('scripts')
<script src="{{ asset('js/home.js') }}"></script>
@endpush

@endsection
