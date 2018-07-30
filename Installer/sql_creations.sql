use lcatalog;
create table Users (id INT PRIMARY KEY AUTO_INCREMENT, firstname TEXT, lastname TEXT, password CHAR(64), username TEXT, email TEXT, apt INT);
create table Books (ID INT PRIMARY KEY AUTO_INCREMENT, Author VARCHAR(255), Title VARCHAR(255), Genre VARCHAR(255), Notes1 VARCHAR(255), Notes2 VARCHAR(255));
create table Requests (id INT PRIMARY KEY AUTO_INCREMENT, bookid INT, userid INT, date_out DATE);
create table ItemsOut (id INT PRIMARY KEY AUTO_INCREMENT, bookid INT, userid INT, date_out DATE, date_due DATE, renewals_remaining INT, previous_renewal INT);
create table UsersPermissions(userid INT, admin BOOL, insertbooks BOOL);
create table UserActionHistory (actionid INT NOT NULL AUTO_INCREMENT, userid INT, action VARCHAR(25), actionitem TEXT, PRIMARY KEY (actionid))
