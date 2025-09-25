<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit;

class EEB_Expand_Box extends Widget_Base {

    public function get_name() {
        return 'eeb-expand-box';
    }

    public function get_title() {
        return __( 'Expandable Box', 'eeb' );
    }

    public function get_icon() {
        return 'eicon-toggle';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'content_section',
            [ 'label' => __( 'Content', 'eeb' ) ]
        );

        $this->add_control(
            'toggle_label',
            [
                'label' => __( 'Toggle Label', 'eeb' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'VIEW MORE ▼', 'eeb' )
            ]
        );

        $this->add_control(
            'paragraph',
            [
                'label' => __( 'Paragraph Text', 'eeb' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Your description goes here.', 'eeb' )
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'eeb' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'DOWNLOAD BROCHURE', 'eeb' )
            ]
        );

        $this->add_control(
            'button_url',
            [
                'label' => __( 'Button URL', 'eeb' ),
                'type' => Controls_Manager::URL,
                'default' => [ 'url' => '#' ]
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $id = 'eeb-' . $this->get_id();
        ?>
        <div class="eeb-box" id="<?php echo esc_attr($id); ?>">
            <div class="eeb-toggle"><?php echo esc_html($settings['toggle_label']); ?></div>
            <div class="eeb-content">
                <p><?php echo esc_html($settings['paragraph']); ?></p>
                <a class="eeb-btn" href="<?php echo esc_url($settings['button_url']['url']); ?>">
                    <?php echo esc_html($settings['button_text']); ?>
                </a>
            </div>
        </div>
        <?php
    }
}
// \Elementor\Plugin::instance()->widgets_manager->register( new EEB_Expand_Box() );
