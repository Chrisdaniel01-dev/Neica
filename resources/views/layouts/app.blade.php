<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEICA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<nav class="navbar">
    <a href="/" class="logo">NEICA</a>

    <button class="nav-toggle" id="navToggle" aria-label="Menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-menu">
            <line x1="3" y1="6" x2="21" y2="6"/>
            <line x1="3" y1="12" x2="21" y2="12"/>
            <line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-close">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
    </button>

    <div class="nav-links" id="navLinks">
        <a href="/">Accueil</a>
        <a href="/about">À propos</a>
        <a href="/projects">Projets</a>
        <a href="/blog">Blog</a>
        <a href="/contact">Contact</a>
        <a href="/donate" class="btn-donate">Faire un don</a>
    </div>
</nav>


  @yield('content')
   

<!-- FOOTER -->
<footer class="site-footer">
    <div class="footer-wave">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 120L60 105C120 90 240 60 360 52.5C480 45 600 60 720 67.5C840 75 960 75 1080 67.5C1200 60 1320 45 1380 37.5L1440 30V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#1a1a2e"/>
        </svg>
    </div>
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="footer-logo">NEICA</div>
                    <p>Ensemble, construisons un monde plus juste et solidaire. Chaque action compte, chaque don change une vie.</p>
                    <div class="footer-socials">
                        <a href="#" aria-label="Facebook">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                        <a href="#" aria-label="Twitter">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>
                        </a>
                        <a href="#" aria-label="Instagram">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                        </a>
                        <a href="#" aria-label="LinkedIn">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                        </a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Navigation</h4>
                    <ul>
                        <li><a href="/">Accueil</a></li>
                        <li><a href="/about">À propos</a></li>
                        <li><a href="/projects">Nos projets</a></li>
                        <li><a href="/blog">Blog</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Agir</h4>
                    <ul>
                        <li><a href="/donate">Faire un don</a></li>
                        <li><a href="{{ route ('volunteer.page') }}">Devenir bénévole</a></li>
                        <li><a href="/contact">Partenaires</a></li>
                        <li><a href="/contact">Presse</a></li>
                    </ul>
                </div>
                <div class="footer-newsletter">
                    <h4>Restez informé</h4>
                    <p>Recevez nos actualités et le bilan de nos actions.</p>
                    <form class="newsletter-form" action="#" method="POST">
                        <input type="email" placeholder="Votre email" required>
                        <button type="submit">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <p> NEICA . Tous droits réservés.</p>
                <div class="footer-legal">
                    <a href="#">Mentions légales</a>
                    <a href="#">Politique de confidentialité</a>
                    <a href="#">CGU</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
// Mobile nav toggle
const navToggle = document.getElementById('navToggle');
const navLinks  = document.getElementById('navLinks');

if (navToggle && navLinks) {
    navToggle.addEventListener('click', () => {
        navLinks.classList.toggle('open');
        navToggle.classList.toggle('open');
    });

    // Close menu on link click (mobile)
    navLinks.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            navLinks.classList.remove('open');
            navToggle.classList.remove('open');
        });
    });
}
</script>

</body>
</html>
