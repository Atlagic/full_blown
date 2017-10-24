<div id="menu">
          <nav id="nav-3">
            <?php 
                if(isset($menus))
                {
                    foreach($menus as $menu)
                    {
                        echo "<a class='link' href='".base_url().$menu->page_title."'>".$menu->page_name."</a>";
                    }
                }
            ?>
          </nav>
          <div id="search">
            <input type="text" name="search" placeholder="Search..">
          </div>
</div>
