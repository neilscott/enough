<?php
$post_id             = get_queried_object_id();
$title               = get_the_title( $post_id );
$breadcrumbs_display = dima_helper::dima_am_i_true( dima_helper::dima_get_inherit_option( '_dima_meta_breadcumbs_display', 'dima_page_title_display' ) );
if ( $breadcrumbs_display ) { ?>
    <div class="title_container center-style">
        <div class="page-section-content overflow-hidden">
            <div class="container header-main-container">
                <div class="header-content">
                    <h1 class="header-title undertitle text-center"><?php echo wp_kses( $title, dima_helper::dima_get_allowed_html_tag() ) ?></h1>
                </div>
            </div>
        </div>
    </div>
    <?php
}