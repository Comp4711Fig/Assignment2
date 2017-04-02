
DROP TABLE IF EXISTS `parts`;
CREATE TABLE `parts` (
  `id` varchar(8) NOT NULL,
  `model` char(1) NOT NULL,
  `piece` int(1) NOT NULL,
  `plant` varchar(20) NOT NULL,
  `stamp` datetime NOT NULL,
  `line` varchar(20) NOT NULL
);


INSERT INTO `parts` (`id`, `model`, `piece`, `plant`, `stamp`, `line`) VALUES
('111111', 'a', 1, 'plant1', '2010-01-01', 'household');
INSERT INTO `parts` (`id`, `model`, `piece`, `plant`, `stamp`, `line`) VALUES
('222222', 'b', 2, 'plant2', '2011-01-01', 'household');
INSERT INTO `parts` (`id`, `model`, `piece`, `plant`, `stamp`, `line`) VALUES
('333333', 'c', 3, 'plant3', '2012-01-01', 'household');
INSERT INTO `parts` (`id`, `model`, `piece`, `plant`, `stamp`, `line`) VALUES
('444444', 'm', 1, 'plant4', '2013-01-01', 'butler');
INSERT INTO `parts` (`id`, `model`, `piece`, `plant`, `stamp`, `line`) VALUES
('555555', 'r', 2, 'plant5', '2014-01-01', 'butler');
INSERT INTO `parts` (`id`, `model`, `piece`, `plant`, `stamp`, `line`) VALUES
('666666', 'w', 3, 'plant6', '2015-01-01', 'companion');




/*DROP TABLE IF EXISTS `parts`;
CREATE TABLE `parts` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `partCode` char(2) NOT NULL,
  `caCode` int(3) NOT NULL,
  `plant` varchar(10) NOT NULL,
  `timeBuilt` datetime NOT NULL,
  `filename` varchar(256),
  PRIMARY KEY (id)
);


INSERT INTO `parts` (`partCode`, `caCode`, `plant`, `timeBuilt`, `filename`) VALUES
('a1', 111, 'Plant #12', '2010-01-01', 'a1.jpeg');
INSERT INTO `parts` (`partCode`, `caCode`, `plant`, `timeBuilt`, `filename`) VALUES
('b2', 222, 'Plant #22', '2011-01-01', 'b2.jpeg');
INSERT INTO `parts` (`partCode`, `caCode`, `plant`, `timeBuilt`, `filename`) VALUES
('c3', 333, 'Plant #32', '2012-01-01', 'c3.jpeg');
INSERT INTO `parts` (`partCode`, `caCode`, `plant`, `timeBuilt`, `filename`) VALUES
('m1', 444, 'Plant #42', '2013-01-01', 'm1.jpeg');
INSERT INTO `parts` (`partCode`, `caCode`, `plant`, `timeBuilt`, `filename`) VALUES
('r2', 555, 'Plant #52', '2014-01-01', 'r2.jpeg');
INSERT INTO `parts` (`partCode`, `caCode`, `plant`, `timeBuilt`, `filename`) VALUES
('w3', 666, 'Plant #62', '2015-01-01', 'w3.jpeg');*/

