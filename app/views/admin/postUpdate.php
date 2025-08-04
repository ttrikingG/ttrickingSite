<div style="margin: 0.5%;">
    <div>
        <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
            <strong><h2>Editar Postagem</h2></strong>
        </div>

        <button><a href="/adminPost/show">Voltar</a></button>
        <button><a href="/adminPost/show">Listar</a></button>
    </div>
    
    <hr>

    <form action="/adminPost/update" method="POST">
        <input type="hidden" name="id" value="<?=$postFound->id;?>">
        <label for="">Título</label>
        <input style="width: 100%;" type="text" class="form-control" name="title" placeholder="Escreva um título" value="<?=$postFound->title;?>"><br><br>

        <label for="">Sub titulo</label>
        <input style="width: 100%;" type="text" class="form-control" name="sub_title" placeholder="Escreva um sub-titulo" value="<?=$postFound->subTitle;?>"><br><br>

        <label for="">Thumbnail</label>
        <select name="image_path" class="form-select" aria-label="Default select example">
            <option selected>Selecione uma imagem</option>
        </select><br><br>

        <textarea style="width: 100%;"  rows="20" class="form-control" name="content"><?=$postFound->content;?></textarea><br><br>

        <button type="submit">Atualizar</button>
    </form>
</div>