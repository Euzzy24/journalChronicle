<div class="upper d-flex bd-highlight mb-3  align-items-center">
    <div class="p-5">
        <h3 class="text-xl font-bold mt-4">Assign Author</h3>
        <p class="text-sm">Assign new author to this article</p>
    </div>
    <hr/>
</div>
<div class="form-container d-flex align-items-center">
    <form action="<?php echo base_url(); ?>article/assign_auth/<?php echo $id; ?>" method="POST">
        <div>
            <label for="author_id" class="font-medium mb-2 block">Author</label>
            <select name="author_id" id="author_id" class="select">
                <?php foreach ($authors as $author): ?>
                    <option value="<?php echo $author['auid']; ?>"><?php echo $author['author_name']; ?></option>
                <?php endforeach; ?>
            </select>
            <?php echo form_error('auid', '<div class="error">', '</div>'); ?>
        </div>
        <div class="upper">
            <button type="submit" class="bd-highlight btn button-gen m-0">Submit</button>
        </div>
    </form>
</div>
