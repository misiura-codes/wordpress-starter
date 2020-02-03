Before start
---------------
* Do mass change-replace " **theme_text_domain** " to your new theme text domain;
* Run ```npm run i``` in your command line;
* Don't forget to change data in **style.css**
* In **webpack.mix.js** set **proxy** const to your virtial domain address;
* Don't forget start your web server before ```npm run watch```;

* Uncomment **WooCommerce** support in functions/setup - line 40 if needed

What's included?
---------------
* **Laravel Mix** for building assets & browsersync for live realod
* Theme also has JS object that could be used in javascript:
  * theme - main object
    * **ajax** - url for admin-ajax.php file (when you're using own actions in functions.php),
    * **ajax_nonce** - nonce for javascript info (like when sending forms etc...)
    * **endpoint** - wordpress api main endpoint,
    * **rtl** - returns true|false if is RTL
* **Bootstrap** (grid)
* **SweetAlert 2 (CDN)** - modal\alert windows;
* **WebFont.js (CDN)** - loading google fonts;

* **RFS (Responsive Font size)** - auto scaling font-size for responsiveness;


A few advices
---------------
* For page templates use template-*.php page templates naming
* Assets has two sub folders
  - build - all compiled sass/js/images/fonts goes here
  - theme - use it for your source files
    - sass/settings folder will help you to setup params for your project

* **SASS** - try to divide your blocks into components

Commands
---------------
* ```npm run watch``` - start virtual server with browsersync proxy & live reload

* ```npm run production``` - build assets 

Actions
---------------
* ```after_body_open``` - right after BODY tag open;

* ```before_body_close``` - right before BODY tag close;


Wordpress Recommended plugins
---------------
List of plugins could be [found here](https://github.com/Ar-Mind/wordpress-plugins)


[Wordpress Templates Hierarchy](https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png)
---------------
![Wordpress Templates Hierarchy](https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png)