-- usuario e senha padrões root / ''

create database db_app_ricas;
use db_app_ricas;

CREATE TABLE `usuario` (
  `cd_usu` int(11) NOT NULL primary key auto_increment,
  `nm_usu` varchar(255) DEFAULT NULL,
  `nm_email` varchar(255) DEFAULT NULL,
  `nm_senha` varchar(255) DEFAULT NULL
);

CREATE TABLE `tbl_imagem` (
  `cd_img` int(11) NOT NULL primary key auto_increment,
  `titulo` varchar(255) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `id_usu` int(11) DEFAULT NULL
);

CREATE TABLE `tbl_imagem_caminho` (
  `cd_img` int(11) NOT NULL primary key auto_increment,
  `id_galeria` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
);
  
ALTER TABLE `tbl_imagem_caminho`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `tbl_imagem_caminho_ibfk_1` (`id_galeria`);

ALTER TABLE `tbl_imagem_caminho`
  ADD CONSTRAINT `tbl_imagem_caminho_ibfk_1` FOREIGN KEY (`id_galeria`) REFERENCES `tbl_imagem` (`cd_img`),
  ADD CONSTRAINT `tbl_imagem_caminho_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`cd_usu`);

alter table tbl_imagem add column loop_ft varchar(2);
alter table tbl_imagem add column timer int;