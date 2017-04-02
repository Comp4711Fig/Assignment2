/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  ljf92
 * Created: Mar 31, 2017
 */

DROP TABLE IF EXISTS `Robot`;
CREATE TABLE `Robot` (
  `id` int(11) NOT NULL,
  `part1CA` varchar(6) NOT NULL,
  `part2CA` varchar(6) NOT NULL,
  `part3CA` varchar(6) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` decimal(10,0) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `Robot`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `Robot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

INSERT into robot(part1CA, part2CA, part3CA) VALUES ("111111","555555","666666")