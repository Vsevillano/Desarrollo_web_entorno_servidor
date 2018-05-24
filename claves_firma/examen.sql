-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-05-2018 a las 09:07:38
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clavefirma`
--

DROP TABLE IF EXISTS `clavefirma`;
CREATE TABLE IF NOT EXISTS `clavefirma` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Volcado de datos para la tabla `clavefirma`
--

INSERT INTO `clavefirma` (`id`, `idUsuario`, `fila`, `columna`) VALUES
(220, 2, 0, 0),
(748, 2, 0, 1),
(508, 2, 0, 2),
(379, 2, 0, 3),
(392, 2, 0, 4),
(219, 2, 0, 5),
(753, 2, 0, 6),
(151, 2, 0, 7),
(647, 2, 1, 0),
(595, 2, 1, 1),
(673, 2, 1, 2),
(478, 2, 1, 3),
(956, 2, 1, 4),
(611, 2, 1, 5),
(915, 2, 1, 6),
(767, 2, 1, 7),
(841, 2, 2, 0),
(352, 2, 2, 1),
(775, 2, 2, 2),
(879, 2, 2, 3),
(275, 2, 2, 4),
(350, 2, 2, 5),
(900, 2, 2, 6),
(223, 2, 2, 7),
(579, 2, 3, 0),
(691, 2, 3, 1),
(588, 2, 3, 2),
(458, 2, 3, 3),
(825, 2, 3, 4),
(110, 2, 3, 5),
(485, 2, 3, 6),
(994, 2, 3, 7),
(535, 2, 4, 0),
(490, 2, 4, 1),
(788, 2, 4, 2),
(789, 2, 4, 3),
(581, 2, 4, 4),
(566, 2, 4, 5),
(344, 2, 4, 6),
(154, 2, 4, 7),
(484, 2, 5, 0),
(422, 2, 5, 1),
(250, 2, 5, 2),
(748, 2, 5, 3),
(217, 2, 5, 4),
(593, 2, 5, 5),
(253, 2, 5, 6),
(179, 2, 5, 7),
(201, 2, 6, 0),
(263, 2, 6, 1),
(549, 2, 6, 2),
(109, 2, 6, 3),
(408, 2, 6, 4),
(866, 2, 6, 5),
(885, 2, 6, 6),
(844, 2, 6, 7),
(360, 2, 7, 0),
(687, 2, 7, 1),
(559, 2, 7, 2),
(447, 2, 7, 3),
(930, 2, 7, 4),
(260, 2, 7, 5),
(217, 2, 7, 6),
(124, 2, 7, 7),
(339, 3, 0, 0),
(828, 3, 0, 1),
(645, 3, 0, 2),
(841, 3, 0, 3),
(617, 3, 0, 4),
(818, 3, 0, 5),
(535, 3, 0, 6),
(433, 3, 0, 7),
(760, 3, 1, 0),
(455, 3, 1, 1),
(614, 3, 1, 2),
(726, 3, 1, 3),
(852, 3, 1, 4),
(835, 3, 1, 5),
(740, 3, 1, 6),
(793, 3, 1, 7),
(527, 3, 2, 0),
(806, 3, 2, 1),
(322, 3, 2, 2),
(155, 3, 2, 3),
(770, 3, 2, 4),
(565, 3, 2, 5),
(121, 3, 2, 6),
(584, 3, 2, 7),
(315, 3, 3, 0),
(757, 3, 3, 1),
(446, 3, 3, 2),
(701, 3, 3, 3),
(146, 3, 3, 4),
(680, 3, 3, 5),
(256, 3, 3, 6),
(480, 3, 3, 7),
(799, 3, 4, 0),
(982, 3, 4, 1),
(760, 3, 4, 2),
(341, 3, 4, 3),
(557, 3, 4, 4),
(958, 3, 4, 5),
(917, 3, 4, 6),
(256, 3, 4, 7),
(854, 3, 5, 0),
(356, 3, 5, 1),
(138, 3, 5, 2),
(648, 3, 5, 3),
(875, 3, 5, 4),
(272, 3, 5, 5),
(981, 3, 5, 6),
(588, 3, 5, 7),
(255, 3, 6, 0),
(454, 3, 6, 1),
(156, 3, 6, 2),
(498, 3, 6, 3),
(878, 3, 6, 4),
(198, 3, 6, 5),
(223, 3, 6, 6),
(351, 3, 6, 7),
(578, 3, 7, 0),
(151, 3, 7, 1),
(589, 3, 7, 2),
(567, 3, 7, 3),
(339, 3, 7, 4),
(511, 3, 7, 5),
(216, 3, 7, 6),
(219, 3, 7, 7),
(384, 4, 0, 0),
(821, 4, 0, 1),
(430, 4, 0, 2),
(288, 4, 0, 3),
(671, 4, 0, 4),
(692, 4, 0, 5),
(614, 4, 0, 6),
(201, 4, 0, 7),
(409, 4, 1, 0),
(892, 4, 1, 1),
(628, 4, 1, 2),
(428, 4, 1, 3),
(242, 4, 1, 4),
(830, 4, 1, 5),
(893, 4, 1, 6),
(154, 4, 1, 7),
(370, 4, 2, 0),
(365, 4, 2, 1),
(482, 4, 2, 2),
(813, 4, 2, 3),
(537, 4, 2, 4),
(707, 4, 2, 5),
(716, 4, 2, 6),
(691, 4, 2, 7),
(942, 4, 3, 0),
(816, 4, 3, 1),
(666, 4, 3, 2),
(320, 4, 3, 3),
(432, 4, 3, 4),
(100, 4, 3, 5),
(756, 4, 3, 6),
(686, 4, 3, 7),
(102, 4, 4, 0),
(219, 4, 4, 1),
(956, 4, 4, 2),
(523, 4, 4, 3),
(600, 4, 4, 4),
(582, 4, 4, 5),
(789, 4, 4, 6),
(815, 4, 4, 7),
(323, 4, 5, 0),
(149, 4, 5, 1),
(226, 4, 5, 2),
(297, 4, 5, 3),
(818, 4, 5, 4),
(129, 4, 5, 5),
(590, 4, 5, 6),
(853, 4, 5, 7),
(481, 4, 6, 0),
(382, 4, 6, 1),
(952, 4, 6, 2),
(317, 4, 6, 3),
(860, 4, 6, 4),
(316, 4, 6, 5),
(834, 4, 6, 6),
(574, 4, 6, 7),
(351, 4, 7, 0),
(692, 4, 7, 1),
(208, 4, 7, 2),
(358, 4, 7, 3),
(501, 4, 7, 4),
(918, 4, 7, 5),
(396, 4, 7, 6),
(653, 4, 7, 7),
(607, 5, 0, 0),
(854, 5, 0, 1),
(470, 5, 0, 2),
(195, 5, 0, 3),
(417, 5, 0, 4),
(810, 5, 0, 5),
(851, 5, 0, 6),
(867, 5, 0, 7),
(126, 5, 1, 0),
(644, 5, 1, 1),
(612, 5, 1, 2),
(503, 5, 1, 3),
(381, 5, 1, 4),
(666, 5, 1, 5),
(174, 5, 1, 6),
(989, 5, 1, 7),
(480, 5, 2, 0),
(736, 5, 2, 1),
(410, 5, 2, 2),
(158, 5, 2, 3),
(170, 5, 2, 4),
(263, 5, 2, 5),
(840, 5, 2, 6),
(794, 5, 2, 7),
(547, 5, 3, 0),
(905, 5, 3, 1),
(538, 5, 3, 2),
(733, 5, 3, 3),
(458, 5, 3, 4),
(274, 5, 3, 5),
(824, 5, 3, 6),
(958, 5, 3, 7),
(100, 5, 4, 0),
(927, 5, 4, 1),
(771, 5, 4, 2),
(205, 5, 4, 3),
(120, 5, 4, 4),
(475, 5, 4, 5),
(801, 5, 4, 6),
(356, 5, 4, 7),
(715, 5, 5, 0),
(576, 5, 5, 1),
(885, 5, 5, 2),
(147, 5, 5, 3),
(732, 5, 5, 4),
(641, 5, 5, 5),
(546, 5, 5, 6),
(563, 5, 5, 7),
(367, 5, 6, 0),
(528, 5, 6, 1),
(655, 5, 6, 2),
(336, 5, 6, 3),
(268, 5, 6, 4),
(547, 5, 6, 5),
(734, 5, 6, 6),
(452, 5, 6, 7),
(630, 5, 7, 0),
(557, 5, 7, 1),
(755, 5, 7, 2),
(546, 5, 7, 3),
(302, 5, 7, 4),
(867, 5, 7, 5),
(240, 5, 7, 6),
(701, 5, 7, 7),
(381, 4, 0, 0),
(438, 4, 0, 1),
(960, 4, 0, 2),
(552, 4, 0, 3),
(612, 4, 0, 4),
(478, 4, 0, 5),
(639, 4, 0, 6),
(183, 4, 0, 7),
(293, 4, 1, 0),
(846, 4, 1, 1),
(146, 4, 1, 2),
(129, 4, 1, 3),
(970, 4, 1, 4),
(953, 4, 1, 5),
(805, 4, 1, 6),
(474, 4, 1, 7),
(141, 4, 2, 0),
(657, 4, 2, 1),
(788, 4, 2, 2),
(852, 4, 2, 3),
(253, 4, 2, 4),
(268, 4, 2, 5),
(515, 4, 2, 6),
(448, 4, 2, 7),
(601, 4, 3, 0),
(545, 4, 3, 1),
(860, 4, 3, 2),
(696, 4, 3, 3),
(934, 4, 3, 4),
(898, 4, 3, 5),
(443, 4, 3, 6),
(781, 4, 3, 7),
(548, 4, 4, 0),
(286, 4, 4, 1),
(137, 4, 4, 2),
(337, 4, 4, 3),
(990, 4, 4, 4),
(818, 4, 4, 5),
(364, 4, 4, 6),
(347, 4, 4, 7),
(657, 4, 5, 0),
(553, 4, 5, 1),
(195, 4, 5, 2),
(448, 4, 5, 3),
(196, 4, 5, 4),
(702, 4, 5, 5),
(952, 4, 5, 6),
(722, 4, 5, 7),
(703, 4, 6, 0),
(224, 4, 6, 1),
(808, 4, 6, 2),
(805, 4, 6, 3),
(125, 4, 6, 4),
(327, 4, 6, 5),
(184, 4, 6, 6),
(781, 4, 6, 7),
(460, 4, 7, 0),
(871, 4, 7, 1),
(852, 4, 7, 2),
(284, 4, 7, 3),
(554, 4, 7, 4),
(366, 4, 7, 5),
(533, 4, 7, 6),
(298, 4, 7, 7),
(604, 5, 0, 0),
(471, 5, 0, 1),
(101, 5, 0, 2),
(459, 5, 0, 3),
(357, 5, 0, 4),
(595, 5, 0, 5),
(876, 5, 0, 6),
(849, 5, 0, 7),
(909, 5, 1, 0),
(598, 5, 1, 1),
(131, 5, 1, 2),
(204, 5, 1, 3),
(209, 5, 1, 4),
(789, 5, 1, 5),
(986, 5, 1, 6),
(409, 5, 1, 7),
(252, 5, 2, 0),
(128, 5, 2, 1),
(716, 5, 2, 2),
(196, 5, 2, 3),
(785, 5, 2, 4),
(723, 5, 2, 5),
(640, 5, 2, 6),
(552, 5, 2, 7),
(206, 5, 3, 0),
(635, 5, 3, 1),
(731, 5, 3, 2),
(209, 5, 3, 3),
(961, 5, 3, 4),
(172, 5, 3, 5),
(511, 5, 3, 6),
(153, 5, 3, 7),
(547, 5, 4, 0),
(994, 5, 4, 1),
(852, 5, 4, 2),
(918, 5, 4, 3),
(511, 5, 4, 4),
(710, 5, 4, 5),
(376, 5, 4, 6),
(789, 5, 4, 7),
(149, 5, 5, 0),
(981, 5, 5, 1),
(854, 5, 5, 2),
(299, 5, 5, 3),
(110, 5, 5, 4),
(314, 5, 5, 5),
(908, 5, 5, 6),
(432, 5, 5, 7),
(588, 5, 6, 0),
(370, 5, 6, 1),
(511, 5, 6, 2),
(825, 5, 6, 3),
(433, 5, 6, 4),
(557, 5, 6, 5),
(984, 5, 6, 6),
(660, 5, 6, 7),
(739, 5, 7, 0),
(736, 5, 7, 1),
(498, 5, 7, 2),
(472, 5, 7, 3),
(355, 5, 7, 4),
(315, 5, 7, 5),
(377, 5, 7, 6),
(346, 5, 7, 7),
(631, 6, 0, 0),
(145, 6, 0, 1),
(369, 6, 0, 2),
(371, 6, 0, 3),
(125, 6, 0, 4),
(181, 6, 0, 5),
(741, 6, 0, 6),
(262, 6, 0, 7),
(440, 6, 1, 0),
(595, 6, 1, 1),
(907, 6, 1, 2),
(235, 6, 1, 3),
(760, 6, 1, 4),
(684, 6, 1, 5),
(727, 6, 1, 6),
(263, 6, 1, 7),
(720, 6, 2, 0),
(194, 6, 2, 1),
(511, 6, 2, 2),
(768, 6, 2, 3),
(404, 6, 2, 4),
(223, 6, 2, 5),
(116, 6, 2, 6),
(820, 6, 2, 7),
(347, 6, 3, 0),
(517, 6, 3, 1),
(754, 6, 3, 2),
(843, 6, 3, 3),
(632, 6, 3, 4),
(374, 6, 3, 5),
(483, 6, 3, 6),
(808, 6, 3, 7),
(894, 6, 4, 0),
(440, 6, 4, 1),
(512, 6, 4, 2),
(236, 6, 4, 3),
(318, 6, 4, 4),
(911, 6, 4, 5),
(701, 6, 4, 6),
(901, 6, 4, 7),
(337, 6, 5, 0),
(636, 6, 5, 1),
(460, 6, 5, 2),
(523, 6, 5, 3),
(137, 6, 5, 4),
(711, 6, 5, 5),
(547, 6, 5, 6),
(874, 6, 5, 7),
(252, 6, 6, 0),
(882, 6, 6, 1),
(373, 6, 6, 2),
(577, 6, 6, 3),
(766, 6, 6, 4),
(447, 6, 6, 5),
(696, 6, 6, 6),
(503, 6, 6, 7),
(413, 6, 7, 0),
(952, 6, 7, 1),
(925, 6, 7, 2),
(174, 6, 7, 3),
(177, 6, 7, 4),
(795, 6, 7, 5),
(921, 6, 7, 6),
(462, 6, 7, 7),
(570, 7, 0, 0),
(291, 7, 0, 1),
(395, 7, 0, 2),
(462, 7, 0, 3),
(423, 7, 0, 4),
(536, 7, 0, 5),
(890, 7, 0, 6),
(988, 7, 0, 7),
(429, 7, 1, 0),
(351, 7, 1, 1),
(343, 7, 1, 2),
(394, 7, 1, 3),
(785, 7, 1, 4),
(495, 7, 1, 5),
(526, 7, 1, 6),
(115, 7, 1, 7),
(337, 7, 2, 0),
(376, 7, 2, 1),
(960, 7, 2, 2),
(235, 7, 2, 3),
(183, 7, 2, 4),
(755, 7, 2, 5),
(717, 7, 2, 6),
(388, 7, 2, 7),
(970, 7, 3, 0),
(141, 7, 3, 1),
(220, 7, 3, 2),
(659, 7, 3, 3),
(194, 7, 3, 4),
(194, 7, 3, 5),
(339, 7, 3, 6),
(682, 7, 3, 7),
(302, 7, 4, 0),
(321, 7, 4, 1),
(598, 7, 4, 2),
(542, 7, 4, 3),
(591, 7, 4, 4),
(384, 7, 4, 5),
(967, 7, 4, 6),
(772, 7, 4, 7),
(808, 7, 5, 0),
(691, 7, 5, 1),
(968, 7, 5, 2),
(558, 7, 5, 3),
(249, 7, 5, 4),
(202, 7, 5, 5),
(574, 7, 5, 6),
(434, 7, 5, 7),
(463, 7, 6, 0),
(126, 7, 6, 1),
(207, 7, 6, 2),
(483, 7, 6, 3),
(745, 7, 6, 4),
(322, 7, 6, 5),
(738, 7, 6, 6),
(341, 7, 6, 7),
(842, 7, 7, 0),
(200, 7, 7, 1),
(788, 7, 7, 2),
(992, 7, 7, 3),
(952, 7, 7, 4),
(520, 7, 7, 5),
(331, 7, 7, 6),
(270, 7, 7, 7),
(821, 8, 0, 0),
(690, 8, 0, 1),
(688, 8, 0, 2),
(959, 8, 0, 3),
(646, 8, 0, 4),
(569, 8, 0, 5),
(931, 8, 0, 6),
(895, 8, 0, 7),
(174, 8, 1, 0),
(469, 8, 1, 1),
(581, 8, 1, 2),
(160, 8, 1, 3),
(502, 8, 1, 4),
(247, 8, 1, 5),
(510, 8, 1, 6),
(190, 8, 1, 7),
(476, 8, 2, 0),
(213, 8, 2, 1),
(241, 8, 2, 2),
(170, 8, 2, 3),
(294, 8, 2, 4),
(226, 8, 2, 5),
(645, 8, 2, 6),
(632, 8, 2, 7),
(602, 8, 3, 0),
(597, 8, 3, 1),
(345, 8, 3, 2),
(763, 8, 3, 3),
(698, 8, 3, 4),
(283, 8, 3, 5),
(211, 8, 3, 6),
(195, 8, 3, 7),
(328, 8, 4, 0),
(495, 8, 4, 1),
(666, 8, 4, 2),
(814, 8, 4, 3),
(589, 8, 4, 4),
(192, 8, 4, 5),
(782, 8, 4, 6),
(454, 8, 4, 7),
(328, 8, 5, 0),
(584, 8, 5, 1),
(981, 8, 5, 2),
(100, 8, 5, 3),
(641, 8, 5, 4),
(629, 8, 5, 5),
(334, 8, 5, 6),
(284, 8, 5, 7),
(377, 8, 6, 0),
(637, 8, 6, 1),
(163, 8, 6, 2),
(193, 8, 6, 3),
(631, 8, 6, 4),
(468, 8, 6, 5),
(441, 8, 6, 6),
(361, 8, 6, 7),
(250, 8, 7, 0),
(431, 8, 7, 1),
(688, 8, 7, 2),
(871, 8, 7, 3),
(332, 8, 7, 4),
(384, 8, 7, 5),
(878, 8, 7, 6),
(458, 8, 7, 7),
(156, 9, 0, 0),
(701, 9, 0, 1),
(349, 9, 0, 2),
(152, 9, 0, 3),
(209, 9, 0, 4),
(467, 9, 0, 5),
(915, 9, 0, 6),
(419, 9, 0, 7),
(127, 9, 1, 0),
(778, 9, 1, 1),
(768, 9, 1, 2),
(487, 9, 1, 3),
(894, 9, 1, 4),
(934, 9, 1, 5),
(669, 9, 1, 6),
(329, 9, 1, 7),
(344, 9, 2, 0),
(680, 9, 2, 1),
(927, 9, 2, 2),
(366, 9, 2, 3),
(362, 9, 2, 4),
(213, 9, 2, 5),
(501, 9, 2, 6),
(570, 9, 2, 7),
(582, 9, 3, 0),
(180, 9, 3, 1),
(601, 9, 3, 2),
(462, 9, 3, 3),
(189, 9, 3, 4),
(779, 9, 3, 5),
(185, 9, 3, 6),
(916, 9, 3, 7),
(616, 9, 4, 0),
(855, 9, 4, 1),
(464, 9, 4, 2),
(552, 9, 4, 3),
(149, 9, 4, 4),
(606, 9, 4, 5),
(397, 9, 4, 6),
(242, 9, 4, 7),
(221, 9, 5, 0),
(679, 9, 5, 1),
(293, 9, 5, 2),
(409, 9, 5, 3),
(918, 9, 5, 4),
(371, 9, 5, 5),
(911, 9, 5, 6),
(124, 9, 5, 7),
(972, 9, 6, 0),
(327, 9, 6, 1),
(761, 9, 6, 2),
(709, 9, 6, 3),
(470, 9, 6, 4),
(746, 9, 6, 5),
(602, 9, 6, 6),
(337, 9, 6, 7),
(845, 9, 7, 0),
(475, 9, 7, 1),
(744, 9, 7, 2),
(328, 9, 7, 3),
(381, 9, 7, 4),
(609, 9, 7, 5),
(146, 9, 7, 6),
(655, 9, 7, 7),
(848, 10, 0, 0),
(452, 10, 0, 1),
(370, 10, 0, 2),
(157, 10, 0, 3),
(467, 10, 0, 4),
(592, 10, 0, 5),
(347, 10, 0, 6),
(137, 10, 0, 7),
(654, 10, 1, 0),
(519, 10, 1, 1),
(540, 10, 1, 2),
(285, 10, 1, 3),
(143, 10, 1, 4),
(880, 10, 1, 5),
(358, 10, 1, 6),
(121, 10, 1, 7),
(818, 10, 2, 0),
(972, 10, 2, 1),
(562, 10, 2, 2),
(518, 10, 2, 3),
(514, 10, 2, 4),
(542, 10, 2, 5),
(559, 10, 2, 6),
(998, 10, 2, 7),
(216, 10, 3, 0),
(687, 10, 3, 1),
(211, 10, 3, 2),
(632, 10, 3, 3),
(457, 10, 3, 4),
(254, 10, 3, 5),
(725, 10, 3, 6),
(743, 10, 3, 7),
(422, 10, 4, 0),
(339, 10, 4, 1),
(162, 10, 4, 2),
(402, 10, 4, 3),
(645, 10, 4, 4),
(689, 10, 4, 5),
(631, 10, 4, 6),
(931, 10, 4, 7),
(312, 10, 5, 0),
(602, 10, 5, 1),
(191, 10, 5, 2),
(502, 10, 5, 3),
(855, 10, 5, 4),
(724, 10, 5, 5),
(951, 10, 5, 6),
(437, 10, 5, 7),
(560, 10, 6, 0),
(352, 10, 6, 1),
(972, 10, 6, 2),
(707, 10, 6, 3),
(861, 10, 6, 4),
(134, 10, 6, 5),
(562, 10, 6, 6),
(836, 10, 6, 7),
(942, 10, 7, 0),
(264, 10, 7, 1),
(481, 10, 7, 2),
(793, 10, 7, 3),
(438, 10, 7, 4),
(492, 10, 7, 5),
(137, 10, 7, 6),
(102, 10, 7, 7),
(333, 11, 0, 0),
(113, 11, 0, 1),
(291, 11, 0, 2),
(535, 11, 0, 3),
(261, 11, 0, 4),
(674, 11, 0, 5),
(352, 11, 0, 6),
(712, 11, 0, 7),
(307, 11, 1, 0),
(573, 11, 1, 1),
(179, 11, 1, 2),
(606, 11, 1, 3),
(106, 11, 1, 4),
(456, 11, 1, 5),
(982, 11, 1, 6),
(640, 11, 1, 7),
(640, 11, 2, 0),
(520, 11, 2, 1),
(820, 11, 2, 2),
(784, 11, 2, 3),
(646, 11, 2, 4),
(512, 11, 2, 5),
(902, 11, 2, 6),
(560, 11, 2, 7),
(207, 11, 3, 0),
(629, 11, 3, 1),
(188, 11, 3, 2),
(842, 11, 3, 3),
(757, 11, 3, 4),
(618, 11, 3, 5),
(787, 11, 3, 6),
(249, 11, 3, 7),
(582, 11, 4, 0),
(675, 11, 4, 1),
(758, 11, 4, 2),
(555, 11, 4, 3),
(215, 11, 4, 4),
(547, 11, 4, 5),
(411, 11, 4, 6),
(381, 11, 4, 7),
(641, 11, 5, 0),
(432, 11, 5, 1),
(506, 11, 5, 2),
(599, 11, 5, 3),
(593, 11, 5, 4),
(976, 11, 5, 5),
(451, 11, 5, 6),
(730, 11, 5, 7),
(158, 11, 6, 0),
(576, 11, 6, 1),
(105, 11, 6, 2),
(748, 11, 6, 3),
(768, 11, 6, 4),
(779, 11, 6, 5),
(680, 11, 6, 6),
(173, 11, 6, 7),
(709, 11, 7, 0),
(881, 11, 7, 1),
(233, 11, 7, 2),
(777, 11, 7, 3),
(514, 11, 7, 4),
(631, 11, 7, 5),
(874, 11, 7, 6),
(283, 11, 7, 7),
(640, 10, 0, 0),
(317, 10, 0, 1),
(449, 10, 0, 2),
(830, 10, 0, 3),
(659, 10, 0, 4),
(396, 10, 0, 5),
(565, 10, 0, 6),
(293, 10, 0, 7),
(669, 10, 1, 0),
(417, 10, 1, 1),
(658, 10, 1, 2),
(865, 10, 1, 3),
(980, 10, 1, 4),
(802, 10, 1, 5),
(813, 10, 1, 6),
(943, 10, 1, 7),
(550, 10, 2, 0),
(623, 10, 2, 1),
(664, 10, 2, 2),
(274, 10, 2, 3),
(590, 10, 2, 4),
(301, 10, 2, 5),
(296, 10, 2, 6),
(855, 10, 2, 7),
(959, 10, 3, 0),
(709, 10, 3, 1),
(241, 10, 3, 2),
(633, 10, 3, 3),
(165, 10, 3, 4),
(468, 10, 3, 5),
(586, 10, 3, 6),
(704, 10, 3, 7),
(769, 10, 4, 0),
(450, 10, 4, 1),
(965, 10, 4, 2),
(815, 10, 4, 3),
(380, 10, 4, 4),
(178, 10, 4, 5),
(561, 10, 4, 6),
(264, 10, 4, 7),
(658, 10, 5, 0),
(522, 10, 5, 1),
(809, 10, 5, 2),
(597, 10, 5, 3),
(110, 10, 5, 4),
(105, 10, 5, 5),
(893, 10, 5, 6),
(211, 10, 5, 7),
(398, 10, 6, 0),
(699, 10, 6, 1),
(449, 10, 6, 2),
(653, 10, 6, 3),
(930, 10, 6, 4),
(926, 10, 6, 5),
(460, 10, 6, 6),
(320, 10, 6, 7),
(666, 10, 7, 0),
(757, 10, 7, 1),
(560, 10, 7, 2),
(758, 10, 7, 3),
(815, 10, 7, 4),
(615, 10, 7, 5),
(835, 10, 7, 6),
(365, 10, 7, 7),
(336, 11, 0, 0),
(470, 11, 0, 1),
(918, 11, 0, 2),
(688, 11, 0, 3),
(439, 11, 0, 4),
(746, 11, 0, 5),
(894, 11, 0, 6),
(122, 11, 0, 7),
(984, 11, 1, 0),
(514, 11, 1, 1),
(397, 11, 1, 2),
(216, 11, 1, 3),
(479, 11, 1, 4),
(196, 11, 1, 5),
(411, 11, 1, 6),
(266, 11, 1, 7),
(584, 11, 2, 0),
(663, 11, 2, 1),
(571, 11, 2, 2),
(919, 11, 2, 3),
(708, 11, 2, 4),
(538, 11, 2, 5),
(962, 11, 2, 6),
(572, 11, 2, 7),
(711, 11, 3, 0),
(693, 11, 3, 1),
(317, 11, 3, 2),
(771, 11, 3, 3),
(902, 11, 3, 4),
(649, 11, 3, 5),
(521, 11, 3, 6),
(814, 11, 3, 7),
(240, 11, 4, 0),
(378, 11, 4, 1),
(309, 11, 4, 2),
(448, 11, 4, 3),
(836, 11, 4, 4),
(302, 11, 4, 5),
(664, 11, 4, 6),
(768, 11, 4, 7),
(747, 11, 5, 0),
(394, 11, 5, 1),
(322, 11, 5, 2),
(623, 11, 5, 3),
(284, 11, 5, 4),
(174, 11, 5, 5),
(266, 11, 5, 6),
(209, 11, 5, 7),
(207, 11, 6, 0),
(515, 11, 6, 1),
(131, 11, 6, 2),
(173, 11, 6, 3),
(823, 11, 6, 4),
(938, 11, 6, 5),
(901, 11, 6, 6),
(712, 11, 6, 7),
(193, 11, 7, 0),
(516, 11, 7, 1),
(411, 11, 7, 2),
(672, 11, 7, 3),
(426, 11, 7, 4),
(571, 11, 7, 5),
(545, 11, 7, 6),
(251, 11, 7, 7),
(966, 12, 0, 0),
(804, 12, 0, 1),
(194, 12, 0, 2),
(542, 12, 0, 3),
(154, 12, 0, 4),
(255, 12, 0, 5),
(308, 12, 0, 6),
(713, 12, 0, 7),
(879, 12, 1, 0),
(858, 12, 1, 1),
(822, 12, 1, 2),
(278, 12, 1, 3),
(302, 12, 1, 4),
(784, 12, 1, 5),
(469, 12, 1, 6),
(783, 12, 1, 7),
(532, 12, 2, 0),
(455, 12, 2, 1),
(234, 12, 2, 2),
(626, 12, 2, 3),
(528, 12, 2, 4),
(744, 12, 2, 5),
(651, 12, 2, 6),
(453, 12, 2, 7),
(599, 12, 3, 0),
(271, 12, 3, 1),
(904, 12, 3, 2),
(461, 12, 3, 3),
(606, 12, 3, 4),
(808, 12, 3, 5),
(628, 12, 3, 6),
(396, 12, 3, 7),
(856, 12, 4, 0),
(979, 12, 4, 1),
(808, 12, 4, 2),
(457, 12, 4, 3),
(311, 12, 4, 4),
(754, 12, 4, 5),
(177, 12, 4, 6),
(389, 12, 4, 7),
(178, 12, 5, 0),
(555, 12, 5, 1),
(621, 12, 5, 2),
(390, 12, 5, 3),
(319, 12, 5, 4),
(354, 12, 5, 5),
(872, 12, 5, 6),
(206, 12, 5, 7),
(140, 12, 6, 0),
(574, 12, 6, 1),
(117, 12, 6, 2),
(935, 12, 6, 3),
(404, 12, 6, 4),
(286, 12, 6, 5),
(688, 12, 6, 6),
(522, 12, 6, 7),
(517, 12, 7, 0),
(811, 12, 7, 1),
(871, 12, 7, 2),
(966, 12, 7, 3),
(341, 12, 7, 4),
(322, 12, 7, 5),
(300, 12, 7, 6),
(213, 12, 7, 7),
(141, 13, 0, 0),
(860, 13, 0, 1),
(259, 13, 0, 2),
(806, 13, 0, 3),
(239, 13, 0, 4),
(384, 13, 0, 5),
(852, 13, 0, 6),
(716, 13, 0, 7),
(139, 13, 1, 0),
(757, 13, 1, 1),
(389, 13, 1, 2),
(673, 13, 1, 3),
(712, 13, 1, 4),
(713, 13, 1, 5),
(416, 13, 1, 6),
(987, 13, 1, 7),
(580, 13, 2, 0),
(337, 13, 2, 1),
(231, 13, 2, 2),
(617, 13, 2, 3),
(615, 13, 2, 4),
(164, 13, 2, 5),
(479, 13, 2, 6),
(773, 13, 2, 7),
(339, 13, 3, 0),
(276, 13, 3, 1),
(459, 13, 3, 2),
(414, 13, 3, 3),
(624, 13, 3, 4),
(310, 13, 3, 5),
(816, 13, 3, 6),
(749, 13, 3, 7),
(991, 13, 4, 0),
(349, 13, 4, 1),
(849, 13, 4, 2),
(738, 13, 4, 3),
(513, 13, 4, 4),
(928, 13, 4, 5),
(303, 13, 4, 6),
(690, 13, 4, 7),
(511, 13, 5, 0),
(330, 13, 5, 1),
(276, 13, 5, 2),
(464, 13, 5, 3),
(957, 13, 5, 4),
(892, 13, 5, 5),
(514, 13, 5, 6),
(371, 13, 5, 7),
(474, 13, 6, 0),
(895, 13, 6, 1),
(314, 13, 6, 2),
(268, 13, 6, 3),
(832, 13, 6, 4),
(876, 13, 6, 5),
(324, 13, 6, 6),
(466, 13, 6, 7),
(655, 13, 7, 0),
(919, 13, 7, 1),
(739, 13, 7, 2),
(824, 13, 7, 3),
(813, 13, 7, 4),
(657, 13, 7, 5),
(408, 13, 7, 6),
(752, 13, 7, 7),
(828, 14, 0, 0),
(176, 14, 0, 1),
(426, 14, 0, 2),
(108, 14, 0, 3),
(674, 14, 0, 4),
(909, 14, 0, 5),
(541, 14, 0, 6),
(102, 14, 0, 7),
(770, 14, 1, 0),
(242, 14, 1, 1),
(950, 14, 1, 2),
(594, 14, 1, 3),
(190, 14, 1, 4),
(507, 14, 1, 5),
(499, 14, 1, 6),
(992, 14, 1, 7),
(255, 14, 2, 0),
(891, 14, 2, 1),
(285, 14, 2, 2),
(257, 14, 2, 3),
(937, 14, 2, 4),
(127, 14, 2, 5),
(956, 14, 2, 6),
(497, 14, 2, 7),
(858, 14, 3, 0),
(999, 14, 3, 1),
(907, 14, 3, 2),
(672, 14, 3, 3),
(889, 14, 3, 4),
(442, 14, 3, 5),
(787, 14, 3, 6),
(192, 14, 3, 7),
(553, 14, 4, 0),
(340, 14, 4, 1),
(791, 14, 4, 2),
(715, 14, 4, 3),
(722, 14, 4, 4),
(328, 14, 4, 5),
(667, 14, 4, 6),
(752, 14, 4, 7),
(917, 14, 5, 0),
(490, 14, 5, 1),
(611, 14, 5, 2),
(160, 14, 5, 3),
(210, 14, 5, 4),
(461, 14, 5, 5),
(371, 14, 5, 6),
(151, 14, 5, 7),
(824, 14, 6, 0),
(324, 14, 6, 1),
(144, 14, 6, 2),
(583, 14, 6, 3),
(929, 14, 6, 4),
(614, 14, 6, 5),
(575, 14, 6, 6),
(865, 14, 6, 7),
(948, 14, 7, 0),
(516, 14, 7, 1),
(962, 14, 7, 2),
(858, 14, 7, 3),
(853, 14, 7, 4),
(564, 14, 7, 5),
(153, 14, 7, 6),
(870, 14, 7, 7),
(166, 15, 0, 0),
(842, 15, 0, 1),
(143, 15, 0, 2),
(760, 15, 0, 3),
(658, 15, 0, 4),
(985, 15, 0, 5),
(680, 15, 0, 6),
(839, 15, 0, 7),
(951, 15, 1, 0),
(177, 15, 1, 1),
(160, 15, 1, 2),
(965, 15, 1, 3),
(118, 15, 1, 4),
(752, 15, 1, 5),
(131, 15, 1, 6),
(547, 15, 1, 7),
(380, 15, 2, 0),
(995, 15, 2, 1),
(790, 15, 2, 2),
(346, 15, 2, 3),
(809, 15, 2, 4),
(540, 15, 2, 5),
(982, 15, 2, 6),
(671, 15, 2, 7),
(926, 15, 3, 0),
(371, 15, 3, 1),
(905, 15, 3, 2),
(481, 15, 3, 3),
(705, 15, 3, 4),
(124, 15, 3, 5),
(307, 15, 3, 6),
(985, 15, 3, 7),
(566, 15, 4, 0),
(782, 15, 4, 1),
(283, 15, 4, 2),
(242, 15, 4, 3),
(481, 15, 4, 4),
(179, 15, 4, 5),
(581, 15, 4, 6),
(363, 15, 4, 7),
(873, 15, 5, 0),
(200, 15, 5, 1),
(497, 15, 5, 2),
(306, 15, 5, 3),
(813, 15, 5, 4),
(480, 15, 5, 5),
(679, 15, 5, 6),
(381, 15, 5, 7),
(723, 15, 6, 0),
(203, 15, 6, 1),
(423, 15, 6, 2),
(448, 15, 6, 3),
(576, 15, 6, 4),
(803, 15, 6, 5),
(376, 15, 6, 6),
(814, 15, 6, 7),
(792, 15, 7, 0),
(564, 15, 7, 1),
(736, 15, 7, 2),
(441, 15, 7, 3),
(444, 15, 7, 4),
(921, 15, 7, 5),
(348, 15, 7, 6),
(537, 15, 7, 7),
(173, 16, 0, 0),
(937, 16, 0, 1),
(995, 16, 0, 2),
(670, 16, 0, 3),
(646, 16, 0, 4),
(772, 16, 0, 5),
(402, 16, 0, 6),
(848, 16, 0, 7),
(161, 16, 1, 0),
(585, 16, 1, 1),
(918, 16, 1, 2),
(428, 16, 1, 3),
(939, 16, 1, 4),
(458, 16, 1, 5),
(940, 16, 1, 6),
(167, 16, 1, 7),
(254, 16, 2, 0),
(928, 16, 2, 1),
(214, 16, 2, 2),
(376, 16, 2, 3),
(326, 16, 2, 4),
(278, 16, 2, 5),
(739, 16, 2, 6),
(913, 16, 2, 7),
(227, 16, 3, 0),
(843, 16, 3, 1),
(460, 16, 3, 2),
(288, 16, 3, 3),
(380, 16, 3, 4),
(906, 16, 3, 5),
(475, 16, 3, 6),
(161, 16, 3, 7),
(756, 16, 4, 0),
(103, 16, 4, 1),
(530, 16, 4, 2),
(841, 16, 4, 3),
(877, 16, 4, 4),
(318, 16, 4, 5),
(823, 16, 4, 6),
(387, 16, 4, 7),
(715, 16, 5, 0),
(285, 16, 5, 1),
(200, 16, 5, 2),
(908, 16, 5, 3),
(692, 16, 5, 4),
(988, 16, 5, 5),
(657, 16, 5, 6),
(465, 16, 5, 7),
(780, 16, 6, 0),
(263, 16, 6, 1),
(143, 16, 6, 2),
(266, 16, 6, 3),
(501, 16, 6, 4),
(892, 16, 6, 5),
(654, 16, 6, 6),
(170, 16, 6, 7),
(726, 16, 7, 0),
(712, 16, 7, 1),
(136, 16, 7, 2),
(488, 16, 7, 3),
(977, 16, 7, 4),
(705, 16, 7, 5),
(587, 16, 7, 6),
(178, 16, 7, 7),
(326, 17, 0, 0),
(507, 17, 0, 1),
(853, 17, 0, 2),
(450, 17, 0, 3),
(996, 17, 0, 4),
(201, 17, 0, 5),
(231, 17, 0, 6),
(263, 17, 0, 7),
(258, 17, 1, 0),
(323, 17, 1, 1),
(269, 17, 1, 2),
(827, 17, 1, 3),
(333, 17, 1, 4),
(956, 17, 1, 5),
(263, 17, 1, 6),
(200, 17, 1, 7),
(294, 17, 2, 0),
(835, 17, 2, 1),
(860, 17, 2, 2),
(493, 17, 2, 3),
(563, 17, 2, 4),
(944, 17, 2, 5),
(456, 17, 2, 6),
(665, 17, 2, 7),
(211, 17, 3, 0),
(918, 17, 3, 1),
(599, 17, 3, 2),
(125, 17, 3, 3),
(561, 17, 3, 4),
(841, 17, 3, 5),
(586, 17, 3, 6),
(532, 17, 3, 7),
(684, 17, 4, 0),
(348, 17, 4, 1),
(163, 17, 4, 2),
(396, 17, 4, 3),
(102, 17, 4, 4),
(422, 17, 4, 5),
(427, 17, 4, 6),
(477, 17, 4, 7),
(587, 17, 5, 0),
(698, 17, 5, 1),
(226, 17, 5, 2),
(182, 17, 5, 3),
(761, 17, 5, 4),
(361, 17, 5, 5),
(656, 17, 5, 6),
(273, 17, 5, 7),
(596, 17, 6, 0),
(845, 17, 6, 1),
(563, 17, 6, 2),
(158, 17, 6, 3),
(513, 17, 6, 4),
(434, 17, 6, 5),
(146, 17, 6, 6),
(597, 17, 6, 7),
(485, 17, 7, 0),
(562, 17, 7, 1),
(950, 17, 7, 2),
(999, 17, 7, 3),
(933, 17, 7, 4),
(415, 17, 7, 5),
(472, 17, 7, 6),
(324, 17, 7, 7),
(233, 18, 0, 0),
(195, 18, 0, 1),
(942, 18, 0, 2),
(353, 18, 0, 3),
(795, 18, 0, 4),
(978, 18, 0, 5),
(491, 18, 0, 6),
(929, 18, 0, 7),
(589, 18, 1, 0),
(832, 18, 1, 1),
(382, 18, 1, 2),
(166, 18, 1, 3),
(374, 18, 1, 4),
(628, 18, 1, 5),
(251, 18, 1, 6),
(513, 18, 1, 7),
(459, 18, 2, 0),
(788, 18, 2, 1),
(181, 18, 2, 2),
(367, 18, 2, 3),
(705, 18, 2, 4),
(384, 18, 2, 5),
(707, 18, 2, 6),
(373, 18, 2, 7),
(520, 18, 3, 0),
(737, 18, 3, 1),
(113, 18, 3, 2),
(728, 18, 3, 3),
(663, 18, 3, 4),
(920, 18, 3, 5),
(734, 18, 3, 6),
(281, 18, 3, 7),
(545, 18, 4, 0),
(454, 18, 4, 1),
(853, 18, 4, 2),
(127, 18, 4, 3),
(924, 18, 4, 4),
(211, 18, 4, 5),
(107, 18, 4, 6),
(914, 18, 4, 7),
(310, 18, 5, 0),
(614, 18, 5, 1),
(378, 18, 5, 2),
(137, 18, 5, 3),
(362, 18, 5, 4),
(733, 18, 5, 5),
(401, 18, 5, 6),
(245, 18, 5, 7),
(490, 18, 6, 0),
(991, 18, 6, 1),
(261, 18, 6, 2),
(534, 18, 6, 3),
(553, 18, 6, 4),
(460, 18, 6, 5),
(491, 18, 6, 6),
(751, 18, 6, 7),
(860, 18, 7, 0),
(462, 18, 7, 1),
(277, 18, 7, 2),
(193, 18, 7, 3),
(371, 18, 7, 4),
(968, 18, 7, 5),
(153, 18, 7, 6),
(407, 18, 7, 7),
(995, 6, 0, 0),
(524, 6, 0, 1),
(303, 6, 0, 2),
(253, 6, 0, 3),
(382, 6, 0, 4),
(572, 6, 0, 5),
(217, 6, 0, 6),
(536, 6, 0, 7),
(224, 6, 1, 0),
(745, 6, 1, 1),
(234, 6, 1, 2),
(423, 6, 1, 3),
(156, 6, 1, 4),
(790, 6, 1, 5),
(664, 6, 1, 6),
(337, 6, 1, 7),
(262, 6, 2, 0),
(903, 6, 2, 1),
(466, 6, 2, 2),
(249, 6, 2, 3),
(176, 6, 2, 4),
(832, 6, 2, 5),
(851, 6, 2, 6),
(581, 6, 2, 7),
(883, 6, 3, 0),
(773, 6, 3, 1),
(776, 6, 3, 2),
(405, 6, 3, 3),
(217, 6, 3, 4),
(473, 6, 3, 5),
(552, 6, 3, 6),
(143, 6, 3, 7),
(963, 6, 4, 0),
(129, 6, 4, 1),
(939, 6, 4, 2),
(667, 6, 4, 3),
(954, 6, 4, 4),
(388, 6, 4, 5),
(444, 6, 4, 6),
(598, 6, 4, 7),
(276, 6, 5, 0),
(547, 6, 5, 1),
(728, 6, 5, 2),
(809, 6, 5, 3),
(363, 6, 5, 4),
(353, 6, 5, 5),
(301, 6, 5, 6),
(821, 6, 5, 7),
(398, 6, 6, 0),
(902, 6, 6, 1),
(820, 6, 6, 2),
(607, 6, 6, 3),
(917, 6, 6, 4),
(142, 6, 6, 5),
(797, 6, 6, 6),
(587, 6, 6, 7),
(204, 6, 7, 0),
(969, 6, 7, 1),
(990, 6, 7, 2),
(735, 6, 7, 3),
(593, 6, 7, 4),
(430, 6, 7, 5),
(808, 6, 7, 6),
(571, 6, 7, 7),
(345, 7, 0, 0),
(757, 7, 0, 1),
(155, 7, 0, 2),
(915, 7, 0, 3),
(907, 7, 0, 4),
(641, 7, 0, 5),
(603, 7, 0, 6),
(591, 7, 0, 7),
(701, 7, 1, 0),
(495, 7, 1, 1),
(495, 7, 1, 2),
(729, 7, 1, 3),
(486, 7, 1, 4),
(291, 7, 1, 5),
(363, 7, 1, 6),
(176, 7, 1, 7),
(572, 7, 2, 0),
(451, 7, 2, 1),
(293, 7, 2, 2),
(929, 7, 2, 3),
(817, 7, 2, 4),
(946, 7, 2, 5),
(819, 7, 2, 6),
(935, 7, 2, 7),
(632, 7, 3, 0),
(400, 7, 3, 1),
(225, 7, 3, 2),
(391, 7, 3, 3),
(776, 7, 3, 4),
(582, 7, 3, 5),
(846, 7, 3, 6),
(843, 7, 3, 7),
(657, 7, 4, 0),
(116, 7, 4, 1),
(966, 7, 4, 2),
(690, 7, 4, 3),
(137, 7, 4, 4),
(774, 7, 4, 5),
(219, 7, 4, 6),
(576, 7, 4, 7),
(423, 7, 5, 0),
(276, 7, 5, 1),
(490, 7, 5, 2),
(700, 7, 5, 3),
(475, 7, 5, 4),
(395, 7, 5, 5),
(513, 7, 5, 6),
(808, 7, 5, 7),
(603, 7, 6, 0),
(654, 7, 6, 1),
(373, 7, 6, 2),
(197, 7, 6, 3),
(665, 7, 6, 4),
(123, 7, 6, 5),
(604, 7, 6, 6),
(414, 7, 6, 7),
(972, 7, 7, 0),
(124, 7, 7, 1),
(390, 7, 7, 2),
(756, 7, 7, 3),
(483, 7, 7, 4),
(631, 7, 7, 5),
(265, 7, 7, 6),
(969, 7, 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

DROP TABLE IF EXISTS `documentos`;
CREATE TABLE IF NOT EXISTS `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `descripcion` varchar(11) COLLATE ucs2_spanish_ci NOT NULL,
  `fichero` varchar(255) COLLATE ucs2_spanish_ci NOT NULL,
  `estado` enum('Pendiente','Firmado') COLLATE ucs2_spanish_ci NOT NULL,
  `fechaFirma` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `idUsuario`, `descripcion`, `fichero`, `estado`, `fechaFirma`) VALUES
(7, 6, 'dfdgdfs', 'upload/dir6/20181204071646tt.txt', 'Pendiente', '2018-04-12 07:16:46'),
(8, 6, 'hola mundo!', 'upload/dir6/20181204074846tt.txt', 'Pendiente', '2018-04-12 07:48:46'),
(9, 2, 'hola mundo', 'upload/dir2/20181604094127tt.txt', 'Firmado', '2018-04-16 09:41:27'),
(10, 2, 'sdasds', 'upload/dir2/20181604102755tt.txt', 'Pendiente', '2018-04-16 10:27:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE ucs2_spanish_ci NOT NULL,
  `email` varchar(255) COLLATE ucs2_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE ucs2_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE ucs2_spanish_ci NOT NULL,
  `estado` enum('bloqueado','activo') COLLATE ucs2_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `email`, `usuario`, `password`, `estado`) VALUES
(2, 'ooooo', 'ooooo@gmail.com', 'ooooo', '45298308dbec5c0757e6f751d0fb2a29', 'activo'),
(3, 'dios', 'dios@gmai.com', 'dios', 'a6923f6e2917066b987ebe0061018f22', 'activo'),
(4, 'pepe', 'pepe@pepe.com', 'pepe', '926e27eecdbc7a18858b3798ba99bddd', 'activo'),
(5, 'Victoriano Sevillano', 'victorianosevillano@gmail.com', 'Vsevillano', '256de4a2d6e32eb500e9a2484480d0bd', 'activo'),
(6, 'Jose', 'jose@gmail.com', 'jose', '662eaa47199461d01a623884080934ab', 'activo'),
(7, 'Paco', 'paco@gmail.conm', 'paco', '311020666a5776c57d265ace682dc46d', 'activo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
