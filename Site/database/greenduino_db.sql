-- banco não oficial, banco para teste online 
CREATE DATABASE greenduino_db;
USE greenduino_db;

CREATE TABLE  registros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    hora TIME NOT NULL,
    temperatura FLOAT,
    umidade_ar FLOAT,
    umidade_solo FLOAT,
    irrigacao TINYINT(1)
);
CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  senha VARCHAR(270),
  telefone VARCHAR(20),
  cpf VARCHAR(20)
);
INSERT INTO registros (data, hora, temperatura, umidade_ar, umidade_solo, irrigacao)
VALUES 
('2025-10-01', '08:00:00', 22.5, 60.0, 35.0, 0),
('2025-10-01', '12:00:00', 28.3, 55.0, 30.0, 1),
('2025-10-01', '16:00:00', 27.1, 50.0, 28.0, 1),
('2025-10-02', '08:00:00', 21.9, 65.0, 40.0, 0),
('2025-10-02', '12:00:00', 29.0, 52.0, 29.0, 1),
('2025-10-02', '16:00:00', 26.5, 48.0, 27.0, 1),
('2025-10-03', '08:00:00', 23.0, 70.0, 42.0, 0),
('2025-10-03', '12:00:00', 30.1, 50.0, 25.0, 1);
