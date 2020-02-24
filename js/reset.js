$('#passwordConfirm').keyup(function() {
	checkPwd();
});

$('#password').keyup(function() {
	checkPwd();
});

$('#resetPwd').on('click', function() {
	$(this).toggleClass('running');
	var match = checkPwd();
	if (match) {
		var email = $('#email').val();
		var hash = $('#hash').val();
		var pwd = $('#password').val();
		$.ajax({
			url:'./php/functResetPwdFinal.php'	              		,
			method:'POST',
			data:{
			email: email,
			hash: hash,
			pwd: pwd
			},
		        success:function(result) {
		        	if (result == 'yes') {
		        		success('reset','Password successfully reset.');
		        	}
		        	else {
		        		error('reset','Reset failed, please try again. Contact us at runmun@bellevuemun.com');
		        	}
		        	$('#resetPwd').toggleClass('running');
			}
			
		});
	}
	else {
		$('#resetPwd').toggleClass('running');
		return;
	}
});

$('#cancel').on('click', function() {
	$(this).toggleClass('running');
	location.replace("https://runmun.app/runmun/portal");
	$(this).toggleClass('running');
});

$("form").submit( function(event) {
	return false;
});	
$('form').keypress(function(event){
	var keycode = (event.keyCode ? event.keyCode : event.which);
	if(keycode == '13'){
       		$('#resetPwd').click();
   	}
});

function error(page,message) {
	$('#'+page+'-error-box strong').text('');
	$('#'+page+'-error-box h6').text(message);
	$('#'+page+'-error-box').fadeIn('fast');
}
function success(page,message) {
	$('#'+page+'-success-box strong').text('');
	$('#'+page+'-success-box h6').text(message);
	$('#'+page+'-success-box').fadeIn('fast');
}
function hideError(page) {
	$('#'+page+'-error-box strong').text('Error');
	$('#'+page+'-error-box h6').text('');
	$('#'+page+'-error-box').fadeOut('fast');
}
function hideSuccess(page) {
	$('#'+page+'-success-box strong').text('Success');
	$('#'+page+'-success-box h6').text('');
	$('#'+page+'-success-box').fadeOut('fast');
}
function checkPwd() {
	pwd1 = $('#password').val();
	pwd2 = $('#passwordConfirm').val();
	if (pwd1 == pwd2 && pwd1) {
		hideError('reset');
		success('reset','Identical Passwords');
		return true;
	}
	else {
		hideSuccess('reset');
		error('reset','Passwords do not match or are empty.');
		return false;
	}
}
$('.alert .close').on('click', function(e) {
    $(this).parent().fadeOut('fast');
});
