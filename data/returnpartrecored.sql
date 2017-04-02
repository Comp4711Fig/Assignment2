/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  ljf92
 * Created: Apr 1, 2017
 */
DROP TABLE IF EXISTS `returnpartrecords`;
CREATE TABLE `returnpartrecords` (
    `id` int(4) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `partcacode` varchar(8) NOT NULL,
    `earning` int(4) NOT NULL,
    `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
