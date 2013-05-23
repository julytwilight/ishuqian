$(function(){
	
	var height=Math.max($(window).height(),document.body.scrollHeight);
	$('i_frame').attr({style:height+'px'});
	//收藏点击显示
	$('.icon_like').bind('click',function(){
		$('.ik_hove_panel').show();	
	});
	//收藏提交
	$('.main_btn').bind('click',function(){		
		var title = $("input[name='title']").val();
		var cat = $("select[name='cat']").val();
		var tag = $("input[name='tag']").val();
		var url = $("input[name='url']").val();
		var is_private = $("input[name='is_private']").val(); //私藏
		$('.ik_hove_panel').html("<div><img src='./imgs/loading.gif'></div>");
		$.ajax({
		   type: "POST",
		   url: "./like",
		   data: "title="+title+"&list="+cat+"&tag="+tag+"&is_private="+is_private+"&url="+url,
		   success: function(msg){
		   		$('.ik_hove_panel').html('')
		    	if(msg == 1){
		    		$('.ik_hove_panel').html('已成功收藏！');
		    	}else{
		    		$('.ik_hove_panel').html('网络异常！');
		    	}
		   }
		}); 
	});
	
});