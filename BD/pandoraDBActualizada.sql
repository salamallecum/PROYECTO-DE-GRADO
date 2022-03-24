-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2022 a las 01:27:59
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
-- Estructura de tabla para la tabla `tbl_aplicaciondetrabajos`
--

CREATE TABLE `tbl_aplicaciondetrabajos` (
  `Id` int(11) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `tipo_actividad` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de aplicacion de los trabajos a las actividades ';

--
-- Volcado de datos para la tabla `tbl_aplicaciondetrabajos`
--

INSERT INTO `tbl_aplicaciondetrabajos` (`Id`, `id_trabajo`, `id_actividad`, `tipo_actividad`) VALUES
(1, 2, 82, 'EVENTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aplicacioneportafolio`
--

CREATE TABLE `tbl_aplicacioneportafolio` (
  `Id` int(11) NOT NULL,
  `Id_portafolioEstudiante` int(11) NOT NULL,
  `id_convocatoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tablade aplicacion de eportafolios a convocatorias';

--
-- Volcado de datos para la tabla `tbl_aplicacioneportafolio`
--

INSERT INTO `tbl_aplicacioneportafolio` (`Id`, `Id_portafolioEstudiante`, `id_convocatoria`) VALUES
(1, 38, 16);

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
  `grupo` varchar(5) NOT NULL,
  `id_profesor` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_asignatura`
--

INSERT INTO `tbl_asignatura` (`id_asignatura`, `nombre_asignatura`, `codigo`, `semestre`, `tipo`, `jornada`, `grupo`, `id_profesor`) VALUES
(87, 'MATERIA DE PRUEBA', '1224', '2', 'Electiva Profes', 'Nocturna', '3f', NULL),
(88, 'FILOSOFIA DEL AMOR', '234', '4', 'Obligatoria', 'Diurna', '2N', 33),
(89, 'FILOSOFIA DEL AMOR', '234', '4', 'Obligatoria', 'Diurna', '2N', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_competencia_especifica`
--

CREATE TABLE `tbl_competencia_especifica` (
  `id_comp_esp` int(11) NOT NULL,
  `id_comp_gral` int(11) NOT NULL,
  `codigo` varchar(4) NOT NULL,
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
(1, 1, 'a.1', 'Estará en la capacidad de abstraer las variables de diferente orden a partir de múltiples descripciones de un proceso para diseñar un algoritmo que pueda ser representado en lenguaje artificial.', 'Maestro de los procesos', '', '', ''),
(2, 1, 'a.2', 'Estará en la capacidad de explicar los procesos a partir de la identificación, descripción y relación de variables de diferente orden (artefacto, creencias, medio, hábitos y modelo de producción) que hacen parte de un proceso para desarrollar sistemas de información.', 'Maestro de los procesos', '', '', ''),
(20, 1, 'a.3', 'Estará en la capacidad de determinar desde una perspectiva multicausal el impacto de la operación de un sistema de información al interior de una organización y gestionar el cambio y/o transferencia.', 'Maestro de los procesos', '', '', ''),
(24, 2, 'b.1', 'Estará en la capacidad de identificar y describir los procesos de su entorno de acción para hallar sus determinantes e implicaciones más relevantes en una organización.', 'Maestro de los procesos', '', '', ''),
(25, 2, 'b.2', 'Estará en la capacidad de llevar a cabo procesos de abstracción para identificar las variables y sus relaciones en los procesos.', 'Maestro de los procesos', '', '', ''),
(26, 2, 'b.3', 'Estará en la capacidad de proponer modelos a partir de la identificación de las variables y sus relaciones para tener una visión sistémica del proceso y proponer oportunidades de negocio.', 'Virtuoso tecnologico', '', '', ''),
(27, 2, 'b.4', 'Estará en la capacidad de traducir los modelos a lenguaje artificial para contribuir a la eficacia de los procesos organizacionales.', 'Virtuoso tecnologico', '', '', ''),
(28, 3, 'c.1', 'Estará en la capacidad de utilizar herramientas para el diseño y modelado de software, utilizando patrones de diseño adecuados, garantizando el cumplimiento de estándares.', 'Virtuoso tecnologico', '', '', ''),
(29, 3, 'c.2', 'Estará en la capacidad de utilizar ambientes de desarrollo integrados y lenguajes de programación para la construcción de software con base en diseños previamente elaborados, optimizando procesos.', 'Virtuoso tecnologico', '', '', ''),
(30, 3, 'c.3', 'Estará en la capacidad de diseñar y construir bases de datos para la toma de decisiones, garantizando la consistencia y oportunidad de la información generada.', 'Virtuoso tecnologico', '', '', ''),
(31, 3, 'c.4', 'Estará en la capacidad de proponer alternativas para procurar la disponibilidad y el alto grado de desempeño de un sistema de información a través del análisis de su contexto y evaluación de los elementos que conforman su infraestructura tecnológica.', 'Virtuoso tecnologico', '', '', ''),
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
  `nombre_badgeoro` varchar(10) DEFAULT NULL,
  `nombre_badgeplata` varchar(10) DEFAULT NULL,
  `nombre_badgebronce` varchar(10) DEFAULT NULL
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
(13, 'M', 'EDITE LA COMPETENCIA ALEJO', 'Noble lider', 'IpWGSR.jpg', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contribcompespecificas_actividad`
--

CREATE TABLE `tbl_contribcompespecificas_actividad` (
  `Id` int(11) NOT NULL,
  `Idcontribcompgeneral` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `tipo_actividad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `codigosCompEspecificas` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `nivelesDeContribucion` varchar(800) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de niveles de contrib a actividad comp especificas';

--
-- Volcado de datos para la tabla `tbl_contribcompespecificas_actividad`
--

INSERT INTO `tbl_contribcompespecificas_actividad` (`Id`, `Idcontribcompgeneral`, `id_actividad`, `tipo_actividad`, `codigosCompEspecificas`, `nivelesDeContribucion`) VALUES
(1, 56, 81, 'EVENTO', 'a.1,a.2,a.3,b.1,b.2,b.3,b.4', 'ALTA,MEDIA,MEDIA,BAJA,N/A,ALTA,N/A'),
(2, 57, 82, 'EVENTO', 'a.1,a.2,a.3,b.1,b.2,b.3,b.4', 'BAJA,MEDIA,BAJA,MEDIA,N/A,N/A,ALTA'),
(9, 65, 92, 'EVENTO', 'a.1,a.2,a.3', 'BAJA,BAJA,BAJA'),
(10, 66, 93, 'EVENTO', 'a.1,a.2,a.3,c.1,c.2,c.3,c.4,c.5', 'BAJA,MEDIA,MEDIA,ALTA,N/A,MEDIA,ALTA,N/A'),
(11, 58, 2, 'CONVOCATORIA', 'a.1,a.2,a.3', 'BAJA,N/A,N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_contribcompgenerales_actividad`
--

CREATE TABLE `tbl_contribcompgenerales_actividad` (
  `Id` int(11) NOT NULL,
  `id_actividad` int(20) NOT NULL,
  `tipo_actividad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `compAContribuir` varchar(400) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de comp generales que contribuyen a las actividades';

--
-- Volcado de datos para la tabla `tbl_contribcompgenerales_actividad`
--

INSERT INTO `tbl_contribcompgenerales_actividad` (`Id`, `id_actividad`, `tipo_actividad`, `compAContribuir`) VALUES
(56, 81, 'EVENTO', '1,2'),
(57, 82, 'EVENTO', '1,2'),
(58, 2, 'CONVOCATORIA', '1'),
(65, 92, 'EVENTO', '1'),
(66, 93, 'EVENTO', '1,3'),
(68, 94, 'EVENTO', '1,2');

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
(2, 'CONVOCATORIA SOLO ENUNCIADO', 'convocatoria con solo el enunciado', '2022-01-30', '2022-02-10', NULL, NULL, 27, 'Si');

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
(16, 'CONVOCATORIA DE PRUEBA', 'Se necesitan practicantes de ing de sistemas de ultimo semestre para mirar para el techo y matar moscas, postúlate ahora.', '2022-03-03', '2022-03-19', 'rUdtn9.jpg', NULL),
(17, 'CONVOCATORIA SIN IMG', 'convocatoria sin imagen', '2022-02-27', '2022-03-12', NULL, 'WcT1oC.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eportafolio`
--

CREATE TABLE `tbl_eportafolio` (
  `Id` int(11) NOT NULL,
  `Id_estudiante` int(11) NOT NULL,
  `Id_trabajo` int(11) NOT NULL,
  `eportafolioPublicado` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `linkPortafolioParaCompartir` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de eportafolios';

--
-- Volcado de datos para la tabla `tbl_eportafolio`
--

INSERT INTO `tbl_eportafolio` (`Id`, `Id_estudiante`, `Id_trabajo`, `eportafolioPublicado`, `linkPortafolioParaCompartir`) VALUES
(1, 38, 1, 'Si', NULL),
(2, 38, 2, 'Si', NULL);

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
(81, 'EVENTO DE PRUEBA', 'evento', '2021-12-26', '2021-12-28', NULL, NULL, 28, 'Si'),
(82, 'PILDORA', 'evento de prueba array', '2021-12-26', '2022-01-22', NULL, NULL, 26, 'Si'),
(92, 'DEBO TERMINAR', 'evento definitivo', '2022-02-27', '2022-03-18', NULL, NULL, 29, 'Si'),
(93, 'MARATON DE PROGRAMACION', 'Participar en las maratones de programación propuestas por el programa.', '2022-03-06', '2022-04-02', NULL, NULL, 28, 'Si'),
(94, 'COMPETENCIA LORE PRUEBA', 'copetencia de prueba no se que', '2022-02-27', '2022-03-25', NULL, NULL, 26, 'No');

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
-- Estructura de tabla para la tabla `tbl_trabajodestacado`
--

CREATE TABLE `tbl_trabajodestacado` (
  `Id` int(11) NOT NULL,
  `Id_estudiante` int(11) NOT NULL,
  `nombre_trabajo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_imagentrabajo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_documento` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_video` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_repocodigo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_presentacion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trabajoTieneBadge` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_badge` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_competencia` int(11) DEFAULT NULL,
  `tipo_competencia` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publicadoeneportafolio` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de trabajos destacados';

--
-- Volcado de datos para la tabla `tbl_trabajodestacado`
--

INSERT INTO `tbl_trabajodestacado` (`Id`, `Id_estudiante`, `nombre_trabajo`, `descripcion`, `nombre_imagentrabajo`, `link_documento`, `link_video`, `link_repocodigo`, `link_presentacion`, `trabajoTieneBadge`, `tipo_badge`, `id_competencia`, `tipo_competencia`, `publicadoeneportafolio`) VALUES
(1, 38, 'TRABAJO DESTACADO DE PRUEBA', 'Trabajo destacado que gano una megainsignia', NULL, 'https://docs.google.com/spreadsheets/d/1xZyupSIyIx3eP6_ZT4g8fx3cXrY9epawO6OLNi86E68/edit?usp=sharing', 'https://docs.google.com/spreadsheets/d/1xZyupSIyIx3eP6_ZT4g8fx3cXrY9epawO6OLNi86E68/edit?usp=sharing', 'https://github.com/salamallecum/PROYECTO-DE-GRADO', 'https://docs.google.com/presentation/d/1yqIBCF8Pz2JExGyj5OtpS9dp41vvaIx0/edit?usp=sharing&ouid=103121222244404759390&rtpof=true&sd=true', 'Si', 'ORO', 3, 'GENERAL', 'Si'),
(2, 38, 'TRABAJO DESTACADO DE PRUEBA 2', 'Ejemplo de trabajo destacado 2', NULL, NULL, NULL, 'https://github.com/salamallecum/PROYECTO-DE-GRADO', 'https://docs.google.com/presentation/d/1yqIBCF8Pz2JExGyj5OtpS9dp41vvaIx0/edit?usp=sharing&ouid=103121222244404759390&rtpof=true&sd=true', '', NULL, NULL, NULL, 'No'),
(3, 38, 'TRABAJO DESTACADO DE PRUEBA 3 ', 'trabajo destacado que gano un insignia', NULL, NULL, NULL, 'https://github.com/salamallecum/PROYECTO-DE-GRADO', NULL, 'Si', 'BRONCE', 28, 'ESPECIFICA', 'Si');

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
  `telefono` varchar(20) DEFAULT NULL,
  `correo_usuario` varchar(50) DEFAULT NULL,
  `foto_usuario` varchar(10) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombres_usuario`, `apellidos_usuario`, `username`, `clave`, `pais`, `ciudad`, `direccion`, `telefono`, `correo_usuario`, `foto_usuario`, `descripcion`, `id_rol`) VALUES
(26, 'Guiovanna Paola', 'Sabogal Alfaro', 'guiovanna', 'Password1*', 'Colombia', NULL, NULL, '', 'guiovannasabogal@unbosque.edu.co', NULL, NULL, 2),
(27, 'Diana Marcela', 'Jimenez', 'dmajimenez', 'Password1*', 'Colombia', NULL, NULL, '', 'dmajimenezr@unbosque.edu.co', NULL, NULL, 2),
(28, 'Frank Ernesto', 'Romero Alvarez', 'fromeroa', 'Password1*', 'Colombia', NULL, NULL, '', 'fromeroa@unbosque.edu.co', NULL, NULL, 2),
(29, 'Miguel Alfonso', 'Feijoo Garcia', 'mfeijoog', 'Password1*', 'Colombia', NULL, NULL, '', 'mfeijoog@unbosque.edu.co', NULL, NULL, 2),
(30, 'Ricardo', 'Camargo Lemos', 'rcamargol', 'Password1*', 'Colombia', NULL, NULL, '', 'rcamargol@unbosque.edu.co', NULL, NULL, 2),
(31, 'Sandra Milena', 'Ayala Suarez', 'smayala', 'Password1*', 'Colombia', NULL, NULL, '', 'smayala@unbosque.edu.co', NULL, NULL, 3),
(32, 'Laura', 'Peña', 'jaja', 'lalala', 'Colombia', NULL, NULL, '', 'prueba@email.com', NULL, NULL, 2),
(33, 'Nestor yesid', 'Barrera', 'papito', 'soysexy123', 'Colombia', NULL, NULL, '', 'elpapirickie@gmail.com', NULL, NULL, 2),
(36, 'Pepe', 'Pecas', 'pepe', '234', 'Colombia', NULL, NULL, '', 'Pepepercas@gmail.com', NULL, NULL, 2),
(37, 'Elquesea123', 'Garcia', 'pepito', '12345', 'Colombia', NULL, NULL, '', 'prueba@unbosque.edu.co', NULL, NULL, 2),
(38, 'Luis Alejandro', 'Amaya Torres', 'lamayat', 'bosque2014', 'Colombia', 'Bogotá', 'Cra 7c # 182-27', '3334567', 'lamayat@unbosque.edu.co', NULL, 'Estudiante de Ingeniería de Sistemas con conocimientos sólidos de programación en lenguaje Java, Python; Desarrollo web mediante JavaScript, HTML5, CSS; Gestión de Bases de datos mediante MySQL, PostgreSQL, SQLite y Desarrollo de apps móviles mediante Android Studio.', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_aplicaciondetrabajos`
--
ALTER TABLE `tbl_aplicaciondetrabajos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_aplicacioneportafolio`
--
ALTER TABLE `tbl_aplicacioneportafolio`
  ADD PRIMARY KEY (`Id`);

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
-- Indices de la tabla `tbl_contribcompespecificas_actividad`
--
ALTER TABLE `tbl_contribcompespecificas_actividad`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_contribcompgenerales_actividad`
--
ALTER TABLE `tbl_contribcompgenerales_actividad`
  ADD PRIMARY KEY (`Id`);

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
-- Indices de la tabla `tbl_eportafolio`
--
ALTER TABLE `tbl_eportafolio`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_trabajodestacado`
--
ALTER TABLE `tbl_trabajodestacado`
  ADD PRIMARY KEY (`Id`);

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
-- AUTO_INCREMENT de la tabla `tbl_aplicaciondetrabajos`
--
ALTER TABLE `tbl_aplicaciondetrabajos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_aplicacioneportafolio`
--
ALTER TABLE `tbl_aplicacioneportafolio`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_asignatura`
--
ALTER TABLE `tbl_asignatura`
  MODIFY `id_asignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `tbl_competencia_especifica`
--
ALTER TABLE `tbl_competencia_especifica`
  MODIFY `id_comp_esp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `tbl_competencia_general`
--
ALTER TABLE `tbl_competencia_general`
  MODIFY `id_comp_gral` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tbl_contribcompespecificas_actividad`
--
ALTER TABLE `tbl_contribcompespecificas_actividad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tbl_contribcompgenerales_actividad`
--
ALTER TABLE `tbl_contribcompgenerales_actividad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `tbl_convocatoriacomite`
--
ALTER TABLE `tbl_convocatoriacomite`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_convocatoriapracticas`
--
ALTER TABLE `tbl_convocatoriapracticas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbl_eportafolio`
--
ALTER TABLE `tbl_eportafolio`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_trabajodestacado`
--
ALTER TABLE `tbl_trabajodestacado`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
