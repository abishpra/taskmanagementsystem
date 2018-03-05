-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2017 at 05:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `image`, `remember_token`, `utype`, `status`, `created_at`, `updated_at`) VALUES
(2, 'memuzixyl', 'shyam@gmail.com', '$2y$10$K1Vt0xxJvcb6BbOZwdju6ecZ/sjh.r2jqmSf.5OZ5b3BLu3uSGD1a', 'm98SlxLv5xLIKME1.jpg', 'SqrQC5zel3QTPjJzoXdFKgL9w6E7u1iqyHbRg09anurXs7f7HpgdC3skod8w', 'user', 0, '2017-06-05 11:48:26', '2017-06-14 03:36:22'),
(4, 'krishna', 'krishna@gmail.com', '$2y$10$YN4aeGMtmLHg5ob52aLWK.erN.YIo1tmymHic9vXIeyJvvGjjYXLi', 'bATu0BGvOjmsEAtk.jpg', 'WSdcfuIIsnlcAulGKq63t2Wa86iQADJCJGKSNJQbif8hkq3XutJiU9OiEuVB', 'user', 0, '2017-06-14 00:07:48', '2017-06-14 03:36:26'),
(5, 'sita', 'sita@gmail.com', '$2y$10$lN3kR0cYlxz/JAl0/MRDLOShDhG2ugmgNlTqDW3elb6pSBaE5Mfly', 'lXXwgxbJkRbKuIfX.jpg', 'rn7VMAY7GI1CwQYN5eOUIpYK8uCYe0COKGJYTRfTc2eQHrh9wej3f6gspfei', 'admin', 1, '2017-06-14 00:14:04', '2017-06-15 11:45:56'),
(6, 'Abish', 'abishpra@gmail.com', '$2y$10$h8xRTC7vYTas2BZ0Vq.Xju27ju98eES48CRpzpiWkFy0cCZFxVB82', 'bmenJmbTYPo5SIWn.jpg', NULL, 'user', 1, '2017-06-14 03:39:14', '2017-06-14 03:39:14'),
(7, 'vumoc', 'kirikolohy@gmail.com', '$2y$10$NvrlOkNdIFXGxG.oStYKWuiFLU3i62YViUEmKQEZRs0fus/iuCkZ.', 'YxU3ZBKeczQnDGtH.jpg', NULL, 'user', 0, '2017-06-14 05:03:02', '2017-06-16 07:04:15'),
(8, 'Ram', 'ram@gmail.com', '$2y$10$H2hYV8et34YBavv6wCpof.jQ6o0jPipsF4HNvrdjw.RgL1S2woYYy', 'ttI9RcAfOZFqI1tn.jpg', '2Vg5H1cYjzVLv5fP277QrDohrie6u5CvY2oF8T77GIWJ47PhiM4U5GDCYRcZ', 'admin', 1, '2017-06-15 04:50:57', '2017-06-15 04:50:57'),
(9, 'Sanjay', 'Sanjay@gmail.com', '$2y$10$ErjqihB0LuQQ.dhFy0H8oOb2miZMYiLF1705dNRs/mLURZNF3RgVm', 'zdz46ho2ZPD0mPaP.jpg', NULL, 'user', 1, '2017-06-15 06:41:34', '2017-06-15 11:45:48'),
(10, 'hello', 'hello@gmail.com', '$2y$10$H2hYV8et34YBavv6wCpof.jQ6o0jPipsF4HNvrdjw.RgL1S2woYYy', 'eVZHp2nL9XzSi8qk.jpg', 'n7DDAzYbzhIGwPISdObNW9SKf55zkz0s0zLOKwTrQ8hnDvrbUZAC9sYCi5QX', 'user', 1, '2017-06-15 06:42:14', '2017-06-15 06:42:14'),
(11, 'Hari', 'hari@yahoo.com', '$2y$10$OEAhCsEvaMyvDV2JJNXOG.TWPJ/znQxJSLOEprlAjmkdWvJhhJbpG', 'UZ2NHWCxv8zU6NOK.jpg', 'wWycZ9kCwfVVRaF2NvVh0Lo89BcHaIngAcxZgBnsrA7o7KpO1WgR1gFhOeXF', 'user', 1, '2017-06-27 00:20:37', '2017-06-27 00:20:37'),
(12, 'user', 'user@gmail.com', '$2y$10$bsKXUyBIdUHHyZkiP7lVEudm5EsNTxc6CRmADLdMIC/BUgohLC/aO', 'TtYbruQGLq9FU88m.jpg', NULL, 'user', 1, '2017-09-01 06:48:39', '2017-09-01 06:48:39'),
(13, 'admin', 'admin.@gmail.com', '$2y$10$D2ozOxHJTqJI5Tf/BH2joePIe2EdRRHpGPqyWd7dfxaeZXdz9cl6S', 'uploading', NULL, 'admin', 1, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
