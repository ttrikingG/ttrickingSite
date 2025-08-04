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
    <form action="/Home" method="get">
      <input type="text" name="q" placeholder="🔍 Pesquisar..." required>
      <select name="type">
        <option value="post">Postagens</option>
        <option value="product">Produtos</option>
        <option value="service">Serviços</option>
      </select>
      
      <button type="submit">Buscar</button>
    </form>
  </div>
  <hr>
</header
