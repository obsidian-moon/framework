Obsidian Moon Framework
=======================

<a name="installing"></a>
## Installing Obsidian Moon Framework

Since Obsidian Moon Engine uses [Composer](http://getcomposer.org) you will need to install it before you can run the
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
|   |-- Controllers     // Controllers for handling routes
|   |-- Entity          // For storing entities, to be explained later
|   |-- Modules         // Modular classes for handling various functionality 
|-- config/             // For the presession modifications used by OME
|   |-- environment.php // Modifies system values if needed, before the session is started
|   |-- routes.php      // Routes for the application
|-- node_modules/       // If you use something like webpack, you would .gitignore this folder.
|-- public/             // Contains all the files that are available to user, eg. js, css, images, etc.
|   |-- .htaccess       // Look in examples for how to best set this
|   |-- index.php       // The primary entry point to your application.
|   |-- ...
|-- src/                // Required library directory used by OME
|   |-- js              // Store your js source files for webpack
|   |-- scss            // SCSS that will be processed by webpack
|   |-- views/          // All view files will go in here
|   |-- ...             
|-- vendor/             // Composer files needed for application, you can gitignore this
|-- common.php
|-- composer.json
|-- ...

```

If you use apache you will be able to start setting up the routing by using the following in an `.htaccess` file in the
app's `public` folder:

```
# Enabling the mod_rewrite module in this folder
RewriteEngine On
Options -Indexes

# Redirects invalid locations to index
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php?/$1 [L]
```

<a name="base-methods"></a>
## Overview of the Base Methods

The framework uses Obsidian Moon Engine, and you can find more details regarding the methods in its 
[README.md](https://github.com/obsidian-moon/engine/blob/master/README.md#implementation)
