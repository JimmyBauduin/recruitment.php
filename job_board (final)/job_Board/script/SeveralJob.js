var qqch = document.querySelector(".random") 
    $(document).ready(function(){
        $("button").click(function(event){
            var element = event.target.value;
            $.get("./learnMore.php?$data="+element,function(data){
                $(qqch).html(data);
            }) ;        
        });
    });
    