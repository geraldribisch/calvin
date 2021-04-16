    <?php if (empty($content)): ?>
        <div>
            <?php $language->p('No pages found') ?>
        </div>
    <?php endif ?>
    
    <?php if (!empty($stickyPosts)): ?>
    <!-- hero
    ================================================== -->
    <section id="hero" class="s-hero">

        <div class="s-hero__slider">
            <?php foreach ($stickyPosts as $page): ?>
            <?php if($page->type()=='sticky'): ?>
            <div class="s-hero__slide">

                <div class="s-hero__slide-bg" style="background-image: url('<?php echo $page->coverImage() ?>');"></div>

                <div class="row s-hero__slide-content animate-this">
                    <div class="column">
                        <div class="s-hero__slide-meta">
                            <?php if ($page->category()): ?>
                            <span class="cat-links">
                                <a href="<?php echo $page->categoryPermalink() ?>"><?php echo $page->category() ?></a> 
                            </span>
                            <?php endif; ?>    

                            <span class="byline"> 
                                Posted by 
                                <span class="author">
                                    <?php echo $page->user('firstname').' '.$page->user('lastname') ?>
                                </span>
                            </span>
                        </div>
                        <h1 class="s-hero__slide-text">
                            <a href="<?php echo $page->permalink() ?>">
                                <?php echo $page->title() ?>
                            </a>
                        </h1>
                    </div>
                </div>

            </div> <!-- end s-hero__slide -->
            <?php endif; ?>
            <?php endforeach ?>

        </div> <!-- end s-hero__slider -->

        <div class="s-hero__social hide-on-mobile-small">
            <p>Follow</p>
            <span></span>
            <ul class="s-hero__social-icons">
                <?php foreach (Theme::socialNetworks() as $key=>$label): ?>
                <li><a href="<?php echo $site->{$key}() ?>"><i class="fab fa-<?php echo $key ?>" aria-hidden="true"></i>
                </a></li>
                <?php endforeach ?>                                            
            </ul>
        </div> <!-- end s-hero__social -->

        <?php if(count($stickyPosts) > 1): ?>
        <div class="nav-arrows s-hero__nav-arrows">
            <button class="s-hero__arrow-prev">
                <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M1.5 7.5l4-4m-4 4l4 4m-4-4H14" stroke="currentColor"></path></svg>
            </button>
            <button class="s-hero__arrow-next">
               <svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg" width="15" height="15"><path d="M13.5 7.5l-4-4m4 4l-4 4m4-4H1" stroke="currentColor"></path></svg>
            </button>
        </div> <!-- end s-hero__arrows -->
        <?php endif; ?>

    </section> <!-- end s-hero -->
    <?php endif ?>

    <!-- content
    ================================================== -->
    <section class="s-content s-content--no-top-padding">


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
	                <?php foreach ($posts as $page): ?>
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


