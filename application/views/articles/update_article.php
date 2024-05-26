<div class="container d-flex justify-content-end">
    <div class="col new-article mt-4 mb-5" style="margin-left: 150px; margin-right: 80px;">
        <h4>Edit Article</h4>
        <form action="<?php echo base_url(); ?>articles/update_article/<?php echo $article['articleid']; ?>" method="POST" enctype="multipart/form-data" style="padding: 25px 20px">
            <h6>Article Name</h6>
            <input type="text" class="form-control article" id="title" name="title" value="<?php echo $article['title']; ?>" placeholder="Article Name" required>
           
            <div class="mt-4">
                <h6>Select Volume</h6>
                <select class="form-select article" id="Volume" name="Volume" required>
                    <?php foreach ($volumes as $volume): ?>
                        <option value="<?php echo $volume['volumeid']; ?>">
                            <?php echo $volume['vol_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mt-4">
                <input class="form-control article mb-2" type="text" name="keywords" value="<?php echo $article['keywords']; ?>" placeholder="Keyword">
                <input class="form-control article mb-2" type="file" name="filename" value="<?php echo base_url('/public/articles/' . $article['filename']); ?>" placeholder="Filename">
                <input class="form-control article mb-2" type="text" name="doi" value="<?php echo $article['doi']; ?>" placeholder="DOI">
                <select class="form-control article mb-2" name="published">
                    <option value="1" <?php echo ($article['published'] == 1) ? 'selected' : ''; ?>>Published</option>
                    <option value="0" <?php echo ($article['published'] == 0) ? 'selected' : ''; ?>>Unpublished</option>
                </select>
            </div>
            
            <div class="mt-4">
                <h6>Abstract</h6>
                <textarea class="form-control article" name="abstract" id="editor1" placeholder="Add Abstract"><?php echo $article['abstract']; ?></textarea>
            </div>
           
            <div class="mt-4">
                <button type="submit" class="btn" style="background-color: black; color: aliceblue;">Update Article</button>
            </div>
        </form>
    </div>
</div>
