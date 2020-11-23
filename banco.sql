
SET NAMES utf8 ;


DROP TABLE IF EXISTS `alunos`;
SET character_set_client
= utf8mb4 ;
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
  ('11', 'Jotaro', '12332'),
  ('2020', 'Naruto', '21312313213'),
  ('2421', 'Giorno', '21312313213');


DROP TABLE IF EXISTS `disciplinas`;
SET character_set_client
= utf8mb4 ;
CREATE TABLE `disciplinas`
(
  `id` int
(11) NOT NULL,
  `Nome` varchar
(45) DEFAULT NULL,
  `Periodo` varchar
(45) DEFAULT NULL,
  `preRequisito` int
(11) DEFAULT NULL,
  `Sigla` varchar
(45) DEFAULT NULL,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `
disciplinas`
VALUES
  (1, 'XPTO', 'Primeiro', 0, 'XP'),
  (2, 'XPTO2', 'Segundo', 1, 'XP2');

DROP TABLE IF EXISTS `turma`;

SET character_set_client
= utf8mb4 ;
CREATE TABLE `turma`
(
  `idturma` int
(11) NOT NULL,
  `professor` varchar
(45) DEFAULT NULL,
  `idDisciplina` int
(11) DEFAULT NULL,
  `turno` varchar
(45) DEFAULT NULL,
  `sala` varchar
(45) DEFAULT NULL,
  PRIMARY KEY
(`idturma`),
  KEY `id_idx`
(`idDisciplina`),
  CONSTRAINT `id` FOREIGN KEY
(`idDisciplina`) REFERENCES `disciplinas`
(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `
turma`
VALUES
  (1, 'jiraya', 1, 'manhã', 'SALA01'),
  (2, 'jiraya', 1, 'Noite', 'SALA01'),
  (3, 'Dio', 2, 'manhã', 'SALA02'),
  (4, 'Dio', 2, 'noite', 'SALA02'),
  (5, 'Dio', 1, 'manhã', 'SALA03');


DROP TABLE IF EXISTS `assoc_aluno_turma`;
SET character_set_client
= utf8mb4 ;
CREATE TABLE `assoc_aluno_turma`
(
  `idAssociacao` int
(11) NOT NULL AUTO_INCREMENT,
  `aluno` varchar
(45) DEFAULT NULL,
  `turma` int
(11) DEFAULT NULL,
  `aprovado` tinyint
(4) DEFAULT '0',
  PRIMARY KEY
(`idAssociacao`),
  KEY `alunoTurma_idx`
(`aluno`),
  KEY `turmaAluno_idx`
(`turma`),
  CONSTRAINT `alunoTurma` FOREIGN KEY
(`aluno`) REFERENCES `alunos`
(`matricula`),
  CONSTRAINT `turmaAluno` FOREIGN KEY
(`turma`) REFERENCES `turma`
(`idturma`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `
assoc_aluno_turma`
VALUES
  (1, '11', 1, 0),
  (2, '2020', 1, 0),
  (3, '11', 5, 0),
  (4, '11', 5, 0);
