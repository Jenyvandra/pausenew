<?php

function fas_form_data_handle() {

    $age = $_POST['selectedAge'];
    $cycle = $_POST['selectedCycle'];
    $email = $_POST['email'];
    $sos1 = $_POST['sos1'];
    $sos2 = $_POST['sos2'];
    $sos3 = $_POST['sos3'];
    $sos4 = $_POST['sos4'];
    $sos5 = $_POST['sos5'];
    $sos6 = $_POST['sos6'];
    $sos7 = $_POST['sos7'];
    $sos8 = $_POST['sos8'];
    $sos9 = $_POST['sos9'];
    $sos10 = $_POST['sos10'];
    $sos11 = $_POST['sos11'];
    $sos12 = $_POST['sos12'];

    /* Score calculation */
    // total 48 points
    $physical_score = ($sos1 - 1) + ($sos2 - 1) + ($sos3 - 1) + ($sos4 - 1) + ($sos5 - 1) + ($sos6 - 1);
    $psycholo_score = ($sos7 - 1) + ($sos8 - 1) + ($sos9 - 1);
    $urogenit_score = ($sos10 - 1) + ($sos11 - 1) + ($sos12 - 1);

    $total_score = $physical_score + $psycholo_score + $urogenit_score;

    // Determine the answer based on the range
    if ($cycle == 1) {
        $ans_txt = 'My periods stopped due to surgery/medication';
        $answer = 'Based on your answer to the question above, It appears you have entered menopause, possibly due to surgery or medication. You may have gone through a lot already. At Pauseforward, our seasoned team, comprising menopause-specialist Obs/GYNs, nutritionists, mental health experts and yoga therapist provide personalized care holistically developed addressing the physical state of health and also state of mind. Thriving through menopause is possible with the right help. Act now for a healthier post-menopausal future.';
        $what_you_can_txt = '<tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="23px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/01.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Be regular with your medical check ups as advised by your treating doctor.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="28px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/02.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Regular exercise can help improve your mood and help tackle weight gain issues and also better quality sleep.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="29px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/03.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Getting enough rest can seem impossible if you’re dealing with insomnia. So try doing a relaxing activity right before bed like meditation, reading a book or a warm bath. </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>';
    } elseif ($cycle == 2) {
        $ans_txt = 'My periods stopped naturally and I have not had a period since last 12 months';
        $answer = 'Based on your answer to the question above, If it is been 12 months since your last period, you may have naturally reached menopause. A change in hormonal rhythm and transition to menopause can be tough. At Pauseforward, our seasoned team, comprising menopause-specialist Obs/GYNs, nutritionists, mental health experts and yoga therapist provide personalized care holistically developed addressing the physical state of health and also state of mind. Thriving through menopause is possible with the right help. Act now for a healthier post-menopausal future.';
        $what_you_can_txt = '<tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="23px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/01.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Be regular with your medical check ups as advised by your treating doctor.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="28px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/02.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Regular exercise can help improve your mood and help tackle weight gain issues and also better quality sleep.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="29px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/03.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Getting enough rest can seem impossible if you’re dealing with insomnia. So try doing a relaxing activity right before bed like meditation, reading a book or a warm bath. </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>';
    } elseif ($cycle == 3) {
        $ans_txt = 'I am regular or on the same schedule I have always been';
        $answer = 'Based on your answer to the question above, While it appears menopause may not be imminent for you, its onset generally falls between 45-55 years, subject to various factors. Recognizing signs like irregular periods is crucial. If experiencing symptoms such as hot flashes,fatigue or sleep disturbances, now is the opportune moment to take charge. At Pauseforward, our seasoned team, comprising menopause-specialist Obs/GYNs, nutritionists, mental health experts and yoga therapist provide personalized care holistically developed addressing the physical state of health and also state of mind. Thriving through menopause is possible with the right help. Act now for an easier menopause transition & a healthier post-menopausal future.';
        $what_you_can_txt = '<tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="23px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/01.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Be regular with your medical check ups as advised by your treating doctor.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="28px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/02.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Try to maintain idea body weight  and include some form of physical activity of at least  30 minutes every day.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="29px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/03.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Eat healthy & watch your nutritional needs closely. As you age, your risk for heart disease and osteoporosis increases, making dietary choices extra important. The best way to stay healthy is by eating a diet rich in fruits, whole grains, and vegetables. Limit your fat intake and get enough fibre every day. </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>';
    } else {
        $ans_txt = 'Lighter or heavier blood flow,shorter or longer cycles, entirely skipped cycles';
        $answer = 'Based on your answer to the question above, Menopause, usually occurs between 45-55 , can vary. Irregular periods signal perimenopause, with symptoms like hot flashes,fatigue and mood changes. At Pauseforward, our seasoned team, comprising menopause-specialist Obs/GYNs, nutritionists, mental health experts and yoga therapist provide personalized care holistically developed addressing the physical state of health and also state of mind. Thriving through menopause is possible with the right help. Act now for an easier menopause transition & a healthier post-menopausal future.';
        $what_you_can_txt = '<tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="23px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/01.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Be regular with your medical check ups as advised by your treating doctor.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="28px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/02.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Try to maintain idea body weight  and include some form of physical activity of at least  30 minutes every day.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 8px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:31px; vertical-align: top; line-height: 28px; padding-top: 7px; padding-right: 8px;"><img width="29px" height="19px" src="https://team2.devhostserver.com/pause/wp-content/uploads/2023/12/03.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Eat healthy & watch your nutritional needs closely. As you age, your risk for heart disease and osteoporosis increases, making dietary choices extra important. The best way to stay healthy is by eating a diet rich in fruits, whole grains, and vegetables. Limit your fat intake and get enough fibre every day. </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>';
    }

    global $wpdb;
    $results_data = $wpdb->insert($wpdb->prefix . 'fas_enquiry_data', array('email' => $email, 'age_bracket' => $age, 'menstruation_cycle' => $cycle, 'pq_1' => $sos1, 'pq_2' => $sos2, 'pq_3' => $sos3, 'pq_4' => $sos4, 'pq_5' => $sos5, 'pq_6' => $sos6, 'psq_7' => $sos7, 'psq_8' => $sos8, 'psq_9' => $sos9, 'uq_10' => $sos10, 'uq_11' => $sos11, 'uq_12' => $sos12, 'ps_score' => $physical_score, 'psy_score' => $psycholo_score, 'uro_score' => $urogenit_score, 'fas_score' => $total_score,));
    $lastid = $wpdb->insert_id;

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $email = $email;
    $subject = 'Your Menopause Assessment results are in';
    $name = strstr($email, '@', true);
//    if ($cycle == 1) {
//        $ans_txts = 'My periods stopped due to surgery/medication';
//        $reponse_body_msg = 'Based on your answer to the question above, it seems like you have reached menopause due to surgery and or medication. It makes sense for you to deal with the symptoms you are experiencing and do what you need to do to stay healthy for the post menopausal years ahead. You may be experiencing symptoms such as hot flashes, night sweats, sleep disturbances ,mood changes or any other. Be mimdful of your symptoms and reach out to the experts who can help you manage the physical and emotional changes that you may be going through and recommend treatment options accordingly. With the right help and support, thriving through menopause is possible.';
//    } elseif ($cycle == 2) {
//        $ans_txts = 'My periods stopped naturally and I have not had a period since last 12 months';
//        $reponse_body_msg = 'Based on your answer to the question above, While your periods may have stopped naturally and If it’s been 12 months since your last period, then you are likely to have reached menopause. You may be experiencing all or many symptoms of menopause such as hot flashes, night sweats, sleep disturbances, and mood changes or any other . The severity of the symptoms may change as you move forward in your menopause journey and some  symptoms may last longer than others.It is a good idea to  do what you need to do to get and stay healthy for the post-menopausal years ahead.';
//    } elseif ($cycle == 3) {
//        $ans_txts = 'I am regular or on the same schedule I have always been';
//        $reponse_body_msg = 'Based on your answer to the question above, Looks like you are not nearing menopause yet. In general, natural menopause occurs between 45 and 55 yrs of age but can vary depending on various factors like nutritional and environmental circumstances as well as genetic factors. Irregular periods is one of the most common signs of menopause. However keep a look out  for any other early symptoms of menopause like hot flashes, weight gain, sleep disturbances , there are of course many more. If you are  experiencing some  or any of  these symptoms,  NOW is the  right  time to take charge. Dealing with the challenges of menopause can be overwhelming. From weight gain to hot flashes and mood swings, it can affect your daily life. We provide effective menopause solutions to help you regain control. Our expert team at Pauseforward  consists of menopause-specialist Obs/GYNs, nutrition specialist ,  mental health experts, yoga therapist and many more to  support you with personalized care. It is a good idea to  do what you need to do NOW to get ahead and stay healthy for the post-menopausal years ahead.';
//    } else {
//        $ans_txts = 'Lighter or heavier blood flow,shorter or longer cycles, entirely skipped cycles';
//        $reponse_body_msg = 'Based on your answer to the question above, In general, natural menopause occurs between 45 and 55 yrs of age but can vary depending on various factors like nutritional and environmental circumstances as well as genetic factors. Irregular periods is one of the most common signs of menopause. Seems like you are in the peri menopause stage. In this stage you may be  experiencing  irregular and spaced periods that are often heavy. Skipping periods is normal during this phase and may continue until periods stop altogether. Some may experience symptoms of hot flashes, night sweats, sleep disturbances, and mood changes or any other. Perimenopause refers to the period of time before menopause takes place, but your body is beginning the transition. During perimenopause, your estrogen hormone dips and rises unevenly, which can cause mood swings, anxiety, and physical signs. Dealing with the challenges of menopause can be overwhelming. From weight gain to hot flashes and mood swings, it can affect your daily life. We provide effective menopause solutions to help you regain control.Connect with us at Pauseforward and consult with one of our menopause-specialist OB/GYNs. Because your situation is unique, a one-to-one conversation about your particular history, health risks, and current state of health is necessary. Post a  detailed discussion with a doctor who understands menopause , we can recommend a menopause transition plan especially designed to help  you thrive through menopause when it happens.Our expert team at Pauseforward  consists of menopause-specialist Obs/GYNs, nutrition specialist ,  mental health experts, yoga therapist and many more to  support you with personalized care. It is a good idea to  do what you need to do NOW to get ahead and stay healthy for the post-menopausal years ahead.';
//    }

    ob_start();
    ?>

    <!DOCTYPE html
        PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
          style="font-family: arial, 'helvetica neue', helvetica, sans-serif">

        <head>
            <meta charset="UTF-8" />
            <meta content="width=device-width, initial-scale=1" name="viewport" />
            <meta name="x-apple-disable-message-reformatting" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta content="telephone=no" name="format-detection" />
            <title>Pause Forward - Testing</title>
            <!--[if (mso 16)]>
                <style type="text/css">
                  a {
                    text-decoration: none;
                  }
                </style>
              <![endif]-->
            <!--[if gte mso 9
                ]><style>
                  sup {
                    font-size: 100% !important;
                  }
                </style><!
              [endif]-->
            <!--[if gte mso 9]>
                <xml>
                  <o:OfficeDocumentSettings>
                    <o:AllowPNG></o:AllowPNG>
                    <o:PixelsPerInch>96</o:PixelsPerInch>
                  </o:OfficeDocumentSettings>
                </xml>
              <![endif]-->
            <style>
                table, td, div, h1, p {
                    font-family: Arial, sans-serif;
                    vertical-align: top;
                }
                table {
                    border:none !important;
                    border-spacing:0 !important;
                }
                td {
                    border: 0 !important;
                }
                img {
                    margin: 0 !important;
                    padding: 0 !important;
                    font-size: 0 !important;
                    vertical-align: top !important;
                    line-height: normal !important;
                }
                #outlook a {
                    padding: 0;
                }
                .container {
                    width: 740px;
                    margin: 0 auto;
                }
                @media screen and (max-width:700px) {
                    .container {
                        width: 94% !important;
                    }
                    .mobile-full {
                        display: block !important;
                        width: 100% !important;
                        padding-left: 0 !important;
                        padding-right: 0 !important;
                    }
                    .mobile-paddding-bottom {
                        padding-bottom: 30px;
                    }
                    .knowledgewrap {
                        padding-left: 20px;
                        padding-right: 20px;
                    }
                    .footer-button {
                        text-align: center;
                    }
                }
            </style>
        </head>

        <body data-new-gr-c-s-loaded="14.1098.0" style=" width: 100%; font-family: Arial, sans-serif; word-spacing:normal; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; padding: 0; margin: 0; background-color:#ffffff;">
            <div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#ffffff;">

                <table cellpadding="0" cellspacing="0" role="presentation" style="width:100%;border:none;border-spacing:0; background-color:#ffffff; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                    <!-- Logo -->
                    <tr>
                        <td style="padding-top: 15px; padding-bottom: 15px; text-align: center;">
                            <a href="<?php echo site_url(); ?>"><img src="<?= home_url(); ?>/wp-content/uploads/2023/12/logo.jpg" alt=""></a>
                        </td>
                    </tr>
                    <!-- Section One -->
                    <tr>
                        <td align="center" style="padding:0; background-color: #FBF2EF;">
                            <table cellpadding="0" cellspacing="0" class="container" style="width: 740px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                <tr>
                                    <td class="mobile-full" style="padding-top: 60px; padding-bottom: 60px; padding-right: 60px; vertical-align: middle;">
                                        <table cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="font-size: 24px; font-style: normal; color: #15587A; font-weight: bold;">Hello, <?= $name; ?>.</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14px; line-height: 18px; text-align: justify; font-style: normal; color: #15587A; padding-top: 15px; padding-bottom: 20px;">Thank you for taking out time to take the menopause assessment survey. The primary aim of this survey is to help you understand where you are in the menopause journey and how you can be best supported. Based on your answers to the questions in the menopause assessment survey, <span style="color: #F67053; font-weight: bold;">your score is <?= $total_score; ?>/48.</span> Please note that this score is a combination of the physical, psychological and urogenital symptoms that you may be experiencing.</td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 14px; line-height: 18px; text-align: justify; font-style: italic; color: #15587A;">Please consult a doctor immediately if you are experiencing very severe or uncontrolled symptoms that may need urgent attention and medical treatment.</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="mobile-full mobile-paddding-bottom" style="vertical-align: middle;">
                                        <img src="<?= home_url(); ?>/wp-content/uploads/2023/12/image-one.png" alt="">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Section Two -->
                    <tr>
                        <td align="center" style="padding:0; padding-top: 50px;">
                            <table class="container" cellpadding="0" cellspacing="0" style="width: 740px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                <tr>
                                    <td colspan="2" style="font-size: 20px; font-style: normal; color: #15587A; font-weight: bold; padding-bottom: 20px;">A score of</td>
                                </tr>
                                <tr>
                                    <td style="width:18px; padding-top: 5px; padding-bottom: 5px; padding-right: 8px; text-align: left; line-height: 28px;"><img width="18px" height="21px" src="https://team4.devhostserver.com/pause-forward/list-icon.png" alt=""></td>
                                    <td style="color: #7C919B; font-size: 16px; padding-bottom: 8px; line-height: 28px;"><span style="color: #F67053;">0-12</span> indicates that you are experiencing some very mild symptoms of menopause</td>
                                </tr>
                                <tr>
                                    <td style="width:18px; padding-top: 5px; padding-bottom: 5px; line-height: 28px;"><img width="18px" height="21px" src="https://team4.devhostserver.com/pause-forward/list-icon.png" alt=""></td>
                                    <td style="color: #7C919B; font-size: 16px; padding-bottom: 5px; line-height: 28px;"><span style="color: #F67053;">12-24</span> Indicates that you are experiencing mild to moderate symptoms of menopause</td>
                                </tr>
                                <tr>
                                    <td style="width:18px; padding-top: 5px; padding-bottom: 5px; line-height: 28px;"><img width="18px" height="21px" src="https://team4.devhostserver.com/pause-forward/list-icon.png" alt=""></td>
                                    <td style="color: #7C919B; font-size: 16px; padding-bottom: 5px; line-height: 28px;"><span style="color: #F67053;">24-36</span> Indicates that you are experiencing moderate to severe symptoms of menopause</td>
                                </tr>
                                <tr>
                                    <td style="width:18px; padding-top: 5px; padding-bottom: 5px; line-height: 28px;"><img width="18px" height="21px" src="https://team4.devhostserver.com/pause-forward/list-icon.png" alt=""></td>
                                    <td style="color: #7C919B; font-size: 16px; padding-bottom: 5px; line-height: 28px;"><span style="color: #F67053;">36-48</span> Indicates that you are experiencing severe to Very severe symptoms of menopause</td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td style="width:18px; padding-top: 5px; padding-bottom: 5px; line-height: 28px;"><img width="18px" height="21px" src="https://team4.devhostserver.com/pause-forward/list-icon.png" alt=""></td>
                                    <td style="color: #7C919B; font-size: 16px; padding-bottom: 5px; line-height: 28px;">Which of the following best describes your menstruation cycle?</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="color: #7C919B; font-size: 16px; padding-bottom: 15px;">If Answer : <?= $ans_txt; ?></td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:0;">
                            <table class="container" cellpadding="0" cellspacing="0" style="width: 740px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                <tr>
                                    <td class="mobile-full">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="padding-bottom: 5px; text-align: justify; color: #7C919B; font-size: 16px; line-height: 26px;"><?= $answer; ?> </td>
                                            </tr>
                                            <tr>
                                                <td style="color: #F67053; font-weight: bold; font-size: 24px; padding-top: 5px;">
                                                    Remember You are not alone
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="mobile-full" style="vertical-align: bottom;"><img src="<?= home_url(); ?>/wp-content/uploads/2023/12/image-three.jpg" alt=""></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:0;">
                            <table class="container" cellpadding="0" cellspacing="0" style="width: 740px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                <!-- Knowledge -->
                                <tr>
                                    <td style="font-size: 20px; line-height: 32px; font-style: normal; color: #15587A; font-weight: bold; padding-top: 25px; padding-bottom: 20px;">Knowledge is power. Be informed about the many possible symptoms so you are better prepared.</td>
                                </tr>
                                <tr>
                                    <td class="knowledgewrap" style="background: #EEF7FC; padding-top: 25px; padding-bottom: 25px;">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td class="mobile-full mobile-paddding-bottom" style="width: 194px; padding-left: 25px;"><img src="<?= home_url(); ?>/wp-content/uploads/2023/12/dr-image.png" alt=""></td>
                                                <td class="mobile-full" style="padding-left: 45px; padding-right: 25px;">
                                                    <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                                        <tr>
                                                            <td style="color: #15587A; font-size: 18px;">Listen to our knowledge expert</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color: #F67053; font-size: 20px; font-weight: bold; padding-top: 10px;">Dr. Shradha Chaudhari</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="color: #15587A; font-size: 18px; font-weight: bold; line-height: 28px; padding-top: 10px; padding-bottom: 10px; word-wrap: break-word;">
                                                                MBBS, MD<br />
                                                                Senior Consultant Obstetrics & Gynaecology<br />
                                                                Knowledge Expert & Advisor
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="<?= home_url(); ?>/videos/dr-shradha-chuadhary-understanding-menopause/"><img src="<?= home_url(); ?>/wp-content/uploads/2023/12/play-video.png" alt=""></a></td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <!-- FAQ -->
                                <tr>
                                    <td style="font-size: 20px; line-height: 32px; font-style: normal; color: #15587A; font-weight: bold; padding-top: 40px; padding-bottom: 8px;">What is Perimenopause?</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:18px; vertical-align: top; padding-top: 6px; padding-right: 8px; line-height: 28px;"><img width="18px" height="21px" src="<?= home_url(); ?>/wp-content/uploads/2023/12/list-icon.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">The gradual transition between the reproductive years and menopause (the cessation of menstrual periods) is called perimenopause (literally meaning "around menopause"). It is generally a transition that is many years long and can be associated with shorter menstrual intervals, irregular menses, night sweats, and other symptoms.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td style="font-size: 20px; line-height: 32px; font-style: normal; color: #15587A; font-weight: bold; padding-top: 8px; padding-bottom: 8px;">What are the changes experienced in transition to menopause ?</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:18px; vertical-align: top; padding-top: 6px; padding-right: 8px; line-height: 28px;"><img width="18px" height="21px" src="<?= home_url(); ?>/wp-content/uploads/2023/12/list-icon.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Each woman's menopause experience is different. Many women who undergo natural menopause report no physical changes at all during the perimenopausal years except irregular menstrual periods that eventually stop when they reach menopause. Other changes may include hot flashes, difficulty sleeping, memory problems, mood disturbances, vaginal dryness, and weight gain. Maintaining a healthy lifestyle during this time of transition is essential for your long term health.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td style="font-size: 20px; line-height: 32px; font-style: normal; color: #15587A; font-weight: bold; padding-top: 8px; padding-bottom: 8px;">When can a woman expect these changes to happen?</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:18px; vertical-align: top; padding-top: 6px; padding-right: 8px; line-height: 28px;"><img width="18px" height="21px" src="<?= home_url(); ?>/wp-content/uploads/2023/12/list-icon.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Women are usually in their mid 40s or early 50s when the menopause transition starts. However, an earlier menopause can be the result of surgery, cancer treatment, or family genetics.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <!-- What you can do -->
                                <tr>
                                    <td style="font-size: 20px; line-height: 32px; font-style: normal; color: #15587A; font-weight: bold; padding-top: 20px; padding-bottom: 0px;">What you can do</td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
    <?php echo $what_you_can_txt; ?>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                    <td style="font-size: 20px; line-height: 32px; font-style: normal; color: #15587A; font-weight: bold; padding-top: 10px; padding-bottom: 8px;">Menopause symptoms are very real and can be managed.<br>Be informed and stay observant.</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td style="width:18px; vertical-align: top; line-height: 28px; padding-top: 6px; padding-right: 8px;"><img width="18px" height="21px" src="<?= home_url(); ?>/wp-content/uploads/2023/12/list-icon.png" alt=""></td>
                                                <td style="color: #7C919B; font-size: 16px; line-height: 28px; text-align: justify;">Developed with leading experts in women's health , Pauseforward collaborates with accomplished healthcare professionals to better understand your unique state of health, symptoms, individual needs, on the basis of which a holistic care plan is developed that addresses not only the physical state of health but also the state of mind, delivered through medical assessment and comprehensive treatment advice, empathetic counselling, nutritional therapy , lifestyle modifications, restorative yoga and much more.</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr><td style="height: 50px;">&nbsp;</td></tr>
                    <tr>
                        <td align="center" style="background-color: #15587A; padding: 0; text-align: center;">
                            <table class="container" cellpadding="0" cellspacing="0" style="width: 740px; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                <tr>
                                    <td align="center" style="padding-top: 15px; padding-bottom: 15px;"><a href="<?php echo site_url(); ?>"><img src="<?= home_url(); ?>/wp-content/uploads/2023/12/footer-logo.png" alt=""></a></td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-size: 24px; text-align: center; color: #ffffff; padding-top: 10px; padding-bottom: 20px;">Thriving through Menopause is possible</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td class="mobile-full footer-button"><a href="<?= home_url(); ?>/doctors/"><img src="<?= home_url(); ?>/wp-content/uploads/2023/12/Frame-50-1.png" alt=""></a></td>
                                                <td class="mobile-full" style="width: 30px;">&nbsp;</td>
                                                <td class="mobile-full footer-button"><a href="<?= home_url(); ?>/programs/"><img src="<?= home_url(); ?>/wp-content/uploads/2023/12/Frame-1107-1.png" alt=""></a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-size: 14px; color: #ffffff; text-align: center; padding-top: 25px; padding-bottom: 15px;">To know more about how we can help you</td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-size: 16px; text-align: center; color: #F67053;"><a style="color: #F67053; text-decoration: none;" href="mailto:contact@pauseforward.in">contact@pauseforward.in</a></td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-size: 14px; text-align: center; color: #ffffff; padding-top: 20px; padding-bottom: 10px;">Follow us on</td>
                                </tr>
                                <tr>
                                    <td align="center">
                                        <table cellpadding="0" cellspacing="0" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-collapse: collapse; border-spacing: 0px;">
                                            <tr>
                                                <td><a href="https://www.facebook.com/Pauseforward-102872662048067"><img width="32px" height="33px" src="<?= home_url(); ?>/wp-content/uploads/2023/12/facebook-icon.png" alt=""></a></td>
                                                <td>&nbsp; &nbsp;</td>
                                                <td><a href="https://www.instagram.com/pauseforward/"><img width="32px" height="33px" src="<?= home_url(); ?>/wp-content/uploads/2023/12/insta-icon.png" alt=""></a></td>
                                                <td>&nbsp; &nbsp;</td>
                                                <td><a href="https://www.youtube.com/channel/UChN9g8BnPJKu3xS35QvVvYQ"><img width="32px" height="33px" src="<?= home_url(); ?>/wp-content/uploads/2023/12/youtube-icon.png" alt=""></a></td>
                                                <td>&nbsp; &nbsp;</td>
                                                <td><a href="https://twitter.com/RGPAUSEFORWARD"><img width="32px" height="33px" src="<?= home_url(); ?>/wp-content/uploads/2023/12/twitter-icon.png" alt=""></a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" style="font-size: 16px; text-align: center; color: #F67053; padding-top: 20px; padding-bottom: 25px;">
                                        <a style="color: #F67053; text-decoration: none;" href="https://www.pauseforward.in/" target="_blank">www.pauseforward.in</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </body>
    </html>


    <?php
    $message = ob_get_clean();

    wp_mail($email, $subject, $message, $headers);

//	 var_dump($results_data);
//	 exit();

    if ($results_data) {
        $results = array('maqid' => $lastid, 'msg' => 'success');
    } else {
        $results = 'FAS Data was not inserted into records';
    }

    echo json_encode($results);

    die();
}
