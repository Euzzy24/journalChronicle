<div class="upper d-flex bd-highlight mb-3  align-items-center">
    <h4 class="me-auto bd-highlight">Users</h4>
    <div class="d-flex align-items-center gap-2">
        <form class="bd-highlight align-self-center search m-0" action="<?php echo base_url(); ?>users" method="GET">
                    <div class="relative">
                        <input class="search-bar" name="query" type="text" placeholder="Search Users"/>
                    </div>
        </form>	
        <button id="add-user" class="btn button-gen">Add User</button>
</div>
</div>
<div class="d-flex" id="wrapper">
<table class="table table-hover separated-rows" style="margin: 5px 80px 20px 220px;" >
    <thead>
    <tr>
        <th scope="col">Complete Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <!-- <th scope="col">Status</th> -->
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['complete_name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php if ($user['role'] == 1){
            echo 'admin';}elseif ($user['role'] == 2){
                echo 'evaluator';}else{
                    echo 'viewer';
                } ?></td>
        <!-- <td><?php if ($user['status'] == 0){
        echo 'active';
        }else{
            echo 'Inactive';
        }
        
        ?></td> -->
    <td>
            <div style="display: flex; align-items: center;">
            <a style="margin-right: 10px;" onclick="openViewModal(<?php echo $user['userid']; ?>)" href="#" class="view-user" data-url="<?php echo base_url();?>users/user/<?php echo $user['userid'];?>">
                    <img style="height: 18px;" src="assets/images/icons/view.png" alt="View">
                </a>
                <a style="margin-right: 10px;" onclick="openEditUserModal(<?php echo $user['userid']; ?>)" href="#" class="edit-user" data-url="<?php echo base_url();?>users/user/<?php echo $user['userid'];?>">
                    <img style="height: 18px;" src="assets/images/icons/edit.png" alt="Edit">
                </a>
                <form action="<?php echo base_url('Users/delete_user/'.$user['userid']); ?>" method="post">
                <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                    <img style="height: 18px;" src="assets/images/icons/delete.png" alt="Delete">
                </button>
            </form>
            </div>
        </td>

    </tr>
    <div id="update_modal" class="update-pop user-<?php echo $user['userid']; ?> container mt-5">
    <div class="d-flex justify-content-center text-align-center pop-head">
        <h3>Update Profile </h3>
    </div>
    <div class="close-btn" onclick="closeEditUserModal(<?php echo $user['userid']; ?>)">&times;</div>
    <div class="row justify-content-center profile-div">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <form action="<?php echo base_url(); ?>users/update_user/<?php echo $user['userid']; ?>" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?php echo $user['userid']; ?>">
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="edit_pic_<?php echo $user['userid']; ?>" name="edit_pic" accept="image/*" style="display: none;">
                        <label for="edit_pic_<?php echo $user['userid']; ?>" class="profile-pic-label">
                            <img id="profile_preview_<?php echo $user['userid']; ?>" src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : 'assets/images/profile.png'; ?>" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="complete_name" name="complete_name" placeholder="Complete Name" value="<?php echo $user['complete_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $user['pword']; ?>" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="role" name="role" required>
                        <option value="admin" <?php echo ($user['role'] == '1') ? 'selected' : ''; ?>>Admin</option>
                        <option value="evaluator" <?php echo ($user['role'] == '2') ? 'selected' : ''; ?>>Evaluator</option>
                        <option value="viewer" <?php echo ($user['role'] == '3') ? 'selected' : ''; ?>>Viewer</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div  class="profile-pop show_profile-<?php echo $user['userid']; ?> container">
    <div class="d-flex justify-content-center text-align-center pop-head">
        <h3>Profile </h3>
    </div>
    <div class="close-btn" onclick="hide_profile(<?php echo $user['userid']; ?>)">&times;</div>
    <div class="row justify-content-center profile-div"> 
        <div class="col-md-6">
        <div class="mb-3 for-pic">
            <img id="profile_preview" src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : 'assets/images/profile.png'; ?>" alt="Profile Picture" class="profile-picture rounded-circle">
        </div>

            <div>
                Name: <?php echo strtoupper($user['complete_name']); ?><br>
                Email: <?php echo $user['email']; ?><br>
                Role: <?php if($user['role'] == 1){ echo 'Admin';
                }elseif ($user['role'] == 2){ echo 'Evaluator';}else{
                    echo 'Viewer';
                }?>
            </div>

        </div>
    </div>

</div>
    <?php endforeach; ?>
    </tbody>
</table>

</div>
<div class="add-pop container mt-5">
    <div class="d-flex justify-content-center text-align-center pop-head">
        <h3>Add User </h3>
    </div>
    <div class="close-btn">&times;</div>
    <div class="row justify-content-center profile-div">
        <div class="col-md-6">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            <?php echo form_open_multipart('Users/add_user'); ?>
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="profile_pic" name="profile_pic" accept="image/*" style="display: none;">
                        <label for="profile_pic" class="profile-pic-label">
                            <img id="profile_pic_preview" src="assets/images/profile.png" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="complete_name" name="complete_name" placeholder="Complete Name" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="role" name="role" required>
                        <option value="" disabled selected hidden>Choose a role</option>
                        <option value="admin">Admin</option>
                        <option value="evaluator">Evaluator</option>
                        <option value="viewer">Viewer</option>
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

<!-- 
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?> 
            <?php echo form_open_multipart('Users/update_user/'); ?>
                <div class="mb-3 for-pic">
                    <div class="profile-pic-picker">
                        <input type="file" id="profile_pic" name="profile_pic" accept="image/*" style="display: none;">
                        <label for="profile_pic" class="profile-pic-label">
                            <img id="profile_pic_preview" src="<?php echo $user['profile_pic']; ?>" alt="Profile Picture" class="profile-pic img-fluid rounded-circle">
                        </label>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="complete_name" name="complete_name" placeholder="Complete Name" value="<?php echo $user['complete_name']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3">
                    <select class="form-select" id="role" name="role" required>
                        <option value="admin" <?php echo ($user['role'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                        <option value="author" <?php echo ($user['role'] == 'author') ? 'selected' : ''; ?>>Author</option>
                        <option value="viewer" <?php echo ($user['role'] == 'viewer') ? 'selected' : ''; ?>>Viewer</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div> -->
