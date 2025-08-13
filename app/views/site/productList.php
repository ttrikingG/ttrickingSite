<div class="tableContainer">   
  <div class="table-header">     
    <h3><strong>Produtos</strong></h3>   
  </div>    
  
  <table class="posts-table" border style="width: 100%; text-align: center;">     
    <thead class="table-thead">       
      <tr>         
        <th class="th-image">Foto</th>         
        <th class="th-title">Nome</th>            
        <th class="th-action">Ver</th>       
      </tr>     
    </thead>     
    
    <tbody class="table-tbody">       
      <?php foreach ($products as $product): ?>       
      <tr class="post-row">         
        <td class="td-image">           
          <?php if (!empty($product->images)): ?>             
            <?php foreach ($product->images as $image): ?>               
              <img class="post-image"
                   src="<?= htmlspecialchars($image->path) ?>"                  
                   alt="Imagem do Produto"                  
                   title="Imagem do Produto"                 
                   style="width: 60px; height: 60px; border-radius: 10%; object-fit: cover;">             
            <?php endforeach; ?>           
          <?php else: ?>             
            <span class="no-image">Sem imagem</span>           
          <?php endif; ?>         
        </td>          
        
        <td class="td-title">
          <h4 class="post-title"><?= htmlspecialchars($product->title) ?></h4>
        </td>                  
        
        <td class="td-action">           
          <a class="action-link" href="/product/show?id=<?= (int) $product->id ?>">             
            <button class="comment-button">Detalhes</button>           
          </a>         
        </td>       
      </tr>       
      <?php endforeach; ?>     
    </tbody>   
  </table> 
</div>  

<br>  

<!-- botões de paginação --> 
<div class="pagination-container" style="text-align: center;">   
  <?= $links ?> 
</div>  

<br>