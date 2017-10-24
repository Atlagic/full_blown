<script type='text/javascript' src='<?php echo base_url()."js/jquery-1.8.0.min.js" ?>'></script>
<script type='text/javascript' src='<?php echo base_url()."js/jquery.lightbox-0.5.min.js" ?>'></script>
<div id="content">
            <div id="gallery">
              <h2>Gallery</h2>
              <p>Browse gallery of ours clients who are satisfied with our services </p>
              <div id="thumbnails">
                <?php if(isset($gallery)) : ?>
                  <?php foreach ($gallery as $picture) : ?>
                <ul class="clearfix">

                    <li><a href="<?php echo base_url().$picture->big_picture ?>" title="<?php echo $picture->picture_title ?>"><img src="<?php echo base_url().$picture->picture ?>" alt="turntable"></a></li>
         
                </ul>
                  <?php endforeach; ?>
                  <?php endif; ?>
              </div>
              
              <p class="pagination" style="padding-top:10px;  margin-left: 440px;"><?php echo $this->pagination->create_links(); ?></p>
            </div>
        </div>
        
        <script type="text/javascript">
          $(function() {
            $('#thumbnails a').lightBox();
          });
        </script>
         
