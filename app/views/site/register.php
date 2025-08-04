<div>
  <div style="background-color: Indigo; color: snow; text-align: center;">
    <strong><h3>Venha fazer parte da família Cadastre-se!!!</h3></strong>
  </div>
  
  <form class="form-cadastro" action="/register/store" method="POST">
    <input type="text" placeholder="Nome" name="firstName">
    <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('firstName') ?></small></div>

    <input type="text" placeholder="Sobrenome" name="lastName">
    <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('lastName') ?></small></div>

    <input type="text" placeholder="E-mail" name="email">
    <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('email') ?></small></div>

    <input type="text" placeholder="Senha" name="password">
    <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('password') ?></small></div>
    
    <button type="submit">Cadastrar</button><br>
  </form>
</div>