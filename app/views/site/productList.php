<div>
  <div style="background-color: Indigo; color: snow; text-align: center;">
    <h3><strong>Produtos</strong></h3>
  </div>

  <table border style="width: 100%; text-align: center;">
    <thead style="background-color: Indigo; color: snow;">
      <tr>
        <th>Foto</th>
        <th>Nome</th>
        <th>Sub Título</th>
        <th>Ver</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product): ?>
      <tr>
        <td>
          <?php if (!empty($product->images)): ?>
            <?php foreach ($product->images as $image): ?>
              <img 
                src="<?= htmlspecialchars($image->path) ?>" 
                alt="Imagem do Produto" 
                title="Imagem do Produto"
                style="width: 60px; height: 60px; border-radius: 10%; object-fit: cover;">
            <?php endforeach; ?>
          <?php else: ?>
            <span>Sem imagem</span>
          <?php endif; ?>
        </td>

        <td><h4><?= htmlspecialchars($product->title) ?></h4></td>
        <td><h5><?= htmlspecialchars($product->sub_title) ?></h5></td>

        <td>
          <a href="/product/show?id=<?= (int) $product->id ?>">
            <button>Detalhes</button>
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<br>

<!-- botões de paginação -->
<div style="text-align: center;">
  <?= $links ?>
</div>

<br>
