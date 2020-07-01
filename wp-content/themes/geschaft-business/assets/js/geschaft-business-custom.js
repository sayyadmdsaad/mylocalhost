jQuery(function($){
 "use strict";
   jQuery('.gb_navigation > ul').superfish({
     delay:       500,                            
     animation:   {opacity:'show',height:'show'},  
     speed:       'fast'                        
   });
});

function gb_Menu_open() {
	document.getElementById("gb_responsive").style.top = "0";
}
function gb_Menu_close() {
  document.getElementById("gb_responsive").style.top = "110%";
}