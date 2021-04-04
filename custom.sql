CREATE DATABASE company;

CREATE TABLE employee (
	id int(11) NOT NULL AUTO_INCREMENT,
    name varchar(100),
    email varchar(60),
    number varchar(15),
    password varchar(100) NOT NULL,
    date_of_birth date,
    status tinyint(1) NOT NULL DEFAULT 1,
    is_deleted tinyint(1) NOT NULL DEFAULT 0,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(id)
)