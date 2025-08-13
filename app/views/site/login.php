<div class="form-wrapper">
  <div class="form-container fade-in">

    <!-- Cabeçalho -->
    <div class="form-header">
      <h3>Faça seu login</h3>
    </div>

    <div class="form-body">
      <form class="modern-form" action="/login/store" method="POST">

        <div class="input-group">
          <input type="text" id="email" name="email" placeholder="E-mail" class="form-input">
        </div>
        <?php echo message('email') ?>

        <div class="input-group">
          <input type="password" id="password" name="password" placeholder="Senha" class="form-input">
        </div>
        <?php echo message('password') ?>

        <?php echo message('login') ?>

        <button type="submit" class="submit-btn">Logar</button>
      </form>
    </div>
  </div>
</div>
