-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-11-2020 a las 17:30:22
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id14773500_creatica`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`id14773500_user`@`%` PROCEDURE `area_con_curso` (IN `nombreArea` VARCHAR(100), IN `costoMinimo` DECIMAL(10,0), IN `fechaI` DATE, IN `fechaF` DATE, IN `idCurso` INT, IN `nombreCurso` VARCHAR(100))  BEGIN
    DECLARE idArea INT;
	INSERT INTO area(nombre) VALUES (nombreArea);
    SET idArea = (SELECT (MAX(id_area)+1) FROM area);
    INSERT INTO curso(id_curso,nombre,id_area,fecha_creacion,fecha_finalizacion,costo_minimo) VALUES (idCurso,nombreCurso,idArea,fechaI,fechaF,costoMinimo);
END$$

--
-- Funciones
--
CREATE DEFINER=`id14773500_user`@`%` FUNCTION `calcularInscritos` (`id_curso` BIGINT) RETURNS INT(11) BEGIN 
    DECLARE filas INT; 
    SELECT COUNT(*) INTO filas FROM registro WHERE (registro.id_curso=id_curso and registro.finalizado=0); 
    RETURN filas; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` bigint(20) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `nombre`) VALUES
(6, 'ARTESANíA'),
(4, 'FíSICA GENERAL'),
(5, 'FíSICA GENERAL'),
(2, 'LENGUAJE'),
(3, 'MATEMáTICAS'),
(1, 'PROGRAMACION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedratico`
--

CREATE TABLE `catedratico` (
  `id_persona` bigint(20) NOT NULL,
  `id_curso` bigint(20) NOT NULL,
  `id_catedratico` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `catedratico`
--

INSERT INTO `catedratico` (`id_persona`, `id_curso`, `id_catedratico`) VALUES
(108, 6, 116),
(110, 7, 117);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `nombre` varchar(100) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `fecha_finalizacion` date DEFAULT NULL,
  `id_curso` bigint(20) NOT NULL,
  `id_area` bigint(20) DEFAULT NULL,
  `costo_minimo` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`nombre`, `fecha_creacion`, `fecha_finalizacion`, `id_curso`, `id_area`, `costo_minimo`) VALUES
('Pramacion en Java', '2020-10-30', '2020-11-28', 6, 1, 500),
('Artesanias de Barro', '2020-10-30', '2020-12-31', 7, 6, 650);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo_electronico` varchar(100) NOT NULL,
  `telefono` int(11) DEFAULT NULL,
  `cui` bigint(20) NOT NULL,
  `id_persona` bigint(20) NOT NULL,
  `password` varchar(15) NOT NULL DEFAULT 'soberanisputo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nombre`, `apellido`, `correo_electronico`, `telefono`, `cui`, `id_persona`, `password`) VALUES
('Daniel', 'Acevedo Jhong', 'acevedo_daniel@creatica.com', NULL, 3372415340516, 1, 'soberanisputo'),
('Miguel Vicente', 'Agurto Rondoy', 'agurto_miguel@creatica.com', NULL, 7038609994110, 2, 'soberanisputo'),
('Christian Nelson', 'Alcalá Negrón', 'alcala_christian@creatica.com', NULL, 9496436818412, 3, 'soberanisputo'),
('Raul Eduardo', 'Almora Hernandez', 'almora_raul@creatica.com', NULL, 5391176130144, 4, 'soberanisputo'),
('Jorge ', 'Alosilla Velazco Vera', 'alosilla_jorge@creatica.com', NULL, 9282415303905, 5, 'soberanisputo'),
('Victor', 'Alva Campos', 'alva_victor@creatica.com', NULL, 6391247254084, 6, 'soberanisputo'),
('Javier', 'Arevalo Lopez', 'arevalo_javier@creatica.com', NULL, 7574630984482, 7, 'soberanisputo'),
('Rosario', 'Arias Hernandez', 'arias_rosario@creatica.com', NULL, 3531590359746, 8, 'soberanisputo'),
('Efraín ', 'Arroyo Ramírez', 'arroyo_efrain@creatica.com', NULL, 7041449000580, 9, 'soberanisputo'),
('Marco Tulio', 'Alocen Barrera', 'alocen_marco@creatica.com', NULL, 6073375223894, 10, 'soberanisputo'),
('Cesar', 'Baiocchi Ureta', 'baiocchi_cesar@creatica.com', NULL, 9076382481609, 11, 'soberanisputo'),
('Isela Flor', 'Baylón Rojas', 'baylon_isela@creatica.com', NULL, 5068238630783, 12, 'soberanisputo'),
('Leoncia', 'Bedoya Castillo', 'bedoya_leoncia@creatica.com', NULL, 5594846302237, 13, 'soberanisputo'),
('Luz Marina', 'Bedregal Canales', 'bedregal_luz@creatica.com', NULL, 7016837165464, 14, 'soberanisputo'),
('Ramiro Alberto', 'Bejar Torres', 'bejar_ramiro@creatica.com', NULL, 3863393685875, 15, 'soberanisputo'),
('Javier', 'Benavides Espejo', 'benavides_javier@creatica.com', NULL, 3668990657122, 16, 'soberanisputo'),
('Nelson', 'Boza Solis', 'boza_nelson@creatica.com', NULL, 3521015443205, 17, 'soberanisputo'),
('Cielito Mercedes', 'Calle Betancourt', 'calle_cielito@creatica.com', NULL, 3689814561086, 18, 'soberanisputo'),
('Isabel Florisa', 'Caraza Villegas', 'caraza_isabel@creatica.com', NULL, 6897007008388, 19, 'soberanisputo'),
('Gizella', 'Carrera Abanto', 'carrera_gizella@creatica.com', NULL, 9072461814706, 20, 'soberanisputo'),
('Estalins', 'Carrillo Segura', 'carrillo_estalins@creatica.com', NULL, 3179213412889, 21, 'soberanisputo'),
('Jorge Augusto', 'Carrión Neira', 'carrion_jorge@creatica.com', NULL, 9274915122958, 22, 'soberanisputo'),
('Guillermo ', 'Casapia Valdivia', 'casapia_guillermo@creatica.com', NULL, 4625700953714, 23, 'soberanisputo'),
('Zarita', 'Chancos Mendoza', 'chancos_zarita@creatica.com', NULL, 2151114154606, 24, 'soberanisputo'),
('Carlos', 'Chirinos Lacotera', 'chirinos_carlos@creatica.com', NULL, 7650967515349, 25, 'soberanisputo'),
('Doris', 'Cores Moreno', 'cores_doris@creatica.com', NULL, 6722354688512, 26, 'soberanisputo'),
('Maribel Corina', 'Cortez Lozano', 'cortez_maribel@creatica.com', NULL, 2605793334285, 27, 'soberanisputo'),
('Angel', 'Crispin Quispe', 'crispin_angel@creatica.com', NULL, 4669225693331, 28, 'soberanisputo'),
('Antonio ', 'De Loayza Conterno', 'de_antonio@creatica.com', NULL, 2833089743322, 29, 'soberanisputo'),
('Ana Maria', 'Diaz Salinas', 'diaz_ana@creatica.com', NULL, 7500241825706, 30, 'soberanisputo'),
('Antonio ', 'Dueñas Aristisabal', 'duenias_antonio@creatica.com', NULL, 6605878284299, 31, 'soberanisputo'),
('Yuliana', 'Espinoza Arana', 'espinoza_yuliana@creatica.com', NULL, 5553012505851, 32, 'soberanisputo'),
('Carlos Enrique', 'Fernandez Guzman', 'fernandez_carlos@creatica.com', NULL, 681470068139, 33, 'soberanisputo'),
('Esther Aurora', 'Fernandez Matta', 'fernandez_esther@creatica.com', NULL, 871614795719, 34, 'soberanisputo'),
('Olga', 'Ferro Salas', 'ferro_olga@creatica.com', NULL, 3404958457541, 35, 'soberanisputo'),
('Edwin', 'Flores Romero', 'flores_edwin@creatica.com', NULL, 6471693170895, 36, 'soberanisputo'),
('Roberto', 'Gamarra Astete', 'gamarra_roberto@creatica.com', NULL, 8173768622014, 37, 'soberanisputo'),
('Gloria', 'Gamio Lozano', 'gamio_gloria@creatica.com', NULL, 8442166784712, 38, 'soberanisputo'),
('Miriam', 'García Peralta', 'garcia_miriam@creatica.com', NULL, 3018746888680, 39, 'soberanisputo'),
('Arturo', 'Gonzales Del Valle Maguiño', 'gonzales_arturo@creatica.com', NULL, 8185573448033, 40, 'soberanisputo'),
('Marlene Victoria', 'Gonzales Huilca', 'gonzales_marlene@creatica.com', NULL, 2150731489492, 41, 'soberanisputo'),
('Elsa Patricia', 'Gonzales Medina', 'gonzales_elsa@creatica.com', NULL, 6468502716198, 42, 'soberanisputo'),
('Javier', 'Gutierrez Velez', 'gutierrez_javier@creatica.com', NULL, 9836173486069, 43, 'soberanisputo'),
('Elena Rosavelt', 'Guzman Chinag', 'guzman_elena@creatica.com', NULL, 8752839213671, 44, 'soberanisputo'),
('Clara', 'Guzman Quispe', 'guzman_clara@creatica.com', NULL, 9997468124086, 45, 'soberanisputo'),
('Milagros Susan ', 'Herrera Carbajal', 'herrera_milagros@creatica.com', NULL, 8275978544497, 46, 'soberanisputo'),
('Guillermo', 'Horruitiner Martinez', 'horruitiner_guillermo@creatica.com', NULL, 3053940437178, 47, 'soberanisputo'),
('Lourdes', 'Huamani Flores', 'huamani_lourdes@creatica.com', NULL, 5393131423720, 48, 'soberanisputo'),
('Luis Armando', 'Huapaya Raygada', 'huapaya_luis@creatica.com', NULL, 6427189110395, 49, 'soberanisputo'),
('Marcos', 'Huarcaya Quispe', 'huarcaya_marcos@creatica.com', NULL, 7530374215063, 50, 'soberanisputo'),
('Walter David', 'Huaytan Sauñe', 'huaytan_walter@creatica.com', NULL, 1278666607729, 51, 'soberanisputo'),
('Elba Mercedes ', 'La Rosa Fabian', 'larosa_elba@creatica.com', NULL, 1658516420784, 52, 'soberanisputo'),
('Pedro Guillermo', 'Landa Ginocchio', 'landa_pedro@creatica.com', NULL, 5803669801610, 53, 'soberanisputo'),
('Roberto Julian', 'Llaja Tafur', 'llaja_roberto@creatica.com', NULL, 6563657749682, 54, 'soberanisputo'),
('Orfelina', 'Llenpen Nuñez', 'llenpen_orfelina@creatica.com', NULL, 7954638523531, 55, 'soberanisputo'),
('Hector', 'Lujan Venegas', 'lujan_hector@creatica.com', NULL, 362312411735, 56, 'soberanisputo'),
('Gissela', 'Maguiña San Yen Man', 'maguinia_gissela@creatica.com', NULL, 5557416756897, 57, 'soberanisputo'),
('Cosme Adolfo', 'Maldonado Quispe', 'maldonado_cosme@creatica.com', NULL, 6946571445307, 58, 'soberanisputo'),
('Sandra Monica', 'Maldonado Tinco', 'maldonado_sandra@creatica.com', NULL, 3480796740167, 59, 'soberanisputo'),
('Jenny Maria', 'Mallqui Celestino', 'mallqui_jenny@creatica.com', NULL, 2875242732493, 60, 'soberanisputo'),
('Santiago', 'Mamani Uchasara', 'mamani_santiago@creatica.com', NULL, 421016627853, 61, 'soberanisputo'),
('Magda Janeth', 'Maravi Navarro', 'maravi_magda@creatica.com', NULL, 5404905018255, 62, 'soberanisputo'),
('Martin', 'Martinez Marquez', 'martinez_martin@creatica.com', NULL, 6685617311292, 63, 'soberanisputo'),
('Oscar Enrique', 'Medina Zuta', 'medina_oscar@creatica.com', NULL, 1365166556870, 64, 'soberanisputo'),
('Carlos P', 'Melgarejo Vibes', 'melgarejo_carlos@creatica.com', NULL, 2860599570606, 65, 'soberanisputo'),
('Elizabeth', 'Miguel Holgado', 'miguel_elizabeth@creatica.com', NULL, 215451673077, 66, 'soberanisputo'),
('Manuel Antonio', 'Mori Ramirez', 'mori_manuel@creatica.com', NULL, 6129111902770, 67, 'soberanisputo'),
('Carlos Alberto', 'Nuñez Huayanay', 'nuniez_carlos@creatica.com', NULL, 6303147530259, 68, 'soberanisputo'),
('Olga', 'Ore Reyes', 'ore_olga@creatica.com', NULL, 4880451563091, 69, 'soberanisputo'),
('Josue', 'Orrillo Ortiz', 'orrillo_josue@creatica.com', NULL, 6674790089252, 70, 'soberanisputo'),
('Josué Victor', 'Orrillo Ortiz', 'orrillo_josue@creatica.com', NULL, 9753459238618, 71, 'soberanisputo'),
('Carmen Rosa', 'Pardave Camacho', 'pardave_carmen@creatica.com', NULL, 5089856623975, 72, 'soberanisputo'),
('Santiago Victor', 'Paredes Jaramillo', 'paredes_santiago@creatica.com', NULL, 515728537050, 73, 'soberanisputo'),
('Arturo', 'Pastor Porras', 'pastor_arturo@creatica.com', NULL, 4739339071037, 74, 'soberanisputo'),
('Enrique', 'Pinedo Nuñez', 'pinedo_enrique@creatica.com', NULL, 2227696003978, 75, 'soberanisputo'),
('Sonia', 'Prada Vilchez', 'prada_sonia@creatica.com', NULL, 1021164012060, 76, 'soberanisputo'),
('Gerardo David', 'Riega Calle', 'riega_gerardo@creatica.com', NULL, 24327227088, 77, 'soberanisputo'),
('Freddy', 'Rios Lima', 'rios_freddy@creatica.com', NULL, 1557924025291, 78, 'soberanisputo'),
('Teresa', 'Rios Lima', 'rios_teresa@creatica.com', NULL, 5569659431650, 79, 'soberanisputo'),
('Juan Elvis', 'Riquelme Miranda', 'riquelme_juan@creatica.com', NULL, 1576975825084, 80, 'soberanisputo'),
('Georgina Esperanza', 'Roa Yanac', 'roa_georgina@creatica.com', NULL, 3855533561519, 81, 'soberanisputo'),
('Rosa Liliana', 'Robles Valverde', 'robles_rosa@creatica.com', NULL, 2695726439014, 82, 'soberanisputo'),
('Rosa Josefa', 'Rodriguez Farias', 'rodriguez_rosa@creatica.com', NULL, 4540839440384, 83, 'soberanisputo'),
('Maria De Fatima', 'Rojas Valdivia', 'rojas_maria@creatica.com', NULL, 9529220184209, 84, 'soberanisputo'),
('Rosa Maria', 'Romero Gomez Sanchez', 'romero_rosa@creatica.com', NULL, 1518741835842, 85, 'soberanisputo'),
('Carina Magnolia', 'Rosales Flores', 'rosales_carina@creatica.com', NULL, 5298435535292, 86, 'soberanisputo'),
('Carlos Jose', 'Rosas Bonifaz', 'rosas_carlos@creatica.com', NULL, 1830357819911, 87, 'soberanisputo'),
('Aida Cristina', 'Ruiz De Castilla Britto', 'ruiz_aida@creatica.com', NULL, 1102382414546, 88, 'soberanisputo'),
('Celin', 'Salcedo Del Pino', 'salcedo_celin@creatica.com', NULL, 3161136852680, 89, 'soberanisputo'),
('Violeta Marilu', 'Salinas Puccio', 'salinas_violeta@creatica.com', NULL, 4853567829914, 90, 'soberanisputo'),
('Augusto', 'Sanchez Arone', 'sanchez_augusto@creatica.com', NULL, 6457690832685, 91, 'soberanisputo'),
('Pedro Manuel', 'Santa Cruz Benssa', 'santa_pedro@creatica.com', NULL, 134158377284, 92, 'soberanisputo'),
('Angel', 'Solano Vargas', 'solano_angel@creatica.com', NULL, 1088110713739, 93, 'soberanisputo'),
('Jose Alberto', 'Tejedo Luna', 'tejedo_jose@creatica.com', NULL, 1339710995837, 94, 'soberanisputo'),
('Angel ', 'Tenorio Davila', 'tenorio_angel@creatica.com', NULL, 1168886225847, 95, 'soberanisputo'),
('Miguel Angel ', 'Torres Gaspar', 'torres_miguel@creatica.com', NULL, 154856201638, 96, 'soberanisputo'),
('Jacquelin', 'Trujillo Parodi', 'trujillo_jacquelin@creatica.com', NULL, 1188166081869, 97, 'soberanisputo'),
('Ruth Noricila', 'Vega Carreazo', 'vega_ruth@creatica.com', NULL, 139239078113, 98, 'soberanisputo'),
('Guillermo Jonathan', 'Velasquez Ramos', 'velasquez_guillermo@creatica.com', NULL, 2035567157377, 99, 'soberanisputo'),
('Alejandro', 'Vera Silva', 'vera_alejandro@creatica.com', NULL, 7556878876636, 100, 'soberanisputo'),
('Blanca Katty', 'Vilca Lucero', 'vilca_blanca@creatica.com', NULL, 4563530624023, 101, 'soberanisputo'),
('Enrique Godofredo', 'Vilgoso Alvarado', 'vilgoso_enrique@creatica.com', NULL, 882117535684, 102, 'soberanisputo'),
('Cecilia', 'Yamawaki Onaga', 'yamawaki_cecilia@creatica.com', NULL, 5409043385532, 103, 'soberanisputo'),
('Mariela Milagros', 'Zamalloa Vega', 'zamalloa_mariela@creatica.com', NULL, 1630385899336, 104, 'soberanisputo'),
('Monica ', 'Zapata Chang', 'zapata_monica@creatica.com', NULL, 5114305162889, 105, 'soberanisputo'),
('Juan Carlos', 'Zegarra Salcedo', 'zegarra_juan@creatica.com', NULL, 5040960274960, 106, 'soberanisputo'),
('Hilrich Mariela', 'Zu Flores', 'zu_hilrich@creatica.com', NULL, 9771796209885, 107, 'soberanisputo'),
('Yefer', 'Alvarado', 'yeferal7@gmail.com', 11223344, 123456789, 108, '12345678'),
('Soberanis', 'Mario Puto', 'soberanis@crearica.com', 87987898, 42123546813, 109, '1234578'),
('Mario Moisés', 'Ramírez', 'mario@creatica.com', 88888888, 21345678945, 110, 'mmrt'),
('Jose Carlos', 'Soberanis Ramirez', 'jcsru13@gmail.com', 41422251, 2973852161001, 111, 'JOSECARLOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id_persona` bigint(20) NOT NULL,
  `id_curso` bigint(20) NOT NULL,
  `id_registro` bigint(20) NOT NULL,
  `finalizado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id_persona`, `id_curso`, `id_registro`, `finalizado`) VALUES
(110, 6, 6, 1),
(108, 7, 7, 1),
(108, 7, 8, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `IDX_AREA_NOMBRE` (`nombre`);

--
-- Indices de la tabla `catedratico`
--
ALTER TABLE `catedratico`
  ADD PRIMARY KEY (`id_catedratico`),
  ADD KEY `FK_IDPERSONA_PERSONAC` (`id_persona`),
  ADD KEY `FK_IDCURSO_CURSOC` (`id_curso`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `FK_IDAREA_AREA` (`id_area`),
  ADD KEY `IDX_CURSO_ID` (`id_curso`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `IDX_PERSOSNA_CUI` (`cui`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id_registro`),
  ADD KEY `FK_IDCURSO_CURSO` (`id_curso`),
  ADD KEY `IDX_REGISTRO_PERSONA` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `catedratico`
--
ALTER TABLE `catedratico`
  MODIFY `id_catedratico` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id_registro` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catedratico`
--
ALTER TABLE `catedratico`
  ADD CONSTRAINT `FK_IDCURSO_CURSOC` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `FK_IDPERSONA_PERSONAC` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `FK_IDAREA_AREA` FOREIGN KEY (`id_area`) REFERENCES `area` (`id_area`);

--
-- Filtros para la tabla `registro`
--
ALTER TABLE `registro`
  ADD CONSTRAINT `FK_IDCURSO_CURSO` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `FK_IDPERSONA_PERSONA` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
