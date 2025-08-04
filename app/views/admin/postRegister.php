<div style="margin: 0.5%;">
    <div>
        <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
            <strong><h2>Cadastrar Postagem</h2></strong>
        </div>

        <button><a href="/adminPanel">Voltar</a></button>
        <button><a href="/adminPost/show">Listar</a></button>
    </div>

    <hr>

    <strong style="color: green;"><?php echo message('post') ?></strong>

    <form action="/adminPost/store" method="POST" enctype="multipart/form-data" role="form">

        <label for="">Categoria</label>
            <select name="categoria" class="form-select" aria-label="Default select example">
                <option selected>Selecionar Categoria</option>
                <option value="Project-Nova-Genesis">Project Nova Genesis</option>
                <option value="Sites-em-PHP">Sites em PHP</option>
                <option value="Produtos">Produtos</option>
                <option value="Serviços">Serviços</option>
                <option value="Outros">Outros</option>
            </select><br><br>

        <label for="">Imagens</label>
        <input type="file" name="file" accept="image/jpeg, image/jpg, image/png" required><br><br>    

        <label for="">Título</label>
        <input style="width: 100%;" type="text" class="form-control" name="title" placeholder="Escreva um título"><br><br>
        <?php echo message('title')?>

        <label for="">Sub titulo</label>
        <input style="width: 100%;" type="text" class="form-control" name="sub_title" placeholder="Escreva um sub-titulo"><br><br>
        <?php echo message('sub_title')?>

        <textarea style="width: 100%;"  rows="20" class="form-control" name="content" placeholder="Escreva sua postagem!!!"></textarea><br><br>
        <?php echo message('content')?>

        <button type="submit">Fazer o Post</button>
    </form>
</div>