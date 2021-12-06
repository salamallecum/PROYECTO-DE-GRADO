-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pandora
CREATE DATABASE IF NOT EXISTS `pandora` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pandora`;

CREATE TABLE IF NOT EXISTS `tbl_rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_rol: ~5 rows (approximately)
/*!40000 ALTER TABLE `tbl_rol` DISABLE KEYS */;
INSERT INTO `tbl_rol` (`id_rol`, `nombre_rol`) VALUES
	(1, 'Estudiante'),
	(2, 'Profesor'),
	(3, 'Coordinación Prácticas'),
	(4, 'Comité Curricular'),
	(5, 'Administrador');
/*!40000 ALTER TABLE `tbl_rol` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombres_usuario` varchar(50) DEFAULT NULL,
  `apellidos_usuario` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `correo_usuario` varchar(50) DEFAULT NULL,
  `foto_usuario` varchar(120) DEFAULT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `tbl_usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tbl_rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_usuario: ~6 rows (approximately)
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` (`id_usuario`, `nombres_usuario`, `apellidos_usuario`, `username`, `password`, `pais`, `ciudad`, `direccion`, `correo_usuario`, `foto_usuario`, `descripcion`, `id_rol`) VALUES
	(3, 'Heidy Lorena', 'Rodríguez Díaz', 'hlrodriguez', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Colombia', 'Bogotá', 'Calle 18 # 8-4', 'hlrodriguez@unbosque.edu.co', 'users/estudiante/YtDNKdCdnamf6mOg729PoXdPLTjgbWAGAL3OzE6V.jpg', NULL, 1),
	(4, 'Luis Alejandro', 'Amaya Torres', 'lamayat', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '', '', 'lamayat@unbosque.edu.co', '[]', '', 1),
	(5, 'Sandra Milena', 'Ayala Suarez', 'smayala', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Colombia', 'Bogotá', 'Calle 18 # 78055', 'smayala@unbosque.edu.co', 'users/profesor/8mKdBqYILO0nIRfphIGkLbZExRAo8tJGssX86qey.png', 'Prueba Perfil', 3),
	(6, 'Guiovanna Paola', 'Sabogal Alfaro', 'gsabogal', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '', '', 'guiovannasabogal@unbosque.edu.co', '[]', '', 2),
	(7, 'Usuario', 'Comité', 'usrcomite', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '', '', 'hlrodriguez@unbosque.edu.co', '[]', '', 4),
	(8, 'Usuario', 'Administrador', 'usradmin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '', '', '', 'hlrodriguez@unbosque.edu.co', '[]', '', 5);

-- Dumping structure for table pandora.tbl_asignatura
CREATE TABLE IF NOT EXISTS `tbl_asignatura` (
  `id_asignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_asignatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_asignatura: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_asignatura` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_asignatura` ENABLE KEYS */;

CREATE TABLE IF NOT EXISTS `tbl_competencia_general` (
  `id_comp_gral` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comp_gral` varchar(200) NOT NULL,
  PRIMARY KEY (`id_comp_gral`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_competencia_general: ~12 rows (approximately)
/*!40000 ALTER TABLE `tbl_competencia_general` DISABLE KEYS */;
INSERT INTO `tbl_competencia_general` (`id_comp_gral`, `nombre_comp_gral`) VALUES
	(1, 'Formado dentro del enfoque biopsicosocial y cultural'),
	(2, 'Profesional con sólidos conocimientos en informática.'),
	(3, 'Diseño y construcción de sistemas de información.'),
	(4, 'Está en la capacidad de ejercer su profesión en contextos locales y globales.'),
	(5, 'Propone y gestiona proyectos para la transferencia adecuada y responsable de las tecnologías de la información y las comunicaciones.'),
	(6, 'Actitud crítica e investigativa.'),
	(7, 'Está capacitado para investigar generando conocimiento que proporcione valor agregado dentro de la profesión.'),
	(8, 'Trabajo en equipos interdisciplinarios.'),
	(9, 'Manejo de un segundo idioma.'),
	(10, 'Cumple políticas de calidad estándares locales y globales.'),
	(11, 'Emprendimiento.'),
	(12, 'Interpreta el entorno en su complejidad');
/*!40000 ALTER TABLE `tbl_competencia_general` ENABLE KEYS */;

-- Dumping structure for table pandora.tbl_competencia_especifica
CREATE TABLE IF NOT EXISTS `tbl_competencia_especifica` (
  `id_comp_esp` int(11) NOT NULL AUTO_INCREMENT,
  `id_comp_gral` int(11) NOT NULL,
  `nombre_competencia_esp` varchar(400) NOT NULL,
  PRIMARY KEY (`id_comp_esp`),
  KEY `id_comp_gral` (`id_comp_gral`) USING BTREE,
  CONSTRAINT `fk_id_comp_gral` FOREIGN KEY (`id_comp_gral`) REFERENCES `tbl_competencia_general` (`id_comp_gral`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_competencia_especifica: ~45 rows (approximately)
/*!40000 ALTER TABLE `tbl_competencia_especifica` DISABLE KEYS */;
INSERT INTO `tbl_competencia_especifica` (`id_comp_esp`, `id_comp_gral`, `nombre_competencia_esp`) VALUES
	(1, 1, 'Estará en la capacidad de abstraer las variables de diferente orden a partir de múltiples descripciones de un proceso para diseñar un algoritmo que pueda ser representado en lenguaje artificial'),
	(2, 1, 'Estará en la capacidad de explicar los procesos a partir de la identificación, descripción y relación de variables de diferente orden (artefacto, creencias, medio, hábitos y modelo de producción) que que hacen parte de un proceso para desarrollar sistemas de información.'),
	(20, 1, 'Estará en la capacidad de determinar desde una perspectiva multicausal el impacto de la operación de un sistema de información al interior de una organización y\r\ngestionar el cambio o/y transferencia'),
	(21, 1, 'Estará en la capacidad de abstraer las variables de diferente orden a partir de múltiples descripciones de un proceso para diseñar un algoritmo que pueda ser representado en lenguaje artificial.'),
	(23, 1, 'Estará en la capacidad de determinar desde una perspectiva multicausal el impacto de la operación de un sistema de información al interior de una organización y\r\ngestionar el cambio o/y transferencia de tecnología'),
	(24, 2, 'Estará en la capacidad de identificar y describir los procesos de su entorno de acción para hallar sus determinantes e implicaciones más relevantes en una organización.'),
	(25, 2, 'Estará en la capacidad de llevar a cabo procesos de abstracción para Identificar las variables y sus relaciones en los procesos.'),
	(26, 2, 'Estará en la capacidad de proponer modelos a partir de la identificación de las variables y sus relaciones para tener una visión sistémica del proceso y proponer oportunidades de negocio.'),
	(27, 2, 'Estará en la capacidad de traducir los modelos a lenguaje artificial para contribuir a la eficacia de los procesos organizacionales.'),
	(28, 3, 'Estará en la capacidad de utilizar herramientas para el diseño y modelado de software, utilizando patrones de diseño adecuados, garantizando el cumplimiento de estándares.'),
	(29, 3, 'Estará en la capacidad de utilizar ambientes de desarrollo integrados y lenguajes de programación para la construcción de software con base en diseños previamente\r\nelaborados, optimizando procesos.'),
	(30, 3, 'Estará en la capacidad de diseñar y construir bases de datos para la toma de decisiones, garantizando la consistencia y oportunidad de la información generada.'),
	(31, 3, 'Estará en la capacidad de proponer alternativas para procurar la disponibilidad y el alto grado de desempeño de un sistema de información a través del análisis de su\r\ncontexto y evaluación de los elementos que conforman su infraestructura tecnológica.'),
	(32, 3, 'Estará en la capacidad de aplicar los criterios básicos de seguridad, en los sistemas de información para proteger la información y garantizar la continuidad del negocio.'),
	(33, 4, 'Estará en la capacidad de reconocer el entorno en el cual ejercerá su profesión para saber cómo tomar decisiones adecuadas para el desarrollo de un proyecto.'),
	(34, 4, 'Estará en la capacidad de reconocer su entorno local y sus oportunidades de negocio para proyectarlas a entornos locales y globales.'),
	(35, 4, 'Estará en la capacidad de concebirse a sí mismo como una empresa basada en el aprendizaje y la gestión del conocimiento para gestionar sus proyectos en un ambiente laboral dinámico.'),
	(36, 4, 'Estará en la capacidad de elaborar y presentar propuestas desde una visión compleja de las problemáticas y desde la interpretación de la perspectiva del cliente con el fin de ofrecer soluciones más eficaces.'),
	(37, 5, 'Estará en la capacidad de formular proyectos a partir de la descripción y explicación de los contextos y las perspectivas de las organizaciones e individuos para contribuir al logro de sus objetivos estratégicos.'),
	(38, 5, 'Estará en la capacidad de evaluar la viabilidad de un proyecto (diseño, mercado, organización, económico, social, ambiental, cultural) de base tecnológica, desde una visión sistémica enmarcada en el modelo biopsicosocial y cultural, para que la organización pueda tomar la decisión de su ejecución de acuerdo con el impacto previsto.'),
	(39, 5, 'Estará en la capacidad de planear y ejecutar un proyecto usando métodos y herramientas acordes al contexto y la perspectiva del cliente, para facilitar el camino hacia el logro de los objetivos planteados.'),
	(40, 5, 'Estará en la capacidad de evaluar las implicaciones conómicas, sociales, culturales, políticas, ambientales, éticas de un proyecto para decidir si participa en su ejecución.'),
	(41, 5, 'Estará en la capacidad de gestionar de manera interdisciplinaria (Ciencias sociales, ingeniería, ...) cambios a la cultura organizacional para asimilar las nuevas tecnologías y las condiciones derivadas (impacto) de su adopción en la implementación de un proyecto.'),
	(42, 6, 'Estará en la capacidad de encontrar respuestas a preguntas formuladas en la comprensión de problemáticas, útiles para el planteamiento, desarrollo y operación\r\nde soluciones de tecnología.'),
	(43, 6, 'Estará en la capacidad de generar transformación social al reconocer las variables que conforman un proceso y al generar tecnología para transformarlas.'),
	(44, 6, 'Estará en la capacidad de Interpretar de distintas formas las situaciones problémicas y visualiza una variedad de respuestas ante un problema o circunstancia con el fin de encontrar diferentes alternativas de solución a los problemas.'),
	(45, 7, 'Estará en la capacidad de identificar las variables que hacen parte de una problemática en un contexto para plantear problemas de investigación tecnológica desde el enfoque biopsicosocial y cultural de la UEB.'),
	(46, 7, 'Estará en la capacidad de construir un marco teórico para un proyecto tecnológico y sustentarlo de forma oral y escrita con base en el problema, la metodología y la tecnología elegida.'),
	(47, 7, 'Estará en la capacidad de seleccionar y aplicar los instrumentos de investigación adecuados para prever y analizar el impacto de un proyecto tecnológico en su contexto de incidencia.'),
	(48, 7, 'Estará en la capacidad de proponer soluciones innovadoras para contribuir al mejoramiento de la calidad de vida de las personas.'),
	(49, 7, 'Estará en la capacidad de analizar las implicaciones éticas y bioéticas de un  proyecto de investigación tecnológica para decidir su participación y/o acciones a tomar.'),
	(50, 8, 'Estará en la capacidad de recolectar e interpretar información por medio de instrumentos de investigación y en procesos de interacción social con los actores de diferentes niveles organizacionales y/o disciplinas para garantizar una comunicación eficaz con los miembros del equipo.'),
	(51, 8, 'Estará en la capacidad de indagar e interpretar contextos y traducirlos en modelos (diagrama de proceso, BPM, diagramas de ciclos causales, diagramas de niveles y flujos, entre otros) para validar el entendimiento de los requerimientos.'),
	(52, 8, 'Estará en la capacidad de analizar los puntos de vista de los individuos involucrados en el contexto para interactuar efectivamente.'),
	(53, 8, 'Estará en capacidad de gestionar grupos para el cumplimiento de los objetivos de un proyecto.'),
	(54, 9, 'Estará en capacidad de interpretar y analizar textos en inglés para el diseño de proyectos, realización de trabajos y mantenerse actualizado en las tendencias de la disciplina.'),
	(55, 10, 'Estará en la capacidad de aplicar las normas, los estándares y los modelos propios de la ingeniería, tales como ISO e IEEE, para alcanzar niveles adecuados de modularidad, escalabilidad, desempeño, seguridad, disponibilidad y oportunidad en los productos.'),
	(56, 10, 'Estará en la capacidad de cumplir con los requerimientos funcionales y no funcionales acordados con el usuario en el desarrollo de productos y servicios tecnológicos, aplicando el ciclo CDIO (Concebir, Diseñar, Implementar y Operar).'),
	(57, 10, 'Estará en la capacidad de reconocer los objetivos estratégicos, las políticas organizacionales y de llevar a cabo las acciones necesarias para que el área de tecnología esté en consonancia con la organización, utilizando marcos de trabajo de arquitectura empresarial, gobierno de TIC y de madurez tecnológica.'),
	(58, 10, 'Estará en la capacidad de utilizar los estándares de gerencia de proyectos con el objetivo de incrementar la probabilidad de éxito de los proyectos dentro de los parámetros de calidad, costo, tiempo y desempeño previamente fijados.'),
	(59, 11, 'Estará en la capacidad de interpretar el entorno usando el modelo BPSC para descubrir y plantear oportunidades de negocio de base tecnológica.'),
	(60, 11, 'Estará en la capacidad de evaluar alternativas de negocio siguiendo una metodología de análisis multicriterio para elegir la más conveniente de acuerdo con su propósito.'),
	(61, 11, 'Estará en la capacidad de desarrollar proyectos para materializar posibilidades de negocio.'),
	(62, 12, 'Estará en la capacidad de identificar el contexto, los actores, sus interacciones y necesidades, así como las variables controlables y no controlables, para modelar una situación del entorno real lo más fiel posible, con el propósito de establecer los factores que afectan el proceso del diseño de los sistemas de información.'),
	(63, 12, 'Estará en la capacidad de comprender las interacciones de los actores, adoptando las diversas metodologías, técnicas y herramientas (actuales y acordes a la disciplina), con el fin de construir sistemas de información con la calidad requerida.');
/*!40000 ALTER TABLE `tbl_competencia_especifica` ENABLE KEYS */;

-- Dumping structure for table pandora.tbl_competencia_general


-- Dumping structure for table pandora.tbl_desafio
CREATE TABLE IF NOT EXISTS `tbl_desafio` (
  `id_desafio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_desafio` varchar(200) NOT NULL,
  `descripcion_desafio` varchar(1000) NOT NULL,
  `id_competencia_gral` int(11) NOT NULL,
  `id_competencia_esp` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_desafio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_desafio: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_desafio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_desafio` ENABLE KEYS */;

-- Dumping structure for table pandora.tbl_evento
CREATE TABLE IF NOT EXISTS `tbl_evento` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(200) NOT NULL,
  `descripcion_evento` varchar(1000) NOT NULL,
  `id_comp_gral` int(11) NOT NULL,
  `id_comp_esp` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_evento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_evento: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_evento` ENABLE KEYS */;

-- Dumping structure for table pandora.tbl_nivel_competencia
CREATE TABLE IF NOT EXISTS `tbl_nivel_competencia` (
  `id_nivel_competencia` int(11) NOT NULL AUTO_INCREMENT,
  `id_competencia_gral` int(11) NOT NULL,
  `id_competencia_esp` int(11) DEFAULT NULL,
  `nombre_nivel` varchar(50) NOT NULL,
  `insignia` blob NOT NULL,
  PRIMARY KEY (`id_nivel_competencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_nivel_competencia: ~0 rows (approximately)
/*!40000 ALTER TABLE `tbl_nivel_competencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_nivel_competencia` ENABLE KEYS */;

-- Dumping structure for table pandora.tbl_rol


-- Dumping structure for table pandora.tbl_trabajo
CREATE TABLE IF NOT EXISTS `tbl_trabajo` (
  `id_trabajo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_trabajo` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_comp_gral` int(11) DEFAULT NULL,
  `id_comp_esp` int(11) DEFAULT NULL,
  `evidencia_doc` varchar(200) DEFAULT NULL,
  `evidencia_video` varchar(200) DEFAULT NULL,
  `evidencia_ppt` varchar(200) DEFAULT NULL,
  `evidencia_repo` varchar(200) DEFAULT NULL,
  `img_trabajo` blob,
  `descripcion` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id_trabajo`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_comp_gral` (`id_comp_gral`),
  KEY `id_comp_esp` (`id_comp_esp`),
  CONSTRAINT `tbl_trabajo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`),
  CONSTRAINT `tbl_trabajo_ibfk_2` FOREIGN KEY (`id_comp_gral`) REFERENCES `tbl_competencia_general` (`id_comp_gral`),
  CONSTRAINT `tbl_trabajo_ibfk_3` FOREIGN KEY (`id_comp_esp`) REFERENCES `tbl_competencia_especifica` (`id_comp_esp`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table pandora.tbl_trabajo: ~2 rows (approximately)
/*!40000 ALTER TABLE `tbl_trabajo` DISABLE KEYS */;
INSERT INTO `tbl_trabajo` (`id_trabajo`, `nombre_trabajo`, `id_usuario`, `id_comp_gral`, `id_comp_esp`, `evidencia_doc`, `evidencia_video`, `evidencia_ppt`, `evidencia_repo`, `img_trabajo`, `descripcion`) VALUES
	(1, 'Nuevo', 3, NULL, NULL, 'https://styde.net/extensiones-de-vs-code-para-php-y-laravel/', 'https://styde.net/extensiones-de-vs-code-para-php-y-laravel/', 'https://styde.net/extensiones-de-vs-code-para-php-y-laravel/', NULL, NULL, 'Nuevo');
/*!40000 ALTER TABLE `tbl_trabajo` ENABLE KEYS */;

-- Dumping structure for table pandora.tbl_usuario

/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
