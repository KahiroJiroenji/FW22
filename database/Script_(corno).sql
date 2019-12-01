CREATE DATABASE IF NOT EXISTS `corno` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `corno`;


CREATE TABLE `t_usuario` (

`id_usuario` int NOT NULL AUTO_INCREMENT,

`email` varchar(100) NOT NULL,

`senha` varchar(100) NOT NULL,

`nome` varchar(255) NOT NULL,

`cpf` varchar(14) NULL,

`idade` int(3) NULL,

`telefone` varchar(12) NULL,

`nivel_usuario` int(1) NULL DEFAULT 1 COMMENT '1-Cliente/2-Admin',

PRIMARY KEY (`id_usuario`) 

);


CREATE TABLE `t_endereco` (

`id_usuario` int NOT NULL,

`cep` varchar(9) NULL,

`rua` varchar(150) NULL,

`ncasa` varchar(10) NULL,

`bairro` varchar(50) NULL,

`complemento` varchar(255) NULL,

`cidade` varchar(50) NULL,

`estado` varchar(50) NULL,

PRIMARY KEY (`id_usuario`) 

);



CREATE TABLE `t_pesquisas` (

`cod_pesquisa` int NOT NULL AUTO_INCREMENT,

`nome_pesquisa` VARCHAR(80),

`pergunta` VARCHAR (80),

`alternativa1` VARCHAR (30),

`alternativa2` VARCHAR (30),

`alternativa3` VARCHAR (30),

`alternativa4` VARCHAR (30),

`alternativa5` VARCHAR (30),

`dt_Pesquisa` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,

`status_disponivel` bit NULL DEFAULT 1,

PRIMARY KEY (`cod_pesquisa`) 

);

INSERT INTO `t_usuario` (`id_usuario`, `email`, `senha`, `nome`, `cpf`, `idade`, `telefone`, `nivel_usuario`) VALUES
(1, 'gpsantos1999@gmail.com', '4e3b9cba0bae4d9dcd549342b4577624', 'Kahiro','47219703822', 20, '11 959361958', 1),
(2, 'jacemarmenes@gmail.com', '5b6eb3835ce1ea2c1ba04eb88d745a6d', 'Jacemar', '28940740858', 19, '82988889999', 2);


INSERT INTO `t_endereco` (`id_usuario`, `cep`, `rua`, `ncasa`, `bairro`, `complemento`, `cidade`, `estado`) VALUES
(1, '07150-000', 'Av Coqueiral', '959', 'Seródio', '', 'Guarulhos', 'Sao Paulo');)
(2, '02564-430', 'Rua do Boquita', '86', 'Jardim Palmito', '', 'Araraquara', 'Sao Paulo');
