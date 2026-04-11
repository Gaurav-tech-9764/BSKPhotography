-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2026 at 05:31 AM
-- Server version: 9.1.0
-- PHP Version: 8.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bsk_photography`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achievements` text COLLATE utf8mb4_unicode_ci,
  `story` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `image`, `experience`, `achievements`, `story`, `created_at`, `updated_at`) VALUES
(1, 'About BSK Photography', 'BSK Photography is a premier photography studio based in Amravti, Maharashtra. Founded with a passion for capturing life\'s most precious moments, we have grown into one of the most trusted names in professional photography.\r\n\r\nOur team of experienced photographers brings creativity, technical expertise, and a deep understanding of light and composition to every project. Whether it\'s a grand wedding celebration, an intimate portrait session, or a high-energy corporate event, we approach each assignment with the same dedication to excellence.\r\n\r\nWe believe that every photograph should tell a story. Our goal is to create images that not only document moments but also evoke the emotions and atmosphere of the experience. From the first consultation to the final delivery, we work closely with our clients to understand their vision and exceed their expectations.', 'about/1774508436_AnnzuXhN.jpg', '10+ Years of Professional Photography', '500+ Weddings Covered\r\n1000+ Portrait Sessions\r\n200+ Corporate Events\r\n50+ Fashion Shoots\r\nFeatured in Wedding Magazine India\r\nBest Photography Studio - Mumbai Awards 2025', 'BSK Photography started in 2016 as a small studio with a big dream. Our founder, driven by an unwavering passion for visual storytelling, began capturing weddings and portraits with just a single camera and a lot of heart.\r\n\r\nOver the years, we\'ve expanded our team, upgraded our equipment, and refined our craft. But one thing remains unchanged - our commitment to making every client feel special and delivering photographs that stand the test of time.\r\n\r\nToday, BSK Photography is proud to be one of Mumbai\'s leading photography studios, trusted by hundreds of families and businesses for their most important moments.', '2026-03-26 01:30:36', '2026-03-26 02:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `subtitle`, `image`, `link`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Capturing Life\'s Beautiful Moments', 'Professional Photography Services in Mumbai', 'banners/1774508427_kA5BwVGS.jpg', NULL, 1, 0, '2026-03-26 01:30:27', '2026-03-26 01:30:27'),
(2, 'Wedding Photography', 'Making Your Special Day Unforgettable', 'banners/1774508427_82heM4RB.jpg', NULL, 1, 1, '2026-03-26 01:30:27', '2026-03-26 01:30:27'),
(3, 'Portrait Sessions', 'Express Your True Self Through Our Lens', 'banners/1774508427_T8UTAyaQ.jpg', NULL, 1, 2, '2026-03-26 01:30:27', '2026-03-26 01:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE IF NOT EXISTS `blog_posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blog_posts_slug_unique` (`slug`),
  KEY `blog_posts_slug_index` (`slug`),
  KEY `blog_posts_is_published_published_at_index` (`is_published`,`published_at`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `title`, `slug`, `excerpt`, `content`, `featured_image`, `is_published`, `published_at`, `created_at`, `updated_at`) VALUES
(1, '10 Tips for Perfect Wedding Photography', '10-tips-for-perfect-wedding-photography', 'Planning your dream wedding? Here are our top tips for ensuring your wedding photos are absolutely perfect.', 'Your wedding day is one of the most important days of your life, and the photographs from that day will be treasured for generations. Here are our top tips for ensuring stunning wedding photos:\n\n1. **Meet Your Photographer Early** - Schedule a pre-wedding consultation to discuss your vision, preferred style, and must-have shots.\n\n2. **Create a Shot List** - While candid moments are beautiful, having a list of essential family groupings and key moments ensures nothing is missed.\n\n3. **Consider the Lighting** - Golden hour (just before sunset) provides the most flattering natural light for portraits.\n\n4. **Choose Your Venue Wisely** - Consider how photogenic the venue is when making your selection.\n\n5. **Allow Enough Time** - Don\'t rush your photo sessions. Build adequate time into your schedule for posed portraits.\n\n6. **Embrace Candid Moments** - Some of the best wedding photos are unplanned, genuine moments of joy.\n\n7. **Coordinate with Your Team** - Ensure your photographer, videographer, and planner are all on the same page.\n\n8. **Don\'t Forget the Details** - Rings, shoes, invitations, and decor all tell part of your wedding story.\n\n9. **Be Yourselves** - The most beautiful photos happen when couples are relaxed and being genuine.\n\n10. **Trust Your Photographer** - You hired a professional for a reason. Trust their expertise and creative vision.', 'blog/1774508436_hC150mox.jpg', 1, '2026-03-26 01:30:36', '2026-03-26 01:30:36', '2026-03-26 01:30:36'),
(2, 'The Art of Portrait Photography', 'the-art-of-portrait-photography', 'Discover the secrets behind capturing compelling portraits that reveal the true essence of your subject.', 'Portrait photography is more than just pointing a camera at someone. It\'s about capturing personality, emotion, and story in a single frame.\n\n**Understanding Light**\nLight is the most important element in portrait photography. Natural window light, golden hour sunlight, and carefully placed studio lights can dramatically change the mood and feel of a portrait.\n\n**Connection with Your Subject**\nThe best portraits come from genuine connections between the photographer and subject. Take time to talk, laugh, and make your subject feel comfortable before picking up the camera.\n\n**Composition Matters**\nThe rule of thirds, leading lines, and framing all play important roles in creating visually compelling portraits. Don\'t be afraid to experiment with different angles and perspectives.\n\n**Post-Processing**\nSubtle editing can enhance your portraits without making them look artificial. Focus on color correction, skin smoothing, and bringing out the eyes.\n\nAt BSK Photography, we believe every person has a unique story to tell through their portrait. Book your session today!', 'blog/1774508436_8v9934XY.jpg', 1, '2026-03-19 01:30:36', '2026-03-26 01:30:36', '2026-03-26 01:30:36'),
(3, 'Behind the Scenes: How We Cover Events', 'behind-the-scenes-how-we-cover-events', 'A look behind the curtain at our event photography workflow, from preparation to final delivery.', 'Ever wondered what goes into professionally covering an event? Here\'s our behind-the-scenes workflow:\n\n**Pre-Event Planning**\nBefore any event, we conduct a thorough site visit, study the event schedule, and plan our equipment needs. This preparation ensures we\'re ready for every moment.\n\n**Equipment Setup**\nWe typically use multiple camera bodies with various lenses to cover different situations. Fast prime lenses for low-light conditions, telephoto lenses for candid shots from a distance, and wide-angle lenses for venue shots.\n\n**During the Event**\nOur team splits into roles - one photographer focuses on key moments and speakers, while another captures candid interactions and details. This ensures comprehensive coverage.\n\n**Post-Production**\nAfter the event, we carefully curate and edit the best photographs. This includes color correction, exposure adjustment, and careful retouching where needed.\n\n**Delivery**\nFinal images are delivered within 7-10 business days through a secure online gallery. Clients receive both web-resolution and high-resolution files.\n\nReady to have your next event professionally covered? Contact us for a quote!', 'blog/1774508436_iI2ZHKZi.jpg', 1, '2026-03-12 01:30:36', '2026-03-26 01:30:36', '2026-03-26 01:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('bsk-photography-cache-contact-form:::1:timer', 'i:1774521750;', 1774521750),
('bsk-photography-cache-contact-form:::1', 'i:1;', 1774521750);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_slug_index` (`slug`),
  KEY `categories_is_active_index` (`is_active`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `cover_image`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Photography', 'wedding-photography', 'Beautiful moments from wedding celebrations captured with love and artistry.', 'categories/1774508427_4oHmidSe.jpg', 1, 0, '2026-03-26 01:30:27', '2026-03-26 01:30:27'),
(2, 'Portrait Sessions', 'portrait-sessions', 'Professional portrait photography for individuals, couples, and families.', 'categories/1774508428_EQKKmDWe.jpg', 1, 1, '2026-03-26 01:30:28', '2026-03-26 01:30:28'),
(3, 'Event Coverage', 'event-coverage', 'Complete coverage of corporate events, parties, and special occasions.', 'categories/1774508429_nvH6f37m.jpg', 1, 2, '2026-03-26 01:30:29', '2026-03-26 01:30:29'),
(4, 'Nature & Landscape', 'nature-landscape', 'Stunning landscape and nature photography from around the world.', 'categories/1774508430_ijlCrjYk.jpg', 1, 3, '2026-03-26 01:30:30', '2026-03-26 01:30:30'),
(5, 'Fashion & Editorial', 'fashion-editorial', 'High-end fashion and editorial photography for brands and publications.', 'categories/1774508431_2qLKZRVb.jpg', 1, 4, '2026-03-26 01:30:31', '2026-03-26 01:30:31'),
(6, 'Product Photography', 'product-photography', 'Clean, professional product shots for e-commerce and advertising.', 'categories/1774508432_30WsEWUz.jpg', 1, 5, '2026-03-26 01:30:32', '2026-03-26 01:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `contact_inquiries`
--

DROP TABLE IF EXISTS `contact_inquiries`;
CREATE TABLE IF NOT EXISTS `contact_inquiries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_inquiries_is_read_index` (`is_read`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_inquiries`
--

INSERT INTO `contact_inquiries` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'Gaurav', 'gauravnakhale7@gmail.com', '7875933209', 'Wedding booking', 'Test', 1, '2026-03-26 05:07:30', '2026-03-26 05:07:48');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `event_date` date DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `events_slug_unique` (`slug`),
  KEY `events_slug_index` (`slug`),
  KEY `events_event_date_index` (`event_date`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `description`, `event_date`, `location`, `cover_image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sharma-Patel Wedding Celebration', 'sharma-patel-wedding-celebration', 'A grand celebration of love at The Taj Palace, Mumbai. Three days of wedding festivities including Mehendi, Sangeet, and the main wedding ceremony captured in stunning detail.', '2026-02-14', 'The Taj Palace, Mumbai', 'events/1774508433_Kp3Kktn9.jpg', 1, '2026-03-26 01:30:33', '2026-03-26 01:30:33'),
(2, 'Annual Photography Exhibition 2026', 'annual-photography-exhibition-2026', 'Our annual photography exhibition showcasing the best work from the past year. Over 50 photographs displayed in the prestigious Gallery One.', '2026-01-20', 'Gallery One, Bandra', 'events/1774508434_ntrlzVl1.jpg', 1, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(3, 'Corporate Annual Day - TechCorp', 'corporate-annual-day-techcorp', 'Complete coverage of TechCorp\'s annual day celebration featuring keynote speeches, awards ceremony, cultural performances, and networking dinner.', '2026-03-10', 'Grand Hyatt, Mumbai', 'events/1774508434_osYoXHS6.jpg', 1, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(4, 'Fashion Week Backstage', 'fashion-week-backstage', 'Behind the scenes coverage of Mumbai Fashion Week including designer preparations, model fittings, and exclusive backstage moments.', '2026-03-01', 'NSCI Dome, Mumbai', 'events/1774508435_rpH3zsZg.jpg', 1, '2026-03-26 01:30:35', '2026-03-26 01:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

DROP TABLE IF EXISTS `event_images`;
CREATE TABLE IF NOT EXISTS `event_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` bigint UNSIGNED NOT NULL,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `caption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_images_event_id_index` (`event_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `event_id`, `image_path`, `caption`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'events/gallery/1774508433_ECQBuLZg.jpg', 'Sharma-Patel Wedding Celebration - Photo 1', 1, '2026-03-26 01:30:33', '2026-03-26 01:30:33'),
(2, 1, 'events/gallery/1774508433_mrca79sW.jpg', 'Sharma-Patel Wedding Celebration - Photo 2', 2, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(3, 1, 'events/gallery/1774508434_uiTrW3KS.jpg', 'Sharma-Patel Wedding Celebration - Photo 3', 3, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(4, 1, 'events/gallery/1774508434_eJi7LA1y.jpg', 'Sharma-Patel Wedding Celebration - Photo 4', 4, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(5, 2, 'events/gallery/1774508434_3r5bIRCY.jpg', 'Annual Photography Exhibition 2026 - Photo 1', 1, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(6, 2, 'events/gallery/1774508434_k2ULhEXo.jpg', 'Annual Photography Exhibition 2026 - Photo 2', 2, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(7, 2, 'events/gallery/1774508434_NWVs9aUJ.jpg', 'Annual Photography Exhibition 2026 - Photo 3', 3, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(8, 2, 'events/gallery/1774508434_suF0PMoX.jpg', 'Annual Photography Exhibition 2026 - Photo 4', 4, '2026-03-26 01:30:34', '2026-03-26 01:30:34'),
(9, 3, 'events/gallery/1774508434_1OubIVaZ.jpg', 'Corporate Annual Day - TechCorp - Photo 1', 1, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(10, 3, 'events/gallery/1774508435_EXBTkond.jpg', 'Corporate Annual Day - TechCorp - Photo 2', 2, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(11, 3, 'events/gallery/1774508435_m6rHwxtI.jpg', 'Corporate Annual Day - TechCorp - Photo 3', 3, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(12, 3, 'events/gallery/1774508435_Cs7HJVx8.jpg', 'Corporate Annual Day - TechCorp - Photo 4', 4, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(13, 4, 'events/gallery/1774508435_MmBUK2Xy.jpg', 'Fashion Week Backstage - Photo 1', 1, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(14, 4, 'events/gallery/1774508435_5aYGD3ml.jpg', 'Fashion Week Backstage - Photo 2', 2, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(15, 4, 'events/gallery/1774508435_kHcvOCyO.jpg', 'Fashion Week Backstage - Photo 3', 3, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(16, 4, 'events/gallery/1774508435_p6y38hzl.jpg', 'Fashion Week Backstage - Photo 4', 4, '2026-03-26 01:30:35', '2026-03-26 01:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_26_000001_create_categories_table', 1),
(5, '2026_03_26_000002_create_portfolio_images_table', 1),
(6, '2026_03_26_000003_create_events_table', 1),
(7, '2026_03_26_000004_create_event_images_table', 1),
(8, '2026_03_26_000005_create_services_table', 1),
(9, '2026_03_26_000006_create_abouts_table', 1),
(10, '2026_03_26_000007_create_contact_inquiries_table', 1),
(11, '2026_03_26_000008_create_social_links_table', 1),
(12, '2026_03_26_000009_create_banners_table', 1),
(13, '2026_03_26_000010_create_settings_table', 1),
(14, '2026_03_26_000011_create_testimonials_table', 1),
(15, '2026_03_26_000012_create_blog_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_images`
--

DROP TABLE IF EXISTS `portfolio_images`;
CREATE TABLE IF NOT EXISTS `portfolio_images` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_images_category_id_index` (`category_id`),
  KEY `portfolio_images_is_featured_index` (`is_featured`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_images`
--

INSERT INTO `portfolio_images` (`id`, `category_id`, `title`, `description`, `image_path`, `thumbnail_path`, `is_featured`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'The Grand Reception', 'A beautiful wedding photography photograph - The Grand Reception', 'portfolio/1774508427_guE1WGxK.jpg', 'portfolio/thumbnails/1774508427_guE1WGxK.jpg', 1, 0, '2026-03-26 01:30:27', '2026-03-26 01:30:27'),
(2, 1, 'Bridal Portrait', 'A beautiful wedding photography photograph - Bridal Portrait', 'portfolio/1774508427_tZYydKlm.jpg', 'portfolio/thumbnails/1774508427_tZYydKlm.jpg', 1, 1, '2026-03-26 01:30:28', '2026-03-26 01:30:28'),
(3, 1, 'Ring Ceremony', 'A beautiful wedding photography photograph - Ring Ceremony', 'portfolio/1774508428_baAc9IFM.jpg', 'portfolio/thumbnails/1774508428_baAc9IFM.jpg', 0, 2, '2026-03-26 01:30:28', '2026-03-26 01:30:28'),
(4, 1, 'First Dance', 'A beautiful wedding photography photograph - First Dance', 'portfolio/1774508428_StlxjJE6.jpg', 'portfolio/thumbnails/1774508428_StlxjJE6.jpg', 0, 3, '2026-03-26 01:30:28', '2026-03-26 01:30:28'),
(5, 1, 'Wedding Decor', 'A beautiful wedding photography photograph - Wedding Decor', 'portfolio/1774508428_Zuw8rzXM.jpg', 'portfolio/thumbnails/1774508428_Zuw8rzXM.jpg', 0, 4, '2026-03-26 01:30:28', '2026-03-26 01:30:28'),
(6, 1, 'Couple Portraits', 'A beautiful wedding photography photograph - Couple Portraits', 'portfolio/1774508428_F8ArsBnu.jpg', 'portfolio/thumbnails/1774508428_F8ArsBnu.jpg', 0, 5, '2026-03-26 01:30:28', '2026-03-26 01:30:28'),
(7, 2, 'Corporate Headshot', 'A beautiful portrait sessions photograph - Corporate Headshot', 'portfolio/1774508428_FYKzaMXO.jpg', 'portfolio/thumbnails/1774508428_FYKzaMXO.jpg', 1, 0, '2026-03-26 01:30:28', '2026-03-26 01:30:28'),
(8, 2, 'Family Portrait', 'A beautiful portrait sessions photograph - Family Portrait', 'portfolio/1774508428_BgeGmNDG.jpg', 'portfolio/thumbnails/1774508428_BgeGmNDG.jpg', 1, 1, '2026-03-26 01:30:28', '2026-03-26 01:30:28'),
(9, 2, 'Graduation Photo', 'A beautiful portrait sessions photograph - Graduation Photo', 'portfolio/1774508428_6EoQy2h2.jpg', 'portfolio/thumbnails/1774508428_6EoQy2h2.jpg', 0, 2, '2026-03-26 01:30:29', '2026-03-26 01:30:29'),
(10, 2, 'Maternity Shoot', 'A beautiful portrait sessions photograph - Maternity Shoot', 'portfolio/1774508429_R6dO80AN.jpg', 'portfolio/thumbnails/1774508429_R6dO80AN.jpg', 0, 3, '2026-03-26 01:30:29', '2026-03-26 01:30:29'),
(11, 2, 'Couple Session', 'A beautiful portrait sessions photograph - Couple Session', 'portfolio/1774508429_RE3xvi1T.jpg', 'portfolio/thumbnails/1774508429_RE3xvi1T.jpg', 0, 4, '2026-03-26 01:30:29', '2026-03-26 01:30:29'),
(12, 2, 'Kids Portrait', 'A beautiful portrait sessions photograph - Kids Portrait', 'portfolio/1774508429_wOIFRNHk.jpg', 'portfolio/thumbnails/1774508429_wOIFRNHk.jpg', 0, 5, '2026-03-26 01:30:29', '2026-03-26 01:30:29'),
(13, 3, 'Annual Gala', 'A beautiful event coverage photograph - Annual Gala', 'portfolio/1774508429_gpZy6Aui.jpg', 'portfolio/thumbnails/1774508429_gpZy6Aui.jpg', 1, 0, '2026-03-26 01:30:29', '2026-03-26 01:30:29'),
(14, 3, 'Product Launch', 'A beautiful event coverage photograph - Product Launch', 'portfolio/1774508429_EBtXMyVS.jpg', 'portfolio/thumbnails/1774508429_EBtXMyVS.jpg', 1, 1, '2026-03-26 01:30:29', '2026-03-26 01:30:29'),
(15, 3, 'Conference Day', 'A beautiful event coverage photograph - Conference Day', 'portfolio/1774508429_1JEHJgpF.jpg', 'portfolio/thumbnails/1774508429_1JEHJgpF.jpg', 0, 2, '2026-03-26 01:30:30', '2026-03-26 01:30:30'),
(16, 3, 'Birthday Celebration', 'A beautiful event coverage photograph - Birthday Celebration', 'portfolio/1774508430_UzRWht4Z.jpg', 'portfolio/thumbnails/1774508430_UzRWht4Z.jpg', 0, 3, '2026-03-26 01:30:30', '2026-03-26 01:30:30'),
(17, 3, 'Award Night', 'A beautiful event coverage photograph - Award Night', 'portfolio/1774508430_4IA0oScJ.jpg', 'portfolio/thumbnails/1774508430_4IA0oScJ.jpg', 0, 4, '2026-03-26 01:30:30', '2026-03-26 01:30:30'),
(18, 3, 'Team Outing', 'A beautiful event coverage photograph - Team Outing', 'portfolio/1774508430_QMSyGE8Z.jpg', 'portfolio/thumbnails/1774508430_QMSyGE8Z.jpg', 0, 5, '2026-03-26 01:30:30', '2026-03-26 01:30:30'),
(19, 4, 'Mountain Sunrise', 'A beautiful nature & landscape photograph - Mountain Sunrise', 'portfolio/1774508430_7QKZoqcY.jpg', 'portfolio/thumbnails/1774508430_7QKZoqcY.jpg', 1, 0, '2026-03-26 01:30:30', '2026-03-26 01:30:30'),
(20, 4, 'Ocean Waves', 'A beautiful nature & landscape photograph - Ocean Waves', 'portfolio/1774508430_4HeBQUKx.jpg', 'portfolio/thumbnails/1774508430_4HeBQUKx.jpg', 1, 1, '2026-03-26 01:30:30', '2026-03-26 01:30:30'),
(21, 4, 'Forest Path', 'A beautiful nature & landscape photograph - Forest Path', 'portfolio/1774508430_lZd5pjcs.jpg', 'portfolio/thumbnails/1774508430_lZd5pjcs.jpg', 0, 2, '2026-03-26 01:30:30', '2026-03-26 01:30:30'),
(22, 4, 'Desert Dunes', 'A beautiful nature & landscape photograph - Desert Dunes', 'portfolio/1774508430_txAcBsIF.jpg', 'portfolio/thumbnails/1774508430_txAcBsIF.jpg', 0, 3, '2026-03-26 01:30:31', '2026-03-26 01:30:31'),
(23, 4, 'City Skyline', 'A beautiful nature & landscape photograph - City Skyline', 'portfolio/1774508431_NbrqJeoO.jpg', 'portfolio/thumbnails/1774508431_NbrqJeoO.jpg', 0, 4, '2026-03-26 01:30:31', '2026-03-26 01:30:31'),
(24, 4, 'Waterfall', 'A beautiful nature & landscape photograph - Waterfall', 'portfolio/1774508431_AzrJ73Dv.jpg', 'portfolio/thumbnails/1774508431_AzrJ73Dv.jpg', 0, 5, '2026-03-26 01:30:31', '2026-03-26 01:30:31'),
(25, 5, 'Summer Collection', 'A beautiful fashion & editorial photograph - Summer Collection', 'portfolio/1774508431_Yb94Auik.jpg', 'portfolio/thumbnails/1774508431_Yb94Auik.jpg', 1, 0, '2026-03-26 01:30:31', '2026-03-26 01:30:31'),
(26, 5, 'Urban Style', 'A beautiful fashion & editorial photograph - Urban Style', 'portfolio/1774508431_YV8Pjh3z.jpg', 'portfolio/thumbnails/1774508431_YV8Pjh3z.jpg', 1, 1, '2026-03-26 01:30:31', '2026-03-26 01:30:31'),
(27, 5, 'Runway Moments', 'A beautiful fashion & editorial photograph - Runway Moments', 'portfolio/1774508431_Bsl2jLwJ.jpg', 'portfolio/thumbnails/1774508431_Bsl2jLwJ.jpg', 0, 2, '2026-03-26 01:30:31', '2026-03-26 01:30:31'),
(28, 5, 'Magazine Cover', 'A beautiful fashion & editorial photograph - Magazine Cover', 'portfolio/1774508431_cAegvOsw.jpg', 'portfolio/thumbnails/1774508431_cAegvOsw.jpg', 0, 3, '2026-03-26 01:30:31', '2026-03-26 01:30:31'),
(29, 5, 'Brand Campaign', 'A beautiful fashion & editorial photograph - Brand Campaign', 'portfolio/1774508431_zW4FWrBp.jpg', 'portfolio/thumbnails/1774508431_zW4FWrBp.jpg', 0, 4, '2026-03-26 01:30:32', '2026-03-26 01:30:32'),
(30, 5, 'Street Fashion', 'A beautiful fashion & editorial photograph - Street Fashion', 'portfolio/1774508432_ALxouRcX.jpg', 'portfolio/thumbnails/1774508432_ALxouRcX.jpg', 0, 5, '2026-03-26 01:30:32', '2026-03-26 01:30:32'),
(31, 6, 'Jewelry Collection', 'A beautiful product photography photograph - Jewelry Collection', 'portfolio/1774508432_FpajN2v2.jpg', 'portfolio/thumbnails/1774508432_FpajN2v2.jpg', 1, 0, '2026-03-26 01:30:32', '2026-03-26 01:30:32'),
(32, 6, 'Watch Series', 'A beautiful product photography photograph - Watch Series', 'portfolio/1774508432_EbEZfBZU.jpg', 'portfolio/thumbnails/1774508432_EbEZfBZU.jpg', 1, 1, '2026-03-26 01:30:32', '2026-03-26 01:30:32'),
(33, 6, 'Food Styling', 'A beautiful product photography photograph - Food Styling', 'portfolio/1774508432_vKSYmAot.jpg', 'portfolio/thumbnails/1774508432_vKSYmAot.jpg', 0, 2, '2026-03-26 01:30:32', '2026-03-26 01:30:32'),
(34, 6, 'Perfume Bottle', 'A beautiful product photography photograph - Perfume Bottle', 'portfolio/1774508432_FMcFk0rN.jpg', 'portfolio/thumbnails/1774508432_FMcFk0rN.jpg', 0, 3, '2026-03-26 01:30:32', '2026-03-26 01:30:32'),
(35, 6, 'Electronics', 'A beautiful product photography photograph - Electronics', 'portfolio/1774508432_RpkGOdDU.jpg', 'portfolio/thumbnails/1774508432_RpkGOdDU.jpg', 0, 4, '2026-03-26 01:30:33', '2026-03-26 01:30:33'),
(36, 6, 'Clothing Flat Lay', 'A beautiful product photography photograph - Clothing Flat Lay', 'portfolio/1774508433_aSYxC96v.jpg', 'portfolio/thumbnails/1774508433_aSYxC96v.jpg', 0, 5, '2026-03-26 01:30:33', '2026-03-26 01:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `price_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `services_slug_unique` (`slug`),
  KEY `services_slug_index` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `price`, `price_label`, `image`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Wedding Photography', 'wedding-photography', 'Complete wedding photography coverage including pre-wedding shoots, ceremony, reception and all special moments. We capture every emotion and detail to create timeless memories.', 50000.00, 'Starting from', 'services/1774508433_mXC0WOzV.jpg', 1, 0, '2026-03-26 01:30:33', '2026-03-26 01:30:33'),
(2, 'Portrait Photography', 'portrait-photography', 'Professional portrait sessions for individuals, couples, and families. Studio or outdoor settings available with expert lighting and composition.', 5000.00, 'Per session', 'services/1774508433_VbmpbKAH.jpg', 1, 1, '2026-03-26 01:30:33', '2026-03-26 01:30:33'),
(3, 'Event Coverage', 'event-coverage', 'Full event photography for corporate events, birthday parties, anniversaries, and special occasions. Dedicated team ensures no moment is missed.', 25000.00, 'Starting from', 'services/1774508433_KQ1YHFVf.jpg', 1, 2, '2026-03-26 01:30:33', '2026-03-26 01:30:33'),
(4, 'Product Photography', 'product-photography', 'High-quality product photography for e-commerce, catalogs, and marketing materials. Clean backgrounds and creative compositions that sell.', 3000.00, 'Per product', 'services/1774508433_TC3JFtwt.jpg', 1, 3, '2026-03-26 01:30:33', '2026-03-26 01:30:33'),
(5, 'Fashion & Editorial', 'fashion-editorial', 'Professional fashion and editorial photography for designers, magazines, and lookbooks. Creative direction included.', 35000.00, 'Per shoot', 'services/1774508433_vEIHcHZY.jpg', 1, 4, '2026-03-26 01:30:33', '2026-03-26 01:30:33'),
(6, 'Photo Editing & Retouching', 'photo-editing-retouching', 'Professional post-processing, color correction, and retouching services. Transform your photos into magazine-quality images.', 500.00, 'Per photo', 'services/1774508433_rHEMeG2L.jpg', 1, 5, '2026-03-26 01:30:33', '2026-03-26 01:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lppMzCwgT1D3fPlqi0AuMpCGWgcNCYG4kmVWepWx', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIwRU9qa1o3WmxIcWw0RFFhWlVNZGZVTzNuc3djTjB0eGhiTDA5MnZFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvQlNLX3Bob3RvZ3JhcGh5XC9wdWJsaWNcL2NvbnRhY3QiLCJyb3V0ZSI6ImNvbnRhY3QifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1774606880),
('DPuMcIs7sFqRS2hDsdjjIgYQtON5dgwdn39QsYYf', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJPVHBjdURSZk5lbW1PN1J1VXVKVGVZTWlIaDRGN1ZzRjlZUVlHREZFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvQlNLX3Bob3RvZ3JhcGh5XC9wdWJsaWNcL2FkbWluXC9wb3J0Zm9saW8iLCJyb3V0ZSI6ImFkbWluLnBvcnRmb2xpby5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sInVybCI6W10sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1774690709),
('FYWP1ZTSp8I7T8Qy8Jq2lL3GiFhmIDZgQq5S5cbI', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJlMzFKTXVKWWtMQUpxMmtXN2did0RWbHBIRHFlQXBwVE9HZDZPVjdPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvQlNLX3Bob3RvZ3JhcGh5XC9wdWJsaWMiLCJyb3V0ZSI6ImhvbWUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119fQ==', 1775021446);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`),
  KEY `settings_key_index` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'BSK Photography', '2026-03-26 01:30:27', '2026-03-26 01:30:27'),
(2, 'site_tagline', 'Capturing Moments That Last Forever', '2026-03-26 01:30:27', '2026-03-26 01:30:27'),
(3, 'site_email', 'bsk230298@gmail.com', '2026-03-26 01:30:27', '2026-03-26 01:46:58'),
(4, 'site_phone', '+91 7020956870', '2026-03-26 01:30:27', '2026-03-26 01:46:58'),
(5, 'site_address', 'Amravati, Maharashtra, India', '2026-03-26 01:30:27', '2026-03-26 01:46:58'),
(6, 'footer_text', '© 2026 BSK Photography. All Rights Reserved.', '2026-03-26 01:30:27', '2026-03-26 01:30:27'),
(7, 'meta_description', 'BSK Photography - Professional photography services for weddings, events, portraits and more.', '2026-03-26 01:30:27', '2026-03-26 01:30:27'),
(8, 'meta_keywords', 'photography, wedding photography, portrait, events, BSK Photography', '2026-03-26 01:30:27', '2026-03-26 01:30:27');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

DROP TABLE IF EXISTS `social_links`;
CREATE TABLE IF NOT EXISTS `social_links` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `platform` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `platform`, `url`, `icon`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://facebook.com/bskphotography', 'facebook', 0, 1, '2026-03-26 01:30:36', '2026-03-26 01:30:36'),
(2, 'Instagram', 'https://www.instagram.com/bsk_photography1998?igsh=NmNmd2ZnMTF1MWpk', 'instagram', 1, 1, '2026-03-26 01:30:36', '2026-03-26 01:50:12'),
(3, 'YouTube', 'https://youtube.com/@bskphotography', 'youtube', 2, 1, '2026-03-26 01:30:36', '2026-03-26 01:30:36'),
(4, 'Twitter', 'https://twitter.com/bskphotography', 'twitter-x', 3, 1, '2026-03-26 01:30:36', '2026-03-26 01:30:36'),
(5, 'Pinterest', 'https://pinterest.com/bskphotography', 'pinterest', 4, 1, '2026-03-26 01:30:36', '2026-03-26 01:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `client_designation`, `client_image`, `content`, `rating`, `is_active`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Priya & Rahul Sharma', 'Wedding Couple', 'testimonials/1774508435_QZ1FZO0M.jpg', 'BSK Photography made our wedding day absolutely perfect! Every photo tells a story and captures the emotions we felt. The team was professional, creative, and so easy to work with. We couldn\'t be happier with our wedding album.', 5, 1, 0, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(2, 'Anita Desai', 'Fashion Designer', 'testimonials/1774508435_552zdZ1d.jpg', 'I\'ve worked with many photographers for my fashion collections, but BSK Photography stands out for their creativity and attention to detail. The editorial shots were magazine-worthy. Highly recommended!', 5, 1, 1, '2026-03-26 01:30:35', '2026-03-26 01:30:35'),
(3, 'Vikram Mehta', 'CEO, TechCorp', 'testimonials/1774508436_DfL4SsuO.jpg', 'Outstanding corporate event coverage! The team captured every important moment of our annual day celebration. The photos were delivered promptly and the quality exceeded our expectations.', 5, 1, 2, '2026-03-26 01:30:36', '2026-03-26 01:30:36'),
(4, 'Sunita & Family', 'Family Portrait Client', 'testimonials/1774508436_g9K0WlQb.jpg', 'The family portrait session was such a wonderful experience. BSK Photography made everyone feel comfortable and natural. The photos are now proudly displayed in our living room.', 4, 1, 3, '2026-03-26 01:30:36', '2026-03-26 01:30:36'),
(5, 'Raj Kapoor', 'Brand Manager', 'testimonials/1774508436_O6Hd4uAu.jpg', 'Excellent product photography! The images helped boost our online sales significantly. Clean, professional, and exactly what we needed for our e-commerce platform.', 5, 1, 4, '2026-03-26 01:30:36', '2026-03-26 01:30:36'),
(6, 'Meera Joshi', 'Bride', 'testimonials/1774508436_zmw98iZV.jpg', 'From the pre-wedding shoot to the reception, every moment was captured beautifully. BSK Photography has an incredible eye for candid moments. Our wedding album is a treasure.', 5, 1, 5, '2026-03-26 01:30:36', '2026-03-26 01:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'BSK Admin', 'admin@bskphotography.com', NULL, '$2y$12$iKY0lRcCZqlCqlegYha1oOmXF6.WHytJiwEGjQK0kbl0Srcu/03Sm', NULL, '2026-03-26 01:30:27', '2026-03-26 01:30:27');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
