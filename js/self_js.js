
/*发现列表*/
$(function(){ 
    $("#text_1").empty();//清空text_1
		$.post("/bs/php/search.php",{
			search1:"",
		},
		function(data,status){
			var search_result=data;
			$('#text_1').append(search_result);//将数据插入text_1
			
		});
		
});
/*筛选*/
function select_l(str)
{
    var select_list = str;
    var input_search = document.getElementById("search_input").value;
		$("#text_1").empty();//清空text_1
		$.post("/bs/php/search.php",{
			search1:select_list,
			search2:input_search,
		},
		
		function(data,status){
			var search_result=data;
			$('#text_1').append(search_result);//将数据插入text_1
		});
}
/*搜索*/
$(document).ready(function(){
	$("#search_btn").click(function(){
		var input_search = document.getElementById("search_input").value;
		$("#text_1").empty();//清空text_1
		$.post("/bs/php/search.php",{
			search1:input_search,
		},
		
		function(data,status){
			var search_result=data;
			$('#text_1').append(search_result);//将数据插入text_1
		});
	});
});


/*评论点赞*/
function foo(){    
    if(confirm("确认百度吗？")){    
        return true;    
    }    
    return false;    
}
