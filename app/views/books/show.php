<h2 class="text-2xl font-bold"><?php echo $book->title ?></h2>
<div>
    <?php echo $book->resume ?>
</div>
<ul class="py-2 border-t-2 border-b-2 border-gray-400">
    <li>Author : <?php echo $book->author->firstname; ?> <?php echo $book->author->lastname; ?></li>
    <li>ISBN: <?php echo $book->isbn ?></li>
    <li>Category: <?php echo $book->category->name?></li>
</ul>
