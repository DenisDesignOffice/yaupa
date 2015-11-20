/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

<!--
            //Browser Support Code
            function ajaxFunction(){
               var ajaxRequest;  // The variable that makes Ajax possible!
               try{
                  // Opera 8.0+, Firefox, Safari
                  ajaxRequest = new XMLHttpRequest();
               }
               
               catch (e){
                  // Internet Explorer Browsers
                  try{
                     ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                  }
                  
                  catch (e) {
                     try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                     }
                  
                     catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                     }
                  }
               }
               
               // Create a function that will receive data 
               // sent from the server and will update
               // div section in the same page.
					
               ajaxRequest.onreadystatechange = function(){
                  if(ajaxRequest.readyState == 4){
                     var ajaxDisplay = document.getElementById('appendage');
                     ajaxDisplay.innerHTML = ajaxRequest.responseText;
                  }
               }
               
               // Now get the value from user and pass it to
               // server script.
					
               var type = document.getElementById('type').value;
               var from = document.getElementById('from').value;
               var to = document.getElementById('to').value;
               var loc = document.getElementById('location').value;
               var dest = document.getElementById('dest').value;
               
               var queryString = "?age=" + age ;
            
               queryString +=  "&wpm=" + wpm + "&sex=" + sex;
               ajaxRequest.open("GET", "ajax-example.php" + queryString, true);
               ajaxRequest.send(null); 
            }
         //-->

