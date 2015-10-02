      <header class="main-header">

        <!-- Logo -->
        <a href="dashboard.php" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Admin</b>Fun Kids</span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <?php 
              $last_thread=getThreadNotification();
              if($last_thread>0)
              {
                 $thread_last=  mysql_fetch_array($last_thread);
                 $total_thread=  countLastThreadMomForum($thread_last['thread_id']);
                 $thread_total=  mysql_fetch_array($total_thread);
                 ?>
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" alt="New Threads Notification" title="New Threads Notification">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo $thread_total['thread_id'];  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $thread_total['thread_id'];  ?> Mom Forum Threads</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <?php 
                      $threads_notification=getAllNotificationThreads($thread_last['thread_id']);
                      if($threads_notification)
                      {
                        while($thread_notification=  mysql_fetch_array($threads_notification))  
                        {
                            $thread_users=  getUserById($thread_notification['user_id']);
                            $thread_user=  mysql_fetch_array($thread_users);
                     ?>  
                        <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                              <?php
                              if($thread_user['userimages']!='')
                              {
                              ?>                              
                            <img src="../userimages/<?php echo $thread_user['userimages']; ?>" class="img-circle" alt="User Image"/>
                            <?php
                              }else
                              {
                              ?>
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                            <?php
                              }
                            ?>
                          </div>
                          <h4>
                            <?php echo $thread_notification['thread_name']; ?>
                            <small><i class="fa fa-clock-o"></i> <?php echo date("d-m-y",strtotime($thread_notification['createdAt'])); ?></small>
                          </h4>
                          
                        </a>
                      </li>
                       <?php
                        }
                      }
                      ?>
                      
                      <!-- end message -->                      
                    </ul>
                  </li>
                  <li class="footer"><a href="mom-forum-threads.php">See All Mom Forum Threads</a></li>
                </ul>
              </li>              
           <?php
              }
           ?>
              
             <?php 
             $last_rhymes=getRhymeNotification();
             if($last_rhymes>0)
             {
                 $last_rhyme=  mysql_fetch_array($last_rhymes);
                 $rhyme_notification_comments=countLastRhymeComments($last_rhyme['rhyme_comment_id']);
                 $total_rhyme_comment=  mysql_fetch_array($rhyme_notification_comments);
             ?>              
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" alt="New Threads Notification" title="New Threads Notification">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo $total_rhyme_comment['rhyme_comment_id'];  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $total_rhyme_comment['rhyme_comment_id'];  ?> rhyme comments notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                     <?php 
                      $rhymes_notification=getAllNotificationRhymes($last_rhyme['rhyme_comment_id']);
                      if($rhymes_notification)
                      {
                        while($rhyme_notification=  mysql_fetch_array($rhymes_notification))  
                        {
                            $rhymes_users=  getUserById($rhyme_notification['user_id']);
                            $rhyme_user=  mysql_fetch_array($rhymes_users);
                     ?> 
                     <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                              <?php
                              if($rhyme_user['userimages']!='')
                              {
                              ?>                              
                            <img src="../userimages/<?php echo $rhyme_user['userimages']; ?>" class="img-circle" alt="User Image"/>
                            <?php
                              }else
                              {
                              ?>
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                            <?php
                              }
                            ?>
                          </div>
                          <h4>
                            <?php echo $rhyme_notification['comments']; ?>
                            <small><i class="fa fa-clock-o"></i> <?php echo date("d-m-y",strtotime($rhyme_notification['createdAt'])); ?></small>
                          </h4>
                          
                        </a>
                      </li>                    
                      <?php
                        }
                      }
                      ?>
                      
                      
                      <!-- end message -->                      
                    </ul>
                  </li>
                  <li class="footer"><a href="rhyme_comments.php">View all game Comments</a></li>
                </ul>
              </li>                           
              <?php
             }
              ?>              
              <?php 
              $last_games=  getGameNotification();
              if($last_games>0)
              {
                 $last_game=  mysql_fetch_array($last_games);
                 $game_notification_comments=  countLastGamesComments($last_game['game_comment_id']);
                 $total_game_comment=  mysql_fetch_array($game_notification_comments);
              ?>
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" alt="New Threads Notification" title="New Threads Notification">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success"><?php echo $total_game_comment['game_comment_id'];  ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have <?php echo $total_game_comment['game_comment_id'];  ?> Game Comments Notification</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      
                        
                   <?php 
                      $games_notification=getAllNotificationGames($last_game['game_comment_id']);
                      if($games_notification)
                      {
                        while($game_notification=  mysql_fetch_array($games_notification))  
                        {
                            $games_users=  getUserById($game_notification['user_id']);
                            $game_user=  mysql_fetch_array($games_users);
                     ?> 
                     <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                              <?php
                              if($rhyme_user['userimages']!='')
                              {
                              ?>                              
                            <img src="../userimages/<?php echo $game_user['userimages']; ?>" class="img-circle" alt="User Image"/>
                            <?php
                              }else
                              {
                              ?>
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
                            <?php
                              }
                            ?>
                          </div>
                          <h4>
                            <?php echo $game_notification['comments']; ?>
                            <small><i class="fa fa-clock-o"></i> <?php echo date("d-m-y",strtotime($game_notification['createdAt'])); ?></small>
                          </h4>
                          
                        </a>
                      </li>                    
                      <?php
                        }
                      }
                      ?><!-- end message -->                      
                    </ul>
                  </li>
                  <li class="footer"><a href="game_comments.php">View all Game Comments</a></li>
                </ul>
              </li>
              <?php
              }
              ?>

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><?php if (isset($_SESSION['admin_fullname'])) echo $_SESSION['admin_fullname']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                   
                    <p>
                      <?php if (isset($_SESSION['admin_fullname'])) echo $_SESSION['admin_fullname']; ?>
                     
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Change Password</a>
                    </div>
                    <div class="pull-right">
                        <a href="admin-logout.php" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              
                 <!-- Notifications: style can be found in dropdown.less -->
              
              <!-- Tasks: style can be found in dropdown.less -->
              
              <!-- User Account: style can be found in dropdown.less -->
              
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>