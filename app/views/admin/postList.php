z<table border="1" width="100%" >
  <thead style="background-color: silver;">
    <th>Titulo</th>
    <th>Subtitulo</th>
    <th>Conteúdo</th>
    <th>Data Publicação</th>
  </thead>

  <tbody>
    <?php foreach($posts as $post):?>
    <tr>
      <td><?=$post->title ?></td>
      <td><?=$post->sub_title ?></td>
      <td><?=$post->content ?></td>
      <td><?= date('d M Y H:i:s', strtotime($post->created_at)) ?></td> <!-- Formatação da data -->
    </tr>
    <?php endforeach;?>
  </tbody>
</table>