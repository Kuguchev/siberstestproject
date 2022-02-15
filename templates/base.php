<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link rel="stylesheet" type="text/css" href="../templates/css/main.css" />
    <script src="../js/main.js"></script>
    <title>Test Project</title>
</head>

<body>
<div class="main_container">
    <div class="menu">
        <ul>
            <li>
                <a href="/">MAIN</a>
            <li><b>Header</b></li>
            </li>
        </ul>
    </div>
    <div class="content">
        <?php include ($controllerTemplatePath); ?>
    </div>
    <div class="menu">
        <ul>
            <li><b>Footer</b></li>
        </ul>
    </div>
</div>
</body>
</html>