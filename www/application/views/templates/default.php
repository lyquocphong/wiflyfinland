<!DOCTYPE html>
<html>
 
    <head>
        <title><?php echo $title; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet"> -->
        
        <link href='assets/css/common.css' rel="stylesheet">

        <?php
            if(isset($extra_css))
            {
                foreach($extra_css as $css)
                {
                    echo '<link href="'.$css.'" rel="stylesheet">';
                }
            }
        ?>

    </head>
 
    <body>
              
        <?php echo $content; ?>

        <?php
            if(isset($extra_js))
            {
                foreach($extra_js as $js)
                {
                    echo '<script src="'.$js.'"></script>';
                }
            }
        ?>
         
    </body>
     
</html>