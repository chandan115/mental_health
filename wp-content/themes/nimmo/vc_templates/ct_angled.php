<?php
extract(shortcode_atts(array(
    'angled_style' => 'style1',
    'angled_pos' => 'top',
    'angled_color' => '#fff',
    'angled_height' => '130',
), $atts));
?>
<div class="ct-angled-wrapper angled-<?php echo esc_attr($angled_pos); ?>">
    <div class="ct-angled-inner">
        <?php switch ( $angled_style )
        {
            case 'style2': ?>
                <svg class="angle-svg" style="fill: <?php echo esc_attr($angled_color); ?>; height: <?php echo esc_attr($angled_height).'px'; ?>;" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="80px">
                    <path stroke="" stroke-width="0" d="M0 0 L50 100 L100 0 L100 100 L0 100"/>
                </svg>
                <?php break;

            case 'style3': ?>
                <svg style="fill: <?php echo esc_attr($angled_color); ?>; height: <?php echo esc_attr($angled_height).'px'; ?>;" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="60px"><path stroke-width="0" d="M0 0 C50 100 50 100 100 0  L100 100 0 100"/></svg>
                <?php break;

            case 'style4': ?>
                <svg  style="fill: <?php echo esc_attr($angled_color); ?>; height: <?php echo esc_attr($angled_height).'px'; ?>;" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="60px" class="decor">
                  <path stroke-width="0" d="M0 100 C50 0 50 0 100 100 Z"></path>
                </svg>
                <?php break;

            default: ?>
                <svg class="angle-style1" style="fill: <?php echo esc_attr($angled_color); ?>; height: <?php echo esc_attr($angled_height).'px'; ?>;" xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 100 100" version="1.1" preserveAspectRatio="none" height="80px">
                    <path stroke="" stroke-width="0" d="M0 100 L100 0 L200 100"/>
                </svg>
                <?php break;
        } ?>
    </div>
</div>


