<div id="content">
            <div id="log_content">
                <h2>Login form</h2>
                <p>Please login to our site to have full expirience.</p>
                <p>Fields marked with an * are required.</p>
                <div id="log_form">
                <?php  
                $user = $this->session->userdata('username');
                if(empty($user))
                {    
                    echo validation_errors();
                    echo form_open_multipart('Login/login', array('method'=>'post', 'id'=>'form'));
                        echo form_label('Username *');
                        echo br();
                        echo form_input(array("type"=>"text","id"=>"tbUsername", "name"=>"tbUsername", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Password *');
                        echo br();
                        echo form_input(array("type"=>"password", "id"=>"tbPassword", "name"=>"tbPassword", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_input(array("type"=>"submit", "id"=>"btnSubmit", "name"=>"btnSubmit", "class"=>"button", "value"=>"Login"));
                    echo form_close();
                    if(!empty($this->session->userdata('errors')))
                    {
                        echo '<div class="error">'.$this->session->userdata('errors').'</div>';
                        $this->session->unset_userdata('errors');
                    }
                }
                   ?>
                    
                </div>
                
            </div>
        </div>

