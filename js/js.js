
window.onload=function()
{
	var oMarkList=document.getElementById('MarkList');
	var oClassList=document.getElementById('ClassList');
	var oInmarkList=document.getElementById('InmarkList');
	var oaddMark=document.getElementById('addMark');
	var omarkCancel=document.getElementById('markCancel');
	var oaddClass=document.getElementById('addClass');
	var oinMark=document.getElementById('inMark');
	var oclassCancel=document.getElementById('classCancel');
	var oinCancel=document.getElementById('inCancel');
	var oaddMask=document.getElementById('addMask');
	var oclassMask=document.getElementById('classMask');
	var oinMask=document.getElementById('inMask');
	window.onscroll  = function(){
		var scr = document.body.scrollTop || document.documentElement.scrollTop;
		var lfixed = document.getElementById('p_lfixed');
		var op_prebg=document.getElementById('p_prebg');
		var op_rightcon=document.getElementById('p_rightcon');
	
		op_prebg.style.height=op_rightcon.offsetHeight+'px';
	
		if(scr > 310 || scr == 310){
			lfixed.style.position = 'fixed';
			lfixed.style.width="25.2%";
			lfixed.style.top="-20px";
		}
		if(scr < 310){
			lfixed.style.position = 'relative';
			lfixed.style.width="100%";
		}
	};
	function windowT(obj,Tdiv,clos,oMask,fn)
	{
		$(obj).click(function()
		{
			$(Tdiv).css('left',($(window).width()-$(Tdiv).outerWidth())/2);
			$(Tdiv).css('top',($(window).height()-$(Tdiv).outerHeight())/2+$(window).scrollTop());
			$(obj).addClass('Hactive');
			$(Tdiv).css('display','block');
			startMove(Tdiv,{opacity:100});
			$(oMask).css('width',$(window).width());
			$(oMask).css('height',$(document).height());
			$(oMask).css('display','block');
			if(fn){
				fn();
			}
			$(clos).click(function()
			{
				startMove(Tdiv,{opacity:0},function(){$(Tdiv).css('display','none');})
				$(oMask).css('display','none');
				$(obj).removeClass('Hactive');
				$(obj).addClass('p_bgco');
			})
		})
		$(window).on('scroll resize',function()
		{
			$(Tdiv).css('left',($(window).width()-$(Tdiv).outerWidth())/2);
			$(Tdiv).css('top',($(window).height()-$(Tdiv).outerHeight())/2+$(window).scrollTop());
			$(oMask).css('width',$(window).width());
			$(oMask).css('height',$(document).height());
		})
	}
	windowT(oaddMark,oMarkList,omarkCancel,oaddMask,function(){$(oaddClass).removeClass('p_bgco');$(oinMark).removeClass('p_bgco');});	
	windowT(oaddClass,oClassList,oclassCancel,oclassMask,function(){$(oaddMark).removeClass('p_bgco');$(oinMark).removeClass('p_bgco');});	
	windowT(oinMark,oInmarkList,oinCancel,oinMask,function(){$(oaddClass).removeClass('p_bgco');$(oaddMark).removeClass('p_bgco');});	

	// $('.simple_color_kitchen_sink').simpleColor({
	// 	cellWidth: 20,
	// 	cellHeight: 20,
	// 	border: '1px solid #660033',
	// 	buttonClass: 'button',
	// 	displayColorCode: true,
	// 	livePreview: true,
	// 	displayColorCode: false
	// });
}