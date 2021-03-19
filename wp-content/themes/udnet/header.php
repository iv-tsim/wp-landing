<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?
            wp_title( '|', true, 'right' );
            bloginfo( 'name' );
            $siteDescription = get_bloginfo( 'description', 'display' );
            if ( $siteDescription ) echo " | $siteDescription"; 
        ?>
    </title>



    <? wp_head(); ?>

</head>
<body <? body_class(); ?>>

    Тут header

<? get_filename(); ?>