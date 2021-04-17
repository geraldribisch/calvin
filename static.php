    <!-- content
    ================================================== -->
    <section class="s-content">

        <div class="row">
            <div class="column large-12">
                <?php Theme::plugins('pageBegin') ?>

                
                <article class="s-content__entry">
                    <?php if ($page->coverImage()): ?>
                    <div class="s-content__media">
                        <div class="s-content__post-thumb">
                            <img src="<?php echo $page->coverImage() ?>" alt="<?php echo $page->title() ?>">
                        </div>
                    </div> <!-- end s-content__media -->
                    <?php endif ?>
                    
                    <div class="s-content__entry-header">
                        <h1 class="s-content__title"><?php echo $page->title(); ?></h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__page-content">
                            <?php echo $page->content() ?>
                        </div> <!-- end s-entry__page-content -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->