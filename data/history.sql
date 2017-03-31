
DROP TABLE IF EXISTS `historys`;
CREATE TABLE `historys` (
  `seq` varchar(10) NOT NULL,
  `plant` varchar(20) NOT NULL,
  `action` varchar(16) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `stamp` datetime NOT NULL,
  `model` char(1) NOT NULL,
  `line` varchar(20) NOT NULL
);
