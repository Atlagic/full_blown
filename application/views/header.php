<body>
    <div class="container">
    <div id="header">
      <p style="color:#98FB98; font-size:20px;">© Copyright by Aleksandar Atlagić 2017. All rights reserved!</p>
      <?php //  $this->session->sess_destroy();
        ?>
      <div id="sign">
          <?php $user = $this->session->userdata('username');
          if(empty($user))
          { ?>
          <div class="sign">
              <?php echo anchor('Register', 'Register');?>
          </div>
          
          <div class="sign">
            <?php echo anchor('Login', 'Login');?>
          </div>
     <?php }
            else
            { 
                if($this->session->userdata('role') == 'admin')
                {
                ?>
                <div class="sign">
                    <?php echo '<label><i class="fa fa-user-secret" aria-hidden="true" style="margin-right:5px;"></i>'.$user.'</label>'; ?>
                </div>
          <?php } 
                else
                { ?>
                <div class="sign">
                    <?php echo '<label><i class="fa fa-user-circle-o" aria-hidden="true" style="margin-right:5px;"></i>'.$user.'</label>'; ?>
                </div>
          <?php } ?>
                <div class="sign">
                    <?php echo anchor('Login/logout', 'Logout');?>
                </div>
                
      <?php } ?>
          
      </div>
    </div>

