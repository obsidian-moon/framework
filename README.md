Obsidian Moon Framework
=======================

<a name="installing"></a>
## Installing Obsidian Moon Framework

Because Obsidian Moon Engine uses [Composer](http://getcomposer.org), you will need to install it before you can run the
code with it. Once you have installed Composer you will then be able to install it by running the following command:

```bash
composer create-project obsidian-moon/framework
```

Once installed you can change the namespace of your application's files by entering the following into the
`composer.json` file:

```json
{
  "autoload": {
    "class-map": ["app/"],
    "files": ["app/mix.php"],
    "psr-4": {
      "ObsidianMoon\\Framework\\": "app/"
    }
  }
}
```

<a name="file-structure"></a>
## File Structure

Once installed, you will find that the application will consist of the following structure.

```
.
|-- app/                // Application namespace root
|   |-- Controllers/    // Controllers for handling routes
|   |-- Entity/         // For storing entities, to be explained later
|   |-- Modules/        // Modular classes for handling various functionality 
|-- config/             // For the presession modifications used by OME
|   |-- environment.php // Modifies system values if needed, before the session is started
|   |-- routes.php      // Routes for the application
|-- node_modules/       // If you use something like webpack, you would .gitignore this folder.
|-- public/             // Contains all the files that are available to user, eg. js, css, images, etc.
|   |-- .htaccess       // Look in examples for how to best set this
|   |-- index.php       // The primary entry point to your application.
|   |-- ...
|-- src/                // Required library directory used by OME
|   |-- js/             // Store your JS source files for webpack
|   |-- scss/           // SCSS that will be processed by webpack
|   |-- views/          // All view files will go in here
|   |-- ...             
|-- vendor/             // Composer files needed for application, you can gitignore this
|-- common.php
|-- composer.json
|-- ...
```

<a name="apache-support"></a>
## Apache Support

If you use apache you will be able to start setting up the routing by using the following in an `.htaccess` file in the
app's `public` folder:

```apacheconf
<IfModule mod_rewrite.c>
    # Enabling the mod_rewrite module in this folder
    RewriteEngine On
    Options -Indexes

    # Redirects invalid locations to index
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php?/$1 [L]
</IfModule>
```

A more complete `.htaccess` file with caching has been included in the `public` folder. 

<a name="base-methods"></a>
## Overview of the Base Methods

The framework uses Obsidian Moon Engine, and you can find more details regarding the methods in its 
[README.md](https://github.com/obsidian-moon/engine/blob/master/README.md#implementation)

<a name="credits"></a>
## Credits

Obsidian Moon Framework builds on top of [Obsidian Moon Engine](https://github.com/obsidian-moon/engine/) and uses the
following libraries and projects in its development:

* [PHP 8](https://www.php.net/) with [Composer](https://getcomposer.org/) package manager.
* [Symfony 6 Components](https://symfony.com/components) for HTTP Requests and Routing.
* [Node.js](https://nodejs.org/) with NPM.
* [Laravel Mix](https://laravel-mix.com/), a wrapper for [webpack](https://webpack.js.org/) to compile assets.
* [HTML5 Boilerplate](https://html5boilerplate.com/), selected features to create HTML5 foundation for templates and views.
* [ESLint](https://eslint.org/) and [StyleLint](https://stylelint.io/) for ensuring proper coding in source JS and SCSS.
