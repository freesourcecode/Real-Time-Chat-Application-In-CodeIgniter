
let email = document.getElementById('email_addr');
let pass1 = document.getElementById('pass1');
let btn_login = document.getElementById('btn_login');
let alert = document.getElementById('alert');
let checkbox = document.getElementById('chkbox1');
let main_message = "";

let mail_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

const error_message = (message) => {
	alert.classList.remove('d-none');
	alert.innerHTML = "<strong>Error!</strong> "+message;
}
const remove_alert = () => {
	alert.classList.add('d-none');
	alert.innerHTML = "";
}

const validate_otherField = () => {
	let field_arr = [email, pass1];
	for(let i = 0; i < field_arr.length; i++){
		if(field_arr[i].value != "" ){
			remove_alert();
		}else{
			error_message("All fields are required");
			field_arr[i].focus();
			break;
		}
	}
}
$(document).ready(function(){
	$('#form_login').on('submit',function(e){
		e.preventDefault();
		validate_otherField();

		let input = $('input');
		let flag = 0;
		
		for(let i = 0; i < input.length; i++){
			if($(input[i]).val() != ""){
				flag++;
			}
		}
		if(flag == input.length){
			let formData = new FormData(this);
			$.ajax({
				url : 'index.php/search',
				type : 'post',
				data : formData,
				processData:false,
				contentType: false,
				success:function(res){
					if(res != 0){
						$('#form_login').trigger('reset');
						remove_alert();
						// console.log(res);
						location.href = "./index.php/message";
					}else{
						error_message('Invalid email or password');
						email.focus();
					}
				}
			})
		} 
	})
	$(checkbox).click(function(){
		if(checkbox.checked == true){
			$(pass1).attr('type','text');
		}else{
			$(pass1).attr('type','password');
		}
	})

})
