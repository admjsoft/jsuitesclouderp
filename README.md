<h2 align="center">
    JSuiteCloudERP
</h2>

<p align="center">
The project is created under JSoft.
</p>

Table of Contents
=================

  * [Features / Technologies](#features--technologies)
  * [Codeigniter Packages](#codeigniter-packages)
  * [IDE](#ide)
  * [Requirements](#requirements)
  * [Local Installation](#local-installation)
  * [Git Development Guidelines](#git-development-guidelines)

### Features / Technologies

- [PHP v7.4](https://www.php.net/releases/7.4/en.php)
- [💚 Codeigniter v3](https://codeigniter.com/userguide3/general/welcome.html) - an Application Development Framework - a toolkit - for people who build web sites using PHP.
- [MySQL v8](https://dev.mysql.com/) - the most popular Open Source SQL database management system, is developed, distributed, and supported by Oracle Corporation.
- ⚒️ [Composer](https://getcomposer.org/) - Dependency Manager for PHP

### Codeigniter Packages

- [PHP DotEnv](https://github.com/vlucas/phpdotenv/) - Loads environment variables from .env to getenv(), $_ENV and $_SERVER automagically.

### IDE

- [PHPStorm](https://www.jetbrains.com/phpstorm/)
- [VSCode](https://code.visualstudio.com/)

### Requirements

Install the following programs
- [PHP](https://php.net) version 7.4 or newer is required, with the following PHP extensions are enabled:
    - intl
    - mbstring
    - json
    - mysqlnd
- [Composer](https://getcomposer.org)
- [MySQL](https://dev.mysql.com/) with 1 newly created database

### Local Installation

#### Using SSH
[Go to this link](https://www.freecodecamp.org/news/git-ssh-how-to/)

#### Using Github Desktop
[Go to this link](https://desktop.github.com/)

<hr/>

> Import/Execute query `default.sql` to your MySQL Server

> Clone this repository

```bash
git clone git@github.com:admjsoft/jsuiteclouderp.git
```

> Enter jsuiteclouderp directory

```bash
cd jsuiteclouderp
```

> Install all the required packages

```bash
composer install
```

> Copy config/database.php.example to config/database.php

```bash
cp config/database.php.example config/database.php
```

> Copy config/config.php.example to config/config.php

```bash
cp config/config.php.example config/config.php
```

> Update config/database.php and config/config.php attributes as your database Installation and configuration

```
// config/database.php
$hostname = 'yourDatabaseHost';
$username = 'yourDatabaseUsername';
$password = 'yourDatabasePassword';
$database = 'yourNewlyCreatedDatabase';

// config/config.php
$config['base_url'] = 'http://localhost:8000/';
```

> Run JSuiteCloudERP local development server

```bash
php -S 0.0.0.0:8000
```

This will launch the server and you can now view JSuiteCloudERP in your browser at http://localhost:8000.

### Git Development Guides

#### Feature

- Go to `development` branch

```bash
git switch development
```

- Get the latest changes of `development` branch

```bash
git pull origin development
```

- Create a new `feature` branch based on `development` branch with using your task code follow with your task name

```bash
// branch naming example
git switch -c feature/T932-Create-to-dos
```

- Perform and commit your changes

```bash
git add .
git commit -m "{YourCommitMessageHere}"
```

- Get latest `development` changes, move his work on top of the latest

```bash
git switch development
git pull origin development
git switch feature/T932-Create-to-dos
git rebase development
```

- Perform corrections as needed (If any conflicts)

- Create a pull request [here](https://github.com/admjsoft/jsuiteclouderp/compare) by selecting `development` as base and `{YourNewBranch}` as compare

- Let the code reviewer review your codes
