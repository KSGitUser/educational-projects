#USE countries_cities;
# INSERT INTO `_regions` (`country_id`,`title`) VALUES (1, 'Московская область');
# SELECT * FROM `_regions`;
#ALTER TABLE `_cities` 
#	ALTER COLUMN `important` SET DEFAULT 0;
#INSERT INTO `_cities` (`country_id`, `region_id`, `title`) VALUES 
#	(1, 3, 'Химки'),
#	(1, 3, 'Королёв'),
#	(1, 3, 'Мытищи'),
#	(1, 3, 'Люберцы'),
#	(1, 3, 'Электросталь'),
#	(1, 3, 'Красногорск'),
#	(1, 3, 'Коломна'),
#	(1, 3, 'Одинцово'),
#	(1, 3, 'Серпухов'),
#	(1, 3, 'Щёлково'),
#	(1, 3, 'Орехово-Зуево'),
#	(1, 3, 'Домодедово'),
#	(1, 3, 'Раменское'),
#	(1, 3, 'Жуковский'),
#	(1, 3, 'Пушкино'),
#	(1, 3, 'Сергиев Посад'),
#	(1, 3, 'Долгопрудный');
#INSERT INTO `_cities`(`country_id`, `important`, `region_id`, `title`) VALUES (1,1,3, 'Москва');
#SELECT * FROM `_cities`;
#SELECT _countries.title, _regions.title, _cities.title 
#	FROM `_countries` 
#		LEFT JOIN `_regions` ON _countries.id = _regions.country_id 
#		LEFT JOIN _cities ON _regions.id = _cities.region_id;

#SELECT _countries.title, _regions.title, _cities.title 
#	FROM `_countries` 
#		LEFT JOIN `_regions` ON _countries.id = _regions.country_id 
#		LEFT JOIN _cities ON _regions.id = _cities.region_id 
#		WHERE _cities.region_id = (SELECT `id` FROM `_regions` WHERE `title` = 'Московская область');


        

