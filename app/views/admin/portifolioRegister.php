<div style="margin: 0.5%;">
    <div>
        <div>
            <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
                <strong><h2>Cadastrar Portifolio</h2></strong>
            </div>

            <button><a href="/adminPanel">Voltar</a></button>
            <button><a href="/adminPortifolio/show">Listar</a></button>
        </div>

        <hr>

        <strong style="color: purple;"><?php echo message('portifolio') ?></strong>

        <form action="/adminPortifolio/store" method="POST" enctype="multipart/form-data">
            <label for="">Categoria</label>
            <select name="categoria" class="form-select" aria-label="Default select example">
                <option selected>Selecionar Categoria</option>
                <option value="produtos">Produtos</option>
                <option value="serviços">Serviços</option>
                <option value="sitesPHP">Sites em PHP</option>
                <option value="outros">Outros</option>
            </select><br><br>
            
            <label for="title">Título:</label>
            <input style="width: 100%;" placeholder="Escreva um título" name="title"><br><br>
            <?php echo message('title')?>

            <label for="git_link">Link do Git-Hub:</label>
            <input style="width: 100%;" type="text" placeholder="Adicione o Git-Hub link" name="git_link"><br><br>
            <?php echo message('git_link')?>

            <label for="codigo">Codigo:</label>
            <textarea style="width: 100%;" rows="10" placeholder="Adicione seu Código aqui!!!" id="codigo" name="codigo"></textarea><br><br>
            <?php echo message('codigo')?>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>