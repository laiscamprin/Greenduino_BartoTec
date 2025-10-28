create database greenduino_db;
use greenduino_db;

create table registros(
id_registros int not null auto_increment primary key,
data date,
hora time, 
temperatura DECIMAL(5,2),
umidade_ar decimal(5,2),
umidade_solo decimal(5,2),
irrigacao VARCHAR(10)
);

CREATE TABLE arduino (
id_arduino INT not null AUTO_INCREMENT PRIMARY KEY,
codigo_arduino VARCHAR(50) NOT NULL UNIQUE,    
nome_arduino VARCHAR(150) NOT NULL,
especie_planta VARCHAR(150) NOT NULL
);
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(255),
  email VARCHAR(255),
  senha VARCHAR(255),
  telefone VARCHAR(20),
  cpf VARCHAR(20)
  );
  
select*from usuarios;
insert into arduino(codigo_arduino,nome_arduino, especie_planta) values("16309_G","Estufa originária","alface");

