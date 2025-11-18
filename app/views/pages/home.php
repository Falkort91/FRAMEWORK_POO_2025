<h2>Recent books</h2>
<ul>
    <?php foreach($books as $book):?>
    <li >
       <span class="font-semibold"><?php echo $book['title'];?></span> : <?php echo $book['resume'];?>
    </li>
    <?php endforeach?>
</ul>