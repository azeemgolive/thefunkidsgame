<?php
//------------------------Variable for Server name,Database,User name,Password--------------------------------
error_reporting(E_ALL ^ E_DEPRECATED);
//------------------------Variable for Server name,Database,User name,Password--------------------------------
    $adb ="tfkids_fun";
    $db_server ="localhost";
    $db_user = "tfkids_fungame";
    $db_password = "]#4[ZI1Gipe6";
 $link_db=mysql_connect($db_server,$db_user,$db_password);
 if(!$link_db) {
        die('Failed to connect to server: ' . mysql_error());
    }
 $db=mysql_select_db($adb,$link_db);    
    if(!$db) {
        die('Unable to select database:'.mysql_error());
    }
    
 $base_url='http://thefunkids.com/beta/email_activation/';
//-------------------------------sql injection and remove space and slashes---------------------------------------
  function clean($str){
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}

function generateCode($characters) {
		/* list all possible characters, similar looking characters and vowels have been removed */
		$possible = '1234567890abcdfghjkmnpqrstvwxyz';
		$code = '';
		$i = 0;
		while ($i < $characters) { 
			$code .= substr($possible, mt_rand(0, strlen($possible)-1), 4);
			$i++;
		}
		return $code;
	}

//---------------------------------------------User Regitration Method---------------------------------------------
//---------------------------------------------User Regitration Method---------------------------------------------
//---------------------------------------------User Regitration Method---------------------------------------------
function registerUser($name,$gender,$email,$location,$phone_number,$password,$activation,$verificationcode)
{
    $createdAt=  date("Y-m-d");
    $updatedAt=  date("Y-m-d");   
    $query="insert into users(name,email,mobile_number,password,address,gender,createdAt,updatedAt,isActive,verificationcode,activation) values('$name','$email','$phone_number','$password','$location','$gender','$createdAt','$updatedAt','no','$verificationcode','$activation')";
    mysql_query($query) or die(mysql_error());
}


//------------------------------Email Sending----------------------------------------------------------------------
function sendEmail($email)
{
    
}

//------------------------------User login----------------------------------------------------------------------
function userLogin($email,$password)
{
    $query="select user_id,name,email,mobile_number,password,country_id,state_id,city_id,address,gender,userimages,createdAt,updatedAt,isActive,user_name from users where (email='$email' or user_name='$email') AND password='$password'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//------------------------------get user By Id-------------------------------------------------------------------
function getUserById($user_id)
{
    $query="select user_id,name,email,mobile_number,password,country_id,state_id,city_id,address,gender,userimages,createdAt,updatedAt,isActive,verificationcode,Fuid,user_name from users where user_id=$user_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}


function resetPassword($userId,$email,$password,$verificationcode)
{           	
   	$query="update users set password='$password',verificationcode='$verificationcode' where user_id=$userId";
	mysql_query($query) or die(mysql_error());
}

function updateUserImage($user_id,$user_image)
{
    $updatedAt=  date("Y-m-d"); 
    $query="update users set userimages='$user_image',updatedAt='$updatedAt' where user_id=$user_id";
    mysql_query($query) or die(mysql_error());
}
//------------------------------get user by email----------------------------------------------------------------------
//------------------------------get user by email----------------------------------------------------------------------
function getUserByEmail($email)
{
    $query="select user_id,name,email,mobile_number,password,totalkids,kidsage,user_interest,fav_past_time,country_id,state_id,city_id,address,gender,userimages,createdAt,updatedAt,isActive,verificationcode,user_name,Fuid,birth_date from users where email='$email'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//-------------------------------Add] Face Book User in Database---------------------------------------------------------
function addfbuser($username,$email){
   $createdAt=  date("Y-m-d");
    $updatedAt=  date("Y-m-d");
    $query="insert into users(name,email,createdAt,updatedAt) values ('$username','$email','$createdAt','$updatedAt')";
    mysql_query($query) or die(mysql_error());
}


//--------------------------------update User--------------------------------------------------------------------------
function updateUser($user_id,$name,$email,$gender,$mobile_number,$user_interest,$location,$totalkids,$kidsage,$user_name,$birth_date)
{
    $updatedAt=  date("Y-m-d");
    $query="update users set name='$name',email='$email',mobile_number='$mobile_number',totalkids='$totalkids',kidsage='$kidsage',user_interest='$user_interest',address='$location',gender='$gender',updatedAt='$updatedAt',user_name='$user_name',birth_date='$birth_date' where user_id=$user_id";
     mysql_query($query) or die(mysql_error());
}
//-------------------------------change password------------------------------------------------------------------------
function changePassword($email,$password)
{
    
}

//------------------get All Games-------------------------------------------------------------------------------
function getAllGames()
{
    $query="select game_id,game_name,game_image,game_file,isActive,isFeatured,createdAt,updateAt,seo_game,game_home_image from games where isActive='yes'  order by createdAt limit 0,4";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//------------------------------get Rhyme By ID------------------------------------------------------------------------
function getRhymeById($rhyme_id)
{
    $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,rhyme_seo,rhyme_title,meta_tag_keyword,meta_tag_description,rhyme_home_image,rhyme_seo_decription from rhymes where rhyme_id=$rhyme_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//----------------------get Featured  Rhymes-------------------------------------------------------------------------
function getAllFeaturedRhymes()
{
    $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,rhyme_seo from rhymes where isFeatured='yes' order by isFeatured  limit 0,3";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//------------------------------get Rhyme By SEO------------------------------------------------------------------------
function getRhymeBySeo($rhyme_id)
{
   $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,rhyme_seo,rhyme_title,meta_tag_keyword,meta_tag_description,rhyme_seo_decription from rhymes where rhyme_seo='$rhyme_id'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//-----------------------------------------get Rhymes------------------------------------------------------------------
function getRhymes()
{
    $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,rhyme_seo from rhymes where isActive='yes' order by createdAt";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//---------------------------------get Rhymes Add---------------------------------------------------------------------
function getAllRhymesAdds()
{
    $query="select rhyme_add_id,rhyme_add_name,rhyme_add_image,createdAt,updatedAt,isActive from rhymesadds where isActive='yes' order by createdAt  limit 0,2";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}



//----------------------------------------add Contact Us Users in Database----------------------------------------
function addUser($name,$email,$comments)
{
    $createdAt=date("YY-mm-dd");
    $query="insert into user(name,email,createdAt,comments) values('$name','$email','$createdAt','$comments')";
    mysql_query($query) or die(mysql_error());    
}
 
//------------------------------get All user  List--------------------------------------------
function getAllContatUsers()
{
   $query="select user_id,name,email,createdAt,comments from user"; 
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//----------------------------get user By Id---------------------------------------------------

function getContactUserById($user_id)
{
    $query="select user_id,name,email,createdAt,comments from user where user_id=$user_id"; 
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//------------------------------delete User---------------------------------------------------
function deleteContactUser($user_id)
{
    $query="delete from user where user_id=$user_id";
    mysql_query($query) or die(mysql_error());
}

//-----------------------------get All Active menus-------------------------------------------

function getAllTopMenus()
{
    $query="select menuid,menuname,menuimage,isActive,menulink,createdAt,updateAt from 	topmenu where isActive='yes'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}


function getTopMenuById($menuid)
{
    $query="select menuid,menuname,menuimage,isActive,menulink,createdAt,updateAt from 	topmenu where isActive='yes' AND menuid=$menuid";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//-----------------------------------get right Add-------------------------------------------------------------
function getAllRightAdds()
{
   $query="select adds_id,add_name,adds_image,createdAt,updatedAt,isActive from leftaddense limit 0,1";
   $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}

//-----------------------------Add Rhyme COmments----------------------------------------------------------------
function addrhymecomment($rhyme_id,$comments,$user_id)
{
   $createdAt=date("Y-m-d");
   $updatedAt=date("Y-m-d");
   $query="insert into rhymes_comment(rhyme_id,comments,createdAt,updatedAt,user_id) values($rhyme_id,'$comments','$createdAt','$updatedAt',$user_id)";
   mysql_query($query) or die(mysql_error());
}
//--------------------------------get All Approved Rhyme Comments-------------------------------------------------------

function getApproveRhymeComment($rhyme_id)
{
  $query="select rhyme_comment_id,rhyme_id,comments,createdAt,updatedAt,isActive,user_id from rhymes_comment where rhyme_id=$rhyme_id";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;  
}
//---------------------get All Featured Rhymes------------------------------------------------------------------------
function getFeaturedRhymes()
{
    $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription from featuredrhymes where isActive='yes' order by createdAt";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//---------------------------function get All Topics-------------------------------------------------------
function getAllTopics()
{
   $query="select user_id,topic_id,topic_name,createdAt,updatedAt,isActive,topic_description from topics where isActive='yes'";
   $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//----------------------------------Add Topics----------------------------------------------------------------------
function addNewTopic($user_id,$topic_name,$topic_description)
{
    $createdAt=  date("Y-m-d");
   $updatedAt=  date("Y-m-d"); 
    $query="insert into topics (user_id,topic_name,createdAt,updatedAt,topic_description) values($user_id,'$topic_name','$createdAt','$updatedAt','$topic_description')";
    mysql_query($query) or die(mysql_error());
}



//-----------------------------get topics by id------------------------------------------------------------------
function getTopicById($topic_id)
{
    $query="select user_id,topic_id,topic_name,createdAt,updatedAt,isActive,topic_description from topics where topic_id=$topic_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//------------------------------Add New Top comments----------------------------------------------------------------
function addNewTopicComment($user_id,$topic_id,$comments)
{
   $createdAt=  date("Y-m-d");
   $updatedAt=  date("Y-m-d"); 
   $query="insert into comments(user_id,topic_id,comment,createdAt,updatedAt) values($user_id,$topic_id,'$comments','$createdAt','$updatedAt')";
   mysql_query($query) or die(mysql_error());
   
}

function getTopicCommentByTopicId($topic_id)
{
   $query="select user_id,topic_id,comments_id,comment,createdAt,updatedAt,isApproved from comments where isApproved='yes'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}


//-----------------------------Add Game COmments----------------------------------------------------------------
function addGamecomment($game_id,$comments,$user_id)
{
   $createdAt=date("Y-m-d");
   $updatedAt=date("Y-m-d");
   $query="insert into games_comment(game_id,comments,createdAt,updatedAt,user_id) values($game_id,'$comments','$createdAt','$updatedAt',$user_id)";
   mysql_query($query) or die(mysql_error());
}
//--------------------------------get All Approved Games Comments-------------------------------------------------------

function getApproveGameComment($game_id)
{
  $query="select game_comment_id,game_id,comments,createdAt,updatedAt,isActive,user_id from games_comment where game_id=$game_id order by game_comment_id DESC";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;  
}
//-------------------------------get Random Featured Rhymes------------------------------------------------------
function getRandomFeaturedRhymes()
{
  $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription from featuredrhymes order by RAND() LIMIT 0,1";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;
}
//---------------------------------get Random Featured Games-----------------------------------------------------
function getRandomFeaturedGames()
{
    $query="select game_id,game_name,game_image,game_file,isActive,isFeatured,createdAt,updateAt from games order by RAND() LIMIT 0,1";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

function getOneRandomRhymes()
{
  $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription from featuredrhymes order by RAND() LIMIT 0,1";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;
}

//---------------------------get Four random games---------------------------------------------------------------
function getFourRandGames()
{
    $query="select game_id,game_name,game_image,game_file,isActive,isFeatured,createdAt,updateAt,seo_game from games order by RAND() LIMIT 0,4";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//---------------------------get Four random rhymes---------------------------------------------------------------
function getFourRandRhymes()
{
  $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,rhyme_seo from rhymes order by RAND() LIMIT 0,4";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;
}


//----------------------------------Add Topics----------------------------------------------------------------------
function addNewThread($user_id,$topic_name,$topic_description,$topic_image)
{
    $createdAt=  date("Y-m-d");
   $updatedAt=  date("Y-m-d"); 
    $query="insert into topics (user_id,topic_name,topic_image,createdAt,updatedAt,topic_description) values($user_id,'$topic_name','$topic_image','$createdAt','$updatedAt','$topic_description')";
    mysql_query($query) or die(mysql_error());
}
//----------------------------get Comments by Topic ID-----------------------------------------------------------
function getCommentByTopicId($topic_id)
{
  $query="select user_id,topic_id,comments_id,comment,createdAt,updatedAt,isApproved from comments where topic_id=$topic_id";
  $result=  mysql_query($query) or die(mysql_error());
  return $result; 
}
//------------------------------------------get ALl Mom Topics------------------------------------------------
function getAllMoomTopics()
{
    $query="select user_id,topic_id,topic_name,createdAt,updatedAt,isActive,topic_description from topics";
   $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

function getLatestComment()
{
  $query="select user_id,topic_id,comments_id,comment,createdAt,updatedAt,isApproved from comments order by createdAt limit 0,1";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;  
}

//-----------------------------------get featured product---------------------------------------------------
function getfeaturedRhymeHome()
{
  $query="select select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,slider_image from rhymes where slider_image!=' '" ; 
  $result=  mysql_query($query) or die(mysql_error());
  return $result; 
}


//-----------------------------------get featured product---------------------------------------------------
function getfeaturedGamesHome()
{
   $query="select game_id,game_name,game_image,game_file,isActive,isFeatured,createdAt,updateAt from games where slider_image!=' '";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//----------------------------------
function getRandomSliderRhymes()
{
  $query="select rhyme_id,rhyme_name,rhyme_image,slider_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,slider_image,rhyme_seo from rhymes where slider_image!=' ' order by RAND() LIMIT 0,4" ; 
  $result=  mysql_query($query) or die(mysql_error());
  return $result;   
}
//------------------------------------get Random Slider Home Page Games-----------------------------------------------
function getRandomSliderGames()
{
    $query="select game_id,game_name,game_image,slider_image,game_file,isActive,isFeatured,createdAt,updateAt,seo_game from games where slider_image!=' ' order by RAND() LIMIT 0,4";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//-------------------------------get Random Slider Home Page Puzzle--------------------------------------------------
function getRandomSliderPuzzles()
{
    $query="select puzzle_id,puzzle_name,puzzle_image,puzzle_file,isActive,isFeatured,createdAt,updateAt,slider_image,seo_puzzle from puzzles where slider_image!=' ' order by RAND() LIMIT 0,2";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//-----------------------------------------get Random Game----------------------------------------------------------------
function getRandomGamesForGame()
{
    $query="select game_id,game_name,game_image,game_file,slider_image,isActive,isFeatured,createdAt,updateAt,seo_game from games order by RAND() LIMIT 0,4";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//-----------------------------------------get Random Puzzles------------------------------------------------------------
function getRandomGamesForPuzzles()
{
   $query="select puzzle_id,puzzle_name,puzzle_image,puzzle_file,isActive,isFeatured,createdAt,updateAt,slider_image,seo_puzzle from puzzles where slider_image!=' ' LIMIT 0,4";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}


//--------------------------------get Mom Forum-------------------------------------------------------------
function getAllMomForum()
{
   $query="select mom_forum_id,mom_forum_title,isActive,isStrict,createdAt,updatedAt,mom_formum_seo from momforum where isStrict='no' order by mom_forum_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//--------------------------get strict mom forum------------------------------------------------------------
function getStrictMomForum()
{
   $query="select mom_forum_id,mom_forum_title,isActive,isStrict,createdAt,updatedAt,mom_formum_seo from momforum where isStrict='yes' order by mom_forum_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}
//------------------------get Sub Forum By Forum Id----------------------------------------------------
function getSubForumByForumId($mom_forum_id)
{
   $query="select mom_forum_id,mom_sub_forum_id,mom_sub_forum_title,isActive,isStrict,createdAt,updatedAt,momforum_seo,subforum_simlies from momsubforum where mom_forum_id=$mom_forum_id and isStrict='no' order by mom_sub_forum_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}
//---------------------------------get strict sub forum--------------------------------------------------------
function getStrictSubForumByForumId($strict_mom_forum_id)
{
   $query="select mom_forum_id,mom_sub_forum_id,mom_sub_forum_title,isActive,isStrict,createdAt,updatedAt,momforum_seo,subforum_simlies from momsubforum where mom_forum_id=$strict_mom_forum_id and isStrict='yes' order by mom_sub_forum_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}
//--------------------------get Latest Thread By Sub Forum-------------------------------------------
function getLastThreadBySubForum($mom_sub_forum_id)
{
  $query="select mom_sub_forum_id,user_id,thread_id,thread_name,thread_message,thread_tags,thread_trackback,createdAt,updatedAt,isActive from forum_threads where mom_sub_forum_id=$mom_sub_forum_id order by thread_id desc limit 0,1";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;  
}

//--------------------------------get thread by topic----------------------------------------------------
function getThreadsByTopic($mom_sub_forum_id)
{
  $query="select mom_sub_forum_id,user_id,thread_id,thread_name,thread_message,thread_tags,thread_trackback,createdAt,updatedAt,isActive from forum_threads where mom_sub_forum_id=$mom_sub_forum_id";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;    
}
//-------------------------------count all posts-----------------------------------------------------------------
function countAllPostBySubForum($mom_sub_forum_id)
{
   $query="select COUNT(thread_reply_id) from forum_replies where mom_sub_forum_id=$mom_sub_forum_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}
//--------------------------------get Subforum By Id-------------------------------------------------------------
function getSubForumById($sub_forum_id)
{
    $query="select mom_forum_id,mom_sub_forum_id,mom_sub_forum_title,isActive,isStrict,createdAt,updatedAt from momsubforum where mom_sub_forum_id=$sub_forum_id order by createdAt";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//------------------------------------get Strict thread Forum Id--------------------------------------------------------
function getStrictThreadsBySubForumId($sub_forum_id)
{
  $query="select mom_sub_forum_id,user_id,thread_id,thread_name,isStrict,thread_message,thread_tags,thread_trackback,createdAt,updatedAt,isActive,thread_seo,thread_image from forum_threads where mom_sub_forum_id=$sub_forum_id and isStrict='yes'  order by thread_id DESC";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;
}


//------------------------------------get thread Forum Id--------------------------------------------------------
function getThreadsBySubForumId($sub_forum_id)
{
  $query="select mom_sub_forum_id,user_id,thread_id,thread_name,thread_message,thread_tags,thread_trackback,createdAt,updatedAt,isActive,thread_seo,thread_image from forum_threads where mom_sub_forum_id=$sub_forum_id and isStrict='no' order by thread_id DESC";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;
}
//--------------------------------Add new Thread--------------------------------------------------------------------
function addnewThreads($sub_forum_id,$user_id,$thread_name,$thread_message,$thread_seo)
{
  $createdAt=  date("Y-m-d");
   $updatedAt=  date("Y-m-d");   
   $query="insert into forum_threads(mom_sub_forum_id,user_id,thread_name,thread_message,createdAt,updatedAt,thread_seo,isActive)values($sub_forum_id,$user_id,'$thread_name','$thread_message','$createdAt','$updatedAt','$thread_seo','no')";
    mysql_query($query) or die(mysql_error());
}
//-----------------------------------count threads by fourm id--------------------------------------------------
function countAllThreadsBySubForum($mom_sub_forum_id)
{
   $query="select COUNT(thread_id) FROM forum_threads where mom_sub_forum_id=$mom_sub_forum_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}
//----------------------------get thread By Id----------------------------------------------------
function getThreadById($thread_id)
{
   $query="select mom_sub_forum_id,user_id,thread_id,thread_name,thread_message,thread_tags,thread_trackback,createdAt,updatedAt,isActive,thread_image,thread_seo from forum_threads where thread_id=$thread_id";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;  
}
//-----------------------------count post by User Id------------------------------------------------
function countPostByUserId($user_id)
{
   $query="select COUNT(thread_reply_id) FROM forum_replies where user_id=$user_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}


//--------------------------------Add new Thread--------------------------------------------------------------------
function addNewThreadReplys($thread_id,$user_id,$thread_name,$thread_message,$mom_sub_forum_id,$thread_image)
{
  $createdAt=  date("Y-m-d");
   $updatedAt=  date("Y-m-d"); 
    if($thread_image==" ") $thread_image="";
    $query="insert into forum_replies(threadd_id,user_id,reply_name,reply_message,createdAt,updatedAt,reply_image,reply_type,mom_sub_forum_id,isActive)values($thread_id,$user_id,'$thread_name','$thread_message','$createdAt','$updatedAt','$thread_image','reply',$mom_sub_forum_id,'no')";
    mysql_query($query) or die(mysql_error());
}

//-------------------------------------
function addNewQuickThreadReplys($thread_id,$user_id,$thread_name,$thread_message,$mom_sub_forum_id,$thread_image)
{
   $createdAt=  date("Y-m-d");
   $updatedAt=  date("Y-m-d"); 
    if($thread_image==" ") $thread_image="";
    $query="insert into forum_replies(threadd_id,user_id,reply_name,reply_message,createdAt,updatedAt,reply_image,reply_type,mom_sub_forum_id,isActive)values($thread_id,$user_id,'$thread_name','$thread_message','$createdAt','$updatedAt','$thread_image','quote',$mom_sub_forum_id,'no')";
    mysql_query($query) or die(mysql_error());
}
//-----------------------------------count threads by fourm id--------------------------------------------------
function countAllRepliesByThrea($thread_id)
{
   $query="select COUNT(thread_reply_id) FROM forum_replies where 	threadd_id=$thread_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}

//
function getAllReplyPostByThread($thread_id)
{
   $query="select threadd_id,user_id,thread_reply_id,reply_name,reply_message,reply_tags,reply_trackback,createdAt,updatedAt,isActive,reply_image from forum_replies where threadd_id=$thread_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

function getReplyByThreadByQoute($thread_id)
{
  $query="select threadd_id,user_id,thread_reply_id,reply_name,reply_message,reply_tags,reply_trackback,createdAt,updatedAt,isActive,reply_image,reply_type from forum_replies where threadd_id=$thread_id and reply_type='quote'";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;
}

function getReplyByThreadByReply($thread_id)
{
  $query="select threadd_id,user_id,thread_reply_id,reply_name,reply_message,reply_tags,reply_trackback,createdAt,updatedAt,isActive,reply_image,reply_type from forum_replies where threadd_id=$thread_id and reply_type='reply'";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;  
}

//-----------------------count thread replies-----------------------------------

function countAllRepliesByThread($thread_id)
{
   $query="select COUNT(thread_reply_id) FROM forum_replies where threadd_id=$thread_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}

//----------------------------------get Comment By ID----------------------------------------------------------
function getRhymeCommentById($rhyme_comment_id)
{
   $query="select rhyme_comment_id,rhyme_id,comments,createdAt,updatedAt,isActive,user_id from rhymes_comment where rhyme_comment_id=$rhyme_comment_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//-------------------------------------update rhyme comments------------------------------------------
function updateRhymecomment($rhyme_comment_id,$rhyme_id,$comments,$user_id)
{
  $query="update rhymes_comment set rhyme_id=$rhyme_id,comments='$comments',user_id=$user_id where rhyme_comment_id=$rhyme_comment_id";
  mysql_query($query) or die(mysql_error()); 
}

//-------------------------------delete Rhyme Comments---------------------------------------------
function deleteRhymeComment($rhyme_comment_id)
{
  $query="delete from rhymes_comment where rhyme_comment_id=$rhyme_comment_id";
  mysql_query($query) or die(mysql_error()); 
}

//----------------------------------get All Stories------------------------------------------------
function getAllStories()
{
    $query="select story_id,story_name,story_image,createdAt,updatedAt,isActive,isFeatured,story_code,story_decription,slider_image,seo_story from stories order by story_id limit 0,4";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}


//-----------------------------------------get Random Game----------------------------------------------------------------
function getRandomStoriesForStories()
{
    $query="select story_id,story_name,story_image,createdAt,updatedAt,isActive,isFeatured,story_code,story_decription,slider_image,seo_story from stories order by RAND() LIMIT 0,4";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

function getStoriesForStories()
{
  $query="select story_id,story_name,story_image,createdAt,updatedAt,isActive,isFeatured,story_code,story_decription,slider_image,seo_story from stories order by RAND()";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;  
}

    
        //------------------------------get game comment by ID------------------------------------------------------------------------
function getGameCommentById($game_comment_id)
{
    $query="select game_comment_id,game_id,comments,createdAt,updatedAt, isActive, user_id from games_comment where game_comment_id=$game_comment_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
    
}

function updateCommentGame($game_comment_id,$game_id,$comments,$user_id)
{
  $query="update games_comment set game_id=$game_id,comments='$comments',user_id=$user_id where game_comment_id=$game_comment_id";
  mysql_query($query) or die(mysql_error());
}

function deleteGameComment($game_comment_id)
{
  $query="delete from games_comment where game_comment_id=$game_comment_id";
  mysql_query($query) or die(mysql_error());
}

//---------------------------get Game By Seo----------------------------------------------------------------------
function getGameBySeo($seo)
{
   $query="select game_id,game_name,game_image,game_file,isActive,isFeatured,createdAt,updateAt,seo_game,game_title,meta_tag_keyword,meta_tag_description from games where seo_game='$seo'";
   $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//------------------------------------get Puzzle by Seo---------------------------------------------------------
function getPuzzleBySeo($seo)
{
   $query="select puzzle_id,puzzle_name,puzzle_image,puzzle_file,isActive,isFeatured,createdAt,updateAt,slider_image,seo_puzzle,puzzle_title,meta_tag_keyword,meta_tag_description from puzzles where seo_puzzle='$seo'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//-----------------------------------get Story By Seo-------------------------------------------------
function getStoryBySeo($seo)
{
    $query="select story_id,story_name,story_image,createdAt,updatedAt,isActive,isFeatured,story_code,story_decription,slider_image,seo_story,story_title,meta_tag_keyword,meta_tag_description from stories where seo_story='$seo'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//--------------------------------get Subforum By Seo-------------------------------------------------------------
function getSubForumBySeo($momforum_seo)
{
    $query="select mom_forum_id,mom_sub_forum_id,mom_sub_forum_title,isActive,isStrict,createdAt,updatedAt,momforum_seo,sub_forum_title from momsubforum where momforum_seo='$momforum_seo' order by createdAt";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//----------------------------get thread By Id----------------------------------------------------
function getThreadBySeo($seo)
{
   $query="select mom_sub_forum_id,user_id,thread_id,thread_name,thread_message,thread_tags,thread_trackback,createdAt,updatedAt,isActive,thread_image,thread_seo from forum_threads where thread_seo='$seo'";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;  
}

//-----------------------update thread--------------------------------------------------------
function updateThreads($thread_id,$thread_name,$thread_message,$thread_seo)
{
   $query="update forum_threads set thread_name='$thread_name',thread_message='$thread_message',thread_seo='$thread_seo' where thread_id=$thread_id";
   mysql_query($query) or die(mysql_error());
}   
//------------------------------delete thread---------------------------------------------------
function deletethread($thread_id){
   $query="delete from forum_threads where thread_id=$thread_id";
    mysql_query($query) or die(mysql_error());
}

//-----------------------------delete post-------------------------------------------------------
function deletethreadReply($thread_id)
{
    $query="delete from forum_replies where thread_reply_id=$thread_id";
    mysql_query($query) or die(mysql_error());
}

//--------------------------get Post By ID-----------------------------------------------------
function getThreadReplyById($thred_reply_id)
{
  $query="select threadd_id,user_id,thread_reply_id,reply_name,reply_message,reply_tags,reply_trackback,createdAt,updatedAt,isActive,reply_image,reply_type,mom_sub_forum_id from forum_replies where thread_reply_id=$thred_reply_id";  
  $result=  mysql_query($query) or die(mysql_error());
  return $result;  
}

//-----------------------------update post----------------------------------------------------
function updateThreadReplys($thread_reply_id,$thread_name,$thread_message)
{
  $createdAt=  date("Y-m-d");
  $updatedAt=  date("Y-m-d"); 
  $query="update forum_replies set reply_name='$thread_name',reply_message='$thread_message' ,updatedAt='$updatedAt' where thread_reply_id=$thread_reply_id";
  mysql_query($query) or die(mysql_error());
}

//------------------------------get approve story comment-------------------------------------------
function getApproveStoryComment($story_id)
{
   $query="select story_comment_id,story_id,comments,createdAt,updatedAt,isActive,user_id from stories_comment where story_id=$story_id"; 
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}
//---------------------------Add New Story Comments---------------------------------------------
function addStorycomment($story_id,$comments,$user_id)
{
  $createdAt=  date("Y-m-d");
  $updatedAt=  date("Y-m-d"); 
  $query="insert into stories_comment(story_id,comments,createdAt,updatedAt,isActive,user_id) values($story_id,'$comments','$createdAt','$updatedAt','no',$user_id)";  
  mysql_query($query) or die(mysql_error());
}
//------------------story for home page--------------------------------------------------------------
function getAllHomeStories()
{
   $query="select story_id,story_name,story_image,createdAt,updatedAt,isActive,isFeatured,story_code,story_decription,slider_image,seo_story,story_home_image from stories where story_home_image!='' limit 0,3";
   $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}


//----------------------Home Page Rhyme------------------------------------------------------------------
function getHomeRandomSliderRhymes()
{
  $query="select rhyme_id,rhyme_name,rhyme_image,slider_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,slider_image,rhyme_seo,rhyme_home_image from rhymes where slider_image!=' ' order by RAND() LIMIT 0,1" ; 
  $result=  mysql_query($query) or die(mysql_error());
  return $result;   
}

//------------------------------------Home Page Story-----------------------------------------------
function getHomeRandomSliderGames()
{
    $query="select game_id,game_name,game_image,slider_image,game_file,isActive,isFeatured,createdAt,updateAt,seo_game,game_home_image from games where slider_image!=' ' order by RAND() LIMIT 0,1";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//-------------------------------Home Page Puzzle--------------------------------------------------
function getHomeRandomSliderPuzzles()
{
    $query="select puzzle_id,puzzle_name,puzzle_image,puzzle_file,isActive,isFeatured,createdAt,updateAt,slider_image,seo_puzzle,puzzle_home_image from puzzles where slider_image!=' ' order by RAND() LIMIT 0,1";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//----------------------------------home page story-------------------------------------------------
function getHomeRandomSliderStory()
{
    $query="select story_id,story_name,story_image,createdAt,updatedAt,isActive,isFeatured,story_code,story_decription,slider_image,seo_story,story_home_image from stories where slider_image!='' order by RAND() limit 0,1";
   $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}

function getHomeMomForum()
{
  $query="select mom_forum_id,mom_sub_forum_id,mom_sub_forum_title,isActive,isActive,createdAt,updatedAt,momforum_seo,sub_forum_title,meta_tag_keyword,meta_tag_description from momsubforum order by RAND() limit 0,14";
  $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}

//---------------------------get 4 featured Rhymes------------------------------------------------------------------
function getAllHomeFeaturedRhymes()
{
  $query="select rhyme_id,rhyme_name,rhyme_image,createdAt,createdAt,isActive,isFeatured,rhyme_code,rhyme_decription,rhyme_seo,rhyme_home_image from rhymes where isFeatured='yes' order by RAND() limit 0,4";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;   
}

function getHomeGameRandomSliderPuzzles()
{
    $query="select puzzle_id,puzzle_name,puzzle_image,puzzle_file,isActive,isFeatured,createdAt,updateAt,slider_image,seo_puzzle,puzzle_home_image from puzzles where puzzle_home_image!=' ' order by RAND() LIMIT 0,1";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

function getUserByFaceBookId($FBID)
{
    $query="select user_id from users where Fuid=$FBID";   
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}


function getSubForumByThread($mom_sub_forum_id)
{
  $query="select mom_forum_id,mom_sub_forum_id,mom_sub_forum_title,isActive,isStrict,createdAt,updatedAt,momforum_seo from momsubforum where mom_sub_forum_id=$mom_sub_forum_id";
  $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

function getUserByUserName($user_name)
{
   $query="select user_id,name,email,mobile_number,password,country_id,state_id,city_id,address,gender,userimages,createdAt,updatedAt,isActive,verificationcode,Fuid,user_name from users where user_name='$user_name'";
    $result=  mysql_query($query) or die(mysql_error());
    return $result; 
}

//---------------------------get kid Rhymes---------------------------------------------------------
function getAllKidsGames()
{
   $query="SELECT game_id, game_name, game_image, game_file, isActive, isFeatured, createdAt, updateAt, slider_image, seo_game, game_title, meta_tag_keyword, meta_tag_description, game_home_image FROM games order by RAND() limit 0,6";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//---------------------------get kid games---------------------------------------------------------
function getAllKidsRhymes()
{
    $query="SELECT rhyme_id, rhyme_name, rhyme_image, createdAt, updatedAt, isActive, isFeatured , rhyme_code, rhyme_decription, slider_image, rhyme_seo, rhyme_title, meta_tag_keyword, meta_tag_description, rhyme_home_image FROM rhymes order by RAND() limit 0,6";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//---------------------------get kid stories---------------------------------------------------------
function getAllKidStories()
{
    $query="SELECT story_id, story_name, story_image, createdAt, updatedAt, isActive, isFeatured, story_code, story_decription, slider_image, seo_story , story_title, meta_tag_keyword, meta_tag_description , story_home_image FROM stories order by RAND() limit 0,6";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//---------------------------get kid Puzzles---------------------------------------------------------
function getAllKidPuzzles()
{
    $query="SELECT puzzle_id, puzzle_name, puzzle_image, puzzle_file, isActive, isFeatured, createdAt, updateAt, slider_image, seo_puzzle, puzzle_title, meta_tag_keyword, meta_tag_description, puzzle_home_image FROM puzzles order by RAND() limit 0,6";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//-----------------------------------get Featured games-------------------------------------------------
function getAllFeaturedGames()
{
   $query="SELECT game_id, game_name, game_image, game_file, isActive, isFeatured, createdAt, updateAt, slider_image, seo_game, game_title, meta_tag_keyword, meta_tag_description, game_home_image FROM games where isFeatured='yes' order by RAND() limit 0,8";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//----------------------------------
function getAllNewGames()
{
   $query="SELECT game_id, game_name, game_image, game_file, isActive, isFeatured, createdAt, updateAt, slider_image, seo_game, game_title, meta_tag_keyword, meta_tag_description, game_home_image FROM games order by game_id DESC";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//-------------------------get Featured Rhymes------------------------------------------------
function getKidsFeaturedRhymes()
{
   $query="SELECT rhyme_id, rhyme_name, rhyme_image, createdAt, updatedAt, isActive, isFeatured , rhyme_code, rhyme_decription, slider_image, rhyme_seo, rhyme_title, meta_tag_keyword, meta_tag_description, rhyme_home_image FROM rhymes where isFeatured='yes' order by RAND() limit 0,8";
   $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}

//-------------------------------------------get All Rhymes-----------------------------------------------
function getAllRhymes()
{
  $query="SELECT rhyme_id, rhyme_name, rhyme_image, createdAt, updatedAt, isActive, isFeatured , rhyme_code, rhyme_decription, slider_image, rhyme_seo, rhyme_title, meta_tag_keyword, meta_tag_description, rhyme_home_image FROM rhymes";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;   
}

//----------------------------------------get Featured puzzles----------------------------------------------
function getFeaturedPuzzles()
{
    $query="SELECT puzzle_id, puzzle_name, puzzle_image, puzzle_file, isActive, isFeatured, createdAt, updateAt, slider_image, seo_puzzle, puzzle_title, meta_tag_keyword, meta_tag_description, puzzle_home_image FROM puzzles order by RAND() limit 0,8";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}
//---------------------------------------get New Games-------------------------------------------------------
function getAllNewPuzzles()
{
    $query="SELECT puzzle_id, puzzle_name, puzzle_image, puzzle_file, isActive, isFeatured, createdAt, updateAt, slider_image, seo_puzzle, puzzle_title, meta_tag_keyword, meta_tag_description, puzzle_home_image FROM puzzles";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

function getPopularStories(){
    $query="SELECT story_id, story_name, story_image, createdAt, updatedAt, isActive, isFeatured, story_code, story_decription, slider_image, seo_story , story_title, meta_tag_keyword, meta_tag_description , story_home_image FROM stories WHERE isFeatured='yes' ORDER by RAND() DESC LIMIT 0,8";
    $result=mysql_query($query) or die(mysql_error());
    return $result;
}

function getStories(){
	$query="SELECT story_id, story_name, story_image, createdAt, updatedAt, isActive, isFeatured, story_code, story_decription, slider_image, seo_story , story_title, meta_tag_keyword, meta_tag_description , story_home_image FROM stories ORDER by story_id DESC";
	$result=mysql_query($query) or die(mysql_error());
	return $result;
}


//----------------------------get Story By Id------------------------------------------------------------
function getStoryById($story_id)
{
    $query="select story_id,story_name,story_image,createdAt,updatedAt,isActive,isFeatured,story_code,story_decription,slider_image,seo_story,story_title, meta_tag_keyword, meta_tag_description , story_home_image from stories where story_id=$story_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

function getStoryCommentsById($story_id)
{
    $query="select story_comment_id,story_id,comments,createdAt,updatedAt,isActive,user_id from stories_comment where story_comment_id=$story_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

function  updateStoryComment($story_comment_id,$story_id,$comments,$user_id)
{
  $query="update stories_comment set story_id=$story_id,comments='$comments',user_id=$user_id where story_comment_id=$story_comment_id";
  mysql_query($query) or die(mysql_error()); 
}

//------------------------------------get Puzzle by Id---------------------------------------------------------
function getPuzzleById($puzzle_id)
{
   $query="SELECT puzzle_id, puzzle_name, puzzle_image, puzzle_file, isActive, isFeatured, createdAt, updateAt, slider_image, seo_puzzle, puzzle_title, meta_tag_keyword, meta_tag_description, puzzle_home_image from puzzles where puzzle_id=$puzzle_id";
    $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//----------------------------------add puzzle comments-------------------------------------------------------
function addPuzzleComments($puzzle_id,$comments,$user_id)
{
   $createdAt=date("Y-m-d");
   $updatedAt=date("Y-m-d");
   $query="insert into puzzles_comment(puzzle_id,comments,createdAt,updatedAt,user_id) values($puzzle_id,'$comments','$createdAt','$updatedAt',$user_id)";
   mysql_query($query) or die(mysql_error());
}

function getApprovePuzzlesComment($puzzle_id)
{
  $query="select puzzle_comment_id,puzzle_id,comments,createdAt,updatedAt,isActive,user_id from puzzles_comment order by puzzle_comment_id DESC ";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;
}
//---------------------------get puzzle comments by Id---------------------------------------------------------
function getPuzzleCommentById($puzzle_comment_id)
{
    $query="select puzzle_comment_id,puzzle_id,comments,createdAt,updatedAt,isActive,user_id from puzzles_comment where puzzle_comment_id=$puzzle_comment_id";
  $result=  mysql_query($query) or die(mysql_error());
  return $result;
}
//------------------------------update puzzle comments-----------------------------------------------------------
function updatePuzzleComments($puzzle_comment_id,$puzzle_id,$comments,$user_id)
{
    $updatedAt=date("Y-m-d");
   $query="update puzzles_comment set puzzle_id=$puzzle_id,comments='$comments',user_id=$user_id,updatedAt='$updatedAt' where puzzle_comment_id=$puzzle_comment_id";
    mysql_query($query) or die(mysql_error());
}
//---------------------------get Game By ID----------------------------------------------------------------------
function getGameById($game_id)
{
   $query="SELECT game_id, game_name, game_image, game_file, isActive, isFeatured, createdAt, updateAt, slider_image, seo_game, game_title, meta_tag_keyword, meta_tag_description, game_home_image from games where game_id=$game_id";
   $result=  mysql_query($query) or die(mysql_error());
    return $result;
}

//----------------------------get thread recent post------------------------------------------------------------
function getRecentThreadPost()
{
   $query="select mom_sub_forum_id,user_id,thread_id,thread_name,thread_message,createdAt,updatedAt,thread_seo from forum_threads order by thread_id DESC limit 0,7";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

function deletePuzzleComment($rhyme_comment_id)
{
    $query="delete from puzzles_comment where puzzle_comment_id=$rhyme_comment_id";
    mysql_query($query) or die(mysql_error());
    
}
//------------------------------delete game comments----------------------------------------------------------------
function deleteGamesComment($puzzle_comment_id)
{
    $query="delete from games_comment where game_comment_id=$puzzle_comment_id";
    mysql_query($query) or die(mysql_error());
}
//-------------------------------delete story comments-----------------------------------------------
function deleteStoryComment($story_comment_id)
{
    $query="delete from stories_comment where story_comment_id=$story_comment_id";
    mysql_query($query) or die(mysql_error());
}


//-------------------------get Featured fun learn------------------------------------------------
function getKidsFeaturedFunLearn()
{
   $query="SELECT fun_learn_id, fun_learn_name, fun_learn_image, createdAt, updatedAt, isActive, isFeatured , fun_learn_code, fun_learn_decription, slider_image, fun_learn_seo, fun_learn_title, meta_tag_keyword, meta_tag_description, fun_learn_home_image FROM fun_learn where isFeatured='yes' order by RAND() limit 0,8";
   $result=  mysql_query($query) or die(mysql_error());
   return $result; 
}

//------------------------get fun learn by seo-------------------------------------------------
function getFunLearnBySeo($seo)
{
   $query="SELECT fun_learn_id, fun_learn_name, fun_learn_image, createdAt, updatedAt, isActive, isFeatured , fun_learn_code, fun_learn_decription, slider_image, fun_learn_seo, fun_learn_title, meta_tag_keyword, meta_tag_description, fun_learn_home_image FROM fun_learn where fun_learn_seo='$seo'";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}
//------------------------get fun learn Comments-----------------------------------------------
function getApproveFunLearnComment($rhyme_id)
{
   $query="select fun_learn_comment_id,fun_learn_id,comments,createdAt,updatedAt,isActive,user_id from fun_learn_comment order by fun_learn_comment_id DESC";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}
//------------------------------get fun learn by Id--------------------------

function getFunLearnById($funlearn_id)
{
   $query="SELECT fun_learn_id, fun_learn_name, fun_learn_image, createdAt, updatedAt, isActive, isFeatured , fun_learn_code, fun_learn_decription, slider_image, fun_learn_seo, fun_learn_title, meta_tag_keyword, meta_tag_description, fun_learn_home_image FROM fun_learn where fun_learn_id=$funlearn_id";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}
//-------------------------------delete fun learn comments--------------------------------------------
function deleteFunLearnComment($funlearn_comment_id)
{
    $query="delete from fun_learn_comment where fun_learn_comment_id=$funlearn_comment_id";
    mysql_query($query) or die(mysql_error());
}
//-------------------------------add fun learn comments-------------------------------------------------------
function addFunlearncomment($game_id,$comments,$user_id)
{
    $query="insert into fun_learn_comment(fun_learn_id,comments,user_id) values($game_id,'$comments',$user_id)";
    mysql_query($query) or die(mysql_error());
}
//--------------------get fun learn comments by id----------------------------------------------------------
function getFunLearnCommentsById($comemnt_id)
{
    $query="select fun_learn_comment_id,fun_learn_id,comments,createdAt,updatedAt,isActive,user_id from fun_learn_comment  where fun_learn_comment_id=$comemnt_id";
    $result=  mysql_query($query) or die(mysql_error());
   return $result;  
}
//----------------------------update fun learn comments------------------------------------------------
function updateFunlearnComments($game_comment_id,$game_id,$comments,$user_id)
{
    $query="update fun_learn_comment set comments='$comments' where fun_learn_comment_id=$game_comment_id";
    mysql_query($query) or die(mysql_error());
}

//----------------------------get thread recent post------------------------------------------------------------
function getRecentThreadPosts()
{
   $query="select mom_sub_forum_id,user_id,thread_id,thread_name,thread_message,createdAt,updatedAt,thread_seo from forum_threads order by thread_id DESC limit 0,8";
   $result=  mysql_query($query) or die(mysql_error());
   return $result;
}

//---------------------------------------------------app user register---------------------------------------------------------------------------------
function registerNewUser($name,$gender,$email,$location,$phone_number,$password,$activation,$verificationcode,$android_app,$user_name)
{
    $createdAt=  date("Y-m-d");
    $updatedAt=  date("Y-m-d");   
    $query="insert into users(name,email,mobile_number,password,address,gender,createdAt,updatedAt,isActive,verificationcode,activation,resitration_type,user_name) values('$name','$email','$phone_number','$password','$location','$gender','$createdAt','$updatedAt','no','$verificationcode','$activation','$android_app','$user_name')";
    mysql_query($query) or die(mysql_error());
}