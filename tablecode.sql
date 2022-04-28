CREATE DATABASE COSC4353DB;

CREATE TABLE UserCredentials (
    UserID int NOT NULL,
    UserPW VARCHAR(50) NOT NULL,
    PRIMARY KEY (UserID)
);

CREATE TABLE ClientInformation (
    FullName VARCHAR(50) NOT NULL,
    Address1 VARCHAR(100) NOT NULL,
    Address2 VARCHAR(100),
    City VARCHAR(100) NOT NULL,
    State VARCHAR(2) NOT NULL,
    Zipcode VARCHAR(9) NOT NULL,
    UserID int NOT NULL,
    PRIMARY KEY (Address1),
    FOREIGN KEY (UserID) REFERENCES UserCredentials(UserID)
);

CREATE TABLE FuelQuote (
    GallonsRequested DOUBLE NOT NULL,
    DeliveryAddress VARCHAR(100) NOT NULL,
    DeliveryDate DATE NOT NULL,
    PricePerGallon DOUBLE NOT NULL,
    Total DOUBLE NOT NULL,
    PRIMARY KEY (DeliveryAddress)
);
