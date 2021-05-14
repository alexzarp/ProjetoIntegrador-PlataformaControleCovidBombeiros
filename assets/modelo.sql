-- Modelo do banco

CREATE DATABASE covidbombeiros;

CREATE TABLE bombeiro(
    matricula integer(7) PRIMARY KEY,
    email varchar(20) NOT NULL,
    senha varchar(32) NOT NULL,
    nome varchar(50) NOT NULL,
    adm boolean NOT NULL
);

INSERT INTO bombeiro (matricula, email, senha, nome, adm) VALUES (
    1234567,
    "t@t.com",
    "e10adc3949ba59abbe56e057f20f883e", --123456
    "Alessandro Souza",
    1
);

INSERT INTO bombeiro (matricula, email, senha, nome, adm) VALUES (
    1234567,
    "w@w.com",
    "e10adc3949ba59abbe56e057f20f883e", --123456
    "Teste Usuario",
    0
);
--  FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)
CREATE TABLE pretestagem (
    id integer PRIMARY KEY AUTO_INCREMENT,
    dt_ini_sint date NOT NULL,
    descr varchar(1000) NOT NULL,
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
INSERT INTO vacina (nome_vac) VALUES ("CORONAVAC - Instituto Butantan");
INSERT INTO vacina (nome_vac) VALUES ("OXFORD - AstraZeneca");
INSERT INTO vacina (nome_vac) VALUES ("PFIZER");

CREATE TABLE avalia_retorno (
    id integer PRIMARY KEY AUTO_INCREMENT,
    dt_previtsta date NOT NULL,
    dt_real date,
    dt_nova date,
    comentario varchar(1000) NOT NULL,

    FOREIGN KEY (id) REFERENCES pretestagem(id)
);
--*********************************------
create table result_teste(
  id int PRIMARY KEY AUTO_INCREMENT not null,
  dt_teste date not null,
  tp_teste varchar(50) not null,
  result_teste varchar(20) not null,
  matricula int(7) not null,
  FOREIGN KEY(matricula) references bombeiro (matricula),
  FOREIGN KEY (id) references pretestagem (id)
);
