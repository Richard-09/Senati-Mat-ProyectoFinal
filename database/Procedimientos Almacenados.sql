USE senatimat;

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_listar()
BEGIN
		SELECT 	EST.idestudiante,
					EST.apellidos, EST.nombres,
					EST.tipodocumento, EST.nrodocumento,
					EST.fechanacimiento,
					ESC.escuela,
					CAR.carrera,
					SED.sede,
					EST.fotografia
			FROM estudiantes EST
			INNER JOIN carreras CAR ON CAR.idcarrera = EST.idcarrera
			INNER JOIN sedes SED ON SED.idsede = EST.idsede
			INNER JOIN escuelas ESC ON ESC.idescuela = CAR.idescuela
			WHERE EST.estado = '1';
END$$

DELIMITER $$
CREATE PROCEDURE spu_estudiantes_registrar
(
	IN _apellidos 		VARCHAR(40),
	IN _nombres			VARCHAR(40),
	IN _tipodocumento	CHAR(1),
	IN _nrodocumento	CHAR(8),
	IN _fechanacimiento DATE,
	IN _idcarrera		INT,
	IN _idsede			INT,
	IN _fotografia		VARCHAR(100)
)
BEGIN

	-- Validar el contenido de _fotografia
	IF _fotografia = '' THEN
		SET _fotografia = NULL;
	END IF;
	
	INSERT INTO estudiantes 
	(apellidos, nombres, tipodocumento, nrodocumento, fechanacimiento, idcarrera, idsede, fotografia) VALUES
	(_apellidos, _nombres, _tipodocumento, _nrodocumento, _fechanacimiento, _idcarrera, _idsede, _fotografia);
END$$

CALL spu_estudiantes_registrar('Prada', 'Teresa', 'C', '02345678', '2002-09-25', 3,2, '');
SELECT * FROM estudiantes;

-- PROCEDIMIENTO PARA LISTAR SEDES
DELIMITER $$
CREATE PROCEDURE spu_sedes_listar()
BEGIN
		SELECT * FROM sedes ORDER BY 2;
END$$



-- PROCEDIMIENTO PARA LISTAR ESCUELAS
DELIMITER $$
CREATE PROCEDURE spu_escuelas_listar()
BEGIN
		SELECT * FROM escuelas ORDER BY 2;
END$$


-- PROCEDIMIENTO PARA LISTAR CARRERAS
DELIMITER $$
CREATE PROCEDURE spu_carreras_listar(IN _idescuela INT)
BEGIN
		SELECT idcarrera, carrera
		FROM carreras 
		WHERE idescuela = _idescuela;
END$$
CALL spu_estudiantes_listar();

UPDATE estudiantes
	SET fotografia = NULL
	WHERE fotografia = 'unafoto.jpg' OR
			fotografia = '';


