<?php
/**
 * Template Name: Custom Home Page
 */
get_header(); ?>

<main id="content">
  <?php if( get_option('education_insight_hide_show',true) != 'off'){ ?>
    <section id="slider">
      <div class="slid-bg">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <?php
            for ( $i = 1; $i <= 4; $i++ ) {
              $educate_training_coach_mod =  get_theme_mod( 'education_insight_post_setting' . $i );
              if ( 'page-none-selected' != $educate_training_coach_mod ) {
                $education_insight_slide_post[] = $educate_training_coach_mod;
              }
            }
             if( !empty($education_insight_slide_post) ) :
            $educate_training_coach_args = array(
              'post_type' =>array('post','page'),
              'post__in' => $education_insight_slide_post
            );
            $educate_training_coach_query = new WP_Query( $educate_training_coach_args );
            if ( $educate_training_coach_query->have_posts() ) :
              $i = 1;
          ?>
          <div class="carousel-inner" role="listbox">
            <?php  while ( $educate_training_coach_query->have_posts() ) : $educate_training_coach_query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <img src="<?php esc_url(the_post_thumbnail_url('full')); ?>"/>
              <div class="carousel-caption slider-inner">
                <div class="inner_carousel">
                  <h2><?php the_title();?></h2>
                  <p><?php $educate_training_coach_excerpt = get_the_excerpt(); echo esc_html( education_insight_string_limit_words( $educate_training_coach_excerpt, 25 )); ?></p>
                  <div class="slide-btn mt-4 mt-md-4">
                    <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','educate-training-coach'); ?></a>
                  </div>
                </div>
              </div>
            </div>
            <?php $i++; endwhile;
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
          <div class="no-postfound"></div>
            <?php endif;
          endif;?>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-arrow-left"></i></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-arrow-right"></i></span>
            </a>
        </div>
        <div class="clearfix"></div>
      </div>      
    </section>
  <?php }?>  

  <?php if( get_theme_mod('education_insight_popular_courses_heading') != '' || get_theme_mod('education_insight_popular_courses_setting') != ''){ ?>
    <section id="course-cat">
      <div class="container">
        <div class="cours-head">
          <?php if( get_theme_mod('educate_training_coach_courses_heading') != ''){ ?>
            <h3 class="cour-main-hd text-center mb-3"><?php echo esc_html(get_theme_mod('educate_training_coach_courses_heading','')); ?></h3>
          <?php }?>
          <?php if( get_theme_mod('educate_training_coach_courses_text') != ''){ ?>
          <h6 class="cours-txt text-center mx-auto w-50"><?php echo esc_html(get_theme_mod('educate_training_coach_courses_text','')); ?></h6>
          <?php }?>          
        </div>
        <div class="row">
          <?php
          $educate_training_coach_catData1=  get_theme_mod('education_insight_popular_courses_setting');if($educate_training_coach_catData1){
          $educate_training_coach_page_query = new WP_Query(array( 'category_name' => esc_html($educate_training_coach_catData1 ,'educate-training-coach')));?>
            <?php while( $educate_training_coach_page_query->have_posts() ) : $educate_training_coach_page_query->the_post(); ?>
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="box mb-4">
                  <?php the_post_thumbnail(); ?>
                  <div class="lesson-box px-4">
                    <?php if( get_post_meta($post->ID, 'educate_training_coach_courses_lesson', true) ) {?>
                      <span class="crs-less mr-3"><i class="fas fa-book mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'educate_training_coach_courses_lesson',true)); ?></span>
                    <?php }?>
                    <?php if( get_post_meta($post->ID, 'educate_training_coach_courses_student', true) ) {?>
                      <span class="crs-std"><i class="fas fa-user mr-2"></i><?php echo esc_html(get_post_meta($post->ID,'educate_training_coach_courses_student',true)); ?></span>
                    <?php }?>
                  </div>
                  <div class="box-inner p-4">
                    <?php if( get_post_meta($post->ID, 'educate_training_coach_courses_amount', true) ) {?>
                      <h5><?php echo esc_html(get_post_meta($post->ID,'educate_training_coach_courses_amount',true)); ?></h5>
                    <?php }?>
                    <h4 class="mb-3"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h4>
                  </div>
                </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();
          }?>
        </div>
      </div>
    </section>
  <?php }?>
</main>

<?php get_footer(); ?>
