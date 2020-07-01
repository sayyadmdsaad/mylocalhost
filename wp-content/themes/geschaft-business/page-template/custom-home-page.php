<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content" class="middle-align">
  <svg class="top_svg" viewBox='0 0 400 400'>
    <defs>
      <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
        <stop offset="0%" style="stop-color:#606dff;stop-opacity:1" />
        <stop offset="100%" style="stop-color:#5e64ff;stop-opacity:1" />
      </linearGradient>
    </defs>
    <path fill="url(#grad1)" d="M0,0 L0,100 C11,400 250,150 700,50 L400,0" />
  </svg>
  <?php if(get_theme_mod('geschaft_business_banner') != '') { ?>
    <div class="top-banner">
      <div class="container">
        <?php $page_query = new WP_Query('page_id='.esc_attr(get_theme_mod('geschaft_business_banner'))); ?>
        <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
          <div class="row">
            <div class="col-lg-6 col-md-6">
              <div class="banner-box">
                <h3><?php the_title(); ?></h3>
                <p><?php the_excerpt();?></p>                
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <?php the_post_thumbnail(); ?>
            </div>
          </div>
        <?php endwhile;?>
      </div>
    </div>
  <?php } ?>
  <div id="our-services">
    <div class="container"> 
      <?php if( get_theme_mod('geschaft_business_our_services_title') != ''){ ?>
        <h3><?php echo esc_html(get_theme_mod('geschaft_business_our_services_title','')); ?></h3>
      <?php }?>
      <?php if( get_theme_mod('geschaft_business_our_services_subtitle') != ''){ ?>
        <p><?php echo esc_html(get_theme_mod('geschaft_business_our_services_subtitle','')); ?></p>
      <?php }?>
      <div class="row">
        <?php
        $catData1=  get_theme_mod('geschaft_business_category_setting');if($catData1){
        $page_query = new WP_Query(array( 'category_name' => esc_html($catData1 ,'geschaft-1login-biz')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>  
            <div class="col-lg-4 col-md-4">
              <div class="box">
                <?php the_post_thumbnail(); ?>
                <div class="box-content">
                  <p><?php echo esc_html(wp_trim_words(get_the_content(),'15') );?></p>
                </div>                
              </div>
              <a href="<?php the_permalink(); ?>"><h4><?php the_title();?></h4></a>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</main>

<?php get_footer(); ?>