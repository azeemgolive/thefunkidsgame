<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Dialog - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#dialog" ).dialog();
  });
  </script>
</head>
<body>
 
<div id="dialog" title="Basic dialog">
  <form action="" style=" " >
			<div id= "cols">
			<div id="col-1">
				<input type="text" placeholder="Email" required="" id="email" class="r1-1"  />
				<input type="password" placeholder="Password" required="" id="password" class="r1-2"/>
			</div> 	
			<div id="col-2">
				<input type="password" placeholder="Gender" required="" id="gender" class="r2-1" />
				<input type="text" placeholder="Phone Number" required="" id="phonenumber" class="r2-2"/>
			</div>
			<div id="col-3">
				<input type="password" placeholder="Location" required="" id="location" class="r3-1" />
				<input type="text" placeholder="Number of Kids" required="" id="noofkids" class="r3-2" /> <br>
				
			</div>
			<div>
				<input type="submit" value="SIGNUP" class="signup" />
			</div>
			
			
		</div>
		</form>
</div>
 
 
</body>
</html>


