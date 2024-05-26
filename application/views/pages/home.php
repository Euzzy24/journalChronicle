
<div class="m-5">
	<?php
			$articlesByVolume = array();

			foreach ($articles as $article) {
				$volumeid = $article['volumeid'];

				if (!isset($articlesByVolume[$volumeid])) {
					$articlesByVolume[$volumeid] = array();
				}

				$articlesByVolume[$volumeid][] = $article;
			}

			// print_r($articlesByVolume);
	?>



<div class="m-5">
    <ul>
        <?php foreach ($articlesByVolume as $volumeId => $articles): ?>
            <li>
                <h3>Volume <?php echo $volumeId; ?></h3>
                <div class="row">
                    <?php foreach ($articles as $article): ?>
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
								<h5 class="card-title"><?php echo $article['title']; ?></h5>
                            	<p class="card-text"><?php echo $article['keywords']; ?></p>
								<p class="card-text"><?php echo $article['abstract']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
