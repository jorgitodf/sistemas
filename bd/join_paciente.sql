SELECT pes_tipo, pes_cpf, pes_nome, pes_sobrenome, pes_rg, tb_orgao_expedidor.nome_orgao_expedidor pes_data_nascimento, pes_sexo, 
tb_logradouro_tipo.tp_log_descricao, tb_logradouro.log_descricao, tb_endereco.end_complemento, tb_endereco.end_numero, tb_bairro.bai_nome, 
tb_endereco.end_cep, tb_cidade.cid_nome, tb_uf.uf_descricao, tb_telefones.num_telefone_celular, tb_telefones.num_telefone_residencial, tb_telefones.num_telefone_comercial
FROM tb_pessoas
LEFT JOIN tb_estado_civil
ON tb_pessoas.fk_estado_civil = tb_estado_civil.id_estado_civil
LEFT JOIN tb_orgao_expedidor
ON tb_pessoas.fk_orgao_expedidor = tb_orgao_expedidor.id_orgao_expedidor
LEFT JOIN tb_endereco
ON tb_pessoas.fk_endereco = tb_endereco.id_endereco
LEFT JOIN tb_logradouro
ON tb_endereco.fk_logradouro = tb_logradouro.id_logradouro
LEFT JOIN tb_logradouro_tipo
ON tb_logradouro.fk_logradouro_tipo = tb_logradouro_tipo.id_logradouro_tipo
LEFT JOIN tb_bairro
ON tb_endereco.fk_id_bairro = tb_bairro.id_bairro
LEFT JOIN tb_cidade
ON tb_bairro.fk_cidade = tb_cidade.id_cidade
LEFT JOIN tb_uf
ON tb_cidade.fk_uf = tb_uf.id_uf
LEFT JOIN tb_telefones
ON tb_telefones.fk_pessoa = tb_pessoas.id_pessoa
ORDER BY tb_pessoas.id_pessoa ASC;