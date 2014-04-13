/*
-- Query: SELECT * FROM asteroid.unit_of_measurement
LIMIT 0, 1000

-- Date: 2014-04-12 16:18

-- BASE Measurements for Mass kg, Volume l, Length m
*/
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (1,'length','kilometer','km','1000');
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (2,'length','meter','m','1');
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (3,'length','centimeter','cm','0.01');
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (4,'mass','kilograms','kg','1000');
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (4,'mass','grams','g','1');
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (5,'volume','cubic kilometer','km3','1000000000000');
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (6,'volume','cubic meter','m3','1000');
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (7,'volume','cubic centimeter','cm3','0.001');
INSERT INTO `unit_of_measurement` (`unit_of_measurement_pk`,`measurement_type`,`unit_of_measurement`,`short_name_uofm`,`base_measurement_ratio`) VALUES (8,'currency','us dollar','$','1');
