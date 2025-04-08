<?php 
class elem_in_scroll extends \Elementor\Widget_Base {
public function get_name() : string{
    return "elem_in_scroll";
}
public function get_title(): string {
    return esc_html__("Infinity Logo scroll", "elem_addon");
}
public function get_categories(): array {
    return ['basic'];
}
public function get_icon() : string {
    return "eicon-slider-push";
}
public function get_keywords(): array {
    return ['scroll', 'marquee', 'logo slider'];
}
public function get_style_depends(): array {
    return  ["in-scroll-css"];
}
public function get_script_depends(): array {
    return ["in-scroll-js", "jquery"];
}


// public function get_style_depends() : array{
//     return ['read-more-css'];
// }
// public function get_script_depends(): array {
//     return ['read-more-js'];
// }



public function has_widget_inner_wrapper() : bool{
    return true;
}

public function is_dynamic_content() : bool {
    return false;
}

    // Content tab
 protected function register_controls() :void {
    $this->start_controls_section(
        'logo-img', 
        [
            'label' => esc_html__('Logos', 'elem_addon'),
            'tab' => Elementor\Controls_manager:: TAB_CONTENT,
        
        ]

    );

    $this-> add_control(
        'add-logo-img', 
        [
            'label' => esc_html__('Add your logo', 'elem_addon'),
            'type' => Elementor\Controls_manager::GALLERY,
        ]

    );
    $this->end_controls_section();
    } // end register controls

protected function render():void{
    $scrollm = $this->get_settings_for_display();

    ?>
    <div class="marquee-slider marquee-slider2">
        <div class="marquee-slider__list"> 
            <?php  foreach($scrollm['add-logo-img'] as $image ){ ?>
            <div class="marquee-slider__list--item"> 
                <img src="<?php echo  esc_attr($image['url']);?>">
            </div>
            <?php } ?>        
        </div>
    </div>

    <script>
     $('.marquee-slider').marqueeSlider([
    { sensitivity: 0.1, repeatItems: true },
    { sensitivity: 0.5, repeatItems: true }]);

    </script>
    <?php 
}//end render



}//end class

