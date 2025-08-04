<main>
    <div>
        <div style="
            display: flex;
            flex-wrap: wrap;
            gap: 4px;
            justify-content: center;
        ">
            <button class="buttonViolet">Total de PRODUTOS: <?php echo count($products); ?></button>
            <button class="buttonViolet">Total de SERVIÇOS: <?php echo count($services); ?></button>
            <button class="buttonViolet">Total de POSTAGENS: <?php echo count($posts); ?></button>
            <button class="buttonViolet">Total de USUÁRIOS: <?php echo count($users); ?></button>
        </div>

        <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
            <strong><h3>Cadastrar</h3></strong>
        </div>

        <div style="display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 4px;
        ">
            <a class="buttonLime" href="/adminProduct">Produtos</a><br><br>
            <a class="buttonLime" href="/adminService">Serviços</a><br><br>
            <a class="buttonLime" href="/adminPost">Postagens</a><br><br>
            <a class="buttonLime" href="/adminPortifolio">Portifolio</a><br><br>
        </div>

        <div style="background-color: Indigo; color: snow; text-align: center; border-radius: 4px;">
            <strong><h3>Listar</h3></strong>
        </div>

        <div style="display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 4px;
        ">
            <a class="buttonLime" href="/adminProduct/show">Produtos</a><br><br>
            <a class="buttonLime" href="/adminService/show">Serviços</a><br><br>
            <a class="buttonLime" href="/adminPost/show">Postagens</a><br><br>
            <a class="buttonLime" href="/adminPortifolio/show">Portifolio</a><br><br>
            <a class="buttonLime" href="/adminPanel/user_show">Usuários</a><br><br>
            <a class="buttonLime" href="/adminGallery/show">Galeria</a><br><br>

        </div>
    </div>
</main>