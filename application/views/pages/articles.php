<div class="container-fluid d-flex flex-wrap justify-content-around">
	<?php
    	function limit_words($text, $limit) {
			$words = explode(' ', $text);
			if (count($words) > $limit) {
				return implode(' ', array_slice($words, 0, $limit)) . '...';
			}
			return $text;
		}
			// $articlesByVolume = array();

			// foreach ($articles as $article) {
			// 	$volumeid = $article['volumeid'];

			// 	if (!isset($articlesByVolume[$volumeid])) {
			// 		$articlesByVolume[$volumeid] = array();
			// 	}

			// 	$articlesByVolume[$volumeid][] = $article;
			// }

			// print_r($articlesByVolume);
	?>

    <div class="d-flex m-3">
        <div class="col-md-6 mr-auto p-2 main-container" style="width: 1000px;">
        <form class="d-flex mt-2 mb-3 ml-auto search m-0" action="<?php echo base_url(); ?>view/public_article" method="GET">
				<div class="relative">
					<input class="search-bar" name="query" type="text" placeholder="Search Articles"/>
				</div>
	    </form>
            <?php
            $counter = 0; // Initialize counter
            ?>
            <div class="row">
                <?php foreach ($articles as $article): ?>
                    <?php if ($counter > 0 && $counter % 2 == 0): ?>
                        </div><div class="row">
                    <?php endif; ?>
                    <div class="col-md-6">
                        <div class="card mb-3 by_article">
                            <div class="card-body">
                                <div class="volume-image">
                                    <img src="<?php echo base_url('assets/images/journalChronicle.png') ?>" alt="">
                                </div>
                                <h5 class="card-title"><?php echo $article['title']; ?></h5>
                                <p class="card-text"><?php echo $article['keywords']; ?></p>
                                <div class="abstract">
                                    <p class="card-text"><?php echo limit_words($article['abstract'], 30); ?></p>
                                </div>
                                <div class="read-more">
                                    <a href="<?php echo base_url(); ?>view/article/<?php echo $article['articleid']; ?>">Read Article</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $counter++;
                    ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-md-2 p-2 justify-content-end">
            <div id="volume">
                <h6>Available Volumes</h6>
            </div>
            <?php foreach ($volumes as $volume): ?>
                <div class="volume-name">
                    <a style="color: #13305B;" href="<?php echo base_url(); ?>view/article_vol/<?php echo $volume['volumeid']; ?>"><?php echo $volume['vol_name']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
