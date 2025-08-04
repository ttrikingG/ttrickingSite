<div style="margin: 0.5%;">
    <div>
        <div>
            <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
                <strong><h2>Cadastrar Produto</h2></strong>
            </div>

            <button><a href="/adminPanel">Voltar</a></button>
            <button><a href="/adminProduct/show">Listar</a></button>
        </div>

        <hr>

        <strong style="color: purple;"><?php echo message('product') ?></strong>

        <form action="/adminProduct/store" method="POST" enctype="multipart/form-data">
            <label for="">Categoria</label>
            <select name="categoria" class="form-select" aria-label="Default select example">
                <option selected>Selecionar Categoria</option>
                <option value="produtos">Produtos</option>
                <option value="serviços">Serviços</option>
                <option value="sitesPHP">Sites em PHP</option>
                <option value="outros">Outros</option>
            </select><br><br>

            <label for="">Imagens</label>
            <input type="file" name="file" accept="image/jpeg, image/jpg, image/png" required><br><br>
            
            <label for="title">Título:</label>
            <input style="width: 100%;" placeholder="Escreva um título" name="title"><br><br>
            <?php echo message('title')?>

            <label for="sub_title">Subtítulo:</label>
            <input style="width: 100%;" type="text" placeholder="Escreva um sub-titulo" name="sub_title"><br><br>
            <?php echo message('sub_title')?>

            <label for="description">Descrição:</label>
            <textarea style="width: 100%;" rows="10" placeholder="Escreva a deescrição do produto!!!" id="description" name="description"></textarea><br><br>
            <?php echo message('description')?>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>