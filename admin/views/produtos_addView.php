
    <aside class="row-fluid container container-categoria-admin">
        <h2>Adicionar Produto</h2><br/>
        <form class="form-horizontal" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nome_produto" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome_produto" id="nome_produto" placeholder="Nome do Produto">
                </div>
            </div>
            <div class="form-group">
                <label for="descricao" class="col-sm-2 control-label">Descrição</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="descricao" id="descricao" placeholder="Descrição do Produto"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="categoria" class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-10">
                    <select class="form-control" name="categoria">
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?php echo $categoria['idcategorias']?>"><?php echo $categoria['nome_categoria']?></option>
                    <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="preco" class="col-sm-2 control-label">Preço</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço do Produto">
                </div>
            </div>
            <div class="form-group">
                <label for="imagem" class="col-sm-2 control-label">Imagem</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="imagem" id="imagem">
                </div>
            </div>
            <div class="form-group">
                <label for="quantidade" class="col-sm-2 control-label">Quantidade</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="quantidade" id="quantidade" placeholder="Quantidade do Produto">
                </div>
            </div>
            <br/>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <?php echo !empty($erro) ? $erro : "" ?>
                </div>
            </div>

        </form>
    </aside>