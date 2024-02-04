CREATE TABLE Hotel (
    Hotel_ID int  NOT NULL,
    Name varchar(100)  NOT NULL,
    Rate int  NOT NULL,
    YearOfBuild int  NOT NULL,
    CONSTRAINT Hotel_pk PRIMARY KEY (Hotel_ID)
);

CREATE TABLE Reservation (
    Reservation_ID int  NOT NULL,
    FK_Hotel_ID int  NOT NULL,
    FK_User_ID int  NOT NULL,
    DateBegin datetime  NOT NULL,
    DateEnd datetime  NOT NULL,
    CONSTRAINT Reservation_pk PRIMARY KEY (Reservation_ID)
);

CREATE TABLE User (
    User_ID int  NOT NULL,
    Fname varchar(40)  NOT NULL,
    Lname varchar(60)  NOT NULL,
    Login varchar(40)  NOT NULL,
    Password varchar(40)  NOT NULL,
    isAdmin bool  NOT NULL,
    CONSTRAINT User_pk PRIMARY KEY (User_ID)
);

ALTER TABLE Reservation ADD CONSTRAINT Reservation_Hotel FOREIGN KEY Reservation_Hotel (FK_Hotel_ID)
    REFERENCES Hotel (Hotel_ID);

ALTER TABLE Reservation ADD CONSTRAINT Reservation_User FOREIGN KEY Reservation_User (FK_User_ID)
    REFERENCES User (User_ID);

