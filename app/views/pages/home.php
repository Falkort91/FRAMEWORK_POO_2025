<h2>Recent books</h2>
<ul>
    <?php foreach ($books as $book): ?>
        <li>
            
            <span class="font-semibold"><?php echo $book->title;?>:
        </span> <?php echo \Core\Helpers::truncate($book->resume, 30); ?>
        </li>
    <?php endforeach ?>
</ul>