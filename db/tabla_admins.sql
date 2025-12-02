-- 1. Crear la tabla
CREATE TABLE Admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

-- 2. Insertar los datos
INSERT INTO Admins (username, password) VALUES 
('Aaron', 'AaronElCrack'),
('Christian', '3cxDn'),
('Erick', '101005C');