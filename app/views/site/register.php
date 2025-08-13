<div class="form-wrapper">
  <div class="form-container fade-in">
    <div class="form-header">
      <h3>Venha fazer parte da família!!!</h3>
    </div>

    <div class="form-body">
      <form action="/register/store" method="POST" class="modern-form">

        <div class="input-group">
          <input type="text" id="firstName" name="firstName" placeholder="Nome" class="form-input">
        </div>
        <?php echo message('firstName') ?>

        <div class="input-group">
          <input type="text" id="lastName" name="lastName" placeholder="Sobrenome" class="form-input">
        </div>
       <?php echo message('lastName') ?>

        <div class="input-group">
          <input type="text" id="email" name="email" placeholder="E-mail" class="form-input">
        </div>
        <?php echo message('email') ?>

        <div class="input-group">
          <input type="password" id="password" name="password" placeholder="Senha" class="form-input">
        </div>
        <?php echo message('password') ?>

        <button type="submit" class="submit-btn">Cadastrar</button>
      </form>
    </div>
  </div>
</div>
