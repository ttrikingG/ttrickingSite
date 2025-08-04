<table border="1" width="100%" >
  <thead style="background-color: silver;">
    <th>id</th>
    <th>Titulo</th>
    <th>Sub Titulo</th>
    <th>Description</th>
    <th>Price<th>
  </thead>

  <tbody>
    <?php foreach($products as $product):?>
    <tr>
      <td><?=$product->id ?></td>
      <td><?=$product->title ?></td>
      <td><?=$product->sub_title ?></td>
      <td><?=$product->description ?></td>
      <td><?=$product->price ?></td>
      <td><?= date('d M Y H:i:s', strtotime($product->created_at)) ?></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>