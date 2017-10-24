<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<script type ="text/javascript">
       $(document).ready(function(){
         $("tbody tr:even").css('background-color', '#98FB98');
       });
     </script>
     <script type ="text/javascript" language="JavaScript">

       function toggle(source) {
         checkboxes = document.getElementsByName('chb');
         for(var i=0, n=checkboxes.length;i<n;i++)
         {
           checkboxes[i].checked = source.checked;
         }
       }

     </script>
<div id="content">
        <div id="admin_panel">
          <form method="POST" id="ap_form" style="width:100%;">
           <table>
                <tr>
                  <th> UPDATE </th>
                  <th> DELETE </th>
                  <th>ALL<input type = "checkbox" name = "chbb" onclick="toggle(this)"/></th>
                  <th> ID </th>
                  <th> NAME </th>
                  <th> LASTNAME </th>
                  <th> EMAIL </th>
                  <th> USERNAME </th>
                  <th> ROLE </th>
                </tr>
                    <?php if(!empty($user)) :?>
                  <?php foreach ($user as $u) :?>
                <tr>

                <td><a href="<?php print base_url();?>Users_ap/update/<?php print $u->idUser;?>/true"><i class = "fa fa-external-link"></i></a></td>
                <td><a href="<?php print base_url();?>Users_ap/delete/<?php print $u->idUser;?>"><i class = "fa fa-trash-o"></a></td>
                <td><input type = "checkbox" name = "chb"/></td>
                <td><?php echo $u->idUser; ?> </td>
                <td><?php echo $u->name; ?> </td>
                <td><?php echo $u->lastname; ?> </td>
                <td><?php echo $u->email; ?> </td>
                <td><?php echo $u->username; ?> </td>
                <td><?php echo $u->idRole; ?> </td>
 
                </tr>
                
                  <?php endforeach; endif;?>
             </table>
            </form>
            <?php
            if (!$edit) {
                echo form_open_multipart('Users_ap/add', array('method'=>'post', 'id'=>'form', "style"=>"margin-top:100px; margin-left:300px; height: 520px; width: 400px;"));
          
                        echo form_input(array("type"=>"text","id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px; width:400px; text-align:center;", "placeholder"=>"Name"));
                        
                        
                        echo form_input(array("type"=>"text","id"=>"tbLastName", "name"=>"tbLastName", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Lastname"));
                        
                        
                        echo form_input(array("type"=>"text","id"=>"tbEmail", "name"=>"tbEmail", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Email"));
                        
                        
                        echo form_input(array("type"=>"text","id"=>"tbUsername", "name"=>"tbUsername", "class"=>"styled", "style"=>"margin-bottom:30px;width:400px; text-align:center;", "placeholder"=>"Username"));
                       
                        
                        echo form_input(array("type"=>"password", "id"=>"tbPassword", "name"=>"tbPassword", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Password"));
                        
                        echo form_input(array("type"=>"text", "id"=>"tbRole", "name"=>"tbRole", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"ID ROLE"));                        
                       
                        echo form_input(array("type"=>"submit", "id"=>"btnInsert", "name"=>"btnInsert", "class"=>"button", "value"=>"INSERT", "style"=>"margin-left:130px;"));
                        
                    echo form_close();
                    if(!empty($this->session->userdata('errors')))
                    {
                        echo '<div id="error">'.$this->session->userdata('errors').'</div>';
                        $this->session->unset_userdata('errors');
                    }
            }
                ?>
            <?php  if($edit) :?>
                <?php foreach($user_detail as $user) :?>
                    <?php echo form_open_multipart('Users_ap/update/'.$user['idUser'], array('method'=>'post', 'id'=>'form', "style"=>"margin-top:100px; margin-left:300px; height: 520px; width: 400px;"));
          
                        echo form_input(array("type"=>"text","id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px; width:400px; text-align:center;", "placeholder"=>"Name", 'value' => $user['name']));
                        
                        
                        echo form_input(array("type"=>"text","id"=>"tbLastName", "name"=>"tbLastName", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Lastname", 'value' => $user['lastname']));
                        
                        
                        echo form_input(array("type"=>"text","id"=>"tbEmail", "name"=>"tbEmail", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Email", 'value' => $user['email']));
                        
                        
                        echo form_input(array("type"=>"text","id"=>"tbUsername", "name"=>"tbUsername", "class"=>"styled", "style"=>"margin-bottom:30px;width:400px; text-align:center;", "placeholder"=>"Username", 'value' => $user['username']));
                       
                        
                        echo form_input(array("type"=>"password", "id"=>"tbPassword", "name"=>"tbPassword", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Password", 'value' => $user['password']));
                        
                        echo form_input(array("type"=>"text", "id"=>"tbRole", "name"=>"tbRole", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"ID ROLE", 'value' => $user['idRole']));                        
                       
                        echo form_input(array("type"=>"submit", "id"=>"btnInsert", "name"=>"btnInsert", "class"=>"button", "value"=>"UPDATE", "style"=>"margin-left:130px;"));
                        
                    echo form_close();
                    if(!empty($this->session->userdata('errors')))
                    {
                        echo '<div id="error">'.$this->session->userdata('errors').'</div>';
                        $this->session->unset_userdata('errors');
                    }
                ?>
            <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>



