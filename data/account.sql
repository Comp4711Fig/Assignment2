/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  ljf92
 * Created: Apr 1, 2017
 */
DROP TABLE IF EXISTS `Account`;
CREATE TABLE `Account` (
  `id` int(11) NOT NULL,
  `money_spend` decimal(10,0) NOT NULL DEFAULT '0',
  `money_earned` decimal(10,0) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `Account` (`id`, `money_spend`, `money_earned`, `timestamp`) VALUES
  (1, '0', '0', '2017-03-30 04:55:43');
