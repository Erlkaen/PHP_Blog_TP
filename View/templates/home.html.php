<!-- BEGIN : home.html.php -->
<?php foreach ($articles as $article) : ?>
    <div>
        <h2><?= $article->getTitle() ?></h2>
        <p><?= $article->getHead() ?></p>
        <p><a class="btn btn-default" href="index.php?page=article&id=<?= $article->getId() ?>" role="button">View details &raquo;</a></p>
    </div>
<?php endforeach; ?>

<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
<!-- END : home.html.php -->