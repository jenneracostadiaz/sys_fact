CREATE DATABASE sys_fact;
USE sys_fact;

CREATE TABLE roles (
	RolID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name Char(25) NOT NULL
);

CREATE TABLE companies (
	CompanieID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    RUC Char(11),
    Name Char(50) NOT NULL
);

CREATE TABLE users (
	UserID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Email VARCHAR(70) NOT NULL,
    Username VARCHAR(15) NOT NULL,
    Password char(40) NOT NULL,
    Name CHAR(50) NOT NULL,
    Phone CHAR(13)
);

CREATE TABLE SystRelations (
	RelationID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	UserID INT UNSIGNED NOT NULL,
    RolID INT UNSIGNED NOT NULL,
    CompanieID INT UNSIGNED NOT NULL,
    FOREIGN KEY (UserID) REFERENCES users(UserID),
    FOREIGN KEY (RolID) REFERENCES roles(RolID),
    FOREIGN KEY (CompanieID) REFERENCES companies(CompanieID)
);

DESCRIBE SystRelations;

INSERT INTO roles (Name)
VALUES
('Administrator'),
('Accountant'),
('Client');

SELECT * FROM roles;

INSERT INTO companies (RUC, Name)
VALUES
('10480788911', 'Jenner.pe'),
('20506454361', 'C & M INVESTMENTS S.A.C.'),
('20566524938', 'A&M Cars Service S.A.C.'),
('20601621933', 'SES Metales S.A.C.');

Describe companies;
SELECT * FROM companies;

INSERT INTO users (Username, Name, Email, Phone, Password)
VALUES
('Jenner', 'Jenner Acosta', 'my@jenner.pe', '+51 967037995', '123456'),
('Iriana','Iriana Vera', 'ivera@jenner.pe', '+51 994919465', '489156'),
('Walter','Walter Cobos', 'wcobos@lextop.pe', '+51 998559502', '687459'),
('Lextop','Contacto Lextop', 'contacto@lextop.pe', '', '687156'),
('Hans','Hans Sarmiento', 'hans.sarmiento@sesmetales.com', '+51 995990778', '387159'),
('Maritza','Maritza Chuco', 'mchuco@aymcars.pe', '+51 981501446', '784154');

Describe users;
SELECT * FROM users;

INSERT INTO systrelations (UserID, RolID, CompanieID)
VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 2),
(4, 3, 2),
(5, 3, 4),
(6, 3, 3);

Describe systrelations;
SELECT * FROM systrelations;

-- Creacion de Vistas

CREATE VIEW users_companires_rol AS
SELECT sys.UserID as UserID, u.Name, c.CompanieID, c.Name as Companie, r.Name as Rol
FROM  systrelations AS sys
inner join users AS u on sys.UserID = u.UserID
inner join roles AS r on sys.RolID = r.RolID
inner join companies AS c on sys.CompanieID = c.CompanieID
WHERE sys.UserID = u.UserID;

SELECT * FROM users_companires_rol;

-- Nuevas Consultas Relacionadas
SELECT sys.RelationID, u.Name
FROM systrelations AS sys, users AS u
WHERE sys.UserID = u.UserID;


-- Consulta Relacionada
SELECT sys.RelationID, u.Name, c.Name, r.Name
FROM systrelations AS sys, users AS u, roles AS r, companies AS c
WHERE sys.UserID = u.UserID
AND sys.RolID = r.RolID
AND sys.CompanieID = c.CompanieID;

-- inner Join
SELECT sys.RelationID, u.Name, c.Name, r.Name
FROM  systrelations AS sys
inner join users AS u on sys.UserID = u.UserID
inner join roles AS r on sys.RolID = r.RolID
inner join companies AS c on sys.CompanieID = c.CompanieID
WHERE sys.RolID between 2 and 3;


SELECT u.Name, u.Email, c.Name
FROM systrelations AS sys, users AS u, roles AS r, companies AS c
WHERE sys.UserID = u.UserID
AND sys.RolID = r.RolID
AND sys.CompanieID = c.CompanieID
AND c.CompanieID = 2;

SELECT u.Name, u.Email, c.Name
FROM systrelations AS sys, users AS u, roles AS r, companies AS c
WHERE sys.UserID = u.UserID
AND sys.RolID = r.RolID
AND sys.CompanieID = c.CompanieID
AND r.RolID = 3;