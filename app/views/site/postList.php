<div>
  <div style="background-color: Indigo; color: snow; text-align: center;">
    <strong><h3>Postagens</h3></strong>
  </div>

  <table border style="width: 100%; text-align: center;">
    <thead style="background-color: Indigo; color: snow;">
      <tr>
        <th>Imagem</th>
        <th>Título</th>
        <th>Subtítulo</th>
        <th>Ver</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($posts as $post): ?>
      <tr>
        <td>
          <?php if (!empty($post->images)): ?>
            <?php foreach($post->images as $image): ?>
              <img style="width: 60px; height: 60px; border-radius: 10%; object-fit: cover;" src="<?= $image->path ?>" alt="Imagem do Post" title="Imagem do Post">
            <?php endforeach; ?>
          <?php else: ?>
            <span>Sem imagem</span>
          <?php endif; ?>
        </td>
        <td><h3><?= $post->title ?></h3></td>
        <td><h5><?= $post->sub_title ?></h5></td>
        <td><a href="/post/show?id=<?= $post->id; ?>"><button>Comentar</button></a></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<br>

<div style="text-align: center;">
  <?= $links; ?>
</div>
<br>
