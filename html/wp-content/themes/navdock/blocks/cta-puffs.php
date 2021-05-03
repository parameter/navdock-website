<?php 

$puffs = get_field('puffs');
$type_of_bg = get_field('type-of-bg');
$bg_color = get_field('background-color');
$bg_img = get_field('background-image');
$text_color = get_field('text-color');

$bg_style = "";
if ($type_of_bg === 'single-color') {
    $bg_style = "background-color:" . $bg_color . ";color:" . $text_color . ";";
} else {
    $bg_style = "background-image:url(" . $bg_img . ");color:" . $text_color . ";";
}

?>

<div class="avm-block__wrapper" style="<?php echo $bg_style; ?>">

    <?php foreach($puffs as $puff) { ?>

        <div class="avm-block__cta-puff">
            <img src="<?php echo $puff['icon']['sizes']['thumbnail'] ?>" />
            <h4><?php echo $puff['title'] ?></h4>
            <p><?php echo $puff['paragraph'] ?></p>
        </div>

    <?php } ?>

</div>


