<?php
global $porto_settings;

// For Favicon
if ($porto_settings['favicon']): ?>
    <link rel="shortcut icon" href="<?php echo esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['favicon']['url'])); ?>" type="image/x-icon" />
<?php endif;

// For iPhone
if ($porto_settings['icon-iphone']): ?>
    <link rel="apple-touch-icon-precomposed" href="<?php echo esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['icon-iphone']['url'])); ?>">
<?php endif;

// For iPhone Retina
if ($porto_settings['icon-iphone-retina']): ?>
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['icon-iphone-retina']['url'])); ?>">
<?php endif;

// For iPad
if ($porto_settings['icon-ipad']): ?>
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['icon-ipad']['url'])); ?>">
<?php endif;

// For iPad Retina
if($porto_settings['icon-ipad-retina']): ?>
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo esc_url(str_replace( array( 'http:', 'https:' ), '', $porto_settings['icon-ipad-retina']['url'])); ?>">
<?php endif; ?>

<?php wp_head(); ?>

<?php
if (isset($porto_settings['js-code-head']) && $porto_settings['js-code-head']) { ?>
    <script type="text/javascript">
        <?php echo $porto_settings['js-code-head']; ?>
    </script>
<?php }
?>

<meta name="google-site-verification" content="agQhUV2WjJg1MvM46fzxaHOXbnbw5ae6fyvj1-v-ZZc"/>
<link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto" rel="stylesheet">
<!--
<link rel="stylesheet" href="/wp-content/themes/porto/css/neverback.css" type="text/css" media="all">
<link rel="stylesheet" href="/wp-content/themes/porto/css/responsive.css" type="text/css" media="all">
-->