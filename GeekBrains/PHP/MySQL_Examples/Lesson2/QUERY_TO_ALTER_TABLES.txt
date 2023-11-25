# USE `countries_cities`;
# ALTER TABLE countries RENAME TO _countries;
# ALTER TABLE _countries MODIFY id INT NOT NULL AUTO_INCREMENT;
# ALTER TABLE _countries CHANGE `name` `title`  VARCHAR(150) NOT NULL;
# CREATE INDEX title_idx ON _countries (title);

#SHOW INDEXES FROM _countries;

#ALTER TABLE _countries DROP INDEX `name_UNIQUE`;
#SHOW INDEXES FROM _countries;

#SHOW FULL COLUMNS FROM region;

#ALTER TABLE region RENAME TO _regions;
#ALTER TABLE _regions MODIFY id INT NOT NULL AUTO_INCREMENT;
#ALTER TABLE _regions CHANGE `name` `title` VARCHAR(150) NOT NULL;

#SHOW INDEXES FROM _regions;

#ALTER TABLE _regions DROP INDEX `name_UNIQUE`;
#CREATE INDEX title_idx ON _regions (`title`); 

#ALTER TABLE _regions
#	ADD FOREIGN KEY _regions(country_id)
#    REFERENCES _countries(id)
#    ON UPDATE CASCADE
#    ON DELETE RESTRICT;

#SHOW INDEXES FROM _regions;

# ALTER TABLE locality RENAME TO _cities;
# ALTER TABLE _cities MODIFY id INT NOT NULL AUTO_INCREMENT;
# ALTER TABLE _cities MODIFY country_id INT NOT NULL;
# ALTER TABLE _cities ADD COLUMN `important` TINYINT(1) NOT NULL AFTER `country_id`;
# ALTER TABLE _cities MODIFY region_id INT NOT NULL;
# ALTER TABLE _cities CHANGE `name` `title` VARCHAR(150) NOT NULL;
#ALTER TABLE _cities DROP COLUMN `area_id`;

#SHOW FULL COLUMNS FROM _cities;

#SHOW INDEXES FROM _cities;

#ALTER TABLE _cities 
#	ADD CONSTRAINT fk_cities_countries FOREIGN KEY _cities(country_id)
#	REFERENCES _countries(id)    
#	ON DELETE RESTRICT
#	ON UPDATE CASCADE;
    
#ALTER TABLE _cities 
#	ADD CONSTRAINT fk_cities_regions FOREIGN KEY _cities(region_id)
#	REFERENCES _regions(id)    
#	ON DELETE RESTRICT
#	ON UPDATE CASCADE;

#SHOW INDEXES FROM _cities;

#DROP TABLE `area`;

SHOW CREATE TABLE _cities;









