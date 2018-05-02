use lcatalog;
create table Users (id INT PRIMARY KEY AUTO_INCREMENT, firstname TEXT, lastname TEXT, password CHAR(64), username TEXT, email TEXT, apt INT);
create table Books (ID INT PRIMARY KEY AUTO_INCREMENT, Author VARCHAR(255), Title VARCHAR(255), Genre VARCHAR(255), Notes1 VARCHAR(255), Notes2 VARCHAR(255));
create table Requests (id INT PRIMARY KEY AUTO_INCREMENT, bookid INT, userid INT, date_out DATE);
create table ItemsOut (id INT PRIMARY KEY AUTO_INCREMENT, bookid INT, userid INT, date_out DATE, status INT);

