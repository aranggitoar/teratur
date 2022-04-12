function switchToLoginForm() {
  let loginForm = "<?php $this->print_login_form(); ?>";
  let wrapper = document.querySelector(".login-registration-form-wrapper");
  wrapper.write("");
  wrapper.write(loginForm);
}

function switchToRegistrationForm() {
  let registrationForm = "<?php $this->print_register_form(); ?>";
  let wrapper = document.querySelector(".login-registration-form-wrapper");
  wrapper.write("");
  wrapper.write(registrationForm);
}
