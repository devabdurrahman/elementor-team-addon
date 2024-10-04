<?php
/**
 * EWA Elementor Heading Widget.
 *
 * Elementor widget that inserts heading into the page
 *
 * @since 1.0.0
 */
class Elementor_Aura_Team_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve heading  widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'aura-team';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve heading widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Aura Teams', 'aura-team' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve heading  widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the heading widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'elementor-aura-team' ];
	}

	/**
	 * Register heading widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		
		// start of the Content tab section
	   $this->start_controls_section(
	       'content-section',
		    [
		        'label' => esc_html__('Content','aura-team'),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
		   
		    ]
	    );
		
		// Team Card Layout
	   $this->add_control(
			'team_layout',
			[
				'label' => esc_html__( 'Select Layout', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'team-style-1',
				'options' => [
					'team-style-1' => esc_html__( 'Team Style 1', 'aura-team' ),
					'team-style-2' => esc_html__( 'Team Style 2', 'aura-team' ),
					'team-style-3'  => esc_html__( 'Team Style 3', 'aura-team' ),
					'team-style-4' => esc_html__( 'Team Style 4', 'aura-team' ),
					'team-style-5' => esc_html__( 'Team Style 5', 'aura-team' ),
				],
			]
		);

	   // Team Image
	   $this->add_control(
			'team_image',
			[
				'label' => esc_html__( 'Team Image', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'separator' => 'before',
			]
		);

	   // Team Title
	   $this->add_control(
			'team_title',
			[
				'label' => esc_html__( 'Title', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'aura-team' ),
				'placeholder' => esc_html__( 'Type your title here', 'aura-team' ),
				'label_block' => true,
				'separator' => 'before',

			]
		);

	   // Team Designation
	   $this->add_control(
			'team_designation',
			[
				'label' => esc_html__( 'Designation', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'aura-team' ),
				'placeholder' => esc_html__( 'Type your title here', 'aura-team' ),
				'separator' => 'after',
			]
		);

	   // Team Socials
	   $this->add_control(
			'team_socials',
			[
				'label' => esc_html__( 'Team Social List', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'team_social_icon',
						'label' => esc_html__( 'Team Social Icon', 'aura-team' ),
						'type' => \Elementor\Controls_Manager::ICONS,
						'default' => [
						'value' => 'fas fa-circle',
						'library' => 'fa-solid',
						],
					],
					[
						'name' => 'team_social_link',
						'label' => esc_html__( 'Social Link', 'aura-team' ),
						'type' => \Elementor\Controls_Manager::URL,
						'default' => esc_html__( 'List Content' , 'aura-team' ),
						'options' => [ 'url', 'is_external', 'nofollow' ],
						'default' => [
							'url' => '',
							'is_external' => true,
							'nofollow' => true,
							// 'custom_attributes' => '',
						],
						'label_block' => true,
					],
				]
			]
		);

		
		$this->end_controls_section();
		// end of the Content tab section
		
		// start of the Title Style tab section	
		$this->start_controls_section(
			'title_style_section',
			[
				'label' => esc_html__( 'Title', 'aura-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Title Color
		$this->add_control(
			'team_title_color',
			[
				'label' => esc_html__( 'Color', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .top-content .title' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// Title Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_title_typography',
				'selector' => '{{WRAPPER}} .content .top-content .title',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_PRIMARY,
				],
			]
		);
		
		// end of the Title Style tab section
		$this->end_controls_section();

		// start of the Designation Style tab section	
		$this->start_controls_section(
			'designation_style_section',
			[
				'label' => esc_html__( 'Designation', 'aura-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Designation Color
		$this->add_control(
			'team_designation_color',
			[
				'label' => esc_html__( 'Color', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .top-content .post' => 'color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_TEXT,
				],
			]
		);

		// Designation Typography
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'team_designation_typography',
				'selector' => '{{WRAPPER}} .content .top-content .post',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_TEXT,
				],
			]
		);
		
		// end of the Designation Style tab section
		$this->end_controls_section();

		// start of the Social Style tab section	
		$this->start_controls_section(
			'social_style_section',
			[
				'label' => esc_html__( 'Social Icons', 'aura-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		
		$this->start_controls_tabs(
			'style_tabs'
		);

		$this->start_controls_tab(
			'social_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'aura-team' ),
			]
		);

		// Social icon color
		$this->add_control(
			'social_icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.social-icon li a svg' => 'fill: {{VALUE}} !important',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// Social icon background color
		$this->add_control(
			'social_icon_background',
			[
				'label' => esc_html__( 'Background', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .bottom-content .social-icon li a' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				],
			]
		);

		// Social icon size 
		$this->add_control(
			'social_icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 100,
						'step' => 5,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 14,
				],
				'selectors' => [
					'{{WRAPPER}} ul.social-icon li a svg' => 'height: {{SIZE}}{{UNIT}} !important;',
				],
			]
		);

		// Social icon Border Radius
		$this->add_control(
			'social_icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => '%',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .content .bottom-content .social-icon li a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'social_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'aura-team' ),
			]
		);

		// Social icon hover color
		$this->add_control(
			'social_icon_hover_color',
			[
				'label' => esc_html__( 'Icon Color', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} ul.social-icon li a svg:hover' => 'fill: {{VALUE}} !important',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_SECONDARY,
				],
			]
		);

		// Social icon background hover color
		$this->add_control(
			'social_icon_hover_background',
			[
				'label' => esc_html__( 'Background', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .content .bottom-content .social-icon li a:hover' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
				],
			]
		);

		// Social icon Border Radius on Hover
		$this->add_control(
			'social_icon_border_radius_on_hover',
			[
				'label' => esc_html__( 'Border Radius', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%'],
				'default' => [
					'top' => 2,
					'right' => 0,
					'bottom' => 2,
					'left' => 0,
					'unit' => '%',
					'isLinked' => false,
				],
				'selectors' => [
					'{{WRAPPER}} .content .bottom-content .social-icon li a:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		// end of the Social Style tab section
		$this->end_controls_section();

		// start of the Layout Style tab section	
		$this->start_controls_section(
			'layout_style_section',
			[
				'label' => esc_html__( 'Layout', 'aura-team' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		// Team Layout background color
		$this->add_control(
			'team_layout_background',
			[
				'label' => esc_html__( 'Background Color', 'aura-team' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-member-05 .content' => 'background-color: {{VALUE}}',
				],
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_PRIMARY,
				],
			]
		);
		
		// end of the Layout Style tab section
		$this->end_controls_section();


	}

	/**
	 * Render heading  widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		// get our input from the widget settings.
		$settings = $this->get_settings_for_display();
		$team_layout = $settings['team_layout'];
		$team_image = $settings['team_image'];
		$team_title = $settings['team_title'];
		$team_designation = $settings['team_designation'];
		$team_socials = $settings['team_socials'];

		switch ($team_layout) {
			case 'team-style-1':
				include( __DIR__ . '/parts/team-style-1.php');
				break;

			case 'team-style-2':
				include( __DIR__ . '/parts/team-style-2.php');
				break;

			case 'team-style-3':
				include( __DIR__ . '/parts/team-style-3.php');
				break; 

			case 'team-style-4':
				include( __DIR__ . '/parts/team-style-4.php');
				break;

			case 'team-style-5':
				include( __DIR__ . '/parts/team-style-5.php');
				break;
			
			default:
				include( __DIR__ . '/parts/team-style-1.php');
				break;
		}
		
		
	}
}