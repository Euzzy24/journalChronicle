<!-- 
<table class="table table-hover" style="margin-left: 200px;">
    <thead>
    <tr>
        <th scope="col">Complete Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['complete_name']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['role']; ?></td>
        <td><?php if ($user['status'] == 0){
        echo 'active';
        }else{
            echo 'Inactive';
        }
        
        ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table> -->
