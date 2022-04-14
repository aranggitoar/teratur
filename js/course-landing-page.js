const eaelLoginRegistrationWrapper =
    document.querySelector('.eael-login-registration-wrapper'),
  eaelLoginForm =
    document.querySelector('#eael-login-form-wrapper'),
  eaelLoginFormInnerWrapper =
    document.querySelector('.eael-login-form-wrapper > .lr-form-wrapper'),
  eaelRegisterForm =
    document.querySelector('#eael-register-form-wrapper'),
  eaelRegisterFormInnerWrapper =
    document.querySelector('.eael-register-form-wrapper > .lr-form-wrapper'),
  eaelRegisterFormPasswordConfirmation =
    document.querySelector('#form-field-confirm_pass'),
  eaelRegisterFormSubmitButton =
    document.querySelector('#eael-register-submit'),
  switcherMarkup = `
      <div id="login-registration-form-switcher-wrapper">
        <span id="login-form-switcher" onclick="switchToLoginForm()">Masuk</span>
        <span id="registration-form-switcher" onclick="switchToRegistrationForm()">Daftar</span>
      </div>`;

eaelRegisterFormInnerWrapper.insertAdjacentHTML( 'afterbegin', switcherMarkup );
eaelLoginFormInnerWrapper.insertAdjacentHTML( 'afterbegin', switcherMarkup );


eaelRegisterFormPasswordConfirmation.placeholder = 'Konfirmasi Kata Sandi';
eaelRegisterFormSubmitButton.value = 'Ya, daftarkan saya!';

/*
 * Switch to login type form.
 */
function switchToLoginForm() {
  switchDisplayedForm('login');
}

/*
 * Switch to registration type form.
 */
function switchToRegistrationForm() {
  switchDisplayedForm('register');
}

/*
 * Switch the form by changing its display state.
 * The default state is registration form.
 *
 * @param formType
 */
function switchDisplayedForm(formType) {
  const eaelLoginSwitcher =
    document.querySelector('#login-form-switcher'),
  eaelRegisterSwitcher =
    document.querySelector('#registration-form-switcher');
  if (formType === 'login') {
    eaelRegisterForm.setAttribute('style', 'display: none !important;');
    eaelLoginForm.setAttribute('style', 'display: block !important;');
    eaelRegisterSwitcher.setAttribute('style', 'border-bottom: none !important; opacity: .6 !important;');
    eaelLoginSwitcher.setAttribute('style', 'border-bottom: 1px solid black !important; opacity: 1 !important;');
  } else if (formType === 'register') {
    eaelLoginForm.setAttribute('style', 'display: none !important;');
    eaelRegisterForm.setAttribute('style', 'display: block !important;');
    eaelLoginSwitcher.setAttribute('style', 'border-bottom: none !important; opacity: .6 !important;');
    eaelRegisterSwitcher.setAttribute('style', 'border-bottom: 1px solid black !important; opacity: 1 !important;');
  }
}
