-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2019 at 11:42 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `article_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `article_name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `picture_path` varchar(255) DEFAULT NULL,
  `article_body` text,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_name`, `active`, `picture_path`, `article_body`, `last_updated`) VALUES
(1, 'Apple', 1, 'assets/images/2019-08-18_23-40-51_apple.jpeg', 'Lorem ipsum dolor sit amet, nam ponderum recteque at. Porro verear volumus his cu, an nec ullum verear perfecto, per soluta graece aliquando eu. In delenit invidunt definitiones sit. Fugit aliquip scribentur ei sed, agam volutpat temporibus qui cu. Ea ferri equidem accommodare vis. Pertinax forensibus complectitur mei id, est libris alterum torquatos no, liber dolor has no.\r\n\r\nEa has commune explicari, te eum audiam fuisset reformidans, nibh delectus definiebas mei ut. Labores platonem reprehendunt pri ut, sumo veniam ei pri. Cum forensibus maiestatis in, per ea quando doctus definitionem. Eam zril propriae definitiones ad.\r\n\r\nUt quo consul imperdiet, qui meis tempor lobortis eu. Vix noluisse officiis id. Sea ea purto copiosae, eu verear facilis partiendo has. Ne hinc meis invenire nam, nominati repudiandae ad eam, legendos elaboraret an nec. Id augue eirmod dissentiunt vim. Eam ea tantas tacimates vituperata, audire repudiare ne vel, at cibo veri interesset sea.\r\n\r\nSea at falli labores dignissim, rebum aeterno ad his, harum feugiat invidunt an mei. Corpora legendos te eam, id sit error detracto. Fabulas corrumpit adipiscing vim no, no sed viris accusam comprehensam. Ea usu mollis assueverit reformidans. Indoctum prodesset te has, id per putant definitiones, eos et nisl sensibus. Mea ei magna convenire, te officiis percipit has.\r\n\r\nEx doming minimum eam, minim electram an sea, vim ad cibo oratio. Omnis oblique concludaturque pro ea, pro no quis elit molestiae. Erant altera iriure id ius. Eam ne vidit invenire. Integre apeirian sed an, ei atomorum cotidieque efficiantur nec.', '2019-08-18 21:42:02'),
(2, 'Banana', 0, 'assets/images/2019-08-18_23-41-07_istockphoto-636739634-612x612.jpg', 'Lorem ipsum dolor sit amet, nam ponderum recteque at. Porro verear volumus his cu, an nec ullum verear perfecto, per soluta graece aliquando eu. In delenit invidunt definitiones sit. Fugit aliquip scribentur ei sed, agam volutpat temporibus qui cu. Ea ferri equidem accommodare vis. Pertinax forensibus complectitur mei id, est libris alterum torquatos no, liber dolor has no.\r\n\r\nEa has commune explicari, te eum audiam fuisset reformidans, nibh delectus definiebas mei ut. Labores platonem reprehendunt pri ut, sumo veniam ei pri. Cum forensibus maiestatis in, per ea quando doctus definitionem. Eam zril propriae definitiones ad.\r\n\r\nUt quo consul imperdiet, qui meis tempor lobortis eu. Vix noluisse officiis id. Sea ea purto copiosae, eu verear facilis partiendo has. Ne hinc meis invenire nam, nominati repudiandae ad eam, legendos elaboraret an nec. Id augue eirmod dissentiunt vim. Eam ea tantas tacimates vituperata, audire repudiare ne vel, at cibo veri interesset sea.\r\n\r\nSea at falli labores dignissim, rebum aeterno ad his, harum feugiat invidunt an mei. Corpora legendos te eam, id sit error detracto. Fabulas corrumpit adipiscing vim no, no sed viris accusam comprehensam. Ea usu mollis assueverit reformidans. Indoctum prodesset te has, id per putant definitiones, eos et nisl sensibus. Mea ei magna convenire, te officiis percipit has.\r\n\r\nEx doming minimum eam, minim electram an sea, vim ad cibo oratio. Omnis oblique concludaturque pro ea, pro no quis elit molestiae. Erant altera iriure id ius. Eam ne vidit invenire. Integre apeirian sed an, ei atomorum cotidieque efficiantur nec.', '2019-08-18 21:41:07'),
(3, 'Mengo', 1, 'assets/images/2019-08-18_23-41-24_mengo.jpg', 'Lorem ipsum dolor sit amet, nam ponderum recteque at. Porro verear volumus his cu, an nec ullum verear perfecto, per soluta graece aliquando eu. In delenit invidunt definitiones sit. Fugit aliquip scribentur ei sed, agam volutpat temporibus qui cu. Ea ferri equidem accommodare vis. Pertinax forensibus complectitur mei id, est libris alterum torquatos no, liber dolor has no.\r\n\r\nEa has commune explicari, te eum audiam fuisset reformidans, nibh delectus definiebas mei ut. Labores platonem reprehendunt pri ut, sumo veniam ei pri. Cum forensibus maiestatis in, per ea quando doctus definitionem. Eam zril propriae definitiones ad.\r\n\r\nUt quo consul imperdiet, qui meis tempor lobortis eu. Vix noluisse officiis id. Sea ea purto copiosae, eu verear facilis partiendo has. Ne hinc meis invenire nam, nominati repudiandae ad eam, legendos elaboraret an nec. Id augue eirmod dissentiunt vim. Eam ea tantas tacimates vituperata, audire repudiare ne vel, at cibo veri interesset sea.\r\n\r\nSea at falli labores dignissim, rebum aeterno ad his, harum feugiat invidunt an mei. Corpora legendos te eam, id sit error detracto. Fabulas corrumpit adipiscing vim no, no sed viris accusam comprehensam. Ea usu mollis assueverit reformidans. Indoctum prodesset te has, id per putant definitiones, eos et nisl sensibus. Mea ei magna convenire, te officiis percipit has.\r\n\r\nEx doming minimum eam, minim electram an sea, vim ad cibo oratio. Omnis oblique concludaturque pro ea, pro no quis elit molestiae. Erant altera iriure id ius. Eam ne vidit invenire. Integre apeirian sed an, ei atomorum cotidieque efficiantur nec.', '2019-08-18 21:41:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_id_uindex` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
