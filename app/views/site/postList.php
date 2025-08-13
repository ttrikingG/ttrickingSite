<div class="tableContainer">   
  <div class="table-header">     
    <strong><h3>Postagens</h3></strong>   
  </div>    
  
  <table class="posts-table" border style="width: 100%; text-align: center;">     
    <thead class="table-thead">       
      <tr>         
        <th class="th-image">Imagem</th>         
        <th class="th-title">Título</th>            
        <th class="th-action">Ver</th>       
      </tr>     
    </thead>     
    
    <tbody class="table-tbody">       
      <?php foreach($posts as $post): ?>       
      <tr class="post-row">         
        <td class="td-image">           
          <?php if (!empty($post->images)): ?>             
            <?php foreach($post->images as $image): ?>               
              <img class="post-image" style="width: 60px; height: 60px; border-radius: 10%; object-fit: cover;" src="<?= $image->path ?>" alt="Imagem do Post" title="Imagem do Post">             
            <?php endforeach; ?>           
          <?php else: ?>             
            <span class="no-image">Sem imagem</span>           
          <?php endif; ?>         
        </td>         
        
        <td class="td-title">
          <h3 class="post-title"><?= $post->title ?></h3>
        </td>               

        <td class="td-action">
          <a class="action-link" href="/post/show?id=<?= $post->id; ?>">
            <button class="comment-button">Go</button>
          </a>
        </td>       
      </tr>       
      <?php endforeach; ?>     
    </tbody>   
  </table> 
</div>  

<br>  

<div class="pagination-container" style="text-align: center;">   
  <?= $links; ?> 
</div> 

<br>