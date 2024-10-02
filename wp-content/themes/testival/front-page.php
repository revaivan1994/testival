<?php get_header() ?>



<body class="body">
    <div class="header">
        <div class="navigation w-nav">
            <div class="navigation-container-full">
                <a href="/" class="w-nav-brand w--current">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/img/logo.svg" alt="" />
                </a>

                <?php wp_nav_menu(array(
                    'theme_location' => 'menu-language',
                    'menu_id' => '',
                    'menu_class' => 'navigation-menu w-nav-menu',
                    'container' => '',
                )) ?>
                <div class="menu-button w-nav-button">
                    <div class="w-icon-nav-menu"></div>
                </div>
            </div>
        </div>
        <div class="title-centre">
            <h1 class="heading-h1"><?php esc_html_e("TEST TASK TITLE", 'testival'); ?></h1>
        </div>
    </div>
    <div class="content-section">
        <div class="container">
            <div class="w-layout-grid blog-grid">
                <div class="content-right">
                    <div class="stick-wrapper">

                        <div class="categories-block">
                            <div class="title-large"><?php echo esc_html_e('Categories', 'testival'); ?></div>
                            <a href="#" class="categories-pill selected w-inline-block">
                                <div class="title-small pink"><?php esc_html_e('Product', 'testival'); ?></div>
                            </a>
                            <a href="#" class="categories-pill w-inline-block">
                                <div class="title-small pink"><?php esc_html_e('Engineering', 'testival'); ?></div>
                            </a>
                            <a href="#" class="categories-pill w-inline-block">
                                <div class="title-small pink"><?php esc_html_e('Technology', 'testival'); ?></div>
                            </a>
                            <a href="#" class="categories-pill w-inline-block">
                                <div class="title-small pink"><?php esc_html_e('Company', 'testival'); ?></div>
                            </a>
                            <a href="#" class="categories-pill w-inline-block">
                                <div class="title-small pink"><?php esc_html_e('Saas', 'testival'); ?></div>
                            </a>
                        </div>

                        <?php
                        if (isset($_REQUEST['filter'])) {
                            global $wp_query;

                            if (isset($_REQUEST['filter']['post_tag']) && is_array($_REQUEST['filter']['post_tag'])) {
                                $post_tags = array();
                                foreach ($_REQUEST['filter']['post_tag'] as $post_tag) {
                                    $post_tags[] = intval($post_tag);
                                }

                                $query['tax_query'][] = array(
                                    'taxonomy' => 'post_tag',
                                    'field' => 'term_id',
                                    'terms' => $post_tags,
                                );
                                unset($post_tags);

                            }

                            query_posts($query);

                        }
                        ?>

                        <?php if (is_active_sidebar('sidebar-1')) { ?>
                            <form method="get">
                                <?php $post_tags = get_terms(['taxonomy' => 'post_tag']);

                                foreach ($post_tags as $tag): ?>

                                    <button name="filter[post_tag][]" id="button" value="<?php echo $tag->term_id; ?>"
                                        class="categories-pill selected w-inline-block">
                                        <div class="title-small pink" for="post_tag_<?php echo $tag->$term_id; ?>">
                                            <?php echo $tag->name; ?>
                                        </div>
                                    </button>

                                <?php endforeach; ?>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                </div>


                <div class="content-left">
                    <?php
                    $args = array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'posts_per_page' => '3',
                        'paged' => 1,
                    );
                    $blog_posts = new WP_Query($args);
                    ?>
                    <div class="entry-content">
                        <?php if ($blog_posts->have_posts()): ?>
                            <div class="blog-posts">
                                <?php while ($blog_posts->have_posts()):
                                    $blog_posts->the_post(); ?>
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_excerpt(); ?>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                            <div class="loadmore">Load More...</div>
                        <?php endif; ?>
                    </div><!-- .entry-content -->
                </div>
            </div>
        </div>
    </div>
    <div class="content-section form-block">
        <div class="container"></div>
        <div class="form-block w-form">

            <?php echo do_shortcode('[contact-form-7 id="3a20eb2" title="form test"]') ?>

            <div class="w-form-done">
                <div>Thank you! Your submission has been received!</div>
            </div>
            <div class="w-form-fail">
                <div>Oops! Something went wrong while submitting the form.</div>
            </div>
        </div>
    </div>

    <?php get_footer();