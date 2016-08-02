
    <aside class="row-fluid container container-categoria-admin">
        <h2>Adicionar Categorias</h2><br/>
        <form class="form-horizontal" method="POST">
            <div class="form-group">
                <label for="nome_categoria" class="col-sm-2 control-label">Nome</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nome_categoria" id="nome_categoria" placeholder="Nome de Categoria">
                </div>
            </div><br/>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <?php echo !empty($erro) ? $erro : "" ?>     
            </div>
            </div>

        </form>
    </aside>
