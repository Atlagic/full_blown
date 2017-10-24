<html>
  <head>
    <title>Fitness </title>
    
    <?php
        foreach($css_data as $css)
        {
            echo $css;
        }
        
        foreach($meta_data as $meta)
        {
            echo $meta;
        }
    ?>
    <link rel="stylesheet" href="<?php echo base_url().'font-awesome/css/font-awesome.min.css'; ?>">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>js/contact.js"></script>
    
  </head>