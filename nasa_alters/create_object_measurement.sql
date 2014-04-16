CREATE TABLE `nasa`.`unit_of_measurement` (
  `unit_of_measurement_pk` int(10) NOT NULL AUTO_INCREMENT,
  `measurement_type` varchar(45) NOT NULL,
  `unit_of_measurement` varchar(45) NOT NULL,
  `short_name_uofm` varchar(45) NOT NULL,
  `base_measurement_ratio` double NOT NULL,
  PRIMARY KEY (`unit_of_measurement_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nasa`.`compare_type` (
  `compare_type_pk` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`compare_type_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nasa`.`compare_measurement` (
  `compare_type_fk` int(10) NOT NULL AUTO_INCREMENT,
  `unit_of_measurement_fk` int(10) NOT NULL,
  CONSTRAINT `fk_compare_and_unit` FOREIGN KEY (`unit_of_measurement_fk`) REFERENCES `unit_of_measurement` (`unit_of_measurement_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compare_type_measurement` FOREIGN KEY (`compare_type_fk`) REFERENCES `compare_type` (`compare_type_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nasa`.`comparison_objects` (
  `comparison_object_pk` int(10) NOT NULL AUTO_INCREMENT,
  `object_name` varchar(255) NOT NULL,
  `unit_of_measurement_fk` int(10) NOT NULL,
  `measurement_value` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comparison_object_pk`),
  CONSTRAINT `fk_unit_of_measurement` FOREIGN KEY (`unit_of_measurement_fk`) REFERENCES `unit_of_measurement` (`unit_of_measurement_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
