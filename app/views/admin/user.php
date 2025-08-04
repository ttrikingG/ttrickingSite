<div style="text-align: center;">
  <strong><a style="font-size: large;">User List</a></strong>
  <button><a href="/adminPanel">Voltar</a></button>
</div>

<br>

<h3>Total de Usuários: <?php echo count($users); ?></h3>

<table border="1" width="100%" >
  <thead style="background-color: silver;">
    <th class="hide-on-mobile">id</th>
    <th>Nome</th>
    <th class="hide-on-mobile">Sobrenome</th>
    <th>Email</th>
    <th class="hide-on-mobile">Senha</th>
    <th class="hide-on-mobile">Publicação</th>
    <th>Edit</th>
    <th>Delete</th>
  </thead>

  <tbody>
    <?php foreach($users as $user):?>
    <tr>
      <td class="hide-on-mobile"><?=$user->id ?></td>
      <td><?=$user->firstName ?></td>
      <td class="hide-on-mobile"><?=$user->lastName ?></td>
      <td><?=$user->email ?></td>
      <td class="hide-on-mobile"><?=$user->password ?></td>
      <td class="hide-on-mobile"><?= date('d M Y H:i:s', strtotime($user->created_at)) ?></td>
      <td><a href="/user_edit?id=<?=$user->id;?>">Editar</a></td>
      <td><a href="/user_destroy?id=<?=$user->id; ?>">Delete</a></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>

<br>