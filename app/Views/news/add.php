<div class="form_div">
    <?php if(!empty($article['id'])): ?>
    <form id="form" method="post" action="/news/edit">  
    <?php else: ?>  
    <form id="form" method="post" action="/news/add">    
    <?php endif ?>
        <?php if(!empty($article['id'])): ?>
            <input type="hidden" name="id" value="<?= $article['id'] ?>" />
        <?php endif ?>
        <p>Title:</p>
        <input type="text" name="title" value="<?= empty($article['title']) ? '' : $article['title'] ?>" />
        <p>Body:</p>
        <textarea type="text" name="body" ><?= empty($article['body']) ? '' : $article['body'] ?></textarea>
        <br/>
        <div class="button" onClick="submit()" />Submit</div>
    </form>
</div>

<script>
    function submit(){
        if(document.getElementsByName("title")[0].value==''||document.getElementsByName("body")[0].value==''){
            alert("please full up this form.");
        }else{
            document.getElementById('form').submit();
        }

    }
</script>