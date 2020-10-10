-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2020 at 04:33 PM
-- Server version: 10.3.23-MariaDB
-- PHP Version: 7.3.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agnaroc1_kalyanio`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `desription` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `libelle`, `desription`, `created_at`, `updated_at`) VALUES
(1, 'Quotidien', 'Quotidien', '2019-11-03 14:04:41', '2019-11-03 14:04:41'),
(2, 'Evenement', 'Evenement', '2019-11-03 14:04:58', '2019-11-03 14:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `ingredient_type_id` int(11) DEFAULT 1,
  `prix` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredients`
--

INSERT INTO `ingredients` (`id`, `libelle`, `ingredient_type_id`, `prix`, `created_at`, `updated_at`) VALUES
(1, 'Tongolo - Oignon', 1, 1600, '2019-11-03 13:59:01', '2019-11-04 19:41:55'),
(2, 'Votabia - Tomate', 1, 2000, '2019-11-03 13:59:31', '2019-11-04 19:42:02'),
(3, 'Henomby - Viande de boeuf', 1, 15000, '2019-11-03 14:01:10', '2019-11-04 19:42:14'),
(4, 'Henakisoa - Viande de porc', 1, 16000, '2019-11-03 14:01:20', '2019-11-04 19:42:24'),
(5, 'Akoho - Poulet de chair', 1, 13000, '2019-11-03 14:01:33', '2019-11-04 19:42:35'),
(6, 'Sakamalao - Gingembre', 3, 2300, '2019-11-03 14:43:05', '2019-11-04 19:42:44'),
(7, 'Anan-tsonga', 1, 1600, '2019-11-03 15:20:08', '2019-11-03 15:20:25'),
(8, 'Petsay', 1, 1600, '2019-11-03 15:20:34', '2019-11-03 15:20:34'),
(9, 'Anandrano', 1, 1800, '2019-11-03 15:20:42', '2019-11-03 15:20:42'),
(10, 'Tissam', 1, 1800, '2019-11-03 15:21:19', '2019-11-03 15:21:19'),
(11, 'Fraomazy - Fromage', 1, 5000, '2019-11-04 16:52:00', '2019-11-04 19:42:56'),
(12, 'Fraomazy efa voatetika - Fromage rapé', 1, 6000, '2019-11-04 16:52:38', '2019-11-04 19:43:09'),
(13, 'Atody - Oeuf', 3, 500, '2019-11-04 16:54:07', '2019-11-04 19:43:18'),
(14, 'Lafarina - Farine', 1, 3000, '2019-11-04 16:55:54', '2019-11-04 19:43:29'),
(15, 'Chapelure', 1, 1500, '2019-11-04 16:56:18', '2019-11-04 16:56:18'),
(16, 'Baranjely - Aubergine', 3, 2000, '2019-11-04 18:57:48', '2019-11-04 19:41:43'),
(17, 'Basilika - Basilic', 3, 600, '2019-11-04 18:58:05', '2019-11-04 19:43:42'),
(18, 'Menaka - Huile', 2, 5000, '2019-11-04 19:16:40', '2019-11-04 19:43:57'),
(19, 'Votabia amin\'ny boaty - Concentré de tomate', 1, 800, '2019-11-04 19:17:19', '2019-11-04 19:44:49'),
(20, 'Tamotamo - Curcuma', 1, 900, '2019-11-04 19:45:14', '2019-11-04 19:45:14'),
(21, 'Leviora - Levure chimique', 1, 400, '2019-11-04 19:45:35', '2019-11-04 19:45:35'),
(22, 'Labiera - Bièrre', 1, 2500, '2019-11-04 19:45:54', '2019-11-04 19:45:54'),
(23, 'Sira - Sel', 1, 1200, '2019-11-04 19:47:03', '2019-11-04 19:47:03'),
(24, 'Dipoavra - Poivre', 1, 200, '2019-11-04 19:47:22', '2019-11-04 19:47:22'),
(25, 'Karoty - Carotte', 1, 2000, '2019-11-04 19:55:19', '2019-11-04 19:55:19'),
(26, 'Arikovera - Haricot vert', 1, 2000, '2019-11-04 19:55:35', '2019-11-04 19:55:35'),
(27, 'Korzety - Courgette', 1, 2000, '2019-11-04 19:55:54', '2019-11-04 19:55:54'),
(28, 'Sauce soja', 2, 3000, '2019-11-04 19:56:16', '2019-11-04 19:56:16'),
(29, 'Sauce huitre', 2, 4000, '2019-11-04 19:56:28', '2019-11-04 19:56:28'),
(30, 'Paté', 1, 10000, '2019-11-04 19:57:01', '2019-11-04 20:02:43'),
(31, 'Pate - Nouille', 1, 700, '2019-11-04 19:57:31', '2019-11-04 20:02:06'),
(32, 'Nofonkena - Tranche fine de zebu', 1, 18000, '2019-11-04 19:59:51', '2019-11-04 19:59:51'),
(33, 'Celeris', 1, 1000, '2019-11-05 03:42:54', '2019-11-05 03:42:54'),
(34, 'Tongolo gasy - Ail', 1, 3000, '2019-11-05 03:43:12', '2019-11-05 03:43:12'),
(35, 'Totokena - Viande haché', 1, 18000, '2019-11-05 04:05:42', '2019-11-05 04:05:42'),
(36, 'Cordiandre', 1, 2000, '2019-11-05 04:06:02', '2019-11-05 04:06:02'),
(37, 'Laisoa - Choux', 1, 2000, '2019-11-05 04:06:44', '2019-11-05 04:12:56'),
(38, 'Kary - Curry', 1, 400, '2019-11-05 04:09:56', '2019-11-05 04:09:56'),
(39, 'Vinaigitra - Vinaigre', 2, 400, '2019-11-05 04:10:54', '2019-11-05 04:10:54'),
(40, 'Spaghetti', 1, 2000, '2019-11-05 04:15:32', '2019-11-05 04:15:32'),
(41, 'Mortadelle', 1, 12000, '2019-11-05 04:16:06', '2019-11-05 04:16:06'),
(42, 'persil', 1, 600, '2019-11-05 04:16:18', '2019-11-05 04:16:18'),
(43, 'ovy - pomme de terre', 1, 1000, '2019-11-05 05:15:53', '2019-11-05 05:15:53'),
(44, 'Poirreau', 1, 2000, '2019-11-05 05:19:40', '2019-11-05 05:19:40'),
(45, 'Voatavo', 3, 3000, '2019-11-05 05:19:58', '2019-11-05 05:19:58'),
(46, 'akoho gasy', 1, 30000, '2019-11-09 16:26:16', '2019-11-09 16:26:16'),
(47, 'sosety', 1, 1000, '2019-11-09 16:27:14', '2019-11-09 16:27:14'),
(48, 'voanjobory', 1, 900, '2019-11-09 16:28:08', '2019-11-09 16:28:08'),
(49, 'ravim-bomanga', 1, 300, '2019-11-09 16:29:09', '2019-11-09 16:29:09'),
(50, 'poisson', 1, 5000, '2019-11-09 16:29:43', '2019-11-09 16:29:43'),
(51, 'tsaramaso', 1, 600, '2019-11-09 16:30:53', '2019-11-09 16:30:53'),
(52, 'saosisy', 1, 15000, '2019-11-09 16:31:35', '2019-11-09 16:32:11'),
(53, 'poivron', 1, 1000, '2019-11-09 16:33:10', '2019-11-09 16:33:10'),
(54, 'ravitoto', 1, 1000, '2019-11-09 16:33:52', '2019-11-09 16:33:52'),
(55, 'crevette', 1, 6000, '2019-11-09 16:34:50', '2019-11-09 16:34:50'),
(56, 'patsa be', 1, 22000, '2019-11-09 16:35:34', '2019-11-09 16:35:34'),
(57, 'Kitoza', 1, 15000, '2019-11-18 17:07:55', '2019-11-18 17:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_types`
--

CREATE TABLE `ingredient_types` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) DEFAULT NULL,
  `unite_mesure` enum('gramme','ml','piece') DEFAULT 'gramme',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ingredient_types`
--

INSERT INTO `ingredient_types` (`id`, `libelle`, `unite_mesure`, `created_at`, `updated_at`) VALUES
(1, 'Solide', 'gramme', NULL, NULL),
(2, 'Liquide', 'ml', NULL, NULL),
(3, 'Unite', 'piece', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `disk` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregate_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `mediables`
--

CREATE TABLE `mediables` (
  `media_id` int(10) UNSIGNED NOT NULL,
  `mediable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mediable_id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_16_154349_create_mediable_tables', 1),
(4, '2019_11_03_131114_timestamp_categories', 2),
(5, '2019_11_03_131155_timestamp_ingredients', 2),
(6, '2019_11_03_131215_timestamp_nourriture_ingredients', 2),
(7, '2019_11_03_131230_timestamp_nourritures', 2),
(8, '2019_11_03_131246_timestamp_plannings', 2),
(9, '2019_11_03_131335_timestamp_preparations', 2),
(10, '2019_11_03_131359_timestamp_sous_categories', 2),
(11, '2019_11_03_131523_timestamp_statistiques', 2),
(12, '2019_11_05_035919_timestamp_ingredient_types', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nourritures`
--

CREATE TABLE `nourritures` (
  `id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sous_category_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `cout` float DEFAULT NULL,
  `nb_personne` int(11) DEFAULT NULL,
  `preparation` text DEFAULT NULL,
  `preparation_duree` varchar(200) DEFAULT NULL,
  `cuisson` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nourritures`
--

INSERT INTO `nourritures` (`id`, `libelle`, `category_id`, `sous_category_id`, `description`, `cout`, `nb_personne`, `preparation`, `preparation_duree`, `cuisson`, `created_at`, `updated_at`) VALUES
(1, 'Henomby ritra', 1, 7, 'Henomby ritra ho an\'olona efatra', 7578, NULL, NULL, NULL, NULL, '2019-11-03 14:35:28', '2019-11-04 03:52:38'),
(2, 'Henakisoa sy anana', 1, 7, 'Henakisoa sy anana', 2130, NULL, NULL, NULL, NULL, '2019-11-03 15:16:24', '2019-11-04 03:53:17'),
(3, 'Baranjely nendasina mikarepoka tsara', 1, 7, 'Betsaka ny olona tsy dia tia laotra an’ity baranjely ity. Ito aza misy fomba anakiray mety mba ho tsara iany : Baranjely nendasina mikarepoka tsara.', 3493.6, NULL, '1. Tetehina boribory ny baranjely dia asiana sira ary avela hipetraka kely aloha.\r\n2. Apetraka eo ambony taratasy mitroka rano no tena mety ary fafana mihitsy rehefa tena hikarakara azy.\r\n3. Tetehina ny « basilic ». Afangaro ny fraomazy sy ny atody iray.\r\n4. Apetraka eo ambonin’ireo baranjely ireo fangaro ireo ka rakofana baranjely eo amboniny. Aorian’izay dia ampidirina ao anaty vata fampangatsiahana mandritra ny ora iray.\r\n5. Araraka ao anaty lovia jobo tsirairay ny lafarinina, ny atody sy ny « chapelure ». Rehefa tena hanendy dia arotsaka tsirairay ao anatin’ireo akora ireo ny baranjely, ka atomboka any amin’ny lafarinina izany.\r\n6. Hafanaina ny menaka ka endasina ny baranjely. Tsy atao may be loatra. Tsihifina eo ambony taratasy mitroka menaka.', '3h', NULL, '2019-11-04 19:02:20', '2019-11-04 19:17:40'),
(4, 'Beignets d’aubergine', 1, 7, 'Beignets d’aubergine', 1073.5, 4, '1- Kapohana ny 2 œufs sy sel sy curcuma kely. Arotsaka ny 250g de farine sy rano 1 tasse tsy feno be. Afaka asiana levure chimique kely raha tiana. Avela hisy pause 30mn (azo soloina bière ny rano).\r\n\r\n2-Tetehina tsy manify loatra, eo amin’ny 5mm eo ny baranjely 2. Asiana sel sy poivre. Ampandalovina anaty pate dia endasina.', '45mn', '20mn', '2019-11-04 19:40:02', '2019-11-04 19:49:34'),
(5, 'Boeuf à l’étouffée', 1, 1, 'Recette de Boeuf à l’étouffée à la façon malgache.', 30072, 4, '1.Couper la viande de bœuf en morceaux et les mettre dans une cocotte. Chauffer doucement et progressivement. La viande doit revenir dans sa propre graisse qui fond.\r\n    2.Lorsque la viande est bien dorée, mettre son volume et demi en eau. Saler, couvrir et cuire à feu très doux jusqu’à complète évaporation de l’eau.\r\n    3.Servir avec du riz, de la fricassée de brèdes et de l’apango.', '20mn', '3  à 4h', '2019-11-04 19:52:03', '2019-11-04 19:54:28'),
(6, 'Bol renversé de nouilles', 1, 7, 'Bol renversé de nouilles', 9983, 4, 'Andrahoina ny nouilles dia atokana.\r\n    Endasina ny nofon-kena dia avy eo atokana.\r\n    Endasina ny carotte sy haricot vert sy courgette ary pak choi (bémol). Asiana sel sy poivre sy sauce soja ary sauce huître.\r\n    Arotsaka ao ny hena ary somary asiana fécule kely hadity.\r\n    Atao anaty bol ny oeuf sur plat, avy eo ny legume sy ny hena, farany pâte ary somary tsindrina.\r\n    Ahohoka ambony lovia ny bol dia esorina moramora.', '20mn', '15mn', '2019-11-04 19:58:44', '2019-11-04 20:03:12'),
(7, 'Beignets de légumes', 1, 9, 'Vao mafana ny beignets de légumes na mofo legioma koa manasa antsika rehetra. Mitovitovy tamin’ilay mofo laisoa sy mofo anana ihany no nanaovana azy.', 2737.9, 4, 'Tetehina madinika ny carottes sy haricots verts sy courgette sy celeri sy oignon sy ail dia endakendasina asiana sel sy poivre sy sauce soja ary curcuma kely.\r\n    Afangaro ao ny 4 càs de farine sy ny atody 2.\r\n    Raisina tsikelikely amin’ny sotro dia endasina avy eo.', '15mn', '20mn', '2019-11-05 03:39:06', '2019-11-05 03:47:30'),
(8, 'Boulettes de viande et achards de légumes', 1, 1, 'Laoka anio: laoka tsotra sady mora vita. Atao ra sendra taratara vao ahandro laoka: boulettes de viande et achards de légumes. Mitovitovy amin’ny boulettes chinoise sy hena baolina ihany ny fanaovana azy.', 6258, 4, '1.Afangaro ny totokena 250g sy sel sy poivre sy ail sy gingembre sy 1 oeuf ary coriandre. Atao boulettes dia endasina ary atokana.\r\n  2.Arotsaka anaty huile nanendasana ny boulettes ny lasary gasy efa voatetika (carotte sy haricot vert ary laisoa). Asiana ail sy oignon sy sel sy poivre sy curry ary vinaigre. Atao mahery be ny afo mba ho « croquants ». vita.', '15mn', '15mn', '2019-11-05 04:04:03', '2019-11-05 04:12:43'),
(9, 'Lasopy chinoise', 1, 9, 'Fomba fikarakarana lasopy chinoise spécial amin’ny fomba nahandro malagasy.', 1707, 2, 'Apangotrahana ny rano mandritra ny 5 na 10 minitra.\r\n    Arotsaka ny paty na spaghetti avy eo. Tsy atao masaka loatra.\r\n    Asiana sira ary tsy ariana ny ranony fa afaka atao rô tsara.\r\n    Kapohana ny atody ary avy eo dia endasina.\r\n    Rehefa ao anaty baolina vao tetehana ny mortadel sy hena, sardine ary persil anaingoana azy.', '10mn', '5mn', '2019-11-05 04:17:26', '2019-11-05 04:19:01'),
(10, 'henomby sy legume', 1, 1, 'lasopy légume sy henomby', 1276, 2, 'tetehana ny henomby \r\nAndraona am rano tsasany\r\nKarakaraina ny legume\r\nArotsaka miaraka rehefa malemy ny hena', '20min', '1h30', '2019-11-05 05:13:49', '2019-11-05 05:20:34'),
(11, 'Totokena sy ovy', 1, 7, 'Totokena sy ovy', 0, 2, 'Totokena sy ovy', '10min', '10min', '2019-11-18 17:07:04', '2019-11-18 17:07:28'),
(12, 'Vary amin\'ny anana sy kitoza', 1, 7, 'Vary amin\'ny anana sy kitoza', 0, 2, 'Vary amin\'ny anana sy kitoza', '20mn', '20mn', '2019-11-18 17:08:28', '2019-11-18 17:08:53'),
(13, 'Henabaolina', 1, 7, 'Henabaolina', 0, 2, 'Henabaolina', '20mn', '20mn', '2019-11-18 17:11:40', '2019-11-18 17:12:00'),
(14, 'Trondro frittes', 1, 7, 'Trondro frittes', 0, 2, 'Trondro frittes', '20mn', '20mn', '2019-11-18 17:13:00', '2019-11-18 17:13:45'),
(15, 'Henomby sy voatavo', 1, 1, 'Henomby sy voatavo', NULL, 4, 'Henomby sy voatavo', '20mn', '20mn', '2019-11-18 17:16:10', '2019-11-18 17:16:10'),
(16, 'Henakisoa sy laisoa', 1, 1, 'Henakisoa sy laisoa', NULL, 2, 'Henakisoa sy laisoa', '20mn', '20mn', '2019-11-18 17:17:04', '2019-11-18 17:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `nourriture_ingredients`
--

CREATE TABLE `nourriture_ingredients` (
  `id` int(11) NOT NULL,
  `nourriture_id` int(11) NOT NULL,
  `ingredient_id` int(11) DEFAULT NULL,
  `poids` float DEFAULT NULL COMMENT 'unité de mésure : gramme',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nourriture_ingredients`
--

INSERT INTO `nourriture_ingredients` (`id`, `nourriture_id`, `ingredient_id`, `poids`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 20, '2019-11-03 14:46:16', '2019-11-03 15:11:47'),
(2, 1, 6, 20, '2019-11-03 14:50:30', '2019-11-03 15:11:40'),
(3, 1, 3, 500, '2019-11-03 14:51:03', '2019-11-03 15:12:04'),
(4, 2, 10, 50, '2019-11-03 15:21:36', '2019-11-03 15:21:36'),
(5, 2, 2, 20, '2019-11-03 15:22:14', '2019-11-03 15:22:14'),
(6, 2, 4, 125, '2019-11-03 15:23:10', '2019-11-03 15:23:10'),
(7, 3, 16, 1, '2019-11-04 19:11:49', '2019-11-04 19:11:49'),
(8, 3, 17, 1, '2019-11-04 19:14:14', '2019-11-04 19:14:14'),
(9, 3, 11, 150, '2019-11-04 19:15:03', '2019-11-04 19:15:03'),
(10, 3, 12, 120, '2019-11-04 19:15:21', '2019-11-04 19:15:21'),
(11, 3, 13, 2, '2019-11-04 19:15:31', '2019-11-04 19:15:31'),
(12, 3, 14, 80, '2019-11-04 19:15:48', '2019-11-04 19:15:48'),
(13, 3, 15, 80, '2019-11-04 19:16:03', '2019-11-04 19:16:03'),
(14, 3, 18, 300, '2019-11-04 19:16:55', '2019-11-04 19:16:55'),
(15, 3, 19, 200, '2019-11-04 19:17:40', '2019-11-04 19:17:40'),
(16, 4, 13, 2, '2019-11-04 19:46:36', '2019-11-04 19:46:36'),
(17, 4, 23, 10, '2019-11-04 19:47:47', '2019-11-04 19:47:47'),
(18, 4, 24, 10, '2019-11-04 19:48:01', '2019-11-04 19:48:01'),
(19, 4, 20, 5, '2019-11-04 19:48:20', '2019-11-04 19:48:20'),
(20, 4, 21, 10, '2019-11-04 19:48:47', '2019-11-04 19:48:47'),
(21, 4, 22, 100, '2019-11-04 19:49:05', '2019-11-04 19:49:05'),
(22, 4, 16, 400, '2019-11-04 19:49:34', '2019-11-04 19:49:34'),
(23, 5, 3, 2000, '2019-11-04 19:54:11', '2019-11-04 19:54:11'),
(24, 5, 23, 60, '2019-11-04 19:54:28', '2019-11-04 19:54:28'),
(25, 6, 32, 500, '2019-11-04 20:00:23', '2019-11-04 20:00:23'),
(26, 6, 25, 100, '2019-11-04 20:00:35', '2019-11-04 20:00:35'),
(27, 6, 26, 100, '2019-11-04 20:00:44', '2019-11-04 20:00:44'),
(28, 6, 27, 100, '2019-11-04 20:00:55', '2019-11-04 20:00:55'),
(29, 6, 23, 10, '2019-11-04 20:01:05', '2019-11-04 20:01:05'),
(30, 6, 24, 5, '2019-11-04 20:01:14', '2019-11-04 20:01:14'),
(31, 6, 28, 50, '2019-11-04 20:01:29', '2019-11-04 20:01:29'),
(32, 6, 29, 20, '2019-11-04 20:01:44', '2019-11-04 20:01:44'),
(33, 6, 31, 200, '2019-11-04 20:03:12', '2019-11-04 20:03:12'),
(34, 7, 25, 200, '2019-11-05 03:44:07', '2019-11-05 03:44:07'),
(35, 7, 26, 200, '2019-11-05 03:44:21', '2019-11-05 03:44:21'),
(36, 7, 27, 200, '2019-11-05 03:44:38', '2019-11-05 03:44:38'),
(37, 7, 1, 10, '2019-11-05 03:44:49', '2019-11-05 03:44:49'),
(38, 7, 34, 10, '2019-11-05 03:44:57', '2019-11-05 03:44:57'),
(39, 7, 23, 5, '2019-11-05 03:45:37', '2019-11-05 03:45:37'),
(40, 7, 24, 2, '2019-11-05 03:45:51', '2019-11-05 03:45:51'),
(41, 7, 18, 50, '2019-11-05 03:46:06', '2019-11-05 03:46:06'),
(42, 7, 28, 10, '2019-11-05 03:46:37', '2019-11-05 03:46:37'),
(43, 7, 20, 5, '2019-11-05 03:47:09', '2019-11-05 03:47:09'),
(44, 7, 14, 400, '2019-11-05 03:47:20', '2019-11-05 03:47:20'),
(45, 7, 13, 2, '2019-11-05 03:47:30', '2019-11-05 03:47:30'),
(46, 8, 35, 250, '2019-11-05 04:07:09', '2019-11-05 04:07:09'),
(47, 8, 23, 5, '2019-11-05 04:07:48', '2019-11-05 04:07:48'),
(48, 8, 24, 5, '2019-11-05 04:07:59', '2019-11-05 04:07:59'),
(49, 8, 1, 5, '2019-11-05 04:08:21', '2019-11-05 04:08:21'),
(50, 8, 34, 5, '2019-11-05 04:08:37', '2019-11-05 04:08:37'),
(51, 8, 6, 5, '2019-11-05 04:08:59', '2019-11-05 04:08:59'),
(52, 8, 13, 1, '2019-11-05 04:09:08', '2019-11-05 04:09:08'),
(53, 8, 36, 100, '2019-11-05 04:09:27', '2019-11-05 04:09:27'),
(54, 8, 38, 10, '2019-11-05 04:10:34', '2019-11-05 04:10:34'),
(55, 8, 18, 100, '2019-11-05 04:11:45', '2019-11-05 04:11:45'),
(56, 8, 39, 30, '2019-11-05 04:11:57', '2019-11-05 04:11:57'),
(57, 8, 25, 100, '2019-11-05 04:12:14', '2019-11-05 04:12:14'),
(58, 8, 26, 200, '2019-11-05 04:12:31', '2019-11-05 04:12:31'),
(59, 8, 37, 200, '2019-11-05 04:12:43', '2019-11-05 04:12:43'),
(60, 9, 40, 250, '2019-11-05 04:18:16', '2019-11-05 04:18:16'),
(61, 9, 41, 100, '2019-11-05 04:18:24', '2019-11-05 04:18:24'),
(62, 9, 13, 2, '2019-11-05 04:18:33', '2019-11-05 04:18:33'),
(63, 9, 42, 10, '2019-11-05 04:19:01', '2019-11-05 04:19:01'),
(64, 10, 25, 250, '2019-11-05 05:15:03', '2019-11-05 05:15:03'),
(65, 10, 43, 250, '2019-11-05 05:16:17', '2019-11-05 05:16:17'),
(66, 10, 26, 250, '2019-11-05 05:16:28', '2019-11-05 05:16:28'),
(67, 10, 44, 10, '2019-11-05 05:20:16', '2019-11-05 05:20:16'),
(68, 10, 45, 2, '2019-11-05 05:20:34', '2019-11-05 05:20:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `plannings`
--

CREATE TABLE `plannings` (
  `id` int(11) NOT NULL,
  `nourriture_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `plannifier_pour` enum('matin','midi','soir') DEFAULT 'soir',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `plannings`
--

INSERT INTO `plannings` (`id`, `nourriture_id`, `date`, `plannifier_pour`, `created_at`, `updated_at`) VALUES
(1, 10, '2019-11-05 20:00:00', 'soir', '2019-11-05 05:17:59', '2019-11-25 17:56:36'),
(2, 10, '2019-11-19 20:30:00', 'soir', '2019-11-18 17:05:53', '2019-11-18 17:06:11'),
(3, 11, '2019-11-20 20:30:00', 'soir', '2019-11-18 17:07:28', '2019-11-18 17:07:28'),
(4, 12, '2019-11-21 20:30:00', 'soir', '2019-11-18 17:08:53', '2019-11-18 17:08:53'),
(5, 2, '2019-11-22 20:30:00', 'soir', '2019-11-18 17:09:11', '2019-11-18 17:09:11'),
(6, 1, '2019-11-23 20:30:00', 'soir', '2019-11-18 17:10:10', '2019-11-18 17:10:10'),
(7, 6, '2019-11-24 13:30:00', 'midi', '2019-11-18 17:10:42', '2019-11-18 17:10:42'),
(8, 13, '2019-11-24 20:30:00', 'midi', '2019-11-18 17:12:00', '2019-11-25 17:54:45'),
(9, 14, '2019-12-08 13:30:00', 'midi', '2019-11-18 17:13:45', '2019-11-18 17:13:45'),
(10, 14, '2019-12-08 20:30:00', 'soir', '2019-11-18 17:14:08', '2019-11-18 17:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `sous_categories`
--

CREATE TABLE `sous_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `libelle` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sous_categories`
--

INSERT INTO `sous_categories` (`id`, `category_id`, `libelle`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Entrée chaude', 'Entrée chaude', '2019-11-03 14:12:06', '2019-11-03 14:12:40'),
(2, 2, 'Entrée froide', 'Entrée froide', '2019-11-03 14:12:25', '2019-11-03 14:12:52'),
(3, 2, 'Plat de résistance', 'Plat de résistance', '2019-11-03 14:12:59', '2019-11-03 14:12:59'),
(4, 2, 'Dessert', 'Dessert', '2019-11-03 14:13:08', '2019-11-03 14:13:08'),
(5, 1, 'Petit déjeuner', 'Petit déjeuner', '2019-11-03 14:13:28', '2019-11-03 14:13:28'),
(6, 1, 'Déjeuner', 'Déjeuner', '2019-11-03 14:13:44', '2019-11-03 14:13:44'),
(7, 1, 'Diner', 'Diner', '2019-11-03 14:14:01', '2019-11-03 14:14:01'),
(8, 1, 'Dessert', 'Dessert', '2019-11-03 14:14:25', '2019-11-03 14:14:25'),
(9, 1, 'Gouter', 'Gouter', '2019-11-03 14:14:49', '2019-11-03 14:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `statistiques`
--

CREATE TABLE `statistiques` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nourriture_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rakotondrasata', 'Mano', 'manohisoa.dev@gmail.com', NULL, '$2y$10$bmrX3OuOInhE95/t6obXHeMWEO5uRi.8BTy5kVPtrsax.D4L0HCuq', NULL, '2019-11-03 13:07:15', '2019-11-03 13:07:15'),
(2, 'Harimalala', 'Felana', 'felanapucca@gmail.com', NULL, '$2y$10$jQoRnK4wGWHocoNTaQoV1.fLBZx7/XpTdb6O5vM3Zg1ODJIxOjvfK', NULL, '2019-11-04 17:32:19', '2019-11-04 17:32:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_types`
--
ALTER TABLE `ingredient_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_disk_directory_filename_extension_unique` (`disk`,`directory`,`filename`,`extension`),
  ADD KEY `media_disk_directory_index` (`disk`,`directory`),
  ADD KEY `media_aggregate_type_index` (`aggregate_type`);

--
-- Indexes for table `mediables`
--
ALTER TABLE `mediables`
  ADD PRIMARY KEY (`media_id`,`mediable_type`,`mediable_id`,`tag`),
  ADD KEY `mediables_mediable_id_mediable_type_index` (`mediable_id`,`mediable_type`),
  ADD KEY `mediables_tag_index` (`tag`),
  ADD KEY `mediables_order_index` (`order`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nourritures`
--
ALTER TABLE `nourritures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nourriture_ingredients`
--
ALTER TABLE `nourriture_ingredients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plannings`
--
ALTER TABLE `plannings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sous_categories`
--
ALTER TABLE `sous_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statistiques`
--
ALTER TABLE `statistiques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `ingredient_types`
--
ALTER TABLE `ingredient_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nourritures`
--
ALTER TABLE `nourritures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nourriture_ingredients`
--
ALTER TABLE `nourriture_ingredients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `plannings`
--
ALTER TABLE `plannings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sous_categories`
--
ALTER TABLE `sous_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statistiques`
--
ALTER TABLE `statistiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mediables`
--
ALTER TABLE `mediables`
  ADD CONSTRAINT `mediables_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
