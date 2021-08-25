<style>
    .text {
        font-family: <?php echo $text_font_family ?>;
        font-size: <?php echo $text_font_size ?>px;
        font-weight: <?php echo $text_font_weight ?>;
        color: <?php echo $text_font_color ?>;
        text-decoration: none;
        line-height: normal;
        padding: 10px;
    }

    .title {
        font-family: <?php echo $text_font_family ?>;
        font-size: <?php echo $text_font_size * 1.2 ?>px;
        font-weight: <?php echo $text_font_weight ?>;
        color: <?php echo $text_font_color ?>;
        text-decoration: none;
        line-height: normal;
    }

    .logo {
        font-family: <?php echo $text_font_family ?>;
        font-weight: <?php echo $text_font_weight ?>;
        color: <?php echo $text_font_color ?>;
        line-height: normal !important;
    }
</style>

<table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin: 0; border-collapse: collapse;">
    <tr>
        <td align="center" width="50%" inline-class="logo">
            <?php if ($media) { ?>
                <?php echo TNP_Composer::image($media) ?>
            <?php } else { ?>
                <a href="<?php echo home_url() ?>" target="_blank" inline-class="title">
                    <?php echo esc_attr($info['header_title']) ?>
                </a>
            <?php } ?>
        </td>
        <td width="50%" align="center" inline-class="text">
            <?php echo esc_html($info['header_sub']) ?>
        </td>
    </tr>
</table>
