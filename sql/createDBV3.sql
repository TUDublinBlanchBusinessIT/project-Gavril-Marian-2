CREATE DATABASE IF NOT EXISTS aquaticCentre;
USE aquaticCentre;


CREATE TABLE membership_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type_name VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL
);

INSERT INTO membership_types (type_name, price) VALUES
('Adult', 40.00),
('Child', 25.00),
('Student', 30.00),
('Senior', 20.00);

CREATE TABLE aquaticCentre_v3 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    phone VARCHAR(30),
    age INT,
    membership_type_id INT,
    FOREIGN KEY (membership_type_id) REFERENCES membership_types(id)
);