
    //registrarDLSelectorFilter("#ooop","input:text#textfilter","input:checkbox#chkSelectedOnly");
        function registrarDLSelectorFilter(idselector,idfilter,idcheck){
           
           $(idfilter).keyup(function(){
            
                DLSelectorFilter(idselector,idfilter,idcheck);
            });

            $(idcheck).change(function(){ 

                DLSelectorFilter(idselector,idfilter,idcheck); 
            });
            
        }       
        
        function DLSelectorFilter(parent,idfilter,idcheck){
            var selected="";
            if($(idcheck).attr('checked')){               
                selected=":selected"
            }
            var texto =$.trim($(idfilter).val().toLowerCase());
            $(parent+" optgroup").hide();
            $(parent+" optgroup option").hide();
            if(!texto){                
                 $(parent+" optgroup option"+selected).show().parent("optgroup").show();
                return;
            }
            else{
                $(parent+" optgroup option"+selected).parent("optgroup").each(function()
                {                                  
                var optgroup=$(this).attr('label').toLowerCase();
                if(optgroup.indexOf(texto) != -1){
                    $(this).show();
                    $(this).children("option"+selected).show();
                }
                else{
                    $(this).hide();
                    $(this).children("option"+selected).each(function()
                    {
                        var optiontext=$(this).val().toLowerCase();

                        if(optiontext.indexOf(texto) != -1){
                            $(this).show();
                            $(this).parent("optgroup").show();
                        }else{
                            $(this).hide();                                    
                        }
                    });
                }
                });
                
            }      
           
        };
   
