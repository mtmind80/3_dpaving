<div class="demo-logo bg-primary"><img src="assets/images/AllPaving-XSmall.png" alt="" style="margin-top: -4px;"></div>

    <div class="clef-button-container">
        <script data-cfasync="false" src="{$CLEF_JS}"></script>
        <div class="clef-embed-container">
            <div class="clef-button-to-render" data-app-id='{$APP_ID}'
                 data-color="white" data-style="button"
                 data-type="login"

              data-embed="true"     data-state="MKZRaLIyzjpVMpzuhNa1mciy"
               data-redirect-url='{$SITE_URL}loginclef/'
              data-custom-logo="assets/images/AllPaving-XSmall.png"    data-custom-message="Your My baby">
            </div>
        </div>
        {literal}
        <script data-cfasync="false" type='text/javascript'>
            if (typeof(ClefButton.initialize) === "function") {
                var buttons = document.querySelectorAll('.clef-button-to-render'),
                        renderedButtons = [];
                for (var i = 0; i < buttons.length; i++) renderedButtons.push(ClefButton.initialize({ el: buttons[i] }));
            } else {
                var scripts = document.getElementsByTagName('script'),
                        currentScript = scripts[scripts.length - 1],
                        el = currentScript.previousElementSibling,
                        button = button = new ClefButton({el: el});
                button.render();
            }
        </script>    </div>
    <noscript>
        <style>
            .clef-login-container { display: none; }
            #login { width: 320px !important; }
            #loginform { height: auto !important; }
        </style>
    </noscript>

{/literal}
   OR <a  href="{$SITE_URL}">log in with a password</a>




        <div class="info">
            <p><a href="http://getclef.com">Clef</a> lets you securely log in with your phone.</p>
            <p>To change the way the login form displays with Clef, log in and go to the Clef settings page.</p>
        </div>



</div>






