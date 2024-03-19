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
            <div class="prueba-del">
                <h3 style="text-align: center; text-decoration: underline;">PRUEBA DEL DOMINIO DEL INGLÉS</h3>
                <div>
                    <p>
                        Los solicitantes para quienes el inglés no es su primer idioma / lengua materna deben demostrar su dominio del inglés independientemente de sus estudios de idioma inglés.</p>
                    <p>
                        C3S Business School se reserva el derecho de exigir pruebas de dominio del inglés cuando se considere necesario.
                    </p>
                    <p>
                    El estudiante <b><?php echo e($data['student_name']); ?></b> ha demostrado buenos niveles de habla, comprensión auditiva y escritura en inglés a través de nuestra entrevista interna de dominio del idioma según nuestra política de admisiones.
                    </p>
                    <br>
                    <br>
                    <h5 style="text-align: center; text-decoration: underline;">Entrevista intensiva de inglés de la escuela de negocios C3S (C3S-IEI):</h5>
                    <p>
                        Se considerará que los estudiantes que completen la entrevista intensiva de inglés de C3S Business School hayan satisfecho el dominio del idioma requerido y no es necesario la prueba de TOEFL o IELTS.
                    </p>
                    <p>
                        Tenga en cuenta que, en todos los casos, la admisión a la escuela de negocios C3S siempre está condicionada a aprobar nuestro C3S-IEI interno antes del inicio del programa de tiempo completo.
                    </p>
                    <p>
                        Por lo tanto, el estudiante <b><?php echo e($data['student_name']); ?></b> , con el número de pasaporte <b><?php echo e($data['passport_number']); ?></b>, nacionalidad <b><?php echo e($data['spain_country']); ?></b>, fecha de nacimiento <b><?php echo e($data['dob']); ?></b> ha demostrado competencia en inglés al aprobar el C3S-IEI. Los candidatos cuyo primer idioma es el inglés normalmente están exentos de este requisito de todos modos.
                    </p>
                </div>
            </div>
            <p style="page-break-after: always;"></p>
            <div class="proof-english">
                <h3 style="text-align: center; text-decoration: underline;">PROOF OF ENGLISH PROFICIENCY</h3>
                <div>
                    <p>
                        Applicants for whom English is not a first/native language must demonstrate English Proficiency regardless of English language studie.
                    </p>
                    <p>
                        C3S Business School maintains the right to require English Proficiency testing when deemed necessary.
                    </p>
                    <p>
                        The student name <b><?php echo e($data['student_name']); ?></b> has demonstrated good levels of English speaking, listening and writing through our internal English proficiency Interview as per policy.
                    </p>
                    <br>
                    <br>
                    <h5 style="text-align: center; text-decoration: underline;">C3S Business school Intensive English Interview (C3S-IEI):</h5>
                    <p>
                        Students who complete the C3S Business School Intensive English Interview will be considered as having satisfied English proficiency and no TOEFL or IELTS is necessary.
                    </p>
                    <p>
                        Please be aware that in all cases, admission to the C3S Business school is always conditional to clearing our in-house C3S-IEI before the start of the full-time program.
                    </p>
                    <p>
                        Therefore, student Name <b><?php echo e($data['student_name']); ?></b> , holding passport number <b><?php echo e($data['passport_number']); ?></b>, Nationality <b><?php echo e($data['nationality']); ?></b>, Birthdate <b><?php echo e($data['dob']); ?></b> has demonstrated proficiency in English by clearing the C3S- IEI. Candidates whose first language is English are normally exempt from this requirement anyway.
                    </p>
                </div>
            </div>
        </main>
    </body>
</html>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/visa_letters/eng_proficiency.blade.php ENDPATH**/ ?>