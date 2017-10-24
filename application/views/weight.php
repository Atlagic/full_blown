<div id="content">
            <div class="left">
            <div id="post">
                <?php if(isset($posts)) : ?>
                <?php foreach ($posts as $post) : ?>
                <div class="post_pic">
                    <img src="<?php echo $post->post_pic; ?>" alt="post_pic">
                </div>
                <div class="p_desc">
                    <div class="p_head">
                        <p><?php echo $post->post_name; ?></p>
                    </div>
                    <div class="p_comm">
                        <p class="time">Posted on Feb 2, 2017&nbsp; &nbsp; &nbsp;|</p>
                        <p class="role">by <a href="">admin</a></p>
                        <a class="comm" href="">Comments</a>
                    </div>
                    <div class="tekst">
                        <p><?php echo $post->post_title1; ?></p>
                        <p style="margin-top:16px;"><?php echo $post->post_title2; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <div class="comments">   
                <h2>Comments</h2>
                <?php if(isset($comm)) : ?>
                <?php foreach($comm as $c) : ?>
                <div class="comment_cont">
                    <div class="usr_com">
                        <p><?php echo $c->comment; ?></p> 
                    </div>
                    <div class="role2">
                        <p><?php echo '<p>Posted by: '.$c->role.'</p>'; ?></p> 
                    </div>
                    <div class='comm_time'>
                        <p><?php echo date('d/m/y H:i:s', $c->comment_date); ?></p> 
                    </div>
                    
                </div>
                <?php endforeach;?>
                <?php endif; ?>
                
            </div>
            <div class="arrows">
                <p>If you like this post please leave a comment</p>
                <img class="face" src="<?php echo base_url().'pictures/logo/down.svg'?>" nerror="this.onerror=null; this.src='<?php echo base_url()."pictures/logo/down.svg'"?>' width="35px"; height="35px"/>
            </div>
            <div id="reply">
                <?php if(!empty($this->session->userdata('username'))){ ?>
                <p>Leave a reply</p>
                <?php }else{ echo '<p style="color:red">Login to reply</p>';} ?>
                <div id="comm_form">
                    <?php if(!empty($this->session->userdata('username'))){
                            echo form_open_multipart('Weight/insert_comm', array('method'=>'post', 'id'=>'form'));
                                echo form_textarea(array("id"=>"comm", "name"=>"comm"));
                                echo form_input(array("type"=>"submit", "id"=>"post_com", "name"=>"post_com", "value"=>"POST COMMENT"));
                            echo form_close();
                            if(!empty($this->session->userdata('errors')))
                            {
                                echo '<div id="error">'.$this->session->userdata('errors').'</div>';
                                $this->session->unset_userdata('errors');
                            }
                          }
                          else
                          {
                              echo form_open_multipart('Weight/insert_comm', array('method'=>'post', 'id'=>'form'));
                                echo form_textarea(array("id"=>"comm", "name"=>"comm", "readonly"=>"true"));
                                echo form_input(array("type"=>"submit", "id"=>"post_com", "name"=>"post_com", "value"=>"POST COMMENT", "style"=>"display:none;"));
                            echo form_close();
                          }
                          
                    ?>
                </div>
            </div>
            </div>
            <div class="right">
                <div class="post_nav">
                  <p>Other posts: </p>
                  <nav id="p_nav">
                    <a class="gym" href="weight"><span>Weightlifting<span></a><br/>
                    <a class="gym" href="cardio"><span>Cardio training<span></a><br/>
                    <a class="gym" href="personal"><span>Train with personal trainer<span></a>
                  </nav>
                </div>
                <div id="motivation">
                  <p class="mot">Popular motivation posts: </p>
                  <div id="mot_pic">
                      <blockquote>
                          <p>We cannot become what we want to be remaining what we are.</p>
                      </blockquote>
                      <blockquote>
                          <p>Life isn't about finding yourself. Life is about crating yourself.</p>
                      </blockquote>
                      <blockquote>
                          <p>The distance between your dreams and reality is called DISCIPLINE.</p>
                      </blockquote>
                  </div>
                </div>
            </div>
        </div>

