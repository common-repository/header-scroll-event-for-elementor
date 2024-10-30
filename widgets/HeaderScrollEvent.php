<?php

class Elementor_Widget_miga_scroll_header extends \Elementor\Widget_Base
{
    public function __construct($data = [], $args = null)
    {
        parent::__construct($data, $args);

        wp_register_script(
            "miga_scroll_header_scripts",
            plugins_url("../scripts/main.js", __FILE__),
            [],
            "1.0.0",
            true
        );
    }

    public function get_name()
    {
        return "miga_scroll_header_title";
    }

    public function get_title()
    {
        return __("Header scroll event", "miga_scroll_header");
    }

    public function get_icon()
    {
        return "eicon-scroll";
    }

    public function get_categories()
    {
        return ["general"];
    }

    protected function _register_controls()
    {
        $this->start_controls_section("sec1", [
            "label" => __("Settings", "miga_scroll_header"),
            "tab" => \Elementor\Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control("info_note", [
            "type" => \Elementor\Controls_Manager::RAW_HTML,
            "label" => __("Info", "miga_scroll_header"),
            "raw" => __(
                "Adds the class 'scrolled' to the header and body when 'scroll depth' is reached.",
                "miga_scroll_header"
            ),
        ]);

        $this->add_responsive_control("scrollDepth", [
            "label" => esc_html__("Scroll depth", "miga_scroll_header"),
            "type" => \Elementor\Controls_Manager::SLIDER,
            "size_units" => ["px"],
            "devices" => ["desktop", "tablet", "mobile"],
            "range" => [
                "px" => [
                    "min" => 0,
                    "max" => 1000,
                    "step" => 5,
                ],
            ],
            "desktop_default" => [
                "size" => 300,
                "unit" => "px",
            ],
            "tablet_default" => [
                "size" => 200,
                "unit" => "px",
            ],
            "mobile_default" => [
                "size" => 100,
                "unit" => "px",
            ],
            "selectors" => ["none"],
        ]);

        $this->end_controls_section();
    }

    public function get_script_depends()
    {
        return ["miga_scroll_header_scripts"];
    }

    protected function render()
    {
        $isEditor = \Elementor\Plugin::$instance->editor->is_edit_mode();
        $settings = $this->get_settings_for_display();
        $scrollDepth = $settings["scrollDepth"]["size"];
        echo '<div id="miga_scroll_header" data-scrolldepth="'.esc_attr($scrollDepth).'">';
        if ($isEditor){
          echo "<center><b>- header scroll event -</b></center>";
        }
        echo '</div>';
    }
}
