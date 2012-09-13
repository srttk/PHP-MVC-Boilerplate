PHP MVC Boilerplate
===================

The PHP MVC Boilerplate, is a lightweight framework 
that has some basic functionality added to setup a small 
website. Other than that there is nothing more than an 
MVC structure, routing and inflections implemented from 
various sources.

### Setup

To see the project running add your database details 
in /config/config.php, upload to your server and call 
yoursite.com/install.php. This will setup the example 
tables in your database.

### Usage

If you're already familiar with MVC frameworks, the majority 
of the structure should make sense. The major thing to 
note is that PDO is used directly in the models and does not 
have a database abstraction layer. Also, there is hardly 
any exception handling...

It's a lightweight boilerplate!!! What do you want from me?! ;)

### Widgets

There is a convenient global function called load_widget. 
This is handy for navigation or sidebar widgets and 
is handled by the WidgetsController.

This function accepts two parameters;

- Widget name.
- Optional parameters to be passed to the widgets method.

Example of use in view;

    <?php loadWidget('news', array('limit' => '5')); ?>

### Credits

Inspiration and some snippets taken from; CakePHP, 
Sitepoint, anantgarg.com and kuwamoto.org.

### Disclaimer

This is a framework for experimental/educational 
purposes only and is not intended for production use. There 
are many professional, popular, community-led frameworks out there. 

That said... Hopefully it is of some use or help to someone. If not 
then make a branch! Expand it! Make it better! That is what it is all about!
