<script type="text/javascript" language="JavaScript" src="js/contact.js"></script>
<div id="content">
            <div id="cont_content">
                <h2>Contact form</h2>
                <p>If you want to get in touch with us, send feedback, suggestion or enything else please fill the contact form above.</p>
                <?php  
                $user = $this->session->userdata('username');
                if(!empty($user))
                {
                    echo '<p>Fields marked with an * are required.</p>
                    <div id="cont_form">';
                
                    echo form_open_multipart('Contact/contact', array('method'=>'POST', 'id'=>'form'));
                        echo form_label('Name *');
                        echo br();
                        echo form_input(array("type"=>"text", "id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Lastname *');
                        echo br();
                        echo form_input(array("type"=>"text", "id"=>"tbLastName", "name"=>"tbLastName", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Email_ *');
                        echo br();
                        echo form_input(array("type"=>"text", "id"=>"tbEmail", "name"=>"tbEmail", "class"=>"styled", "style"=>"margin-bottom: 30px;"));
                        echo br();
                        echo form_label('Message *');
                        echo br();
                        echo form_textarea(array("id"=>"txtaContact", "name"=>"txtaContact"));
                        echo br();
                        echo form_input(array("type"=>"submit", "id"=>"btnContact", "name"=>"btnContact", "class"=>"button", "value"=>"Send"));
                    echo form_close();
                    if(!empty($this->session->userdata('errors')))
                    {
                        echo '<div id="errorr">'.$this->session->userdata('errors').'</div>';
                        $this->session->unset_userdata('errors');
                    }
                }
                else
                {
                    echo '<p style="color:red";>You must login if you want to send us a message!</p>
                    <div id="cont_form">';
                    echo form_open_multipart('Contact/contact', array('method'=>'POST', 'id'=>'form'));
                        echo form_label('Name *');
                        echo br();
                        echo form_input(array("type"=>"text", "id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px;", "readonly"=>"true"));
                        echo br();
                        echo form_label('Lastname *');
                        echo br();
                        echo form_input(array("type"=>"text", "id"=>"tbLastName", "name"=>"tbLastName", "class"=>"styled", "style"=>"margin-bottom: 30px;", "readonly"=>"true"));
                        echo br();
                        echo form_label('Email_ *');
                        echo br();
                        echo form_input(array("type"=>"text", "id"=>"tbEmail", "name"=>"tbEmail", "class"=>"styled", "style"=>"margin-bottom: 30px;", "readonly"=>"true"));
                        echo br();
                        echo form_label('Message *');
                        echo br();
                        echo form_textarea(array("id"=>"txtaContact", "name"=>"txtaContact", "readonly"=>"true"));
                        echo br();
                        echo form_input(array("type"=>"submit", "id"=>"btnContact", "name"=>"btnContact", "class"=>"button", "value"=>"Send", "style"=>"display:none;"));
                    echo form_close();
                    if(!empty($this->session->userdata('errors')))
                    {
                        echo '<div id="errorr">'.$this->session->userdata('errors').'</div>';
                        $this->session->unset_userdata('errors');
                    }
                }
                    ?>
                </div>
            </div>
        </div>

