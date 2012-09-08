<aside class="news-widget">
    <h1>News Widget</h1>
    <ul>
    <?php foreach ($news_items as $news_item): ?>
        <li><a href="/news/view_article/<?php echo $news_item['id']; ?>"><?php echo $news_item['title']; ?></a></li>
    <?php endforeach; ?>
    </ul>
</aside>