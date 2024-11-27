let fname = document.getElementById('fname'),
	lname = document.getElementById('lname'),
	email = document.getElementById('email_addr'),
	pass1 = document.getElementById('pass1'),
	pass2 = document.getElementById('pass2'),
	btn_signup = document.getElementById('btn_signup'),
	alert = document.getElementById('alert'),
	signup_form = document.getElementById('form_signup');
main_message = "",
	mail_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

const error_message = (message) => {
	alert.classList.remove('d-none');
	alert.innerHTML = "<strong>Error!</strong> " + message;
}

const confirm_password = () => {
	if (pass1.value != pass2.value) {
		error_message('Password not matched');
		pass2.focus();
	} else {
		return true;
	}
}
const remove_alert = () => {
	alert.classList.add('d-none');
	alert.innerHTML = "";
}

const validate_otherField = () => {
	let field_arr = [fname, lname, email, pass1, pass2];
	for (let i = 0; i < field_arr.length; i++) {
		if (field_arr[i].value != "") {
			remove_alert();
		} else {
			error_message("All fields are required");
			field_arr[i].focus();
			break;
		}
	}
}

$(document).ready(function () {
	$('#form_signup').on('submit', function (e) {
		e.preventDefault();
		validate_otherField();
		confirm_password();

		let input = $('input');
		let flag = 0;

		for (let i = 0; i < input.length; i++) {
			if ($(input[i]).val() != "") {
				flag++;
			}
		}
		if (flag == input.length && confirm_password()) {

			var formData = new FormData(this);
			var date = new Date();
			var fullDate = `${date.getDate()}-${date.getMonth() + 1}-${date.getFullYear()}`;
			formData.append("created_at", fullDate);
			$.ajax({
				url: '../index.php/insert',
				type: 'post',
				data: formData,
				processData: false,
				contentType: false,
				success: function (res) {
					if(res.length > 3){
						error_message(res);
						email.focus();
					}else{
						remove_alert();
						location.href = "./message";
						$('#form_signup').trigger("reset");
						$('.custom-file-label').html('Choose file');
					}
				}
			})
		}

	})
	$(pass2, pass1).keyup(function () {
		if (pass1.value === pass2.value) {
			remove_alert();
		}
	})

})