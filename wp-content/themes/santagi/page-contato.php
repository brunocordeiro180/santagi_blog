<?php get_header(); ?>


    <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h1>Me mande um email</h1>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            
            <form action="#" method="post">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Nome</label>
                      <input type="text" id="name" class="form-control ">
                    </div>
                    <div class="col-md-12 form-group">
                      <label for="phone">Phone</label>
                      <input type="text" id="phone" class="form-control ">
                    </div>
                    <div class="col-md-12 form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" class="form-control ">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>
                  </div>
                </form>
            

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
                  <?php } ?>
                </ul>
              </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
                <?php $tags_all = get_tags(); ?> 
                <?php foreach($tags_all as $tag) { ?>
                    <li><a href=""><?php echo $tag->name; ?></a></li>
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