<header>
  <div style="background-color: Indigo;">
    <a href="#" target="_blank"><img src=""></a>
    <a href="#" target="_blank"><img src=""></a>
  </div> <!--links para social mídia-->

  
  <div class="">
    <b class="LogoPart1">T</b><b class="LogoPart2" href="">TrickinG</b><b class=""> Desenvolvimento Web</b><br>

    <nav>
      <div class="nav-links">
        <b><a href="/">Home</a> |</b>
        <b><a href="/about">Sobre</a> |</b>
        <b><a href="/product">Produtos</a> |</b>
        <b><a href="/service">Serviços</a> |</b>
        <b><a href="/post">Postagens</a> |</b>
        <b><a href="/contact">Contato</a></b>
      </div>
      
    </nav>

    <hr>

    <div>
      <b>Conecte-se já!!! </b>

      <?php if (!logged()) : ?>
        <a href="/login">Login</a>
        <button><a href="/register">Cadastre-se</a></button>
      <?php endif; ?>

      <?php if (isset($_SESSION['user_logged'])) : ?>
        <a href="/logout">Logout</a>
      <?php endif; ?>

      <?php if (isset($_SESSION['admin_logged'])) : ?>
        <button><a style="color: crimson" href="/adminPanel">Admin Panel</a></button>
      <?php endif; ?>
    </div>

  </div> 
  

  <hr>
  
  <div style="background-color: indigo; border-radius: 4px;">
    <form method="GET" action="/search">
      <input type="text" name="q" placeholder="Search..." value="<?= ($_GET['q'] ?? '') ?>">

      <!-- Filtro por categoria -->
      <select name="categoria">
        <option value="">All Categories</option>
        <option value="1" <?= isset($_GET['categoria']) && $_GET['categoria'] == 1 ? 'selected' : '' ?>>Categoria 1</option>
        <option value="2" <?= isset($_GET['categoria']) && $_GET['categoria'] == 2 ? 'selected' : '' ?>>Categoria 2</option>
        <!-- Adicione outras categorias conforme necessário -->
      </select>

      <!-- Filtro por data inicial -->
      <label for="de">From:</label>
      <input type="date" name="de" value="<?= ($_GET['de'] ?? '') ?>">

      <!-- Filtro por data final -->
      <label for="ate">To:</label>
      <input type="date" name="ate" value="<?= ($_GET['ate'] ?? '') ?>">

      <!-- Ordem de exibição -->
      <select name="ordem">
        <option value="DESC" <?= (($_GET['ordem'] ?? '') === 'DESC') ? 'selected' : '' ?>>Recent First</option>
        <option value="ASC" <?= (($_GET['ordem'] ?? '') === 'ASC') ? 'selected' : '' ?>>Oldest First</option>
      </select>

      <button type="submit">Search</button>
    </form>

  </div>
  <hr>
</header

