-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Sep 2016 pada 11.56
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kursus`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`%` FUNCTION `kodeotomatis` (`nomer` INT) RETURNS CHAR(8) CHARSET latin1 BEGIN
DECLARE kodebaru CHAR(8);
DECLARE urut INT;
 
SET urut = IF(nomer IS NULL, 1, nomer + 1);
SET kodebaru = CONCAT("KS", LPAD(urut, 6, 0));
 
RETURN kodebaru;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `name_course` varchar(20) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `course`
--

INSERT INTO `course` (`id_course`, `name_course`, `description`) VALUES
(1, 'Matematika', '520000'),
(2, 'Bahasa Inggris', '800000'),
(3, 'Kimia', '300000'),
(4, 'Fisika', '300000'),
(5, 'Ekonomi', '400000'),
(6, 'Bahasa Mandarin', '500000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instructors`
--

CREATE TABLE `instructors` (
  `id_inst` int(11) NOT NULL,
  `name_inst` varchar(30) NOT NULL,
  `gender` enum('Laki - laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `instructors`
--

INSERT INTO `instructors` (`id_inst`, `name_inst`, `gender`) VALUES
(1, 'Annissa', 'Perempuan'),
(2, 'Wahyu', 'Laki - laki'),
(3, 'Syrra', 'Perempuan'),
(4, 'Ahmad', 'Laki - laki'),
(5, 'Minna', 'Perempuan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE `payments` (
  `code` int(11) NOT NULL,
  `id_take` int(11) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL,
  `status` enum('Terbayar','Belum Terbayar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `payments`
--

INSERT INTO `payments` (`code`, `id_take`, `amount`, `date`, `status`) VALUES
(1, 1, '', '03-09-2016', 'Terbayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id_st` int(11) NOT NULL,
  `name_st` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` enum('Laki - laki','Perempuan') NOT NULL,
  `active` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `students`
--

INSERT INTO `students` (`id_st`, `name_st`, `email`, `password`, `gender`, `active`) VALUES
(1, 'sam', 'sam@no.com', '1234', 'Perempuan', 'Ya'),
(3, 'sami', 'd@g.coma', '9090', 'Laki - laki', 'Tidak'),
(4, 'sal', 'las@d.en', '9090', 'Perempuan', 'Tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `take_course`
--

CREATE TABLE `take_course` (
  `id_take` int(11) NOT NULL,
  `id_st` int(11) NOT NULL,
  `id_teach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `take_course`
--

INSERT INTO `take_course` (`id_take`, `id_st`, `id_teach`) VALUES
(1, 3, 1),
(2, 3, 3),
(3, 3, 2),
(4, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `teach`
--

CREATE TABLE `teach` (
  `id_teach` int(11) NOT NULL,
  `id_inst` int(11) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `teach`
--

INSERT INTO `teach` (`id_teach`, `id_inst`, `id_course`) VALUES
(1, 2, 4),
(2, 1, 5),
(3, 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id_inst`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`code`),
  ADD KEY `id_take` (`id_take`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_st`,`name_st`,`email`);

--
-- Indexes for table `take_course`
--
ALTER TABLE `take_course`
  ADD PRIMARY KEY (`id_take`),
  ADD KEY `id_st` (`id_st`),
  ADD KEY `id_teach` (`id_teach`);

--
-- Indexes for table `teach`
--
ALTER TABLE `teach`
  ADD PRIMARY KEY (`id_teach`),
  ADD KEY `id_inst` (`id_inst`),
  ADD KEY `id_st` (`id_course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id_inst` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id_st` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `take_course`
--
ALTER TABLE `take_course`
  MODIFY `id_take` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `teach`
--
ALTER TABLE `teach`
  MODIFY `id_teach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_take`) REFERENCES `take_course` (`id_take`);

--
-- Ketidakleluasaan untuk tabel `take_course`
--
ALTER TABLE `take_course`
  ADD CONSTRAINT `take_course_ibfk_1` FOREIGN KEY (`id_st`) REFERENCES `students` (`id_st`),
  ADD CONSTRAINT `take_course_ibfk_2` FOREIGN KEY (`id_teach`) REFERENCES `teach` (`id_teach`);

--
-- Ketidakleluasaan untuk tabel `teach`
--
ALTER TABLE `teach`
  ADD CONSTRAINT `teach_ibfk_1` FOREIGN KEY (`id_inst`) REFERENCES `instructors` (`id_inst`),
  ADD CONSTRAINT `teach_ibfk_2` FOREIGN KEY (`id_course`) REFERENCES `course` (`id_course`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
