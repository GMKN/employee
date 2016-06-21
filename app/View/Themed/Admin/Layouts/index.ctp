<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $this->element('head') ?>
</head>
<body onload="hide_preloader();" class="home">
<!-- Page wrap -->
<div id="page-wrap">
    <!-- Header -->
    <div class="container">
        <?php echo $this->element('menu') ?>
    </div>
    <!-- End / Header -->
    <div class="container">
        <?php echo $this->fetch('content') ?>
    </div>
    <!-- Footer -->
    <footer>
        <?php echo $this->element('footer') ?>
    </footer>
    <!-- End / Footer -->
</div>
<!-- End / Page wrap -->
</body>
</html>