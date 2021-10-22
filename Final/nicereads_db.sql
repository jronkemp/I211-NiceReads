-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 04:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nicereads_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisherName` varchar(100) NOT NULL,
  `yearPublished` year(4) NOT NULL,
  `pageCount` int(11) NOT NULL,
  `bestSeller` tinyint(1) NOT NULL,
  `imageLink` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `publisherName`, `yearPublished`, `pageCount`, `bestSeller`, `imageLink`) VALUES
(1, 'A Game of Thrones', 'J.R.R. Martin', 'Bantam Spectra(US)', 1996, 694, 1, 'https://images-na.ssl-images-amazon.com/images/I/91dSMhdIzTL.jpg'),
(2, 'Altered Carbon', 'Richard K. Morgan', 'Victor Gollancz', 2002, 416, 1, 'https://images-na.ssl-images-amazon.com/images/I/517xet+HjxL.jpg'),
(3, 'Nineteen Eighty-Four', 'George Orwell', 'Secker & Warburg', 1949, 328, 1, 'https://images-na.ssl-images-amazon.com/images/I/71kxa1-0mfL.jpg'),
(4, 'The Lord of the Rings, The Fellowship of the Ring', 'J. R. R. Tolkien', 'George Allen & Unwin', 1954, 423, 1, 'https://upload.wikimedia.org/wikipedia/en/thumb/8/8e/The_Fellowship_of_the_Ring_cover.gif/220px-The_Fellowship_of_the_Ring_cover.gif'),
(5, 'Neuromancer', 'William Gibson', 'Ace', 1984, 271, 1, 'https://upload.wikimedia.org/wikipedia/en/thumb/4/4b/Neuromancer_%28Book%29.jpg/220px-Neuromancer_%28Book%29.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rating` tinyint(4) DEFAULT NULL,
  `dateReviewed` timestamp NOT NULL DEFAULT current_timestamp(),
  `reviewText` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `user_id`, `book_id`, `rating`, `dateReviewed`, `reviewText`) VALUES
(1, 1, 1, 5, '2021-04-08 02:53:17', 'This is a fantastic dark fantasy book! Can\'t wait to read more of the books!'),
(2, 2, 2, 5, '2021-04-23 15:17:46', 'A trippy Sci-Fi novel I saw on Netflix and just had to check out the book! Super cool!'),
(3, 2, 3, 4, '2021-04-23 15:17:46', 'This classic tale about Big Brother sure is a fascinating read.'),
(4, 3, 1, 4, '2021-04-23 15:19:38', 'A bit bloody for my taste, but otherwise a well-written book!'),
(5, 2, 5, 4, '2021-05-02 02:41:15', '“The sky above the port was the colour of television, tuned to a dead channel” is still such a super cool opening to a book. Epic sci-fi read!'),
(6, 3, 4, 5, '2021-05-02 02:41:15', 'Absolutely beautiful book, beautiful world, all around exciting vibes. I can\'t wait to see what comes in the next book!'),
(7, 1, 4, 5, '2021-05-02 02:42:18', 'All-time classic. Still one of my favorite reads!'),
(8, 2, 4, 2, '2021-05-02 02:42:18', 'Not really into fantasy, but it was a good book I suppose.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullName` varchar(50) NOT NULL,
  `dateJoined` timestamp NOT NULL DEFAULT current_timestamp(),
  `emailAddress` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `fullName`, `dateJoined`, `emailAddress`, `password`) VALUES
(1, 'admin', 'Administrator', '2021-04-08 02:50:21', 'admin@yahoo.com', '$2y$10$vlYvvXIqeUO0.LFWCTNYYu.2.2l7FonBCV/ycoQP4vy2gD3ieFYme'),
(2, 'jsmith', 'John Smith', '2021-04-23 15:13:45', 'jsmith@jsmith.com', '$2y$10$vlYvvXIqeUO0.LFWCTNYYu.2.2l7FonBCV/ycoQP4vy2gD3ieFYme'),
(3, 'rstar', 'Rango Star', '2021-04-23 15:13:45', 'rstar@superstar.com', '$2y$10$vlYvvXIqeUO0.LFWCTNYYu.2.2l7FonBCV/ycoQP4vy2gD3ieFYme');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
