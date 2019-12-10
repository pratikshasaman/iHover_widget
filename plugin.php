<?php 
namespace ihoverwidget;

class Plugin {

	private static $_instance = null;
	
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	private function include_ihover_widget_files() {
		require_once( __DIR__ . '/widgets/ihover.php' );	
	}

	public function register_ihover_widgets() {
		$this->include_ihover_widget_files();
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\uael_ihover() );
	}
	public function uael_ihover_styles() {
		wp_register_style( 'ihover_style',plugins_url('\assets\css\uael_ihover_style.css',__FILE__), NULL, true );
		wp_enqueue_style('ihover_style');
	}

	public function __construct() {		
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_ihover_widgets' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'uael_ihover_styles' ] );
	}
}
Plugin::instance();