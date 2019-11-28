<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php print $data['title']; ?></title>

    <?php if ($data['stylesheets'] ?? false): ?>
        <?php foreach ($data['stylesheets'] as $stylesheet): ?>
            <link rel="stylesheet" type="text/css" href="<?php print $stylesheet; ?>">
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($data['scripts']['head'] ?? false): ?>
        <?php foreach ($data['scripts']['head'] as $script): ?>
            <script type="text/javascript" src="<?php print $script; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</head>
<body>

    <?php if ($data['scripts']['body_start'] ?? false): ?>
        <?php foreach ($data['scripts']['body_start'] as $script): ?>
            <script type="text/javascript" src="<?php print $script; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($data['header'] ?? false): ?>
        <div class="header-wrapper">
            <?php print $data['header']; ?>
        </div>
    <?php endif; ?>

    <?php if ($data['content'] ?? false): ?>
        <?php foreach ($data['content'] as $section_id => $section): ?>

            <div class="content-wrapper <?php print $section_id; ?>">
                <?php print $section; ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($data['footer'] ?? false): ?>
        <div class="footer-wrapper">
            <?php print $data['footer']; ?>
        </div>
    <?php endif; ?>

    <?php if ($data['scripts']['body_end'] ?? false): ?>
        <?php foreach ($data['scripts']['body_end'] as $script): ?>
            <script type="text/javascript" src="<?php print $script; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>