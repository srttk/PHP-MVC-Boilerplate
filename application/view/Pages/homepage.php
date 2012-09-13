<div class="row">
    <div class="span9">
    
        <h1>PHP MVC Boilerplate</h1>
        
        <p>The PHP MVC Boilerplate, is a lightweight framework that has some basic functionality added to setup a small website. Other than that there is nothing more than an MVC structure, routing and inflections implemented from various sources.</p>
        <p>Disclaimer: This project is  for educational/experimental use only, and is not intended to be used for production straight from the box.</p>
        
        <h2>Setup</h2>
        <p>Just enter your config details in config/config.php and call install.php to create the database tables to see the example site.</p>
        
        <h2>Usage</h2>
        <p>If you're already familiar with MVC frameworks, the majority of the structure should make sense. The only major thing to note is that PDO is used directly in the models and does not have a database abstraction layer.</p>
        
        <h3>Widgets</h3>
        <p>There is a convenient global function called <code>loadWidget();</code>.</p>
        <p>This function accepts two parameters;</p>
        <ol>
            <li>Widget name</li>
            <li>Optional parameters to be passed to the widgets method.</li>
        </ol>
        
        <p>This is handy for dynamic navigation or sidebar widgets. Just like the one you see to your right.</p>
    
    </div>
    <div class="span3"><?php loadWidget('news', array('limit' => '5')); ?></div>
</div>
