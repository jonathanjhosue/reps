// JavaScript Document
$(document).ready(function() {
	 $(".tabLink").each(function(){
		$(this).click(function(){
		  tabeId = $(this).attr('id');
		  $(".tabLink").removeClass("activeLink");
		  $(this).addClass("activeLink");
		  $(".tabcontent").addClass("hide");
		  $("#"+tabeId+"-1").removeClass("hide")   
		  return false;	  
		});
	 });  
  });