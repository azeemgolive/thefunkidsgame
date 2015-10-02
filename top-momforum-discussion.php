<div class="top-discus-div1">
<h1 class="top-discus" style="margin:0;">TOP <span style="color:#ffa800;">DISCUSSION</span></h1>
<div class="recent-discussions" style="margin:0;">
<ul>
<?php
 $recent_posts=getRecentThreadPosts();
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
</div>