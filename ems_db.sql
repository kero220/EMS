CREATE table employees(
fname varchar(10) not null,
lname varchar (10)NOT NULL,
dept_id int,
CONSTRAINT emp_fk FOREIGN key (dept_id)  REFERENCES department(dept_id),  
username varchar (30)not null,
emp_id int  PRIMARY key AUTO_INCREMENT not null,
password varchar(255) not NULL,
CONSTRAINT pass_un UNIQUE(PASSWORD),
CONSTRAINT username_un UNIQUE(username),   
position varchar(10) not NULL,
branch_location varchar(20) not null,
hire_date date not null,
active_flag varchar(10)not null
);



CREATE table departments(
dept_name varchar(10)not null,
dept_id int PRIMARY KEY AUTO_INCREMENT not null,
emp_id int,    
FOREIGN key(emp_id)REFERENCES employees(emp_id));

alter table employees AUTO_INCREMENT=625802;


create table contact(
emp_id int,
CONSTRAINT cont_fk FOREIGN KEY(emp_id)REFERENCES employees(emp_id)on DELETE CASCADE,
phone varchar(11)  NOT null,   
e_mail varchar(30)not null,
CONSTRAINT cont_pri PRIMARY KEY(phone,emp_id,e_mail));


create table leaves(
leave_request varchar(500),
leave_type varchar(20),
leave_time time not null,
leave_id int PRIMARY key AUTO_INCREMENT NOT null,
leave_date   date not null,
leave_status varchar(10) not null,
emp_id int,
CONSTRAINT lea_fk FOREIGN key(emp_id) REFERENCES employees(emp_id) on DELETE CASCADE);


create table attendance(

attendance_time time not null,
attendance_id int PRIMARY key AUTO_INCREMENT NOT null,
attendance_date   date not null,

emp_id int,
CONSTRAINT att_fk FOREIGN key(emp_id) REFERENCES employees(emp_id) on DELETE CASCADE);


create table review(
review_time time not null,
review_id int PRIMARY key AUTO_INCREMENT NOT null,
reviewee_id int ,
reviewer_id int ,
review_date   date not null,
feedback LONGBLOB  ,


CONSTRAINT rev_fk FOREIGN key(reviewee_id) REFERENCES employees(emp_id) on DELETE CASCADE );


alter table employees add COLUMN manager_id int;
alter table employees add CONSTRAINT mang_fk FOREIGN key(manager_id)REFERENCES employees(emp_id);


create table salary(
salary_date date not null ,
salary_time time not null,
taxes int not null,
bonus int not null,
base_salary int not null,
salary_id int PRIMARY key AUTO_INCREMENT not null);



ALTER TABLE employees add column salary_id int;
alter table employees add CONSTRAINT FOREIGN KEY(salary_id)REFERENCES salary(salary_id);


SHOW CREATE TABLE employees;


INSERT into employees (fname,lname,hire_date,position,username,password,branch_location,dept_id) VALUES ("admin","admin",CURRENT_DATE(),"admin","ad_sys_007","240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9","cairo",2);

UPDATE `departments` SET `dept_name` = 'Administration' WHERE `departments`.`dept_id` = 2;


CREATE TABLE user_tokens
(
    token_id             INT AUTO_INCREMENT PRIMARY KEY,
    selector         VARCHAR(255) NOT NULL,
    hashed_validator VARCHAR(255) NOT NULL,
    emp_id          INT      NOT NULL,
    expire           DATETIME NOT NULL,
    
        FOREIGN KEY (emp_id)
            REFERENCES employees (emp_id) ON DELETE CASCADE
);
SET GLOBAL FOREIGN_KEY_CHECKS=0;
