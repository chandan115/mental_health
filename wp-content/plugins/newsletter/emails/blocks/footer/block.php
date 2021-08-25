<?php
/*
 * Name: Footer
 * Section: footer
 * Description: View online ad profile links
 */

$default_options = array(
    'view' => 'View online',
    'profile' => 'Modify your subscription',
    'font_family' => '',
    'font_size' => 14,
    'font_color' => '',
    'font_weight' => '',
    'block_padding_left' => 15,
    'block_padding_right' => 15,
    'block_padding_bottom' => 15,
    'block_padding_top' => 15,
    'block_background' => '',
    'url' => 'profile'
);
$options = array_merge($default_options, $options);

$text_style = TNP_Composer::get_style($options, '', $composer, 'text');

?>
<style>
    .text {
        font-family: <?php echo $text_style->font_family ?>;
        font-size: <?php echo round($text_style->font_size*0.9) ?>px;
        font-weight: <?php echo $text_style->font_weight ?>;
        color: <?php echo $text_style->font_color ?>;
        text-decoration: none;
        line-height: normal;
    }
</style>

<a inline-class="text" href="<?php if ($options['url'] == 'unsubscription') echo '{unsubscription_url}'; else echo '{profile_url}' ?>" target="_blank"><?php echo esc_html($options['profile']) ?></a>

<span inline-class="text">&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;</span>

<a inline-class="text" href="{email_url}" target="_blank"><?php echo esc_html($options['view']) ?></a>

