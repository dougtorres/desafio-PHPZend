CREATE DATABASE `desafioDb` /*!40100 DEFAULT CHARACTER SET latin1 */;
CREATE TABLE `Carro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `key` varchar(45) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `Marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `fipe_name` varchar(45) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `key` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
