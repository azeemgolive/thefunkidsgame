<img class="img-responsive storyadd1" alt="" src="images/right-page.jpg">
<div class="recent-discussions">
  <h2>Recent Discussions</h2>
  <ul>
 <?php 
 $recent_posts=getRecentThreadPost();
 if($recent_posts>0)
 {
     while($recent_post=  mysql_fetch_array($recent_posts))
     {
       $recent_post_users=  getUserById($recent_post['user_id']);
       $recent_post_user=  mysql_fetch_array($recent_post_users);
?>         
      
   <li>
      <div class="picture main-column-picture">
        <div class="post-count"><span class="sprite count"><?php $post=countPostByUserId($recent_post_user['user_id']); 
$totalpost=  mysql_fetch_array($post);
echo $totalpost[0];?> </span></div>
        <div class="discuss-name"><a href="mom-forum-thread-<?php echo $recent_post['thread_seo']; ?>" class="topic"><?php echo $recent_post['thread_name']; ?></a><br/> <span class="date"><?php echo date("d-m-y",  strtotime($recent_post['createdAt'])); ?> by </span> <a href="mom-forum-thread-<?php echo $recent_post['thread_seo']; ?>" class="author"><?php if($recent_post_user['user_name']==""){ echo $recent_post_user['name'];}else{ echo $recent_post_user['user_name'];}  ;?> </a></div>
      </div>
    </li>
<?php
   }
 } 
 ?> 
    
  </ul>
</div>
<div class="fb-page" data-href="https://www.facebook.com/TheFunKidsCo" data-width="270" data-height="600" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
  <div class="fb-xfbml-parse-ignore">
    <blockquote cite="https://www.facebook.com/TheFunKidsCo"><a href="https://www.facebook.com/TheFunKidsCo">Thefunkids.com</a></blockquote>
  </div>
</div>
