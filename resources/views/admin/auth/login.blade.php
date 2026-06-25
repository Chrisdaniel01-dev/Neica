<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Connexion Administrateur - NEICA ASSO</title>
    <link rel="stylesheet" href="{{ asset('css/admin/admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="login-wrapper">
    
    <div class="login-card">
        
        <div class="login-header">
            <div class="logo-container">
                <svg class="logo-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2>NEICA ASSO</h2>
<p class="subtitle">Espace Administrateur</p>
        </div>

        @if ($errors->any())
            <div class="error-box">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="login-form">
            @csrf

            <div class="form-group">
<label for="email">Adresse e-mail</label>
                <div class="input-wrapper">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                    <input type="email" name="email" id="email" required placeholder="admin@email.com" value="{{ old('email') }}">
                </div>
            </div>

            <div class="form-group">
<label for="password">Mot de passe</label>
<div class="input-wrapper">
                    <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                    <input type="password" name="password" id="password" required placeholder="Entrez votre mot de passe">
                </div>
            </div>

            <div class="form-options">
                <label class="checkbox-wrapper">
                    <input type="checkbox" name="remember" id="remember">
                    <span class="checkmark"></span>
                    <span class="checkbox-label">Se souvenir de moi</span>
                </label>
<a href="#" class="forgot-link">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="btn-login">
<span>Se connecter</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="5" y1="12" x2="19" y2="12"/>
                    <polyline points="12 5 19 12 12 19"/>
                </svg>
            </button>

        </form>

    </div>

<p class="login-footer">
        &copy; {{ date('Y') }} NEICA ASSO. Tous droits réservés.
    </p>

</div>

</body>
</html>
