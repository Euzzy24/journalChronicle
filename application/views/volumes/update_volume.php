<div class="container d-flex justify-content-end">
    <div class="col new-article mt-4 mb-5" style="margin-left: 150px; margin-right: 80px;">
        <h4>Edit Volume</h4>
        <form action="<?php echo base_url('Volumes/update_vol/' . $volumes['volumeid']); ?>" method="POST" enctype="multipart/form-data" style="padding: 25px 20px">
            <h6>Volume Name</h6>
            <input type="text" class="form-control article" id="vol_name" name="vol_name" placeholder="Volume Name" value="<?php echo $volumes['vol_name']; ?>" required>

            <div class="mt-4">
                <select class="article input-pad" name="status">
                    <option value="1" <?php echo ($volumes['published'] == '1') ? 'selected' : ''; ?>>Published</option>
                    <option value="0" <?php echo ($volumes['published'] == '0') ? 'selected' : ''; ?>>Unpublished</option>
                </select>
            </div>
            
            <div class="mt-4">
                <h6>Volume Description</h6>
                <textarea class="article form-control" name="vol_desc" id="editor1" placeholder="Add Description"><?php echo $volumes['description']; ?></textarea>
            </div>
           
            <div class="mt-4">
                <button type="submit" class="btn" style="background-color: black; color: aliceblue;">Update Volume</button>
            </div>
        </form>
    </div>
</div>
