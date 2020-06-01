# Podcast for Programmers
![Project Logo](https://trello-attachments.s3.amazonaws.com/5ec9989090bd560c7d1d50db/250x250/dace8e5b3bb3cc9a98d4603c4f784e55/Logo-readme.png)

> Download free resources to listen to at any time!

---

### Table of Contents

- [Description](#description)
- [How To Use](#how-to-use)
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
- Wordpress

[Back To The Top](#read-me-template)

---

## Testing it out!

1. Clone this repository
2. Open the main folder with Visual Studio or the code editor of your preference.

#### Installation

3. Download XAMMP : https://www.apachefriends.org/download.html
4. Open the XAMMP control panel and select and then start Apache and SQL services 
5. Run the project by typing on your browser localhost:80/podcasts-for-programmers/register.php

#### SQL script

## INSERT statement:

```php
<?php
    $result = mysqli_query($this->conn, "INSERT INTO users VALUES (NULL, '$un', '$fn', '$ln', '$em', '$encryptedPW', '$date', '$profilePic')");
?>
```
The way how you will run this script is by introducing values in the sign-up form. The program will connect with the database and then it will introduce the values submitted in the user table.

[Back To The Top](#read-me-template)

---

## References

- PHP Connect to MySQL [Link](https://www.w3schools.com/php/php_mysql_connect.asp)

- SQL INSERT INTO Statement[Link](https://www.w3schools.com/sql/sql_insert.asp)

---

## Author Info
### Cailenys Salazar

- [Linkedin](Linkedin.com/in/cailenyssalazar/)

- [Resume ](https://cailenys.github.io/online-resume/)

[Back To The Top](#read-me-template)

---

## License

Copyright (c) [2020] [Univerty of  Alberta - Canada]


[Back To The Top](#read-me-template)


