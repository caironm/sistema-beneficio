CREATE TABLE bancarios (
cpf int(11),
beneficio varchar(10), 
banco varchar(6), 
agencia varchar(6), 
agencia_nome varchar(50),
conta_corrente varchar(25),
meioPagamento varchar(20), 
created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP, 
updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP);