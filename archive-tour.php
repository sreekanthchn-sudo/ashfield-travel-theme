<?php
/**
 * Archive: Tours listing page  →  /tours/
 *
 * Layout:
 *  - Page header with title + active filter pills
 *  - Sidebar: filter by Destination + Tour Type + Duration + Price
 *  - Main grid: tour cards (same card component as homepage)
 *  - Pagination
 *
 * @package Ashfield_Travel
 */

defined( 'ABSPATH' ) || exit;

get_header();

/* ── Active filter values from URL ───────────────────────────────────────── */
$active_dest  = isset( $_GET['destination'] ) ? sanitize_text_field( wp_unslash( $_GET['destination'] ) ) : '';
$active_type  = isset( $_GET['tour_type'] )   ? sanitize_text_field( wp_unslash( $_GET['tour_type'] ) )   : '';
$active_sort  = isset( $_GET['sort'] )        ? sanitize_text_field( wp_unslash( $_GET['sort'] ) )        : 'date';

/* ── Build query args ─────────────────────────────────────────────────────── */
$query_args = [
	'post_type'      => 'tour',
	'posts_per_page' => 12,
	'paged'          => get_query_var( 'paged', 1 ),
];

if ( $active_dest ) {
	$query_args['tax_query'][] = [
		'taxonomy' => 'tour_destination',
		'field'    => 'slug',
		'terms'    => $active_dest,
	];
}
if ( $active_type ) {
	$query_args['tax_query'][] = [
		'taxonomy' => 'tour_type',
		'field'    => 'slug',
		'terms'    => $active_type,
	];
}

switch ( $active_sort ) {
	case 'price_asc':
		$query_args['meta_key']  = '_at_price_raw'; // numeric price stored separately
		$query_args['orderby']   = 'meta_value_num';
		$query_args['order']     = 'ASC';
		break;
	case 'price_desc':
		$query_args['meta_key']  = '_at_price_raw';
		$query_args['orderby']   = 'meta_value_num';
		$query_args['order']     = 'DESC';
		break;
	default:
		$query_args['orderby'] = 'date';
		$query_args['order']   = 'DESC';
}

$tour_query = new WP_Query( $query_args );

/* ── Taxonomy terms for sidebar filters ──────────────────────────────────── */
$destinations = get_terms( [ 'taxonomy' => 'tour_destination', 'hide_empty' => true ] );
$tour_types   = get_terms( [ 'taxonomy' => 'tour_type',        'hide_empty' => true ] );

/**
 * Resolve a tour's top-level destination label for archive grouping.
 *
 * @param int $post_id Tour post ID.
 * @return string Group label.
 */
function ashfield_get_tour_destination_group_label( $post_id ) {
	$terms = get_the_terms( $post_id, 'tour_destination' );
	if ( empty( $terms ) || is_wp_error( $terms ) ) {
		return __( 'Other Destinations', 'ashfield-travel' );
	}

	foreach ( $terms as $term ) {
		if ( $term->parent > 0 ) {
			$parent = get_term( $term->parent, 'tour_destination' );
			if ( $parent && ! is_wp_error( $parent ) ) {
				return $parent->name;
			}
		}
	}

	usort(
		$terms,
		static function ( $a, $b ) {
			return strcasecmp( $a->name, $b->name );
		}
	);

	return $terms[0]->name;
}
?>

<!-- Archive header -->
<div class="at-archive-header">
  <div class="grid-container">
    <h1 class="at-archive-title">
      <?php
      if ( $active_dest ) {
          $term = get_term_by( 'slug', $active_dest, 'tour_destination' );
          printf(
              /* translators: %s: destination name */
              esc_html__( '%s Tours', 'ashfield-travel' ),
              $term ? esc_html( $term->name ) : esc_html( $active_dest )
          );
      } elseif ( $active_type ) {
          $term = get_term_by( 'slug', $active_type, 'tour_type' );
          printf(
              /* translators: %s: tour type name */
              esc_html__( '%s Holidays', 'ashfield-travel' ),
              $term ? esc_html( $term->name ) : esc_html( $active_type )
          );
      } else {
          esc_html_e( 'All Tours', 'ashfield-travel' );
      }
      ?>
    </h1>
    <p class="at-archive-subtitle">
      <?php
      printf(
          /* translators: %d: number of tours found */
          esc_html( _n( '%d tour found', '%d tours found', $tour_query->found_posts, 'ashfield-travel' ) ),
          (int) $tour_query->found_posts
      );
      ?>
    </p>
  </div>
</div>

<!-- Filter pills bar (top) -->
<div class="at-filter-bar at-filter-bar--archive">
  <div class="grid-container">
    <span class="at-filter-label"><?php esc_html_e( 'Destination:', 'ashfield-travel' ); ?></span>

    <a href="<?php echo esc_url( get_post_type_archive_link( 'tour' ) ); ?>"
       class="at-filter-pill <?php echo ! $active_dest && ! $active_type ? 'active' : ''; ?>">
      <?php esc_html_e( 'All', 'ashfield-travel' ); ?>
    </a>

    <?php if ( ! is_wp_error( $destinations ) ) :
      foreach ( $destinations as $dest ) : ?>
        <a href="<?php echo esc_url( add_query_arg( [ 'destination' => $dest->slug, 'tour_type' => $active_type ], get_post_type_archive_link( 'tour' ) ) ); ?>"
           class="at-filter-pill <?php echo $active_dest === $dest->slug ? 'active' : ''; ?>">
          <?php echo esc_html( $dest->name ); ?>
        </a>
      <?php endforeach;
    endif; ?>

    <?php if ( ! is_wp_error( $tour_types ) && ! empty( $tour_types ) ) : ?>
      <span class="at-filter-separator" aria-hidden="true"></span>
      <span class="at-filter-label"><?php esc_html_e( 'Type:', 'ashfield-travel' ); ?></span>
      <?php foreach ( $tour_types as $type ) : ?>
        <a href="<?php echo esc_url( add_query_arg( [ 'destination' => $active_dest, 'tour_type' => $type->slug ], get_post_type_archive_link( 'tour' ) ) ); ?>"
           class="at-filter-pill <?php echo $active_type === $type->slug ? 'active' : ''; ?>">
          <?php echo esc_html( $type->name ); ?>
        </a>
      <?php endforeach; ?>
    <?php endif; ?>

  </div>
</div>

<!-- Main layout: sidebar + grid -->
<div class="at-archive-wrap">
  <div class="grid-container">
    <div class="at-archive-layout">

      <!-- ── SIDEBAR ──────────────────────────────────── -->
      <aside class="at-archive-sidebar" aria-label="<?php esc_attr_e( 'Filter tours', 'ashfield-travel' ); ?>">

        <form method="get" action="<?php echo esc_url( get_post_type_archive_link( 'tour' ) ); ?>">

          <!-- Destination filter -->
          <?php if ( ! is_wp_error( $destinations ) && ! empty( $destinations ) ) : ?>
            <div class="at-sidebar-group">
              <h3 class="at-sidebar-title"><?php esc_html_e( 'Destination', 'ashfield-travel' ); ?></h3>
              <ul class="at-sidebar-list">
                <?php foreach ( $destinations as $dest ) : ?>
                  <li>
                    <label class="at-sidebar-check">
                      <input type="radio"
                             name="destination"
                             value="<?php echo esc_attr( $dest->slug ); ?>"
                             <?php checked( $active_dest, $dest->slug ); ?>>
                      <?php echo esc_html( $dest->name ); ?>
                      <span class="at-sidebar-count">(<?php echo (int) $dest->count; ?>)</span>
                    </label>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <!-- Tour type filter -->
          <?php if ( ! is_wp_error( $tour_types ) && ! empty( $tour_types ) ) : ?>
            <div class="at-sidebar-group">
              <h3 class="at-sidebar-title"><?php esc_html_e( 'Tour Type', 'ashfield-travel' ); ?></h3>
              <ul class="at-sidebar-list">
                <?php foreach ( $tour_types as $type ) : ?>
                  <li>
                    <label class="at-sidebar-check">
                      <input type="radio"
                             name="tour_type"
                             value="<?php echo esc_attr( $type->slug ); ?>"
                             <?php checked( $active_type, $type->slug ); ?>>
                      <?php echo esc_html( $type->name ); ?>
                      <span class="at-sidebar-count">(<?php echo (int) $type->count; ?>)</span>
                    </label>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <!-- Sort -->
          <div class="at-sidebar-group">
            <h3 class="at-sidebar-title"><?php esc_html_e( 'Sort By', 'ashfield-travel' ); ?></h3>
            <select name="sort" class="at-sidebar-select" onchange="this.form.submit()">
              <option value="date"       <?php selected( $active_sort, 'date' ); ?>><?php esc_html_e( 'Newest first', 'ashfield-travel' ); ?></option>
              <option value="price_asc"  <?php selected( $active_sort, 'price_asc' ); ?>><?php esc_html_e( 'Price: low to high', 'ashfield-travel' ); ?></option>
              <option value="price_desc" <?php selected( $active_sort, 'price_desc' ); ?>><?php esc_html_e( 'Price: high to low', 'ashfield-travel' ); ?></option>
            </select>
          </div>

          <button type="submit" class="at-btn-apply-filters">
            <?php esc_html_e( 'Apply Filters', 'ashfield-travel' ); ?>
          </button>

          <?php if ( $active_dest || $active_type ) : ?>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'tour' ) ); ?>" class="at-clear-filters">
              <?php esc_html_e( '✕ Clear filters', 'ashfield-travel' ); ?>
            </a>
          <?php endif; ?>

        </form>

        <!-- Trust box -->
        <div class="at-sidebar-trust">
          <div class="at-sidebar-trust-item">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:4px;"><polyline points="20 6 9 17 4 12"></polyline></svg> <?php esc_html_e( 'ATOL Protected', 'ashfield-travel' ); ?>
          </div>
          <div class="at-sidebar-trust-item">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="#FFB800" stroke="none" style="display:inline-block; vertical-align:middle; margin-right:4px;"><path d="M12 1.7L14.5 9H22L15.9 13.4L18.4 20.7L12 16.3L5.6 20.7L8.1 13.4L2 9H9.5L12 1.7Z"/></svg> <?php esc_html_e( '4.9/5 Customer Rating', 'ashfield-travel' ); ?>
          </div>
          <div class="at-sidebar-trust-item">
            <svg viewBox="0 0 24 24" width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" style="display:inline-block; vertical-align:middle; margin-right:4px;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
            <a href="tel:+447587671758"><?php esc_html_e( '+44 7587 671758', 'ashfield-travel' ); ?></a>
          </div>
        </div>

      </aside>

      <!-- ── TOUR GRID ─────────────────────────────── -->
      <main class="at-archive-main" id="main">

        <?php if ( $tour_query->have_posts() ) : ?>
          <?php
          $grouped_posts = [];
          while ( $tour_query->have_posts() ) {
            $tour_query->the_post();
            $group_label = ashfield_get_tour_destination_group_label( get_the_ID() );
            if ( ! isset( $grouped_posts[ $group_label ] ) ) {
              $grouped_posts[ $group_label ] = [];
            }
            $grouped_posts[ $group_label ][] = get_the_ID();
          }
          wp_reset_postdata();
          ksort( $grouped_posts, SORT_NATURAL | SORT_FLAG_CASE );
          ?>

          <?php foreach ( $grouped_posts as $group_label => $tour_ids ) : ?>
            <section class="at-archive-group" style="margin-bottom:40px;">
              <h2 class="at-archive-group-title" style="font-size:30px;margin:0 0 18px;"><?php echo esc_html( $group_label ); ?></h2>
              <div class="at-tour-grid at-tour-grid--archive">
                <?php foreach ( $tour_ids as $tour_id ) :
                  $price     = get_post_meta( $tour_id, '_at_price',       true );
                  $dates     = get_post_meta( $tour_id, '_at_dates',       true );
                  $duration  = get_post_meta( $tour_id, '_at_duration',    true );
                  $save      = get_post_meta( $tour_id, '_at_save_banner', true );
                  $location  = get_post_meta( $tour_id, '_at_location',    true );
                  $badge1    = get_post_meta( $tour_id, '_at_badge_1',     true );
                  $badge2    = get_post_meta( $tour_id, '_at_badge_2',     true );
                  $featured  = get_post_meta( $tour_id, '_at_featured',    true );
                  ?>
                  <article class="at-tour-card <?php echo $featured ? 'at-tour-card--featured' : ''; ?>">
                    <div class="at-tour-card-img">
                      <?php
                      $_card_img = get_post_meta( $tour_id, '_at_featured_image', true )
                                ?: get_post_meta( $tour_id, '_at_hero', true );
                      if ( has_post_thumbnail( $tour_id ) ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $tour_id ) ); ?>" tabindex="-1" aria-hidden="true">
                          <?php echo get_the_post_thumbnail( $tour_id, 'medium_large', [ 'loading' => 'lazy' ] ); ?>
                        </a>
                      <?php elseif ( $_card_img ) : ?>
                        <a href="<?php echo esc_url( get_permalink( $tour_id ) ); ?>" tabindex="-1" aria-hidden="true">
                          <img src="<?php echo esc_url( $_card_img ); ?>"
                               alt="<?php echo esc_attr( get_the_title( $tour_id ) ); ?>"
                               loading="lazy" width="500" height="280"
                               style="object-fit:cover;width:100%;height:100%;">
                        </a>
                      <?php endif; ?>

                      <?php if ( $badge1 || $badge2 ) : ?>
                        <div class="at-tour-card-badges" aria-hidden="true">
                          <?php if ( $badge1 ) echo '<span class="at-tour-badge">' . esc_html( $badge1 ) . '</span>'; ?>
                          <?php if ( $badge2 ) echo '<span class="at-tour-badge">' . esc_html( $badge2 ) . '</span>'; ?>
                        </div>
                      <?php endif; ?>
                    </div>

                    <div class="at-tour-card-body">
                      <div class="at-tour-card-meta">
                        <?php if ( $location ) : ?>
                          <span class="at-tour-location"><svg viewBox="0 0 24 24" width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" style="display:inline-block; vertical-align:middle; margin-right:4px;"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg> <?php echo esc_html( $location ); ?></span>
                        <?php endif; ?>
                        <?php if ( $featured ) : ?>
                          <span class="at-tour-favourite"><svg viewBox="0 0 24 24" width="12" height="12" fill="currentColor" stroke="none" style="display:inline-block; vertical-align:middle; margin-right:4px;"><path d="M12 1.7L14.5 9H22L15.9 13.4L18.4 20.7L12 16.3L5.6 20.7L8.1 13.4L2 9H9.5L12 1.7Z"/></svg> <?php esc_html_e( 'Customer Favourite', 'ashfield-travel' ); ?></span>
                        <?php endif; ?>
                      </div>

                      <h3 class="at-tour-card-title">
                        <a href="<?php echo esc_url( get_permalink( $tour_id ) ); ?>"><?php echo esc_html( get_the_title( $tour_id ) ); ?></a>
                      </h3>

                      <p class="at-tour-card-excerpt">
                        <?php echo esc_html( wp_trim_words( get_post_field( 'post_excerpt', $tour_id ), 18 ) ); ?>
                      </p>

                      <?php if ( $save ) : ?>
                        <div class="at-tour-save-banner"><?php echo esc_html( $save ); ?></div>
                      <?php endif; ?>

                      <div class="at-tour-info-row">
                        <?php if ( $dates ) : ?>
                          <div class="at-tour-info-item">
                            <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></div>
                            <div class="label"><?php esc_html_e( 'Dates', 'ashfield-travel' ); ?></div>
                            <div class="value"><?php echo esc_html( $dates ); ?></div>
                          </div>
                        <?php endif; ?>
                        <?php if ( $duration ) : ?>
                          <div class="at-tour-info-item">
                            <div class="icon" aria-hidden="true"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></div>
                            <div class="label"><?php esc_html_e( 'Duration', 'ashfield-travel' ); ?></div>
                            <div class="value"><?php echo esc_html( $duration ); ?></div>
                          </div>
                        <?php endif; ?>
                        <?php if ( $price ) : ?>
                          <div class="at-tour-info-item">
                            <div class="icon" aria-hidden="true">£</div>
                            <div class="label"><?php esc_html_e( 'From', 'ashfield-travel' ); ?></div>
                            <div class="value at-price-value"><?php echo esc_html( $price ); ?></div>
                          </div>
                        <?php endif; ?>
                      </div>

                      <a href="<?php echo esc_url( get_permalink( $tour_id ) ); ?>" class="at-btn-find-more">
                        <?php esc_html_e( 'Find out more', 'ashfield-travel' ); ?>
                        <span class="arrow-circle" aria-hidden="true"><svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></span>
                      </a>
                    </div>
                  </article>
                <?php endforeach; ?>
              </div>
            </section>
          <?php endforeach; ?>

          <!-- Pagination -->
          <nav class="at-pagination" aria-label="<?php esc_attr_e( 'Tours pages', 'ashfield-travel' ); ?>">
            <?php
            echo paginate_links( [
                'total'   => $tour_query->max_num_pages,
                'current' => get_query_var( 'paged', 1 ),
                'prev_text' => '&larr; ' . esc_html__( 'Previous', 'ashfield-travel' ),
                'next_text' => esc_html__( 'Next', 'ashfield-travel' ) . ' &rarr;',
            ] );
            ?>
          </nav>

        <?php else : ?>

          <!-- No tours found state -->
          <div class="at-no-results">
            <div class="at-no-results-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="60" height="60" fill="none" stroke="currentColor" stroke-width="1.5" style="opacity:0.3;"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
            </div>
            <h2><?php esc_html_e( 'No tours match your filters', 'ashfield-travel' ); ?></h2>
            <p><?php esc_html_e( 'Try adjusting your selection, or browse all our tours below.', 'ashfield-travel' ); ?></p>
            <a href="<?php echo esc_url( get_post_type_archive_link( 'tour' ) ); ?>" class="at-btn-primary">
              <?php esc_html_e( 'View All Tours', 'ashfield-travel' ); ?>
            </a>
            <p class="at-no-results-call">
              <?php esc_html_e( 'Or call us:', 'ashfield-travel' ); ?>
              <a href="tel:+447587671758"><strong>+44 7587 671758</strong></a>
            </p>
          </div>

        <?php endif; ?>

      </main><!-- .at-archive-main -->

    </div><!-- .at-archive-layout -->
  </div><!-- .grid-container -->
</div><!-- .at-archive-wrap -->

<!-- Brochure CTA strip -->
<?php get_template_part( 'template-parts/home/newsletter' ); ?>

<?php get_footer(); ?>
