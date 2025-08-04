zz<div style="margin: 0.5%;">
    <div>
        <div>
            <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
                <strong><h2>Editar Produto</h2></strong>
            </div>

            <button><a href="/adminProduct/show">Voltar</a></button>
            <button><a href="/adminProduct/show">Listar</a></button>
        </div>

        <hr>

        <form action="/adminProduct/update" method="POST">
        <input type="hidden" name="id" value="<?=$productFound->id;?>">
            <label for="">Categoria</label>
            <select name="categoria" class="form-select" aria-label="Default select example">
                <option selected>Selecione uma Categoria</option>
                <option value="pesca">Pesca</option>
                <option value="racoes">Rações</option>
                <option value="aquarismo">Aquarismo</option>
                <option value="jardinagem">Jardinagem</option>
                <option value="aves">Aves</option>
                <option value="vacinas">Vacinas</option>
                <option value="Outros">Outros</option>
            </select><br><br>


            <label for="hide">Destaque</label>
            <input type="hidden" name="hide" value="0"> <!-- Valor padrão é 0 -->
            <input type="checkbox" id="hide" name="hide" value="1" <?php echo ($productFound->hide == 1) ? 'checked' : ''; ?>><br><br>

            <label for="title">Título:</label>
            <input style="width: 100%;" type="text" placeholder="Escreva um título" name="title" value="<?=$productFound->title;?>"><br><br>

            <label for="sub_title">Subtítulo:</label>
            <input style="width: 100%;" type="text" placeholder="Escreva um sub-titulo" name="sub_title"  value="<?=$productFound->sub_title;?>"><br><br>

            <label for="description">Descrição:</label>
            <textarea style="width: 100%;" rows="20" placeholder="Escreva a descrição do produto!!!" name="description"><?=$productFound->description;?></textarea><br><br>
        
            <label for="price">Preço:</label>
            <input style="width: 100%;" type="number" placeholder="Escreva um Preço" name="price"  value="<?=$productFound->price;?>"><br><br>
            
            <button type="submit">Atualizar</button><br><br>
        </form>
    </div>
</div>