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
                  <th> NAME </th>
                  <th> TITLE </th>
                  <th> PICTURE </th>
                </tr>
                <?php if(!empty($posts)) :?>
                <?php foreach ($posts as $post) :?>
                <tr>
                  <td><a href="<?php print base_url();?>Posts_ap/update/<?php print $post['post_id'];?>/true""><i class = "fa fa-external-link"></i></a></td>
                  <td><a href="<?php print base_url();?>Posts_ap/delete/<?php print $post['post_id'];?>"><i class = "fa fa-trash-o"></a></td>
                  <td><input type = "checkbox" name = "chb"/></td>
                  <td><?php echo $post['post_id']; ?></td>
                  <td><?php echo $post['post_name']; ?></td>
                  <td><?php echo word_limiter($post['post_title1'], 20); print  word_limiter($post['post_title2'],20); ?></td>
                  <td><img width="50px" height="50px" src="<?php echo $post['post_pic']; ?>"</td>
                </tr>
                <?php endforeach;?>
                <?php endif;?>
             </table>
            </form>
             <?php
            if (!$edit) {
                echo form_open_multipart('Posts_ap/add', array('method'=>'post', 'id'=>'form', "style"=>"margin-top:100px; margin-left:300px; height: 520px; width: 400px;"));
          
                        echo form_input(array("type"=>"text","id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px; width:400px; text-align:center;", "placeholder"=>"Name"));

                        echo form_input(array("type"=>"text","id"=>"tbTitle1", "name"=>"tbTitle1", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Title1"));

                        echo form_input(array("type"=>"text","id"=>"tbTitle2", "name"=>"tbTitle2", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Title2"));

                        echo form_input(array("type"=>"file", "id"=>"tbPicture", "name"=>"tbPicture", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;"));
                        
   
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
                <?php foreach($post_detail as $post) :?>
                    <?php   echo form_open_multipart('Posts_ap/update/'.$post['post_id'], array('method'=>'post', 'id'=>'form', "style"=>"margin-top:100px; margin-left:300px; height: 520px; width: 400px;"));
          
                        echo form_input(array("type"=>"text","id"=>"tbName", "name"=>"tbName", "class"=>"styled", "style"=>"margin-bottom: 30px; width:400px; text-align:center;", "placeholder"=>"Name", 'value' => $post['post_name']));

                        echo form_input(array("type"=>"text","id"=>"tbTitle1", "name"=>"tbTitle1", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Title1", 'value' => $post['post_title1']));

                        echo form_input(array("type"=>"text","id"=>"tbTitle2", "name"=>"tbTitle2", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;", "placeholder"=>"Title2", 'value' => $post['post_title2']));

                        echo form_input(array("type"=>"file", "id"=>"tbPicture", "name"=>"tbPicture", "class"=>"styled", "style"=>"margin-bottom: 30px;width:400px; text-align:center;"));
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

