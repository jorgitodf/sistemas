    
    <aside class="row-fluid container container-cadastro-cliente col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="row row-cad-cliente">
            <h2>Cadastro de Cliente</h2>
            <div class="dados-usuario col-sm-5">
                <form method="POST" action="salvar" id="form-finalizar-compra">
                    <div class="form-group form-group-sm">
                        <label class="control-label tam-label" for="nome">Nome:</label>
                        <input type="text" name="cliente[nome]" id="nome" class="form-control input-sm" value="<?php echo !empty($nome['nome']) ? $nome['nome'] : '' ; ?>"/>
                        <?php echo !empty($erroNome) ? $erroNome : "" ?></span>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label tam-label" for="cpf-cad">CPF:</label>
                        <input type="text" name="cliente[cpf_cad]" id="cpf-cad" class="form-control input-sm" readonly="true" value="<?php echo !empty($_SESSION['novo_cliente']['cpf']) ? $_SESSION['novo_cliente']['cpf'] : '' ; ?>"/>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label tam-label" for="rg-finalizar">RG:</label>
                        <input type="text" name="cliente[rg]" id="rg-finalizar" class="form-control input-sm" value="<?php echo !empty($nome['rg']) ? $nome['rg'] : '' ; ?>"/>
                        <?php echo !empty($erroRg) ? $erroRg : "" ?></span>
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="orgao_expedidor" class="control-label tam-label">Órgão Expedidor:</label>
                        <select class="form-control input-sm" name="cliente[orgao_expedidor]" id="orgao_expedidor" >
                            <option></option>
                            <?php foreach ($orgaosExpedidores as $orgaosExpedidor): ?>
                                <option <?php echo (isset($nome['orgao_expedidor']) && $orgaosExpedidor['idorgao_expedidores'] == $nome['orgao_expedidor'] ? 'selected="selected"' : '') ?> value="<?php echo $orgaosExpedidor['idorgao_expedidores']; ?>"><?php echo $orgaosExpedidor['orgao_expedidor']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo !empty($erroOexpedidor) ? $erroOexpedidor : "" ?></span>
                    </div>
                    <div class="form-group form-group-sm">
                        <label class="control-label tam-label" for="email-cad">E-mail:</label>
                        <input type="email" name="cliente[email-cad]" id="email-cad" class="form-control input-sm" readonly="true" value="<?php echo !empty($_SESSION['novo_cliente']['email']) ? $_SESSION['novo_cliente']['email'] : '' ; ?>"/>
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="data_nascimento" class="control-label tam-label">Data de Nascimento:</label>
                        <input type="date" class="form-control input-sm" name="cliente[data_nascimento]" id="data_nascimento" value="<?php echo !empty($nome['data_nascimento']) ? $nome['data_nascimento'] : '' ; ?>">
                        <?php echo !empty($erroDtnascimento) ? $erroDtnascimento : "" ?></span>
                    </div>
                    <div class="form-group form-group-sm">
                        <label for="senha_cad" class="control-label tam-label">Senha:</label>
                        <input class="form-control input-sm" type="password" name="cliente[senha_cad]" id="senha_cad" value="<?php echo !empty($nome['senha_cad']) ? $nome['senha_cad'] : '' ; ?>">
                        <?php echo !empty($erroSenha) ? $erroSenha : "" ?></span>
                    </div>
                    <div class="form-inline form-inline-sm div-tel-telefone">
                        <label class="control-label tam-label" for="ddd">Telefone Residencial:</label><br/>
                        <input type="text" name="cliente[ddd]" id="ddd" class="form-control input-sm" value="<?php echo !empty($nome['ddd']) ? $nome['ddd'] : '' ; ?>"/>
                        <input type="text" name="cliente[telefone]" id="telefone" class="form-control input-sm" maxlength="9" value="<?php echo !empty($nome['telefone']) ? $nome['telefone'] : '' ; ?>"/><br/>
                        <?php echo !empty($erroTelefone) ? $erroTelefone : "" ?></span>
                    </div><br/>
                    <div class="form-inline form-inline-sm div-tel-celular">
                        <label class="control-label tam-label" for="ddd-cel">Telefone Celular:</label><br/>
                        <input type="text" name="cliente[ddd-cel]" id="ddd-cel" class="form-control input-sm" value="<?php echo !empty($nome['ddd-cel']) ? $nome['ddd-cel'] : '' ; ?>"/>
                        <input type="text" name="cliente[celular]" id="celular" class="form-control input-sm" maxlength="10" value="<?php echo !empty($nome['celular']) ? $nome['celular'] : '' ; ?>"/><br>
                        <?php echo !empty($erroCelular) ? $erroCelular : "" ?></span>
                    </div>

            </div>
            <div class="dados-usuario-endereco col-sm-5">
                <div class="form-group form-group-sm">
                    <label for="logradouro" class="control-label tam-label">Tipo Logradouro:</label>
                    <select class="form-control input-sm" name="cliente[logradouro]" id="logradouro">
                        <option></option>
                        <?php foreach ($tipoLogradouros as $tipoLogradouro): ?>
                            <option <?php echo (isset($nome['logradouro']) && $tipoLogradouro['idtp_logradouros'] == $nome['logradouro'] ? 'selected="selected"' : '') ?> value="<?php echo $tipoLogradouro['idtp_logradouros']; ?>"><?php echo $tipoLogradouro['tp_logradouro']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo !empty($erroLogradouro) ? $erroLogradouro : "" ?></span>
                </div>
                <div class="form-group form-group-sm">
                    <label for="log_descricao" class="control-label tam-label">Logradouro:</label>
                    <input type="text" class="form-control input-sm" name="cliente[log_descricao]" id="log_descricao" value="<?php echo !empty($nome['log_descricao']) ? $nome['log_descricao'] : '' ; ?>">
                    <?php echo !empty($erroLogDescricao) ? $erroLogDescricao : "" ?></span>
                </div>
                <div class="form-group form-group-sm">
                    <label class="control-label tam-label" for="complemento">Complemento:</label>
                    <input type="text" name="cliente[complemento]" id="complemento" class="form-control input-sm" value="<?php echo !empty($nome['complemento']) ? $nome['complemento'] : '' ; ?>">
                    <?php echo !empty($erroComplemento) ? $erroComplemento : "" ?></span>
                </div>
                
                <div class="form-group form-group-sm">
                    <label class="control-label tam-label" for="numero">Número:</label>
                    <input type="text" name="cliente[numero]" id="numero" class="form-control input-sm" value="<?php echo !empty($nome['numero']) ? $nome['numero'] : '' ; ?>">
                    <?php echo !empty($erroNumero) ? $erroNumero : "" ?></span>
                </div>

                <div class="form-group form-group-sm">
                    <label class="control-label tam-label" for="cep">Cep:</label>
                    <input type="text" name="cliente[cep]" id="cep" class="form-control input-sm" value="<?php echo !empty($nome['cep']) ? $nome['cep'] : '' ; ?>"/>
                    <?php echo !empty($erroCep) ? $erroCep : "" ?></span>
                </div>
                <div class="form-group form-group-sm">
                    <label class="control-label tam-label" for="bairro">Bairro:</label>
                    <input type="text" name="cliente[bairro]" id="bairro" class="form-control input-sm" value="<?php echo !empty($nome['bairro']) ? $nome['bairro'] : '' ; ?>"/>
                    <?php echo !empty($erroBairro) ? $erroBairro : "" ?></span>
                </div>
                
                <div class="form-group form-group-sm">
                    <label class="control-label tam-label" for="cidade">Cidade:</label>
                    <input type="text" name="cliente[cidade]" id="cidade" class="form-control input-sm" value="<?php echo !empty($nome['cidade']) ? $nome['cidade'] : '' ; ?>"/>
                    <?php echo !empty($erroCidade) ? $erroCidade : "" ?></span>
                </div>
                <div class="form-group form-group-sm">
                    <label for="uf" class="control-leabel tam-label">UF:</label>
                    <select class="form-control input-sm" name="cliente[uf]" id="uf">
                        <option></option>
                        <?php foreach ($ufs as $uf): ?>
                            <option <?php echo (isset($nome['uf']) && $uf['idufs'] == $nome['uf'] ? 'selected="selected"' : '') ?> value="<?php echo $uf['idufs']; ?>"><?php echo $uf['uf']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo !empty($erroUf) ? $erroUf : "" ?></span>
                </div>
                <div class="form-group form-group-sm div_botao_cad_cliente">
                    <button type="submit" id="botao_cadastrar" class="btn btn-primary">Cadastrar</button>
                    <?php echo !empty($aviso) ? $aviso : "" ?>

                </div>
                </form>
            </div>

        </div>
    </aside>
