// JavaScript Document
$(function(){
    $(".sow").click(function(){
		var url = "/index.php?r=user/check";
		$.post(
			url,
			function(result){
				if(result != 1){
					alert("请先登录");
					window.location.href = "/index.php?r=site/login";
				}else {
					var num = $("#num").val();
					var item_id = $("#item_id").val();
					//跳转生成订单
					window.location.href = "/index.php?r=order/create&item_id="+item_id+"&num="+num;
				}
			},"json"
	    )
	})
	
	
	//选择数量不能小于0
	$("#num").blur(function(){
		var v = $(this).val();
		if(v <= 0){
			alert("购买数量需要大于0");
			$("#num").val("1");
			return;
		}
    })
})