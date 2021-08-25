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
        padding: 0 0 5px 0;
    }

    .excerpt {
        font-family: <?php echo $text_font_family ?>;
        font-size: <?php echo $text_font_size ?>px;
        font-weight: <?php echo $text_font_weight ?>;
        color: <?php echo $text_font_color ?>;
        line-height: 1.5em;
        padding: 10px 0 15px 0;
    }

    .meta {
        font-family: <?php echo $text_font_family ?>;
        color: <?php echo $text_font_color ?>;
        font-size: <?php echo round($text_font_size * 0.8) ?>px;
        font-weight: normal;
        padding: 0 0 5px 0;
    }
    .button {
        padding-bottom: 20px;
    }
</style>


<?php foreach ($posts as $post) { ?>

    <?php
    $url = tnp_post_permalink($post);
    $button_options['button_url'] = $url;

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
    ?>

    <?php if ($media) { ?>
        <table width="100%" cellpadding="0" cellspacing="0" border="0" style="margin-bottom: 20px">
            <tr>
                <td align="center">
                    <?php echo TNP_Composer::image($media) ?>
                </td>
            </tr>
        </table>
    <?php } ?>

    <table width="100%" cellpadding="0" cellspacing="0" border="0" class="responsive" style="margin: 0;">
        <tr>
            <td>

                <!-- ARTICLE -->
                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                    <?php if ($meta) { ?>
                        <tr>
                            <td align="<?php echo $align_left ?>" inline-class="meta">
                                <?php echo esc_html(implode(' - ', $meta)) ?>
                            </td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td align="<?php echo $align_left ?>" inline-class="title" class="tnpc-row-edit tnpc-inline-editable"
                            data-type="title" data-id="<?php echo $post->ID ?>" dir="<?php echo $dir ?>">
                                <?php
                                echo TNP_Composer::is_post_field_edited_inline($options['inline_edits'], 'title', $post->ID) ?
                                        TNP_Composer::get_edited_inline_post_field($options['inline_edits'], 'title', $post->ID) :
                                        tnp_post_title($post)
                                ?>
                        </td>
                    </tr>

                    <?php if ($excerpt_length) { ?>
                        <tr>
                            <td align="<?php echo $align_left ?>" inline-class="excerpt" class="tnpc-row-edit tnpc-inline-editable" data-type="text" data-id="<?php echo $post->ID ?>" dir="<?php echo $dir ?>">
                                <?php
                                echo TNP_Composer::is_post_field_edited_inline($options['inline_edits'], 'text', $post->ID) ?
                                        TNP_Composer::get_edited_inline_post_field($options['inline_edits'], 'text', $post->ID) :
                                        tnp_post_excerpt($post, $excerpt_length)
                                ?>
                            </td>
                        </tr>
                    <?php } ?>

                    <?php if ($show_read_more_button) { ?>
                        <tr>
                            <td align="<?php echo $align_left ?>" inline-class="button">
                                <?php echo TNP_Composer::button($button_options) ?>
                            </td>
                        </tr>
                    <?php } ?>
                </table>

            </td>
        </tr>
    </table>

<?php } ?>


