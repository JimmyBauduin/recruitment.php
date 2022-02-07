var pageTitle = document.querySelector("h1")
page = pageTitle.innerHTML;
var qqch = document.querySelector(".random") 
    $(document).ready(function(){
        $("button").click(function(event){
            var element = event.target.value;
            data_up =event.target.id;
            detail = event.target.innerHTML;
          $.get("../admin/button.php?$data="+element+"&$detail="+detail+"&$data_up="+data_up+"&$page="+page,function(data){
               $(qqch).html(data);
            }) ;         
        });
    });
    