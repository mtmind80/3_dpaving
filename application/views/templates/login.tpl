<script type="text/javascript">

        $('#login_form').validate({
            rules: {
                usrpass: {
                    required: true,
                    minlength: 6
                },
                email: {
                    required: true,
                    minlength: 6,
                    email: true
                }
            }

    });

</script>
<div class="row">
    <div class="col-md-3">
    </div>
    <div class="col-md-6" style="text-align: center;">
        <img src="{$SITE_URL}assets/images/3d-Paving-Logo.jpg" alt="logo" style="width:400px;
    margin-bottom: 60px;" >
        <br />



            <!-- Form -->
            <form action="{$SITE_URL}login" id="login_form" name="login_form" class="panel" method="POST">


                <div class="row">

                    <div class="col-lg-12">

                    <div class="form-group" >
                  <label for='email'></label>  <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email">
                </div> <!-- / Username -->

                <div class="form-group signin-password">
                    <label for='usrpass'></label>  <input type="password" name="usrpass" id="usrpass" class="form-control input-lg" placeholder="Password">
                </div> <!-- / Password -->

                <div class="form-actions">
                    <input type="submit" value="Sign In" class="btn btn-primary btn-block btn-lg">
                </div> <!-- / .form-actions -->
            </form>
            <!-- / Form
            <a href='{$SITE_URL}clef'>Login With CLEF</a>
         -->
    </div>
    <div class="col-md-3">
    </div>
</div>

</div>
</div>

<script>
$("#email").focus();
</script>

</script>
