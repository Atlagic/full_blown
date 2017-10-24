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
          <form method="POST" id="ap_form">
           <table>
                <tr>
                  <th> UPDATE </th>
                  <th> DELETE </th>
                  <th>ALL<input type = "checkbox" name = "chbb" onclick="toggle(this)"/></th>
                  <td> ID </td>
                  <th> COMMENT </th>
                  <th> DATE </th>
                  <th> ROLE </th>
                  <th> POST ID </th>
                </tr>
                <?php if(!empty($comm)) :?>
                <?php foreach ($comm as $c) :?>
                <tr>
                  <td><a href="<?php print base_url();?>Comments_ap/update/<?php print $c['comment_id'];?>/true"><i class = "fa fa-external-link"></i></a></td>
                  <td><a href="<?php print base_url();?>Comments_ap/delete/<?php print $c['comment_id'];?>"><i class = "fa fa-trash-o"></a></td>
                  <td><input type = "checkbox" name = "chb"/></td>
                  <td><?php echo $c['comment_id']; ?></td>
                  <td><?php echo $c['comment']; ?></td>
                  <td><?php echo $c['comment_date']; ?></td>
                  <td><?php echo $c['role']; ?></td>
                  <td><?php echo $c['idPost']; ?></td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
             </table>
            </form>
             <?php
            if (!$edit) {
                echo form_open_multipart('Comments_ap/add', array('method'=>'post', 'id'=>'form', "style"=>"margin-top:100px; margin-left:300px; height: 520px; width: 400px;"));
          
                        echo form_input(array("type"=>"text","id"=>"tbComment", "name"=>"tbComment", "class"=>"styled", "style"=>"margin-bottom: 30px; width:400px; text-align:center;", "placeholder"=>"Comment"));

                        echo form_input(array("type"=>"text","id"=>"tbDate", "name"=>"tbDate", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Date"));

                        echo form_input(array("type"=>"text","id"=>"tbRole", "name"=>"tbRole", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Role"));

                        echo form_input(array("type"=>"text", "id"=>"tbPost", "name"=>"tbPost", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"POST ID"));
                        
   
                        echo form_input(array("type"=>"submit", "id"=>"btnInsert", "name"=>"btnInsert", "class"=>"button", "value"=>"INSERT", "style"=>"margin-left:130px;"));
                        
                    echo form_close();
                    if(!empty($this->session->userdata('errors')))
                    {
                        echo '<div id="error">'.$this->session->userdata('errors').'</div>';
                        $this->session->unset_userdata('errors');
                    }
            }
                ?>
            <?php if($edit) : ?>
            
                <?php foreach($post_detail as $post) :?>
                    <?php   echo form_open_multipart('Comments_ap/update/'.$c['comment_id'], array('method'=>'post', 'id'=>'form', "style"=>"margin-top:100px; margin-left:300px; height: 520px; width: 400px;"));
          
                        echo form_input(array("type"=>"text","id"=>"tbComment", "name"=>"tbComment", "class"=>"styled", "style"=>"margin-bottom: 30px; width:400px; text-align:center;", "placeholder"=>"Comment", 'value' => $post['comment']));

                        echo form_input(array("type"=>"text","id"=>"tbDate", "name"=>"tbDate", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Date", 'value' => $post['comment_date']));

                        echo form_input(array("type"=>"text","id"=>"tbRole", "name"=>"tbRole", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Role", 'value' => $post['role']));

                        echo form_input(array("type"=>"text", "id"=>"tbPost", "name"=>"tbPost", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"POST ID", 'value' => $post['idPost']));
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



