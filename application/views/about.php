<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>

<div id="content">    
    <div id="about_cont">
                <h2>Short story</h2>
                <p>I'm Aleksandar Atlagić, 21 year old student from Valjevo(Serbia). I'm currently living in Belgrade and so far I
                   studied at primary school <a href="http://www.osnadapuric.rs/"> "Nada Purić"</a>  and
                   <a href="http://www.tehnickaskolava.rs//"> "Technical school of Valjevo"</a>. Now I'm on third year of ICT colledge
                   of vocational studies which is a great school for learning about internet technologies, and i hope that one day I'm going
                   to work as a web developer.</p>

                   <h2>Basic informations</h2>
                   <p>
                      Name: Aleksandar<br/>
                      Lastname: Atlagić<br/>
                      Index: 93/14<br/>
                      Field of study: Internet technologies<br/>
                      Site for: Web programming PHP2 (with CodeIgniter framework)
              			</p>

                    <h2>Contact me on:</h2><br/>
              			<p><a href="https://www.facebook.com/aleksandar.atlagic">
              				Facebook
              			</a></p>
              			<p>
              				E-mail: aleksandar.atlagic.93.14@ict.edu.rs
              			</a>
              			<p><a href="https://www.linkedin.com/in/aleksandar-atlagi%C4%87-b2a09211a?trk=nav_responsive_tab_profile_pic">
              				Linkedin
              			</a></p>
                                
                    <div id="poll">
                        <?php if(!empty($this->session->userdata('sess_poll'))){ 
                        
                            
                            
                            
                            
                                $poll= $this->session->userdata('poll_info');
                            
                            
                                echo '<br/><div class="alert alert-success" style="text-align:center">';
                                if(!empty($this->session->userdata('poll_text'))){
                                    echo $this->session->userdata('poll_text');
                                }else{
                                    echo $this->session->userdata('sess_poll');
                                }
                                        echo '<br/> Current number of votes is:</br></br>';
                                          foreach ($poll as $p):
                                                                                     
                                                echo $p['text']." ".$p['num_votes']."</br>";
                                          
                                        endforeach;
                                
                                echo '</div>';
                               
                                
                                $this->session->unset_userdata('poll_text');
                            
                            
       
                            ?>
                        
                        <?php } 
                              else
                              {
                                  
                              ?>
                              <form method="post" action ="<?php print base_url().'about/insert_vote'; ?>">
                                <table>
                                 <tr>
                                <th><?php echo $polls[0]['poll_name']; ?></th>
                            </tr>
                            
                                <?php if(isset($polls)): ?>
                                 <input type="hidden" name="poll_id" value="<?php echo $polls[0]['poll_id']; ?>"/> 
                                  <?php  foreach($polls as $poll): ?>
                                    
                                <tr>
                                    <td><input type='radio' name='poll' id='<?php echo $poll["vote_id"]; ?>' value="<?php echo $poll['vote_id']; ?>"><?php echo $poll['text']; ?></td>
                                </tr>
                                <?php endforeach; endif;?>
                            
                            <tr>
                              <td>
                                 <input type="submit" name="vote" id="vote" style="cursor: pointer;" value="VOTE"/>
                                 <input type="submit" name="pollRes" id="pollRes" style="cursor: pointer;" value="COUNT"/>
                              </td>
                            </tr>
                         </table>
                      </form>
                        <?php if(!empty($this->session->userdata('poll_error'))){
                               
                            
                            
                                echo '<br/><div class="alert alert-warning" style="text-align:center">'.$this->session->userdata('poll_error').'</div><br/></br></br>';
                                        $this->session->unset_userdata('poll_error');
                            }
                              } ?>
                    </div>
            </div>
            <div id="about_pic">
                <h2>Author:</h2>
                <img src="<?php echo base_url().'pictures/me.jpg' ?>" alt="author"/>
            </div>
            <div id="location">
                <h2>School location:</h2>
                <div id="map">
                        <script>
                          function initMap() {
                            var mapDiv = document.getElementById('map');
                            var map = new google.maps.Map(mapDiv, {
                              center: {lat: 44.8145809, lng: 20.4839015},
                              zoom: 19,
                              backgroundColor: 'none'
                            });
                          }
                        </script>
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADRZz_Rf8-0vHZWJ3dXkUFDAefuAwY7zk&callback=initMap"async defer></script>
<!--                        <script type="text/javascript">
 
                            $(document).ready(function(){

                                $('#btnVote').click(function(e){
                                     e.preventDefault();

                                    $vote = $('.anketa input[name="vote"]:checked').val(); 
                                    console.log($vote);
                                    if(!$vote){
                                        $(".error").addClass('alert alert-warning');
                                        //$(".error").css({"text-align":"center"});
                                        $(".error").html("Nothing selected");
                                        return;
                                    }
                                    $id_poll = $('#id_poll').val();



                                    $.ajax({
                                        type: 'POST',
                                        url: 'https://jovanvuceljic16214.000webhostapp.com/author/insert_vote',
                                        data: {'vote': $vote, 'id_poll': $id_poll, 'btnVote': 1},

                                        success: function(data)
                                        {
                                            console.log(data);
                                            var polls = JSON.parse(data);
                                            var print = "Thank you for your vote<br/>Current number of votes is:<br/><br/>";

                                            for(var i=0; i < polls.length; i++){
                                                print += polls[i]['text'] + " : "+polls[i]['num_votes']+"<br/>";
                                            }
                                            $(".anketa").addClass('alert alert-success');
                                            $(".anketa").css({"text-align":"center"});
                                            $(".anketa").html(print);
                                        }
                                    });


                                });

                                 $('.vote').on("click",function(){
                                        $('.vote').removeClass('selectedVote');
                                        $(this).addClass('selectedVote');
                                    }); 





                                });
        </script>-->

                </div>
            </div>
</div>