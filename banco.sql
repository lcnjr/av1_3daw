
SET NAMES utf8 ;
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos`
(
  `matricula` varchar
(45) NOT NULL,
  `nome` varchar
(45) DEFAULT NULL,
  `cpf` varchar
(45) DEFAULT NULL,
  PRIMARY KEY
(`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `
alunos`
VALUES
    ('11', 'jotaro', '21312313'),
    ('123', 'LUCIANO MOREIRA', '231412412'),
    ('2421', 'DIO', '415353214');