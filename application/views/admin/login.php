  <body class="login-page">
    <div class="content" style="min-height: 0px !important;">
      <div class="row">
        <div class="col-md-3"><img src="<?php echo base_url(); ?>assets/images/logo.png" alt="Arpiya Aircon" /></div>
        <div class="col-md-9 login-header">Arpiya Aircon - Enterprise Resource Planning</div>
      </div>
    </div>
    <div class="login-box">      
      <div class="login-box-body">
        <p class="login-box-msg">Login</p>
        <div id="message" class="<?php echo $this->session->flashdata('type'); ?>">
          <?php if($this->session->flashdata('message')) { echo $this->session->flashdata('message'); ?>
          <span id="msg_span"><i class="fa fa-fw fa-close"></i></span>
          <?php } ?>
        </div>
        <form id="loginForm" method="post">
          <div class="form-group has-feedback">
            <input type="email" class="form-control" name="email" placeholder="Email" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">            
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->    