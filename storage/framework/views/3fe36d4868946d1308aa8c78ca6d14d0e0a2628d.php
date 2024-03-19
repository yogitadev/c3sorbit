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
                top: 0cm;
                left: 1cm;
                right: 1cm;
                height: auto;
            }
            
            footer {
                position: fixed; 
                bottom: 1cm; 
                left: 1cm; 
                right: 1cm;
                height: 2cm;
                text-align: center;
                line-height: 20px;
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
                    <td style="text-align: right;"><img src="<?php echo $scan?>" alt="scan" width="50" height="50" style=""></td>
                </tr>
                <tr>
                    <td style=" text-align: right; ">
                        <b style="color: blue; ">CASTELLDEFELS SCHOOL OF SOCIAL SCIENCES</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <hr style="color:blue;"> 
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td style="text-align: right; ">
                        <b><?php echo e($data['date']); ?></b>
                    </td>
                </tr>
            </table>
        </header>
        <footer>
            <hr style="color:blue;">
            <span style="text-align: center;">
                <b>Dirección:</b>C / Castanyer 41, 08860 Castelldefels, Barcelona, Spain.
            </span><br>
            <span style="text-align: center;">
                <b>Teléfono:</b>+34 931168821, +34 930186306.<b>Correo electrónico:</b>info@csss.es
            </span><br>
            <span style="text-align: center;">
                <b style="font-size: 7pt;">COLREFNO: 12212023:125429:23</b> | By scanning QR Code, this offer letter of can be viewed on edfyedops.com
            </span><br>
        </footer>
        <main>
            <h3 style="text-align: center;">CONDITIONAL OFFER LETTER</h3>
            <div style="text-align: center;">
                <span style="">
                    Not Valid for VISA purpose
                </span><br>
                <span>
                    Please read this letter carefully and keep it for future reference.
                </span>
            </div>
        
            <br>
            <div>
                <span>
                    <b>Reference Number:</b> <?php echo e($data['reference_number']); ?>

                </span><br>
                <span>
                    <b>DOB:</b> <?php echo e($data['dob']); ?>

                </span>
            </div>
           
            <p>Dear <?php echo e($data['student_name']); ?></p>

            <p>I am pleased to inform you that, after careful consideration of your application and supporting documentation, the college is prepared to admit you for the course detailed below.</p>
            
            <p>Please make sure that, when you come for registration, you bring with you all the supporting documentation related to sponsorship, your original academic certificates and two passport sized photographs.</p>
            
            <b>
                Main Course Information:
            </b>
            <table style="border: 1px solid black; border-spacing: 3px;">
                <tbody style="margin: 5px;">
                    <tr>
                        <td>Course Title</td>
                        <td class='tdpadding'>: <?php echo e($data['course_title']); ?></td>
                    </tr>
                    <tr>
                        <td>Campus</td>
                        <td class='tdpadding'>: <?php echo e($data['campus_name']); ?></td>
                    </tr>
                    <tr>
                        <td>Course Start Date</td>
                        <td class='tdpadding'>: <?php echo e($data['course_start_date']); ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td class='tdpadding'>: Fulltime</td>
                    </tr>
                    <tr>
                        <td>Full Period Of Study</td>
                        <td class='tdpadding'>: <?php echo e($data['period_of_study']); ?> Months</td>
                    </tr>
                    <tr>
                        <td>Registration Fees</td>
                        <td class='tdpadding'>: &#8364;300</td>
                    </tr>
                    <tr>
                        <td>Total Tuition Fees</td>
                        <td class='tdpadding'>: &#8364;<?php echo e($data['tution_fee']); ?></td>
                    </tr>
                    <tr>
                        <td>First Instalment</td>
                        <td class='tdpadding'>: &#8364;<?php echo e($data['first_installment']); ?> + &#8364;300</td>
                    </tr>
                </tbody>
            </table>
        
            <b>Please notice that the signed student contract is mandatory to confirm the place of offer. Please make the payment of &#8364;<?php echo e($data['total']); ?> to &quot;Castelldefels School of Social Sciences&quot;. Payment made on behalf of Registration fees is (i.e. &#8364;300) non refundable.</b>
        
            <p style="font-style: italic;">This Offer is Provisional-It is not confirmed yet. Please read below for instruction on how you can accept this offer and confirm your place. If you do not meet the Eligible Criteria, we may offer the place to another Applicant.</p>
        
            <?php if(count($data['condition']) > 0): ?>
                <p>
                    <b>Conditions to be fulfilled</b>
                </p>
                <ul>
                    <?php $__currentLoopData = $data['condition']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <li><?php echo e($item); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>
            <br>
            <p style="page-break-after: always;"></p>
            <p>
                <b>How to pay the fee</b>
            </p>
            <span>You can make an International transaction to the School</span><br>
            <span>
                <b>Account Title: </b><?php echo e($data['account_title']); ?>

            </span>

            <table>
                <tr>
                    <td>Bank Name</td>
                    <td class='tdpadding'>: <?php echo e($data['bank_name']); ?></td>
                </tr>
                <tr>
                    <td>Bank Address</td>
                    <td class='tdpadding'>: <?php echo e($data['bank_address']); ?></td>
                </tr>
                <tr>
                    <td>IBAN</td>
                    <td class='tdpadding'>: <?php echo e($data['iban']); ?></td>
                </tr>
                <tr>
                    <td>SWIFT / BIC</td>
                    <td class='tdpadding'>: <?php echo e($data['bic']); ?></td>
                </tr>
            </table>

            
            <p><b>Acknowledgement of acceptance:</b></p>
            
            <p>Castelldefels School of Social Sciences will acknowledge receipt of your acceptance form within 14 days of reception. If you do not receive an acknowledgement within this period, please contact us immediately.</p>
            
            <p>The college can advise and help you to find a temporary or permanent accommodation, and we can also meet you on your arrival at any time at Barcelona "El Prat" Airport. You should inform us at least two weeks in advance of your arrival if you require either of these services.<br> Living expenses (without accommodation) are approximately &#8364;300 per month. This figure may vary according to your preference and life style. It is given only as a guide.</p>
           
            <p >Please note that if your knowledge of English is not good enough to pursue your studies, you will be required to follow an intensive English language course in our college. This course will be provided for an additional fee. In case of refund , &#8364;200 (Administrative Charges) apart from application fees &#8364;300 will be deducted from the paid Tuition Fees and additionally &#8364;100 will be deducted if the courier has been sent more than once .</p>
           
            <p >Once your registration process is completed, the college will issue with the following documents that you will need for the Visa Application: Certificate of Admission for VISA Purpose, a letter of Estimation of Expenses, Payments statement and Academic Guide. Please note that these documents will be in Spanish as it is a requirement from the Spanish Authority for the Visa Application.</p>
           
            <p>We look forward to hearing from you in the near future.</p>
           
            <p>
                <?php
                    $path = 'themes/admin/images/C3Ssignature.jpg';
                    $base64 = 'data:image/' .  pathinfo($path, PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents($path));
                ?>
                <img src="<?php echo $base64?>" width="95" height="88"/>
            </p>
            <span>Admission Management</span><br>
            <span>CSSS (Castelldefels School of Social Sciences), Barcelona Spain</span>
        </main>
    </body>
</html>
<?php /**PATH /home/hp/projects/edfyed/resources/views/admin/letter/conditional_letters/col(css).blade.php ENDPATH**/ ?>