CREATE TABLE clients_types(
   id_client_type INT AUTO_INCREMENT,
   clients_types_type VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_client_type)
);

CREATE TABLE contacts_types(
   id_contact_type INT AUTO_INCREMENT,
   contacts_types_type VARCHAR(50) ,
   PRIMARY KEY(id_contact_type)
);

CREATE TABLE users(
   id_client INT AUTO_INCREMENT,
   users_gender INT,
   users_lastname VARCHAR(30) ,
   users_firstname VARCHAR(30) ,
   users_email VARCHAR(320)  NOT NULL,
   users_phone_number CHAR(5) ,
   users_birthdate DATE,
   users_password VARCHAR(255) ,
   users_status INT,
   id_client_type INT NOT NULL,
   PRIMARY KEY(id_client),
   FOREIGN KEY(id_client_type) REFERENCES clients_types(id_client_type)
);

CREATE TABLE logs(
   id_log INT AUTO_INCREMENT,
   logs_date_log DATE,
   logs_url VARCHAR(500) ,
   PRIMARY KEY(id_log)
);

CREATE TABLE woods(
   id_wood INT AUTO_INCREMENT,
   woods_name VARCHAR(50)  NOT NULL,
   PRIMARY KEY(id_wood)
);

CREATE TABLE gifts(
   id_gift INT AUTO_INCREMENT,
   gifts_type VARCHAR(50) ,
   PRIMARY KEY(id_gift)
);

CREATE TABLE events(
   id_event INT AUTO_INCREMENT,
   events_name VARCHAR(100)  NOT NULL,
   events_description VARCHAR(1000)  NOT NULL,
   events_start_date DATE NOT NULL,
   events_end_date DATE NOT NULL,
   PRIMARY KEY(id_event)
);

CREATE TABLE carriers(
   id_carrier INT AUTO_INCREMENT,
   carriers_name VARCHAR(50)  NOT NULL,
   carriers_number VARCHAR(12) ,
   carriers_email VARCHAR(320) ,
   PRIMARY KEY(id_carrier)
);

CREATE TABLE carriers_prices(
   id_carriers_price INT AUTO_INCREMENT,
   carriers_prices_max_weight INT,
   carriers_prices_price DECIMAL(4,2)  ,
   PRIMARY KEY(id_carriers_price)
);

CREATE TABLE addresses_ships(
   id_adress_ship INT AUTO_INCREMENT,
   addresses_ship_address VARCHAR(50) ,
   addresses_ship_address_more VARCHAR(50) ,
   addresses_ship_postal_code VARCHAR(50) ,
   addresses_ship_city VARCHAR(50) ,
   addresses_ship_type INT,
   PRIMARY KEY(id_adress_ship)
);

CREATE TABLE products_categories(
   id_product_category INT AUTO_INCREMENT,
   category VARCHAR(50) ,
   PRIMARY KEY(id_product_category)
);

CREATE TABLE contacts_forms(
   id_contact_form INT AUTO_INCREMENT,
   contacts_form_message VARCHAR(500) ,
   id_client_type INT NOT NULL,
   PRIMARY KEY(id_contact_form),
   FOREIGN KEY(id_client_type) REFERENCES clients_types(id_client_type)
);

CREATE TABLE orders(
   id_order INT AUTO_INCREMENT,
   orders_order_date DATETIME NOT NULL,
   orders_weight INT,
   orders_price DECIMAL(4,2)  ,
   orders_payed INT,
   orders_delivered INT,
   id_gift INT,
   id_carrier INT NOT NULL,
   id_client INT NOT NULL,
   PRIMARY KEY(id_order),
   FOREIGN KEY(id_gift) REFERENCES gifts(id_gift),
   FOREIGN KEY(id_carrier) REFERENCES carriers(id_carrier),
   FOREIGN KEY(id_client) REFERENCES users(id_client)
);

CREATE TABLE products(
   id_product INT AUTO_INCREMENT,
   products_name VARCHAR(50) ,
   products_description VARCHAR(500) ,
   products_price INT NOT NULL,
   products_weight INT NOT NULL,
   id_product_category INT NOT NULL,
   id_wood INT NOT NULL,
   PRIMARY KEY(id_product),
   FOREIGN KEY(id_product_category) REFERENCES products_categories(id_product_category),
   FOREIGN KEY(id_wood) REFERENCES woods(id_wood)
);

CREATE TABLE lk_contact_form(
   id_contact_form INT,
   id_client INT,
   PRIMARY KEY(id_contact_form, id_client),
   FOREIGN KEY(id_contact_form) REFERENCES contacts_forms(id_contact_form),
   FOREIGN KEY(id_client) REFERENCES users(id_client)
);

CREATE TABLE lk_users_types(
   id_contact_type INT,
   id_client INT,
   PRIMARY KEY(id_contact_type, id_client),
   FOREIGN KEY(id_contact_type) REFERENCES contacts_types(id_contact_type),
   FOREIGN KEY(id_client) REFERENCES users(id_client)
);

CREATE TABLE lk_contacts_types(
   id_contact_form INT,
   id_contact_type INT,
   PRIMARY KEY(id_contact_form, id_contact_type),
   FOREIGN KEY(id_contact_form) REFERENCES contacts_forms(id_contact_form),
   FOREIGN KEY(id_contact_type) REFERENCES contacts_types(id_contact_type)
);

CREATE TABLE lk_logs_users(
   id_client INT,
   id_log INT,
   PRIMARY KEY(id_client, id_log),
   FOREIGN KEY(id_client) REFERENCES users(id_client),
   FOREIGN KEY(id_log) REFERENCES logs(id_log)
);

CREATE TABLE lk_products_orders(
   id_order INT,
   id_product INT,
   PRIMARY KEY(id_order, id_product),
   FOREIGN KEY(id_order) REFERENCES orders(id_order),
   FOREIGN KEY(id_product) REFERENCES products(id_product)
);

CREATE TABLE lk_events_products(
   id_product INT,
   id_event INT,
   PRIMARY KEY(id_product, id_event),
   FOREIGN KEY(id_product) REFERENCES products(id_product),
   FOREIGN KEY(id_event) REFERENCES events(id_event)
);

CREATE TABLE lk_carriers_prices(
   id_carrier INT,
   id_carriers_price INT,
   PRIMARY KEY(id_carrier, id_carriers_price),
   FOREIGN KEY(id_carrier) REFERENCES carriers(id_carrier),
   FOREIGN KEY(id_carriers_price) REFERENCES carriers_prices(id_carriers_price)
);

CREATE TABLE lk_adresses(
   id_client INT,
   id_adress_ship INT,
   PRIMARY KEY(id_client, id_adress_ship),
   FOREIGN KEY(id_client) REFERENCES users(id_client),
   FOREIGN KEY(id_adress_ship) REFERENCES addresses_ships(id_adress_ship)
);
