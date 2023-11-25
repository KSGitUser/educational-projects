#USE `personnel_db`;
#SELECT * FROM `staff`;
#SET AUTOCOMMIT = 0;
#BEGIN;
#UPDATE `staff` SET `salary` = `salary` - 10000 WHERE `id` = 1;
#UPDATE `staff` SET `salary` = `salary` + 10000 WHERE `id` = 6;
#COMMIT;

#SELECT * FROM `staff`;

#BEGIN;
#SELECT @MIN_ID:=`id` FROM `staff` WHERE `salary` = (SELECT MIN(`salary`) FROM `staff` LIMIT 1);
#SELECT @MAX_ID:=`id` FROM `staff` WHERE `salary` = (SELECT MAX(`salary`) FROM `staff` LIMIT 1);
#UPDATE `staff` SET `salary` = `salary` - 5000 WHERE `id` =  @MAX_ID;
#UPDATE `staff` SET `salary` = `salary` + 5000 WHERE `id` =  @MIN_ID;
#COMMIT;

#SELECT * FROM `staff`;

#EXPLAIN `staff`;
#EXPLAIN SELECT @MIN_ID:=`id` FROM `staff` WHERE `salary` = (SELECT MIN(`salary`) FROM `staff` LIMIT 1); 

#+----+-------------+-------+------------+------+---------------+------+---------+------+------+----------+-------------+
#| id | select_type | table | partitions | type | possible_keys | key  | key_len | ref  | rows | filtered | Extra       |
#+----+-------------+-------+------------+------+---------------+------+---------+------+------+----------+-------------+
#|  1 | PRIMARY     | staff | NULL       | ALL  | NULL          | NULL | NULL    | NULL |    5 |    20.00 | Using where |
#|  2 | SUBQUERY    | staff | NULL       | ALL  | NULL          | NULL | NULL    | NULL |    5 |   100.00 | NULL        |
#+----+-------------+-------+------------+------+---------------+------+---------+------+------+----------+-------------+


#CREATE INDEX `idx_salary` ON `staff`(`salary`);
#EXPLAIN SELECT @MIN_ID:=`id` FROM `staff` WHERE `salary` = (SELECT MIN(`salary`) FROM `staff` LIMIT 1); 

#+----+-------------+-------+------------+------+---------------+------------+---------+-------+------+----------+------------------------------+
#| id | select_type | table | partitions | type | possible_keys | key        | key_len | ref   | rows | filtered | Extra                        |
#+----+-------------+-------+------------+------+---------------+------------+---------+-------+------+----------+------------------------------+
#|  1 | PRIMARY     | staff | NULL       | ref  | idx_salary    | idx_salary | 5       | const |    1 |   100.00 | Using where; Using index     |
#|  2 | SUBQUERY    | NULL  | NULL       | NULL | NULL          | NULL       | NULL    | NULL  | NULL |     NULL | Select tables optimized away |
#+----+-------------+-------+------------+------+---------------+------------+---------+-------+------+----------+------------------------------+


#EXPLAIN SELECT @MIN_ID:=`id` FROM `staff` ORDER BY `salary` LIMIT 1; 

#+----+-------------+-------+------------+-------+---------------+------------+---------+------+------+----------+-------------+
#| id | select_type | table | partitions | type  | possible_keys | key        | key_len | ref  | rows | filtered | Extra       |
#+----+-------------+-------+------------+-------+---------------+------------+---------+------+------+----------+-------------+
#|  1 | SIMPLE      | staff | NULL       | index | NULL          | idx_salary | 5       | NULL |    1 |   100.00 | Using index |
#+----+-------------+-------+------------+-------+---------------+------------+---------+------+------+----------+-------------+





