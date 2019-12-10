<?php 
namespace ihoverwidget\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager; 

if ( ! defined( 'ABSPATH' ) ) exit; //prevent direct access to file
wp_enqueue_style('uael_ihover_styles');
class uael_ihover extends Widget_Base {
		public function get_name() {
		return 'uael_ihover';
	}
	public function get_title() {
		return __( 'iHover','uael_ihover' );
	}
	public function get_icon() {
		return 'eicon-handle';
	}

	public function get_categories() {
		return [ 'basic' ];
	}
	protected function _register_controls() {
		$this->start_controls_section(
			'uael_section1',
			[
				'label' => __( 'Section1', 'uael_ihover'),
			]
		);
		$this->start_controls_tabs( 'uael_ihover_content_tabs' );
		$this->start_controls_tab( 'uael_ihover_content_tabs', [ 'label' => __( 'Content', 'uael_ihover' ) ] );
		
			$this->add_control(
			'uael_graphic_element',
			[
				'label' => __( 'Graphic Element', 'uael_ihover' ),
				'type' => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options' => [
					'none' => [
						'title' => __( 'None', 'uael_ihover' ),
						'icon' => 'eicon-ban',
					],
					'image' => [
						'title' => __( 'Image', 'uael_ihover' ),
						'icon' => 'fa fa-picture-o',
					],
					'icon' => [
						'title' => __( 'Icon', 'uael_ihover' ),
						'icon' => 'eicon-star',
					],
				],
				'default' => 'icon',
			]
		);	

		$this->add_control(
			'uael_image',
			[
				'label' => __( 'Choose Image', 'uael_ihover' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'uael_graphic_element' => 'image',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'uael_image_size', // Actually its `image_size`
				'default' => 'thumbnail',
				'condition' => [
					'uael_graphic_element' => 'image',
				],
			]
		);

		$this->add_control(
			'uael_selected_icon',
			[
				'label' => __( 'Icon', 'uael_ihover' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'fa4compatibility' => 'icon',
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'fa-solid',
				],
				'condition' => [
					'uael_graphic_element' => 'icon',
				],
			]
		);
			$this->add_control(
			'uael_icon_view',
			[
				'label' => __( 'View', 'uael_ihover' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'default' => __( 'Default', 'uael_ihover' ),
					'stacked' => __( 'Stacked', 'uael_ihover' ),
					'framed' => __( 'Framed', 'uael_ihover' ),
				],
				'default' => 'default',
				'condition' => [
					'uael_graphic_element' => 'icon',
				],
			]
		);
		// $this->end_controls_tab();
		// $this->start_controls_tab( 'uael_ihover_background_tabs', [ 'label' => __( 'Background', 'uael_ihover' ) ] );
		$this->end_controls_tab();
		$this->end_controls_tabs();
		$this->end_controls_section();

		$this->start_controls_section(
			'uael_section2',
			[
				'label' => __( 'Section2', 'uael_ihover'),
			]
		);
		
		$this->end_controls_section();
	}

}