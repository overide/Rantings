$(document).ready(function(){
	$("#pop1").click(function(){
			$("#overlay1").css("display","block");
			//$("div.container1").focus();

	});
	$("#popupcloseIcon1").click(function(){
			$("#overlay1").css("display","none");
	});
	/*$("div.container1").blur(function(){
				$("#overlay1").css("display","none");
	});*/
	$("#pop2").click(function(){
			$("#overlay2").css("display","block");
	});
	$("#popupcloseIcon2").click(function(){
			$("#overlay2").css("display","none");
	});
});

$(document).ready(function(){
	$("#home").mouseenter(function(){
		$(this).attr("src","../images/icons/home1.png");
	});
	$("#home").mouseleave(function(){
		$(this).attr("src","../images/icons/home2.png");
	});
	$("#profile").mouseenter(function(){
		$(this).attr("src","../images/icons/profile1.png");
	});
	$("#profile").mouseleave(function(){
		$(this).attr("src","../images/icons/profile2.png");
	});
	$("#editprofile").mouseenter(function(){
		$(this).attr("src","../images/icons/editprofile1.png");
	});
	$("#editprofile").mouseleave(function(){
		$(this).attr("src","../images/icons/editprofile2.png");
	});
	$("#diary").mouseenter(function(){
		$(this).attr("src","../images/icons/diary1.png");
	});
	$("#diary").mouseleave(function(){
		$(this).attr("src","../images/icons/diary2.png");
	});
	$("#write").mouseenter(function(){
		$(this).attr("src","../images/icons/write1.png");
	});
	$("#write").mouseleave(function(){
		$(this).attr("src","../images/icons/write2.png");
	});
});
