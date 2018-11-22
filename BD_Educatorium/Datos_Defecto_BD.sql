-- -----------------------------------------------------
-- Introduciendo los grados
-- -----------------------------------------------------
INSERT INTO Grado (Valor) VALUES (1);
INSERT INTO Grado (Valor) VALUES (2);
INSERT INTO Grado (Valor) VALUES (3);

-- -----------------------------------------------------
-- Introduciendo las Materias conforme a sus grados
-- -----------------------------------------------------
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Espa 1',1);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Mate 1',1);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Biolo',1);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Geogra',1);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Ingl 1',1);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('CyE 11',1);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Hist 11',1);

INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Espa 2',2);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Mate 2',2);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Fisica',2);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Ingl 2',2);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('CyE 12',2);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Hist 12',2);

INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Espa 3',3);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Mate 3',3);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Quimic',3);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Ingl 3',3);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('CyE 2',3);
INSERT INTO Materia (Nombre,Grado_ID) VALUES ('Hist 2',3);

-- -----------------------------------------------------
-- Introduciendo los tipos de escuelas
-- -----------------------------------------------------
INSERT INTO Tipo_Esc (TipoEscuela) VALUES ('Gen');
INSERT INTO Tipo_Esc (TipoEscuela) VALUES ('ParTra');
INSERT INTO Tipo_Esc (TipoEscuela) VALUES ('Tec');
INSERT INTO Tipo_Esc (TipoEscuela) VALUES ('Tele');

-- -----------------------------------------------------
-- Introduciendo los tipos de pregunta
-- -----------------------------------------------------
INSERT INTO Tipo_Pregunta (TipoPregunta) VALUES ('OpcMul');
INSERT INTO Tipo_Pregunta (TipoPregunta) VALUES ('RespMul');
INSERT INTO Tipo_Pregunta (TipoPregunta) VALUES ('RespBool');
INSERT INTO Tipo_Pregunta (TipoPregunta) VALUES ('ColRel');
INSERT INTO Tipo_Pregunta (TipoPregunta) VALUES ('OrdHist');
INSERT INTO Tipo_Pregunta (TipoPregunta) VALUES ('OpcList');
INSERT INTO Tipo_Pregunta (TipoPregunta) VALUES ('Linkert');

-- -----------------------------------------------------
-- Introduciendo los posibles estatus de las alternativas y respuestas
-- -----------------------------------------------------
INSERT INTO Estatus_Resp (Condicion) VALUES ('Correcto');
INSERT INTO Estatus_Resp (Condicion) VALUES ('Incorrecto');
INSERT INTO Estatus_Resp (Condicion) VALUES ('N/A');