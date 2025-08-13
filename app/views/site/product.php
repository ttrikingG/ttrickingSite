<div class="produto-wrapper">
  <div class="produto-card-custom">
    <div class="produto-header-custom">
      <h2><?= ($product->title) ?></h2>
    </div>

    <div class="produto-content-custom">
      <div class="produto-image-container-custom">
        <?php if (!empty($uploads)): ?>
          <?php foreach ($uploads as $upload): ?>
            <img class="produto-image-custom" src="<?= '.' . $upload->path; ?>" alt="Imagem do Produto">
          <?php endforeach; ?>
        <?php else: ?>
          <div class="produto-no-image-custom">
            <p>Sem imagem disponível.</p>
          </div>
        <?php endif; ?>
      </div>

      <div class="produto-info-custom">
        
        <p class="produto-subtitle-custom"><?= ($product->sub_title) ?></p>
      </div>

      <div class="produto-description-custom">
        <p><?= nl2br(($product->description)) ?></p>
      </div>
    </div>
  </div>
</div>