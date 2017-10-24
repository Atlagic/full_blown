<div id="content">
            <div id="reg_content">
                <h2>Register form</h2>
                <p>If you are already registred go to <a href="login.php" style="text-decoration:none; color:#98FB98;"> login </a> page, otherwise please fill the registration form above and than login to our site to have full expirience.</p>
                <p>Fields marked with an * are required.</p>
                <div id="reg_form">
                    <?php  
                $user = $this->session->userdata('user');
                if(empty($user))
                {    
                    echo validation_errors();
                    echo form_open_multipart('Register/register', array('method'=>'post', 'id'=>'form'));
                        echo form_label('Name *');
                        echo br();
                        echo form_input(array("type"=>"text","id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Lastname *');
                        echo br();
                        echo form_input(array("type"=>"text","id"=>"tbLastName", "name"=>"tbLastName", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Email_ *');
                        echo br();
                        echo form_input(array("type"=>"text","id"=>"tbEmail", "name"=>"tbEmail", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Username *');
                        echo br();
                        echo form_input(array("type"=>"text","id"=>"tbUsername", "name"=>"tbUsername", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Password *');
                        echo br();
                        echo form_input(array("type"=>"password", "id"=>"tbPassword", "name"=>"tbPassword", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Confirm password *');
                        echo br();
                        echo form_input(array("type"=>"password","id"=>"tbPassword2", "name"=>"tbPassword2", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_input(array("type"=>"submit", "id"=>"btnRegister", "name"=>"btnRegister", "class"=>"button", "value"=>"Register"));
                    echo form_close();
                    if(!empty($this->session->userdata('errors')))
                    {
                        echo '<div id="error">'.$this->session->userdata('errors').'</div>';
                        $this->session->unset_userdata('errors');
                    }
                }
                   ?>
                </div>
            </div>
        </div>

