<div>
  <div style="background-color: Indigo; color: snow; text-align: center;">
      <strong><h3>Contato</h3></strong>
  </div>

  <div style="background-color: green; color: snow; text-align: center; margin-bottom: 20px;"><?php echo message('success') ?></div>
  <div style="background-color: red; color: snow; text-align: center; margin-bottom: 20px;"><?php echo message('error') ?></div>
  
  <form action="/contact/enviar" method="POST" role="form">
    <input name="titulo" placeholder="titulo">
    <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('titulo')?></small></div>
    <input name="assunto" placeholder="assunto">
    <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('assunto')?></small></div>
    
    <textarea name="mensagem" rows="10" placeholder="Escreva sua mensagem..."></textarea>
    <div style="color: indigo; margin-bottom: 10px;"><small><?php echo message('mensagem')?></small></div>
    
    <button type="submit">Fazer o Post</button><br>

  </form>
</div>
