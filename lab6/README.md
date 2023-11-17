# LAB 6: PHPMYADMIN, DATABASES, & BACKEND

### Team 16 (WebSyx)

            Description of Lab: Using phpMyAdmin, we are going to remake the LMS website.

- URL for [Team's Home Page for Lab 6](http://itws2110-websix.eastus.cloudapp.azure.com/iit/lab6/#)
- URL for [Team's GitHub Repository](https://github.com/RPI-ITWS/itws2110-team16)


## Website Creativity

- Clean and modern website definitely not a rip-off of LMS.

## Log of Commands Used in Part 2

1. Add address fields (street, city, state, zip) to the students table
```sql
ALTER TABLE `students` ADD `street` VARCHAR(100) NOT NULL AFTER `phone`, ADD `city` INT(20) NOT NULL AFTER `street`, ADD `state` VARCHAR(20) NOT NULL AFTER `city`, ADD `zip` INT(5) NOT NULL AFTER `state`;
```
2. Add section and year fields to the courses tabl
```sql
ALTER TABLE `courses` ADD `section` INT(2) NOT NULL AFTER `title`, ADD `year` INT(4) NOT NULL AFTER `section`;
```
3. CREATE a grades table containing id (int primary key, auto increment), crn (foreign key), RIN (foreign key), and grade (int 3 not null) (Don’t do this for part 3)
```sql
CREATE TABLE `grades`. ( `id` INT NOT NULL AUTO_INCREMENT , `crn` INT NOT NULL , `rin` INT(9) NOT NULL , `grade` INT(3) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
```
4. INSERT at least 4 courses into the courses table
```sql
INSERT INTO `courses` (`crn`, `prefix`, `number`, `title`) VALUES ('63146', 'ITWS', '2110', 'Web Systems Development'), ('64810', 'CSCI', '2500', 'Computer Organization'), ('64451', 'CSCI', '2200', 'Foundations Of Computer Science'), ('61472', 'MATH', '2010', 'Multivariable Calc & Matrix Algebra'), ('60349', 'PSYC', '1200', 'Intro To Psychological Science');
UPDATE `courses` SET `section` = '01', `year` = '2023' WHERE `courses`.`crn` = 60349
UPDATE `courses` SET `section` = '12', `year` = '2023' WHERE `courses`.`crn` = 61472
UPDATE `courses` SET `section` = '02', `year` = '2023' WHERE `courses`.`crn` = 63146
UPDATE `courses` SET `section` = '07', `year` = '2023' WHERE `courses`.`crn` = 64451
```
5. INSERT at least 4 students into the students table
```sql
INSERT INTO `students`(`rin`, `rcsid`, `firstname`, `lastname`, `alias`, `phone`, `street`, `city`, `state`, `zip`) VALUES ('662019991','greenr6','Rachel','Green','Rachel','917886042','W 57th St','New York',' NY','10019'), ('662012780','brucew2','Bruce','Wayne','Bruce','908565876','146 Montclair Ave','Montclair','NJ','07042'), ('662037568','dayj4','Jessica','Day','Jess','503123459','837 Traction Avenue','Los Angeles','CA','90013'), ('602031597','jiny5','Young-seo','Jin','Young-seo','510977803','2120 Grant St','Berkeley','CA ','94703')
```
6. ADD 10 grades into the grades table
```sql
INSERT INTO `grades`(`crn`, `rin`, `grade`) VALUES 
('61472','662019991','77'), 
('60349','662019991','91'), 
('63146','662019991','88'), 
('61472','662012780','94'), 
('64451','662012780','90'), 
('64451','662037568','98'), 
('60349','662037568','95'), 
('61472','662037568','96'), 
('60349','602031597','96'), 
('63146','602031597','93')
```
7. List all students in the following sequences; in lexicographical order by RIN, last name, RCSID, and first name. Remember that lexicographical order is determined by your collation.
```sql
SELECT * FROM `students` ORDER BY 'rin'
SELECT * FROM `students` ORDER BY 'lastname'
SELECT * FROM `students` ORDER BY 'rcsid'
SELECT * FROM `students` ORDER BY 'firstname'
```
8. List all students RIN, name, and address if their grade in any course was higher than a 90
```sql
SELECT s.rin, s.firstname, s.lastname, s.street, s.city, s.state, s.zip
FROM students s
JOIN grades g ON s.rin = g.rin
WHERE g.grade > 90;
```
9. List out the average grade in each course
```sql
SELECT crn, AVG(grade) AS average_grade
FROM grades
GROUP BY crn
```
10. List out the number of students in each course
```sql
SELECT crn, COUNT(rin) AS number_of_students
FROM grades
GROUP BY crn
```

### Issues We've Met
- Connecting and correctly selecting data from Db. This should be easy and trivia, but it's been too long since we've done it, so some time is spent on this. I(Felix)
specifically forgot how to use the WHERE statement, but figured it out eventually.
- Debugging the Archive Function. The function seems straightforward but has a lot of details to care about. This one also took a good while. 
- The JSON file contains only objects and no arrays, which is not an ideal data structure for the contents it's holding. We should be more careful about this next time.

### Citations:
- [MySQL WHERE](https://www.w3schools.com/sql/sql_where.asp)
- [PHP foreach](https://www.php.net/manual/en/control-structures.foreach.php)