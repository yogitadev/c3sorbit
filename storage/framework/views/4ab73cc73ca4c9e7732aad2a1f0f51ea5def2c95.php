<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?php echo e(env('APP_NAME')); ?></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style type="text/css">
            @page {
                margin: 0cm 0cm;
            }

            body {
                margin-top: 2cm;
                margin-left: 3cm;
                margin-right: 2cm;
            }

            header {
                position: fixed;
                top: 0cm;
                left: 1cm;
                right: 1cm;
                height: auto;
            }
            
            footer {
                position: fixed; 
                bottom: 0.5cm; 
                left: 1cm; 
                right: 1cm;
                height: auto;
                text-align: center;
            }

            .tdpadding { padding-left: 60px; }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
           
            <?php

                    $path = 'themes/admin/images/logo.gif';
                    $logo = 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path));
                ?>
                
            <table style="width: 100%;">
                <tr>
                    <td><img src="<?php echo $logo?>" alt="logo" width="50" height="50" style=""></td>
                </tr>
                <tr>
                    <td>
                        <hr style="color:blue;"> 
                    </td>
                </tr>
            </table>
        </header>
        <footer>
            <hr style="color:blue;">
            <!-- <span style="text-align: center;">
                <b>Dirección:</b> Avenida de Parallel 54, Ent 4, 08004 - Barcelona, Spain.
            </span><br>
            <span style="text-align: center;">
                <b>Teléfono:</b>+34 934 43 1571.<b>Correo electrónico:</b>info@aspirebarcelona.eu | <b style="font-size: 7pt;">COLREFNO: 01092024:103429:23</b>
            </span><br> -->
            <span style="text-align: center;">
            ©  <?php echo e(date('Y')); ?> <?php echo e(env('APP_NAME')); ?>. All rights reserved.
            </span><br>
        </footer>
        <main>
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </body>
</html>
<?php /**PATH /home/hp/projects/edfyed/resources/views/mail/front/layouts/layout.blade.php ENDPATH**/ ?>