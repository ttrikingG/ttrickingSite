<div>
  <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
    <strong><h2>Listagem de Produtos</h2></strong>
  </div>

  <button><a href="/adminProduct">Voltar</a></button>
  <button><a href="/adminProduct/show">Listar</a></button>
</div>
<hr>

<table border="1" width="100%" style="text-align: center;">
  <thead style="background-color: silver;">
    
    <th>Titulo</th>
    <th>Sub Titulo</th>
    <th>Description</th>
    <th>Price</th>
    <th>Publicação</th>

    <th>Edit</th>
    <th>Delete</th>
  </thead>

  <tbody>
    <?php foreach($products as $product):?>
    <tr>
      <td><?= $product->title ?></td>
      <td><?= $product->sub_title ?></td>
      <td><?= $product->description ?></td>
      <td><?= $product->price ?></td>
      <td><?= date('d M Y H:i:s', strtotime($product->created_at)) ?></td>

      <td><a href="/adminProduct/edit?id=<?= $product->id; ?>">editar</a></td>
      <td><a href="/adminProduct/delete?id=<?= $product->id; ?>">deletar</a></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

<br>
