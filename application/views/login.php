<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url('assets/');?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/');?>css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="<?= base_url('assets/');?>css/matrix-login.css" />
        <link href="<?= base_url('assets/');?>font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox"  >            
         <div class="control-group normal_text"> <h3><img src="<?= base_url('assets/');?>images/Logo.png" width="150px" alt="Logo" /></h3></div>
            <form action="login/login" id="loginform" class="form-vertical" method="POST" >
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span>
                            <input name="username" type="text" placeholder="Username" >
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span>
                            <input name="password"  type="password" placeholder="Password" >
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-right"><button type="submit" class="btn btn-success"> Login</button></span>
                </div>
            </form>            
        </div>
        
        <script src="<?= base_url('assets/');?>js/jquery.min.js"></script>  
        <script src="<?= base_url('assets/');?>js/matrix.login.js"></script> 
    </body>

</html>