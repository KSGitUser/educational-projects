USE `personnel_db`;

# 1. Создать VIEW на основе запросов, которые вы сделали в ДЗ к уроку 3.

#CREATE VIEW `average_salary` AS
#SELECT AVG(`salary`) AS 'Средняя зарплата', `department`.`name` AS 'Отдел' 
#	FROM `staff` LEFT JOIN `department` ON staff.department_id = department.id GROUP BY `department_id`;

#SELECT * FROM `average_salary`

#2. Создать функцию, которая найдет менеджера по имени и фамилии.

#Процедура

#delimiter //

#CREATE PROCEDURE `employee_name_surname` (`input_name` VARCHAR(25), `input_surname` VARCHAR(30))
#BEGIN
#	SELECT `name`, `lastname`, `salary`, `position` FROM `staff` 
#    WHERE `name` = `input_name` AND `lastname` = `input_surname`;
#END//

#delimiter ;

#CALL `employee_name_surname`('Светлана','Музыка'); 

#Функция

#CREATE FUNCTION `f_employee_name_surname` (`input_name` VARCHAR(25), `input_surname` VARCHAR(30))
#RETURNS INT
#DETERMINISTIC
#READS SQL DATA
#RETURN (SELECT `id` FROM `staff` 
#  WHERE `name` = `input_name` AND `lastname` = `input_surname`);
  
#SELECT `f_employee_name_surname`('Светлана','Музыка'); 

#3. Создать триггер, который при добавлении нового сотрудника будет выплачивать ему вступительный бонус, занося запись об этом в таблицу salary.

#CREATE TABLE `salary` (
#	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
#    `staff_id` INT(11),
#    `ammount` INT NOT NULL DEFAULT 0,
#    CONSTRAINT `fk_salary_staff` FOREIGN KEY `salary`(`staff_id`)
#		REFERENCES `staff`(`id`)
#        ON DELETE NO ACTION
#        ON UPDATE CASCADE);

#CREATE TRIGGER `recruit bonus`
#AFTER INSERT ON `staff`
#FOR EACH ROW
#INSERT INTO `salary` (`staff_id`, `ammount`) VALUES (NEW.`id`, 200);

#INSERT INTO `staff` (`name`, `lastname`, `department_id`, `salary`, `position`)
#	VALUES ('Егор','Бровкин',1,2500,'Программист');

#SELECT * FROM `staff`;
#SELECT * FROM `salary`;
  
