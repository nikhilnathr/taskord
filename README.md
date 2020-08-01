<div align="center">
    <p><img src="public/images/logo.svg" height="70" alt="Taskord Logo"></p>
    <h1>Taskord</h1>
    <strong>✅ The Taskord Web App</strong>
</div>
<br>
<div align="center">
    <a href="https://www.php.net">
        <img src="https://img.shields.io/badge/PHP-v7.4-blue.svg?logo=php" alt="PHP Version">
    </a>
    <a href="http://laravel.com">
        <img src="https://img.shields.io/badge/Laravel-v7.x-important.svg?logo=laravel&longCache=true" alt="Laravel Version">
    </a>
    <a href="https://nodejs.org">
        <img src="https://img.shields.io/badge/Node-v14.x-brightgreen.svg?logo=node.js&longCache=true" alt="Node Version">
    </a>
    <a href="https://github.com/taskord/taskord/actions?query=workflow%3ACI">
        <img src="https://github.com/taskord/taskord/workflows/CI/badge.svg" alt="CI Workflow">
    </a>
    <a href="https://codeclimate.com/github/taskord/taskord/maintainability">
        <img src="https://api.codeclimate.com/v1/badges/8da39d4842dba57d2b0b/maintainability" alt="CodeClimate Maintainability">
    </a>
    <a href="https://www.codetriage.com/taskord/taskord">
        <img src="https://www.codetriage.com/taskord/taskord/badges/users.svg" alt="CodeTriage">
    </a>
    <img src="https://img.shields.io/github/languages/code-size/taskord/taskord" alt="GitHub code size in bytes">
    <a href="LICENSE">
        <img src="https://img.shields.io/badge/license-MIT-green?longCache=true" alt="MIT License">
    </a>
</div>
<div align="center">
    <br>
    <a href="https://taskord.com"><b>taskord.com »</b></a>
    <br><br>
    <a href="https://github.com/taskord/taskord/issues/new"><b>Report Bug</b></a>
    •
    <a href="https://github.com/taskord/taskord/issues/new"><b>Request Feature</b></a>
</div>

## About Taskord

- **✅ Tasks:** All tasks are public and added to your maker profile.
- **🔥 Reputation:** Earn reputations by completing, praising and commenting on tasks and questions, which helps you to stay productive.
- **😀 Makers:** Community of peoples who ships constantly.
- **📦 Products:** Ship your products to Taskord and make regular updates about the product and even add tasks to them.
- **💬 Q&A:** Get your questions answered and use this feature as dicussion too.
- **🎁 Deals:** Discounts and special deals for Taskord members. Only available to patrons.

## Prerequisites

- [PHP](https://www.php.net): please refer to their [installation guide](https://www.php.net/manual/en/install.php).
- [Node](https://nodejs.org): we recommend using [nvm](https://github.com/nvm-sh/nvm) to install the Node version listed on the badge.
- [MySQL](http://www.mysql.com) 8.0 or higher.

## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project, ie. https://github.com/taskord/taskord/-/forks/new
2. Clone your forked repository, ie. `git clone https://github.com/<your-username>/taskord.git`
3. Create your Feature Branch (git checkout -b AmazingFeature)
4. Commit your Changes (git commit -m 'Add some AmazingFeature)
5. Push to the Branch (git push origin AmazingFeature)
6. Open a Pull Request

## Standard Installation

1. Make sure all the prerequisites are installed.
2. Set up your environment variables/secrets in `.env` file
    ```sh
    cp .env.example .env
    ```
3. Run the below commands to install taskord
    ```sh
    # Install Composer Dependencies
    composer install

    # Install NPM Dependencies
    npm install

    # Build assets for development
    npm run dev
    # Build and minify assets for production
    npm run production
    # Build for dev (With sourcemaps) and watch for changes
    npm run dev

    php artisan key:generate
    php artisan migrate:fresh --seed
    ```
4. That's it! Run `php artisan serve` to start the application and head to `http://localhost:8000`

## Development using Docker

This repository ships with a Docker Compose configuration intended for development purposes. It'll build a PHP image with all needed extensions installed and start up a MySQL server and a Node image watching the UI assets.

To get started, make sure you meet the following requirements:

- Docker and Docker Compose are installed
- Your user is part of the `docker` group

If all the conditions are met, you can proceed with the following steps:

1. Make sure **port 8080 is unused** *or else* change `DEV_PORT` to a free port on your host.
2. **Run `chgrp -R docker storage`**. The development container will chown the `storage` directory to the `www-data` user inside the container so Taskord can write to it. You need to change the group to your host's `docker` group here to not lose access to the `storage` directory.
3. **Run `docker-compose up`** and wait until all database migrations have been done.
4. You can now login with `test` and `test` as password on `localhost:8080` (or another port if specified).

If needed, You'll be able to run any artisan commands via docker-compose like so:

 ```sh
docker-compose run app php artisan list 
```

-----

<br>

<div align="center">
    <img width="250px" src="https://i.imgur.com/O1cFKGt.gif">
    <br>
    <strong>Happy Shipping</strong> 🚀
</div>
