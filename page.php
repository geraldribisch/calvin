    <!-- content
    ================================================== -->
    <section class="s-content">

        <div class="row">
            <div class="column large-12">
                <?php Theme::plugins('pageBegin') ?>

                
                <article class="s-content__entry format-standard">
                    <?php if ($page->coverImage()): ?>
                    <div class="s-content__media">
                        <div class="s-content__post-thumb">
                            <img src="<?php echo $page->coverImage() ?>" alt="<?php echo $page->title() ?>">
                        </div>
                    </div> <!-- end s-content__media -->
                    <?php endif ?>
                    
                    <div class="s-content__entry-header">
                        <h1 class="s-content__title s-content__title--post"><?php echo $page->title(); ?></h1>
                    </div> <!-- end s-content__entry-header -->

                    <div class="s-content__primary">

                        <div class="s-content__entry-content">
                            <?php echo $page->content() ?>
                        </div> <!-- end s-entry__entry-content -->

                        <div class="s-content__entry-meta">

                            <div class="entry-author meta-blk">
                                <div class="author-avatar">
                                    <img class="avatar" src="<?php echo $page->user('profilePicture') ?>" alt="<?php $page->user('firstname').' '.$page->user('lastname') ?>">
                                </div>
                                <div class="byline">
                                    <span class="bytext">Posted By</span>
                                    <a href="#0"><?php echo $page->user('firstname').' '.$page->user('lastname') ?></a>
                                </div>
                            </div>

                            <div class="meta-bottom">
                                
                                <div class="entry-cat-links meta-blk">
                                    <?php if ($page->category()): ?>
                                    <div class="cat-links">
                                        <span>In</span> 
                                        <a href="<?php echo $page->categoryPermalink() ?>"><?php echo $page->category() ?></a>
                                    </div>
                                    <?php endif ?>

                                    <span>On</span>
                                    <?php echo $page->date() ?>
                                </div>                                
                                
                                <?php if(!empty($page->tags($returnsArray))): ?>
                                <div class="entry-tags meta-blk">
                                    <span class="tagtext">Tags</span>
                                    <?php
                                        $returnsArray = true;

                                        $items = $page->tags($returnsArray);

                                        foreach ($items as $tagKey=>$tagName) {
                                            $tag = new Tag($tagKey);

                                            echo '<a href="'.$tag->permalink().'">'.$tag->name().'</a>';
                                        }
                                    ?>
                                </div>
                                <?php endif ?>

                            </div>

                        </div> <!-- s-content__entry-meta -->

                        <div class="s-content__pagenav">
                            <?php if ($page->previousKey()): $previousPage = buildPage($page->previousKey()); ?>
                            <div class="prev-nav">
                                <a href="<?php echo $previousPage->permalink(); ?>" rel="prev">
                                    <span>Previous</span>
                                        <?php echo $previousPage->title(); ?>                                
                                </a>
                            </div>
                            <?php endif ?>
                            <?php if ($page->nextKey()): $nextPage = buildPage($page->nextKey()); ?>
                            <div class="next-nav">
                                <a href="<?php echo $nextPage->permalink(); ?>" rel="next">
                                    <span>Next</span>
                                        <?php echo $nextPage->title(); ?>                                
                                </a>
                            </div>
                            <?php endif ?>
                         </div> <!-- end s-content__pagenav -->

                    </div> <!-- end s-content__primary -->
                </article> <!-- end entry -->

            </div> <!-- end column -->
        </div> <!-- end row -->

    </section> <!-- end s-content -->