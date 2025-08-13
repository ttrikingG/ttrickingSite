<main>
    <!-- Seção de Produtos -->
    <section class="fade-in">
        <div class="section-title">
            <h3><i class="fas fa-shopping-bag"></i> Confira nossos Produtos!!!</h3>
        </div>

        <div class="products-gallery">
            <?php foreach ($products as $product) : ?>
                <div class="product-card">
                    <a href="/product/show?id=<?= $product->id ?>" title="Clique para ver detalhes">
                        <?php if (!empty($product->images)) : ?>
                            <img 
                                src="<?= $product->images[0]->path ?>" 
                                alt="Imagem do Produto <?= $product->title ?>" 
                                loading="lazy">
                        <?php else: ?>
                            <div class="no-image-placeholder">
                                <div>Sem imagem<br><small>Produto em breve</small></div>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Seção de Posts -->
    <section class="fade-in">
        <div class="section-title">
            <h3><i class="fas fa-newspaper"></i> Não Perca nosso Conteúdo!!!</h3>
        </div>

        <div class="containerMain">
            <div class="contentMainLeft">
                <table class="posts-table">
                    <thead>
                        <tr>
                            <th><i class="fas fa-image"></i></th>
                            <th><i class="fas fa-heading"></i> Título</th>
                            <th><i class="fas fa-calendar"></i> Data</th>
                            <th><i class="fas fa-info-circle"></i> Detalhes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($posts as $post): ?>
                            <tr>
                                <td>
                                    <?php if (!empty($post->images)): ?>
                                        <img src="/<?= $post->images[0]->path ?>" 
                                             alt="Imagem do Post" 
                                             class="post-image" 
                                             loading="lazy">
                                    <?php else: ?>
                                        <div class="no-image-placeholder">
                                            <span>Sem imagem</span>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="post-title"><?= $post->title ?></td>
                                <td class="post-date"><?= date('d M Y', strtotime($post->created_at)) ?></td>
                                <td>
                                    <a href="/post/show?id=<?= $post->id; ?>">
                                        <button class="view-btn"><i class="fas fa-eye"></i> Ver</button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <!-- Serviços + Biblioteca + Notícias -->
            <div class="contentMainRight">
                <!-- Serviços -->
                <div>
                    <div class="content-section-title">
                        <i class="fas fa-cogs"></i> Conheça nossos serviços!!!
                    </div>
                    <div class="content1">
                        <?php foreach ($services as $service) : ?>
                            <div class="service-item">
                                <a href="/service/show?id=<?= $service->id ?>" title="<?= $service->title ?>">
                                    <?php if (!empty($service->images)) : ?>
                                        <img src="<?= $service->images[0]->path ?>" 
                                             alt="Imagem do Serviço <?= $service->title ?>" 
                                             loading="lazy">
                                    <?php else: ?>
                                        <div class="no-image-placeholder">
                                            <span style="font-size: 12px;">Sem imagem</span>
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Biblioteca -->
                <div class="content2">
                    <div class="content-section-title">
                        <i class="fas fa-code"></i> My Library!!!
                    </div>
                    <table class="library-table">
                        <thead>
                            <tr>
                                <th><i class="fas fa-file-code"></i> Título</th>
                                <th><i class="fas fa-link"></i> Links</th>
                                <th><i class="fas fa-info"></i> Detalhes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($portifolios as $portifolio): ?>
                                <tr>
                                    <td><strong><?= $portifolio->title ?></strong></td>
                                    <td>
                                        <a href="<?= $portifolio->git_link ?>" 
                                           target="_blank" 
                                           class="github-link">
                                            <i class="fab fa-github"></i> GitHub
                                        </a>
                                    </td>
                                    <td><a href="#" class="view-link">Ver</a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Últimas Notícias -->
                <div class="content3">
                    <?php for ($i = 0; $i < 6; $i++) : ?>
                        <div class="news-item">
                            <img src="" width="40" height="40" alt="Notícia <?= $i + 1 ?>">
                        </div>
                    <?php endfor; ?>
                </div>

                <!-- Botões -->
                <div class="content4">
                    <button>Botão 1</button>
                    <button>Botão 2</button>
                    <button>Botão 3</button>
                    <button>Botão 4</button>
                </div>
            </div>
        </div>
    </section>
</main>
