CREATE TABLE `r3gM3mb3rs` (
  `regMem_Type` varchar(25) DEFAULT NULL,
  `regMem_Aname` varchar(50) NOT NULL,
  `regMem_Name` varchar(50) NOT NULL,
  `regMem_E1` varchar(50) NOT NULL,
  `regMem_E2` varchar(50) NOT NULL,
  `regMem_Pw` varchar(175) NOT NULL,
  `regMem_Account` enum('A','NA') NOT NULL,
  `regMem_TaC` enum('Yes','No') DEFAULT NULL,
  `regMem_Month` varchar(4) NOT NULL,
  `regMem_Year` varchar(5) DEFAULT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `regMem_Salt` varchar(45) NOT NULL,
  `regMem_Day` varchar(3) DEFAULT NULL,
  `regMem_Group` int(11) DEFAULT NULL,
  `regMem_Alt_E` varchar(50) DEFAULT NULL,
  `regMem_Phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regMem_E1` (`regMem_E1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1