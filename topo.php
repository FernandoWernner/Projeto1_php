<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sistema de Gestão</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Icons (Bootstrap Icons) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Projeto CSS -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Tema escuro (carregado, mas disabled) -->
  <link rel="stylesheet" href="css/dark.css" id="theme-dark" disabled>

  <!-- Prevent flash: enable dark early if saved -->
<script>
  (function(){
    try {
      const saved = localStorage.getItem('site-theme');
      const darkLink = document.getElementById('theme-dark');
      if (saved === 'dark' && darkLink) {
        document.documentElement.setAttribute('data-theme','dark');
        darkLink.disabled = false;
      }
    } catch(e){}
  })();
</script>
</head>
<body>

<!-- Header -->
<header class="header-shadow">
  <nav class="navbar navbar-expand-lg container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <!-- simple SVG icon inline (no external file required) -->
      <svg width="28" height="28" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
        <rect x="3" y="3" width="7" height="7" rx="1.5" fill="#2563eb"/>
        <rect x="14" y="3" width="7" height="7" rx="1.5" fill="#06b6d4"/>
        <rect x="3" y="14" width="7" height="7" rx="1.5" fill="#10b981"/>
        <rect x="14" y="14" width="7" height="7" rx="1.5" fill="#f59e0b"/>
      </svg>
      <span class="brand-title">Sistema de Gestão</span>
      <small class="text-muted ms-1 d-none d-lg-inline">| Painel</small>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMain">
      <!-- Menu (use seu menu.php que será incluído) -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php include_once "menu.php"; ?>
      </ul>

      <div class="d-flex align-items-center gap-2">
        <!-- theme toggle -->
        <button id="theme-toggle" class="btn btn-outline-secondary btn-sm" onclick="toggleTheme()" aria-label="Alternar tema">🌙</button>
      </div>
    </div>
  </nav>
</header>

<!-- main content will be included by index.php -->
