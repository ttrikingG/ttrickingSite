<?php
echo "<pre>";
 var_dump($results);
 echo "</pre>";
?>

<h2>Resultados da busca</h2>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Tipo</th>
            <th>Título</th>
            <th>Descrição</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item->tipo) ?></td>
                    <td><?= htmlspecialchars($item->titulo) ?></td>
                    <td><?= htmlspecialchars(substr($item->descricao, 0, 100)) ?>...</td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="3">Nenhum resultado encontrado.</td></tr>
        <?php endif; ?>
    </tbody>
</table>

