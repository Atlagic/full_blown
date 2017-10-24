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
                  <th> TITLE </th>
                </tr>
                    <?php if(!empty($page)) :?>
                  <?php foreach ($page as $p) :?>
                <tr>

                <td><a href="<?php print base_url();?>Pages_ap/update/<?php print $p['page_id'];?>/true"><i class = "fa fa-external-link"></i></a></td>
                <td><a href="<?php print base_url();?>Pages_ap/delete/<?php print $p['page_id'];?>/true"><i class = "fa fa-trash-o"></a></td>
                <td><input type = "checkbox" name = "chb"/></td>
                <td><?php echo $p['page_id'];; ?> </td>
                <td><?php echo $p['page_name']; ?> </td>
                <td><?php echo $p['page_title']; ?> </td>
 
                </tr>
                
                  <?php endforeach; endif;?>
             </table>
            </form>
            <?php
            if (!$edit) {
                echo form_open_multipart('Pages_ap/add', array('method'=>'post', 'id'=>'form', "style"=>"margin-top:100px; margin-left:300px; height: 520px; width: 400px;"));
          
                        echo form_input(array("type"=>"text","id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px; width:400px; text-align:center;", "placeholder"=>"Name"));                        
                        
                        echo form_input(array("type"=>"text","id"=>"tbTitle", "name"=>"tbTitle", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Title"));                    
                       
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
                    <?php echo form_open_multipart('Pages_ap/update/'.$p['page_id'], array('method'=>'post', 'id'=>'form', "style"=>"margin-top:100px; margin-left:300px; height: 520px; width: 400px;"));
          
                        echo form_input(array("type"=>"text","id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px; width:400px; text-align:center;", "placeholder"=>"Name", 'value' => $user['page_name']));
                                                
                        echo form_input(array("type"=>"text","id"=>"tbTitle", "name"=>"tbTitle", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Title", 'value' => $user['page_title']));                  
                       
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

