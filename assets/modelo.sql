-- Modelo do banco

CREATE DATABASE covidbombeiros;

CREATE TABLE bombeiro(
    matricula integer(7) PRIMARY KEY,
    email varchar(20) NOT NULL,
    senha varchar(32) NOT NULL,
    nome varchar(30) NOT NULL,
    adm boolean NOT NULL
);
--  FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)
CREATE TABLE pretestagem (
    id integer PRIMARY KEY AUTO_INCREMENT,
    dt_ini_sint date NOT NULL,
    descr varchar(1000) NOT NULL,
    tipo_teste varchar(20),
    dt_teste date,
    result_teste varchar(1000),
    faixa_etaria varchar(7) NOT NULL,
    matricula integer(7) NOT NULL,
    vacinado_vacina varchar(20),

    FOREIGN KEY (matricula) REFERENCES bombeiro(matricula),
    FOREIGN KEY (vacinado_vacina) REFERENCES vacinado(nome_vacina)
);

CREATE TABLE vacinado(
    nome_vacina varchar(20) PRIMARY KEY,
    data_primeira date NOT NULL,
    dara_segunda date,

    FOREIGN KEY (nome_vacina) REFERENCES vacina(nome_vac)
);

CREATE TABLE vacina (
    nome_vac varchar(20) PRIMARY KEY
);

CREATE TABLE avalia_retorno (
    id integer PRIMARY KEY AUTO_INCREMENT,
    dt_previtsta date NOT NULL,
    dt_real date,
    dt_nova date,
    comentario varchar(1000) NOT NULL,

    FOREIGN KEY (id) REFERENCES pretestagem(id)
);
