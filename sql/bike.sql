CREATE DATABASE bike;
USE bike;

CREATE TABLE clients (
   clientId INT AUTO_INCREMENT,
   name VARCHAR(50) NOT NULL,
   surname VARCHAR(50) NOT NULL,
   pwdHash VARCHAR(300) NOT NULL,
   phone VARCHAR(20),
   email VARCHAR(150) NOT NULL UNIQUE,
   birthdate DATE NOT NULL,
   PRIMARY KEY(clientId)
);

CREATE TABLE products (
   productId INT AUTO_INCREMENT,
   picture VARCHAR(50),
   productType VARCHAR(50),
   name VARCHAR(50),
   price DECIMAL(10, 2) NOT NULL,
   inventory INT,
   description TEXT,
   PRIMARY KEY(productId)
);


CREATE TABLE orders (
   orderId INT AUTO_INCREMENT,
   quantity INT NOT NULL,
   orderDate DATETIME DEFAULT CURRENT_TIMESTAMP,
   delivery_address VARCHAR(250) NOT NULL,
   delivery_country VARCHAR(50) NOT NULL,
   delivery_city VARCHAR(15) NOT NULL,
   delivery_zipcode VARCHAR(10) NOT NULL,
   orderStatus ENUM('En cours de traitement','Expédiée','Reçu','Annuler') DEFAULT 'En cours de traitement',
   productId INT NOT NULL,
   clientId INT NOT NULL,
   PRIMARY KEY(orderId),
   FOREIGN KEY(productId) REFERENCES products(productId),
   FOREIGN KEY(clientId) REFERENCES clients(clientId)
);

CREATE TABLE messages (
   message_id INT AUTO_INCREMENT PRIMARY KEY,
   customer_name VARCHAR(50) NOT NULL,
   customer_surname VARCHAR(50) NOT NULL,
   customer_email VARCHAR(250) NOT NULL,
   customer_message TEXT NOT NULL
);
