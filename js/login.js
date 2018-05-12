/* global $ */
export function init() {
  $(document).ready(() => {
    const login_ct = $('.log-in');
    const signup_ct = $('.sign-up');
    const login = $('.log-in-button');
    const signup = $('.sign-up-button');
    login.css('background-color', 'grey');

    signup.click(() => {
      login_ct.hide();
      login.css('background-color', 'grey');
      signup.css('background-color', '#1AB188');
      signup_ct.fadeIn(300);
    });
    login.click(() => {
      signup_ct.hide();
      signup.css('background-color', 'grey');
      login.css('background-color', '#1AB188');
      login_ct.fadeIn(300);
    });
  });
}
