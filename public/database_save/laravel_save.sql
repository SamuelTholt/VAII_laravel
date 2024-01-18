-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 18.Jan 2024, 21:26
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `laravel`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `fotogaleria`
--

CREATE TABLE `fotogaleria` (
  `foto_id` bigint(20) UNSIGNED NOT NULL,
  `typ_id` int(11) NOT NULL,
  `nazov` longtext NOT NULL,
  `obrazok` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `fotogaleria`
--

INSERT INTO `fotogaleria` (`foto_id`, `typ_id`, `nazov`, `obrazok`) VALUES
(1, 1, 'Šalát s marinovaným kuracím mäsom, hruškou a niva syrom + Cesnaková bageta', 0x666f6f64315f313730353630353236382e6a7067),
(2, 1, 'Grilovaný Atlantický Losos s citrónovou omáčkou', 0x666f6f64325f313730353630363635332e6a7067),
(3, 1, 'Marinované kuracie soté so zeleninou', 0x666f6f64335f313730353630373237302e6a7067),
(4, 2, 'Interiér 1', 0x696e746572696572315f313730353630373733332e6a7067),
(5, 2, 'Interiér 2', 0x696e746572696f72345f313730353630383131312e6a7067),
(6, 1, 'Grilované mäsové plátky s krémovou omáčkou a čerstvou zeleninou', 0x666f6f64385f313730353630383236362e6a7067);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `jedla`
--

CREATE TABLE `jedla` (
  `jedlo_id` bigint(20) UNSIGNED NOT NULL,
  `kategoria_id` int(11) NOT NULL,
  `nazov` longtext NOT NULL,
  `popis` longtext NOT NULL,
  `alergeny` longtext NOT NULL,
  `cena` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `jedla`
--

INSERT INTO `jedla` (`jedlo_id`, `kategoria_id`, `nazov`, `popis`, `alergeny`, `cena`) VALUES
(1, 1, 'Slepačí vývar s cestovinou', 'Výnimočný slepačí vývar s cestovinou, vytvorený pre okamžitú pohodu. Teplá nádišná chuť v každej lyžičke.', '1, 2, 5', 1.50),
(2, 1, 'Brokolicový krém s krutónmi', 'Hladký brokolicový krém s chrumkavými krutónmi, pre vychutnanie chuti a jednoduchosť v každom polievkovom hrnčeku.', '2, 5', 2.00),
(3, 1, 'Fazuľová s údeným mäsom, chlieb', 'Tradičná fazuľová polievka s údeným mäsom a čerstvým chlebom, ponúkajúca skutočnú chuť domácej kuchyne.', '1, 2, 5', 2.00),
(4, 2, 'Pečené kurča s maslovou omáčkou a pečenými zemiakmi', 'Výborne pečené kúsky kurča zaliate lahodnou maslovou omáčkou, doplnené o zlatohnedé pečené zemiaky. Jednoducho dokonalé spojenie chuti a textúry.', '2, 6', 12.50),
(5, 2, 'Losos na žltej šošovici s čerstvým špenátom', 'Grilovaný losos položený na posteli žltej šošovice a čerstvého špenátu. Lehké a zdravé jedlo plné esenciálnych živín.', '4, 5, 8', 16.00),
(6, 2, 'Hovädzia stroganov s dusenou ryžou', 'Klasický hovädzí stroganov v bohatej smotanovej omáčke, podávaný s lahodnou dusenou ryžou. Bohatá na chuť, bohatá na spokojnosť.', '2, 6, 8', 18.50),
(7, 2, 'Vegetariánske lasagne s čerstvým šalátom', 'Vrstvy špeciálnej vegetariánskej lasagne, plnené čerstvými zeleninami a parmazánom, doplnené osviežujúcim čerstvým šalátom.', '1, 2, 5, 6', 14.00),
(8, 2, 'Kuracie kari s basmati ryžou', 'Kúsky kurča v aromatickej kari omáčke, podávané s lahodnou basmati ryžou. Výlet do exotických chutí.', '6, 8', 15.50),
(9, 2, 'Grilované jahňacie kotlety s pečeným zemiakovým pyré', 'Grilované jahňacie kotlety so štipkou harissky, doplnené o hladké zemiakové pyré. Luxusná voľba pre gurmánov.', '6', 22.00),
(10, 2, 'Ravioli s ricottou a špenátom v paradajkovom pesto', 'Plnené ravioli s ricottou a špenátom, zaliahané v lahodnom paradajkovom pestu. Jednoduché, no bohato chutné.', '1, 2, 5', 13.00),
(11, 2, 'Gnocchi s pestom a cherry paradajkami', 'Gnocchi, mäkké zemiakové knedľučky, podávané s čerstvým pestom a sladkými cherry paradajkami. Jednoduché, ale ohromujúco chutné.', '1, 2, 5', 14.50),
(12, 2, 'Kuskusový šalát s grilovaným kurčaťom a zeleninou', 'Ľahký a osviežujúci kuskusový šalát s grilovaným kurčaťom a farebnou zeleninou. Ideálny pre tých, čo hľadajú zdravú alternatívu.', '6', 16.50),
(13, 2, 'Ovocné kari s krevetami a kokosovým mliekom', 'Exotické ovocné kari s plátkami kreviet a krémovým kokosovým mliekom. Kombinácia sladkých a korenistých chutí.', '4, 6, 8', 19.00),
(14, 3, 'Hrnček polievky', 'Malý hrníček polievky ako dokonalý spoločník k prvému jedlu.', '', 0.50),
(15, 3, 'Čerstvé pečivo s maslom', 'Kus čerstvého pečiva so škvrnou masla, ktoré doplní váš chuťový zážitok.', '', 0.50),
(16, 3, 'Šalátový mix', 'Čerstvý zeleninový šalátový mix s lahodným dresingom.', '', 0.50),
(17, 3, 'Opečené zemiaky', 'Klasické opečené zemiaky, ktoré doplnia vaše hlavné jedlo.', '', 0.50),
(18, 3, 'Ryžová príloha', 'Lahodná ryžová príloha, ktorá perfektne dopĺňa korenené jedlá.', '', 0.50);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kategorie`
--

CREATE TABLE `kategorie` (
  `kategoria_id` int(11) NOT NULL,
  `nazov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `kategorie`
--

INSERT INTO `kategorie` (`kategoria_id`, `nazov`) VALUES
(1, 'polievky'),
(2, 'hlavneJedla'),
(3, 'prilohy');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_03_105908_create_reviews_table', 1),
(6, '2024_01_14_122758_create_roles_table', 1),
(7, '2024_01_14_133223_create_user_roles_table', 1),
(8, '2024_01_17_131847_create_kategorie_table', 1),
(9, '2024_01_17_132342_create_jedla_table', 1),
(10, '2024_01_17_220709_create_typfotky_table', 1),
(11, '2024_01_17_221813_create_fotogaleria_table', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comments` longtext NOT NULL,
  `star_rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `comments`, `star_rating`, `created_at`, `updated_at`) VALUES
(1, 2, '\"LK Restaurant je moje obľúbené miesto v Liptovskom Mikuláši. Skvelá atmosféra, útulný interiér a skvelý personál. Jedlo je výborne pripravené, a ich ponuka je pestrá. Odporúčam vyskúšať ich domáce dezerty!\"', 5, '2024-01-17 18:13:40', '2024-01-17 18:13:40'),
(2, 3, 'Pomalá obsluha a teplé jedlo mi trochu skazili zážitok. Verím, že to bola len nešťastná náhoda.', 3, '2023-01-05 18:15:42', '2023-01-05 18:15:42'),
(3, 4, '\"LK Restaurant ponúka výborný pohľad na okolitú prírodu. Navštívil som ich na terase a bol som ohromený výhľadom. Jedlo bolo tiež skvelé, a celkovo to bolo príjemné strávenie času.\"', 4, '2022-08-15 16:18:04', '2022-08-15 16:18:05'),
(4, 5, 'Stredne dobrý zážitok. Služba bola rýchla, jedlo v poriadku, ale nič, čo by ma výrazne zaujalo!', 2, '2023-05-07 16:21:01', '2023-05-07 16:21:01'),
(5, 5, 'Prišiel som sem po nejakom čase a vidím veľký \"upgrade\". Krása LK Restaurant, len tak ďalej.', 5, '2024-01-17 18:24:02', '2024-01-17 18:24:02'),
(6, 6, 'Včera som bol prvýkrát v LK Restaurant a musím povedať, že som nadšený. Obsluha bola priateľská a rýchla, jedlo čerstvé a chutné. Určite sa sem ešte vrátim.', 5, '2024-01-17 18:25:32', '2024-01-17 18:25:32');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_of_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `roles`
--

INSERT INTO `roles` (`id`, `name_of_role`) VALUES
(1, 'admin'),
(2, 'guest');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `typfotky`
--

CREATE TABLE `typfotky` (
  `typ_id` int(11) NOT NULL,
  `nazov` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `typfotky`
--

INSERT INTO `typfotky` (`typ_id`, `nazov`) VALUES
(1, 'jedla'),
(2, 'restauracia');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'LKRestaurant@gmail.com', NULL, '$2y$12$Otzrq00yKqvB9snNRp9IMuUcmI5kdgvBjmepnr2CPOR7Ghj1hG3ay', NULL, '2024-01-17 21:25:28', '2024-01-17 21:25:28'),
(2, 'Samino', 'spotke8@gmail.com', NULL, '$2y$12$p8WxzVZ0Dgdn6WTSvVPhH.snJ5zN/JSBeIKrsgOg7qfLDo5QZT/8W', NULL, '2024-01-17 18:08:58', '2024-01-17 18:08:58'),
(3, 'Peter K', 'peter.k@test.com', NULL, '$2y$12$O.Tr8GDJdgjLDYCPIytii.p/CAFNG9C9RkeIeuyLQDUEraC8awrP6', NULL, '2024-01-17 18:15:14', '2024-01-17 18:15:14'),
(4, 'Jakub M', 'jakub.m@test.com', NULL, '$2y$12$ZOQ4/2GpJzYMxIWL3/3jMuBQT6gdal3xOcqPl5HwZqGqMyRHRojGe', NULL, '2024-01-17 18:17:53', '2024-01-17 18:17:53'),
(5, 'Matúš S', 'matus.s@test.com', NULL, '$2y$12$odNpzvtF4FCJDDZTzMaCeuIL8n7pg2U3AEqDzi4rc.Y3CxUZX4Cx.', NULL, '2024-01-17 18:20:38', '2024-01-17 18:20:38'),
(6, 'Ronaldo', 'ronaldo@test.com', NULL, '$2y$12$wVSKDSAxHvhGs6s9wz0w/O2JX5h8docgjNV8KQOvYa4LhGkM4TXie', NULL, '2024-01-17 18:25:19', '2024-01-17 18:25:19');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Sťahujem dáta pre tabuľku `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexy pre tabuľku `fotogaleria`
--
ALTER TABLE `fotogaleria`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `fotogaleria_typ_id_foreign` (`typ_id`);

--
-- Indexy pre tabuľku `jedla`
--
ALTER TABLE `jedla`
  ADD PRIMARY KEY (`jedlo_id`),
  ADD KEY `jedla_kategoria_id_foreign` (`kategoria_id`);

--
-- Indexy pre tabuľku `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`kategoria_id`);

--
-- Indexy pre tabuľku `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexy pre tabuľku `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexy pre tabuľku `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_index` (`user_id`);

--
-- Indexy pre tabuľku `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `typfotky`
--
ALTER TABLE `typfotky`
  ADD PRIMARY KEY (`typ_id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexy pre tabuľku `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `fotogaleria`
--
ALTER TABLE `fotogaleria`
  MODIFY `foto_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pre tabuľku `jedla`
--
ALTER TABLE `jedla`
  MODIFY `jedlo_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pre tabuľku `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pre tabuľku `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pre tabuľku `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pre tabuľku `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `fotogaleria`
--
ALTER TABLE `fotogaleria`
  ADD CONSTRAINT `fotogaleria_typ_id_foreign` FOREIGN KEY (`typ_id`) REFERENCES `typfotky` (`typ_id`);

--
-- Obmedzenie pre tabuľku `jedla`
--
ALTER TABLE `jedla`
  ADD CONSTRAINT `jedla_kategoria_id_foreign` FOREIGN KEY (`kategoria_id`) REFERENCES `kategorie` (`kategoria_id`);

--
-- Obmedzenie pre tabuľku `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
