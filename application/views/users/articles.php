
<table class="table table-hover"  style="margin-left:200px">
    <thead>
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Keyword</th>
        <th scope="col">Abstract</th>
        <th scope="col">File Name</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
        <?php if ($article['published'] == 0): ?>
            <tr>
                <td><?php echo $article['title']; ?></td>
                <td><?php echo $article['keywords']; ?></td>
                <td><?php echo $article['abstract']; ?></td>
                <td><?php echo $article['filename']; ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>
