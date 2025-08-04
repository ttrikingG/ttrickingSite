<div>
  <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
    <strong><h2>Listagem de Posts</h2></strong>
  </div>

  <button><a href="/adminPost">Voltar</a></button>
  <button><a href="/adminPost/show">Listar</a></button>
</div>
<hr>

<table border="1" width="100%">
  <thead style="background-color: silver;">

    <th>Titulo</th>
    <th>Subtitulo</th>
    <th>Conteúdo</th>
    <th>Publicação</th>

    <th>Edit</th>
    <th>Delete</th>
  </thead>

  <tbody>
  <?php foreach($posts as $post): ?>
    <tr>
      <td><?= $post->title ?></td>
      <td><?= $post->sub_title ?></td>
      <td><?= $post->content ?></td>
      <td><?= date('d M Y H:i:s', strtotime($post->created_at)) ?></td>

      <td><a href="/adminPost/edit?id=<?= $post->id; ?>">editar</a></td>
      <td><a href="/adminPost/delete?id=<?= $post->id; ?>">delete</a></td>
    </tr>
  <?php endforeach; ?>
  </tbody>
</table>