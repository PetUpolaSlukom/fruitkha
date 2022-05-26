-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2022 at 08:07 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruitkha`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_news` int(255) NOT NULL,
  `created_at` int(255) NOT NULL,
  `text` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_reply` int(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_user`, `id_news`, `created_at`, `text`, `id_reply`, `active`) VALUES
(1, 3, 2, 1648913480, 'Ovaj komentar je prvi', NULL, 0),
(2, 3, 2, 1651489224, 'Ovaj komentar je drugi', 1, 0),
(3, 3, 2, 1651500340, 'Ovo je drugi ili treci komentar', NULL, 0),
(4, 3, 2, 1651507420, 'Probni komentar', NULL, 0),
(5, 3, 2, 1651510243, 'Probni odgovor na komentar', 4, 0),
(7, 3, 3, 1651511137, 'Komentarisem objavu', NULL, 1),
(9, 3, 3, 1651522534, '12sdasdas', NULL, 1),
(10, 3, 3, 1651522551, 'Proba', NULL, 1),
(11, 3, 3, 1651522627, 'Samo jos jedna', NULL, 1),
(12, 9, 2, 1651683240, 'My first commm', NULL, 1),
(13, 9, 2, 1651690174, 'Power pwer power power power', 12, 0),
(14, 2, 3, 1651758635, 'Asadasda sasadsadas', 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id_news` int(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `img_path` varchar(50) NOT NULL,
  `id_user` int(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `text` mediumtext NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id_news`, `title`, `img_path`, `id_user`, `created_at`, `updated_at`, `text`, `short_description`, `active`) VALUES
(1, 'Little cherry disease: Removing the root risk', 'lcdInterplantCherry-6325tj-1.jpg', 2, '27 December, 2019', '', 'Before replanting individual cherry trees within a block to replace those lost to X disease, grower Craig Harris instructed crews to dig out the holes by hand and remove every single root. They also planted the new trees with fresh soil hauled into the orchard.\r\n\r\nThat’s a lot of time and effort, but Harris wanted to reduce the risk that any remaining root tissue could transmit disease to the new trees in this Moxee, Washington, orchard. In another block that he completely ripped out and replanted, he had crews treat every stump with herbicide, ripped the roots with an excavator, left the site fallow for a year and then fumigated before replanting.\r\n\r\nBut is all that effort reducing disease risk to a meaningful degree, or is it just making Harris feel like he’s doing all he can? To answer that important question, he invited researchers from Washington State University to track the success of his replanting practices.\r\n\r\n\r\n\r\n\r\n\r\n\r\n“If we need to do it, we’ll do it,” he said, but it would be welcome news to learn that all the extra efforts are unnecessary. “They are looking at a bunch of scenarios to see what are the chances that live root tissue can infect the new trees.”', 'New research project by OSU, WSU aims to learn more about the risks posed by replanting after little cherry disease.', 1),
(2, 'Airblast from above', 'DJIAGRAST30OrchardMode-1.jpg', 2, '7 June, 2021', '', 'Drones can now be used to spray crops in Michigan. The state government approved the practice last summer. \r\n\r\nSpraying pesticides via drone has potential in a lot of crops, including fruit. But the practice is new, and few in Michigan have done it. Mike Reinke, a Michigan State University integrated pest management educator for fruits and vegetables, is seeking funding to study the efficacy of drone spraying on specialty crops. \r\n\r\nReinke said fruit growers have been inquiring about using drones to spray pesticides, but, so far, the machines have only sprayed row crops in Michigan. There are lots of questions about effectiveness and where they might fit within fruit pest management programs, such as how they compare to airplanes or ground-based sprayers.\r\n\r\nAs of January, one company had met the state’s licensing requirements to spray crops with drones in Michigan, but other companies plan to seek certification, Reinke said.\r\n', 'The DJI Agras T30 drone, made by a Chinese manufacturer, holds nearly 8 gallons of liquid and can fly for 10 to 15 minutes before being recharged.', 1),
(3, 'Researchers continue blueberry pollination survey', 'news-bg-1.jpg', 2, '23 September, 2020', '', '“We really want to maximize feedback so our survey encompasses as many growers as possible,” said Lisa DeVetter, a professor of small fruits horticulture at Washington State University.\r\n\r\nThe survey is part of a $2 million grant-funded project from the Specialty Crop Research Initiative to find ways to adjust pollination practices to keep up with modern, high-density farming practices. It includes researchers from WSU, Michigan State University, Oregon State University and the University of Florida. However, growers from all states are encouraged to fill out the survey. \r\n\r\nFind the survey here: https://wsu.co1.qualtrics.com/jfe/form/SV_0PqEOz2ETXI43Ns\r\n\r\nParticipants will have the option to enter a raffle.', 'Researchers are continuing to survey blueberry growers about pollination methods as part of a multistate project. “We really want to maximize feedback so our survey', 1),
(4, 'Good thoughts bear good fresh juicy fruit.', 'heatStressNetting-B3B7B-1.jpg', 2, '23 October, 2019', '', 'Irrigating more, overhead cooling and shade netting.\r\n\r\nWashington wine grape growers threw a variety of mitigation strategies at the 2021 heat wave, with varying results and trade-offs, as they tried to counter the effects of the so-called “heat dome” — a period of extreme temperatures in early summer — and an overall hot vintage with 29 days over 95 degrees and a record of 3,238 growing degree-days in Prosser.\r\n\r\n“Grapes like warm weather but they don’t necessarily like hot weather,” said Markus Keller, a Washington State University viticulturist at the Irrigated Agriculture Research and Extension Center in Prosser.\r\n\r\nThere’s no single correct answer, of course, but a panel of three Washington growers discussed mitigation measures in November at the Washington State Grape Society annual meeting in Grandview. Keller moderated.\r\n\r\nHere’s what they said at the meeting and in follow-up interviews with Good Fruit Grower.', 'Stretchy shade netting protects the fruiting zone on a row of Mourvedre grapes from the sun during the June 2021 heat wave at Olsen Bros', 1),
(5, 'Why the berries always look delecious', 'news-bg-3.jpg', 2, '3 September, 2020', '', 'On Jan. 28, New York’s Farm Laborers Wage Board decided to lower the state overtime threshold for farmworkers from 60 hours per week to 40 hours per week — but not until 2032. \r\n\r\nIf approved, the new wage rate will be phased in over a 10-year period, with reductions of four hours a week occurring every two years. The reductions will begin Jan. 1, 2024, when the overtime threshold will lower to 56 hours per week. The next reduction, to 52 hours, will occur in 2026, and so on until it reaches 40 hours in 2032.\r\n\r\nAccording to New York Farm Bureau, the wage board’s resolution is only a recommendation. The New York State Department of Labor must submit a report for public comment, with the final decision up to Gov. Kathy Hochul. \r\n\r\nIn a news release, NYFB stated that its agricultural partners in the Grow NY Farms coalition will continue fighting to keep the overtime threshold at 60 hours per week. \r\n\r\n“Changing the overtime threshold to 40 hours a week for farmworkers in New York means that these workers will be limited to 40 hours, due to simple farm economics,” according to a Grow NY Farms statement. “We have already seen farmworkers leave the state for more hours of work and production shift to less labor-intensive crops since the farm labor legislation was enacted in January 2020.”In 2020, the New York state government removed the overtime exemption for agriculture and mandated that all farm laborers be paid 1.5 times the normal rate for any work they perform in excess of 60 hours per week and for any work they perform on a designated weekly day of rest. ', 'In apple regions where climate conditions leave growers looking for a color boost, interest in pneumatic leaf removers is blowing up.', 1),
(6, 'Good thoughts bear good fresh juicy fruit.', 'news-bg-2.jpg', 2, '23 October, 2019', '', 'Berry and cherry growers across the Western U.S. have largely been successful in preventing spotted wing drosophila damage to their crops, but many are using weekly insecticide covers to do so. To tiptoe back toward integrated pest management, researchers are testing a wide variety of alternative controls and approaches. Researchers are conducting trials on a handful of novel deterrents, repellents and attract-and-kill products, as well as continuing research into cultural controls, narrowing in on fruit susceptibility and understanding spotted wing drosophila phenology and behavior in Western climates. This year, the effort expands to include studying the potential control offered by a pair of parasitic wasps that target SWD (see “Green light for biocontrol”). ', 'Researchers focus on sustainable, integrated pest management solutions for SWD.“If a technology is developed in one place, it’s evaluated in multiple regions and multiple crops,” said University of Georgia entomologist Ash Sial, who leads the project team', 1),
(7, 'Good thoughts bear good fresh juicy fruit.', 'deMarreeFarmNY-22833tj-1-feat-700x441.jpg', 2, '23 October, 2019', '', 'Berry and cherry growers across the Western U.S. have largely been successful in preventing spotted wing drosophila damage to their crops, but many are using weekly insecticide covers to do so. To tiptoe back toward integrated pest management, researchers are testing a wide variety of alternative controls and approaches. Researchers are conducting trials on a handful of novel deterrents, repellents and attract-and-kill products, as well as continuing research into cultural controls, narrowing in on fruit susceptibility and understanding spotted wing drosophila phenology and behavior in Western climates. This year, the effort expands to include studying the potential control offered by a pair of parasitic wasps that target SWD (see “Green light for biocontrol”). ', 'Researchers focus on sustainable, integrated pest management solutions for SWD.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_tag`
--

CREATE TABLE `news_tag` (
  `id_news` int(255) NOT NULL,
  `id_tag` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_tag`
--

INSERT INTO `news_tag` (`id_news`, `id_tag`) VALUES
(2, 1),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(3, 1),
(3, 3),
(3, 5),
(3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id_page` int(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  `route` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id_page`, `name`, `route`) VALUES
(1, 'Home', 'home'),
(2, 'News', 'news'),
(3, 'Shop', 'shop'),
(4, 'Contact', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id_review` int(255) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'User_Icon.png',
  `description` varchar(50) NOT NULL,
  `text` varchar(200) NOT NULL,
  `created_at` int(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id_review`, `full_name`, `image`, `description`, `text`, `created_at`, `active`) VALUES
(1, 'Natalie Niph', 'natalieNipth_picture.png', 'Local shop owner', 'I have been a regular customer of Fruitkha. The masala oranges from Fruitkha is one of my favorite products. I start my day with the masala oranges as it energizes me and prepares me for my busy day.', 1651119361, 1),
(2, 'Milorad Miloradović', 'milorad_picture.png', 'Customer', 'I have been using Fruitkha products for quite some time now, and my experience has been nothing but amazing. The brown Rice from Fruitkha is now a part of our daily meals and is loved by everyone', 1651291354, 0),
(3, 'Oscar Wilde', 'oscarWilde_picture.png', 'Writer', 'Organic Fruitkha, is actually unpolished and worth the price. Same taste but more healthy. Glad to have bought this dal from Fruitkha.', 1651491111, 1),
(4, 'Jelena Berber', 'User_Icon.png', 'Student', 'My passion is fruit and blog. This is awesome!!', 1651668319, 1),
(5, 'Jelena', 'User_Icon.png', 'Nothing', 'Bad review', 1651668423, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Writer');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id_tag` int(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id_tag`, `name`, `active`) VALUES
(1, 'Apple', 1),
(2, 'Strawberry', 1),
(3, 'Berry', 1),
(4, 'Lemon', 1),
(5, 'Orange', 1),
(6, 'Banana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(255) NOT NULL,
  `first_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `id_role` int(255) NOT NULL DEFAULT 2,
  `avatar` varchar(30) NOT NULL,
  `can_comment` tinyint(1) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email`, `password`, `id_role`, `avatar`, `can_comment`, `active`) VALUES
(2, 'Djordje', 'Minic', 'djordjeminic2000@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 1, 'admin-avatar.jpg', 1, 1),
(3, 'Jelena', 'Berber', 'jelenaberber00@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 2, 'avatar4.png', 0, 1),
(4, 'Mika', 'Mikic', 'mikamika@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 2, 'avatar2.png', 1, 0),
(5, 'Ana', 'Anic', 'ana@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 2, 'avatar1.jpg', 1, 1),
(6, 'Marko', 'Maric', 'marko@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 2, 'avatar4.png', 1, 1),
(7, 'Mila', 'Jovic', 'mila@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 2, 'avatar3.png', 1, 0),
(8, 'Miroslav', 'Miroslavovic', 'miki2@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 2, 'avatar1.jpg', 1, 1),
(9, 'Novak', 'Djkokovic', 'novak@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 3, 'avatar2.png', 1, 1),
(10, 'Sana', 'Eluber', 'sana@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 3, 'avatar4.png', 1, 1),
(11, 'Milica', 'Nadsdasd', 'asdasdasda@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 3, 'avatar4.png', 1, 1),
(12, 'Noole', 'Nooole', 'nole@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 2, 'avatar3.png', 1, 1),
(13, 'Milanke', 'Kragovich', 'mikanko@gmail.com', '945420de3c2e227bafb4c43effa96f7d', 2, 'avatar1.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_reply` (`id_reply`),
  ADD KEY `id_news` (`id_news`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_news`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `news_tag`
--
ALTER TABLE `news_tag`
  ADD PRIMARY KEY (`id_news`,`id_tag`),
  ADD KEY `id_news` (`id_news`,`id_tag`),
  ADD KEY `id_tag` (`id_tag`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id_review`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id_tag`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id_news` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id_review` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id_tag` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_reply`) REFERENCES `comment` (`id_comment`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `news_tag`
--
ALTER TABLE `news_tag`
  ADD CONSTRAINT `news_tag_ibfk_1` FOREIGN KEY (`id_news`) REFERENCES `news` (`id_news`),
  ADD CONSTRAINT `news_tag_ibfk_2` FOREIGN KEY (`id_tag`) REFERENCES `tag` (`id_tag`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
