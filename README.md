# 6to_Archivos_ProyectoFinal

Proyecto de Manejo de archivos, página web de administración de cursos denominada creatica, utilizando Mysql, php, y webhost como servidor web.

# Breve descripcion de cada archivo

* accionUsuario.php -> archivo de codigo php para ejecutar las distintas acciones que puede realizar un usuario, (editar, crear, eliminar y hacerse docente)
* conexionSql.php -> archivo que carga la conexion con las credenciales especificadas.
* error.php -> pagina de error que acepta un mensaje
* index.php -> login
* navBar.php -> archivo que contiene la navBar, aquí se agregan las opciones que pueda tener el usuario
* perfil.php -> pagina del perfil del usuario, también para visualizar la información de otros usuarios cuando se pueda acceder a esta.
* principalCursos.php -> pagina en la que se listan los cursos
* registroUsuario.php -> pagina en la que se muestra el formulario para crear y editar usuarios
* verificarLogueo.php -> archivo para verificar el logueo correctamente e iniciar la sesion con los datos corrrespondientes.
* area.php -> archivo que contiene el formulario para crear una nueva área
* cancelar-inscripcion -> archivo de codigo php para cancelar la inscripcion a un curso
* crea_curso.php -> archivo de codigo php para crear un curso nuevo
* eliminar_curso.php -> archivo de codigo php para eliminar un curso
* inscripcion.php -> archivo de codigo para inscribir un nuevo estudiante a un curso
* lista-cursos.php -> archivo en el que existe el codigo php/html para mostrar el listado de cursos
* modal-inscrito-php -> modal en el que se muestra si el estudiante se inscribió o si no lo hizo
* perfil-curso.php -> archivo php, en el que se muestra la información de un curso específico, ya sea para modificarlo (si se es docente) o bien inscribirse
* tarjeta-curso.php -> modelo para cada "curso" que se encuentre dentro del sistema para proceder a listarlo

# NOTAS

* Los triggers siguieron causandonos problemas, por lo tanto no se subieron al final, aunque se encuentran en el archivo .sql que contiene la última información que se hallaba presente en la base de datos subida a webhost, los procedimientos y funciones trabajan correctamente, adjunto el codigo de estas

## Procedimiento

CREATE DEFINER=`id14773500_user`@`%` PROCEDURE `area_con_curso` (IN `nombreArea` VARCHAR(100), IN `costoMinimo` DECIMAL(10,0), IN `fechaI` DATE, IN `fechaF` DATE, IN `idCurso` INT, IN `nombreCurso` VARCHAR(100))  BEGIN
    DECLARE idArea INT;
	INSERT INTO area(nombre) VALUES (nombreArea);
    SET idArea = (SELECT (MAX(id_area)+1) FROM area);
    INSERT INTO curso(id_curso,nombre,id_area,fecha_creacion,fecha_finalizacion,costo_minimo) VALUES (idCurso,nombreCurso,idArea,fechaI,fechaF,costoMinimo);
END$$

## Funcion

CREATE DEFINER=`id14773500_user`@`%` FUNCTION `calcularInscritos` (`id_curso` BIGINT) RETURNS INT(11) BEGIN 
    DECLARE filas INT; 
    SELECT COUNT(*) INTO filas FROM registro WHERE (registro.id_curso=id_curso and registro.finalizado=0); 
    RETURN filas; 
END$$

## Triggers

DELIMITER $$
CREATE TRIGGER `area_binsert` BEFORE INSERT ON `area` FOR EACH ROW BEGIN 
		SET NEW.nombre = UPPER(NEW.nombre); 
		SET @cantidad = (SELECT COUNT(*) FROM Area WHERE nombre = NEW.nombre); 
		IF @cantidad <> 0 THEN 
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'An error occurred'; 
		END IF; 
	END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `catedratico_binsert` BEFORE INSERT ON `catedratico` FOR EACH ROW BEGIN 
		SET @existeP = (SELECT COUNT(*) FROM catedratico WHERE id_persona = NEW.id_persona LIMIT 1); 
        SET @existeC = (SELECT COUNT(*) FROM curso WHERE id_curso = NEW.id_curso LIMIT 1); 
        IF @existeP <> 1 OR @existeC <> 1 THEN 
			SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'An error occurred'; 
        END IF; 
	END
$$
DELIMITER ;

# Desarrolladores

* Yefer Rodrigo Alvarado Tzul - 201731163
* Mario Moisés Ramírez Tobar - 201830007
* José Carlos Soberanis Ramírez - 201730246
