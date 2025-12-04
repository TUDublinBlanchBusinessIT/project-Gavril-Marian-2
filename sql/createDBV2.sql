create database aquaticCentre;
use aquaticCentre;
create table aquaticCentre_v2 (
    id INT AUTO_INCREMENT,PRIMARY KEY(id)
    firstname VARCHAR(50),
    lastname VARCHAR(50),
    Phone VARCHAR(30),
    membersip_type VARCHAR(30),
    price DECIMAL(10,2),
    PRIMARY KEY(id)     
);