<?php get_header(); ?>
      <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="owl-carousel owl-theme home-slider">
                <?php 
                    
                    $query  = new WP_Query(array(
                      'posts_per_page' => 3,
                      'meta_key' => 'my_post_viewed',
                      'orderby' => 'meta_value_num',
                      'order'=> 'DESC'
                    )); 
                ?>
                <?php while($query->have_posts()){ 
                  $query->the_post(); 
                  $image = get_field('imagem'); 
                  $categories = get_the_category(); ?>
                <div>
                  <a href="<?php the_permalink(); ?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('<?php echo $image['url']; ?>');">
                    <div class="text half-to-full">
                      <?php foreach($categories as $category) { ?>
                        <span class="category mb-5"><?php echo $category->name; ?></span>
                      <?php } ?>
                      <div class="post-meta">
                        
                        <span class="author mr-2"><img src="<?php echo get_avatar_url($post->post_author); ?>" alt="Author"> <?php echo get_the_author_meta('display_name'); ?></span>&bullet;
                        <span class="mr-2"><?php echo get_the_date('d-m-Y'); ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number(get_the_ID()); ?></span>
                        
                      </div>
                      <h3><?php the_title(); ?></h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                    </div>
                  </a>
                </div>
                <?php } wp_reset_postdata(); ?>
              </div>
              
            </div>
          </div>
          
        </div>


      </section>
      <!-- END section -->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Últimas Postagens</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
                
              <div class="row">
              <?php
                  // $args = array(
                  //   'numberposts'       => 6,
                  //   'offset'            => $paged*4
                  // );
                  // $query = get_posts($args);
                  while( have_posts()) : the_post();
                    $image = get_field('imagem'); ?>
                <div class="col-md-6">
                  <a href="<?php the_permalink(); ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="<?php echo $image['url']; ?>" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="<?php echo get_avatar_url($post->post_author); ?>" alt="Colorlib">  <?php echo get_the_author_meta('display_name'); ?></span>&bullet;
                        <span class="mr-2"><?php echo get_the_date('d-m-Y'); ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number(get_the_ID()); ?></span>
                      </div>
                      <h2><?php echo the_title(); ?></h2>
                    </div>
                  </a>
                </div>
                  <?php endwhile; 
                    ?>
              </div>

             

              <div class="row mt-5">
                <div class="col-md-12 text-center">
                  <nav aria-label="Page navigation" class="text-center">
                    <!-- <ul class="pagination">
                      <li class="page-item  active"><a class="page-link" href="#">&lt;</a></li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">4</a></li>
                      <li class="page-item"><a class="page-link" href="#">5</a></li>
                      <li class="page-item"><a class="page-link" href="#">&gt;</a></li>
                    </ul> -->
                    <?php echo paginate_links(); ?>
                
                  </nav>
                </div>
              </div>

            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
            
              <!-- END sidebar-box -->
              <div class="sidebar-box">
                <div class="bio text-center">
                  <img src="<?php echo get_avatar_url($id_or_email = 'brunocordeiro180@gmail.com'); ?>" alt="Image Placeholder" class="img-fluid">
                  <div class="bio-body">
                    <h2>Gisele Araújo</h2>
                    <p><?php echo get_the_author_meta('description', get_user_by('email', 'brunocordeiro180@gmail.com')->ID); ?></p>
                    
                    <p class="social">
                      <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                    </p>
                  </div>
                </div>
              </div>
              <!-- END sidebar-box -->  
              <div class="sidebar-box">
                <h3 class="heading">Mais acessados</h3>
                
                <div class="post-entry-sidebar">
                  <ul>
                    <?php 
                    $query  = new WP_Query(array(
                      'posts_per_page' => 3,
                      'meta_key' => 'my_post_viewed',
                      'orderby' => 'meta_value_num',
                      'order'=> 'DESC'
                    ));
                    while($query->have_posts()){ ?>
                      <?php $query->the_post(); 
                      $image = get_field('imagem'); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo $image['url']; ?>" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4><?php the_title(); ?></h4>
                          <div class="post-meta">
                            <span class="mr-2"><?php echo get_the_date('d-m-Y'); ?></span>
                          </div>
                        </div>
                      </a>
                    </li>
                    <?php } wp_reset_postdata();  ?> 
                  </ul>
                </div>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Categorias</h3>
                <?php
                  $categories = get_categories( array(
                      'orderby' => 'name',
                      'order'   => 'ASC'
                  ) ); 
                ?> 
                <ul class="categories">
                  <?php foreach( $categories as $category ) {  ?>
                  <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?><span>(<?php echo $category->count; ?>)</span></a></li>
                  <?php } wp_reset_postdata(); ?>
                </ul>
              </div>
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Tags</h3>
                <?php $post_tags = get_tags(); ?> 
                <ul class="tags">
                  <?php foreach ($post_tags as $tag) { ?>
                    <li><a href="#"><?php echo $tag->name; ?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>
    
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
    <?php get_footer(); ?>
    <!-- loader -->

    