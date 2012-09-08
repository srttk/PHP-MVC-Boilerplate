<ul class="nav">
    <?php foreach ($nav_items as $nav_item): ?>
       <li<?php echo ($nav_item['active']) ? ' class="active"' : '' ; ?>><a href="<?php echo $nav_item['url']; ?>"><?php echo $nav_item['title']; ?></a></li>
    <?php endforeach; ?>
</ul>