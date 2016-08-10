   
    <aside class="row-fluid container container-mostra-categoria col-md-12 col-lg-12 col-sm-8 col-xs-12">
        <div class="row row-mostra-categoria">
        <h2><?php echo $categoria; ?></h2>
            <div class="col-xs-12 col-md-12 col-sm-12 div-prod-mostra">
            <?php foreach ($produtos as $produto): ?>
                <div class="thumbnail img-prod-categoria">
                    <a href="/produto/ver/<?php echo $produto['idprodutos']; ?>" title="Clique para ver mais Detalhes">
                        <figure>
                            <img class="img-responsive center-block img-rounded tam-img-ver-categoria" src="/assets/images/produtos/<?php echo $produto['imagem']; ?>" />
                            <figcaption class="caption">
                                <p><strong><?php echo $produto['nome']; ?></strong></p>
                                <p><?php echo "R$ ".  number_format($produto['preco'], 2, ',', '.'); ?></p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
            <?php endforeach; ?>

            </div>
        </div>
    </aside>