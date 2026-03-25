<?php
/**
 * Template part: Blog / Travel Inspiration — 3-column grid
 * Pulls 3 latest WordPress posts. Falls back to static cards if no posts.
 *
 * @package Ashfield_Travel
 */

$blog_query = new WP_Query( [
	'post_type'      => 'post',
	'posts_per_page' => 3,
	'post_status'    => 'publish',
	'no_found_rows'  => true,
] );

$fallback_posts = [
	[
		'tag'     => __( 'Destination Guide', 'ashfield-travel' ),
		'title'   => __( 'The Complete Guide to Kerala for First-Time Visitors', 'ashfield-travel' ),
		'excerpt' => __( 'Everything you need to know about visiting God\'s Own Country — from the best time to go to must-see experiences.', 'ashfield-travel' ),
		'url'     => home_url( '/blog/' ),
		'img'     => 'https://images.unsplash.com/photo-1593693411515-c20261bcad6e?w=500&q=80',
		'img_alt' => __( 'Kerala backwaters at dusk', 'ashfield-travel' ),
	],
	[
		'tag'     => __( 'Family Travel', 'ashfield-travel' ),
		'title'   => __( 'Travelling to India with Elderly Parents: A Practical Guide', 'ashfield-travel' ),
		'excerpt' => __( 'How to plan a comfortable, enjoyable Indian holiday that works for every generation in your family.', 'ashfield-travel' ),
		'url'     => home_url( '/blog/' ),
		'img'     => 'https://images.unsplash.com/photo-1585135497273-1a86b09fe70e?w=500&q=80',
		'img_alt' => __( 'Multi-generational family enjoying India', 'ashfield-travel' ),
	],
	[
		'tag'     => __( 'New Destination', 'ashfield-travel' ),
		'title'   => __( 'Why Dubai Is the Perfect Stopover Before India', 'ashfield-travel' ),
		'excerpt' => __( 'Combine the glamour of Dubai with the soul of India for the ultimate family holiday experience.', 'ashfield-travel' ),
		'url'     => home_url( '/blog/' ),
		'img'     => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500&q=80',
		'img_alt' => __( 'Dubai Marina at night', 'ashfield-travel' ),
	],
];
?>

<section class="at-section at-section--white" id="blog">
  <div class="grid-container">

    <header class="at-section-header">
      <h2 class="at-section-title"><?php esc_html_e( 'Travel Inspiration', 'ashfield-travel' ); ?></h2>
      <p class="at-section-subtitle">
        <?php esc_html_e( 'Tips, guides, and stories to help you plan your perfect family holiday.', 'ashfield-travel' ); ?>
      </p>
      <div class="at-section-divider" aria-hidden="true"></div>
    </header>

    <div class="at-blog-grid">

    <?php if ( $blog_query->have_posts() ) :
      while ( $blog_query->have_posts() ) :
        $blog_query->the_post();
        $categories = get_the_category();
        $tag_label  = $categories ? esc_html( $categories[0]->name ) : esc_html__( 'Travel', 'ashfield-travel' );
        ?>
        <article class="at-blog-card">
          <?php if ( has_post_thumbnail() ) : ?>
            <div class="at-blog-card-img">
              <a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
                <?php the_post_thumbnail( 'medium_large', [ 'loading' => 'lazy' ] ); ?>
              </a>
            </div>
          <?php endif; ?>
          <div class="at-blog-card-body">
            <div class="at-blog-tag"><?php echo $tag_label; ?></div>
            <h3 class="at-blog-title">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h3>
            <p class="at-blog-excerpt"><?php echo wp_trim_words( get_the_excerpt(), 22 ); ?></p>
            <a href="<?php the_permalink(); ?>" class="at-blog-link">
              <?php esc_html_e( 'Read more', 'ashfield-travel' ); ?> <span aria-hidden="true">&#10132;</span>
            </a>
          </div>
        </article>
      <?php endwhile;
      wp_reset_postdata();

    else :
      foreach ( $fallback_posts as $post ) : ?>
        <article class="at-blog-card">
          <div class="at-blog-card-img">
            <a href="<?php echo esc_url( $post['url'] ); ?>" tabindex="-1" aria-hidden="true">
              <img src="<?php echo esc_url( $post['img'] ); ?>"
                   alt="<?php echo esc_attr( $post['img_alt'] ); ?>"
                   loading="lazy" width="500" height="300">
            </a>
          </div>
          <div class="at-blog-card-body">
            <div class="at-blog-tag"><?php echo esc_html( $post['tag'] ); ?></div>
            <h3 class="at-blog-title">
              <a href="<?php echo esc_url( $post['url'] ); ?>"><?php echo esc_html( $post['title'] ); ?></a>
            </h3>
            <p class="at-blog-excerpt"><?php echo esc_html( $post['excerpt'] ); ?></p>
            <a href="<?php echo esc_url( $post['url'] ); ?>" class="at-blog-link">
              <?php esc_html_e( 'Read more', 'ashfield-travel' ); ?> <span aria-hidden="true">&#10132;</span>
            </a>
          </div>
        </article>
      <?php endforeach;
    endif; ?>

    </div><!-- .at-blog-grid -->

    <div class="at-section-cta">
      <a href="<?php echo esc_url( home_url( '/blog/' ) ); ?>" class="at-btn-outline">
        <?php esc_html_e( 'Read All Articles', 'ashfield-travel' ); ?> &#10132;
      </a>
    </div>

  </div>
</section>
