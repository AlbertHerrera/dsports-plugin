<div class="wrap">
  <h1>Leagues Manager</h1>
  <?php settings_errors(); ?>

  <ul class="nav nav-tabs">

    <li class="<?php echo !isset($_POST["edit_league"]) ? 'active' : '' ?>">
      <a href="#tab-1">Your Leagues</a>
   </li>

    <li class="<?php echo isset($_POST["edit_league"]) ? 'active' : '' ?>">
      <a href="#tab-2">
        <?php echo isset($_POST["edit_league"]) ? 'Edit' : 'Add' ?> Custom Post Type
      </a>
    </li>

    <li>
      <a href="#tab-3">Export</a>
    </li>

  </ul>
  <div class="tab-content">
      <div id="tab-1" class="tab-pane <?php echo !isset($_POST["edit_league"]) ? 'active' : '' ?>">
        <h3>Manage Your Leagues </h3>

        <?php

        $options = get_option( 'dsports_plugin_lpt') ?: array();
        echo '<table class="ds-table"><tr><th>ID</th><th>Singular Name</th><th>Description</th><th class="text-center">Has Image?</th><th class="text-center">Actions</th></tr>';
				foreach ($options as $option) {
            var_dump($option);
				      $image = empty($option['image']) ? "FALSE" : "TRUE";
					    echo "<tr><td>{$option['league']}</td><td>{$option['singular_name']}</td><td>{$option['description']}</td><td class=\"text-center\">{$image}</td><td class=\"text-center\">";
              echo '<form method="post" action="" class="inline-block">';
              echo '<input type="hidden" name="edit_league" value="'.$option['league'].'">';
              submit_button( 'Edit', 'primary small', 'submit', false);
              echo '</form>       ';


              echo '<form method="post" action="options.php" class="inline-block">';
              settings_fields('dsports_plugin_lpt_settings');
              echo '<input type="hidden" name="remove" value="'.$option['league'].'">';
              submit_button( 'Delete', 'delete small', 'submit', false, array(
                'onclick' => 'return confirm("Are you sure you want to delete this Custom Post Type?");'
              ));
              echo '</form></td></tr>';
      	     }
				     echo '</table>';
			?>
      </div>
      <div id="tab-2" class="tab-pane <?php echo isset($_POST["edit_league"]) ? 'active' : '' ?>">

        <form method="post" action="options.php">
          <?php
              settings_fields('dsports_plugin_lpt_settings');
              do_settings_sections('dsports_lpt');
              submit_button();
           ?>
        </form>
      </div>
      <div id="tab-3" class="tab-pane">
        <h3> Export Your Leagues </h3>


      </div>
  </div>
</div>
