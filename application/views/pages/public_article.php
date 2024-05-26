<div class="container d-flex justify-content-end ml-5  ">
    <div class="col new-article mt-4 mb-5" style="margin-left: 150px; margin-right: 80px;">
	<div class="p-6">
    <div>
        <a href="<?php echo base_url('pages/articles') ?>">
            <img style="height: 18px;" src="<?php echo base_url('assets/images/icons/back.png'); ?>" alt="Edit">
            Back to Home
        </a>

    </div>
		<div class="mt-4 flex items-center justify-between text-center">
			<div class="items-center text-center">
				<h2><?php echo $articles['title']; ?></h2>
			</div>
			<a href="<?php echo base_url('/public/articles/' . $articles['filename']); ?>"> View PDF</a>
		</div>
	</div>
	<hr/>
	<div class="p-6">
		<div class="mb-5">
			<p class="text-xl font-bold">Abstract</p>
            <div class="abstract">
                <p class="text-justify my-2" style="text-indent: 24px; text-align: justify;"><?php echo $articles['abstract']; ?></p>
            </div>
			<p class=""><span class="font-medium">Keywords: </span><?php echo $articles['keywords']; ?></p>
			<div>
            <p class=""><span class="font-medium">DOI: </span><?php echo $articles['doi'];?></p>
			</div>
			<div>
            <p class=""><span class="font-medium">Volume: </span><?php echo $volumes['vol_name'];?></p>
			</div>
            <div>
            <p class=""><span class="font-medium">Status: </span><?php echo ($articles['published'] == 1) ? "Published" : "Unpublished"; ?></p>
            </div>
		</div>
		<div class="mb-5">
			<p class="text-[#4F545A]">Authors</p>
			<?php if (!empty($articles['authors'])): ?>
				<?php foreach ($articles['authors'] as $author): ?>
				<div class=" d-flex flex align-items-center gap-3">
						<?php if (isset($author['author_image'])): ?>
								<img class="author-pic" src="<?php echo base_url()?><?php echo $author['author_image']; ?>" alt="<?php echo $author['author_name'];?>" />
		
						<?php else: ?>
								<img class="author-pic" src="<?php echo base_url()?>assets/images/profile.png" alt="<?php echo $author['author_name'];?>" />
						<?php endif; ?>
                        <h6><em><?php echo $author['author_name'];?></em></h6>
				</div>
				<?php endforeach; ?>
			<?php else: ?>
				<p>No Assigned Authors</p>
			<?php endif; ?>
		</div>
	</div>
    </div>
</div>
