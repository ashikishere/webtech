<?php 

if (isset($post_id)) {
    $id           = $post_id ;
    $all_comments = $homeObj->display_comments($id);
}

?>

<div class="col-lg-12">
    <div class="sidebar-item comments">
        <div class="sidebar-heading">
            <h2>2 comments</h2>
        </div>
        <div class="content">
            <ul>

                <?php 
            
            while ($row = mysqli_fetch_assoc($all_comments)) {
                $cmt_id              = $row['cmt_id'];
                $cmt_post_id         = $row['cmt_post_id'];
                $cmt_name            = $row['cmt_name'];
                $cmt_email           = $row['cmt_email'];
                $cmt_msg             = $row['cmt_msg'];
                $cmt_status          = $row['cmt_status'];
                $cmt_date            = $row['cmt_date'];
                $cmt_image           = $row['cmt_image'];

                ?>
                <li>
                    <div class="author-thumb">
                        <img src="images/comment.jpg" alt="Comment Profile">
                    </div>
                    <div class="right-content">
                        <h4><?php echo $cmt_name; ?><span><?php echo $cmt_date; ?></span></h4>
                        <p><?php echo $cmt_msg; ?>
                        </p>
                    </div>
                </li>

                <?php
            }
            ?>
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="sidebar-item submit-comment">
        <div class="sidebar-heading">
            <h2>Your comment</h2>
        </div>
        <div class="content">
            <form id="comment" action="#" method="post">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <fieldset>
                            <input name="name" type="text" id="name" placeholder="Your name" required="">
                        </fieldset>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <fieldset>
                            <input name="email" type="text" id="email" placeholder="Your email" required="">
                        </fieldset>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <fieldset>
                            <input name="subject" type="text" id="subject" placeholder="Subject">
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <textarea name="message" rows="6" id="message" placeholder="Type your comment"
                                required=""></textarea>
                        </fieldset>
                    </div>
                    <div class="col-lg-12">
                        <fieldset>
                            <button type="submit" id="form-submit" class="main-button">Submit</button>
                        </fieldset>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>