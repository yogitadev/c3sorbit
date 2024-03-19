<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?php echo e($data['title']); ?></title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <style type="text/css">
            @page {
                margin: 0cm 0cm;
            }

            body {
                margin-top: 3.5cm;
                margin-left: 3cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            header {
                position: fixed;
                top: 0.5cm;
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
                line-height: 15px;
            }

            .table-bold {
                font-weight: bold;
            }

            .tdpadding { padding-left: 60px; }
        </style>
    </head>
    <body>
        <!-- Define header and footer blocks before your content -->
        <header>
           
            <?php
                    $path = 'themes/admin/images/C3Slogo.png';
                    $logo = 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path));

                    $path = 'themes/admin/images/scan.png';
                    $scan = 'data:image/' . pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path));
                ?>
                
            <table style="width: 100%;">
                <tr>
                    <td rowspan="2"><img src="<?php echo $logo?>" alt="logo" width="100" height="90" style=""></td>
                </tr>
                <tr>
                    <td style=" text-align: center; ">
                        <b style="color: blue; ">CASTELLDEFELS SCHOOL OF SOCIAL SCIENCES</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr style="color:blue;"> 
                    </td>
                </tr>
                
            </table>
        </header>
        <footer>
            <?php
                $path = 'themes/admin/images/C3Ssignature.jpg';
                $base64 = 'data:image/' .  pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path));

                $path = 'themes/admin/images/eStamp.png';
                $esign = 'data:image/' .  pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path));
            ?>
            <div style="margin-left: 2cm; font-weight: bold;">
                <div style="position:relative;">
                    <img src="<?php echo $base64?>" alt="logo" width="60" height="60"><br>
                    <?php if($data['item']['e_sign'] == 'Yes'): ?>
                        <img src="<?php echo $esign?>" alt="logo" width="60" height="60"  style="position:absolute; top: 5px; left: 30px;"><br>
                    <?php endif; ?>
                </div>
                <b>
                    SNEHAL MEHTA <br>
                    Director General <br>
                    <?php echo e($data['campus_name']); ?> <br>
                    <?php echo e($data['spain_date']); ?>

                </b>
            </div>
            <hr style="color:blue;">
            <div style="text-align: center; font-size: 12px;">
                <?php echo $data['footer']; ?>

                VLREFNO: <?php echo e($data['vl_referenceno']); ?>

            </div>
        </footer>
        <main>
            <div class="carta-llegada">
                <h3 style="text-align: center; text-decoration: underline;">CARTA DE LLEGADA TARDÍA</h3>
                <div>
                    <p>
                        Excelentísimos miembros del Consulado de España en <b><?php echo e($data['student_name']); ?></b>,</p>
                    <p>
                        Castelldefels School of Social Sciences (C3S Business School) se sirve de informar que:
                    </p>
                </div>
                <div class="table-bold">
                    <table>
                        <tr>
                            <td>Número de Referencia</td>
                            <td>: <?php echo e($data['reference_number']); ?></td>
                        </tr>
                        <tr>
                            <td>Año Académico</td>
                            <td>: <?php echo e($data['start_year']); ?> / <?php echo e($data['end_year']); ?></td>
                        </tr>
                        <tr>
                            <td>Nombre del Estudiante</td>
                            <td>: <?php echo e($data['student_name']); ?></td>
                        </tr>
                        <tr>
                            <td>Pasaporte </td>
                            <td>: <?php echo e($data['passport_number']); ?> </td>
                        </tr>
                        <tr>
                            <td>Nacionalidad</td>
                            <td>: <?php echo e($data['spain_country']); ?></td>
                        </tr>
                        <tr>
                            <td>Fecha de Nacimiento</td>
                            <td>: <?php echo e($data['dob']); ?> </td>
                        </tr>
                    </table>
                </div>
                <br> <br>
                <div>
                    <p>El mencionado estudiante, se encuentra exitosamente matriculado en este centro educativo. Les informamos que debido a causas externas a nuestra alumno/a, no le será posible dar comienzo en las fechas iniciales, por lo que, excepcionalmente daremos entrada unos días más tarde, con la pertinente recuperación de contenidos online hasta que se le otorgue su visado de estudiante. <b>La incorporación máxima prevista del Programa es de 45 días posteriores al inicio del curso.</b></p>
                    <br> <br>
                    <p>
                        Por favor, no duden en contactarnos de tener alguna pregunta o dudas para clarificar.
                    </p>
                    <br> <br> <br> <br> <br> <br> <br> <br>
                    <p>
                        Atentamente,
                    </p>
                </div>
            </div>
            <p style="page-break-after: always;"></p>
            <div class="late-arrival">
                <h3 style="text-align: center; text-decoration: underline;">LATE ARRIVAL LETTER</h3>
                <div>
                    <p>
                    Your Excellency members of the Consulate of Spain in <b><?php echo e($data['student_name']); ?></b>,</p>
                    <p>
                        Castelldefels School of Social Sciences (C3S Business School) informs you that:
                    </p>
                </div>
                <div class="table-bold">
                    <table>
                        <tr>
                            <td>Reference Number</td>
                            <td>: <?php echo e($data['reference_number']); ?></td>
                        </tr>
                        <tr>
                            <td>Academic Year</td>
                            <td>: <?php echo e($data['start_year']); ?> / <?php echo e($data['end_year']); ?></td>
                        </tr>
                        <tr>
                            <td>Student name</td>
                            <td>: <?php echo e($data['student_name']); ?></td>
                        </tr>
                        <tr>
                            <td>Passport Number </td>
                            <td>:<?php echo e($data['passport_number']); ?> </td>
                        </tr>
                        <tr>
                            <td>Nationality</td>
                            <td>: <?php echo e($data['nationality']); ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>: <?php echo e($data['dob']); ?> </td>
                        </tr>
                    </table>
                </div>
                <br> <br>
                <div>
                    <p>The aforementioned student is successfully enrolled in this school. We inform you that due to causes outside our student, it will not be possible to start on the initial dates, so, exceptionally we will give entry a few days later, with the relevant recovery of content online until you are granted your student visa. <b>The maximum planned incorporation of the Program is 45 days after the start of the course.</b></p>
                    <br> <br>
                    <p>
                        Please do not hesitate to contact us if you have any questions or doubts to clarify.
                    </p>
                    <br> <br> <br> <br> <br> <br> <br> <br> <br>
                    <p>
                        Kind regards,
                    </p>
                </div>
            </div>
        </main>
    </body>
</html>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/visa_letters/regenerate_ext.blade.php ENDPATH**/ ?>