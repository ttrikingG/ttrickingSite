<main>
  <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
    <h3 style="">Confira nossos Produtos!!!</h3>
  </div>

  <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 6px;">
    <?php foreach ($products as $product) : ?>
      <div style="width: 120px; height: 240px; overflow: hidden; border-radius: 4px;">
        <a href="/product/show?id=<?= ($product->id) ?>" title="Clique para ver detalhes">
          <?php if (!empty($product->images)) : ?>
            <img 
              src="<?= ($product->images[0]->path) ?>" 
              alt="Imagem do Produto <?= ($product->title ?? '') ?>" 
              style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 4px;">
          <?php else: ?>
            <div style="width: 100%; height: 100%; background: #f3f3f3; display: flex; align-items: center; justify-content: center;">
              <span style="font-size: 13px; color: #999;">Sem imagem</span>
            </div>
          <?php endif; ?>
        </a>
      </div>
    <?php endforeach; ?>
  </div>


  <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
    <strong><h3>Não Perca nosso Conteúdo!!!</h3></strong>
  </div>
  
  <div class="containerMain";>
    <div class="contentMainLeft">
      <table style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr style="background-color: Indigo; color: snow; text-align: left; border-radius: 4px;">
            <th style="padding: 8px;"></th>
            <th style="padding: 8px;">Título</th>
            <th style="padding: 8px;">Data</th>
            <th style="padding: 8px;">Detalhes</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($posts as $post): ?>
          <tr style="background-color: snow; border-bottom: 1px solid #ccc;">
            <td style="padding: 8px;">
              <?php if (!empty($post->images)): ?>
                <img  src="/<?= $post->images[0]->path ?>"
                      alt="Imagem do Post"
                      style="width: 100px; height: 100px; border-radius: 8px; object-fit: cover;">
              <?php else: ?>
                <span>Sem imagem</span>
              <?php endif; ?>
            </td>
            <td style="padding: 8px;"><b><?= $post->title ?></b></td>
            <td style="padding: 8px;"><small><?= date('d M Y', strtotime($post->created_at)) ?></small></td>
            <td style="padding: 8px;">
              <a href="/post/show?id=<?= $post->id; ?>"><button>Ver</button></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

    </div>

    <div class="contentMainRight">
      <div style="background-color: snow; color: indigo; text-align: center; border-radius: 4px;">
        <strong><b>Conheça nossos serviços!!!</b></strong>
      </div>
      <div class="content1">
        <?php foreach ($services as $service) : ?>
          <div style="width: 80px; height: 80px; overflow: hidden; border-radius: 4px;">
            <a href="/service/show?id=<?= ($service->id) ?>" title="Clique para ver detalhes">
              <?php if (!empty($service->images)) : ?>
                <img 
                  src="<?= ($service->images[0]->path) ?>" 
                  alt="Imagem do Serviço <?= ($service->title ?? '') ?>" 
                  style="width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 4px;">
              <?php else: ?>
                <div style="width: 100%; height: 100%; background: #eee; display: flex; align-items: center; justify-content: center;">
                  <span style="font-size: 12px; color: #777;">Sem imagem</span>
                </div>
              <?php endif; ?>
            </a>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="content2">
        <div style="background-color: snow; color: indigo; text-align: center; border-radius: 4px;">
          <strong><b>My Library!!!</b></strong>
        </div>
        <table border>
          <thead>
            <tr>
              <th>Título</th>
              <th>Links</th>
              <th>Detalhes</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($portifolios as $portifolio) : ?>
            <tr>
              <td><b><?= $portifolio->title ?></b></td>
              <td><a href="<?= $portifolio->git_link ?>" target="_blank">Git-Hub</a></td>
              <td><a href="">Ver</a></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="content3">
        <!-- Últimas notícias com 6 imagens 40x40 -->
        <img src="news1.jpg" width="40" height="40" alt="">
        <img src="news1.jpg" width="40" height="40" alt="">
        <img src="news1.jpg" width="40" height="40" alt="">
        <img src="news1.jpg" width="40" height="40" alt="">
        <img src="news1.jpg" width="40" height="40" alt="">
        <img src="news1.jpg" width="40" height="40" alt="">    
      </div>

      <div class="content4">
        <!-- Quatro botões -->
        <button>Botão 1</button>
        <button>Botão 2</button>
        <button>Botão 3</button>
        <button>Botão 4</button>
      </div>
    </div>

  </div>
</main>
