DROP TABLE IF EXISTS `local_session`;
CREATE TABLE `local_session` (
  `plant` varchar(20) NOT NULL,
  `token` varchar(6)  NOT NULL,
  `apikey` varchar(6),
  `spent` decimal(6,0) NOT NULL,
  `earned` decimal(6,0) NOT NULL
);