<?php get_header(); ?>
<?php the_post(); ?>
<?php $categories =  get_the_category();
      $this_category_id = -1;
      $id_this = get_the_ID();
      $tags = get_the_tags(); ?>
<?php $image = get_field('imagem'); ?>
<section class="site-section py-lg">
      <div class="container">
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
          
            <img src="<?php echo $image['url']; ?>" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                        <span class="author mr-2"><img src="<?php echo get_avatar_url($post->post_author); ?>" alt="" class="mr-2"> <?php the_author(); ?></span>&bullet;
                        <span class="mr-2"><?php the_date('d-m-Y'); ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number(get_the_ID()); ?></span>
                      </div>
            <h1 class="mb-4"><?php the_title(); ?></h1>
            <?php foreach($categories as $i => $category){ ?>
                <?php if($i == 0){ $this_category_id = $category; $category_name =  $category->name;} ?>
            <a class="category mb-5" href="#"><?php echo $category->name; ?></a>
            <?php } ?>
            
           
            <div class="post-content-body">
                <?php 
                    $text = get_the_content();
                    $postwithbreaks = wpautop( $text, true);
                    echo $postwithbreaks; 
                ?>
            </div>

            
            <div class="pt-5">
              <p>Categorias:  
                  <?php foreach($categories as $i => $category){ ?>
                  <a href="#"><?php echo $category->name; ?></a>
                  <?php if($i >= 0 && $i != sizeof($categories) - 1){
                      echo ",";
                  } ?>
                  <?php } ?>
                  <?php if($tags != null){ echo "Tags: "; } ?>
                  <?php foreach($tags as $i => $tag){ ?>
                  <a href="#">#<?php echo $tag->name; ?></a>
                  <?php } ?>
            </div>


            <div class="pt-5">
              <h3 class="mb-5"><?php echo get_comments_number(get_the_ID()); ?> Comentários</h3>
              
              <?php comments_template(); ?>
              <!-- END comment-list -->
              
              <div class="comment-form-wrap pt-5">
                <!-- <h3 class="mb-5">Deixe um comentário</h3> -->
                
                <?php comment_form(); ?>

               
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

    <section class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="mb-3 ">Posts Relacionados  <?php echo $this_category_id->cat_ID; ?></h2>
          </div>
        </div>
        <?php $args = array(
                'numberposts' => 3,
                'category' => $this_category_id->cat_ID
              );
              
              $posts_related = get_posts( $args ); 
        ?>

        
        <div class="row">
        <?php foreach($posts_related as $post){ $image = get_field('imagem'); ?>
          <div class="col-md-6 col-lg-4">
            <a href="<?php the_permalink(); ?>" class="a-block sm d-flex align-items-center height-md" style="background-image: url('<?php echo $image['url']; ?>'); ">
              <div class="text">
                <div class="post-meta">
                  <span class="category"><?php echo $category->name; ?></span>
                  <span class="mr-2"><?php echo get_the_date('d-m-Y'); ?> </span> &bullet;
                  <span class="ml-2"><span class="fa fa-comments"></span> <?php echo get_comments_number(get_the_ID()); ?> </span>
                </div>
                <h3><?php the_title(); ?></h3>
              </div>
            </a>
          </div>
        <?php } wp_reset_postdata();  ?>
        </div>
      </div>


    </section>
    <!-- END section -->

<?php get_footer(); ?>
    <!-- loader -->

    