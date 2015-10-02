<?php
function fb_count() {
		global $fbcount;
		$facebook = file_get_contents('http://api.facebook.com/restserver.php?method=post&urls=http://www.thefunkids.com/');
		$fbbegin = '<share_count>'; $fbend = '</share_count>';
		$fbpage = $facebook;
		$fbparts = explode($fbbegin,$fbpage);
		$fbpage = $fbparts[1];
		$fbparts = explode($fbend,$fbpage);
		$fbcount = $fbparts[0];
		if($fbcount == '') { $fbcount = '0'; }
}
		
function twit_count() {	
		global $tcount;
		$twit = file_get_contents('http://twitter.com/users/show/daddydesign.xml');
		$begin = '<followers_count>'; $end = '</followers_count>';
		$page = $twit;
		$parts = explode($begin,$page);
		$page = $parts[1];
		$parts = explode($end,$page);
		$tcount = $parts[0];
		if($tcount == '') { $tcount = '0'; }
}		
?>