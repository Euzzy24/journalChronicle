<div class="container col">
    <div class="upper d-flex bd-highlight mb-3  align-items-center">
        <h4 class="me-auto bd-highlight">Articles</h4>
    </div>
    <div class="back upper d-flex bd-highlight mb-3  align-items-center">
        <a class="me-auto bd-highlight" href="<?php echo base_url('articles') ?>">
            <img style="height: 18px;" src="<?php echo base_url('assets/images/icons/back.png'); ?>" alt="Edit">
            Back to Articles
        </a>
        <button class="bd-highlight btn button-gen m-0" onclick="window.location.href='<?php echo base_url(); ?>newauthor/<?php echo $id;?>'">
            <img style="height: 18px;" src="<?php echo base_url('assets/images/icons/add_auth.png'); ?>" alt="Add Author">Assign Authors
        </button>

    </div>
    <div class="d-flex" id="wrapper">
        <table  class="table-hover table separated-rows" style="margin: 5px 80px 20px 220px;">
            <thead>
                <tr class="row-border">
                    <th scope="col" class="px-6 py-4 font-extrabold text-[#0D2015]">Name</th>
                    <th scope="col" class="px-12 py-4 font-extrabold text-[#0D2015]">Contact</th>
                    <th scope="col" class="px-12 py-4 font-extrabold"></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($articleauthors as $articleauthor): ?>
                <tr class="row-border">
                    <td class="flex d-flex items-center gap-3 px-6 py-4 font-normal">
                    <img
                        class="author-pic"
                        src="<?php echo !empty($articleauthor['author']['author_image']) ? base_url($articleauthor['author']['author_image']) : base_url('assets/images/profile.png'); ?>"
                        alt=""
                    />

                        <div>
                            <div class="font-medium leading-4">
                            <?php echo  $articleauthor['author']['author_title']; ?> <?php echo  $articleauthor['author']['author_name']; ?>
                            </div>
                            <div class="text-sm text-[#5F6061]"><?php echo  $articleauthor['author']['author_email']; ?></div>
                        </div>
                    </td>
                    <td class="px-12 py-4"><?php echo  $articleauthor['author']['author_contact']; ?></td>
                    <td class="gap-2">
                        <div class="flex justify-end gap-4">
                           <a style="margin-right: 10px;">
                                <img style="height: 18px;" src="<?php echo base_url('assets/images/icons/view.png'); ?>" alt="View">
                            </a>
                            <a>
                                <img style="height: 18px;" src="<?php echo base_url('assets/images/icons/edit.png'); ?>" alt="Edit">
                            </a>
                            <a href="<?php echo base_url('articleauth/'.$articleauthor['article_id'].'/author/delete/'.$articleauthor['id']); ?>">
                                <img style="height: 18px;" src="<?php echo base_url('assets/images/icons/delete.png'); ?>" alt="Delete">
                            </a>

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>