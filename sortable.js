
$(function() {
   //$('tbody').sortable({connectWidth:"tbody"});
   
   //$("tbody").sortable();   -> dla sortowania wszystkich w tbody
   
   $("tbody").sortable({items: '>tr:not(.nosort)'});

   $(".save").click(function(){
       var data= $("tbody").sortable('serialize');
       $.post('sortable.php', {"data":data},function(d){
           alert(d);
       });
   });
});






/*
$(function(){

    $('tbody').sortable({
        update: function(event, ui) {
            var postData = $(this).sortable("serialize");
            console.log(postData);
        }
    });

});

*/

/*
  (function() {
    //$('tbody').sortable({connectWidth:"tbody"});
     $("tbody").sortable();

    $(".save").click(function(){
       var data= $("tbody").sortable('serialize');
       $.post('sortable.php', {"data":data},function(d){
           alert(d);
       });
    });
  });

*/

/*

$(function() {
    $('tbody:').sortable();
});

*/