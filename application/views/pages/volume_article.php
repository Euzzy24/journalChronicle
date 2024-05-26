<div class="container d-flex justify-content-end ml-5  ">
    <div class="col new-article mt-4 mb-5" style="margin-left: 150px; margin-right: 80px;">
    <h3 class="text-xl font-bold"><?php echo $volumes['vol_name']; ?></h3>
	<p class="text-sm">Description: <span><?php echo $volumes['description']; ?></span></p>

    <div class="d-flex" id="wrapper">
    <?php if (empty($volumes['articles'])): ?>
        <p class="mt-5 text-center">No articles found</p>
        <?php else: ?>
            <table class="table-hover table separated-rows" style="margin: 5px 80px 20px 220px;" >
            <thead class="table-dark">
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Keywords</th>
                <th scope="col">DOI</th>
                <th scope="col"></th>
                <!-- <th scope="col">Abstract</th> -->
                <!-- <th scope="col">Authors</th> -->
            </tr>
            </thead>
            <tbody>
            <?php foreach ($volumes['articles'] as $article): ?>
                    <tr>
                        <td><?php echo $article['title']; ?></td>
                        <td><?php echo $article['keywords']; ?></td>
                        <td><?php echo $article['doi']; ?></td>

                        <!-- <td><?php echo $article['abstract']; ?></td> -->
                        <!-- <td><?php echo isset($article['authors']) ? $article['authors'] : ''; ?></td> -->
                        <!-- <td><?php echo $article['filename']; ?></td> -->

                        <td>
                        <div style="display: flex; align-items: center;">
                        <a href="<?php echo base_url(); ?>view/article/<?php echo $article['articleid'];?>" style="margin-right: 10px;">
                            <img style="height: 18px;" src="<?php echo base_url('assets/images/icons/view.png'); ?>" alt="View">
                        </a>
                    </div>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    </div>
</div>

<!-- 
<div class="container volume-article" style="margin-left: 280px;">
    <div class="col">
<p class="text-xl font-bold"><?php echo $volumes['vol_name']; ?></p>
			<p class="text-sm"><?php echo $volumes['description']; ?></p>
    </div>
    <?php if (empty($volumes['articles'])): ?>
        <p class="mt-5 text-center">No articles found</p>
    <?php else: ?>
        <?php foreach ($volumes['articles'] as $article): ?>
					<div class="my-2">
						<div class="flex items-center justify-between">
							<div class="flex items-center justify-start ">
								<div class="leading-[18px]">
									<p class="text-medium"><a href="#"><?php echo $article['title'];?></a></p>
									<p class="font-light text-sm"><?php echo $article['doi']; ?></p>
								</div>
							</div>
							<a href="<?php echo base_url(); ?>admin/article/<?php echo $article['articleid'];?>">
								View Details
							</a>
						</div>
						<hr/>
					</div>
        <?php endforeach; ?>
    <?php endif; ?>
</div> -->