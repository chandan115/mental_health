<?php
$size = ['width' => 600, 'height' => 0];
?>

<style>
    .title {
        font-family: <?php echo $title_font_family ?>;
        font-size: <?php echo $title_font_size ?>px;
        font-weight: <?php echo $title_font_weight ?>;
        color: <?php echo $title_font_color ?>;
        line-height: normal;
        margin: 0;
        padding-bottom: 20px;
    }

    .paragraph {
        font-family: <?php echo $text_font_family ?>;
        font-size: <?php echo $text_font_size ?>px;
        font-weight: <?php echo $text_font_weight ?>;
        color: <?php echo $text_font_color ?>;
        line-height: 1.5em;
        text-align: left;
    }

    .meta {
        font-family: <?php echo $text_font_family ?>;
        font-size: <?php echo round($text_font_size * 0.9) ?>px;
        font-weight: <?php echo $text_font_weight ?>;
        color: <?php echo $text_font_color ?>;
        line-height: normal;
        padding-bottom: 10px;
        text-align: center;
    }

    .button {
        padding: 15px 0;
    }

</style>

<?php foreach ($posts as $post) { ?>

    <?php
    $url = tnp_post_permalink($post);

    $media = null;
    if ($show_image) {
        $media = tnp_composer_block_posts_get_media($post, $size);
        if ($media) {
            $media->link = $url;
        }
    }

    $meta = [];

    if ($show_date) {
        $meta[] = tnp_post_date($post);
    }

    if ($show_author) {
        $author_object = get_user_by('id', $post->post_author);
        if ($author_object) {
            $meta[] = $author_object->display_name;
        }
    }

    $button_options['button_url'] = $url;
    ?>


    <table border="0" cellpadding="0" align="center" cellspacing="0" width="100%" class="responsive">
        <tr>
            <td inline-class="title">
                <?php echo $post->post_title ?>
            </td>
        </tr>

        <?php if ($meta) { ?>
            <tr>
                <td inline-class="meta">
                    <?php echo esc_html(implode(' - ', $meta)) ?>
                </td>
            </tr>
        <?php } ?>

        <?php if ($media) { ?>
            <tr>
                <td align="center">
                    <?php echo TNP_Composer::image($media) ?>
                </td>
            </tr>
        <?php } ?>

        <tr>
            <td>
                <?php echo TNP_Composer::post_content($post) ?>
            </td>
        </tr>

        <?php if ($show_read_more_button) { ?>
            <tr>
                <td align="center" inline-class="button">
                    <?php echo TNP_Composer::button($button_options) ?>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br><br>

<?php } ?>
