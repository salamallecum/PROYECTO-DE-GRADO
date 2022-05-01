-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-05-2022 a las 06:11:40
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
  `Id_estudiante` int(11) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `tipo_actividad` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_aplicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de aplicacion de los trabajos a las actividades ';

--
-- Volcado de datos para la tabla `tbl_aplicaciondetrabajos`
--

INSERT INTO `tbl_aplicaciondetrabajos` (`Id`, `Id_estudiante`, `id_trabajo`, `id_actividad`, `tipo_actividad`, `fecha_aplicacion`) VALUES
(4, 38, 6, 93, 'EVENTO', '2022-04-10'),
(5, 38, 7, 2, 'CONVOCATORIA', '2022-04-11'),
(9, 38, 12, 92, 'EVENTO', '2022-04-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aplicacioneportafolio`
--

CREATE TABLE `tbl_aplicacioneportafolio` (
  `Id` int(11) NOT NULL,
  `Id_portafolioEstudiante` int(11) NOT NULL,
  `id_convocatoria` int(11) NOT NULL,
  `fecha_aplicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tablade aplicacion de eportafolios a convocatorias';

--
-- Volcado de datos para la tabla `tbl_aplicacioneportafolio`
--

INSERT INTO `tbl_aplicacioneportafolio` (`Id`, `Id_portafolioEstudiante`, `id_convocatoria`, `fecha_aplicacion`) VALUES
(3, 38, 17, '2022-04-11'),
(4, 38, 18, '2022-04-11'),
(5, 41, 17, '2022-04-15');

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
(87, 'MATERIA DE PRUEBA', '1224', '2', 'Electiva Profes', 'Nocturna', '3f', 29),
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
(1, 1, 'a.1', 'Estará en la capacidad de abstraer las variables de diferente orden a partir de múltiples descripciones de un proceso para diseñar un algoritmo que pueda ser representado en lenguaje artificial.', 'Maestro de los procesos', '4X4ocy.jpg', 'osHBYa.jpg', 'ohfj1l.jpg'),
(2, 1, 'a.2', 'Estará en la capacidad de explicar los procesos a partir de la identificación, descripción y relación de variables de diferente orden (artefacto, creencias, medio, hábitos y modelo de producción) que hacen parte de un proceso para desarrollar sistemas de información.', 'Maestro de los procesos', 'kMQX1R.jpg', '', 'y4Kd5T.jpg'),
(20, 1, 'a.3', 'Estará en la capacidad de determinar desde una perspectiva multicausal el impacto de la operación de un sistema de información al interior de una organización y gestionar el cambio y/o transferencia.', 'Maestro de los procesos', 'kSLbm5.jpg', 'lcEFJC.jpg', 'AEQLKF.jpg'),
(24, 2, 'b.1', 'Estará en la capacidad de identificar y describir los procesos de su entorno de acción para hallar sus determinantes e implicaciones más relevantes en una organización.', 'Maestro de los procesos', '1UsKKn.jpg', 'NRxXVs.jpg', '8ogXVL.jpg'),
(25, 2, 'b.2', 'Estará en la capacidad de llevar a cabo procesos de abstracción para identificar las variables y sus relaciones en los procesos.', 'Maestro de los procesos', 'ZJ35C1.jpg', '5H69F7.jpg', '2FOwge.jpg'),
(26, 2, 'b.3', 'Estará en la capacidad de proponer modelos a partir de la identificación de las variables y sus relaciones para tener una visión sistémica del proceso y proponer oportunidades de negocio.', 'Virtuoso tecnologico', '6HQ17W.jpg', '42eBHM.jpg', '2BYFxc.jpg'),
(27, 2, 'b.4', 'Estará en la capacidad de traducir los modelos a lenguaje artificial para contribuir a la eficacia de los procesos organizacionales.', 'Virtuoso tecnologico', 'IYgnft.jpg', 'RtZhnI.jpg', 'UVwdEt.jpg'),
(28, 3, 'c.1', 'Estará en la capacidad de utilizar herramientas para el diseño y modelado de software, utilizando patrones de diseño adecuados, garantizando el cumplimiento de estándares.', 'Virtuoso tecnologico', 'LoV7tP.jpg', '21ukGt.jpg', 'UkBRF3.jpg'),
(29, 3, 'c.2', 'Estará en la capacidad de utilizar ambientes de desarrollo integrados y lenguajes de programación para la construcción de software con base en diseños previamente elaborados, optimizando procesos.', 'Virtuoso tecnologico', 'oWt14Y.jpg', 'uVvXqH.jpg', 'JgOJ72.jpg'),
(30, 3, 'c.3', 'Estará en la capacidad de diseñar y construir bases de datos para la toma de decisiones, garantizando la consistencia y oportunidad de la información generada.', 'Virtuoso tecnologico', 'KPYamI.jpg', 'vSazUW.jpg', 'RuJGPS.jpg'),
(31, 3, 'c.4', 'Estará en la capacidad de proponer alternativas para procurar la disponibilidad y el alto grado de desempeño de un sistema de información a través del análisis de su contexto y evaluación de los elementos que conforman su infraestructura tecnológica.', 'Virtuoso tecnologico', 'lpGIk6.jpg', 'Lzewj6.jpg', 'W1Vtu1.jpg'),
(32, 3, 'c.5', 'Estará en la capacidad de aplicar los criterios básicos de seguridad, en los sistemas de información para proteger la información y garantizar la continuidad del negocio.', 'Virtuoso tecnologico', 'FsSzIR.jpg', 'dbkz4g.jpg', '2JlOSZ.jpg'),
(33, 4, 'd.1', 'Estará en la capacidad de reconocer el entorno en el cual ejercerá su profesión para saber cómo tomar decisiones adecuadas para el desarrollo de un proyecto.', 'Noble lider', 'tJWKpr.jpg', 'KU7ZGr.jpg', 'Wu2FlO.jpg'),
(34, 4, 'd.2', 'Estará en la capacidad de reconocer su entorno local y sus oportunidades de negocio para proyectarlas a entornos locales y globales.', 'Noble lider', '6DUX4h.jpg', 'hMqmhm.jpg', 'qaNYp4.jpg'),
(35, 4, 'd.3', 'Estará en la capacidad de concebirse a sí mismo como una empresa basada en el aprendizaje y la gestión del conocimiento para gestionar sus proyectos en un ambiente laboral dinámico.', 'Noble lider', '2Ggiae.jpg', '6o6DIV.jpg', 'qaXCCr.jpg'),
(36, 4, 'd.4', 'Estará en la capacidad de elaborar y presentar propuestas desde una visión compleja de las problemáticas y desde la interpretación de la perspectiva del cliente con el fin de ofrecer soluciones más eficaces.', 'Noble lider', '3VKdnO.jpg', '5sIdkg.jpg', 'xHDxIP.jpg'),
(37, 5, 'e.1', 'Estará en la capacidad de formular proyectos a partir de la descripción y explicación de los contextos y las perspectivas de las organizaciones e individuos para contribuir al logro de sus objetivos estratégicos.', 'Maestro de los procesos', 'QpFtwl.jpg', '5P77ha.jpg', 'xdDChV.jpg'),
(38, 5, 'e.2', 'Estará en la capacidad de evaluar la viabilidad de un proyecto (diseño, mercado, organización, económico, social, ambiental, cultural) de base tecnológica, desde una visión sistémica enmarcada en el modelo biopsicosocial y cultural, para que la organización pueda tomar la decisión de su ejecución de acuerdo con el impacto previsto.', 'Maestro de los procesos', 'JmmgnQ.jpg', 'L7xG87.jpg', 'y1XNW1.jpg'),
(39, 5, 'e.3', 'Estará en la capacidad de planear y ejecutar un proyecto usando métodos y herramientas acordes al contexto y la perspectiva del cliente, para facilitar el camino hacia el logro de los objetivos planteados.', 'Noble lider', 'Wx3XXT.jpg', 'oIpLMw.jpg', 'pJU96K.jpg'),
(40, 5, 'e.4', 'Estará en la capacidad de evaluar las implicaciones conómicas, sociales, culturales, políticas, ambientales, éticas de un proyecto para decidir si participa en su ejecución.', 'Noble lider', 'UsptYW.jpg', 'ktYkw6.jpg', 'uCk2iJ.jpg'),
(41, 5, 'e.5', 'Estará en la capacidad de gestionar de manera interdisciplinaria (Ciencias sociales, ingeniería, ...) cambios a la cultura organizacional para asimilar las nuevas tecnologías y las condiciones derivadas (impacto) de su adopción en la implementación de un proyecto.', 'Noble lider', 'wyHwnY.jpg', '6AVHhJ.jpg', 'Pboqi8.jpg'),
(42, 6, 'f.1', 'Estará en la capacidad de encontrar respuestas a preguntas formuladas en la comprensión de problemáticas, útiles para el planteamiento, desarrollo y operaciónde soluciones de tecnología.', 'Maestro de los procesos', 'UDRogJ.jpg', 'uMbLHj.jpg', 'sWWbnQ.jpg'),
(43, 6, 'f.2', 'Estará en la capacidad de generar transformación social al reconocer las variables que conforman un proceso y al generar tecnología para transformarlas.', 'Maestro de los procesos', '3wbyLE.jpg', '8HimDP.jpg', 'nVSBuN.jpg'),
(44, 6, 'f.3', 'Estará en la capacidad de Interpretar de distintas formas las situaciones problémicas y visualiza una variedad de respuestas ante un problema o circunstancia con el fin de encontrar diferentes alternativas de solución a los problemas.', 'Maestro de los procesos', 'A78pJZ.jpg', 'N7fuSp.jpg', 'idhZca.jpg'),
(45, 7, 'g.1', 'Estará en la capacidad de identificar las variables que hacen parte de una problemática en un contexto para plantear problemas de investigación tecnológica desde el enfoque biopsicosocial y cultural de la UEB.', 'Maestro de los procesos', '8tkfVa.jpg', '9QV7l5.jpg', 'TTDNsB.jpg'),
(46, 7, 'g.2', 'Estará en la capacidad de construir un marco teórico para un proyecto tecnológico y sustentarlo de forma oral y escrita con base en el problema, la metodología y la tecnología elegida.', 'Noble lider', 'igsxW4.jpg', 'LNKOUx.jpg', 'bXRAqw.jpg'),
(47, 7, 'g.3', 'Estará en la capacidad de seleccionar y aplicar los instrumentos de investigación adecuados para prever y analizar el impacto de un proyecto tecnológico en su contexto de incidencia.', 'Maestro de los procesos', 'Yb5q2E.jpg', 'K7OeLe.jpg', 'rvwwKF.jpg'),
(48, 7, 'g.4', 'Estará en la capacidad de proponer soluciones innovadoras para contribuir al mejoramiento de la calidad de vida de las personas.', 'Virtuoso tecnologico', 'PZ21cv.jpg', 'VX56GU.jpg', 'Z768qa.jpg'),
(49, 7, 'g.5', 'Estará en la capacidad de analizar las implicaciones éticas y bioéticas de un  proyecto de investigación tecnológica para decidir su participación y/o acciones a tomar.', 'Noble lider', 'ILNGyJ.jpg', 'OMMWU6.jpg', 'bdCVaa.jpg'),
(50, 8, 'h.1', 'Estará en la capacidad de recolectar e interpretar información por medio de instrumentos de investigación y en procesos de interacción social con los actores de diferentes niveles organizacionales y/o disciplinas para garantizar una comunicación eficaz con los miembros del equipo.', 'Noble lider', '7TdrD4.jpg', 'ziI4gf.jpg', 'qx6j4i.jpg'),
(51, 8, 'h.2', 'Estará en la capacidad de indagar e interpretar contextos y traducirlos en modelos (diagrama de proceso, BPM, diagramas de ciclos causales, diagramas de niveles y flujos, entre otros) para validar el entendimiento de los requerimientos.', 'Maestro de los procesos', 'PUxy94.jpg', 'R5fZYp.jpg', 'rhEOYi.jpg'),
(52, 8, 'h.3', 'Estará en la capacidad de analizar los puntos de vista de los individuos involucrados en el contexto para interactuar efectivamente.', 'Noble lider', 'pqXi8W.jpg', 'sCqFkJ.jpg', 'Igqvfk.jpg'),
(53, 8, 'h.4', 'Estará en capacidad de gestionar grupos para el cumplimiento de los objetivos de un proyecto.', 'Noble lider', 'llvELG.jpg', 'gUuO4D.jpg', 'zYaSsm.jpg'),
(54, 9, 'i.1', 'Estará en capacidad de interpretar y analizar textos en inglés para el diseño de proyectos, realización de trabajos y mantenerse actualizado en las tendencias de la disciplina.', 'Explorador', 'F6kAvs.jpg', 'naJTzr.jpg', 'VYwl5H.jpg'),
(55, 10, 'j.1', 'Estará en la capacidad de aplicar las normas, los estándares y los modelos propios de la ingeniería, tales como ISO e IEEE, para alcanzar niveles adecuados de modularidad, escalabilidad, desempeño, seguridad, disponibilidad y oportunidad en los productos.', 'Noble lider', 'tk4Kv2.jpg', '8ovxjq.jpg', 'LIt4eq.jpg'),
(56, 10, 'j.2', 'Estará en la capacidad de cumplir con los requerimientos funcionales y no funcionales acordados con el usuario en el desarrollo de productos y servicios tecnológicos, aplicando el ciclo CDIO (Concebir, Diseñar, Implementar y Operar).', 'Maestro de los procesos', 'B3vIWv.jpg', '8p3mTV.jpg', 'hsxVy1.jpg'),
(57, 10, 'j.3', 'Estará en la capacidad de reconocer los objetivos estratégicos, las políticas organizacionales y de llevar a cabo las acciones necesarias para que el área de tecnología esté en consonancia con la organización, utilizando marcos de trabajo de arquitectura empresarial, gobierno de TIC y de madurez tecnológica.', 'Noble lider', 'kHP7VB.jpg', 'WmQuus.jpg', '4o4odU.jpg'),
(58, 10, 'j.4', 'Estará en la capacidad de utilizar los estándares de gerencia de proyectos con el objetivo de incrementar la probabilidad de éxito de los proyectos dentro de los parámetros de calidad, costo, tiempo y desempeño previamente fijados.', 'Noble lider', 'Q7Gkal.jpg', 'Oz7PJR.jpg', 'fWzJll.jpg'),
(59, 11, 'k.1', 'Estará en la capacidad de interpretar el entorno usando el modelo BPSC para descubrir y plantear oportunidades de negocio de base tecnológica.', 'Maestro de los procesos', 'AcyGUZ.jpg', 'g5yjyP.jpg', '6byaV8.jpg'),
(60, 11, 'k.2', 'Estará en la capacidad de evaluar alternativas de negocio siguiendo una metodología de análisis multicriterio para elegir la más conveniente de acuerdo con su propósito.', 'Noble lider', 'qzTn8P.jpg', 'setYOv.jpg', 'NbvM7H.jpg'),
(61, 11, 'k.3', 'Estará en la capacidad de desarrollar proyectos para materializar posibilidades de negocio.', 'Noble lider', 'qoDQON.jpg', 'x15J5y.jpg', 'cgLcdT.jpg'),
(62, 12, 'l.1', 'Estará en la capacidad de identificar el contexto, los actores, sus interacciones y necesidades, así como las variables controlables y no controlables, para modelar una situación del entorno real lo más fiel posible, con el propósito de establecer los factores que afectan el proceso del diseño de los sistemas de información.', 'Maestro de los procesos', 'GVsBNs.jpg', 'lIRb8x.jpg', '5aMQWc.jpg'),
(63, 12, 'l.2', 'Estará en la capacidad de comprender las interacciones de los actores, adoptando las diversas metodologías, técnicas y herramientas (actuales y acordes a la disciplina), con el fin de construir sistemas de información con la calidad requerida.', 'Maestro de los procesos', '1nSUPE.jpg', 'grAEw3.jpg', 'fjV1YI.jpg');

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
(1, 'A', 'Formado dentro del enfoque biopsicosocial y cultural.', 'Maestro de los procesos', 'Gsc9vf.jpg', 'OmPDco.jpg', 'Z2PIS6.jpg'),
(2, 'B', 'Profesional con sólidos conocimientos en informática.', 'Maestro de los procesos', '3OYXlm.jpg', 'baxyNU.jpg', 'BlhSSH.jpg'),
(3, 'C', 'Diseña y construye sistemas de información.', 'virtuoso tecnológico', '3hsjNH.jpg', 'q7Lod6.jpg', 'Ya9f9V.jpg'),
(4, 'D', 'Está en la capacidad de ejercer su profesión en contextos locales y globales.', 'Noble lider', 'HP4gml.jpg', 'CszPz3.jpg', 'TuxpCV.jpg'),
(5, 'E', 'Propone y gestiona proyectos para la transferencia adecuada y responsable de las tecnologías de la información y las comunicaciones.', 'Noble lider', 'FPofI1.jpg', 'prTHzP.jpg', 'vRK1Sg.jpg'),
(6, 'F', 'Posee actitud crítica e investigativa.', 'Maestro de los procesos', 'Xj8QXZ.jpg', '4qQTei.jpg', '3O3BfP.jpg'),
(7, 'G', 'Está capacitado para investigar generando conocimiento que proporcione valor agregado dentro de la profesión.', 'Maestro de los procesos', 'eBDOdS.jpg', 'Ysl3Si.jpg', 'q7FZhT.jpg'),
(8, 'H', 'Trabajo en equipos interdisciplinarios.', 'Noble lider', 'St2E8H.jpg', 'jG9g7s.jpg', 'fcsxwq.jpg'),
(9, 'I', 'Manejo de un segundo idioma.', 'Explorador', 'luXDiy.jpg', 'J5Ggra.jpg', ''),
(10, 'J', 'Cumple políticas de calidad, estándares locales y globales.', 'Noble lider', '7vQSSI.jpg', '2FGzcH.jpg', ''),
(11, 'K', 'Emprendimiento.', 'Noble lider', 'k6QKuN.jpg', 'CHNxdl.jpg', 'Xl2zaw.jpg'),
(12, 'L', 'Interpreta el entorno en su complejidad.', 'Maestro de los procesos', 'dqUcjX.jpg', '8FJ2CO.jpg', 'ZQ2xzC.jpg'),
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
(11, 58, 2, 'CONVOCATORIA', 'a.1,a.2,a.3', 'BAJA,N/A,N/A'),
(14, 71, 6, 'DESAFIO', 'a.1,a.2,a.3', 'ALTA,MEDIA,MEDIA'),
(15, 72, 5, 'DESAFIO', 'a.1,a.2,a.3,i.1', 'MEDIA,ALTA,MEDIA,BAJA'),
(16, 73, 7, 'DESAFIO', 'a.1,a.2,a.3,c.1,c.2,c.3,c.4,c.5', 'BAJA,ALTA,N/A,ALTA,MEDIA,ALTA,BAJA,BAJA'),
(17, 74, 8, 'DESAFIO', 'c.1,c.2,c.3,c.4,c.5', 'BAJA,ALTA,MEDIA,ALTA,N/A'),
(18, 75, 9, 'CONVOCATORIA', 'a.1,a.2,a.3', 'BAJA,MEDIA,MEDIA'),
(19, 68, 94, 'EVENTO', 'a.1,a.2,a.3,k.1,k.2,k.3', 'MEDIA,MEDIA,N/A,N/A,ALTA,BAJA');

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
(68, 94, 'EVENTO', '1,11'),
(71, 6, 'DESAFIO', '1'),
(72, 5, 'DESAFIO', '1,9'),
(73, 7, 'DESAFIO', '1,3'),
(74, 8, 'DESAFIO', '3'),
(75, 9, 'CONVOCATORIA', '1');

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
  `competenciasAsignadas` varchar(2) CHARACTER SET utf8mb4 NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de convocatorias del comite';

--
-- Volcado de datos para la tabla `tbl_convocatoriacomite`
--

INSERT INTO `tbl_convocatoriacomite` (`Id`, `nombre_convocatoria`, `descripcion_convocatoria`, `fecha_inicio`, `fecha_fin`, `nombre_imagen`, `nombre_enunciado`, `id_usuario`, `competenciasAsignadas`, `estado`) VALUES
(2, 'CONVOCATORIA SOLO ENUNCIADO', 'convocatoria con solo el enunciado', '2022-01-30', '2022-02-10', 'V4hHhW.jpg', 'x8sJ3M.pdf', 27, 'Si', 'Activo'),
(9, 'CONVOCATORIA PARA PROFE MIGUEL', 'esta convocatoria la creo para el profe miguel', '2022-04-17', '2022-04-22', NULL, 'Nt3YGt.pdf', 29, 'Si', 'Activo'),
(10, 'OTRA CONVOCATORIA', 'otra convocatoria para el profe miguel', '2022-04-18', '2022-04-20', NULL, NULL, 29, 'No', 'Inactivo');

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
(17, 'CONVOCATORIA SIN IMG', 'convocatoria sin imagen', '2022-02-27', '2022-03-12', NULL, 'WcT1oC.pdf'),
(18, 'SE NECESITAN INGENIEROS', 'Importante empresa de telecomunicaciones requiere para su equipo estudiantes de ing de sistemas con dominio de lenguaje Java, aplica ya!!!', '2022-04-10', '2022-04-21', 'rOAVSr.jpg', 'icRjkb.pdf'),
(19, 'SCRUM MASTERS', 'Se requieren estudiantes con experiencia de manejo de metodologías agiles, si cuentas con el perfil aplica ya', '2022-03-27', '2022-04-30', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_desafio`
--

CREATE TABLE `tbl_desafio` (
  `id_desafio` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `nombre_desafio` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_desafio` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `nombre_imagen` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_enunciado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_asignatura` int(3) NOT NULL,
  `competenciasAsignadas` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de desafios';

--
-- Volcado de datos para la tabla `tbl_desafio`
--

INSERT INTO `tbl_desafio` (`id_desafio`, `id_profesor`, `nombre_desafio`, `descripcion_desafio`, `fecha_inicio`, `fecha_fin`, `nombre_imagen`, `nombre_enunciado`, `id_asignatura`, `competenciasAsignadas`, `estado`) VALUES
(5, 29, 'DESAFIOS AMBAS COSAS', 'desafio que tiene tanto imagen como enunciado en formato pdf y toda la actitud jejejejeje.', '2022-04-01', '2022-04-08', 'Uhtom7.jpg', 'Lo1xnK.pdf', 87, 'Si', 'Activo'),
(7, 29, 'DESAFIO GENERAL', 'desafio para probar', '2022-04-03', '2022-04-14', NULL, 'jHgRfW.pdf', 87, 'Si', 'Activo'),
(8, 29, 'DESAFIO PRUEBA APLICACION', 'este desafio lo creo para probar que funcione la aplicacion adesafios', '2022-03-27', '2022-04-20', NULL, NULL, 87, 'Si', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_desafiopersonal`
--

CREATE TABLE `tbl_desafiopersonal` (
  `Id` int(11) NOT NULL,
  `Id_estudiante` int(11) NOT NULL,
  `nombre_desafioP` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_propuesta` date NOT NULL,
  `nombre_imagen` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombre_enunciado` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idDesafioASustituir` int(11) NOT NULL,
  `estado` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `observaciones` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de desafíos personalizados';

--
-- Volcado de datos para la tabla `tbl_desafiopersonal`
--

INSERT INTO `tbl_desafiopersonal` (`Id`, `Id_estudiante`, `nombre_desafioP`, `descripcion`, `fecha_propuesta`, `nombre_imagen`, `nombre_enunciado`, `idDesafioASustituir`, `estado`, `observaciones`) VALUES
(9, 38, 'PROPUESTA PARA VER SI SE ELIM', 'jajajajaja otra propuesta', '2022-04-05', 'uuXTjJ.jpg', NULL, 5, 'Rechazada', 'no me convence, por favor corrija documento'),
(10, 38, 'ESTA PROPUESTA SERA APROBADA', 'propuesta que espero profe me la apruebe', '2022-04-06', NULL, '59Eura.pdf', 5, 'Aprobada', 'Me gusta lo que propone, cuidese mucho'),
(11, 38, 'ESTA PROPUESTA ESTARA EN ESPER', 'Estapropuesta fue creada para probar si se queda en espera', '2022-04-06', '65rLzp.jpg', NULL, 5, 'Entregada', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_eportafolio`
--

CREATE TABLE `tbl_eportafolio` (
  `Id` int(11) NOT NULL,
  `Id_estudiante` int(11) NOT NULL,
  `Id_trabajo` int(11) NOT NULL,
  `nombreArchivoEportafolio` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkPortafolioParaCompartir` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de eportafolios';

--
-- Volcado de datos para la tabla `tbl_eportafolio`
--

INSERT INTO `tbl_eportafolio` (`Id`, `Id_estudiante`, `Id_trabajo`, `nombreArchivoEportafolio`, `linkPortafolioParaCompartir`) VALUES
(1, 38, 1, '', ''),
(2, 38, 2, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_evaluaciondetrabajos`
--

CREATE TABLE `tbl_evaluaciondetrabajos` (
  `Id_evaluacion` int(11) NOT NULL,
  `id_actividad` int(11) NOT NULL,
  `tipo_actividad` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `codigosCompEspecificas` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `nivelesDeContribucion` varchar(800) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de registro de evaluaciones realizadas a los trabajos';

--
-- Volcado de datos para la tabla `tbl_evaluaciondetrabajos`
--

INSERT INTO `tbl_evaluaciondetrabajos` (`Id_evaluacion`, `id_actividad`, `tipo_actividad`, `id_trabajo`, `codigosCompEspecificas`, `nivelesDeContribucion`) VALUES
(21, 5, 'DESAFIO', 9, 'a.1,a.2,a.3,i.1', 'BAJA,BAJA,ALTA,MEDIA'),
(22, 7, 'DESAFIO', 5, 'a.1,a.2,c.1,c.2,c.3,c.4,c.5', 'BAJA,ALTA,MEDIA,MEDIA,MEDIA,ALTA,BAJA'),
(23, 92, 'EVENTO', 11, 'a.1,a.2,a.3', 'BAJA,BAJA,MEDIA'),
(27, 10, 'DESAF PERSONAL', 4, 'a.1,a.2,a.3,i.1', 'MEDIA,MEDIA,ALTA,ALTA'),
(28, 9, 'CONVOCATORIA', 10, 'a.1,a.2,a.3', 'MEDIA,BAJA,ALTA');

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
  `competenciasAsignadas` varchar(2) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_evento`
--

INSERT INTO `tbl_evento` (`id_evento`, `nombre_evento`, `descripcion_evento`, `fecha_inicio`, `fecha_fin`, `nombre_imagen`, `nombre_enunciado`, `id_usuario`, `competenciasAsignadas`, `estado`) VALUES
(81, 'EVENTO DE PRUEBA', 'evento', '2021-12-26', '2021-12-28', 'R8xgqY.jpg', 'HGYFQ5.pdf', 28, 'Si', 'Activo'),
(82, 'PILDORA', 'evento de prueba array', '2021-12-26', '2022-01-22', 'tpHyYG.jpg', NULL, 26, 'Si', 'Activo'),
(92, 'DEBO TERMINAR', 'evento definitivo', '2022-02-27', '2022-03-18', NULL, NULL, 29, 'Si', 'Activo'),
(93, 'MARATON DE PROGRAMACION', 'Participar en las maratones de programación propuestas por el programa.', '2022-03-06', '2022-04-02', NULL, NULL, 28, 'Si', 'Activo'),
(94, 'COMPETENCIA LORE PRUEBA', 'copetencia de prueba no se que', '2022-02-27', '2022-03-25', NULL, NULL, 26, 'Si', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_insigniasganadastrabdestacado`
--

CREATE TABLE `tbl_insigniasganadastrabdestacado` (
  `Id` int(11) NOT NULL,
  `codigo_estudiante` int(11) NOT NULL,
  `id_trabajo` int(11) NOT NULL,
  `tipo_badge` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `id_competencia` int(11) NOT NULL,
  `tipo_competencia` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tablas de insigniasque gano un trabajo destacado';

--
-- Volcado de datos para la tabla `tbl_insigniasganadastrabdestacado`
--

INSERT INTO `tbl_insigniasganadastrabdestacado` (`Id`, `codigo_estudiante`, `id_trabajo`, `tipo_badge`, `id_competencia`, `tipo_competencia`) VALUES
(1, 38, 1, 'ORO', 3, 'GENERAL'),
(2, 38, 3, 'BRONCE', 28, 'ESPECIFICA'),
(3, 38, 1, 'PLATA', 29, 'ESPECIFICA'),
(17, 38, 13, 'PLATA', 26, 'ESPECIFICA'),
(146, 41, 9, 'BRONCE', 1, 'ESPECIFICA'),
(147, 41, 9, 'BRONCE', 2, 'ESPECIFICA'),
(148, 41, 9, 'ORO', 20, 'ESPECIFICA'),
(149, 41, 9, 'PLATA', 54, 'ESPECIFICA'),
(150, 41, 9, 'BRONCE', 1, 'GENERAL'),
(151, 41, 9, 'PLATA', 9, 'GENERAL'),
(152, 38, 5, 'BRONCE', 1, 'ESPECIFICA'),
(153, 38, 5, 'ORO', 2, 'ESPECIFICA'),
(154, 38, 5, 'PLATA', 28, 'ESPECIFICA'),
(155, 38, 5, 'PLATA', 29, 'ESPECIFICA'),
(156, 38, 5, 'PLATA', 30, 'ESPECIFICA'),
(157, 38, 5, 'ORO', 31, 'ESPECIFICA'),
(158, 38, 5, 'BRONCE', 32, 'ESPECIFICA'),
(159, 38, 5, 'PLATA', 3, 'GENERAL'),
(178, 38, 4, 'PLATA', 1, 'ESPECIFICA'),
(179, 38, 4, 'PLATA', 2, 'ESPECIFICA'),
(180, 38, 4, 'ORO', 20, 'ESPECIFICA'),
(181, 38, 4, 'ORO', 54, 'ESPECIFICA'),
(182, 38, 4, 'PLATA', 1, 'GENERAL'),
(183, 38, 4, 'ORO', 9, 'GENERAL'),
(184, 38, 10, 'PLATA', 1, 'ESPECIFICA'),
(185, 38, 10, 'BRONCE', 2, 'ESPECIFICA'),
(186, 38, 10, 'ORO', 20, 'ESPECIFICA'),
(187, 38, 10, 'PLATA', 1, 'GENERAL');

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
(4, 'Comité Curricular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_trabajodestacado`
--

CREATE TABLE `tbl_trabajodestacado` (
  `Id_trabajo` int(11) NOT NULL,
  `Id_estudiante` int(11) NOT NULL,
  `nombre_trabajo` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_imagentrabajo` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_documento` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_video` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_repocodigo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link_presentacion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fueAplicadoAActividad` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `trabajoTieneBadge` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `publicadoeneportafolio` varchar(2) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Tabla de trabajos destacados';

--
-- Volcado de datos para la tabla `tbl_trabajodestacado`
--

INSERT INTO `tbl_trabajodestacado` (`Id_trabajo`, `Id_estudiante`, `nombre_trabajo`, `descripcion`, `nombre_imagentrabajo`, `link_documento`, `link_video`, `link_repocodigo`, `link_presentacion`, `fueAplicadoAActividad`, `trabajoTieneBadge`, `publicadoeneportafolio`) VALUES
(1, 38, 'TRABAJO DESTACADO DE PRUEBA', 'Trabajo destacado que gano una megainsignia, esto lo escribo para probar que se arme el parrafo en el fragmento del eportafolio para tal fin.', NULL, 'https://docs.google.com/spreadsheets/d/1xZyupSIyIx3eP6_ZT4g8fx3cXrY9epawO6OLNi86E68/edit?usp=sharing', 'https://docs.google.com/spreadsheets/d/1xZyupSIyIx3eP6_ZT4g8fx3cXrY9epawO6OLNi86E68/edit?usp=sharing', 'https://github.com/salamallecum/PROYECTO-DE-GRADO', 'https://docs.google.com/presentation/d/1yqIBCF8Pz2JExGyj5OtpS9dp41vvaIx0/edit?usp=sharing&ouid=103121222244404759390&rtpof=true&sd=true', 'No', 'Si', 'Si'),
(3, 38, 'TRABAJO DESTACADO DE PRUEBA 3 ', 'trabajo destacado que gano un insignia', NULL, NULL, NULL, 'https://github.com/salamallecum/PROYECTO-DE-GRADO', NULL, 'No', 'Si', 'Si'),
(4, 38, 'PROYECTO DE CLASE', 'proyecto realizado parala clase de mamar gallo, fue con mucho esfuerzo, hubieron peleas entre mis compañeros pero todo salió bien jejeje.hola hola jajajajaja estoy probando el scrolll del content.', NULL, NULL, 'https://www.youtube.com/watch?v=fOQNW5IEvxo', 'https://proyectogrado.atlassian.net/secure/RapidBoard.jspa?rapidView=1&projectKey=C', NULL, 'No', 'Si', 'Si'),
(5, 38, 'MI PRIMER TRABAJO DESTACADO', 'mi primer trabajo destacado creado desde plataforma', NULL, 'https://getbootstrap.com/docs/4.0/content/reboot/#forms', 'https://www.youtube.com/watch?v=3kJV_oXw-Hc&list=RD3Oi-PBD7khk&index=6', NULL, NULL, 'No', 'Si', 'Si'),
(6, 38, 'TRABAJO DEST CON IMG', 'trabajo destacado con img', 'aFl4qG.jpg', 'https://getbootstrap.com/docs/4.0/content/reboot/#forms', NULL, 'https://www.youtube.com/watch?v=3kJV_oXw-Hc&list=RD3Oi-PBD7khk&index=6', NULL, 'Si', 'No', 'No'),
(7, 38, 'TRABAJO AGREGADO A EPORTAFOLIO', 'fue agregado al eportafolio', '9ikApN.jpg', 'https://www.youtube.com/watch?v=4UDC6YfLdvY&list=RD3Oi-PBD7khk&index=12', NULL, NULL, NULL, 'Si', 'No', 'Si'),
(9, 41, 'TRABAJO DE PRUEBA LORE', 'trabajo destacado de prueba para mirar si se postula', NULL, 'https://diego.com.es/comparacion-de-strings-en-php', NULL, NULL, NULL, 'No', 'Si', 'Si'),
(10, 38, 'TRABAJO PARA EL PROFE MIGUEL', 'trabajo para aplicar a la convocatoria del profe miguel', 'NHh1tI.jpg', 'https://www.unbosque.edu.co/', NULL, NULL, NULL, 'No', 'Si', 'Si'),
(11, 41, 'MI TRABAJO ES MUY BONITO', 'profe quiero decirle que mi trabajo es muy bonito y le vaa gustar, pongame 5.', '3gv3Gb.jpg', NULL, 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQ70d9AybNx_OWbcR4fU6xgdCFHqRDK_yT6Uvw4lT8AkvrXUAGllhdoeJOxdyoqFKj9OGAJsUBSFYQZ/pubhtml?gid=1702843235', NULL, NULL, 'No', 'Si', 'Si'),
(12, 38, 'TRABAJO QUE POSTULO AL EVENTO', 'este trabajo lo postulo a levento para probar si se acumulan', NULL, NULL, NULL, NULL, 'https://docs.google.com/spreadsheets/d/e/2PACX-1vQ70d9AybNx_OWbcR4fU6xgdCFHqRDK_yT6Uvw4lT8AkvrXUAGllhdoeJOxdyoqFKj9OGAJsUBSFYQZ/pubhtml?gid=1702843235', 'Si', 'No', 'No'),
(13, 38, 'BASE DE DATOS RELACIONAL', 'Base de datos relacional presentada para el desafio propuesto en Ingeniería de software', NULL, 'https://drive.google.com/file/d/1ObsrPM0ZoXE4glD8vm9MMAmWBkqnerQ7/view?usp=sharing', NULL, NULL, NULL, 'No', 'Si', 'Si');

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
  `direccion` varchar(20) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo_usuario` varchar(40) DEFAULT NULL,
  `foto_usuario` varchar(10) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `eportafolioPublicado` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombres_usuario`, `apellidos_usuario`, `username`, `clave`, `pais`, `ciudad`, `direccion`, `telefono`, `correo_usuario`, `foto_usuario`, `descripcion`, `id_rol`, `eportafolioPublicado`) VALUES
(26, 'Guiovanna Paola', 'Sabogal Alfaro', 'guiovanna', 'Password1*', 'Colombia', NULL, NULL, '', 'guiovannasabogal@unbosque.edu.co', NULL, NULL, 2, NULL),
(27, 'Diana Marcela', 'Jimenez', 'dmajimenez', 'Password1*', 'Colombia', NULL, NULL, '', 'dmajimenezr@unbosque.edu.co', NULL, NULL, 2, NULL),
(28, 'Frank Ernesto', 'Romero Alvarez', 'fromeroa', 'Password1*', 'Colombia', NULL, NULL, '', 'fromeroa@unbosque.edu.co', NULL, NULL, 2, NULL),
(29, 'Miguel Alfonso', 'Feijoo Garcia', 'mfeijoog', 'jajajajaja', 'Colombia', 'Bogotá', 'Calle 13', '12345', 'mfeijoog@unbosque.edu.co', 'dymKoB.jpg', 'Profesor de proyecto de grado con énfasis en ciencia de datos, me gusta mucho jugar en el PC.', 2, NULL),
(30, 'Ricardo', 'Camargo Lemos', 'rcamargol', 'Password1*', 'Colombia', NULL, NULL, '', 'rcamargol@unbosque.edu.co', NULL, NULL, 2, NULL),
(31, 'Sandra Milena', 'Ayala Suarez', 'smayala', 'Password1*', 'Colombia', NULL, NULL, '', 'smayala@unbosque.edu.co', NULL, NULL, 3, NULL),
(38, 'Luis Alejandro', 'Amaya Torres', 'lamayat', 'holajeje', 'Colombia', 'Bogotá', 'Cra 7c # 182-27', '3334567', 'lamayat@unbosque.edu.co', 'Axz8Lg.jpg', 'Estudiante de Ingeniería de Sistemas con conocimientos sólidos de programación en lenguaje Java, Python; Desarrollo web mediante JavaScript, HTML5, CSS; Gestión de Bases de datos mediante MySQL, PostgreSQL, SQLite y Desarrollo de apps móviles.', 1, 'No'),
(39, 'Leonardo Arturo', 'Brijaldo Calle', 'lbrijaldo', 'Password12', 'Colombia', NULL, NULL, NULL, 'lbrijaldo@unbosque.edu.co', NULL, NULL, 1, 'No'),
(40, 'Comite', 'Curriculo', 'comiteU', 'Ubosque22*', 'Colombia', 'Bogotá', NULL, NULL, 'opcionesdegrado.sistemas@unbosque.edu.co', NULL, NULL, 4, NULL),
(41, 'Heidy Lorena', 'Rodriguez Diaz', 'hrodriguez', 'miPerro*', 'Colombia', NULL, NULL, NULL, 'hlrodriguez@unbosque.edu.co', NULL, NULL, 1, 'Si'),
(42, 'Evelyn  Adriana', 'Maldonado Reyes', 'emaldonado', 'Pepito234*', 'Colombia', NULL, NULL, NULL, 'emaldonador@unbosque.edu.co', NULL, NULL, 1, 'No'),
(43, 'Ana Maria', 'Torres', 'anamaria', '12345*', 'Colombia', NULL, NULL, NULL, 'anatorres161@gmail.com', NULL, NULL, 1, 'No');

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
-- Indices de la tabla `tbl_desafio`
--
ALTER TABLE `tbl_desafio`
  ADD PRIMARY KEY (`id_desafio`),
  ADD KEY `id_asignatura` (`id_asignatura`);

--
-- Indices de la tabla `tbl_desafiopersonal`
--
ALTER TABLE `tbl_desafiopersonal`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_eportafolio`
--
ALTER TABLE `tbl_eportafolio`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_evaluaciondetrabajos`
--
ALTER TABLE `tbl_evaluaciondetrabajos`
  ADD PRIMARY KEY (`Id_evaluacion`);

--
-- Indices de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_insigniasganadastrabdestacado`
--
ALTER TABLE `tbl_insigniasganadastrabdestacado`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_trabajodestacado`
--
ALTER TABLE `tbl_trabajodestacado`
  ADD PRIMARY KEY (`Id_trabajo`);

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tbl_aplicacioneportafolio`
--
ALTER TABLE `tbl_aplicacioneportafolio`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_contribcompgenerales_actividad`
--
ALTER TABLE `tbl_contribcompgenerales_actividad`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `tbl_convocatoriacomite`
--
ALTER TABLE `tbl_convocatoriacomite`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tbl_convocatoriapracticas`
--
ALTER TABLE `tbl_convocatoriapracticas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `tbl_desafio`
--
ALTER TABLE `tbl_desafio`
  MODIFY `id_desafio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_desafiopersonal`
--
ALTER TABLE `tbl_desafiopersonal`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tbl_eportafolio`
--
ALTER TABLE `tbl_eportafolio`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_evaluaciondetrabajos`
--
ALTER TABLE `tbl_evaluaciondetrabajos`
  MODIFY `Id_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tbl_evento`
--
ALTER TABLE `tbl_evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `tbl_insigniasganadastrabdestacado`
--
ALTER TABLE `tbl_insigniasganadastrabdestacado`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_trabajodestacado`
--
ALTER TABLE `tbl_trabajodestacado`
  MODIFY `Id_trabajo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

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
