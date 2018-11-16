<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Hotel_Pagoda
 */

get_header(); ?>
    <div class="section-content section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">

                            <section class="error-404 not-found">
                                <header class="page-header">
                                    <h2><?php echo esc_html(404); ?></h2>
                                    <h1 class="page-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'hotel-pagoda-lite'); ?></h1>
                                </header><!-- .page-header -->
                                <div class="page-content">
                                    <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links from menu or a search?', 'hotel-pagoda-lite'); ?></p>
                                    <?php
                                    get_search_form();
                                    ?>
                                </div><!-- .page-content -->
                            </section><!-- .error-404 -->
                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div>
        </div>
    </div>
<?php
get_footer();
