(function() {
    "use strict";

    function postForm(action, data) {
        var f = document.createElement('form');
        f.method = 'POST';
        f.action = action;

        for (var key in data) {
            var d = document.createElement('input');
            d.type = 'hidden';
            d.name = key;
            d.value = data[key];
            f.appendChild(d);
        }
        document.body.appendChild(f);
        f.submit();
    }

    function setLocationHref(url) {
        if (typeof(url) == "function") {
            // Deprecated -- instead, override
            // allauth.facebook.onLoginError et al directly.
            url();
        } else {
            window.location.href = url;
        }
    }

    var allauth = window.allauth = window.allauth || {};

    allauth.facebook = {

        init: function(opts) {
            this.opts = opts;

            window.fbAsyncInit = function() {
                FB.init({
                    appId      : opts.appId,
                    channelUrl : opts.channelUrl,
                    status     : true,
                    cookie     : true,
                    oauth      : true,
                    xfbml      : true
                });
            };

            (function(d){
                var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                js = d.createElement('script'); js.id = id; js.async = true;
                js.src = "https://connect.facebook.net/"+opts.locale+"/all.js";
                d.getElementsByTagName('head')[0].appendChild(js);
            }(document));
        },

        login: function(nextUrl, action, process) {
            var self = this;
            if (typeof(FB) == 'undefined') {
                return;
            }
            if (action == 'reauthenticate') {
                this.opts.loginOptions.auth_type = action;
            }

            FB.login(function(response) {
                if (response.authResponse) {
                    self.onLoginSuccess.call(self, response, nextUrl, process);
                } else if (response && response.status && ["not_authorized", "unknown"].indexOf(response.status) > -1) {
                    self.onLoginCanceled.call(self, response);
                } else {
                    self.onLoginError.call(self, response);
                }
            }, self.opts.loginOptions);
        },

        onLoginCanceled: function(response) {
            //setLocationHref(this.opts.cancelUrl);
        },

        onLoginError: function(response) {
            //setLocationHref(this.opts.errorUrl);
            alert('페이스북 로그인에 실패했습니다.');
        },

        onLoginSuccess: function(response, nextUrl, process) {
            var data = {
                next: nextUrl || '',
                process: process,
                access_token: response.authResponse.accessToken,
                expires_in: response.authResponse.expiresIn,
                csrfmiddlewaretoken: this.opts.csrfToken
            };

            //postForm(this.opts.loginByTokenUrl, data);
            $.ajax({
                type: "POST",
                url: this.opts.loginByTokenUrl,
                data: data,
                success: function() {
                    opg.fn.onLoginSuccess();
                },
                error: function() {
                    alert('Error occured!');
                    window.location.reload(true);
                }
            });
        },

        logout: function(nextUrl) {
            var self = this;
            if (typeof(FB) == 'undefined') {
                return;
            }
            FB.logout(function(response) {
                self.onLogoutSuccess.call(self, response, nextUrl);
            });
        },

        onLogoutSuccess: function(response, nextUrl) {
            var data = {
                next: nextUrl || '',
                csrfmiddlewaretoken: this.opts.csrfToken
            };

            //postForm('/discover/', data);
        }
    };

})();