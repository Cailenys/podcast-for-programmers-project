-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 02:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `podcasts_for_programmers`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Data science'),
(2, 'Python'),
(3, 'React'),
(4, 'DotNet'),
(5, 'Javascript'),
(6, 'Cyber Security');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `name`) VALUES
(1, 'Sara Chipps, Paul Ford, and Ben Popper'),
(2, 'Michael Chan'),
(3, 'Jacqueline Nolis and Emily Robinson'),
(4, 'Dane Hillard'),
(5, 'Jonathan Pyle'),
(6, 'Hugo Bowne-Anderson'),
(7, 'Kurt Seifried and Josh Bressers');

-- --------------------------------------------------------

--
-- Table structure for table `playlistpodcasts`
--

CREATE TABLE `playlistpodcasts` (
  `id` int(11) NOT NULL,
  `podcastId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlistpodcasts`
--

INSERT INTO `playlistpodcasts` (`id`, `podcastId`, `playlistId`, `playlistOrder`) VALUES
(1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(1, 'My favourite podcasts', 'Donald', '2020-06-09 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `podcastcover`
--

CREATE TABLE `podcastcover` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `mentor` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `podcastCoverPath` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `podcastcover`
--

INSERT INTO `podcastcover` (`id`, `title`, `mentor`, `category`, `podcastCoverPath`) VALUES
(1, 'Stack Overflow', 1, 3, 'assets/images/podcast-covers/stack-overflow-cover.jpg'),
(2, 'Talk Python to me', 1, 2, 'assets/images/podcast-covers/talk-python-logo-mic.png'),
(3, 'React Podcast', 4, 2, 'assets/images/podcast-covers/react-cover.jpg'),
(4, 'Cyber Security', 6, 6, 'assets/images/podcast-covers/cyber-security.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `podcasts`
--

CREATE TABLE `podcasts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `mentor` int(11) NOT NULL,
  `podcastcover` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `seriesOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `podcasts`
--

INSERT INTO `podcasts` (`id`, `title`, `mentor`, `podcastcover`, `category`, `duration`, `path`, `seriesOrder`, `plays`) VALUES
(1, ' Pete Hunt on Seven Years of Reconsidering Best React Practices', 2, 3, 1, '58:15', 'assets/podcasts/96-pete-hunt_tc.mp3', 1, 8),
(2, 'Javascript is ready to get its own place', 1, 1, 5, '24:01', 'assets/podcasts/stackoverflow-episode240final_tc.mp3', 1, 9),
(3, '.Net and DevAroundTheSun - We\'re doing an episode live!', 1, 1, 4, '31:36', 'assets/podcasts/stackoverflow-episode234-final_tc', 2, 20),
(4, 'Paths into a data science career', 6, 2, 1, '1:02:47', 'assets/podcasts/139-paths-into-a-data-science-career.mp3', 3, 24),
(5, ' Working from home security: resistance is futile', 7, 4, 4, '31:00', 'assets/podcasts/Episode_194_Working_from_home_security_resistance_is_futile.mp3', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(1, 'Donald', 'Cody', 'Mcduck', 'Cody@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-01 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(2, 'Super-Daisy', 'Daisy', 'Duck', 'Daisy20@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '2020-06-01 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(3, 'Pothole', 'Angus', 'Mcduck', 'Angusm@gmal.com', 'a688a47ac73fb58ce3828bcb184cb157', '2020-06-01 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(4, 'Quack', 'Quackmore', 'Duck', 'Quack19@gmail.com', '44cd4c5661c076ab533dd66d45759149', '2020-06-01 00:00:00', '/assets/images/profile-pics/Duck-in-the-pool.png'),
(5, 'Quack', 'Quackmore', 'Duck', 'Quack19@gmail.com', '44cd4c5661c076ab533dd66d45759149', '2020-06-01 00:00:00', '/assets/images/profile-pics/Duck-in-the-pool.png'),
(6, 'Cailenys', 'Cailenys', 'Salazar', 'Cai01@gmail.com', 'a89634359fd504a40922f09ed12d3e95', '2020-06-05 00:00:00', '/assets/images/profile-pics/Duck-in-the-pool.png'),
(7, 'barSimpson', 'Bart', 'Simpson', 'Bart@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-06 00:00:00', 'assets/images/profile-pics/head_emerald.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlistpodcasts`
--
ALTER TABLE `playlistpodcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcastcover`
--
ALTER TABLE `podcastcover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `podcasts`
--
ALTER TABLE `podcasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `playlistpodcasts`
--
ALTER TABLE `playlistpodcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `podcastcover`
--
ALTER TABLE `podcastcover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `podcasts`
--
ALTER TABLE `podcasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
