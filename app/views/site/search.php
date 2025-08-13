<div class="tableContainer">
  <div>
    <h3>Resultados da busca</h3>
  </div>

  <table>
    <thead>
      <tr>
        <th>Título</th>
        <th>Descrição</th>
        <th>Detalhes</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($results)): ?>
        <?php foreach ($results as $item): ?>
          <tr>
            <td>
              <h3><?= htmlspecialchars($item->titulo) ?></h3>
            </td>
            <td>
              <span><?= htmlspecialchars(substr($item->descricao, 0, 100)) ?>...</span>
            </td>
            <td>
              <?php
              // Converte o tipo para singular
              $tipoSingular = rtrim($item->tipo, 's');
              ?>
              <a href="/<?= htmlspecialchars($tipoSingular) ?>/show?id=<?= htmlspecialchars($item->id) ?>">
                <button class="comment-button">Go</button>
              </a>
              </td>

          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="3">
            <span>Nenhum resultado encontrado.</span>
          </td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>