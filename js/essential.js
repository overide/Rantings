/*function likeunlike(conid)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("like"+conid).getAttributeNode("src").value=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","essential2.php?q="+conid,true);
//xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();
}*/


/*function dell(conid)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("table"+conid).style.display=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","essential2.php?p="+conid,true);
//xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();
}*/


// ******************************************************************************


//Code for like unlike content
$(document).ready(function(){
    $("input.likeb").click(function(){
        var conid=$(this).attr("value");
        $.ajax({
            type:"GET",
            url:"essential2.php",
            data:{q:conid},
            dataType:"json",
            cache:false,
            success:function(data){
              $("#like"+conid).attr("src",data.img);
              $("#l"+conid).html(data.wllabel);}
        });
     });
  });

//Code for delete content
$(document).ready(function(){
    $("input.dellb ").click(function(){
      var conid=$(this).attr("value");
      $.ajax({
          type:"POST",
          url:"essential2.php",
          data:{p:conid},
          //dataType:"json",
          cache:false,
          success:function(){
            $("#table"+conid).remove();}
        });
     });
  });
//Code for adding new comment
$(document).ready(function(){
  $("button.commentb").click(function(){
    var thisconid=$(this).attr("value");
    var thiscmt=$("#cmt_box"+thisconid).val();
    $.ajax({
      type:"GET",
      url:"essential2.php",
      data:{conid:thisconid,cmt:thiscmt,status:"i"},
      cache:false,
      success:function(result){
        $("#commentbox"+thisconid).after(result);}
        //$("#cmt_section"+thisconid).reload(true);}
    });
  });
   $(".tablecmt").on("click",".commentsb",function(){ //saving edited comment
    var thiscmtid=$(this).attr("value");
    var thiscmt=$("#edit_cmtbox"+thiscmtid).val();
    $.ajax({
      type:"GET",
      url:"essential2.php",
      data:{cmtid:thiscmtid,cmt:thiscmt,status:"e"},
      cache:false,
      success:function(result){
        $("#cmts"+thiscmtid).html(result);}
    });
  });
});
//for toggle effect of the comment section
$(document).ready(function(){
  $("button.showcmtb").click(function(){
    var thisconid=$(this).attr("value");
    //alert($(this).html());
    $("#cmt_section"+thisconid).toggle();
  });
});

//Edit comment
$(document).ready(function(){
    $(".tablecmt").on("click",".editcmtb",function(){
        var cmtid=$(this).attr("value");
        //event.preventDefault();
        //alert($('#cmts'+cmtid).html());
        var holdcmt=$('#cmts'+cmtid).html();
        $('#cmts'+cmtid).html("<table style='box-shadow:none;width:100%;'><tr><td><textarea id='edit_cmtbox"+cmtid+"' style='width:100%;' rows=2 cols=50>"+holdcmt+"</textarea></td><td><button id='savecmtb"+cmtid+"' value='"+cmtid+"' style='display:inline;' type='submit' class='commentsb'>Save</button></td></td></table>");
        //'#edit_cmt'+cmtid).show();
      });
    });
//Delete comment
$(document).ready(function(){
    $(".tablecmt").on("click",".delcmtb",function(){
        var thiscmtid=$(this).attr("value");
          $.ajax({
            type:"GET",
            url:"essential2.php",
            data:{delcmtid:thiscmtid},
            cache:false,
            success:function(){
              $("#cmt"+thiscmtid).hide();}
        });
      });
    });

function followppl(followingid)
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("follow"+followingid).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","essential2.php?f="+followingid,true);
//xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send();
}
