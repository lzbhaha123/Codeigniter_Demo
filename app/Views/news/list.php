<div class="m10">
    <a href="/news/add"><div class="button block">Add new article</div></a>
</div>
<?php foreach ($list as $n): ?>
    
<div class="item">
    <div><a href="/news/<?= esc($n['id']) ?>"><?= esc($n['title']) ?></a></div>
    <div><a href="/news/edit/<?= esc($n['id']) ?>"><div class="button">Edit</div></a></div>
    <div><a href="/news/drop/<?= esc($n['id']) ?>"><div class="button">Delete</div></a></div>
    
</div>

<?php endforeach ?>