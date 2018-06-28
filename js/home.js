/*$(function(){ 
    $("#tabs_youji").empty();
    var page=3;
    var url="/bs/php/fy.php?page="+page;
	$.post(url,{
		search1:"",
	},
	function(data,status){
		var search_result=data;
		$('#tabs_youji').append(search_result);
	});
		
});*/
/*分页*/
window.onload=num_fy(1);//第一次加载
function num_fy(num){
	$("#load_p").remove();
    var page=num;
    var url="/bs/php/fy.php?page="+page;
	$.post(url,{
		search1:"",
	},
	function(data,status){
		var search_result=data;
		$('#tabs_youji').append(search_result);
	});
}

function btn_num(value){
	var num=value;
	num_fy(num);
}
/*上拉加载*/
function num_fy1(num){
	/*$("#tabs_youji").empty();*/
    var page=num;
    var url="/bs/php/fy.php?page="+page;
	$.post(url,{
		search1:"",
	},
	function(data,status){
		var search_result=data;
		$('#tabs_youji').append(search_result);
	});
}
//获取滚动条当前的位置 
function getScrollTop() {
    var scrollTop = 0;
    if(document.documentElement && document.documentElement.scrollTop) {
        scrollTop = document.documentElement.scrollTop;
    } else if(document.body) {
        scrollTop = document.body.scrollTop;
    }
    return scrollTop;
}

//获取当前可视范围的高度 
function getClientHeight() {
    var clientHeight = 0;
    if(document.body.clientHeight && document.documentElement.clientHeight) {
        clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight);
    } else {
        clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight);
    }
    return clientHeight;
}

//获取文档完整的高度 
function getScrollHeight() {
    return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
}

//滚动事件触发
var page1=1;
//var page_max=document.getElementById("#btn_num").value;
window.onscroll = function() {
    if(getScrollTop() + getClientHeight() == getScrollHeight()&&page1<page_max) {
    	page1++;
    	num_fy1(page1);
    }
}

