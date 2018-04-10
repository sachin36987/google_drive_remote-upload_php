<?php

require('config.php');  



include 'khokharfunctions.php';



require __DIR__ .'/vendor/autoload.php';



include "header.php";
  ?>
  
 <div id="wrapper2">
		<div id="welcome" class="container">
			<div class="title">

			<?php  
			
			if (!isset($_SESSION['email']))

			{
					echo '<h2><a href="/authorize.php">Authorize to Upload</a></h2></div></div></div>';

	

			}
			
			else {
				
					if($_SESSION['access_token']==Null){

	$url='/auth.php';

header('Location: ' . filter_var($url, FILTER_SANITIZE_URL));



	} 

	elseif($_SESSION['access_token']!=Null) {

		

		



		// if token has expired we will get the new one.***********************************************

		

	

	$client = new Google_Client();                         // create new google client

	$client->setAuthConfigFile($client_secret);    // enter client secrets

	$client->setAccessToken($_SESSION['access_token']);    // set the access token

	

	

	$checktoken=$client->isAccessTokenExpired($_SESSION['access_token']);   // check if token has expired

	if ($checktoken==True){

		

		$refresh_token=$_SESSION['refresh_token'];

		$client->refreshToken($refresh_token);

		$_SESSION['access_token'] = $client->getAccessToken();

		$client->setAccessToken($_SESSION['access_token']);

		$checktoken==False;

		

	}

		
			echo '<h3 style="color:#7FFF00;">>Singed in as : '.$_SESSION['email'].'</h3>
			
			<a href="/change_account.php" style="font-size:18px;color:#fff"><button style="background:none repeat scroll 0 0 #FF3D3D;" >Change Account</button></a><br></div>';


       


	echo '	
	<button id="status" class="btn-info btn-xs" style="display:none;margin:0 auto;"></button><br>
	<button id="size" style="display:none;"></button><br>
	<button id="now" style="display:none;"></button><br>
	<div class="w3-light-grey w3-round-xlarge w3-small" id="outer" style="display:none">
            <div id="progress" class="w3-container w3-center w3-round-xlarge w3-teal" style="width:0%">0%</div>
          </div>';



// various status codes like google storage out of quota , file not found etc.******************

                if (isset($_GET['status']) && !empty($_GET['status'])){

		$status=response($_GET['status']);

echo '<p ><button type="button" id="suc" class="btn-success" style="align:center;">'.$status;

		

if (isset($_GET['filename']) && !empty($_GET['filename'])){



echo ':: '.$_GET['filename'].':: has been uploaded';



}echo '</p></button>';

}





echo '
<form action="/canbeuploaded.php" enctype="multipart/form-data" method="post" name="upload" id="formurl">
                  <div class="form-group" action="/canbeuploaded.php" enctype="multipart/form-data" method="post" name="upload" id="formurl" style="margin:0 auto;">
					
                    <span style="color:#ffffff;" >Enter URL</span>
                    
                      <input class="inputc" type="text" size="50" id="url" name="url"><br/><br/>
					  
					  <button onclick="putcontent()"  type="submit"   id="btnupload" >
					  <span>Upload</span></button>
                    
                    
                  </div>
                </form>

    <script>

    

    function putcontent (){

    

      var x = document.getElementById("btnupload");

      var y= document.getElementById("formurl");

      y.submit();

    x.disabled = true;

    x.innerHTML=\'Do not close the window until upload is  not completed\';

    

    var url=document.getElementById("url").value;

    var status=document.getElementById("status");

	status.style.display="block";

    var basename=url.split("/");

    status.innerHTML=basename[basename.length-1]+\'<br>\';



    var filename=basename[basename.length-1];

    var codedfilename=btoa(filename);

	var scc = document.getElementById("suc");
        if(scc){
	scc.style.display="none";
        }
	var pro=document.getElementById("progress");
	
	pro.style.display="block";
	var xl = document.getElementById("outer");
	xl.style.display="block";
	var si = document.getElementById("size");
	si.style.display="block";
	var now = document.getElementById("now");
	now.style.display="block";
	now.innerHTML = "Downloading";
  function xml(){

   var xhttp = new XMLHttpRequest();

  xhttp.onreadystatechange = function() {

    if (this.readyState == 4 && this.status == 200) {
	var ar = JSON.parse(this.responseText);
	si.innerHTML = ar[\'size\'];
	if(ar[\'downloaded\']<100){
      pro.innerHTML = ar[\'downloaded\']+" %";
      pro.style.width=ar[\'downloaded\']+"%";
	}
	else{
	pro.innerHTML = ar[\'percentuloaded\']+" %";
      	pro.style.width=ar[\'percentuloaded\']+"%";
	now.innerHTML = "Uploading";
	}
	
    }

  };

  xhttp.open("GET", "status.php?file="+codedfilename+"&t="+ Math.random(), true);

  xhttp.send();





    }  setInterval(function(){

    xml() // this will run after every 1 seconds

}, 1000);

}

    

    </script>';

		

	}

	else {

		echo 'something went wrong';

	}
	
			}
			  
?>
			 </div>
</div>
<div id="wrapper3">
		<div id="portfolio" class="container">
			<div class="title">
				<h2>Features</h2>
				<span class="byline">Becoming Perfect</span> </div>
			<div class="column1">
				<div class="box">
					<span class="icon icon-wrench"></span>
					<h3>Size Limit</h3>
					<p>100MB</p>
					<span class="button button-small">This can be increased by you.</span> </div>
			</div>
			<div class="column2">
				<div class="box">
					<span class="icon icon-trophy"></span>
					<h3>Download</h3>
					<p>Download This PHP Script.</p>
					<a href="#" class="button button-small">Download</a> </div>
			</div>
			<div class="column3">
				<div class="box">
					<span class="icon icon-key"></span>
					<h3>Works For Direct Links</h3>
					<p>Direct Links are need for now.</p>
					<span class="button button-small">Will Remove This Limitation</span> </div>
			</div>
			<div class="column4">
				<div class="box">
					<span class="icon icon-lock"></span>
					<h3>Speed</h3>
					<p>Speed Depends on your server power</p>
					<span class="button button-small">More Power-More Speed</span> </div>
			</div>
		</div>
	</div>
</div>
<div id="footer" class="container">
	<div class="title">
		<h2>Get in touch</h2>
		<span class="byline">Like Us on Facebook</span> </div>
	<ul class="contact">
		<!--<li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>-->
		<li><a href="https://www.facebook.com/Google-Drive-Remote-Upload-PHP-Script-264934853979346" class="icon icon-facebook"><span></span></a></li>
		<!--<li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>-->
		<!--<li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>-->
		<!--<li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>-->
	</ul>
</div>
<div id="copyright" class="container">
	<p>&copy; FALTUTECH.COM All rights reserved.</p>
</div>
  </body>
</html>

