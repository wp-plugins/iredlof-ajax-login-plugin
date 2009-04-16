// JavaScript Document
var xmlhttp
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
	 try {
	  xmlhttp = new XMLHttpRequest();
	 } catch (e) {
	  xmlhttp=false
	 }
	}
	function myXMLHttpRequest() {
	  var xmlhttplocal;
	  try {
	    xmlhttplocal= new ActiveXObject("Msxml2.XMLHTTP")
	 } catch (e) {
	  try {
	    xmlhttplocal= new ActiveXObject("Microsoft.XMLHTTP")
	  } catch (E) {
	    xmlhttplocal=false;
	  }
	 }

	if (!xmlhttplocal && typeof XMLHttpRequest!='undefined') {
	 try {
	  var xmlhttplocal = new XMLHttpRequest();
	 } catch (e) {
	  var xmlhttplocal=false;
	  alert('couldn\'t create xmlhttp object');
	 }
	}
	return(xmlhttplocal);
}

function iRedlof_login()
{
	var time= new Date();
	var wpAddress=document.getElementById("wp-address").value;
	var user=document.getElementById("loguser").value;
	var remember=document.getElementById("rememberme").value;
	var pwd=document.getElementById("logpwd").value;
	document.getElementById("login_status").style.color="#33CCCC";
	document.getElementById("login_status").innerHTML="Please Wait ...";
	if(user=="" || pwd=="")
	{
		document.getElementById('login_status').style.color="RED";	  
        document.getElementById('login_status').innerHTML="Empty Fields.";
	}
	else
	{
		var params = 'time='+time.getSeconds()+'&log='+user+'&pwd='+pwd+'&rememberme='+remember;
		xmlhttp.open('POST', wpAddress+'/wp-content/plugins/iredlof_ajax_login/login.php');
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");  
		xmlhttp.setRequestHeader("Content-length", params.length);  
		xmlhttp.setRequestHeader("Connection", "close");  
    	xmlhttp.onreadystatechange = loginHandleResponse;
    	xmlhttp.send(params);
	}
}

function loginHandleResponse()
{
	if(xmlhttp.readyState == 4)
	{
		if (xmlhttp.status == 200)
		{
          var response = xmlhttp.responseText;
		  var splitData = new Array();
		  splitData=response.split('|');
		  if(splitData[0]=="Login Successfull")
		  {
			  var mySlide = new Fx.Slide('login').slideOut();
  	      	  document.getElementById('login_status').style.color="#33CCCC";	
			  document.getElementById("login-logout").innerHTML="<a href='"+document.getElementById("wp-address").value+"/wp-login.php?action=logout&amp;redirect_to="+document.getElementById("redirect_to").value+"'>Log Out</a>";
			  document.getElementById('greetuser').innerHTML="Hello "+splitData[1];
			  //window.location.reload(true);
		  }
		  else
		  {
			  document.getElementById('login_status').style.color="RED";	  
		  }
	      document.getElementById('login_status').innerHTML=splitData[0];
		}
	}
}