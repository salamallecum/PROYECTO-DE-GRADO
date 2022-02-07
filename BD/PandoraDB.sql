-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-02-2022 a las 19:14:57
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pandora`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_analisis_competencias`
--

CREATE TABLE `tbl_analisis_competencias` (
  `id_relacion` int(11) NOT NULL,
  `num_actividad` int(11) NOT NULL,
  `tipo_actividad` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `num_comp_esp` int(11) NOT NULL,
  `nivel_contribucion` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='tabla de evaluacion de contribucion de actividades vs comp';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asignatura`
--

CREATE TABLE `tbl_asignatura` (
  `id_asignatura` int(11) NOT NULL,
  `nombre_asignatura` varchar(30) NOT NULL,
  `codigo` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `semestre` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `jornada` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_profesor` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_asignatura`
--

INSERT INTO `tbl_asignatura` (`id_asignatura`, `nombre_asignatura`, `codigo`, `semestre`, `tipo`, `jornada`, `id_profesor`) VALUES
(6, 'PROGRAMACIÓN 2', '12994', '3', 'Obligatoria', 'Nocturna', 27),
(7, 'SISTEMAS INTELIGENTES', '13053', '9', 'Obligatoria', 'Nocturna', 27),
(8, 'PROYECTO DE GRADO 2', '13015', '9', 'Obligatoria', 'Nocturna', 26),
(9, 'INGENIERIA DE SOFTWARE I', '333', '5', 'Obligatoria', 'Nocturna', 27),
(10, 'MATERIA DE PRUEBA', '12994', '3', 'Electiva', 'Diurna', 29),
(60, 'MATERIA DE PRUEBA ALEJO', '222', '5', 'Obligatoria', 'Nocturna', NULL),
(77, 'FILOSOFIA', '222', '8', 'Electiva', 'Diurna', NULL),
(80, 'SISTEMAS RECOMENDA BIG  DATA', '222', '9', 'Electiva', 'Nocturna', NULL),
(81, 'SISTEMAS RECOMENDA BIG  DATA', '222', '9', 'Electiva', 'Nocturna', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_competencia_especifica`
--

CREATE TABLE `tbl_competencia_especifica` (
  `id_comp_esp` int(11) NOT NULL,
  `id_comp_gral` int(11) NOT NULL,
  `codigo` varchar(3) NOT NULL,
  `nombre_competencia_esp` varchar(400) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `nombre_badgeoro` varchar(10) NOT NULL,
  `nombre_badgeplata` varchar(10) NOT NULL,
  `nombre_badgebronce` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_competencia_especifica`
--

INSERT INTO `tbl_competencia_especifica` (`id_comp_esp`, `id_comp_gral`, `codigo`, `nombre_competencia_esp`, `rol`, `nombre_badgeoro`, `nombre_badgeplata`, `nombre_badgebronce`) VALUES
(1, 1, 'a.1', 'Estará en la capacidad de abstraer las variables de diferente orden a partir de múltiples descripciones de un proceso para diseñar un algoritmo que pueda ser representado en lenguaje artificial', 'Maestro de los procesos', '', '', ''),
(2, 1, 'a.2', 'Estará en la capacidad de explicar los procesos a partir de la identificación, descripción y relación de variables de diferente orden (artefacto, creencias, medio, hábitos y modelo de producción) que que hacen parte de un proceso para desarrollar sistemas de información.', 'Maestro de los procesos', '', '', ''),
(20, 1, 'a.3', 'Estará en la capacidad de determinar desde una perspectiva multicausal el impacto de la operación de un sistema de información al interior de una organización y\r\ngestionar el cambio o/y transferencia', 'Maestro de los procesos', '', '', ''),
(24, 2, 'b.1', 'Estará en la capacidad de identificar y describir los procesos de su entorno de acción para hallar sus determinantes e implicaciones más relevantes en una organización.', 'Maestro de los procesos', '', '', ''),
(25, 2, 'b.2', 'Estará en la capacidad de llevar a cabo procesos de abstracción para Identificar las variables y sus relaciones en los procesos.', 'Maestro de los procesos', '', '', ''),
(26, 2, 'b.3', 'Estará en la capacidad de proponer modelos a partir de la identificación de las variables y sus relaciones para tener una visión sistémica del proceso y proponer oportunidades de negocio.', 'Virtuoso tecnologico', '', '', ''),
(27, 2, 'b.4', 'Estará en la capacidad de traducir los modelos a lenguaje artificial para contribuir a la eficacia de los procesos organizacionales.', 'Virtuoso tecnologico', '', '', ''),
(28, 3, 'c.1', 'Estará en la capacidad de utilizar herramientas para el diseño y modelado de software, utilizando patrones de diseño adecuados, garantizando el cumplimiento de estándares.', 'Virtuoso tecnologico', '', '', ''),
(29, 3, 'c.2', 'Estará en la capacidad de utilizar ambientes de desarrollo integrados y lenguajes de programación para la construcción de software con base en diseños previamente\r\nelaborados, optimizando procesos.', 'Virtuoso tecnologico', '', '', ''),
(30, 3, 'c.3', 'Estará en la capacidad de diseñar y construir bases de datos para la toma de decisiones, garantizando la consistencia y oportunidad de la información generada.', 'Virtuoso tecnologico', '', '', ''),
(31, 3, 'c.4', 'Estará en la capacidad de proponer alternativas para procurar la disponibilidad y el alto grado de desempeño de un sistema de información a través del análisis de su\r\ncontexto y evaluación de los elementos que conforman su infraestructura tecnológica.', 'Virtuoso tecnologico', '', '', ''),
(32, 3, 'c.5', 'Estará en la capacidad de aplicar los criterios básicos de seguridad, en los sistemas de información para proteger la información y garantizar la continuidad del negocio.', 'Virtuoso tecnologico', '', '', ''),
(33, 4, 'd.1', 'Estará en la capacidad de reconocer el entorno en el cual ejercerá su profesión para saber cómo tomar decisiones adecuadas para el desarrollo de un proyecto.', 'Noble lider', '', '', ''),
(34, 4, 'd.2', 'Estará en la capacidad de reconocer su entorno local y sus oportunidades de negocio para proyectarlas a entornos locales y globales.', 'Noble lider', '', '', ''),
(35, 4, 'd.3', 'Estará en la capacidad de concebirse a sí mismo como una empresa basada en el aprendizaje y la gestión del conocimiento para gestionar sus proyectos en un ambiente laboral dinámico.', 'Noble lider', '', '', ''),
(36, 4, 'd.4', 'Estará en la capacidad de elaborar y presentar propuestas desde una visión compleja de las problemáticas y desde la interpretación de la perspectiva del cliente con el fin de ofrecer soluciones más eficaces.', 'Noble lider', '', '', ''),
(37, 5, 'e.1', 'Estará en la capacidad de formular proyectos a partir de la descripción y explicación de los contextos y las perspectivas de las organizaciones e individuos para contribuir al logro de sus objetivos estratégicos.', 'Maestro de los procesos', '', '', ''),
(38, 5, 'e.2', 'Estará en la capacidad de evaluar la viabilidad de un proyecto (diseño, mercado, organización, económico, social, ambiental, cultural) de base tecnológica, desde una visión sistémica enmarcada en el modelo biopsicosocial y cultural, para que la organización pueda tomar la decisión de su ejecución de acuerdo con el impacto previsto.', 'Maestro de los procesos', '', '', ''),
(39, 5, 'e.3', 'Estará en la capacidad de planear y ejecutar un proyecto usando métodos y herramientas acordes al contexto y la perspectiva del cliente, para facilitar el camino hacia el logro de los objetivos planteados.', 'Noble lider', '', '', ''),
(40, 5, 'e.4', 'Estará en la capacidad de evaluar las implicaciones conómicas, sociales, culturales, políticas, ambientales, éticas de un proyecto para decidir si participa en su ejecución.', 'Noble lider', '', '', ''),
(41, 5, 'e.5', 'Estará en la capacidad de gestionar de manera interdisciplinaria (Ciencias sociales, ingeniería, ...) cambios a la cultura organizacional para asimilar las nuevas tecnologías y las condiciones derivadas (impacto) de su adopción en la implementación de un proyecto.', 'Noble lider', '', '', ''),
(42, 6, 'f.1', 'Estará en la capacidad de encontrar respuestas a preguntas formuladas en la comprensión de problemáticas, útiles para el planteamiento, desarrollo y operación\r\nde soluciones de tecnología.', 'Maestro de los procesos', '', '', ''),
(43, 6, 'f.2', 'Estará en la capacidad de generar transformación social al reconocer las variables que conforman un proceso y al generar tecnología para transformarlas.', 'Maestro de los procesos', '', '', ''),
(44, 6, 'f.3', 'Estará en la capacidad de Interpretar de distintas formas las situaciones problémicas y visualiza una variedad de respuestas ante un problema o circunstancia con el fin de encontrar diferentes alternativas de solución a los problemas.', 'Maestro de los procesos', '', '', ''),
(45, 7, 'g.1', 'Estará en la capacidad de identificar las variables que hacen parte de una problemática en un contexto para plantear problemas de investigación tecnológica desde el enfoque biopsicosocial y cultural de la UEB.', 'Maestro de los procesos', '', '', ''),
(46, 7, 'g.2', 'Estará en la capacidad de construir un marco teórico para un proyecto tecnológico y sustentarlo de forma oral y escrita con base en el problema, la metodología y la tecnología elegida.', 'Noble lider', '', '', ''),
(47, 7, 'g.3', 'Estará en la capacidad de seleccionar y aplicar los instrumentos de investigación adecuados para prever y analizar el impacto de un proyecto tecnológico en su contexto de incidencia.', 'Maestro de los procesos', '', '', ''),
(48, 7, 'g.4', 'Estará en la capacidad de proponer soluciones innovadoras para contribuir al mejoramiento de la calidad de vida de las personas.', 'Virtuoso tecnologico', '', '', ''),
(49, 7, 'g.5', 'Estará en la capacidad de analizar las implicaciones éticas y bioéticas de un  proyecto de investigación tecnológica para decidir su participación y/o acciones a tomar.', 'Noble lider', '', '', ''),
(50, 8, 'h.1', 'Estará en la capacidad de recolectar e interpretar información por medio de instrumentos de investigación y en procesos de interacción social con los actores de diferentes niveles organizacionales y/o disciplinas para garantizar una comunicación eficaz con los miembros del equipo.', 'Noble lider', '', '', ''),
(51, 8, 'h.2', 'Estará en la capacidad de indagar e interpretar contextos y traducirlos en modelos (diagrama de proceso, BPM, diagramas de ciclos causales, diagramas de niveles y flujos, entre otros) para validar el entendimiento de los requerimientos.', 'Maestro de los procesos', '', '', ''),
(52, 8, 'h.3', 'Estará en la capacidad de analizar los puntos de vista de los individuos involucrados en el contexto para interactuar efectivamente.', 'Noble lider', '', '', ''),
(53, 8, 'h.4', 'Estará en capacidad de gestionar grupos para el cumplimiento de los objetivos de un proyecto.', 'Noble lider', '', '', ''),
(54, 9, 'i.1', 'Estará en capacidad de interpretar y analizar textos en inglés para el diseño de proyectos, realización de trabajos y mantenerse actualizado en las tendencias de la disciplina.', 'Explorador', '', '', ''),
(55, 10, 'j.1', 'Estará en la capacidad de aplicar las normas, los estándares y los modelos propios de la ingeniería, tales como ISO e IEEE, para alcanzar niveles adecuados de modularidad, escalabilidad, desempeño, seguridad, disponibilidad y oportunidad en los productos.', 'Noble lider', '', '', ''),
(56, 10, 'j.2', 'Estará en la capacidad de cumplir con los requerimientos funcionales y no funcionales acordados con el usuario en el desarrollo de productos y servicios tecnológicos, aplicando el ciclo CDIO (Concebir, Diseñar, Implementar y Operar).', 'Maestro de los procesos', '', '', ''),
(57, 10, 'j.3', 'Estará en la capacidad de reconocer los objetivos estratégicos, las políticas organizacionales y de llevar a cabo las acciones necesarias para que el área de tecnología esté en consonancia con la organización, utilizando marcos de trabajo de arquitectura empresarial, gobierno de TIC y de madurez tecnológica.', 'Noble lider', '', '', ''),
(58, 10, 'j.4', 'Estará en la capacidad de utilizar los estándares de gerencia de proyectos con el objetivo de incrementar la probabilidad de éxito de los proyectos dentro de los parámetros de calidad, costo, tiempo y desempeño previamente fijados.', 'Noble lider', '', '', ''),
(59, 11, 'k.1', 'Estará en la capacidad de interpretar el entorno usando el modelo BPSC para descubrir y plantear oportunidades de negocio de base tecnológica.', 'Maestro de los procesos', '', '', ''),
(60, 11, 'k.2', 'Estará en la capacidad de evaluar alternativas de negocio siguiendo una metodología de análisis multicriterio para elegir la más conveniente de acuerdo con su propósito.', 'Noble lider', '', '', ''),
(61, 11, 'k.3', 'Estará en la capacidad de desarrollar proyectos para materializar posibilidades de negocio.', 'Noble lider', '', '', ''),
(62, 12, 'l.1', 'Estará en la capacidad de identificar el contexto, los actores, sus interacciones y necesidades, así como las variables controlables y no controlables, para modelar una situación del entorno real lo más fiel posible, con el propósito de establecer los factores que afectan el proceso del diseño de los sistemas de información.', 'Maestro de los procesos', '', '', ''),
(63, 12, 'l.2', 'Estará en la capacidad de comprender las interacciones de los actores, adoptando las diversas metodologías, técnicas y herramientas (actuales y acordes a la disciplina), con el fin de construir sistemas de información con la calidad requerida.', 'Maestro de los procesos', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_competencia_general`
--

CREATE TABLE `tbl_competencia_general` (
  `id_comp_gral` int(11) NOT NULL,
  `codigo` char(1) NOT NULL,
  `nombre_comp_gral` varchar(200) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `nombre_badgeoro` varchar(10) NOT NULL,
  `nombre_badgeplata` varchar(10) NOT NULL,
  `nombre_badgebronce` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_competencia_general`
--

INSERT INTO `tbl_competencia_general` (`id_comp_gral`, `codigo`, `nombre_comp_gral`, `rol`, `nombre_badgeoro`, `nombre_badgeplata`, `nombre_badgebronce`) VALUES
(1, 'A', 'Formado dentro del enfoque biopsicosocial y cultural.', 'Maestro de los procesos', '', '', ''),
(2, 'B', 'Profesional con sólidos conocimientos en informática.', 'Maestro de los procesos', '', '', ''),
(3, 'C', 'Diseña y construye sistemas de información.', 'Virtuoso tecnologico', '', '', ''),
(4, 'D', 'Está en la capacidad de ejercer su profesión en contextos locales y globales.', 'Noble lider', '', '', ''),
(5, 'E', 'Propone y gestiona proyectos para la transferencia adecuada y responsable de las tecnologías de la información y las comunicaciones.', 'Noble lider', '', '', ''),
(6, 'F', 'Posee actitud crítica e investigativa.', 'Maestro de los procesos', '', '', ''),
(7, 'G', 'Está capacitado para investigar generando conocimiento que proporcione valor agregado dentro de la profesión.', 'Maestro de los procesos', '', '', ''),
(8, 'H', 'Trabajo en equipos interdisciplinarios.', 'Noble lider', '', '', ''),
(9, 'I', 'Manejo de un segundo idioma.', 'Explorador', '', '', ''),
(10, 'J', 'Cumple políticas de calidad, estándares locales y globales.', 'Noble lider', '', '', ''),
(11, 'K', 'Emprendimiento.', 'Noble lider', '', '', ''),
(12, 'L', 'Interpreta el entorno en su complejidad.', 'Maestro de los procesos', '', '', ''),
(13, 'M', 'COMPETENCIA GENERAL DE PRUEBA', 'Noble Lider', 'IpWGSR.jpg', '', ''),
(14, 'N', 'COMPETENCIA GENERAL DE PRUEBA 2', 'Virtuoso Tecnológico', 'tCUIoS.jpg', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_convocatoriacomite`
--

CREATE TABLE `tbl_convocatoriacomite` (
  `Id` int(11) NOT NULL,
  `nombre_convocatoria` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_convocatoria` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nombre_imagen` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `nombre_enunciado` varchar(10) CHARACTER SET utf8mb4 DEFAULT NULL,
  `id_usuario` int(3) NOT NULL,
  `competenciasAsignadas` varchar(2) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de convocatorias del comite';

--
-- Volcado de datos para la tabla `tbl_convocatoriacomite`
--

INSERT INTO `tbl_convocatoriacomite` (`Id`, `nombre_convocatoria`, `descripcion_convocatoria`, `fecha_inicio`, `fecha_fin`, `nombre_imagen`, `nombre_enunciado`, `id_usuario`, `competenciasAsignadas`) VALUES
(2, 'CONVOCATORIA SOLO ENUNCIADO', 'convocatoria con solo el enunciado', '2022-01-30', '2022-02-10', NULL, NULL, 27, 'No'),
(4, 'CONVOCATORIA SOLO ENUNCIADO 2', 'otro intento', '2022-02-06', '2022-02-19', NULL, 'OU7agC.pdf', 36, 'No'),
(5, 'CONVOCATORIA COMPLETA', 'ahora si va a funcionar', '2022-02-20', '2022-02-22', 'mcmnEa.jpg', 'XlgeRV.pdf', 29, 'No'),
(6, 'CONVOCATORIA SOLO ENUNCIADO 3', 'convocatoria solo enunciado numero 3', '2022-01-30', '2022-02-19', NULL, 'KLGHVr.pdf', 32, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_convocatoriapracticas`
--

CREATE TABLE `tbl_convocatoriapracticas` (
  `Id` int(11) NOT NULL,
  `nombre_convocatoria` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nombre_imagen` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_archivo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de convocatorias de la coord de practicas';

--
-- Volcado de datos para la tabla `tbl_convocatoriapracticas`
--

INSERT INTO `tbl_convocatoriapracticas` (`Id`, `nombre_convocatoria`, `descripcion`, `fecha_inicio`, `fecha_fin`, `nombre_imagen`, `nombre_archivo`) VALUES
(13, 'CONVOCATORIA DE PRUEBA', 'convocatoria de prueba', '2022-02-05', '2022-02-17', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evento`
--

CREATE TABLE `tbl_evento` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_evento` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nombre_imagen` varchar(10) DEFAULT NULL,
  `nombre_enunciado` varchar(10) DEFAULT NULL,
  `id_usuario` int(3) NOT NULL,
  `competenciasAsignadas` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_evento`
--

INSERT INTO `tbl_evento` (`id_evento`, `nombre_evento`, `descripcion_evento`, `fecha_inicio`, `fecha_fin`, `nombre_imagen`, `nombre_enunciado`, `id_usuario`, `competenciasAsignadas`) VALUES
(79, 'Evento de prueba', 'Evento jajajaja', '2021-12-26', '2022-01-13', NULL, NULL, 27, ''),
(81, 'EVENTO DE PRUEBA', 'evento', '2021-12-26', '2021-12-28', NULL, NULL, 28, ''),
(82, 'PILDORA', 'evento de prueba array', '2021-12-26', '2022-01-22', NULL, NULL, 26, ''),
(83, 'EVENTO DE PRUEBA', 'subir un trabajo', '2021-12-26', '2022-01-22', NULL, NULL, 26, ''),
(84, 'EVENTO CON IMAGEN', 'evento con imagen', '2022-01-01', '2022-01-20', 'morJp1.jpg', NULL, 32, ''),
(85, 'MARATON DE PROGRAMACION', 'Evento creado como prueba', '2022-01-30', '2022-02-19', NULL, NULL, 28, 'No');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nivcomp_actividad`
--

CREATE TABLE `tbl_nivcomp_actividad` (
  `id_nivel_competencia` int(11) NOT NULL,
  `nivel_competencia` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_competencia_esp` int(3) DEFAULT NULL,
  `evento` int(3) DEFAULT NULL,
  `convocatoria` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Estudiante'),
(2, 'Profesor'),
(3, 'Coordinación Prácticas'),
(4, 'Comité Curricular'),
(5, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(3) NOT NULL,
  `nombres_usuario` varchar(30) DEFAULT NULL,
  `apellidos_usuario` varchar(30) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `clave` varchar(10) DEFAULT NULL,
  `pais` varchar(10) DEFAULT NULL,
  `ciudad` varchar(10) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `correo_usuario` varchar(50) DEFAULT NULL,
  `foto_usuario` varchar(120) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombres_usuario`, `apellidos_usuario`, `username`, `clave`, `pais`, `ciudad`, `direccion`, `correo_usuario`, `foto_usuario`, `descripcion`, `id_rol`) VALUES
(26, 'Guiovanna Paola', 'Sabogal Alfaro', 'guiovanna', 'Password1*', 'Colombia', NULL, NULL, 'guiovannasabogal@unbosque.edu.co', NULL, NULL, 2),
(27, 'Diana Marcela', 'Jimenez', 'dmajimenez', 'Password1*', 'Colombia', NULL, NULL, 'dmajimenezr@unbosque.edu.co', NULL, NULL, 2),
(28, 'Frank Ernesto', 'Romero Alvarez', 'fromeroa', 'Password1*', 'Colombia', NULL, NULL, 'fromeroa@unbosque.edu.co', NULL, NULL, 2),
(29, 'Miguel Alfonso', 'Feijoo Garcia', 'mfeijoog', 'Password1*', 'Colombia', NULL, NULL, 'mfeijoog@unbosque.edu.co', NULL, NULL, 2),
(30, 'Ricardo', 'Camargo Lemos', 'rcamargol', 'Password1*', 'Colombia', NULL, NULL, 'rcamargol@unbosque.edu.co', NULL, NULL, 2),
(31, 'Sandra Milena', 'Ayala Suarez', 'smayala', 'Password1*', 'Colombia', NULL, NULL, 'smayala@unbosque.edu.co', NULL, NULL, 3),
(32, 'Laura', 'Peña', 'jaja', 'lalala', 'Colombia', NULL, NULL, 'prueba@email.com', NULL, NULL, 2),
(33, 'Nestor yesid', 'Barrera', 'papito', 'soysexy123', 'Colombia', NULL, NULL, 'elpapirickie@gmail.com', NULL, NULL, 2),
(36, 'Pepe', 'Pecas', 'pepe', '234', 'Colombia', NULL, NULL, 'Pepepercas@gmail.com', NULL, NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_analisis_competencias`
--
ALTER TABLE `tbl_analisis_competencias`
  ADD PRIMARY KEY (`id_relacion`);

--
-- Indices de la tabla `tbl_asignatura`
--
ALTER TABLE `tbl_asignatura`
  ADD PRIMARY KEY (`id_asignatura`),
  ADD KEY `id_profesor` (`id_profesor`);

--
-- Indices de la tabla `tbl_competencia_especifica`
--
ALTER TABLE `tbl_competencia_especifica`
  ADD PRIMARY KEY (`id_comp_esp`),
  ADD KEY `id_comp_gral` (`id_comp_gral`) USING BTREE;

--
-- Indices de la tabla `tbl_competencia_general`
--
ALTER TABLE `tbl_competencia_general`
  ADD PRIMARY KEY (`id_comp_gral`);

--
-- Indices de la tabla `tbl_convocatoriacomite`
--
ALTER TABLE `tbl_convocatoriacomite`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_convocatoriapracticas`
--
ALTER TABLE `tbl_convocatoriapracticas`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_nivcomp_actividad`
--
ALTER TABLE `tbl_nivcomp_actividad`
  ADD PRIMARY KEY (`id_nivel_competencia`),
  ADD KEY `id_competencia_esp` (`id_competencia_esp`),
  ADD KEY `evento` (`evento`),
  ADD KEY `convocatoria` (`convocatoria`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_analisis_competencias`
--
ALTER TABLE `tbl_analisis_competencias`
  MODIFY `id_relacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_asignatura`
--
ALTER TABLE `tbl_asignatura`
  MODIFY `id_asignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `tbl_competencia_especifica`
--
ALTER TABLE `tbl_competencia_especifica`
  MODIFY `id_comp_esp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `tbl_competencia_general`
--
ALTER TABLE `tbl_competencia_general`
  MODIFY `id_comp_gral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_convocatoriacomite`
--
ALTER TABLE `tbl_convocatoriacomite`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_convocatoriapracticas`
--
ALTER TABLE `tbl_convocatoriapracticas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `tbl_nivcomp_actividad`
--
ALTER TABLE `tbl_nivcomp_actividad`
  MODIFY `id_nivel_competencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_competencia_especifica`
--
ALTER TABLE `tbl_competencia_especifica`
  ADD CONSTRAINT `fk_id_comp_gral` FOREIGN KEY (`id_comp_gral`) REFERENCES `tbl_competencia_general` (`id_comp_gral`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_rol` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
