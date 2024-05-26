<div class="upper d-flex bd-highlight mb-3  align-items-center">
    <h4 class="me-auto bd-highlight">Volumes</h4>
    <div class="d-flex align-items-center gap-2">
        <form class="bd-highlight align-self-center search m-0" action="<?php echo base_url(); ?>volumes" method="GET">
                    <div class="relative">
                        <input class="search-bar" name="query" type="text" placeholder="Search Volumes"/>
                    </div>
        </form>	
        <button class="btn button-gen" onclick="window.location.href='<?php echo base_url('new_volume')?>'">Add Volume</button>
</div>
</div>
<div class="d-flex" id="wrapper">
<table class="table table-hover separated-rows" style="margin: 5px 80px 20px 220px;" >
    <thead>
    <tr>
        <th scope="col">Volume Name</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
        <!-- <th scope="col">Archive</th> -->
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($volumes as $volume): ?>
            <tr>
                <td><?php echo $volume['vol_name']; ?></td>
                <td><?php echo $volume['description']; ?></td>
                <?php if ($volume['published'] == 0): ?>
                    <td><?php echo "Unpublished" ?></td>
                <?php elseif($volume['published'] == 1): ?>
                    <td><?php echo "Published" ?></td>
                <?php endif; ?>
                </td>
                <td>
                    <div style="display: flex; align-items: center;">
                    <!-- <a style="margin-right: 10px;" onclick="openViewModal(<?php echo $volume['volumeid']; ?>)" href="#" class="view-user" data-url="<?php echo base_url();?>volumes/index/<?php echo $volume['volumeid'];?>">
                            <img style="height: 18px;" src="assets/images/icons/view.png" alt="View">
                        </a> -->
                        <a style="margin-right: 10px;" href="<?php echo base_url();?>volumes/view_volume/<?php echo $volume['volumeid']?>" class="view-user">
                            <img style="height: 18px;" src="assets/images/icons/view.png" alt="View">
                        </a>
                        <a style="margin-right: 10px;" href="<?php echo base_url();?>volumes/edit_vol/<?php echo $volume['volumeid'];?>">
                            <img style="height: 18px;" src="assets/images/icons/edit.png" alt="Edit">
                        </a>
                        <form action="<?php echo base_url('Volumes/delete_vol/'.$volume['volumeid']); ?>" method="post">
                        <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                            <img style="height: 18px;" src="assets/images/icons/delete.png" alt="Delete">
                        </button>
                    </form>
                    </div>
                </td>

            </tr>
            <div id="update_modal" class="update-pop user-<?php echo $volume['volumeid']; ?> container mt-5">
                <div class="close-btn" onclick="closeEditUserModal(<?php echo $volume['volumeid']; ?>)">&times;</div>
                <h1 class="text-center">Edit User</h1>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                        <form action="<?php echo base_url(); ?>volumes/update_vol/<?php echo $volume['volumeid']; ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="user_id" value="<?php echo $volume['volumeid']; ?>">
                            <div class="mb-3">
                                <input type="text" class="form-control" id="vol_name" name="vol_name" placeholder="Volume Name" value="<?php echo $volume['vol_name']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" id="vol_desc" name="vol_desc" placeholder="vol_desc" value="<?php echo $volume['description']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" id="status" name="status" required>
                                    <option value="1" <?php echo ($volume['published'] == '1') ? 'selected' : ''; ?>>Published</option>
                                    <option value="0" <?php echo ($volume['published'] == '0') ? 'selected' : ''; ?>>Unpublished</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div  class="profile-pop show_profile-<?php echo $volume['volumeid']; ?> container">
                <div class="close-btn" onclick="hide_profile(<?php echo $volume['volumeid']; ?>)">&times;</div>
                <h3>Volume Details</h3>
                <div class="row"> 
                    <div class="col-md-6">
                        <div>
                            Volume: <?php echo strtoupper($volume['vol_name']); ?><br>
                            Description: <?php echo $volume['description']; ?><br>
                            Status: <?php if($volume['published'] == 1){ echo 'Published';
                            }else{
                                echo 'Unpublished';
                            }?>
                        </div>

                    </div>
                </div>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="add-pop container mt-5">
    <div class="close-btn">&times;</div>
    <h1 class="text-center">Add Volume</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_open_multipart('Volumes/add_vol'); ?>
                <div class="mb-3">
                    <input type="text" class="form-control" id="vol_name" name="vol_name" placeholder="Volume Name" required>
                </div>
                <div class="mb-3">
                    <textarea name="vol_desc" placeholder="volume description" id="editor1"></textarea>
                    <!-- <input type="text" class="form-control" id="vol_desc" name="vol_desc" placeholder="volume description" required> -->
                </div>
                <div class="mb-3">
                    <select class="form-select" id="status" name="status" required>
                        <option value="" disabled selected hidden>Status</option>
                        <option value="1">Published</option>
                        <option value="0">Unpublished</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
</div>
</div>
