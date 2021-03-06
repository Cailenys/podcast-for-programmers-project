# Podcast for Programmers
![Project Logo](https://trello-attachments.s3.amazonaws.com/5ec9989090bd560c7d1d50bf/5ec9989090bd560c7d1d50db/d8027d224cb68199f43ddc8c6057561f/logo.png)

> Download free resources to listen to at any time!😃🙌

---

### Table of Contents

- [Description](#description)
- [Testing it out](#Testing-it-out)
- [References](#references)
- [License](#license)
- [Author Info](#author-info)

---

## Description

This podcast application is dedicated to the programming community. So developers can download free source content and upload content. Including tips and tricks to help program faster and in more efficient ways, stories and career development of more experienced programmers, sources of inspiration and support, as well as trends in programming and related technologies. 

#### Programming languages and tools

- PHP
- JavaScript
- MySQL
- JQuery
- CSS
- HTML


[Back To The Top](#Podcast-for-Programmers)

---

## Testing it out!🤓

1. Clone this repository
2. Open the main folder with Visual Studio or the code editor of your preference.
3. Import the database attached in the repository or create Database ( see SQL script bellow )

#### SQL script

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) 


-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
)


-- --------------------------------------------------------

--
-- Table structure for table `playlistpodcasts`
--

CREATE TABLE `playlistpodcasts` (
  `id` int(11) NOT NULL,
  `podcastId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) 


-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) 

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
) 


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
) 

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

## INSERT statement:

```php
<?php
    $result = mysqli_query($this->con, "INSERT INTO users VALUES ('', '$un', '$fn', '$ln', '$em', '$encryptedPW', '$date', '$profilePic')");
?>
```
The way how you will run this script is by introducing values in the sign-up form. The program will connect with the database and then it will introduce the values submitted in the user table.

[Back To The Top](#Podcast-for-Programmers)


#### Installation 

4. Download XAMMP : https://www.apachefriends.org/download.html
5. Open the XAMMP control panel and select and then start Apache and SQL services 
6. Run the project by typing on your browser localhost:80/podcasts-for-programmers/register.php

---

## References

- PHP Connect to MySQL [Link](https://www.w3schools.com/php/php_mysql_connect.asp)

- SQL INSERT INTO Statement [Link](https://www.w3schools.com/sql/sql_insert.asp)

---

## Author Info
### Cailenys Salazar

- [Linkedin](Linkedin.com/in/cailenyssalazar/)

- [Resume ](https://cailenys.github.io/online-resume/)

[Back To The Top](#Podcast-for-Programmers)

---

## License

Copyright (c) [2020](https://www.ualberta.ca/index.html) Univerty of  Alberta - Canada

[Back To The Top](#Podcast-for-Programmers)


