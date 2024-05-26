
<table class="table table-hover"  style="margin-left:200px">
    <thead>
    <tr>
        <th scope="col">Volume Name</th>
        <th scope="col">Description</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($volumes as $volume): ?>
            <tr>
                <td><?php echo $volume['vol_name']; ?></td>
                <td><?php echo $volume['description']; ?></td>
                <?php if ($volume['published'] == 0): ?>
                    <td><?php echo "Unpublished" ?></td>
                <?php else: ?>
                    <td><?php echo "Published" ?></td>
                <?php endif; ?>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>
