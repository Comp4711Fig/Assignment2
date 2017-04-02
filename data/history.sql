
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

INSERT INTO `historys` (`seq`, `plant`, `action`, `quantity`, `amount`, `stamp`, `model`, `line`) VALUES
('111111', 'plant1', 'build', 1, 50, '2010-01-01', 'a', 'household');
INSERT INTO `historys` (`seq`, `plant`, `action`, `quantity`, `amount`, `stamp`, `model`, `line`) VALUES
('222222', 'plant2', 'build', 1, 50, '2011-01-01', 'b', 'household');
INSERT INTO `historys` (`seq`, `plant`, `action`, `quantity`, `amount`, `stamp`, `model`, `line`) VALUES
('333333', 'plant3', 'build', 1, 50, '2012-01-01', 'c', 'household');
INSERT INTO `historys` (`seq`, `plant`, `action`, `quantity`, `amount`, `stamp`, `model`, `line`) VALUES
('444444', 'plant4', 'buy', 1, 50, '2013-01-01', 'm', 'butler');
INSERT INTO `historys` (`seq`, `plant`, `action`, `quantity`, `amount`, `stamp`, `model`, `line`) VALUES
('555555', 'plant5', 'buy', 1, 50, '2014-01-01', 'r', 'butler');
INSERT INTO `historys` (`seq`, `plant`, `action`, `quantity`, `amount`, `stamp`, `model`, `line`) VALUES
('666666', 'plant6', 'buy', 1, 50, '2015-01-01', 'w', 'companion');