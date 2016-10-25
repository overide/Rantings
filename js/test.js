//For like and dislike
/*$(document).ready(function(){
    $("input").click(function(){
      var conid=$(this).attr("value");
      //alert(conid);
      $.ajax({
          type:"GET",
          url:"essential2.php",
          data:{q:conid},
          dataType:"json",
          cache:false,
          success:function(data){
            //alert("hello");
            $("#like"+conid).attr("src",data.img);
            $("#l"+conid).html(data.wllabel);}
          

        });
     });
  });*/

