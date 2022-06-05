<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links

-->

[![Forks][forks-shield]][forks-url]


<!-- PROJECT LOGO -->
<br />
<div align="center">
  <a href="https://github.com/Projecte5/TicketHelp">
    <img src="https://i.ibb.co/hXk4C0k/Ticket-Help.png" alt="Logo" width="200" height="80">
  </a>

  <h3 align="center">TicketHelp</h3>

  <p align="center">
    An awesome website to tell us your breakdowns!
    <br />
    <a href="https://github.com/Projecte5/TicketHelp"><strong>Explore the docs</strong></a>
    <br />
    <br />
    <a href="https://comoinstalar.online/">:eye: View Demo :eye:</a> 
    
  </p>
</div>



<!-- TABLE OF CONTENTS -->
<details>
  <summary>Index 📑</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#About The Project ℹ️">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contributing">Contributing</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>



<!-- ABOUT THE PROJECT -->
## About The Project ℹ️

This project consists of being able to create incidents, since we know that there are many device incidents, such as in a high school classroom, with our application you will always be able to notify new incidents every time one comes out.


<p align="right">(<a href="#top">back to top</a>)</p>



### Built With 🛠️

Our application is built with the following languages:


* [Laravel](https://laravel.com)
* [Angular](https://angular.io/)
* [Tailwindcss](https://tailwindcss.com)
* [PHP](https://www.php.net/downloads)
* [MySql](https://www.mysql.com)



<p align="right">(<a href="#top">back to top</a>)</p>



<!-- GETTING STARTED -->
## Getting Started 🏁

To get a working local copy, follow these simple steps:

### Prerequisites

Before we start we will install a few things:
* npm
* php
* MySql

### Installation ⬇️

_We install and configure locally._

1. Clone the repo
   ```sh
   git clone https://github.com/Projecte5/TicketHelp.git
   ```
2. Install NPM packages
   ```sh
   npm install
   ```
3. Install composer packages
   ```sh
   composer install
   ```
4. Update composer packages
   ```sh
   composer update
   ```   
5. Update composer packages
   ```sh
    php artisan migrate:refresh --seed
   ``` 
6. Start the server
   ```sh
   php artisan serve (once the order is made, we access the ip that gave us in a browser, "127.0.0.1:8000".)
   ```
7. If you want to see the tests execute the following command
    ```sh
   php artisan test
   ```
   
<p align="right">(<a href="#top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->
## Usage 📜

First we log in with our username and password, it redirects us to the admin panel or the user panel, it depends on the user with which we have logged in, then we can open an incident of a device in a specific department and a specific classroom.

We can also create a department, in case we need it, among other things.

* LOGIN
<div align="center">
    <img src="https://i.ibb.co/JKT9BqC/login-ticket-Help.png" alt="login" width="700" height="300">
</div>

* ADMIN
<div align="center">    
    <img src="https://i.postimg.cc/1PNVMg4K/admin-ticket-Help.png" alt="admin" width="700" height="300">
</div>

* USER
<div align="center">
    <img src="https://i.postimg.cc/g0K8STHj/user-ticket-Help.png" alt="user" width="700" height="300">
</div>

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- CONTRIBUTING -->
## Contributing 💡

If you have a suggestion that would improve this, please fork the repository and create a pull request. You can also simply open an issue with the "improvement" tag. 

Don't forget to give the project a star :star:! Thanks!

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature_AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature_AmazingFeature`)
5. Open a Pull Request

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- CONTACT -->
## Contact 📞

* Mohamed Bourarach - [GitHub](https://github.com/m04a)
* Alex Aguilera - [GitHub](https://github.com/Luky7600)
* Oriol Bech - [GitHub](https://github.com/OriolBech)
* Kirill Lupenkov - [GitHub](https://github.com/nemesxv)
* Juan Carlos - [GitHub](https://github.com/Juanka007)
* Iker Ramajo - [GitHub](https://github.com/iramajo)
* Jorge Luis Martinez - [GitHub](https://github.com/George11849)

Project Link: [Repo](https://github.com/Projecte5/TicketHelp)

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[forks-shield]: https://img.shields.io/github/forks/othneildrew/Best-README-Template.svg?style=for-the-badge
[forks-url]: https://github.com/Projecte5/TicketHelp/network/members
[product-screenshot]: images/screenshot.png
