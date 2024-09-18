<?php
if (empty($_SESSION)){
  header("Location: ../login/index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>UniChaves</title>
</head>
<style>
  * {
    margin: 0;
    padding: 0;
  }

  body {
    width: 100%;
    height: 100%;
  }

  .validacao {
    display: none;
    font-size: 12px;
  }

  ::after,
  ::before {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

  a {
    text-decoration: none;
  }

  li {
    list-style: none;
  }

  .wrapper {
    display: flex;
  }

  .main {
    min-height: 100vh;
    width: 100%;
    overflow: hidden;
    transition: all 0.35s ease-in-out;
    background-color: #fafbfe;
  }

  #sidebar {
    width: 70px;
    min-width: 70px;
    z-index: 1000;
    transition: all .25s ease-in-out;
    background-color: #0e2238;
    display: flex;
    flex-direction: column;
  }

  #sidebar.expand {
    width: 260px;
    min-width: 260px;
  }

  .toggle-btn {
    background-color: transparent;
    cursor: pointer;
    border: 0;
    padding: 1rem 1.5rem;
  }

  .toggle-btn i {
    font-size: 1.5rem;
    color: #FFF;
  }

  .sidebar-logo {
    margin: auto 0;
  }

  .sidebar-logo a {
    color: #FFF;
    font-size: 1.15rem;
    font-weight: 600;
  }

  #sidebar:not(.expand) .sidebar-logo,
  #sidebar:not(.expand) a.sidebar-link span {
    display: none;
  }

  .sidebar-nav {
    padding: 2rem 0;
    flex: 1 1 auto;
  }

  a.sidebar-link {
    padding: .625rem 1.625rem;
    color: #FFF;
    display: block;
    font-size: 0.9rem;
    white-space: nowrap;
    border-left: 3px solid transparent;
  }

  .sidebar-link i {
    font-size: 1.1rem;
    margin-right: .75rem;
  }

  a.sidebar-link:hover {
    background-color: rgba(255, 255, 255, .075);
    border-left: 3px solid #3b7ddd;
  }

  .sidebar-item {
    position: relative;
  }

  #sidebar:not(.expand) .sidebar-item .sidebar-dropdown {
    position: absolute;
    top: 0;
    left: 70px;
    background-color: #0e2238;
    padding: 0;
    min-width: 15rem;
    display: none;
  }

  #sidebar:not(.expand) .sidebar-item:hover .has-dropdown+.sidebar-dropdown {
    display: block;
    max-height: 15em;
    width: 100%;
    opacity: 1;
  }

  #sidebar.expand .sidebar-link[data-bs-toggle="collapse"]::after {
    border: solid;
    border-width: 0 .075rem .075rem 0;
    content: "";
    display: inline-block;
    padding: 2px;
    position: absolute;
    right: 1.5rem;
    top: 1.4rem;
    transform: rotate(-135deg);
    transition: all .2s ease-out;
  }

  #sidebar.expand .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
    transform: rotate(45deg);
    transition: all .2s ease-out;
  }

  .sidebar-footer {
    position: absolute;
    bottom: 0;
  }

  #status {
    width: 15px;
    height: 15px;
    margin-right: 1vw;
    border: 1px solid black;
    border-radius: 50%;
  }

</style>

<body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <div class="wrapper">
    <aside id="sidebar">
      <div class="d-flex">
        <button class="toggle-btn" type="button">
        <i class="bi bi-house"></i>
        </button>
        <div class="sidebar-logo">
          <a href="/php/dashboard">UniChaves</a>
        </div>
      </div>
      <ul class="sidebar-nav">
        <li class="sidebar-item">
          <a href="/php/dashboard" class="sidebar-link">
          <i class="bi bi-bar-chart"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="/php/usuario" class="sidebar-link">
          <i class="bi bi-person"></i>
            <span>Usuários</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="/php/chaves" class="sidebar-link">
          <i class="bi bi-key"></i>
            <span>Chaves</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="/php/ocorrencia" class="sidebar-link">
          <i class="bi bi-exclamation-circle"></i>
            <span>Ocorrência</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="/php/relatorios" class="sidebar-link">
          <i class="bi bi-clipboard"></i>
            <span>Relatórios</span>
          </a>
        </li>

      <!-- <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#auth" aria-expanded="false" aria-controls="auth">
            <i class="lni lni-protection"></i>
            <span>Auth</span>
          </a>
          <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link">Login</a>
            </li>
            <li class="sidebar-item">
              <a href="#" class="sidebar-link">Register</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a href="#" class="sidebar-link collapsed has-dropdown" data-bs-toggle="collapse" data-bs-target="#multi" aria-expanded="false" aria-controls="multi">
            <i class="lni lni-layout"></i>
            <span>Multi Level</span>
          </a>
          <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
            <li class="sidebar-item">
              <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#multi-two" aria-expanded="false" aria-controls="multi-two">
                Two Links
              </a>
              <ul id="multi-two" class="sidebar-dropdown list-unstyled collapse">
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Link 1</a>
                </li>
                <li class="sidebar-item">
                  <a href="#" class="sidebar-link">Link 2</a>
                </li>
              </ul>
            </li>
          </ul>
        </li> -->
    </aside>

    <div class="main p-3">
      <div class="text-center">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active"><b>UniChaves</b></a>
              </li>
            </ul>
            <span class="navbar-text">
              <button class="btn btn-light" id="notificacao">
                <i class="bi bi-bell"></i>
              </button>
              <?= $_SESSION['nome'] ?>
              <button class="btn btn-light" id="logout">
                <a href="../logout"><i class="bi bi-person-circle"></i></a>
              </button> 
            </span>
          </div>
        </div>
      </nav>
      </div>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

      <script>
      
      </script>