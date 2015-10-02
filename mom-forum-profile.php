<?php
session_start();
include("dbconnection.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>The FUN KIDS</title>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="css/bootstrap.min.css"/>
<link rel="stylesheet" href="css/bootstrap.css"/>
<link rel="stylesheet" href="css/styletwo.css"/> 
<link rel="stylesheet" href="css/style.css"/>
<link rel="stylesheet" href="css/styletwo.css"/>
</head>
<body>
<?php 
include_once("analyticstracking.php");
?>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=481352955356475";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<?php 
include("includes/header.php");
?>
<section>
<div class="container-fluid">
<div class="row row2">
<img src="images/BADAL1.png" alt="" class="badal"/>
</div>
</div>
</section>
<section class="second">
<div class="container">
    
  
</div>
</div>
</section>


<section class="second">
<div class="container">
<div class="row">

<?php
$email=$_SESSION['email'];
$loginuser=  getUserByEmail($email);
if($loginuser>0)
{
    $user=  mysql_fetch_array($loginuser);
    $birth_date=$user['birth_date'];
    $birth_date=explode("-",$birth_date);
    $birth_day=$birth_date[2];
    $birth_month=$birth_date[1];
    $birth_year=$birth_date[0];
}
?>
    
<div class="col-md-12 bgwhite" style="margin-top:50px;">
  <h1 class="MOTHERINGMOM">MY PROFILE</h1>

<div class="col-md-4">
<br/>
<?php 
    if($user['userimages']!='')
    {
    ?>
    <img src="userimages/<?php echo $user['userimages'];?>" alt=""/ width="230px" height="292px">
    <?php
    }else
    {
    ?>
<img src="images/pro_03.png" alt=""/>
<?php
    }
    ?>
<div id="userprofile" style="display:none">
<form method="post" action="douploadimage.php" enctype="multipart/form-data">
 <p><b>Note: </b>The maximum size of your custom image is 400 by 400 pixels or 48.8 KB (whichever is smaller)</p>   
 <input type="file" name="user_image">
    <br/>
    <input type="submit" name="submit" value="Upload"/>
</form>
</div>
</div>
  
  
<br/>
<?php 
if(isset($_REQUEST['error']))
{
?>
<div>User Name already exit please enter different user name</div>
<?php
}
?>
<div class="col-md-4" id="momforum_edit">

<input type="text" name="user_name" class="form-control" placeholder="Type your user name"  disabled="true" required value="<?php if(isset($user['user_name'])) echo $user['user_name']; ?>"/>
<br/>

<input type="text" name="name" class="form-control" placeholder="Type your name*" disabled="true" required value="<?php if(isset($user['name'])) echo $user['name']; ?>"/>
<br/>

<input type="text" name="totalkids" class="form-control" placeholder="Number of Kids*" disabled="true" required value="<?php if(isset($user['totalkids'])) echo $user['totalkids']; ?>"/>
<br/>

<select disabled name="locations" data-placeholder="Select City*" class="form-control">;
    <option value="">Select your location</option>    
    <option value="Karachi" <?php if($user['address']=='Karachi'){ ?> selected="selected" <?php }?>>Karachi</option>    
    <option value="Hyderabad" <?php if($user['address']=='Hyderabad'){ ?> selected="selected" <?php }?>>Hyderabad</option>    
    <option value="Larkana" <?php if($user['address']=='Larkana'){ ?> selected="selected" <?php }?>>Larkana</option>    
    <option value="Lahore" <?php if($user['address']=='Lahore'){ ?> selected="selected" <?php }?>>Lahore</option>    
    <option value="Multan" <?php if($user['address']=='Multan'){ ?> selected="selected" <?php }?>>Multan</option>  

<option value="Abbotabad" <?php if($user['address']=='Abbotabad'){ ?> selected="selected" <?php }?>>Abbotabad</option> 
<option value="Hasilpur" <?php if($user['address']=='Hasilpur'){ ?> selected="selected" <?php }?>>Hasilpur</option>
<option value="Mirpur Khas" <?php if($user['address']=='Mirpur Khas'){ ?> selected="selected" <?php }?>>Mirpur Khas</option>
<option value="Ahmadpur East" <?php if($user['address']=='Ahmadpur East'){ ?> selected="selected" <?php }?>>Ahmadpur East</option>
<option value="Montgomery" <?php if($user['address']=='Montgomery'){ ?> selected="selected" <?php }?>>Montgomery</option>
<option value="Arifwala" <?php if($user['address']=='Arifwala'){ ?> selected="selected" <?php }?>>Arifwala</option>
<option value="Islamabad" <?php if($user['address']=='Islamabad'){ ?> selected="selected" <?php }?>>Islamabad</option>
<option value="Moro" <?php if($user['address']=='Moro'){ ?> selected="selected" <?php }?>>Moro</option>
<option value="Attock City" <?php if($user['address']=='Attock City'){ ?> selected="selected" <?php }?>>Attock City</option>
<option value="Jacobabad" <?php if($user['address']=='Jacobabad'){ ?> selected="selected" <?php }?>>Jacobabad</option>
<option value="Badin" <?php if($user['address']=='Badin'){ ?> selected="selected" <?php }?>>Badin</option>
<option value="Jalalpur" <?php if($user['address']=='Jalalpur'){ ?> selected="selected" <?php }?>>Jalalpur</option>
<option value="Muridke" <?php if($user['address']=='Muridke'){ ?> selected="selected" <?php }?>>Muridke</option>
 
<option value="Bahawalnagar" <?php if($user['address']=='Bahawalnagar'){ ?> selected="selected" <?php }?>>Bahawalnagar</option>
<option value="Jaranwala" <?php if($user['address']=='Jaranwala'){ ?> selected="selected" <?php }?>>	Jaranwala</option>
<option value="Muzaffarabad" <?php if($user['address']=='Muzaffarabad'){ ?> selected="selected" <?php }?>>Muzaffarabad</option>
<option value="Bahawalpur" <?php if($user['address']=='Bahawalpur'){ ?> selected="selected" <?php }?>>Bahawalpur</option>
<option value="Jhang Sadr" <?php if($user['address']=='Jhang Sadr'){ ?> selected="selected" <?php }?>>Jhang Sadr</option>
<option value="Muzaffargarh" <?php if($user['address']=='Muzaffargarh'){ ?> selected="selected" <?php }?>>Muzaffargarh</option>
<option value="Bahawalpur" <?php if($user['address']=='Bahawalpur'){ ?> selected="selected" <?php }?>>Bahawalpur</option>
<option value="Jhelum" <?php if($user['address']=='Jhelum'){ ?> selected="selected" <?php }?>>Jhelum</option>
<option value="Narowal" <?php if($user['address']=='Narowal'){ ?> selected="selected" <?php }?>>Narowal</option>
<option value="Bhai Pheru" <?php if($user['address']=='Bhai Pheru'){ ?> selected="selected" <?php }?>>Bhai Pheru</option>
<option value="Kamalia" <?php if($user['address']=='Kamalia'){ ?> selected="selected" <?php }?>>Kamalia</option>
<option value="Nawabshah" <?php if($user['address']=='Nawabshah'){ ?> selected="selected" <?php }?>>Nawabshah</option>
<option value="Bhakkar" <?php if($user['address']=='Bhakkar'){ ?> selected="selected" <?php }?>>Bhakkar</option>
<option value="Kambar" <?php if($user['address']=='Kambar'){ ?> selected="selected" <?php }?>>Kambar</option>
<option value="Nowshera Cantonment" <?php if($user['address']=='Nowshera Cantonment'){ ?> selected="selected" <?php }?>>Nowshera Cantonment</option>
<option value="Bhalwal" <?php if($user['address']=='Bhalwal'){ ?> selected="selected" <?php }?>>Bhalwal</option>
<option value="Kamoke" <?php if($user['address']=='Kamoke'){ ?> selected="selected" <?php }?>>Kamoke</option>
<option value="Okara" <?php if($user['address']=='Okara'){ ?> selected="selected" <?php }?>>Okara</option>
<option value="Bhimbar" <?php if($user['address']=='Bhimbar'){ ?> selected="selected" <?php }?>>Bhimbar</option>
<option value="Kandhkot" <?php if($user['address']=='Kandhkot'){ ?> selected="selected" <?php }?>>Kandhkot</option>
<option value="Pakpattan" <?php if($user['address']=='Pakpattan'){ ?> selected="selected" <?php }?>>Pakpattan</option>
<option value="Burewala" <?php if($user['address']=='Burewala'){ ?> selected="selected" <?php }?>>Burewala</option>
<option value="Pano Aqil" <?php if($user['address']=='Pano Aqil'){ ?> selected="selected" <?php }?>>Pano Aqil</option>
<option value="Chakwal" <?php if($user['address']=='Chakwal'){ ?> selected="selected" <?php }?>>Chakwal</option>
<option value="Kasur" <?php if($user['address']=='Kasur'){ ?> selected="selected" <?php }?>>Kasur</option>
<option value="Pattoki" <?php if($user['address']=='Pattoki'){ ?> selected="selected" <?php }?>>Pattoki</option>
<option value="Chaman" <?php if($user['address']=='Chaman'){ ?> selected="selected" <?php }?>>Chaman</option>
<option value="Khairpur" <?php if($user['address']=='Khairpur'){ ?> selected="selected" <?php }?>>Khairpur</option>
<option value="Peshawar" <?php if($user['address']=='Peshawar'){ ?> selected="selected" <?php }?>>Peshawar</option>
<option value="Chichawatni" <?php if($user['address']=='Chichawatni'){ ?> selected="selected" <?php }?>>Chichawatni</option>
<option value="Khanpur" <?php if($user['address']=='Khanpur'){ ?> selected="selected" <?php }?>>Khanpur</option>
<option value="Quetta" <?php if($user['address']=='Quetta'){ ?> selected="selected" <?php }?>>Quetta</option>
<option value="Chiniot" <?php if($user['address']=='Chiniot'){ ?> selected="selected" <?php }?>>Chiniot</option>
<option value="Kharian" <?php if($user['address']=='Kharian'){ ?> selected="selected" <?php }?>>Kharian</option>
<option value="Rawalpindi" <?php if($user['address']=='Rawalpindi'){ ?> selected="selected" <?php }?>>Rawalpindi</option>
<option value="Chishtian" <?php if($user['address']=='Chishtian'){ ?> selected="selected" <?php }?>>Chishtian</option>
<option value="Khushab" <?php if($user['address']=='Khushab'){ ?> selected="selected" <?php }?>>Khushab</option>
<option value="Sadiqabad" <?php if($user['address']=='Sadiqabad'){ ?> selected="selected" <?php }?>>Sadiqabad</option>
<option value="Chuhar Kana" <?php if($user['address']=='Chuhar Kana'){ ?> selected="selected" <?php }?>>Chuhar Kana</option>
<option value="Kohat" <?php if($user['address']=='Kohat'){ ?> selected="selected" <?php }?>>Kohat</option>
<option value="Sargodha" <?php if($user['address']=='Sargodha'){ ?> selected="selected" <?php }?>>Sargodha</option>
<option value="Charsadda" <?php if($user['address']=='Charsadda'){ ?> selected="selected" <?php }?>>Charsadda</option>
<option value="Kohror Pakka" <?php if($user['address']=='Kohror Pakka'){ ?> selected="selected" <?php }?>>Kohror Pakka</option>
<option value="Shahdadkot" <?php if($user['address']=='Shahdadkot'){ ?> selected="selected" <?php }?>>Shahdadkot</option>
<option value="Dadu" <?php if($user['address']=='Dadu'){ ?> selected="selected" <?php }?>>Dadu</option>
<option value="Kot Addu" <?php if($user['address']=='Kot Addu'){ ?> selected="selected" <?php }?>>Kot Addu</option>
<option value="Sheikhu Pura" <?php if($user['address']=='Sheikhu Pura'){ ?> selected="selected" <?php }?>>Sheikhu Pura</option>
<option value="Daska" <?php if($user['address']=='Daska'){ ?> selected="selected" <?php }?>>Daska</option>
<option value="Kot Malik" <?php if($user['address']=='Kot Malik'){ ?> selected="selected" <?php }?>>Kot Malik</option>
<option value="Shikarpur" <?php if($user['address']=='Shikarpur'){ ?> selected="selected" <?php }?>>Shikarpur</option>
<option value="Dera Ghazi Khan" <?php if($user['address']=='Dera Ghazi Khan'){ ?> selected="selected" <?php }?>>Dera Ghazi Khan</option>
<option value="Kotli" <?php if($user['address']=='Kotli'){ ?> selected="selected" <?php }?>>Kotli</option>
<option value="Shorko" <?php if($user['address']=='Shorko'){ ?> selected="selected" <?php }?>>Shorko</option>
<option value="Dera Ismail Khan" <?php if($user['address']=='Dera Ismail Khan'){ ?> selected="selected" <?php }?>>Dera Ismail Khan</option>
<option value="Kotri" <?php if($user['address']=='Kotri'){ ?> selected="selected" <?php }?>>Kotri</option>
<option value="Sialkot" <?php if($user['address']=='Sialkot'){ ?> selected="selected" <?php }?>>Sialkot</option>
<option value="Dipalpur" <?php if($user['address']=='Dipalpur'){ ?> selected="selected" <?php }?>>Dipalpur</option>
<option value="Sukkur" <?php if($user['address']=='Sukkur'){ ?> selected="selected" <?php }?>>Sukkur</option>
<option value="Faisalabad" <?php if($user['address']=='Faisalabad'){ ?> selected="selected" <?php }?>>Faisalabad</option>
<option value="Swabi" <?php if($user['address']=='Swabi'){ ?> selected="selected" <?php }?>>Swabi</option>
<option value="Gilgit" <?php if($user['address']=='Gilgit'){ ?> selected="selected" <?php }?>>Gilgit</option>
<option value="Leiah" <?php if($user['address']=='Leiah'){ ?> selected="selected" <?php }?>>Leiah</option>
<option value="Tando Adam" <?php if($user['address']=='Tando Adam'){ ?> selected="selected" <?php }?>>Tando Adam</option>
<option value="Gojra" <?php if($user['address']=='Gojra'){ ?> selected="selected" <?php }?>>Gojra</option>
<option value="Lodhran" <?php if($user['address']=='Lodhran'){ ?> selected="selected" <?php }?>>Lodhran</option>
<option value="Tando Allahyar" <?php if($user['address']=='Tando Allahyar'){ ?> selected="selected" <?php }?>>Tando Allahyar</option>
<option value="Gujar Khan" <?php if($user['address']=='Gujar Khan'){ ?> selected="selected" <?php }?>>Gujar Khan</option>
<option value="Mandi Bahauddin" <?php if($user['address']=='Mandi Bahauddin'){ ?> selected="selected" <?php }?>>Mandi Bahauddin</option>
<option value="Tando Muhammad Khan" <?php if($user['address']=='Tando Muhammad Khan'){ ?> selected="selected" <?php }?>>Tando Muhammad Khan</option>
<option value="Gujranwala" <?php if($user['address']=='Gujranwala'){ ?> selected="selected" <?php }?>>Gujranwala</option>
<option value="Mardan" <?php if($user['address']=='Mardan'){ ?> selected="selected" <?php }?>>Mardan</option>
<option value="Toba Tek Singh" <?php if($user['address']=='Toba Tek Singh'){ ?> selected="selected" <?php }?>>Toba Tek Singh</option>
<option value="Gujrat" <?php if($user['address']=='Gujrat'){ ?> selected="selected" <?php }?>>Gujrat</option>
<option value="Mian Channu" <?php if($user['address']=='Mian Channu'){ ?> selected="selected" <?php }?>>Mian Channu</option>
<option value="Turbat" <?php if($user['address']=='Turbat'){ ?> selected="selected" <?php }?>>Turbat</option>
<option value="Hafizabad" <?php if($user['address']=='Hafizabad'){ ?> selected="selected" <?php }?>>Hafizabad</option>
<option value="Mianwali" <?php if($user['address']=='Mianwali'){ ?> selected="selected" <?php }?>>Mianwali</option>
<option value="Vehari" <?php if($user['address']=='Vehari'){ ?> selected="selected" <?php }?>>Vehari</option>
<option value="Harunabad" <?php if($user['address']=='Harunabad'){ ?> selected="selected" <?php }?>>Harunabad</option>
<option value="Mingora" <?php if($user['address']=='Mingora'){ ?> selected="selected" <?php }?>>Mingora</option>
<option value="Wazirabad" <?php if($user['address']=='Wazirabad'){ ?> selected="selected" <?php }?>>Wazirabad</option>
<option value="other">Other</option>
</select>
<br/>

<input type="email" name="email" class="form-control" disabled="true" placeholder="Type Your Email*" required value="<?php if(isset($user['email'])) echo $user['email']; ?>"/>
<br/>
<input type="text" name="mobile_number" class="form-control" disabled="true" placeholder="Type Your Number" value="<?php if(isset($user['mobile_number'])) echo $user['mobile_number']; ?>"/>

<br/>
<label>Date Of Birth</label>
<br/>

<select data-placeholder="" name="day_name" disabled>
<?php for($k=1;$k<31;$k++){ $a=$k; if($k<10){ $a="0$k"; } ?>
	<option value="<?php echo $a; ?>" <?php if($a==$birth_day){ echo "Selected"; } ?>><?php echo $a; ?></option>
<?php } ?>
</select>

<select data-placeholder="" name="month_name" disabled>
<option value="01" <?php if($birth_month=="01"){ echo "Selected"; } ?>>JAN</option>
<option value="02" <?php if($birth_month=="02"){ echo "Selected"; } ?>>FEB</option>
<option value="03" <?php if($birth_month=="03"){ echo "Selected"; } ?>>MARCH</option>
<option value="04" <?php if($birth_month=="04"){ echo "Selected"; } ?>>APRIL</option>
<option value="05" <?php if($birth_month=="05"){ echo "Selected"; } ?>>MAY</option>
<option value="06" <?php if($birth_month=="06"){ echo "Selected"; } ?>>JUNE</option>
<option value="07" <?php if($birth_month=="07"){ echo "Selected"; } ?>>JULY</option>
<option value="08" <?php if($birth_month=="08"){ echo "Selected"; } ?>>AUGUEST</option>
<option value="09" <?php if($birth_month=="09"){ echo "Selected"; } ?>>SEPTMBER</option>
<option value="10" <?php if($birth_month=="10"){ echo "Selected"; } ?>>OCTOBER</option>
<option value="11" <?php if($birth_month=="11"){ echo "Selected"; } ?>>NOVEMBER</option>
<option value="12"> <?php if($birth_month=="12"){ echo "Selected"; } ?>DECEMBER</option>
</select>


<select data-placeholder="" name="year_name" disabled>
<?php for($k=1920;$k<2015;$k++){ $a=$k; ?>
	<option value="<?php echo $a; ?>" <?php if($a==$birth_year){ echo "Selected"; } ?>><?php echo $a; ?></option>
<?php } ?>
</select>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br/>
<br/>
<label>Gender</label>
<br/>
<input type="radio" name="gender" disabled="true" value="male" <?php if($user['gender']=="male"){ ?> checked="checked" <?php }?>/>Male
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="gender" disabled="true" value="female" <?php if($user['gender']=="female"){ ?> checked="checked" <?php }?>/>FeMale
<br/>
<br/>
<button class="btn-lg btn-info" onclick="return momprofileedit();">
    EDIT
</button>

</div>

<div class="col-md-4" id="momprofileupdate" style="display: none;">
    <form method="post" action="doupdateprofile.php" enctype="multipart/form-data">

<input type="text" name="user_name" class="form-control" placeholder="Type your user name"  required value="<?php if(isset($user['user_name'])) echo $user['user_name']; ?>"/>
<br/>        
<input type="text" name="name" class="form-control" placeholder="Type your name*" required value="<?php if(isset($user['name'])) echo $user['name']; ?>"/>
<br/>

<input type="text" name="totalkids" class="form-control" placeholder="Number of Kids*" required value="<?php if(isset($user['totalkids'])) echo $user['totalkids']; ?>"/>
<br/>

<select name="location" id="location" onchange="return checkLocation()" class="form-control" required>;
    <option value="">Select your location</option>    
    <option value="Karachi" <?php if($user['address']=='Karachi'){ ?> selected="selected" <?php }?>>Karachi</option>    
    <option value="Hyderabad" <?php if($user['address']=='Hyderabad'){ ?> selected="selected" <?php }?>>Hyderabad</option>    
    <option value="Larkana" <?php if($user['address']=='Larkana'){ ?> selected="selected" <?php }?>>Larkana</option>    
    <option value="Lahore" <?php if($user['address']=='Lahore'){ ?> selected="selected" <?php }?>>Lahore</option>    
    <option value="Multan" <?php if($user['address']=='Multan'){ ?> selected="selected" <?php }?>>Multan</option>  

<option value="Abbotabad" <?php if($user['address']=='Abbotabad'){ ?> selected="selected" <?php }?>>Abbotabad</option> 
<option value="Hasilpur" <?php if($user['address']=='Hasilpur'){ ?> selected="selected" <?php }?>>Hasilpur</option>
<option value="Mirpur Khas" <?php if($user['address']=='Mirpur Khas'){ ?> selected="selected" <?php }?>>Mirpur Khas</option>
<option value="Ahmadpur East" <?php if($user['address']=='Ahmadpur East'){ ?> selected="selected" <?php }?>>Ahmadpur East</option>
<option value="Montgomery" <?php if($user['address']=='Montgomery'){ ?> selected="selected" <?php }?>>Montgomery</option>
<option value="Arifwala" <?php if($user['address']=='Arifwala'){ ?> selected="selected" <?php }?>>Arifwala</option>
<option value="Islamabad" <?php if($user['address']=='Islamabad'){ ?> selected="selected" <?php }?>>Islamabad</option>
<option value="Moro" <?php if($user['address']=='Moro'){ ?> selected="selected" <?php }?>>Moro</option>
<option value="Attock City" <?php if($user['address']=='Attock City'){ ?> selected="selected" <?php }?>>Attock City</option>
<option value="Jacobabad" <?php if($user['address']=='Jacobabad'){ ?> selected="selected" <?php }?>>Jacobabad</option>
<option value="Badin" <?php if($user['address']=='Badin'){ ?> selected="selected" <?php }?>>Badin</option>
<option value="Jalalpur" <?php if($user['address']=='Jalalpur'){ ?> selected="selected" <?php }?>>Jalalpur</option>
<option value="Muridke" <?php if($user['address']=='Muridke'){ ?> selected="selected" <?php }?>>Muridke</option>
 
<option value="Bahawalnagar" <?php if($user['address']=='Bahawalnagar'){ ?> selected="selected" <?php }?>>Bahawalnagar</option>
<option value="Jaranwala" <?php if($user['address']=='Jaranwala'){ ?> selected="selected" <?php }?>>	Jaranwala</option>
<option value="Muzaffarabad" <?php if($user['address']=='Muzaffarabad'){ ?> selected="selected" <?php }?>>Muzaffarabad</option>
<option value="Bahawalpur" <?php if($user['address']=='Bahawalpur'){ ?> selected="selected" <?php }?>>Bahawalpur</option>
<option value="Jhang Sadr" <?php if($user['address']=='Jhang Sadr'){ ?> selected="selected" <?php }?>>Jhang Sadr</option>
<option value="Muzaffargarh" <?php if($user['address']=='Muzaffargarh'){ ?> selected="selected" <?php }?>>Muzaffargarh</option>
<option value="Bahawalpur" <?php if($user['address']=='Bahawalpur'){ ?> selected="selected" <?php }?>>Bahawalpur</option>
<option value="Jhelum" <?php if($user['address']=='Jhelum'){ ?> selected="selected" <?php }?>>Jhelum</option>
<option value="Narowal" <?php if($user['address']=='Narowal'){ ?> selected="selected" <?php }?>>Narowal</option>
<option value="Bhai Pheru" <?php if($user['address']=='Bhai Pheru'){ ?> selected="selected" <?php }?>>Bhai Pheru</option>
<option value="Kamalia" <?php if($user['address']=='Kamalia'){ ?> selected="selected" <?php }?>>Kamalia</option>
<option value="Nawabshah" <?php if($user['address']=='Nawabshah'){ ?> selected="selected" <?php }?>>Nawabshah</option>
<option value="Bhakkar" <?php if($user['address']=='Bhakkar'){ ?> selected="selected" <?php }?>>Bhakkar</option>
<option value="Kambar" <?php if($user['address']=='Kambar'){ ?> selected="selected" <?php }?>>Kambar</option>
<option value="Nowshera Cantonment" <?php if($user['address']=='Nowshera Cantonment'){ ?> selected="selected" <?php }?>>Nowshera Cantonment</option>
<option value="Bhalwal" <?php if($user['address']=='Bhalwal'){ ?> selected="selected" <?php }?>>Bhalwal</option>
<option value="Kamoke" <?php if($user['address']=='Kamoke'){ ?> selected="selected" <?php }?>>Kamoke</option>
<option value="Okara" <?php if($user['address']=='Okara'){ ?> selected="selected" <?php }?>>Okara</option>
<option value="Bhimbar" <?php if($user['address']=='Bhimbar'){ ?> selected="selected" <?php }?>>Bhimbar</option>
<option value="Kandhkot" <?php if($user['address']=='Kandhkot'){ ?> selected="selected" <?php }?>>Kandhkot</option>
<option value="Pakpattan" <?php if($user['address']=='Pakpattan'){ ?> selected="selected" <?php }?>>Pakpattan</option>
<option value="Burewala" <?php if($user['address']=='Burewala'){ ?> selected="selected" <?php }?>>Burewala</option>
<option value="Pano Aqil" <?php if($user['address']=='Pano Aqil'){ ?> selected="selected" <?php }?>>Pano Aqil</option>
<option value="Chakwal" <?php if($user['address']=='Chakwal'){ ?> selected="selected" <?php }?>>Chakwal</option>
<option value="Kasur" <?php if($user['address']=='Kasur'){ ?> selected="selected" <?php }?>>Kasur</option>
<option value="Pattoki" <?php if($user['address']=='Pattoki'){ ?> selected="selected" <?php }?>>Pattoki</option>
<option value="Chaman" <?php if($user['address']=='Chaman'){ ?> selected="selected" <?php }?>>Chaman</option>
<option value="Khairpur" <?php if($user['address']=='Khairpur'){ ?> selected="selected" <?php }?>>Khairpur</option>
<option value="Peshawar" <?php if($user['address']=='Peshawar'){ ?> selected="selected" <?php }?>>Peshawar</option>
<option value="Chichawatni" <?php if($user['address']=='Chichawatni'){ ?> selected="selected" <?php }?>>Chichawatni</option>
<option value="Khanpur" <?php if($user['address']=='Khanpur'){ ?> selected="selected" <?php }?>>Khanpur</option>
<option value="Quetta" <?php if($user['address']=='Quetta'){ ?> selected="selected" <?php }?>>Quetta</option>
<option value="Chiniot" <?php if($user['address']=='Chiniot'){ ?> selected="selected" <?php }?>>Chiniot</option>
<option value="Kharian" <?php if($user['address']=='Kharian'){ ?> selected="selected" <?php }?>>Kharian</option>
<option value="Rawalpindi" <?php if($user['address']=='Rawalpindi'){ ?> selected="selected" <?php }?>>Rawalpindi</option>
<option value="Chishtian" <?php if($user['address']=='Chishtian'){ ?> selected="selected" <?php }?>>Chishtian</option>
<option value="Khushab" <?php if($user['address']=='Khushab'){ ?> selected="selected" <?php }?>>Khushab</option>
<option value="Sadiqabad" <?php if($user['address']=='Sadiqabad'){ ?> selected="selected" <?php }?>>Sadiqabad</option>
<option value="Chuhar Kana" <?php if($user['address']=='Chuhar Kana'){ ?> selected="selected" <?php }?>>Chuhar Kana</option>
<option value="Kohat" <?php if($user['address']=='Kohat'){ ?> selected="selected" <?php }?>>Kohat</option>
<option value="Sargodha" <?php if($user['address']=='Sargodha'){ ?> selected="selected" <?php }?>>Sargodha</option>
<option value="Charsadda" <?php if($user['address']=='Charsadda'){ ?> selected="selected" <?php }?>>Charsadda</option>
<option value="Kohror Pakka" <?php if($user['address']=='Kohror Pakka'){ ?> selected="selected" <?php }?>>Kohror Pakka</option>
<option value="Shahdadkot" <?php if($user['address']=='Shahdadkot'){ ?> selected="selected" <?php }?>>Shahdadkot</option>
<option value="Dadu" <?php if($user['address']=='Dadu'){ ?> selected="selected" <?php }?>>Dadu</option>
<option value="Kot Addu" <?php if($user['address']=='Kot Addu'){ ?> selected="selected" <?php }?>>Kot Addu</option>
<option value="Sheikhu Pura" <?php if($user['address']=='Sheikhu Pura'){ ?> selected="selected" <?php }?>>Sheikhu Pura</option>
<option value="Daska" <?php if($user['address']=='Daska'){ ?> selected="selected" <?php }?>>Daska</option>
<option value="Kot Malik" <?php if($user['address']=='Kot Malik'){ ?> selected="selected" <?php }?>>Kot Malik</option>
<option value="Shikarpur" <?php if($user['address']=='Shikarpur'){ ?> selected="selected" <?php }?>>Shikarpur</option>
<option value="Dera Ghazi Khan" <?php if($user['address']=='Dera Ghazi Khan'){ ?> selected="selected" <?php }?>>Dera Ghazi Khan</option>
<option value="Kotli" <?php if($user['address']=='Kotli'){ ?> selected="selected" <?php }?>>Kotli</option>
<option value="Shorko" <?php if($user['address']=='Shorko'){ ?> selected="selected" <?php }?>>Shorko</option>
<option value="Dera Ismail Khan" <?php if($user['address']=='Dera Ismail Khan'){ ?> selected="selected" <?php }?>>Dera Ismail Khan</option>
<option value="Kotri" <?php if($user['address']=='Kotri'){ ?> selected="selected" <?php }?>>Kotri</option>
<option value="Sialkot" <?php if($user['address']=='Sialkot'){ ?> selected="selected" <?php }?>>Sialkot</option>
<option value="Dipalpur" <?php if($user['address']=='Dipalpur'){ ?> selected="selected" <?php }?>>Dipalpur</option>
<option value="Sukkur" <?php if($user['address']=='Sukkur'){ ?> selected="selected" <?php }?>>Sukkur</option>
<option value="Faisalabad" <?php if($user['address']=='Faisalabad'){ ?> selected="selected" <?php }?>>Faisalabad</option>
<option value="Swabi" <?php if($user['address']=='Swabi'){ ?> selected="selected" <?php }?>>Swabi</option>
<option value="Gilgit" <?php if($user['address']=='Gilgit'){ ?> selected="selected" <?php }?>>Gilgit</option>
<option value="Leiah" <?php if($user['address']=='Leiah'){ ?> selected="selected" <?php }?>>Leiah</option>
<option value="Tando Adam" <?php if($user['address']=='Tando Adam'){ ?> selected="selected" <?php }?>>Tando Adam</option>
<option value="Gojra" <?php if($user['address']=='Gojra'){ ?> selected="selected" <?php }?>>Gojra</option>
<option value="Lodhran" <?php if($user['address']=='Lodhran'){ ?> selected="selected" <?php }?>>Lodhran</option>
<option value="Tando Allahyar" <?php if($user['address']=='Tando Allahyar'){ ?> selected="selected" <?php }?>>Tando Allahyar</option>
<option value="Gujar Khan" <?php if($user['address']=='Gujar Khan'){ ?> selected="selected" <?php }?>>Gujar Khan</option>
<option value="Mandi Bahauddin" <?php if($user['address']=='Mandi Bahauddin'){ ?> selected="selected" <?php }?>>Mandi Bahauddin</option>
<option value="Tando Muhammad Khan" <?php if($user['address']=='Tando Muhammad Khan'){ ?> selected="selected" <?php }?>>Tando Muhammad Khan</option>
<option value="Gujranwala" <?php if($user['address']=='Gujranwala'){ ?> selected="selected" <?php }?>>Gujranwala</option>
<option value="Mardan" <?php if($user['address']=='Mardan'){ ?> selected="selected" <?php }?>>Mardan</option>
<option value="Toba Tek Singh" <?php if($user['address']=='Toba Tek Singh'){ ?> selected="selected" <?php }?>>Toba Tek Singh</option>
<option value="Gujrat" <?php if($user['address']=='Gujrat'){ ?> selected="selected" <?php }?>>Gujrat</option>
<option value="Mian Channu" <?php if($user['address']=='Mian Channu'){ ?> selected="selected" <?php }?>>Mian Channu</option>
<option value="Turbat" <?php if($user['address']=='Turbat'){ ?> selected="selected" <?php }?>>Turbat</option>
<option value="Hafizabad" <?php if($user['address']=='Hafizabad'){ ?> selected="selected" <?php }?>>Hafizabad</option>
<option value="Mianwali" <?php if($user['address']=='Mianwali'){ ?> selected="selected" <?php }?>>Mianwali</option>
<option value="Vehari" <?php if($user['address']=='Vehari'){ ?> selected="selected" <?php }?>>Vehari</option>
<option value="Harunabad" <?php if($user['address']=='Harunabad'){ ?> selected="selected" <?php }?>>Harunabad</option>
<option value="Mingora" <?php if($user['address']=='Mingora'){ ?> selected="selected" <?php }?>>Mingora</option>
<option value="Wazirabad" <?php if($user['address']=='Wazirabad'){ ?> selected="selected" <?php }?>>Wazirabad</option>
<option value="other">Other</option>  
</select>

<div id="otherlocation" style="display: none;">
    <br/>
    <input type="text" name="user_location" class="form-control" placeholder="Type Your Location">
</div>
<br/>

<input type="email" name="email" class="form-control" placeholder="Type Your Email*" required value="<?php if(isset($user['email'])) echo $user['email']; ?>"/>
<br/>
<input type="text" name="mobile_number" class="form-control" placeholder="Type Your Number" value="<?php if(isset($user['mobile_number'])) echo $user['mobile_number']; ?>"/>

<br/>
<label>Date Of Birth</label>
<br/>

<select data-placeholder="" name="day_name">
<?php for($k=1;$k<31;$k++){ $a=$k; if($k<10){ $a="0$k"; } ?>
	<option value="<?php echo $a; ?>" <?php if($a==$birth_day){ echo "Selected"; } ?>><?php echo $a; ?></option>
<?php } ?>
</select>

<select data-placeholder="" name="month_name">
<option value="01" <?php if($birth_month=="01"){ echo "Selected"; } ?>>JAN</option>
<option value="02" <?php if($birth_month=="02"){ echo "Selected"; } ?>>FEB</option>
<option value="03" <?php if($birth_month=="03"){ echo "Selected"; } ?>>MARCH</option>
<option value="04" <?php if($birth_month=="04"){ echo "Selected"; } ?>>APRIL</option>
<option value="05" <?php if($birth_month=="05"){ echo "Selected"; } ?>>MAY</option>
<option value="06" <?php if($birth_month=="06"){ echo "Selected"; } ?>>JUNE</option>
<option value="07" <?php if($birth_month=="07"){ echo "Selected"; } ?>>JULY</option>
<option value="08" <?php if($birth_month=="08"){ echo "Selected"; } ?>>AUGUEST</option>
<option value="09" <?php if($birth_month=="09"){ echo "Selected"; } ?>>SEPTMBER</option>
<option value="10" <?php if($birth_month=="10"){ echo "Selected"; } ?>>OCTOBER</option>
<option value="11" <?php if($birth_month=="11"){ echo "Selected"; } ?>>NOVEMBER</option>
<option value="12"> <?php if($birth_month=="12"){ echo "Selected"; } ?>DECEMBER</option>
</select>


<select data-placeholder="" name="year_name">
<?php for($k=1920;$k<2015;$k++){ $a=$k; ?>
	<option value="<?php echo $a; ?>" <?php if($a==$birth_year){ echo "Selected"; } ?>><?php echo $a; ?></option>
<?php } ?>
</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br/>
<br/>
<label>Gender</label>
<br/>
<input type="radio" name="gender"  value="male" <?php if($user['gender']=="male"){ ?> checked="checked" <?php }?>/>Male
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="radio" name="gender" value="female" <?php if($user['gender']=="female"){ ?> checked="checked" <?php }?>/>FeMale
<br/>
<br/>
<input type="submit" name="submit" value="SUBMIT" class="btn-lg btn-success"/>
</form>
</div>



<br/>
<div class="col-md-4">
    <a href="kid-stories"><img src="images/right-page.jpg" alt="" class="img-responsive"/></a>
</div>



</div>

</div>
</div>



</section>

<section class="latestgames">

<div class="container-fluid">
<div class="row">
<img src="images/BADAL11.png" alt="" class="footercloud"/>
</div>
</div>
</section>
<script>
    function checkLocation()
    {
        var location=document.getElementById('location').value;
        if(location=='other')
        {
            document.getElementById('otherlocation').style.display="block";
        }
    }
    </script>
    <script>
        function momprofileedit()
        {
            document.getElementById('momprofileupdate').style.display="block";
            document.getElementById('userprofile').style.display="block";
            document.getElementById('momforum_edit').style.display="none";
        }
        </script>
<?php
include("includes/footer.php");
?>

</body>
</html>