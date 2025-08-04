<div>
  <div style="background-color: snow; border:1px solid #ccc; padding:10px; margin-bottom:10px;">
      <h3 style="text-align:center;"><strong>Post: <?= $post->id; ?></strong></h3>
      <h2><?= ($post->title) ?></h2>

      <?php if (!empty($upload)): ?>
          <?php foreach ($upload as $img): ?>
              <img 
                  style="width: 300px; height: 300px; border-radius: 8px; object-fit: cover; margin-right: 10px;"
                  src="<?= '.' . ($img->path) ?>" alt="Imagem do post">
          <?php endforeach; ?>
      <?php else: ?>
          <p>Sem imagens para este post.</p>
      <?php endif; ?>

      <h3><?= ($post->sub_title) ?></h3>
      <p><?= nl2br(($post->content)) ?></p>
      <small><?= date('d M Y H:i:s', strtotime($post->created_at)) ?></small>
  </div>

  
  

  <form action="/post/storeTxt" method="POST" role="form">
    <input type="hidden" name="post_id" value="<?= $posts->id ?>">
    
    <input name="nome" placeholder="Nome"><br><br>
    <input name="email" placeholder="E-mail"><br><br>
    <textarea name="comentario" rows="10" placeholder="Escreva seu comentário..."></textarea><br><br>
    
    <button type="submit">Comentar</button>
  </form>
  <hr>

  <h3>Comentários</h3>

  <?php if (!empty($comentarios)): ?>
    <?php foreach ($comentarios as $c): ?>
      <div style=" background-color: snow; border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <strong><?= ($c['nome']) ?></strong><br>
        <small><?= ($c['data']) ?></small>
        <p><?= nl2br(($c['comentario'])) ?></p>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
      <p>Sem comentários ainda.</p>
  <?php endif; ?>
</div>
