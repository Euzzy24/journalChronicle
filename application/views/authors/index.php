<div class="upper d-flex bd-highlight mb-3  align-items-center">
    <h4 class="me-auto bd-highlight">Authors</h4>
    <div class="d-flex align-items-center gap-2">
        <form class="bd-highlight align-self-center search m-0" action="<?php echo base_url(); ?>authors" method="GET">
                    <div class="relative">
                        <input class="search-bar" name="query" type="text" placeholder="Search Authors"/>
                    </div>
        </form>	
        <button id="add-author" class="btn button-gen">Add Author</button>
</div>
</div>
<div class="d-flex" id="wrapper">
<table class="table table-hover separated-rows" style="margin: 5px 80px 20px 220px;">
    <thead>
    <tr>
        <th scope="col">Author Name</th>
        <th scope="col">author_email</th>
        <th scope="col">Contact Number</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($authors as $author): ?>
    <tr>
        <td><?= $author['author_title'] . $author['author_name'] ?></td>
        <td><?php echo $author['author_email']; ?></td>
        <td><?php echo $author['author_contact']; ?></td>
        <td>
            <div style="display: flex; align-items: center;">
            <a style="margin-right: 10px;" onclick="openViewModal(<?php echo $author['auid']; ?>)" href="#" class="view-user" data-url="<?php echo base_url();?>author/index/<?php echo $author['auid'];?>">
                    <img style="height: 18px;" src="assets/images/icons/view.png" alt="View">
                </a>
                <a style="margin-right: 10px;" onclick="openEditUserModal(<?php echo $author['auid']; ?>)" href="#" class="edit-user" data-url="<?php echo base_url();?>authors/index/<?php echo $author['auid'];?>">
                    <img style="height: 18px;" src="assets/images/icons/edit.png" alt="Edit">
                </a>
                <form action="<?php echo base_url('authors/delete_author/'.$author['auid']); ?>" method="post">
                <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                    <img style="height: 18px;" src="assets/images/icons/delete.png" alt="Delete">
                </button>
            </form>
            </div>
        </td>
    </tr>
    <div  class="profile-pop show_profile-<?php echo $author['auid']; ?> container">
    <div class="d-flex justify-content-center text-align-center pop-head">
        <h3>Profile </h3>
    </div>
    <div class="close-btn" onclick="hide_profile(<?php echo $author['auid']; ?>)">&times;</div>
    <div class="row justify-content-center profile-div">
        <div class="col-md-6">
        <div class="mb-3 for-pic">
            <img id="profile_preview" src="<?php echo !empty($author['author_image']) ? $author['author_image'] : 'assets/images/profile.png'; ?>" alt="Profile Picture" class="profile-picture rounded-circle">
        </div>

            <div>
                Name: <?= $author['author_title'] . $author['author_name'] ?><br>
                Email: <?php echo $author['author_email']; ?><br>
                Contact: <?php echo $author['author_contact']; ?><br>
            </div>

        </div>
    </div>
    </div>
    <div id="update_modal" class="update-pop user-<?php echo $author['auid']; ?> container mt-5">
    <div class="d-flex justify-content-center text-align-center pop-head">
        <h3>Edit Profile </h3>
    </div>
    <div class="close-btn" onclick="closeEditUserModal(<?php echo $author['auid']; ?>)">&times;</div>
    <div class="row justify-content-center profile-div">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <form action="<?php echo base_url(); ?>authors/update_author/<?php echo $author['auid']; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $author['auid']; ?>">
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="edit_pic_<?php echo $author['auid']; ?>" name="edit_pic" accept="image/*" style="display: none;">
                        <label for="edit_pic_<?php echo $author['auid']; ?>" class="profile-pic-label">
                            <img id="profile_preview_<?php echo $author['auid']; ?>" src="<?php echo !empty($author['author_image']) ? $author['author_image'] : 'assets/images/profile.png'; ?>" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Complete Name" value="<?php echo $author['author_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="author_email" name="author_email" placeholder="Email" value="<?php echo $author['author_email']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="author_password" name="author_password" placeholder="Password" value="<?php echo $author['pword']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="" class="form-control" id="author_contact" name="author_contact" placeholder="Contact Number" value="<?php echo $author['author_contact'];?>" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="title" name="author_title" required>
                        <option value="" disabled selected hidden>Title</option>
                        <option value="Ms." <?php echo ($author['author_title'] == 'Ms.') ? 'selected' : ''; ?>>Ms.</option>
                        <option value="Mrs." <?php echo ($author['author_title'] == 'Mrs.')? 'selected' : ''; ?>>Mrs.</option>
                        <option value="Mr." <?php echo ($author['author_title'] == 'Mr.')? 'selected': ''; ?>>Mr.</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
    <?php endforeach; ?>
    </tbody>
</table>

<div class="add-auth container mt-5">
    <div class="d-flex justify-content-center text-align-center pop-head">
        <h3>Add Author</h3>
    </div>
    <div class="close-btn">&times;</div>
    <div class="row justify-content-center profile-div">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_open_multipart('Authors/add_author'); ?>
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="profile_pic" name="profile_pic" accept="image/*" style="display: none;">
                        <label for="profile_pic" class="profile-pic-label">
                            <img id="profile_pic_preview" src="assets/images/profile.png" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="author_name" name="author_name" placeholder="Complete Name" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="title" name="author_title" required>
                        <option value="" disabled selected hidden>Title</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Mr.">Mr.</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="author_email" name="author_email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="author_password" name="author_password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <input type="" class="form-control" id="author_contact" name="author_contact" placeholder="Contact Number" required>
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>