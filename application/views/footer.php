
<div id="footer">
      <div id="foot_cont">
        <div id="social">
          <div id="logos">
            <a href=""><img class="face" src="<?php echo base_url().'pictures/logo/facebook.svg'?>" nerror="this.onerror=null; this.src='<?php echo base_url()."pictures/logo/facebook.png"?>'" width="40px"; height="40px"/></a>
            <a href=""><img class="twitt" src="<?php echo base_url().'pictures/logo/twitter.svg'?>" nerror="this.onerror=null; this.src='<?php echo base_url()."pictures/logo/twitter.png"?>'" width="50px"; height="50px"/></a>
            <a href=""><img class="insta" src="<?php echo base_url().'pictures/logo/instagram.svg'?>" nerror="this.onerror=null; this.src='<?php echo base_url()."pictures/logo/instagram.png"?>'" width="60px"; height="60px"/></a>
            <a href=""><img class="goog" src="<?php echo base_url().'pictures/logo/google.svg'?>" nerror="this.onerror=null; this.src='<?php echo base_url()."pictures/logo/google.png"?>'" width="50px"; height="50px"/></a>
            <a href=""><img class="link" src="<?php echo base_url().'pictures/logo/linkedin.svg'?>"  nerror="this.onerror=null; this.src='<?php echo base_url()."pictures/logo/linkedin.png"?>'" width="40px"; height="40px"/></a>
          </div>
          <div id="foot_menu">
            <nav id="nav-2">
              <?php 
                if(isset($menus))
                {
                    foreach($menus as $menu)
                    {
                        echo "<a class='link' href='".base_url().$menu->page_title."'>".$menu->page_name."</a>";
                    }
                }
            ?>
            </nav>
          </div>
          <div id="down_menu">
            <nav id="nav-1">
              <?php echo anchor('Register', 'register');?><!-- class link -->
              <?php echo anchor('Login', 'login');?>
              <?php echo anchor('Contact', 'contact');?>
              <a class="link" href="">documentation</a>

            </nav>
          </div>
        </div>
    </div>
    <div id="foot_down">
        <p style="color:#333; font-weight:bold; font-size:30px; text-align: center; padding-top:7px;">" WORKOUT. EAT WELL. BE PATIENT. YOUR BODY WILL REWARD YOU! "</P>
    </div>
   </div>
</div>
  </body>
</html>
