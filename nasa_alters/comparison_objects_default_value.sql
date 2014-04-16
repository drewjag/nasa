/*
-- Query: SELECT * FROM asteroid.comparison_objects
LIMIT 0, 1000

-- Date: 2014-04-12 16:18

-- BASE Measurements for Mass kg, Volume l, Length m
*/

INSERT INTO nasa.comparison_objects (object_name, unit_of_measurement_fk, compare_type_fk, measurement_value, image_url) VALUES ('50" LCD TV',3,1,110.693,'http://www.avforums.com/attachments/main-jpg.304026/');
INSERT INTO nasa.comparison_objects (object_name, unit_of_measurement_fk, compare_type_fk, measurement_value, image_url) VALUES ('Endeavour',2,1,30.48,'http://images.hayneedle.com/mgen/master:FTH142.jpg');
INSERT INTO nasa.comparison_objects (object_name, unit_of_measurement_fk, compare_type_fk, measurement_value, image_url) VALUES ('2012 Honda Civic',3,1,444,'http://www.new-cars.com/2012/honda/2012-honda-civic.jpg');
INSERT INTO nasa.comparison_objects (object_name, unit_of_measurement_fk, compare_type_fk, measurement_value, image_url) VALUES ('Elephant',2,1,7.5,'https://twistedsifter.files.wordpress.com/2009/10/the-asian-elephant.jpg');
INSERT INTO nasa.comparison_objects (object_name, unit_of_measurement_fk, compare_type_fk, measurement_value, image_url) VALUES ('Eiffel Tower',2,1,324,'http://upload.wikimedia.org/wikipedia/commons/a/a8/Tour_Eiffel_Wikimedia_Commons.jpg');


INSERT INTO nasa.compare_measurement (compare_type_fk, unit_of_measurement_fk) VALUES (1,2);
INSERT INTO nasa.compare_measurement (compare_type_fk, unit_of_measurement_fk) VALUES (1,3);
INSERT INTO nasa.compare_measurement (compare_type_fk, unit_of_measurement_fk) VALUES (2,2);
INSERT INTO nasa.compare_measurement (compare_type_fk, unit_of_measurement_fk) VALUES (2,3);