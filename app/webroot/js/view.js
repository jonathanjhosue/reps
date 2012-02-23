$().ready(function(){
 $(".jtable th").each(function(){
 
  $(this).addClass("ui-widget-header");
 
  });
 $(".jtable td").each(function(){
 
  $(this).addClass("ui-widget-content");
 
  });
 $(".jtable tr").hover(
     function()
     {
      $(this).children("td").addClass("ui-state-hover");
     },
     function()
     {
      $(this).children("td").removeClass("ui-state-hover");
     }
    );
 $(".jtable tr").click(function(){
   
   $(this).children("td").toggleClass("ui-state-highlight");
  });
  
 $(".jfieldset").addClass("ui-widget ui-widget-content").css({'margin-bottom':'10px'}); 
 
  $(".jfieldset legend").each(function(){
 
    $(this).addClass("ui-widget-header ui-corner-all").css({'width':'70%'});
 
  });
 
}); 