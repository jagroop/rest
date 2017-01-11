<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
      <style type="text/css" rel="stylesheet" media="all">
         /* Media Queries */
         @media  only screen and (max-width: 500px) {
         .button {
         width: 100% !important;
         }
         }
      </style>
   </head>
   <body style="margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;">
      <table width="100%" cellpadding="0" cellspacing="0">
         <tr>
            <td style="width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;" align="center">
               <table width="100%" cellpadding="0" cellspacing="0">
                  <!-- Logo -->
                  <tr>
                     <td style="padding: 25px 0; text-align: center;">
                        <a style="font-family: Arial, &#039;Helvetica Neue&#039;, Helvetica, sans-serif; font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;" href="http://localhost/dev/53/public" target="_blank">
                           <?php echo $config['name'] ?>
                        </a>
                     </td>
                  </tr>
                  <!-- Email Body -->
                  <tr>
                     <td style="width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;" width="100%">
                        <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0;" align="center" width="570" cellpadding="0" cellspacing="0">
                           <tr>
                              <td style="font-family: Arial, &#039;Helvetica Neue&#039;, Helvetica, sans-serif; padding: 35px;">
                                 <!-- Greeting -->
                                 <h1 style="margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;">
                                    Hello,
                                    <?php echo $user->name ?>
                                 </h1>
                                 <!-- Intro -->
                                 <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">We noticed that you need to verify your email address in order to complete the
                                    <?php echo $config['name'] ?> application registration. To do so, simply click on link below.
                                 </p>
                                 <!-- Action Button -->
                                 <table style="width: 100%; margin: 30px auto; padding: 0; text-align: center;" align="center" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                       <td align="center">
                                          <a href="#"
                                             style="font-family: Arial, &#039;Helvetica Neue&#039;, Helvetica, sans-serif; display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                                             background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                                             text-align: center; text-decoration: none; -webkit-text-size-adjust: none; background-color: #22BC66;"
                                             class="button"
                                             target="_blank">
                                          Confirm Your Email
                                          </a>
                                       </td>
                                    </tr>
                                 </table>
                                 <!-- Outro -->
                                 <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                    Once you verify it your registration will be completed with the
                                    <?php echo $config['name'] ?>
                                 </p>
                                 <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                    Thank you for using our application!
                                 </p>
                                 <!-- Salutation -->
                                 <p style="margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;">
                                    Regards,
                                    <br>
                                       <?php echo $config['name'] ?>
                                    </p>
                                    <!-- Sub Copy -->
                                    <table style="margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;">
                                       <tr>
                                          <td style="font-family: Arial, &#039;Helvetica Neue&#039;, Helvetica, sans-serif;">
                                             <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                             If you are having trouble clicking the "Confirm Your Email" button,
                                             copy and paste the URL below into your web browser:
                                          </p>
                                             <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                                <a style="color: #3869D4;" href="https://laravel.com" target="_blank">
                                             foo bar
                                             </a>
                                             </p>
                                          </td>
                                       </tr>
                                    </table>
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                     <!-- Footer -->
                     <tr>
                        <td>
                           <table style="width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;" align="center" width="570" cellpadding="0" cellspacing="0">
                              <tr>
                                 <td style="font-family: Arial, &#039;Helvetica Neue&#039;, Helvetica, sans-serif; color: #AEAEAE; padding: 35px; text-align: center;">
                                    <p style="margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;">
                                    &copy;
                                       <?php echo date('Y'); ?>
                                       <a style="color: #3869D4;" href="#" target="_blank">
                                          <?php echo $config['name'] ?>
                                       </a>.
                                    All rights reserved.

                                    </p>
                                 </td>
                              </tr>
                           </table>
                        </td>
                     </tr>
                  </table>
               </td>
            </tr>
         </table>
      </body>
   </html>