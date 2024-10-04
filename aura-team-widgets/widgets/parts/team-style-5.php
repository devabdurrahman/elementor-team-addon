<div class="single-team-member-05">
                     
      <div class="thumb">
         <img src="<?php echo $team_image['url']; ?>" alt="<?php echo $team_title; ?>">
         <div class="border"></div>
      </div>
   
   <div class="content">
      <div class="top-content">
         <h4 class="title"><?php echo $team_title; ?></h4>
         <span class="post"><?php echo $team_designation; ?></span>
      </div>
      <div class="bottom-content">
         <ul class="social-icon">
            
            <?php
             if ( ! empty( $team_socials ) ) {
                 foreach ( $team_socials as $team_social ) {

                     // Make sure the icon exists
                     if ( ! empty( $team_social['team_social_icon'] ) ) {
                         ?>
                         <li>
                            <a href="<?php echo esc_url( $team_social['team_social_link']['url'] ); ?>">

                               <?php
                               // Render the icon using Elementor's icon manager
                               \Elementor\Icons_Manager::render_icon( $team_social['team_social_icon'], [ 'aria-hidden' => 'true' ] );
                               ?>

                            </a>
                         </li>
                         <?php
                     }
                 }
             }
             ?>
             
         </ul>
      </div>
   </div>
</div>