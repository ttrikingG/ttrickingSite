<div>
  <div style="background-color: Indigo; color: snow; text-align: center;">
    <strong><h3>Produto</h3></strong>
  </div>
      
  <div>
    <?php if (!empty($uploads)): ?>
      <?php foreach ($uploads as $upload): ?>
        <img 
          style="width: 300px; height: 300px; border-radius: 8px; object-fit: cover;" 
          src="<?= '.' . $upload->path; ?>" 
          alt="Imagem do Produto"
        >
      <?php endforeach; ?>
    <?php else: ?>
      <p>Sem imagem disponível.</p>
    <?php endif; ?>

    <h2><?= htmlspecialchars($product->title) ?></h2>
    <p><?= htmlspecialchars($product->sub_title) ?></p>
  </div>
          
  <div>
    <p><?= nl2br(htmlspecialchars($product->description)) ?></p>
  </div>
</div>
