<?php

class footer_Navigation_Menus_Widget extends WP_Widget {
    public function __construct(  ) {
        $widget_options = [
            'classname'     => 'footer_navigation_menus_widget',
            'description'   => 'Not more than 5 widgets.'
        ];

        parent::__construct( 'footer_navigation_menus_widget', 'Footer Navigation Menus Widget', $widget_options );
    }

    public function widget( $args, $instance ) {
        $fields = get_fields( 'widget_' . $args[ 'widget_id' ] );
        echo \App\template(
                            "widgets/footer-navigation-menu-widget",
                            [
                                'args'      => $args,
                                'instance'  => $instance,
                                'flds'      => $fields
                            ]
                        );
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        return $instance;
    }
}

function ava_footer_navigation_menus_widget(  ) {
    register_widget( 'footer_Navigation_Menus_Widget' );
} add_action( 'widgets_init', 'ava_footer_navigation_menus_widget' );


class custom_Latest_Posts extends WP_Widget {
    public function __construct(  ) {
        $widget_options = [
            'classname'     => 'custom_latest_posts',
            'description'   => 'Customised HTML Latest Posts'
        ];

        parent::__construct( 'custom_latest_posts', 'Custom Latest Posts', $widget_options );
    }

    public function widget( $args, $instance ) {
        $fields = get_fields( 'widget_' . $args[ 'widget_id' ] );
        echo \App\template(
                            "widgets/custom-latest-posts",
                            [
                                'args'      => $args,
                                'instance'  => $instance,
                                'flds'      => $fields
                            ]
                        );
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
        <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
        <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
        </p>
    <?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
        return $instance;
    }
}

function ava_Custom_Latest_Posts(  ) {
    register_widget( 'custom_Latest_Posts' );
} add_action( 'widgets_init', 'ava_Custom_Latest_Posts' );
