CREATE TABLE `nasa`.`comparison_objects` (
  `comparison_object_pk` int(10) NOT NULL AUTO_INCREMENT,
  `object_name` varchar(255) NOT NULL,
  `measurement_map_fk` int(10) NOT NULL,
  `measurement_value` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comparison_object_pk`),
  KEY `fk_measurement_map_idx` (`measurement_map_fk`),
  CONSTRAINT `fk_measurement_map` FOREIGN KEY (`measurement_map_fk`) REFERENCES `measurement_map` (`messurement_map_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8


CREATE TABLE `nasa`.`comparison_objects` (
  `comparison_object_pk` int(10) NOT NULL AUTO_INCREMENT,
  `object_name` varchar(255) NOT NULL,
  `measurement_map_fk` int(10) NOT NULL,
  `measurement_value` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comparison_object_pk`),
  KEY `fk_measurement_map_idx` (`measurement_map_fk`),
  CONSTRAINT `fk_measurement_map` FOREIGN KEY (`measurement_map_fk`) REFERENCES `measurement_map` (`messurement_map_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8


CREATE TABLE `nasa`.`unit_of_measurement` (
  `unit_of_measurement_pk` int(10) NOT NULL AUTO_INCREMENT,
  `measurement_type` varchar(45) NOT NULL,
  `unit_of_measurement` varchar(45) NOT NULL,
  `short_name_uofm` varchar(45) NOT NULL,
  PRIMARY KEY (`unit_of_measurement_pk`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8


