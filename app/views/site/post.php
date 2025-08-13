<div class="container">
  <div class="post-card">
    <div class="post-header">
      <h3 class="post-title"><?= ($post->title) ?></h3>
    </div>
    
    <?php if (!empty($upload)): ?>
      <div class="image-gallery">
        <?php foreach ($upload as $img): ?>
          <img class="post-image-post" src="<?= '.' . ($img->path) ?>" alt="Imagem do post">
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="no-images">
        <p>📷 Sem imagens para este post.</p>
      </div>
    <?php endif; ?>
    
    <h3 class="post-subtitle"><?= ($post->sub_title) ?></h3>
    <div class="post-content"><?= nl2br(($post->sub_title)) ?></div>
    <div class="post-content"><?= nl2br(($post->content)) ?></div>
    <div class="post-date">📅 <?= date('d M Y H:i:s', strtotime($post->created_at)) ?></div>
  </div>

  
  <hr class="divider">
  
  <div class="comments-section">
    <h3 class="comments-title">Comentários</h3>
    
    <?php if (!empty($comentarios)): ?>
      <?php foreach ($comentarios as $c): ?>
        <div class="comment-item">
          <div class="comment-author"><?= ($c['nome']) ?></div>
          <div class="comment-date"><?= ($c['data']) ?></div>
          <div class="comment-text"><?= (($c['comentario'])) ?></div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="no-comments">
        <p>💭 Seja o primeiro a comentar!</p>
      </div>
    <?php endif; ?>
  </div>
    
  <div class="comment-form">
    <h3>💬 Deixe seu comentário</h3>
    <form action="/post/storeTxt" method="POST" role="form">
      <input type="hidden" name="post_id" value="<?= $post->id ?>">
      
      <div class="form-group">
        <input class="form-input" name="nome" placeholder="👤 Seu nome" required>
      </div>
      
      <div class="form-group">
        <input class="form-input" name="email" type="email" placeholder="📧 Seu e-mail" required>
      </div>
      
      <div class="form-group">
        <textarea class="form-textarea" name="comentario" rows="6" placeholder="✍️ Escreva seu comentário aqui..." required></textarea>
      </div>
      
      <button class="submit-btn" type="submit">Publicar Comentário</button>
    </form>
  </div>
</div>
