<div class="container d-flex justify-content-end ml-5  ">
    <div class="col new-article mt-4 mb-5" style="margin-left: 150px; margin-right: 80px;">
        <h4>Add New Article</h4>
        <form action="<?php echo base_url(); ?>articles/add_article" method="POST" enctype="multipart/form-data" style="padding: 25px 20px">
            <h6>Article Name</h6>
            <input type="text" class="form-control article" id="title" name="title" placeholder="Article Name" required>
           
            <div class="mt-4">
                <h6>Select Volume</h6>
                <select class="form-select article" id="volume" name="Volume" required>
                    <?php foreach ($volumes as $volume): ?>
                        <option value="<?php echo $volume['volumeid']; ?>">
                            <?php echo $volume['vol_name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <!-- <div class="mt-4">
                <h6>Select Authors</h6>
                <div>
                    <?php foreach ($authors as $author): ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="authors" value="<?php echo $author['auid']; ?>" id="author<?php echo $author['auid']; ?>">
                            <label class="form-check-label" for="author<?php echo $author['auid']; ?>">
                                <?php echo $author['author_name']; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div> -->

            <div class="mt-4">
                <input class="article input-pad" type="text" name="keywords" placeholder="Keyword">
                <input class="article input-pad" type="file" name="filename" placeholder="Filename">
                <input class="article input-pad" type="text" name="doi" placeholder="DOI">
                <select class="article input-pad" name="published">
                    <option value="1">Published</option>
                    <option value="0">Unpublished</option>
                </select>
            </div>
            
            
            <div class="mt-4">
                <h6>Abstract</h6>
                <textarea class="article" name="abstract" id="editor1" placeholder="Add Abstract"></textarea>
            </div>
           
            <div class="mt-4">
                <button type="submit" class="btn" style="background-color: black; color: aliceblue;">Add Article</button>
            </div>
        </form>
    </div>
</div>
