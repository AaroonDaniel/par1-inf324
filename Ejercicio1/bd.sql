CREATE TABLE persona (
    ci INT PRIMARY KEY,            
    nombre VARCHAR(255),           
    paterno VARCHAR(255),
    materno VARCHAR(255),
    contraseña VARCHAR(200),
);

CREATE TABLE catastro (
    id INT PRIMARY KEY,      
    zona VARCHAR(255),                      
    x_inicial DECIMAL(10, 2),               
    y_inicial DECIMAL(10, 2),               
    x_final DECIMAL(10, 2),                 
    y_final DECIMAL(10, 2),                 
    superficie DECIMAL(10, 2),              
    distrito VARCHAR(255)
);


CREATE TABLE cat_per (  
    ci INT,            
    id INT,      
    CONSTRAINT fk_cat_per_persona FOREIGN KEY (ci) REFERENCES persona(ci),
    CONSTRAINT fk_cat_per_catastro FOREIGN KEY (id) REFERENCES catastro(id)
);


--para loguear



INSERT INTO persona (ci, nombre, paterno, materno, contraseña, rol) VALUES
(555555, 'Admin', 'ApellidoPaterno', 'ApellidoMaterno', '123456', 'admin'),
(112233, 'Jhonatan', 'Mendoza', 'Huanca', '112233', 'usuario'),
(122663, 'Miguel', 'Mendoza', 'Condori', '122663', 'usuario'),
(159632, 'Ismael', 'Mendoza', 'Cadena', '159632', 'usuario'),
(188251, 'Ana', 'Rodriguez', 'Torrez', '188251', 'usuario'),
(258141, 'Ester', 'Conde', 'Mendoza', '258141', 'usuario'),
(312541, 'Paola', 'Medina', 'Lopez', '312541', 'usuario');

id INT PRIMARY KEY,      
    zona VARCHAR(255),                      
    x_inicial DECIMAL(10, 2),               
    y_inicial DECIMAL(10, 2),               
    x_final DECIMAL(10, 2),                 
    y_final DECIMAL(10, 2),                 
    superficie DECIMAL(10, 2),              
    distrito VARCHAR(255)

INSERT INTO catastro (zona, x_inicial, y_inicial, x_final, y_final, superficie, distrito) VALUES
(1235, 'Zona Sur', -16.5235, -68.1235, -16.5225, -68.1225, 350.00, 'Distrito 19'),
(2002, 'Sopocachi', -16.4976, -68.1325, -16.4968, -68.1318, 280.00, 'Distrito 5'),
(3362, 'Miraflores', -16.5000, -68.1287, -16.4990, -68.1278, 200.00, 'Distrito 7'),
(1478, 'Achumani', -16.5200, -68.1055, -16.5190, -68.1048, 500.00, 'Distrito 18'),
(1236, 'Centro', -16.5035, -68.1355, -16.5025, -68.1345, 120.00, 'Distrito 12'),
(2369, 'San Pedro', -16.5085, -68.1412, -16.5075, -68.1402, 95.00, 'Distrito 10'),
(1225, 'Calacoto', -16.5285, -68.1125, -16.5275, -68.1115, 400.00, 'Distrito 19'),
(3321, 'Obrajes', -16.5250, -68.1140, -16.5240, -68.1130, 350.00, 'Distrito 15'),
(1259, 'Villa Fátima', -16.4835, -68.1212, -16.4825, -68.1202, 180.00, 'Distrito 9'),
(1010, 'Cota Cota', -16.5300, -68.1095, -16.5290, -68.1085, 220.00, 'Distrito 20');


-- Relacionar a Jhonatan con propiedades en Zona Sur y Sopocachi
INSERT INTO cat_per (ci, catastro_id) VALUES
(112233, 1235),  -- Jhonatan es propietario de la propiedad en Zona Sur
(112233, 2002);  -- Jhonatan también es propietario de la propiedad en Sopocachi

-- Relacionar a Miguel con propiedades en Miraflores y Achumani
INSERT INTO cat_per (ci, catastro_id) VALUES
(122663, 3362),  -- Miguel es propietario de la propiedad en Miraflores
(122663, 1478);  -- Miguel también es propietario de la propiedad en Achumani

-- Ismael es propietario de la propiedad en San Pedro
INSERT INTO cat_per (ci, catastro_id) VALUES
(159632, 2369);

-- Ana y Ester son copropietarias de la propiedad en el Centro
INSERT INTO cat_per (ci, catastro_id) VALUES
(188251, 1236),  -- Ana es copropietaria de la propiedad en el Centro
(258141, 1236);  -- Ester es copropietaria de la propiedad en el Centro

-- Paola es propietaria de la propiedad en Calacoto
INSERT INTO cat_per (ci, catastro_id) VALUES
(312541, 1225);

-- Relacionar a Ismael y Jhonatan con la propiedad en Obrajes
INSERT INTO cat_per (ci, catastro_id) VALUES
(159632, 3321),  -- Ismael es copropietario de la propiedad en Obrajes
(112233, 3321);  -- Jhonatan es copropietario de la propiedad en Obrajes

-- Miguel es propietario de la propiedad en Villa Fátima
INSERT INTO cat_per (ci, catastro_id) VALUES
(122663, 1259);

-- Ester es propietaria de la propiedad en Cota Cota
INSERT INTO cat_per (ci, catastro_id) VALUES
(258141, 1010);
