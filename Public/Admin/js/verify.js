$(function(){
	$('#LoginButton').click(function(){
		if($('#AdminName').val()=='' || $('#AdminPassword').val()==''){
			alert('账号不能为空/密码');
		}else{
			$('#form1').attr('onsubmit','return true');
		}
	});
})