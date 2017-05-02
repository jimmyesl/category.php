<?php
/**
 * The template for displaying pages
 *
 * @package example category page
 */

get_header();
?>

    <main id="main" role="main">
        <div class="container">
            <div class="~page">
                <h1 class="~page__title">Category: <?php echo single_cat_title(); ?></h1>
                <div class="~page__content">
                    <div class="~article-listing --list --stack --bordered">
                        <div class="~article-listing__wrapper">
                            <?php
                                while (have_posts()):
                                    the_post();
                                    setPostViews(get_the_ID());
                            ?>
                                <article class="~article --horizontal">
                                    <figure class="~article__image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php echo get_the_post_thumbnail(get_the_ID(), 'customthumb'); ?>
                                        </a>
                                    </figure>
                                    <div class="~article__content">
                                        <header class="~article__header">
                                            <h2><?php echo the_time('F j, Y'); ?></h2>
                                            <a href="<?php the_permalink(); ?>">
                                                <h1><?php echo the_title(); ?></h1>
                                            </a>
                                            <h3>By <?php echo the_author_meta('first_name'); ?> <?php echo the_author_meta('last_name'); ?></h3>
                                        </header>
                                        <p><?php echo the_excerpt(); ?></p>
                                        <?php
                                            $posttags = get_the_tags();
                                            if ($posttags):
                                        ?>
                                            <ul class="~article__tags">
                                                <?php
                                                    foreach($posttags as $tag) {
                                                        echo '<li>' . $tag->name . '</li>
                                                        ';
                                                    }
                                                ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                            <div class="~article-listing__pagination">
                                <?php
                                    the_posts_pagination(array(
                                        'mid_size'  => 2
                                    ));
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php
get_footer();
?>
