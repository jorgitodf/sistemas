    
    <aside class="row-fluid container container-finalizar-compra col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="row-fluid">
            <h2>Finalizar Compra</h2><br/>
            <div class="dados-usuario col-sm-5">
                <form method="POST" action="" id="form-finalizar-compra">
                    <div class="form-group form-group-sm">
                        <label class="" for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome" class="form-control input-sm"/>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="" for="email">RG:</label>
                        <input type="text" name="rg" id="rg-finalizar" class="form-control input-sm"/>
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="orgao_expedidor" class="control-label">Órgão Expedidor:</label>
                        <select class="form-control input-sm" name="orgao_expedidor" id="orgao_expedidor" >
                            <?php echo $orgaosExpedidores; ?>
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="data_nascimento" class="control-label">Data de Nascimento:</label>
                        <input class="form-control input-sm" type="date" name="data_nascimento" id="data_nascimento" value="">
                    </div>
                    <div class="form-inline form-inline-sm">
                        <label class="" for="ddd">Telefone Resideicial:</label><br/>
                        <input type="text" name="ddd" id="ddd" class="form-control input-sm"/>
                        <input type="text" name="telefone" id="telefone"class="form-control input-sm"/>
                    </div><br/>
                    <div class="form-inline form-inline-sm">
                        <label class="" for="ddd-cel">Telefone Celular:</label><br/>
                        <input type="text" name="ddd-cel" id="ddd-cel" class="form-control input-sm"/>
                        <input type="text" name="celular" id="celular"class="form-control input-sm"/>
                    </div>
            </div>
            <div class="dados-usuario-endereco col-sm-6">
                    <div class="form-group form-group-sm">
                        <label for="logradouro" class="control-label">Tipo Logradouro:</label>
                        <select class="form-control input-sm" name="logradouro" id="logradouro">
                            <?php echo $tipoLogradouros; ?>
                        </select>
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="log_descricao" class="control-label">Logradouro:</label>
                        <input type="text" class="form-control input-sm" name="log_descricao" id="log_descricao" value="">
                    </div>
                    <div class="form-group form-group-sm div-complemento">
                        <label class="" for="complemento">Complemento:</label>
                        <input type="text" name="complemento" id="complemento" class="form-control input-sm"/>
                    </div>
                    <div class="form-group form-group-sm div-numero">
                        <label class="" for="numero">Número:</label>
                        <input type="text" name="numero" id="numero" class="form-control input-sm"/>
                    </div>
                    <div class="form-group form-group-sm div-cep">
                        <label class="" for="cep">Cep:</label>
                        <input type="text" name="cep" id="cep" class="form-control input-sm"/>
                    </div>
                    <div class="form-group form-group-sm div-bairro">
                        <label class="" for="bairro">Bairro:</label>
                        <input type="text" name="bairro" id="bairro" class="form-control input-sm"/>
                    </div>
                    <div class="form-group form-group-sm div-cidade">
                        <label class="" for="cidade">Cidade:</label>
                        <input type="text" name="cidade" id="cidade" class="form-control input-sm"/>
                    </div>
                    <div class="form-group form-group-sm div-uf">
                        <label for="uf" class="control-label">UF:</label>
                        <select class="form-control input-sm" name="uf" id="uf">
                            <?php echo $ufs; ?>
                        </select>
                    </div>

                </form>
            </div>
        </div>
    </aside>
