<div class="form-wrapper">
  <div class="form-container fade-in">

    <div class="form-header">
      <h3>Contato</h3>
    </div>

    <?php echo message('success') ?>
    <?php echo message('error') ?>
 
    <div class="form-body">
      <form action="/contact/enviar" method="POST" role="form" class="modern-form">

        <div class="input-group">
          <input type="text" id="titulo" name="titulo" placeholder="Título" class="form-input">
        </div>
        <?php echo message('titulo') ?>

        <div class="input-group">
          <input type="text" id="assunto" name="assunto" placeholder="Assunto" class="form-input">
        </div>
        <?php echo message('assunto') ?>

        <div class="input-group">
          <textarea id="mensagem" name="mensagem" rows="10" placeholder="Escreva sua mensagem..." class="form-textarea"></textarea>
        </div>
        <?php echo message('mensagem') ?>

        <button type="submit" class="submit-btn">Fazer o Post</button>
      </form>
    </div>
  </div>
</div>

