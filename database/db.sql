
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `ecommerce_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecommerce_db`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(256) NOT NULL,
  `cel` int(11) ,
  `creation_date` date NOT NULL DEFAULT CURRENT_TIMESTAMP,
  index (id_user),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  index(id_category),
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `price` int(11) NOT NULL,
  index(id_product),
  PRIMARY KEY (`id_product`),
  `id_category` int(11) NOT NULL,
  `id_seller` int(11) DEFAULT NULL,
  constraint categoryOfProduct
  foreign key id_category (id_category)
  references category(id_category) on delete no action on update cascade,
  constraint seller
  foreign key id_seller (id_seller)
  references user(id_user) on delete no action on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL AUTO_INCREMENT,
  `state` int(5) NOT NULL,
  index (id_cart),
  PRIMARY KEY (`id_cart`),
  `id_user` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  constraint userCart
  foreign key id_user (`id_user`)
  references user(id_user) on delete no action on update cascade,
  constraint productInCart
  foreign key id_product(`id_product`)
  references product(id_product) on delete no action on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `purchase` (
  `id_purchase` int(11) NOT NULL AUTO_INCREMENT,
  `creation_date` date NOT NULL,
  index(id_purchase),
  PRIMARY KEY (`id_purchase`),
  `id_buyer` int(11) NOT NULL,
  `id_cart` int(11) NOT NULL,
  constraint productBuyer
  foreign key id_buyer_purchase(id_buyer)
  references user(id_user) on delete no action on update cascade,
  constraint purchaseInCart
  foreign key id_cart_purchase(id_cart) 
  REFERENCES cart(id_cart) on delete no action on update cascade
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


