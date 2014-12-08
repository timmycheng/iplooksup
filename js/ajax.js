//frm:要提交的from;fn:成功后调用的函数
function ajaxSubmit (frm,fn) {
	var dataPara=getFormJson(frm);
	$.ajax({
		url:frm.action,
		type:frm.method,
		data:dataPara,
		success:fn
	});
}
//获取from中的元素,转化为JSON格式,形如:{name:'aaa',password:'bbb'},同名将会放到一个数组内
function getFormJson (frm) {
	var o={};
	var o=$(frm).serializeArray();//序列化from对象
	$.each(function () {
	        if (o[this.name] !== undefined) {
	            if (!o[this.name].push) {
	                o[this.name] = [o[this.name]];
	            }
	            o[this.name].push(this.value || '');
	        } else {
	            o[this.name] = this.value || '';
	        }
	    });
	return o;
}

//文件上传AJAX函数，其中fileElementId为文件控件的名字
function ajaxFileSubmit(frm,fn){
	$.ajaxFileUpload({
		url:frm.action,
		secureuri:false,
		fileElementId:'file',
		dataType:'HTML',//参数一定要大写
		success:fn
	});
}

function del(id){
	$.ajax({
		url:'source/db_del.php',
		type:'post',
		data:{"id":id},
		success: function(data){
			alert(data);
			$('#lit').click();
		}
	});
}

//页面生成时加载的函数
$(document).ready(function(){
	$('#index_form').bind('submit', function(){
		ajaxSubmit(this,function(data){//ajax成功后调用函数
			$('#result').html(data);
		});
		return false;//必须添加,防止form提交
	});

	$('#import_form').bind('submit',function(){
		ajaxFileSubmit(this,function(data){
			$('#result').html(data);
		});
		return false;
	});

	$('#clc-ret').bind('click',function(){//清除DIV内容
		$('#result').html(' ');
	});

	$('#lit').bind('click',function(){
		$.ajax({
			url:'source/db_list.php',
			type:'post',
			success: function(data){
				$('#result').html(data);
			}
		});
	});

});