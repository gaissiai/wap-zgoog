$(function(){
	var producval='';
	$('.productid').keyup(function(){

		if(/[^0-9]+/.test($(this).val())==true){
	
			$(this).val(producval);
		}else{
			producval = $(this).val();
		}
	});
})