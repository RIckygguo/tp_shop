/*增加*/
/**
 * Function: addRecord
 * Writer: RickyGuo
 * Date: 2018-3-20
 * Description: 添加记录
 * @param layer的title
 * @param layer打开的url
 * @param layer的宽
 * @param layer的高
 **/
function addRecord(title,url,w,h){
	layer_show(title,url,w,h);
}


/*改为停用状态*/
/**
  * Function: deleteStatus
  * Writer: RickyGuo
  * Date: 2018-3-20
  * Description: 暂停记录状态，将其改为停用
  * @param obj 当前对象
  * @param id 记录id
  * @url change_status_url 后台中改变状态的url
  **/ 
function deleteStatus(obj, id, scene=0) {
	layer.confirm('确认要禁用吗?', function(index) {
		var postData = {
			'id' : id,
			'status' : -1,
		};
		url = SCOPE.change_status_url;
		$.post(url, postData, function(result) {
			if(result.status == 0) {
				if(scene == 0) {
					$(obj).parents("tr").find(".td-status").html('<a style="text-decoration: none;" href="javascript:;" onClick="stopStatus(this,100)" title="通过审核"><span class="label radius">禁用</span></a>');
					layer.msg('已禁用', {icon:1, time:1000});
				}
				else if(scene == 1){
					$(obj).parents('tr').remove();
					layer.msg('已禁用', {icon:1, time:1000});
				}
				else if(scene == 2) {
					  layer.msg('已禁用', {icon:1, time:1000});
					  setInterval(function() {
					    var index = parent.layer.getFrameIndex(window.name);
					    parent.$('.btn-refresh').click();
					    parent.location.reload();
					    parent.layer.close(index);
					}, 1000);
				}				
			}
			else {
				layer.msg('禁用失败', {icon:2, time:1000});
			}
		}, 'JSON');
	});
}

/*编辑*/
/**
 * Function: editRecord
 * Writer: RickyGuo
 * Date: 2018-3-30
 * Description: 编辑记录
 * @param title layer的title
 * @param url layer打开的url
 * @param id 修改记录的id
 * @param w layer的宽
 * @param h layer的高
 **/
function editRecord(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*改为审核状态*/
/**
 * Function: stopStatus
 * Writer: RickyGuo
 * Date: 2018-3-30
 * Description: 将记录状态改为审核状态
 * @param obj 当前对象
 * @param id 记录id
 * @url change_status_url 后台中改变状态的url
 **/
function stopStatus(obj,id, scene=0){
	layer.confirm('确认要改为审核吗？', function(index){
		var postData = {
			'id' : id,
			'status' : 0,
		};
		url = SCOPE.change_status_url;
		$.post(url, postData, function(result) {
			if(result.status == 0) {
				if(scene == 0) {
					$(obj).parents("tr").find(".td-status").html('<a style="text-decoration: none;" href="javascript:;" onClick="startStatus(this,100)" title="通过审核"><span class="label radius label-warning">待审</span></a>');
					$(obj).remove();
				}
				else if(scene == 1) {
					$(obj).parents('tr').remove();
				}
				layer.msg('状态为审核!',{icon: 1,time:1000});
			}
			else {
				layer.msg('停用失败', {icon: 2, time:1000});
			}
		}, 'JSON');
	});
}

/*改为启用状态*/
/**
 * Function:startStatus 
 * Writer: RickyGuo
 * Date: 2018-3-30
 * Description: 将记录改为启用状态
 * @param obj 当前对象
 * @param id 记录id
 * @param scene 场景，根据不同场景回调函数不同
 * @url change_status_url 后台中改变状态的url
 **/
function startStatus(obj,id, scene=0){
	layer.confirm('确认要通过审核吗？',function(index){

		var postData = {
			'id' : id,
			'status' : 1,
		};
		url = SCOPE.change_status_url;
		$.post(url, postData, function(result) {
			if(result.status == 0) {
				if(scene == 0) {
					$(obj).parents("tr").find(".td-status").html('<a style="text-decoration: none;" href="javascript:;" onClick="stopStatus(this,100)" title="下审"><span class="label radius label-success">正常</span></a>');
					$(obj).remove();
				}
				else if(scene == 1){
					$(obj).parents('tr').remove();
				}
				else if(scene == 2) {
					  layer.msg('已启用', {icon:1, time:1000});
					  setInterval(function() {
					    var index = parent.layer.getFrameIndex(window.name);
					    parent.$('.btn-refresh').click();
					    parent.location.reload();
					    parent.layer.close(index);
					}, 1000);
				}
				layer.msg('已启用!', {icon: 1,time:1000});
			}
			else {
				layer.msg('启用失败', {icon: 2, time:1000});
			}
		}, 'JSON');

	});
}
/**
 * Function: checkNum
 * Writer: RickyGuo
 * Date: 2018-3-20
 * Description: 检查listorder中输入的数字是否为数字
 * @param str 字符串
 **/
function checkNum(str) {
	var regPos = /\D/; 
	if(regPos.test(str)) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Function: changeOrder
 * Writer: RickyGuo
 * Date: 2018-3-20
 * Description: 当点击排序时将数字改变为输入框，输入框失去焦点时检查是否修改排序，然后上传
 * @param obj 当前对象
 * @param id 记录id
 * @url list_url 修改次序url
 **/
function changeOrder(obj, id) {
	if($(obj).html().indexOf('input') != -1) {
		return;
	}
	var orderVal = $(obj).html();
	$(obj).html('<input type="text" class="tp-shop order" style="width:60px; padding:5px;" autofocus = "autofocus" />');
	$(".order").val(orderVal);
	$(".order").blur(function() {
		var val = $(".order").val();
		if(orderVal != val) {
			 if(val >= 0 && !checkNum(val)) {
				var postData = {
					'id' : id,
					'list_order' : val,
				};
				url = SCOPE.list_url;
				$.post(url, postData, function(result) {
					layer.msg('修改成功', {icon:1, time:1000});
					window.location.reload();
				});
			 }
			 else {
			 	val = orderVal;
			 }
		}
		$(obj).html(val);
	});
}


/*删除*/
// function sort_del(obj,id){
// 	layer.confirm('确认要禁用吗?', function(index) {
// 		var postData = {
// 				'id' : id,
// 			}
// 		url = SCOPE.delete_url;
// 		$.post(url, postData, function(result) {
// 			if(result.status == 0) {
// 				$(obj).parents("tr").remove();
// 				layer.msg(result.message,{icon:1,time:1000});
// 			}
// 			else {
// 				layer.msg(result.message,{icon:2,time:1000});
// 			}
// 		}, 'JSON');
// 	});

// }