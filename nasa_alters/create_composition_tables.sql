CREATE TABLE `nasa`.`element` (
  `element_pk` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`element_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nasa`.`spec_type_group` (
  `spec_type_group_pk` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `element_fk` int(10) NOT NULL,
  PRIMARY KEY (`spec_type_group_pk`),
  CONSTRAINT `fk_element` FOREIGN KEY (`element_fk`) REFERENCES `element` (`element_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `nasa`.`object_composition` (
  `object_composition_pk` int(10) NOT NULL AUTO_INCREMENT,
  `comparison_object_fk` int(10) NOT NULL,
  `element_fk` int(10) NOT NULL,
  PRIMARY KEY (`object_composition_pk`),
  CONSTRAINT `fk_comparison_object` FOREIGN KEY (`comparison_object_fk`) REFERENCES `comparison_objects` (`comparison_object_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_element_object` FOREIGN KEY (`element_fk`) REFERENCES `element` (`element_pk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `compare_measurement` (`compare_type_fk`, `unit_of_measurement_fk`) VALUES
(3, 6),
(3, 7),
(3, 8);

UPDATE `asteroid` SET spec_group_type= 1 WHERE `spec_type_smassi` IN ('A','Q','R','K','L','S','Sa', 'Sq', 'Sr', 'Sk', 'Sl') OR `spec_type_tholen` IN ('A','Q','R','K','L','S','Sa', 'Sq', 'Sr', 'Sk', 'Sl');






