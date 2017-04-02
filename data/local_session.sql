DROP TABLE IF EXISTS `local_session`;
CREATE TABLE `local_session` (
  `plant` varchar(20) NOT NULL,
  `token` varchar(6)  NOT NULL,
  `apikey` varchar(6)
);