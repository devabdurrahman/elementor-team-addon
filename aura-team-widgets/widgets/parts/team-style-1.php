 <div class="single-team-member-01">
       <div class="thumb">
          <img src="<?php echo esc_url($team_image['url']); ?>" alt="<?php echo esc_attr($team_title); ?>">
       </div>
       <div class="content">
          <h4 class="title"><?php echo esc_html($team_title); ?></h4>
          <span class="post"><?php echo esc_html($team_designation); ?></span>
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