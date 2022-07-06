	<?php

$name= $_POST['name'];
$subject = $_POST['subject'];
$email= $_POST['email'];
$message= $_POST['message'];

// configure
$from = 'Enquiry <info@sachinenterprise.in>';
$sendTo = 'Enquiry <maheshniwate10@gmail.com>';
$subject = 'Career Form from Website';
$fields = array('name' => 'name', 'subject' => 'subject', 'message' => 'message', 'email' => 'email'); // array variable name => Text to appear in email
$okMessage = 'thank you! We will respond to you as early as possible. For Quick Confirmation, Call us on 7264889986 and take instant appointment on Call.';
$errorMessage = 'There was an error while submitting the form. Please try again later';

// let's do the sending

try
{
    $emailText = "You have new message from contact form\n=============================\n";

    foreach ($_POST as $key => $value) {

        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    mail($sendTo, $subject, $emailText, "From: " . $from);

    $responseArray = array('type' => 'success', 'message' => $okMessage);
}
catch (\Exception $e)
{
    $responseArray = array('type' => 'danger', 'message' => $errorMessage);
}

if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);
    
    header('Content-Type: application/json');
    
    echo $encoded;
}
else {
    echo $responseArray['message'];
}
?>



<script>
            $(function (e) {
                $('#enquiryForm').validate({
                    rules: {
                        visitorName:{
                            required: true,
                        },
                        visitorEmail:{
                            required: true,
                            email: true,
                        },
                        visitorPhone:{
                            required: true,
                            maxlength: 10,
                            number: true,
                            minlength: 10,
                        },
                        visitorBranch:{
                            required: true,
                        },
                        visitorDate:{
                            required: true,
                        },
                        visitorMsg:{
                            required: true,
                        }
                    },
                    messages: {
                        visitorName:{
                            required: "Please Enter Name",
                        },
                        visitorEmail:{
                            required: "Please Enter Email Id",
                            email: "Please Enter Valid Email Id",
                        },
                        visitorPhone:{
                            required: "Please Enter Contact Number",
                            maxlength: "Please Enter Atmost 10 Digits",
                            number: "Please Enter Only Numbers",
                            minlength: "Please Enter Only 10 Digits",
                        },
                        visitorBranch:{
                            required: "Please Enter Branch",
                        },
                        visitorDate:{
                            required: "Please Enter Appointment Date",
                        },
                        visitorMsg:{
                            required: "Please Enter your Message",
                        }
                    },
                    submitHandler: function (form) {
                      var formData = $('#enquiryForm').serialize();
                      $.ajax({
                        url: 'https://www.mokashidentalclinic.com/contact-us.php',
                        method:'POST',
                        dataType:'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },    
                        data:formData,
                        success:function(data){
                            swal({
                              type:"success",
                              title:"Success",
                              text:"Thank You. We will respond you as early as possible.",
                              closeModal:false,
                              button:"Ok",
                            },function(){
                              window.location.href="https://www.mokashidentalclinic.com/thank-you.php";
                            })
                        },error:function(error){
                         
                        }
                      })    
                  }
                });
              });
        </script>
        <!-- <script src="assets/js/main.js"></script> -->
        <Script>

    $(document).ready(function() {

        // Handler for .ready() called.

        window.setTimeout(function() {

            location.href = "index.php";

        }, 5000);

    });

    </Script>
