
    <aside class="row-fluid container container-home col-md-12 col-lg-12 col-sm-8 col-xs-12">
        <div class="row row-home">
            <div class="col-xs-12 col-md-12 col-sm-12 produto">
                <?php foreach ($produtos as $produto): ?>
                    <div class="thumbnail img-home">
                        <a href="/produto/ver/<?php echo $produto['idprodutos']; ?>">
                            <figure>
                                <img class="img-responsive center-block img-rounded tam-img-home" src="/assets/images/produtos/<?php echo $produto['imagem']; ?>" alt="imagem"/>
                                <figcaption class="caption">
                                    <p><?php echo $produto['nome']; ?></p>
                                    <p><?php echo "R$ ".number_format($produto['preco'], 2, ',', '.'); ?></p>
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </aside>



