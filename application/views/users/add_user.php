<div class="container mt-5">
    <h1 class="text-center">Add User</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="<?php echo base_url('Users/add_user'); ?>" method="POST">
                <div class="mb-3">
                    <label for="complete_name" class="form-label">Complete Name:</label>
                    <input type="text" class="form-control" id="complete_name" name="complete_name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="border: 1px; background-color:black; color:aliceblue">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
