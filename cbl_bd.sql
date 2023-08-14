-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 14-07-2023 a las 04:37:18
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cbl_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `idDocente` int NOT NULL,
  `Cedula` varchar(45) DEFAULT NULL,
  `PNombre` varchar(45) DEFAULT NULL,
  `SNombre` varchar(45) DEFAULT NULL,
  `PApellido` varchar(45) DEFAULT NULL,
  `SApellido` varchar(45) DEFAULT NULL,
  `Celular` int DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`idDocente`, `Cedula`, `PNombre`, `SNombre`, `PApellido`, `SApellido`, `Celular`, `Correo`) VALUES
(1, '449-121198-1002N', 'ABELL', 'RAFAEL', 'MATAMOROZ', 'MEZA', 78496447, 'amatamoromeza@yahoo.com'),
(2, '281-080172-0023U', 'BISMARCK', 'AIR', 'ESPINOZA', 'ROJAS', 82882475, 'bismarckair@cbl.edu.ni'),
(3, '001-191189-0045W', 'MARLON', 'ANTONIO', 'RAMIREZ', 'QUIROZ', 82723588, 'marqz20@gmail.com'),
(4, '001-171192-0036Q', 'MIRIAN', 'VALESKA', 'RIVERA', 'DURAN', 75016624, ''),
(5, '001-051070-0030K', 'GEOVANIA', '', 'HURTADO', 'ESTRADA', 83843488, 'hurtado70@gmail.com'),
(6, '001-301073-0008K', 'LUZ', 'AZUCENA', 'CANO', 'HUERTA', 57060656, 'luzcano150@gmail.com'),
(7, '001-050386-0004U', 'ENGEL', 'ALEXANDER', 'LÓPEZ', 'CUADRA', 85449781, 'engelopez86@gmail.com'),
(8, '001-250968-0009V', 'RICARDO', 'JOSÉ', 'HERNÁNDEZ', 'SANDOVAL', 83737073, 'docentebautista@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidad` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Docente_idDocente` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidad`, `Descripcion`, `Docente_idDocente`) VALUES
('1', 'Lic.Ingles', 1),
('2', 'Normalista', 2),
('3', 'Fisico Matematico', 3),
('4', 'MEP', 4),
('5', 'MEP', 5),
('6', 'NEP', 6),
('7', 'Lic. Matematica', 7),
('8', 'Lic. Hisoria', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `idEstudiante` int NOT NULL,
  `PNombre` varchar(45) DEFAULT NULL,
  `SNombre` varchar(45) DEFAULT NULL,
  `PApellido` varchar(45) DEFAULT NULL,
  `SApellido` varchar(45) DEFAULT NULL,
  `Edad` int DEFAULT NULL,
  `Fechanacimiento` date DEFAULT NULL,
  `CodigoEstudiante` varchar(45) DEFAULT NULL,
  `Direccion` varchar(90) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Sexo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `PNombre`, `SNombre`, `PApellido`, `SApellido`, `Edad`, `Fechanacimiento`, `CodigoEstudiante`, `Direccion`, `Telefono`, `Sexo`) VALUES
(3, 'ABRIL', 'ANGELICA', 'FERRUFINO', 'PEREZ', 6, '2016-12-16', 'AAFP-161216-6004108', 'SANDINO ENTRADA LAS COLINAS 4 AL SUR', 0, 'F'),
(4, 'ALEXA', 'SAMARA', 'RAMIREZ', 'LAGO', 6, '2016-08-26', 'ASRL-260816-6372102', 'GRENADA DE LA D. MAGICA 3C. ABAJO 1/2 AL LAGO', 0, 'F'),
(5, 'ALEXIS', 'ANTONIO', 'ARGUELLO', 'DIAZ', 8, '2014-12-12', 'AAAD-121214-5632809', 'BARRIO 18 DE MAYO, WALTER FERRETI 3ABAJO', 0, 'M'),
(6, 'ANDREA', 'CAROLINA', 'QUINTANILLA', 'DAVILA', 8, '2015-06-05', 'ACQD-060215-5859751', 'HOSP. MANOLO MORALES 1/2C. AL SUR', 0, 'F'),
(7, 'ADRIANA', 'NICOLE', 'CALERO', 'GARCIA', 9, '2014-01-07', 'ANCG-070114-5590383', 'HOSPITAL MANOLO MORALES 11/2 CUADRA AL ESTE ', 0, 'F'),
(8, 'ANTHONY', 'ALEXANDER', 'CASTILLO', 'ALVARADO', 11, '2011-07-18', 'AACA-1872011-4069751', 'DEL TALLER DE MOTOS 2 1/2C ARRIBA', 0, 'M'),
(9, 'ABNER', 'JOSUE', 'RAUDEZ', 'LEAL', 12, '2011-04-28', 'AJRL-280411-3295729', 'DDF EL C/S 4 ARRIBA 2 AL SUR Y 1/2 ARRIBA', 7, 'M'),
(10, 'ALEJANDRO', 'ISRAEL', 'MURILLO', 'CARRION', 14, '2009-01-05', 'AIMC-241209-1344847', 'DE LA ESCUELA INDEPENDENCIA 1C AL ESTE', 8, 'M'),
(12, 'ALEX', 'ISRAEL', 'RAMOS', 'CALDERON', 13, '2010-05-18', 'AIRC-180510-189632485', 'DDF EL C/S 4 ARRIBA 2 AL SUR Y 1/2 ARRIBA', 0, 'M'),
(13, 'ANA', 'MARIA', 'RAMOS', 'TORREZ', 12, '2011-08-26', 'AMRT-260811-6895629', 'TERCERA CALLE LA FINQUITA 3 C AL SUR', 12345678, 'F'),
(14, 'AZUZENA', 'ESTRELLA', 'SANCHEZ', 'RODRIGUEZ', 13, '2010-04-28', 'AESR-280410-6895629', 'TERCERA CALLE LA FINQUITA 3 C AL SUR', 0, 'F'),
(15, 'UESNEL', 'ADIEL', 'MACARENO', 'LOPEZ', 13, '2010-09-14', 'UDML-140610-6895629', 'FRENTE AL HOSPITAL MANOLO MORALES', 0, 'F'),
(16, 'ARIELA', 'VALENTINA', 'LEYVA', 'ESPINOZA', 12, '2011-07-25', 'AVLE-250711-6895629', 'TERCERA CALLE LA FINQUITA 3 C AL SUR', 0, 'F'),
(17, 'NICOL', 'SOFIA', 'PEREZ', 'GONZALES', 13, '2010-11-05', 'NSPG-051110-6895629', 'DEL TALLER DE MOTOS 2 1/2C ARRIBA', 0, 'F'),
(18, 'MARIA', 'ELENA', 'GONZALEZ', 'GONZALES', 12, '2011-12-07', 'MEGG-071211-6895629', 'DEL TALLER DE MOTOS 2 1/2C ARRIBA', 0, 'F'),
(19, 'SOFIA', 'MARIA', 'TORREZ', 'MORALES', 12, '2011-03-09', 'SMTM-090311-6895629', 'DEL HOSP.MANOLO MORALES 3C AL SUR', 0, 'F'),
(20, 'ANA', 'SOFIA', 'PAVON', 'PORRAS', 13, '2010-12-09', 'ASPP-091210-6895629', 'DEL TALLER DE MOTOS 2 1/2C ARRIBA', 0, 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matrícula`
--

CREATE TABLE `matrícula` (
  `idMatricula` int NOT NULL,
  `FechadeMatricula` date DEFAULT NULL,
  `Grado` varchar(15) DEFAULT NULL,
  `Seccion` varchar(15) DEFAULT NULL,
  `Estudiante_idEstudiante` int NOT NULL,
  `Docente_idDocente` int NOT NULL,
  `Modalidad_idModalidad` varchar(45) NOT NULL,
  `Tutor_idTutor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE `modalidad` (
  `idModalidad` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`idModalidad`, `Descripcion`) VALUES
('1', 'Educacion Inicial'),
('2', 'Primaria'),
('3', 'Secundaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `idTutor` int NOT NULL,
  `Cedula` varchar(45) DEFAULT NULL,
  `PNombre` varchar(45) DEFAULT NULL,
  `SNombre` varchar(45) DEFAULT NULL,
  `PApellido` varchar(45) DEFAULT NULL,
  `SApellido` varchar(45) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Direccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`idTutor`, `Cedula`, `PNombre`, `SNombre`, `PApellido`, `SApellido`, `Telefono`, `Direccion`) VALUES
(1, '001-291286-0056C', 'JAMIR', 'ANTONIO', 'HERNANDEZ', 'ALARCON', 85692314, 'BARRIO SECTOR 17 MANAGUA NICARAGUA'),
(2, '001-141287-0011Q', 'MARTHA', 'MARIA', 'REYES', 'FONSECA', 85691237, 'DEL BAR LAS GRADITAS 3 1/2 AL LAGO'),
(3, '0012403950047Y', 'MARY', 'CRUZ', 'PEREZ', 'PADILLA', 88963245, 'SANDINO ENTRADA LAS COLINAS 4 AL SUR'),
(4, '0010806670002M', 'NORA ', 'MARLENE', 'GONZALEZ', 'ESTRADA', 78459632, 'GRENADA DE LA D. MAGICA 3C. ABAJO 1/2 AL LAGO'),
(5, '4452504940002L', 'KATYA ', 'RAQUEL', '', 'DIAZ', 85691237, 'BARRIO 18 DE MAYO, WALTER FERRETI 3ABAJO'),
(6, '0011709890040X', 'MELVIN ', 'DE JESUS', 'QUINTANILLA S', 'CRUZ', 78543692, 'HOSP. MANOLO MORALES 1/2C. AL SUR'),
(7, '0010511830045X', 'KATYA ', 'VERONICA', 'GARCIA', 'LOVO', 87869523, 'HOSPITAL MANOLO MORALES 11/2 CUADRA AL ESTE'),
(8, '0012004430013S', 'MARIA', 'ETELGIVE', 'RUGAMA', '', 83962547, 'DEL TALLER DE MOTOS 2 1/2C ARRIBA'),
(9, '3662404810000D', 'ANNER ', 'JOSE', 'RAUDEZ', 'GUZMAN', 88963214, 'DDF EL C/S 4 ARRIBA 2 AL SUR Y 1/2 ARRIBA'),
(10, '0011110860051U', 'MEILYN', 'YAMILETH', 'CARRION', 'GALO', 85895623, 'DE LA ESCUELA INDEPENDENCIA 1C AL ESTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(80) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `password` varchar(120) NOT NULL,
  `acerca` varchar(255) NOT NULL,
  `modalidad` varchar(50) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `especialidad` varchar(50) NOT NULL,
  `celular` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `correo`, `usuario`, `password`, `acerca`, `modalidad`, `nivel`, `nacionalidad`, `direccion`, `especialidad`, `celular`) VALUES
(1, 'Hector Romero', 'hare@cbl.edu.ni', 'hromero', '8cb2237d0679ca88db6464eac60da96345513964', 'Docente de Ciencias Naturales con 3 años de experiencia', 'Secundaria', '9no grado', 'Nicaraguense', 'San Rafael del Sur', 'Ciencia Fisico Naturales', 78994612),
(2, 'Administrador', 'admin@cbl.edu.ni', 'admin', '8cb2237d0679ca88db6464eac60da96345513964', 'Administrador del Sistema', 'Todas', 'Todos', 'Nicaraguense', 'Managua', 'Todas', 12345678),
(3, 'Ana Bermudez', 'anabermudez@cbl.edu.ni', 'abermudez', '8cb2237d0679ca88db6464eac60da96345513964', 'Docente de Tecnología Educativa con 4 años de experiencia', 'Secundaria', '7mo - 11mo Grado', 'Nicaraguense', 'San Rafael del Sur', 'Tecnologia Educativa', 88997766),
(4, 'Xochilt Silva', 'xochiltsilva@cbl.edu.ni', 'xsilva', '8cb2237d0679ca88db6464eac60da96345513964', 'Docente de Primaria con 5 años de experiencia', 'Primaria', '5to grado', 'Nicaraguense', 'Managua, Nicaragua', 'Maestro de Educacion Primaria', 55667788);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`idDocente`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidad`),
  ADD KEY `fk_Especialidad_Docente_idx` (`Docente_idDocente`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`idEstudiante`);

--
-- Indices de la tabla `matrícula`
--
ALTER TABLE `matrícula`
  ADD PRIMARY KEY (`idMatricula`),
  ADD KEY `fk_Matrícula_Estudiante1_idx` (`Estudiante_idEstudiante`),
  ADD KEY `fk_Matrícula_Docente1_idx` (`Docente_idDocente`),
  ADD KEY `fk_Matrícula_Modalidad1_idx` (`Modalidad_idModalidad`),
  ADD KEY `fk_Matrícula_Tutor1_idx` (`Tutor_idTutor`);

--
-- Indices de la tabla `modalidad`
--
ALTER TABLE `modalidad`
  ADD PRIMARY KEY (`idModalidad`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`idTutor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `idDocente` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `idEstudiante` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `matrícula`
--
ALTER TABLE `matrícula`
  MODIFY `idMatricula` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `idTutor` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD CONSTRAINT `fk_Especialidad_Docente` FOREIGN KEY (`Docente_idDocente`) REFERENCES `docente` (`idDocente`);

--
-- Filtros para la tabla `matrícula`
--
ALTER TABLE `matrícula`
  ADD CONSTRAINT `fk_Matrícula_Docente1` FOREIGN KEY (`Docente_idDocente`) REFERENCES `docente` (`idDocente`),
  ADD CONSTRAINT `fk_Matrícula_Estudiante1` FOREIGN KEY (`Estudiante_idEstudiante`) REFERENCES `estudiante` (`idEstudiante`),
  ADD CONSTRAINT `fk_Matrícula_Modalidad1` FOREIGN KEY (`Modalidad_idModalidad`) REFERENCES `modalidad` (`idModalidad`),
  ADD CONSTRAINT `fk_Matrícula_Tutor1` FOREIGN KEY (`Tutor_idTutor`) REFERENCES `tutor` (`idTutor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
