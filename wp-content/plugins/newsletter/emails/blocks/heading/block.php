<?php
/*
 * Name: Heading
 * Section: content
 * Description: Section title
 */

$default_options = array(
    'text' => 'An Awesome Title',
    'align' => 'center',
    'block_background' => '',
    'font_family' => '',
    'font_size' => '',
    'font_color' => '',
    'font_weight' => '',
    'block_padding_left' => 15,
    'block_padding_right' => 15,
    'block_padding_bottom' => 15,
    'block_padding_top' => 15
);
$options = array_merge($default_options, $options);

$title_font_family = empty($options['font_family']) ? $global_title_font_family : $options['font_family'];
$title_font_size = empty($options['font_size']) ? $global_title_font_size : $options['font_size'];
$title_font_color = empty($options['font_color']) ? $global_title_font_color : $options['font_color'];
$title_font_weight = empty($options['font_weight']) ? $global_title_font_weight : $options['font_weight'];

?>

<style>
    .title {
        padding: 0;
        font-size: <?php echo $title_font_size ?>px;
        font-family: <?php echo $title_font_family ?>;
        font-weight: <?php echo $title_font_weight ?>;
        color: <?php echo $title_font_color ?>;
        line-height: normal !important;
        letter-spacing: normal;
    }
</style>

<table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
        <td align="<?php echo esc_attr($options['align']) ?>" valign="middle" inline-class="title">
            <?php echo $options['text'] ?>
        </td>
    </tr>
</table>