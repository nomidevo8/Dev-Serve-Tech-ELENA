<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) exit; // Prevent direct access

class Our_Team_Widget extends Widget_Base {

    public function get_name() {
        return 'our_team_widget';
    }

    public function get_title() {
        return __( 'DEV Our Team', 'eeb' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    /**
     * ✅ Use register_controls() (Elementor 3.x standard)
     */
    protected function register_controls() {

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label'   => __( 'Member Image', 'eeb' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label'   => __( 'Name', 'eeb' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'Member Name', 'eeb' ),
            ]
        );

        $repeater->add_control(
            'designation',
            [
                'label'   => __( 'Designation', 'eeb' ),
                'type'    => Controls_Manager::TEXT,
                'default' => __( 'Designation', 'eeb' ),
            ]
        );

        $this->start_controls_section(
            'team_section',
            [ 'label' => __( 'Team Members', 'eeb' ) ]
        );

        $this->add_control(
            'members',
            [
                'label'       => __( 'Members', 'eeb' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display(); ?>
        <div class="our-team-wrap">
            <?php if ( ! empty( $settings['members'] ) && is_array( $settings['members'] ) ) :
                foreach ( $settings['members'] as $member ) :
                    $image_url   = ! empty( $member['image']['url'] ) ? $member['image']['url'] : '';
                    $member_name = ! empty( $member['name'] ) ? $member['name'] : '';
                    $designation = ! empty( $member['designation'] ) ? $member['designation'] : ''; ?>
                    
                    <div class="team-card sloped-card">
                        <div class="team-img">
                            <?php if ( $image_url ) : ?>
                                <img src="<?php echo esc_url( $image_url ); ?>"
                                    alt="<?php echo esc_attr( $member_name ); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="team-info">
                            <h3><?php echo esc_html( $member_name ); ?></h3>
                            <p><?php echo esc_html( $designation ); ?></p>
                        </div>
                    </div>

            <?php endforeach; endif; ?>
        </div>
    <?php }

}

// 🔑 Do NOT register the widget here if you're registering in your main plugin file.
// Elementor will load it in the `elementor/widgets/register` hook like:
// add_action( 'elementor/widgets/register', function( $widgets_manager ) {
//     require_once __DIR__ . '/classes/widgets/widget-our-team.php';
//     $widgets_manager->register( new \Our_Team_Widget() );
// });
