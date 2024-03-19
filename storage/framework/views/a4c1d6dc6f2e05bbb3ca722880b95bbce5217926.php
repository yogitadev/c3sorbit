<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title><?php echo e($data['title1']); ?></title>
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
                    SNEHAL MEHTA<br>
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
            <?php if($data['item']['solo_carta'] == "Yes" || $data['item']['all'] == 'Yes' || $data['item']['carta_rebica'] == "Yes"): ?>
                <div class="cartda-de-admission">
                    <h3 style="text-align: center; text-decoration: underline;">CARTA DE ADMISIÓN</h3>
                    <div class="mb-5">
                        <table class="table-bold">
                            <tr>
                                <td>Número de Referencia </td>
                                <td> : <?php echo e($data['reference_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Año Académico</td>
                                <td> : <?php echo e($data['start_year']); ?> / <?php echo e($data['end_year']); ?> </td>
                            </tr>
                            <tr>
                                <td>Nombre del Estudiante</td>
                                <td>: <?php echo e($data['student_name']); ?></td>
                            </tr>
                            <tr>
                                <td>Pasaporte</td>
                                <td>: <?php echo e($data['passport_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td>: <?php echo e($data['spain_country']); ?></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td>: <?php echo e($data['dob']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <p><b>Estimado <?php echo e($data['student_name']); ?> </b></p>
                        <p>
                        Su aplicación y expediente académico han sido aprobados. Tenemos el placer de anunciarle que ha sido plenamente aceptado en <b>Castelldefels School of Social Sciences (C3S Business School)</b> y que cumplió con los requisitos académicos y económicos para inscribirse en el siguiente programa:
                        </p>
                    </div>
                    <div>
                        <table class="table-bold">
                            <tr>
                                <td>Programa</td>
                                <td>: <?php echo e($data['course_title']); ?></td>
                            </tr>
                            <tr>
                                <td>Duración</td>
                                <td>: <?php echo e($data['duration']); ?></td>
                            </tr>
                            <tr>
                                <td>Fecha de Inicio</td>
                                <td>: <?php echo e($data['start_date']); ?></td>
                            </tr>
                            <tr>
                                <td>Fecha de Culminación</td>
                                <td>: <?php echo e($data['end_date']); ?></td>
                            </tr>
                            <tr>
                                <td>Modo</td>
                                <td>: Presencial / Tiempo Completo</td>
                            </tr>
                            <tr>
                                <td>Medio de Instrucción</td>
                                <td>: Inglés</td>
                            </tr>
                            <tr>
                                <td>Pago Realizado</td>
                                <td>: &#8364;<?php echo e($data['initial_fees_paid']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <p>El curso equivale a 360 créditos educativos bajo las normas académicas del Reino Unido, que equivale a 180 ECTS (European Credit Transfer System). La duración del programa incluye un trabajo final y un proceso de evaluación por parte del alumno.</p>
                        <p>
                        Que el programa consta de 25 horas semanales que se imparten de Lunes a Viernes de 9 a 14hs
                        </p>
                        <p>
                        Castelldefels School of Social Sciences está registrado con el código No. <b>08075323</b> de la Generalitat de Catalunya; y como tal trabaja en colaboración con titulaciones de la acreditadora <b>OTHM</b> ubicada en Londres, Reino Unido e imparte cursos bajo su autorización y la certificación del Consejo Británico.
                        </p>
                    </div>
                </div>
                <?php if($data['item']['all'] == "Yes" || $data['item']['eng_version'] == "Yes" || $data['item']['carta_rebica'] == "Yes"): ?>
                    <p style="page-break-after: always;"></p>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(($data['item']['solo_carta'] == "Yes" && $data['item']['eng_version'] == "Yes") || ($data['item']['all'] == 'Yes' && $data['item']['eng_version'] == "Yes") || ($data['item']['carta_rebica'] == "Yes" && $data['item']['eng_version'] == "Yes")): ?>
                <div class="admission-letter">
                    <h3 style="text-align: center; text-decoration: underline;">ADMISSION LETTER</h3>
                    <div class="mb-5">
                        <table class="table-bold">
                            <tr>
                                <td>Reference Number</td>
                                <td>: <?php echo e($data['reference_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Academic Year</td>
                                <td>: <?php echo e($data['start_year']); ?> / <?php echo e($data['end_year']); ?> </td>
                            </tr>
                            <tr>
                                <td>Student name</td>
                                <td>: <?php echo e($data['student_name']); ?></td>
                            </tr>
                            <tr>
                                <td>Passport Number</td>
                                <td>: <?php echo e($data['passport_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Nationality</td>
                                <td>: <?php echo e($data['nationality']); ?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>: <?php echo e($data['dob']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <p><b>Dear <?php echo e($data['student_name']); ?> </b></p>
                        <p>
                        Your application and academic record have been approved.We are pleased to announce that you have been fully accepted into <b>Castelldefels School of Social Sciences (C3S Business School)</b> and has met the academic and financial requirements to enroll in the following program:
                        </p>
                    </div>
                    <div>
                        <table class="table-bold">
                            <tr>
                                <td>Program</td>
                                <td>: <?php echo e($data['course_title']); ?></td>
                            </tr>
                            <tr>
                                <td>Duration</td>
                                <td>: <?php echo e($data['duration']); ?></td>
                            </tr>
                            <tr>
                                <td>Start date</td>
                                <td>: <?php echo e($data['start_date']); ?></td>
                            </tr>
                            <tr>
                                <td>Completion date </td>
                                <td>: <?php echo e($data['end_date']); ?></td>
                            </tr>
                            <tr>
                                <td>Mode</td>
                                <td>: On campus / Full time</td>
                            </tr>
                            <tr>
                                <td>Medium of Instruction</td>
                                <td>: English</td>
                            </tr>
                            <tr>
                                <td>Initial Fees Paid </td>
                                <td>: &#8364;<?php echo e($data['initial_fees_paid']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div>
                        <p>The Course equals 360 educative credits under the United Kingdom academic rules, which is equivalent to 180 ECTS (European Credit Transfer System). That the duration of the course includes the final work and the evaluation process by the student.</p>
                        <p>
                        The program consists of 25 hours per week that are taught from Monday to Friday from 9 a.m. to 2 p.m.
                        </p>
                        <p>
                        Castelldefels School of Social Sciences is registered with code No. <b>08075323</b> of the Generalitat de Catalunya; and as such it works in collaboration with diplomas from the <b>OTHM</b> accreditor located in London, United Kingdom and teaches courses under its authorization and certification from the British Council.
                        </p>
                    </div>
                </div>
                <?php if($data['item']['all'] == "Yes" || $data['item']['carta_rebica'] == "Yes"): ?>
                    <p style="page-break-after: always;"></p>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($data['item']['carta_rebica'] == "Yes" || $data['item']['all'] == "Yes"): ?>
                <div class="recibo-de-pago">
                    <h3 style="text-align: center; text-decoration: underline;">RECIBO DE PAGO</h3>
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
                                <td>: <?php echo e($data['passport_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td>: <?php echo e($data['spain_country']); ?></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td>: <?php echo e($data['dob']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Pago correspondiente al programa </td>
                                <td>: <?php echo e($data['course_title']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Tasa de Solicitud</td>
                                <td>: &#8364;300</td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Coste Total De La Matrícula</td>
                                <td>: &#8364;<?php echo e($data['total_tution_fee']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Descuentos Totales</td>
                                <td>: &#8364;<?php echo e($data['total_discount']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Pago Realizado</td>
                                <td>: &#8364;<?php echo e($data['tution_approve']); ?> (por curso) + &#8364;<?php echo e($data['registration_approve']); ?>  (por registro)</td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Total Pendiente </td>
                                <td>: &#8364;<?php echo e($data['total_pending']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php if($data['item']['all'] == "Yes" || $data['item']['eng_version'] == "Yes"): ?>
                    <p style="page-break-after: always;"></p>
                <?php endif; ?>
            <?php endif; ?>
            <?php if(($data['item']['carta_rebica'] == "Yes" && $data['item']['eng_version'] == "Yes") || ($data['item']['all'] == 'Yes' && $data['item']['eng_version'] == "Yes")): ?>
                <div class="receipt-payment">
                    <h3 style="text-align: center; text-decoration: underline;">RECEIPT OF PAYMENT</h3>
                    <div class="table-bold">
                        <table>
                        <tr>
                                <td>Reference Number</td>
                                <td>: <?php echo e($data['reference_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Academic Year </td>
                                <td>: <?php echo e($data['start_year']); ?> / <?php echo e($data['end_year']); ?></td>
                            </tr>
                            <tr>
                                <td>Student name</td>
                                <td>: <?php echo e($data['student_name']); ?></td>
                            </tr>
                            <tr>
                                <td>Passport Number</td>
                                <td>: <?php echo e($data['passport_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Nationality</td>
                                <td>: <?php echo e($data['nationality']); ?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth </td>
                                <td>: <?php echo e($data['dob']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Payment for the Program</td>
                                <td>: <?php echo e($data['course_title']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Application fee</td>
                                <td>: &#8364;300</td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Total cost of tuition </td>
                                <td>: &#8364;<?php echo e($data['total_tution_fee']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Total discounts</td>
                                <td>: &#8364;<?php echo e($data['total_discount']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Payment made </td>
                                <td>: &#8364;<?php echo e($data['tution_approve']); ?> (per course) + &#8364;<?php echo e($data['registration_approve']); ?> (per registration)</td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                            <tr>
                                <td>Total Pending</td>
                                <td>: &#8364;<?php echo e($data['total_pending']); ?></td>
                            </tr>
                            <tr>
                                <td><br></td>
                                <td><br></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <?php if($data['item']['all'] == "Yes"): ?>
                    <p style="page-break-after: always;"></p>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($data['item']['all'] == 'Yes'): ?>
                <div class="carts-de-alojamentio">
                    <h3 style="text-align: center; text-decoration: underline;">CARTA DE ALOJAMIENTO</h3>
                    <p>
                        Excelentísimos miembros del Consulado de España en <b><?php echo e($data['spain_country']); ?></b>
                    </p>
                    <p>
                        Castelldefels School of Social Sciences (C3S Business School) informa que:
                    </p>
                    <br>
                    <br>
                    <div class="table-bold">
                        <table>
                            <tr>
                                <td>Nombre del Estudiante</td>
                                <td>: <?php echo e($data['student_name']); ?></td>
                            </tr>
                            <tr>
                                <td>Pasaporte</td>
                                <td>: <?php echo e($data['passport_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td>: <?php echo e($data['spain_country']); ?></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td>: <?php echo e($data['dob']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                    <div>
                        <p>
                        EL mencionado estudiante está matriculado en nuestro centro educativo garantizamos que le proporcionaremos toda la asistencia necesaria para el alojamiento y otros requisitos durante el período de estudios mencionados en la carta de admisión para el curso académico que comienza el <b> <?php echo e($data['start_date']); ?>.</b>
                        </p><br>
                        <p>
                        Contamos con acuerdos comerciales con diferentes empresas de reubicación, hostales y pisos para estudiantes para poder ofrecer toda la ayuda y asistencia necesaria a nuestros estudiantes.
                        </p><br>
                        <p>
                        Por favor, no duden en contactarnos de tener alguna pregunta o dudas para clarificar.
                        </p> <br> <br> <br> <br> <br> <br> <br> <br>
                        <p>Atentamente,</p>
                    </div>
                </div>
                <p style="page-break-after: always;"></p>
            <?php endif; ?>
            <?php if($data['item']['all'] == 'Yes' && $data['item']['eng_version'] == "Yes"): ?>
                <div class="acoommodation">
                    <h3 style="text-align: center; text-decoration: underline;">ACCOMMODATION LETTER</h3>
                    <p>
                        Your Excellency Members of the Consulate of Spain in <b><?php echo e($data['nationality']); ?></b>
                    </p>
                    <p>
                        Castelldefels School of Social Sciences (C3S Business School) reports that:
                    </p>
                    <br>
                    <br>
                    <div class="table-bold">
                        <table>
                            <tr>
                                <td>Student name</td>
                                <td>: <?php echo e($data['student_name']); ?></td>
                            </tr>
                            <tr>
                                <td>Passport Number </td>
                                <td>: <?php echo e($data['passport_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Nationality </td>
                                <td>: <?php echo e($data['nationality']); ?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>: <?php echo e($data['dob']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                    <div>
                        <p>
                        The aforementioned student is enrolled in our school, we guarantee that we will provide you with all the necessary assistance for accommodation and other requirements during the period of study mentioned in the admission letter for the academic year th<b> <?php echo e($data['start_date']); ?>.</b>
                        </p><br>
                        <p>
                        We have commercial agreements with different relocation companies, hostels and student flats to offer all the necessary help and assistance to our students.
                        </p><br>
                        <p>
                        Please do not hesitate to contact us if you have any questions or doubts to clarify
                        </p> <br> <br> <br> <br> <br> <br> <br> <br>
                        <p>Kind regards,</p>
                    </div>
                </div>
                <p style="page-break-after: always;"></p>
            <?php endif; ?>
            <?php if($data['item']['all'] == 'Yes'): ?>
                <div class="carta-estimacion">
                    <h3 style="text-align: center; text-decoration: underline;">CARTA DE ESTIMACIÓN DE GASTOS</h3>
                    <br>
                    <br>
                    <div class="table-bold">
                        <table>
                            <tr>
                                <td>Nombre del Estudiante</td>
                                <td><?php echo e($data['student_name']); ?></td>
                            </tr>
                            <tr>
                                <td>Pasaporte</td>
                                <td><?php echo e($data['passport_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td><?php echo e($data['spain_country']); ?></td>
                            </tr>
                            <tr>
                                <td>Fecha de Nacimiento</td>
                                <td><?php echo e($data['dob']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                    <p>Castelldefels School of Social Sciences (C3S Business School), estima la siguiente serie de gastos de matriculación y manutención:</p>
                    <br>
                    <br>
                    <h5 style="text-align: center; text-decoration: underline;">HOJA DE INFORMACIÓN FINANCIERA ESTIMATIVA PARA UN CURSO ACADÉMICO:</h5>
                    <br>
                    <div class="table-bold">
                        <table>
                            <tr>
                                <td>1. Estudios</td>
                                <td>: &#8364;<?php echo e($data['total_tution_fee']); ?> (Programa Total) </td>
                            </tr>
                            <tr>
                                <td>2. Seguro Médico Y Accidentes</td>
                                <td>: &#8364;500 (Anuales)</td>
                            </tr>
                            <tr>
                                <td>3. Vivienda</td>
                                <td>: &#8364;400 (Mensuales)</td>
                            </tr>
                            <tr>
                                <td>4. Alimentación</td>
                                <td>: &#8364;200 (Mensuales)</td>
                            </tr>
                            <tr>
                                <td>5. Subsistencia</td>
                                <td>: &#8364;200 (Mensuales)</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br> <br> <br>
                    <p>
                        Carta que se expide a petición del interesado en Barcelona, <b><?php echo e($data['spain_date']); ?></b>
                    </p>
                </div>
                <?php if($data['item']['eng_version'] == "Yes"): ?>
                    <p style="page-break-after: always;"></p>
                <?php endif; ?>
            <?php endif; ?>
            <?php if($data['item']['all'] == 'Yes' && $data['item']['eng_version'] == "Yes"): ?>
                <div class="expense-estimation">
                    <h3 style="text-align: center; text-decoration: underline;">EXPENSE ESTIMATION LETTER</h3>
                    <br>
                    <br>
                    <div class="table-bold">
                        <table>
                            <tr>
                                <td>Student Name</td>
                                <td><?php echo e($data['student_name']); ?></td>
                            </tr>
                            <tr>
                                <td>Passport Number</td>
                                <td><?php echo e($data['passport_number']); ?></td>
                            </tr>
                            <tr>
                                <td>Nationality</td>
                                <td><?php echo e($data['nationality']); ?></td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td><?php echo e($data['dob']); ?></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                    <p>Castelldefels School of Social Sciences (C3S Business School), estimates the following series of enrolment and maintenance expenses:</p>
                    <br>
                    <br>
                    <h5 style="text-align: center; text-decoration: underline;">ESTIMATIVE FINANCIAL INFORMATION SHEET FOR AN ACADEMIC COURSE:</h5>
                    <br>
                    <div class="table-bold">
                        <table>
                            <tr>
                                <td>1. Tuition Fees</td>
                                <td>: &#8364;<?php echo e($data['total_tution_fee']); ?> (Total Program) </td>
                            </tr>
                            <tr>
                                <td>2. Medical Insurance</td>
                                <td>: &#8364;500 (Annual)</td>
                            </tr>
                            <tr>
                                <td>3. Accommodation</td>
                                <td>: &#8364;400 (Monthly)</td>
                            </tr>
                            <tr>
                                <td>4. Food</td>
                                <td>: &#8364;200 (Monthly)</td>
                            </tr>
                            <tr>
                                <td>5. General Expenses</td>
                                <td>: &#8364;200 (Monthly)</td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br> <br> <br>
                    <p>
                    Letter issued at the request of the interested party in Barcelona,  <b><?php echo e($data['spain_date']); ?></b>
                    </p>
                </div>
            <?php endif; ?>
        </main>
    </body>
</html>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/visa_letters/main_visa_letter.blade.php ENDPATH**/ ?>