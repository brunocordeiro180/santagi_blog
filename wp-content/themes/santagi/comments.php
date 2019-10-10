<?php $max_depth = get_option('thread_comments_depth');
    $default = array(
    'add_below'  => 'comment',
    'respond_id' => 'respond',
    'reply_text' => __('Reply'),
    'login_text' => __('Log in to Reply'),
    'depth'      => 1,
    'before'     => '',
    'after'      => '',
    'max_depth'  => $max_depth
    ); ?>

<ul class="comment-list">
    <?php $comments =  get_comments(array(
                'post_id' => get_the_ID(),
                'parent' => 0
            )); ?>
    <?php if($comments){ ?>
    <?php foreach($comments as $comment){ ?>
    <li class="comment">
        <div class="vcard">
        <img src="<?php echo get_avatar_url($comment->comment_author_email ); ?>" alt="Image placeholder">
        </div>
        <div class="comment-body">
        <h3><?php echo $comment->comment_author; ?></h3>
        <div class="meta">January 9, 2018 at 2:21pm</div>
        <p><?php echo $comment->comment_content; ?></p>
        <p><?php echo comment_reply_link( $default, $comment = $comment->comment_ID, $post = get_the_ID() ); ?></p>
        </div>
        <?php 
        
            $args = array(
                'post_id'   => get_the_ID(),
                'status'    => 'approve',
                'order'     => 'ASC',
                'parent'    => get_comment_ID()
            );
            
            $child_comments = get_comments($args);

            if( $child_comments ){ ?>

            <ul class="children">
            <?php    for($i = 0; $i < sizeof($child_comments); $i++){ ?>
                <li class="comment">
                    <div class="vcard">
                    <img src="<?php echo get_avatar_url($child_comments[$i]->comment_author_email ); ?>" alt="Image placeholder">
                    </div>
                    <div class="comment-body">
                    <h3><?php echo $child_comments[$i]->comment_author; ?></h3>
                    <div class="meta">January 9, 2018 at 2:21pm</div>
                    <p><?php echo $child_comments[$i]->comment_content; ?></p>
                    </div>
            <?php } ?>
            </ul>
            <?php } ?>

    </li>
    <?php }} ?>
</ul>