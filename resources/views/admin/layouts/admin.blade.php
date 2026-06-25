<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin — NEICA')</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="app-layout">

    <!-- MOBILE TOGGLE BUTTON -->
    <button class="sidebar-toggle" aria-label="Toggle menu" onclick="toggleSidebar()">
      <i class="fas fa-bars"></i>
    </button>

    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar" role="navigation" aria-label="Navigation principale">
      <div class="sidebar__brand">
        <div class="sidebar__brand-icon">N</div>
        <span>NEICA</span>
      </div>

      <ul class="sidebar__nav">

        <li class="sidebar__nav-item">
          <a href="{{ route('admin.dashboard') }}" class="sidebar__nav-link sidebar__nav-link--active" aria-current="page">
            <span class="sidebar__nav-icon"><i class="fas fa-th-large"></i></span>
            Tableau de bord
          </a>
        </li>

        <li class="sidebar__nav-item">
          <a href="{{ route('admin.projects.index') }}" class="sidebar__nav-link">
            <span class="sidebar__nav-icon"><i class="fas fa-folder-open"></i></span>
            Projets
          </a>
        </li>

        <li class="sidebar__nav-item">
          <a href="{{ route('admin.posts.index') }}" class="sidebar__nav-link">
            <span class="sidebar__nav-icon"><i class="fas fa-newspaper"></i></span>
            Blogs
          </a>
        </li>

        <li class="sidebar__nav-item">
          <a href="{{ route('admin.volunteers.index') }}" class="sidebar__nav-link">
            <span class="sidebar__nav-icon"><i class="fas fa-user-friends"></i></span>
            Bénévoles
          </a>
        </li>

        <li class="sidebar__nav-item">
          <a href="{{ route('admin.donations.index') }}" class="sidebar__nav-link">
            <span class="sidebar__nav-icon"><i class="fas fa-hand-holding-heart"></i></span>
            Dons
          </a>
        </li>


        <li class="sidebar__nav-item">
              <a href="{{ route('admin.messages.index') }}" class="sidebar__nav-link">

                  <span class="sidebar__nav-icon">
                      <i class="fas fa-envelope"></i>
                  </span>

                  Messages

                  @if($unreadMessagesCount > 0)
                      <span class="message-badge">
                          {{ $unreadMessagesCount }}
                      </span>
                  @endif

              </a>
        </li>

        <li class="sidebar__nav-item">
          <a href="{{ route('admin.settings.index') }}" class="sidebar__nav-link">
            <span class="sidebar__nav-icon"><i class="fas fa-cog"></i></span>
            Paramètres
          </a>
        </li>

        <li class="sidebar__nav-item">
          <form action="{{ route('admin.logout') }}" method="POST" style="display:contents;">
            @csrf
            <button type="submit" class="sidebar__nav-link" style="background:none; border:none; cursor:pointer; width:100%; text-align:left;">
              <span class="header__logout"><i class="fas fa-sign-out-alt"></i> Déconnexion </span>
            </button>
          </form>
        </li>

      </ul>

      <div class="sidebar__footer">
        © 2024 NEICA
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main-content">
      <header class="header">
        <h1 class="header__title">@yield('title')</h1>
        <div class="header__actions">
          <div class="header__profile">
            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face" alt="Admin profile" class="header__profile-img">
            <span class="header__profile-name">
              {{ auth()->user()->name }}
            </span>
          </div>
          <a href="#"
            class="header__logout"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="fas fa-sign-out-alt"></i>
              Déconnexion
          </a>

          <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display:none;">
              @csrf
          </form>
        </div>
      </header>

      <section class="page-content page-content--wide">

        @yield('content')


      </section>
    </main>
  </div>

<script>
function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('sidebarOverlay');
  sidebar.classList.toggle('show');
  overlay.classList.toggle('show');
}
</script>

</body>
</html>

