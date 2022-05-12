
--
CREATE DATABASE IF NOT EXISTS `musico_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `musico_db`;

-- --------------------------------------------------------
DROP TABLE IF EXISTS `musico`;
CREATE TABLE IF NOT EXISTS `musico` (
  `id_musico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `pass` varchar(200) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `obs` varchar(20) DEFAULT NULL,
  index (id_musico),
  PRIMARY KEY (`id_musico`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `disco`;
CREATE TABLE IF NOT EXISTS `disco` (
  `id_disco` int (11) NOT NULL AUTO_INCREMENT,
  `nombre`  varchar (200) NOT NULL ,
  `genero` varchar (63) NOT NULL,
  `foto` varchar (200) NOT NULL,
  `link` varchar (200) NOT NULL,
  `instrumento`varchar (63),
  index (id_disco),
  PRIMARY KEY (id_disco),
  `id_musico` INT NOT NULL,
  constraint disco_musico
  foreign key (`id_musico`)
  references musico(id_musico) on delete no action on update cascade   
)ENGINE=INNODB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `musica`;
CREATE TABLE IF NOT EXISTS `musica`(


`id_musica` int (11) not null auto_increment,
`nombre` varchar (200) NOT NULL ,
`genero`  varchar (63) NOT NULL,
`link` varchar (200) NOT NULL,
PRIMARY key (`id_musica`),
`id_disco` int not null,
constraint musica_disco
foreign key (id_disco)
references disco(id_disco) on delete no action on update cascade
)ENGINE=INNODB DEFAULT CHARSET=latin1;