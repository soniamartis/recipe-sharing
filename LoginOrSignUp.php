<html>
    <head>
	   <style>
	   .links_to_forms{
	      display:inline;
		  padding:5px;
	   }
	      li{
		  list-style:none;
		  padding:5px;
		  
		  }
		  
		  ul{
		  margin-left:40%;
		  }
		  
		  #load_here{
		  height:50%;
		  width:50%;
		  margin: 0 auto;
		  
		  }
		  
		  .links{
			width:50%;
			background:pink;
		  }
		  
		  /*.inputs{
		    position:relative;
		  }*/
		  
		 .inputs li div{
		   text-align:center;
		  position:relative;
		  
		  right:-25px;
		   
		 }
		 
		 div button{
		  padding:5px 10px 5px 5px;
		   font-family:sans-serif;
		   font-size:20px;
		   background:#5bdf5b;
		   border:0px;
		   border-radius:5%;
		 }
		  
		   .links form input{
		  padding:5px 10px 5px 5px;
		   font-family:sans-serif;
		   font-size:20px;
		   color:rgba(200,212,212,1);
		 }
		 
        @media screen and (max-width:700px){
			
			ul{
				margin-left:-20px;
			}
			
			 #load_here{
		  height:50%;
		  width:80%;
		  margin: 0 auto;
		 background:red;
		  
		  }
		}		 
		  
	   </style>
	   
	   <script type="text/javascript">
	     
		   var xmlhttp=false;
		   var showDetails=true;
		   try{
		      xmlhttp=new XMLHttpRequest();
		   }catch(e){
		     alert("what the hell are u doing?");
		   }
		   
		  function makeRequest(serverPage,objId){
		        var object=document.getElementById(objId);
				xmlhttp.open("GET",serverPage);
				xmlhttp.onreadystatechange=function(){
				   if(xmlhttp.readyState==4 && xmlhttp.status==200){
				      object.innerHTML=xmlhttp.responseText;
				   }
				}
				xmlhttp.send(null);
		   }
		   
		   function showHideDetails(){
		     //var object="show_details";
			 var obj=document.getElementById("show_details");
				xmlhttp.open("GET","first.html");
				
				xmlhttp.onreadystatechange=function(){
				   if(xmlhttp.readyState==4 && xmlhttp.status==200){
				      if(showDetails==true){
				      obj.innerHTML=xmlhttp.responseText;
					  showDetails=false;
					  document.getElementById("toggle_details").text="Hide details";
					  }
					  else{
					     obj.innerHTML="";
					  showDetails=true;
					  document.getElementById("toggle_details").text="Show details";
					  }
				   }
				}
				xmlhttp.send(null);
		        
		   }
	   </script>
	</head>
	<body onload="makeRequest('signUp.php','load_here');return false;">
	     <ul class="links_info">
		     <li class="links_to_forms"><a href="javascript://" onclick="makeRequest('signUp.php','load_here');return false;">SignUp</a></li>
			 <li class="links_to_forms"><a href="javascript://" onclick="makeRequest('login.php','load_here');return false;">Login</a></li>
			 
		 </ul>
		 <div id="load_here">
		 </div>
	</body>
   </html>	