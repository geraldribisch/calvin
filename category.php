<?php
    // Check if the user is browsing a category
    if ($WHERE_AM_I=='category') {
        // Get the category key from the URL
        $categoryKey = $url->slug();

        // Create the Category-Object
        $category = new Category($categoryKey);  
    }
?>

    <?php if (empty($content)): ?>
        <div>
            <?php $language->p('No pages found') ?>
        </div>
    <?php endif ?>
    
    <!-- content
    ================================================== -->
    <section class="s-content">


        <!-- page header
        ================================================== -->
        <div class="s-pageheader">
            <div class="row">
                <div class="column large-12">
                    <h1 class="page-title">
                        <span class="page-title__small-type">Category</span>
                        <?php echo $category->name(); ?>
                        <span class="page-title__small-type"><?php echo $category->description(); ?></span>
                    </h1>
                </div>
            </div>
        </div> <!-- end s-pageheader-->


        <!-- masonry
        ================================================== -->
        <div class="s-bricks">

            <div class="masonry">
                <div class="bricks-wrapper h-group">

                    <div class="grid-sizer"></div>

                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
    
                    <!-- Articles -->
	                <?php foreach ($content as $page): ?>
                    <article class="brick entry" data-aos="fade-up">
                        
                    <?php if ($page->coverImage()): ?>
                        <div class="entry__thumb">
                            <a href="<?php echo $page->permalink() ?>" class="thumb-link">
                                <img src="<?php echo $page->thumbCoverImage() ?>" 
                                     srcset="<?php echo $page->coverImage() ?> 1x" alt="<?php echo $page->title() ?>">
                            </a>
                        </div> <!-- end entry__thumb -->
                    <?php endif ?>
                        
                        <div class="entry__text">
                            <div class="entry__header">
                                <h1 class="entry__title"><a href="<?php echo $page->permalink() ?>"><?php echo $page->title() ?></a></h1>
                                
                                <div class="entry__meta">
                                    <span class="byline">By:
                                        <span class='author'>
                                            <?php echo $page->user('firstname').' '.$page->user('lastname') ?>
                                    </span>
                                </span>
                                <?php if ($page->category()): ?>
                                    <span class="cat-links">
                                        <a href="<?php echo $page->categoryPermalink() ?>"><?php echo $page->category() ?></a> 
                                    </span>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="entry__excerpt">
                                <p>
                                <?php echo $page->contentBreak() ?>
                                </p>
                            </div>
                            <?php if ($page->readMore()): ?>
                            <a class="entry__more-link" href="<?php echo $page->permalink() ?>">
                                <?php echo $language->get('Read more') ?>
                            </a>
                            <?php endif; ?>
                        </div> <!-- end entry__text -->
                    
                    </article> <!-- end article -->
                    <?php endforeach ?>

                </div> <!-- end brick-wrapper -->

            </div> <!-- end masonry -->

            <?php if (Paginator::numberOfPages()>1): ?>
            <div class="row">
                <div class="column large-12">
                    <nav class="pgn">
                        <ul>
                            <?php if (Paginator::showPrev()): ?>
                            <li>
                                <a class="pgn__prev" href="<?php echo Paginator::previousPageUrl() ?>">
                                    Prev
                                </a>
                            </li>
                            <?php endif ?>
                            
                            <?php for ($i=1; $i<=Paginator::numberOfPages(); $i++): ?>
                                <?php if ($i == Paginator::currentPage()): ?>
		                    <li><span class="pgn__num current"><?php echo $i ?></span></li>
                                <?php else: ?>
		                    <li><a class="pgn__num" href="<?php echo Paginator::numberUrl($i) ?>"><?php echo $i ?></a></li>
                                <?php endif; ?>
		                    <?php endfor ?>

                            <?php if (Paginator::showNext()): ?>
                            <li>
                                <a class="pgn__next" href="<?php echo Paginator::nextPageUrl() ?>">
                                    Next
                                </a>
                            </li>
                            <?php endif ?>
                        </ul>
                    </nav> <!-- end pgn -->
                </div> <!-- end column -->
            </div> <!-- end row -->
            <?php endif ?>


        </div> <!-- end s-bricks -->

    </section> <!-- end s-content -->


