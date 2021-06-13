-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Giu 13, 2021 alle 14:58
-- Versione del server: 10.4.14-MariaDB
-- Versione PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concept_hw2`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articolo`
--

CREATE TABLE `articolo` (
  `cod_articolo` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `sezione` varchar(30) DEFAULT NULL,
  `titolo` varchar(50) DEFAULT NULL,
  `nomefile` varchar(80) DEFAULT NULL,
  `data_pubblicazione` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `articolo`
--

INSERT INTO `articolo` (`cod_articolo`, `username`, `sezione`, `titolo`, `nomefile`, `data_pubblicazione`) VALUES
(43, 'davidedibella', 'Arte', 'Il paradosso della tolleranza', '07-19-28-13-06-2021-Ilparadossodellatolleranza.docx', '2021-06-13');

--
-- Trigger `articolo`
--
DELIMITER $$
CREATE TRIGGER `addarticolo` AFTER INSERT ON `articolo` FOR EACH ROW begin
update utente set num_articoli=num_articoli+1 where username= new.username;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `removearticolo` AFTER DELETE ON `articolo` FOR EACH ROW begin
update utente set num_articoli=num_articoli-1 where username= old.username;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struttura stand-in per le viste `artpref`
-- (Vedi sotto per la vista effettiva)
--
CREATE TABLE `artpref` (
`cod_articolo` int(11)
,`userpref` varchar(30)
,`autore` varchar(30)
,`titolo` varchar(50)
,`sezione` varchar(30)
,`nomefile` varchar(80)
,`data_pubblicazione` date
);

-- --------------------------------------------------------

--
-- Struttura della tabella `preferiti`
--

CREATE TABLE `preferiti` (
  `id` int(11) NOT NULL,
  `cod_articolo` int(11) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(30) NOT NULL,
  `password` varchar(70) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `num_articoli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `password`, `nome`, `cognome`, `email`, `num_articoli`) VALUES
('chiararusso', '$2y$10$DO.0i1w509h1LcssZG4TLu1WXmx1sBNEIc4gdz7b9ckFETK26m7P6', 'Chiara', 'Russo', 'chiarusso@hotmail.it', 0),
('ciccio', '$2y$10$qlmeNRNQVnlHElcAmL1lnuG40E8Zzpn2uMFZQtI41ymr55ot4Qebi', 'Francesco', 'Soldi', 'cicciosoldi@outlook.it', 0),
('davidedibella', '$2y$10$ZbVyTQvOjJVMpD3iaqk21utmObG12bCUxDo4pJzWkzjQ3dDQV/zkK', 'Davide', 'Di Bella', 'dibbi27@outlook.it', 1),
('giacomopresti', '$2y$10$8usIs806IyNUe70XuIDOxO01zPpjfcvonNT.IQ/HjU7udHDD1InSu', 'Giacomo', 'Presti', 'giacomopresti@gmail.com', 0),
('giovigrava', '$2y$10$6LNk30sXCtrZ8/t5B9.pcez.kEMzLHml5fZ8PtEw8HURUyqxgyq9e', 'Giovanni', 'Galanna', 'giovigrava@gmail.com', 0),
('greygoy', '$2y$10$v94U61vF9nzpaIlX/Cd0OOx8OHdOja0k7ji6NS/QbiS9HhJ8zlLm2', 'Filippo', 'Costanzo', 'filippocostanzo@gmail.com', 0),
('mariorossi', '$2y$10$NAj3gDYlPWNd/hThVLMXLeyiB6sA/yKdDlc5EV3Isb1B8J.D9MtDG', 'Mario', 'Rossi', 'mariorossi@gmail.com', 0),
('massi28', '$2y$10$OopS7gvZDZGJOvYzggAniemOgRAK7U2wmhKrvhRlTCJ8HnYp9fqj6', 'Massi', 'si', 'massi@sdsds.it', NULL),
('mcrao', '$2y$10$DhguB/2nwHO7QCKSMlNweuMjk1F5T7KFnBvE4.t/ybESO8u/x1J6O', 'Marco', 'Di Raimondo', 'mcrao@outlook.it', 0),
('pippo', '$2y$10$a9AqiD/tei3LkBu1OxAl0uZANzENQtlbzykH3S1Mi5shJRHdGTsUW', 'Davide', 'Di Bella', 'pipponight@day.it', NULL),
('samuelmedicina', '$2y$10$NeiCQaVKEtD8W7YwssGdOOfuMN8mZKnA1pHPyszbwVjoUCscxyTfi', 'Samuel', 'Medicina', 'samumed@tiscali.it', 0);

-- --------------------------------------------------------

--
-- Struttura per vista `artpref`
--
DROP TABLE IF EXISTS `artpref`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `artpref`  AS SELECT `l`.`cod_articolo` AS `cod_articolo`, `p`.`username` AS `userpref`, `l`.`username` AS `autore`, `l`.`titolo` AS `titolo`, `l`.`sezione` AS `sezione`, `l`.`nomefile` AS `nomefile`, `l`.`data_pubblicazione` AS `data_pubblicazione` FROM (`articolo` `l` join `preferiti` `p` on(`l`.`cod_articolo` = `p`.`cod_articolo`)) ;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articolo`
--
ALTER TABLE `articolo`
  ADD PRIMARY KEY (`cod_articolo`),
  ADD KEY `username` (`username`);

--
-- Indici per le tabelle `preferiti`
--
ALTER TABLE `preferiti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `cod_articolo` (`cod_articolo`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articolo`
--
ALTER TABLE `articolo`
  MODIFY `cod_articolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `articolo`
--
ALTER TABLE `articolo`
  ADD CONSTRAINT `articolo_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utente` (`username`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `preferiti`
--
ALTER TABLE `preferiti`
  ADD CONSTRAINT `preferiti_ibfk_1` FOREIGN KEY (`username`) REFERENCES `utente` (`username`) ON UPDATE CASCADE,
  ADD CONSTRAINT `preferiti_ibfk_2` FOREIGN KEY (`cod_articolo`) REFERENCES `articolo` (`cod_articolo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
