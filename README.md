# Aurora Platform

Aurora Platform is an open-source solution for creation collaboration web apps, such as your own cloud storage, webmail client, calendar, hepdesk application or all at once. The application can be accessed from web browser or by standalone clients. For example, File Storage can be accessed using native clients for Windows, iOS and Android operating systems. You can use even third-party WebDAV clients.

## Installation instructions

During installation process you will need:
* [Git](https://git-scm.com/downloads)
* [Composer](https://getcomposer.org/download/)
* [Node.js + NPM](https://nodejs.org/en/)
    
    **Note!** Version of npm above 3 is required

1. Clone of Aurora Platform into your installation root directory
`git clone https://github.com/afterlogic/aurora-platform.git INSTALL_DIR_NAME`

2. Download `composer.phar` from `https://getcomposer.org/composer.phar`

3. Run composer installation process by running the following from command line:
    ```bash
    php composer.phar install
    ```

    **NB:** It is strongly advised to run composer as non-root user. Otherwise, third-party scripts will be run with root permissions and composer issues a warning that it's not safe. We recommend running the script as the same user web server runs under.

5. Next, you need to build static files for current module set.

    First of all, install all npm modules via
    ```bash
    npm install ./modules/CoreWebclient
    ```
    and install gulp-cli module globaly 
    ```bash
    npm install --global gulp-cli
    ```

6. Now you can build static files
    ```bash
    gulp styles --themes Default,Funny
    ```

    ```bash
    gulp js:build
    ```
  
7. Now you are ready to open a URL pointing to the installation directory in your favorite web browser.

8. Upon installing the product, you'll need to configure your installation. Use instruction from any product of Aurora family, for example, [configuration of Aurora Files](https://afterlogic.com/docs/aurora-files/configuration).


**IMPORTANT:**

1. Make sure data directory is writable by web server. For example:
    ```bash
    chown -R www-data:www-data /var/www/aurora/data
    ```

2. It is strongly recommended to runs the product under **https**. If you run it under **http**, the majority of features will still be available, but some functionality aspects, such as authentication with Google account, won't work.

To enable automatic redirect from **http** to **https**, set **RedirectToHttps** to **On** in **data/settings/config.json** file.

**Protecting data directory**

All configuration files of the application and user data are stored in data directory, so it's important to [protect data directory](https://afterlogic.com/docs/aurora-files/security/protecting-data-directory) to make sure that users cannot access that directory over the Internet directly. 
