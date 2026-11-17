const registrationForm = document.querySelector('#registration-form');

if (registrationForm) {
	const password = document.querySelector('#password');
	const confirmPassword = document.querySelector('#confirm_password');

	function validatePasswords() {
		if (password.value !== confirmPassword.value) {
			confirmPassword.setCustomValidity('Password tidak sama.');
			return;
		}

		confirmPassword.setCustomValidity('');
	};

	password.addEventListener('input', validatePasswords);
	confirmPassword.addEventListener('input', validatePasswords);
}

