# Salama Sasa

## What is Salama Sasa?

In the context of healthcare, privacy is paramount. This is especially true for patients affected by Gender-Based Violence (GBV), who often face infringements of their data privacy. 

Salama Sasa proposes a system that allows data sharing for statistical analysis without accessing individual low-level details. This system enables GBV patients to book appointments with specialists through a user-friendly interface and offers unbiased healthcare service providers. It will also feature anonymous but verified reviews of doctors, clinics, and services.

This project will be implemented using the PHP framework, with MySQL for the database system, and testing tools such as PHPUnit. It will follow the Scrum methodology, utilizing agile principles in its design process. The system is expected to revolutionize the way GBV patients access specialist services, reinforce patient tracking, and provide a platform for feedback on treatments.

## What is CodeIgniter?

Salama Sasa is built using CodeIgniter, a PHP full-stack web framework that is light, fast, flexible, and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the distributable version of the framework. It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> **Warning:**
> The end of life date for PHP 7.4 was November 28, 2022.
> The end of life date for PHP 8.0 was November 26, 2023.
> If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> The end of life date for PHP 8.1 will be November 25, 2024.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## Installation

To install Salama Sasa, follow these steps:

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/your-username/salama-sasa.git
2. Navigate to the Project Directory: cd salama-sasa
3. Install Dependencies: Ensure you haveComposer installed, then run: composer install
4. Configure Your Environment:
   Copy env to .env and tailor it to your environment, specifically the base URL and database settings. Use:cp env .env
5. Run the Application:
   Start the built-in PHP server:php spark serve
6. Usage
   After setting up, you can access your application at http://localhost:8080 by default.

To create a new controller, you can use the CLI command:php spark make:controller ControllerName
For more usage instructions, refer to the user guide (https://codeigniter.com/user_guide/). 
