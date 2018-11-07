<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Photos</title>
	<meta name="description" content="Photos uploaded by the school"/>
	
    <?php require_once (__DIR__."/../../../../templates/header_info.php");?>
	<link href = "/fass/css/photos.css" rel="stylesheet">
    
    <?php echo $gallery->getColorboxStyles(1); ?>

    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.4.min.js"></script>
    <?php echo $gallery->getColorboxScripts(); ?>

    <?php file_exists('googleAnalytics.inc') ? include('googleAnalytics.inc') : false; ?>

</head>
<body>
<?php include_once (__DIR__."/../../../../templates/navigation.html")?>

<main>
    
	<?php include_once (__DIR__."/../../../../templates/header.html")?>
    <!-- Start UberGallery v<?php echo UberGallery::VERSION; ?> - Copyright (c) <?php echo date('Y'); ?> Chris Kankiewicz (http://www.ChrisKankiewicz.com) -->
    <div id="galleryWrapper" class="margin">
        <h1>Photos</h1>
        <div class="line"></div>

        <?php if($gallery->getSystemMessages()): ?>
            <ul id="systemMessages">
                <?php foreach($gallery->getSystemMessages() as $message): ?>
                    <li class="<?php echo $message['type']; ?>">
                        <?php echo $message['text']; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <div id="galleryListWrapper">
            <?php if (!empty($galleryArray) && $galleryArray['stats']['total_images'] > 0): ?>
                <ul id="galleryList" class="clearfix">
                    <?php foreach ($galleryArray['images'] as $image): ?>
                        <li><a href="<?php echo html_entity_decode($image['file_path']); ?>" title="<?php echo $image['file_title']; ?>" rel="colorbox"><img src="<?php echo $image['thumb_path']; ?>" alt="<?php echo $image['file_title']; ?>"/></a></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>

        <div id="galleryFooter" class="clearfix">

            <?php if ($galleryArray['stats']['total_pages'] > 1): ?>
            <ul id="galleryPagination">

                <?php foreach ($galleryArray['paginator'] as $item): ?>

                    <li class="<?php echo $item['class']; ?>">
                        <?php if (!empty($item['href'])): ?>
                            <a href="<?php echo $item['href']; ?>"><?php echo $item['text']; ?></a>
                        <?php else: ?><?php echo $item['text']; ?><?php endif; ?>
                    </li>

                <?php endforeach; ?>

            </ul>
            <?php endif; ?>

            <div id="credit">Powered by, <a href="http://www.ubergallery.net">UberGallery</a></div>
        </div>
    </div>
    <!-- End UberGallery - Distributed under the MIT license: http://www.opensource.org/licenses/mit-license.php -->
</main>

</body>
</html>
