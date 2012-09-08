<h1><?php echo $title; ?></h1>
<p><?php echo $content; ?></p>

<?php

if(!empty($error)){
    
    echo '<p>The error was: '.$error.'</p>';
    
}