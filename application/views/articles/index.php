<div class="upper d-flex bd-highlight mb-3  align-items-center">
    <h4 class="me-auto bd-highlight">Articles</h4>
    <div class="d-flex align-items-center gap-2 ">
    <form class="bd-highlight align-self-center search m-0" action="<?php echo base_url(); ?>articles" method="GET">
				<div class="relative">
					<input class="search-bar" name="query" type="text" placeholder="Search Articles"/>
				</div>
	</form>	
    <button class="bd-highlight btn button-gen m-0" onclick="window.location.href='<?php echo base_url('new_article')?>'">Add Article</button>

    </div>
   
</div>
<div class="d-flex" id="wrapper">
<table class="table-hover table separated-rows" style="margin: 5px 80px 20px 220px;" >
    <thead class="table-dark">
    <tr>
        <th scope="col">Title</th>
        <th scope="col">Keywords</th>
        <th scope="col">DOI</th>
        <th scope="col">Volume</th>
        <th scope="col">Status</th>
        <!-- <th scope="col">Abstract</th> -->
        <!-- <th scope="col">Authors</th> -->
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($articles as $article): ?>
         <?php // if ($article['published'] == 1): ?>
            <tr>
                <td><?php echo $article['title']; ?></td>
                <td><?php echo $article['keywords']; ?></td>
                <td><?php echo $article['doi']; ?></td>
                <td><?php echo $article['vol_name']; ?></td>
                <td><?php if ($article['published'] == 1){
                    echo "Published";
                } else {echo "Unpublished";
                } ?></td>
                <!-- <td><?php echo $article['abstract']; ?></td> -->
                <!-- <td><?php echo isset($article['authors']) ? $article['authors'] : ''; ?></td> -->
                <!-- <td><?php echo $article['filename']; ?></td> -->

                <td>
                <div style="display: flex; align-items: center;">
                <a href="<?php echo base_url(); ?>articleauthor/<?php echo $article['articleid'];?>" style="margin-right: 10px;">
                    <img style="height: 18px;" src="<?php echo base_url('assets/images/icons/add_auth.png'); ?>"  alt="View">
                </a>
                <a href="<?php echo base_url(); ?>view_article/<?php echo $article['articleid'];?>" style="margin-right: 10px;">
                    <img style="height: 18px;" src="assets/images/icons/view.png" alt="View">
                </a>
                <a href="<?php echo base_url(); ?>articles/edit_article/<?php echo $article['articleid'];?>">
                    <img style="height: 18px;" src="assets/images/icons/edit.png" alt="Edit">
                </a>
                <form action="<?php echo base_url('Articles/delete_article/'.$article['articleid']); ?>" method="post">
                <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                    <img style="height: 18px;" src="assets/images/icons/delete.png" alt="Delete">
                </button>
            </form>
            </div>
                </td>
            </tr>
        <?php //endif; ?>
    <?php endforeach; ?>
    </tbody>
</table>
