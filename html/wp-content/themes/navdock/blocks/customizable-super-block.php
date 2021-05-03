
<?php 

$type_of_bg = get_field('type-of-bg');
$bg_color = get_field('background-color');
$bg_image = get_field('background-image'); 
$text_content = get_field('text-content');
$text_color = get_field('text-color');
$img_content = get_field('img-content');
$img_content_position = get_field('background-image-pos');
$orientation = get_field('orientation');
$cta = get_field('cta-button-link');
$cta_text_color = get_field('cta-button-link-color-text');
$cta_text_color_border_hover = get_field('cta-button-link-color-border-hover');
$cta_bg_color = get_field('cta-button-link-color-bg');

// orientation 
if ($orientation === "text-on-left") {
    $orientation_class = "";
} else {
    $orientation_class = "avm-block__order-1";
}

//background-position 
$bg_position_style = '';
switch ($img_content_position) {
    case 'cover': 
        $bg_position_style = 'background-size:cover;';
    break;
    case 'full-horizontally': 
        $bg_position_style = 'background-size:100% auto;';
    break;
    case 'full-vertically': 
        $bg_position_style = 'background-size:auto 100%;';
    break;
    case 'top': 
        $bg_position_style = 'background-size:cover;background-position:top;';
    break;
    case 'left': 
        $bg_position_style = 'background-size:cover;background-position:left;';
    break;
    case 'right': 
        $bg_position_style = 'background-size:cover;background-position:right;';
    break;
    case 'bottom': 
        $bg_position_style = 'background-size:cover;background-position:bottom;';
    break;
}

// for css ID button stuff 
$bytes = random_bytes(3);
$css_id = bin2hex($bytes);

?>

<style>
.knapp_class<?php echo $css_id; ?> {
    color: <?php echo $cta_text_color; ?>!important;
    background-color: <?php echo $cta_bg_color; ?>!important;
}
.knapp_class<?php echo $css_id; ?>:after {
    background-color: <?php echo $cta_bg_color; ?>!important
}
.knapp_class<?php echo $css_id; ?>:before {
    background-color: <?php echo $cta_text_color_border_hover; ?>!important
}
/* cta_text_color_border_hover */

</style>

<?php 
$bg_style = "";
if ($type_of_bg === 'single-color') {
    $bg_style = "background-color:" . $bg_color . ";color:" . $text_color . ";";
} else {
    if ($bg_image) {
        $bg_style = "background-image:url(" . $bg_image['sizes']['landing-block-background-full'] . ");color:" . $text_color . ";";
    }
}

if (!empty($cta)) {
    $cta_html = "<a class='knapp_class" . $css_id . " avm-block__knapp' href='" . $cta['url'] . "'>" . $cta['title'] . "</a>";
} else {
    $cta_html = "";
}
?>

<div class="avm-block__wrapper" style="<?php echo $bg_style; ?>">
<div class="navdock-page__page-wrapper-inner">

    <?php if ($orientation === "one-col") { ?>

        <div class="avm-block__col avm-block__col-whole">
            <div class="avm-block__col-whole-content">
                <?php echo $text_content; ?>
                <?php echo $cta_html; ?>
            </div>
        </div>

    <?php } else { ?>

        <div class="avm-block__col avm-block__col-half">
            <?php echo $text_content; ?>
            <?php echo $cta_html; ?>
        </div>
        <div class="avm-block__col-half <?php echo $orientation_class ?>" style="<?php echo $bg_position_style; ?>;background-image:url(<?php echo $img_content['sizes']['landing-block-background-half']; ?>)">

        </div>

    <?php } ?>
    
</div>
</div>

