import { CookieUtils } from "./cookieUtils.js";

window.onload = function() {
    if(!CookieUtils.getCookieId("projectManagerCookies")){
      var cookiesModal = new bootstrap.Modal(document.getElementById('cookiesModal'));
      cookiesModal.show();
  
      document.getElementById("yes-cookie").addEventListener("click", function() {
          CookieUtils.setCookie("projectManagerCookies","yes",365);
      });
      
    }

};
