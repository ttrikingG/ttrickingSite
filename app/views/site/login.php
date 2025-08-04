
<div>
   <div style="background-color: Indigo; color: snow; text-align: center;">
      <strong><h3>Faça seu login</h3></strong>
   </div>

   <form class="form-cadastro" action="/login/store" method="POST">
     
     <input type="text" placeholder="E-mail" name="email">
     <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('email') ?></small></div>

     <input type="text" placeholder="Senha" name="password">
     <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('password') ?></small></div>
     
     <button type="submit">Logar</button>
     <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('login') ?></small></div>

     <hr>
   </form>
</div>
