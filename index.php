<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>PHP OSS project : planning</title>
    </head>
    <body>
        <?php

        require __DIR__.'/vendor/autoload.php';

        use SmileOSS\Lab\OOP\Routing\FrontController;

        $frontController = new FrontController();

        echo $frontController->render();

        ?>
    </body>
</html>
