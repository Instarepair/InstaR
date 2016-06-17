<?php 
include('db.php');
include('functions.php');
// submitting all the values from the user ebtry of buy back 
if(isset($_POST['submit_entire_form']))
{
$brandname=$_POST['brandname'];
$modelname=$_POST['modelname'];
$switchon=$_POST['switchon'];
$shownprice=$_POST['shownprice'];
$customername=$_POST['customername'];
$customeremail=$_POST['customeremail'];
$customerphone=$_POST['customerphone'];
$customerpickup=$_POST['customerpickup'];
$allaccessories_id=$_POST['allaccessories_id'];

if(!empty($_POST['functional'])) {
    foreach($_POST['functional'] as $functional) {
      $functionalval.=','.$functional;

    }
  }

  if(!empty($_POST['accessories'])) {
    foreach($_POST['accessories'] as $accessories) {
      $accessoriesval.=','.$accessories;

    }
  }



  if(!empty($_POST['overall'])) {
    foreach($_POST['overall'] as $overall) {
      $overallval.=$overall;

    }
  }


$cmd="insert into buybackuser(devicetype,model,brand,devicestatus,functional,accessories,deviceage,overallcondition,customer,address,phone,timings,email,shownprice) values('$devicetype','$modelname','$brandname','$devicestatus','$functionalval','$accessoriesval','$deviceage','$overallval','$customername','$customerpickup','$customerphone','$timings','$customeremail','$shownprice')";
$result=mysql_query($cmd);
$showsuccess=1;



}


if(isset($_POST['submit_buyback']))
{

 
$brandname=$_POST['brandname'];
$modelname=$_POST['modelname'];
$switchon=$_POST['switchon'];
$allaccessories_id=$_POST['allaccessories_id'];

$deviceage=$_POST['age'];


if(!empty($_POST['functional'])) {
    foreach($_POST['functional'] as $functional) {
      $functionalval.=','.$functional;

    }
  }

// now calculate the price over here ==========


// first calculate the cost of this model+brands 
$costing=calulate_device_cost($brandname,$modelname);
        // =========== apply the depreciation value formaula here ====


get_depreciation_value($deviceage,$costing);
}





        if(isset($_POST['submitorder']))
        {



  $brand='Off';
    $model='Off';
    $devicetype=$_GET['devicetype2'];
  $phone2=$_POST['phone2'];
    $pickupaddress=$_POST['pickupaddress2'];
      $freedate=$_POST['freedate2'];
        $freetime=$_POST['freetime2'];
          $name2=$_POST['name2'];
            $email2=$_POST['email2'];
        $trans_id=get_order_id();

$cmd="insert into transaction(sl,trans_id,customer,email,phonenumber,pickupaddress,pickuptime,pickupdate,brand,model,devicetype) values 
('','$trans_id','$name2','$email2','$phone2','$pickupaddress2','$freetime2','$freedate2','$brand','$model','$devicetype2')";

echo $cmd;
$result=mysql_query($cmd);

        }

?>

<html>
<head>
<title></title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

  <link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body >


<!-- -======== modal class for price calculator ========================= -->



<!-- =========================== for requesting a callback ================================================================= -->


<div class="modal fade" id="showpricecalculated" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>            
            </div>
            <div class="modal-body">
          
<!-- ==== the body part is here ===== -->
<center>
<strong>YOUR DEVICE ESTIMATED COST :</strong>
<br><br>
<span id='oldhandcost' style='     color: #A09C9C;
    font-family: calibri;
    font-size: 57px;'></span>
<br><br>
<button  class='submit2'  type="button" class="close" data-dismiss="modal" onclick="document.getElementById('formshow1').style.display='none';
document.getElementById('showpricecalculated').style.display='none';
document.getElementById('formshow2').style.display='block';" >SUBMIT</button> 
     <button class='submit1' type="button" class="close" data-dismiss="modal" onclick=''>CANCEL</button>

</center>
<!-- -==== the body part ends here ======= -->





            </div>
          </div>
        </div>
      </div>
      <!-- //mobile -->



<?php 

include('header1.php');

?>
<!-- =============== header ends here -=================== -->
      <center>
<div class='container' style='margin-top:12vw;border:1px groove #f4b912;padding: 0px; margin-bottom: 221px;max-width:1000px'>


<div class="sell_gadget_title_bar">
<span style='float:left'> ABOUT US  </span><strong style='    font-weight: bold;
    font-style: italic;
    text-transform: uppercase;'> Passion for excellence</strong>
</div>


<div class='row' >
<div class="col-md-12 col-sm-12 col-xs-12" style='      padding: 4%;
font-family:calibri;
    font-size: 20px;
    text-align: left;'>

<strong>Terms </strong><br>


Please read the following terms and conditions of use carefully before using this <br>
<strong class='orange_font'>website http://www.instarepair.in/</strong>

This website (hereafter this “Website”) is made available by Instarepair Solutions Private Limited, a company incorporated in India under Companies Act, 2013. This Website is offered to you (hereafter the “User”), conditioned on your acceptance of these Terms and Conditions of Use. The Terms and Conditions of Use will be deemed to constitute a legally binding contract between the User and Instarepair. If you do not accept these Terms and Conditions of Use, please exit this Website.<br>
<br>
<strong class='orange_font'>You should read the terms and conditions carefully as they contain: </strong>
</br>
Important information and instructions such as how long it lasts, fees for early termination, our rights to change its conditions, limitations of liability, privacy, and settlement of disputes by arbitration instead of in court. If you accept this agreement, it will apply to all your service plans from us, including all your existing plans. Your acceptance of these terms & conditions will be implied by the use of the instarepair.in service.<br><br>
<strong class='underline_font'  >GENERAL</strong><br>
<strong class='orange_font'>Use of this website</strong><br>
<i>
The Website has been prepared and compiled by Instarepair in good faith and solely for the purpose of performing repair services.</i><br>
Instarepair authorizes the User to view the content available on the Website. The User is not permitted to copy, replicate, modify, distribute, display, perform, create derivative works from, transfer or sell any information obtained from this Website, whether in printed, visual or electronic form, for any purpose whatsoever, without the prior written permission, at the sole discretion of Instarepair. As a condition of User’s use of this Website, User warrants that he/she will not use this Website for any purpose that is unlawful, prohibited or not expressly permitted by these Terms and Conditions of Use. While accessing and viewing the contents of the Website, the User agrees to comply with all copyright laws existing worldwide and to prevent any unauthorized copying of any of the content available on the Website.<br>
User agrees that any unauthorized or unlawful use of this Website, or any contents thereof, would result in irreparable injury to Instarepair and/or its affiliates for which monetary damages would be inadequate, and in such event Instarepair and/or its affiliates, as the case may be, shall have the right, in addition to other remedies available at law and in equity, to immediate injunctive relief against the User and/or criminal prosecution. Nothing contained in these Terms and Conditions of Use shall be construed to limit remedies available pursuant to statutory or other claims that Instarepair and/or its affiliates may have under separate legal authority.
<br>
These Terms of Use govern all plans available through the Instarepair Website, phone number mentioned on the Instarepair.in Website and any use of the Instareapir.in Portal. In the event of any conflict these Terms of Use control any valid Plan Order form that you submit requesting Services ("Plan Order").
Intellectual property
All contents of this Website are copyrighted by Instarepair Private Limited and/or its subsidiaries, affiliates, unless otherwise noted/indicated. The Website features logos, brand identities and other trademarks, service marks, trade names, slogans, logos, and other indicia of origin (“Marks”) that are the registered trademarks of Instarepair. Nothing contained on this Website should be construed as granting, by implication, estoppels or otherwise, any license or right to use any Mark displayed on this Website without prior written permission (at the sole discretion) of Instarepair or any such third party that may own the Mark, displayed on the Website.
<br><br>
<strong class='underline_font'  >
Privacy

</strong><br><br>
User’s registration data and other information about the User collected through the use of this Website is subject to Instarepair’s Personal Information Policy. User acknowledges that through his/her use of this Website, User consents to the collection and use (as set forth in the Privacy Policy) of his/her information, including the transfer of his/her information to governmental authorities for storage, processing and use by Instarepair and/or its affiliates.

<strong class='underline_font'  >Orders</strong>
The acceptance and processing of any request for the services placed by the User will be at the sole discretion of Instarepair and the User shall have no claim and shall not be entitled to raise any dispute with Instarepair or its affiliates in case of its/their refusal to accept any request(s) for services placed by the User through the Website or phone call.
Instarepair may carry out such checks as it deems appropriate prior to accepting any service request(s) placed by the User on the Website for security or other reasons and accordingly Instarepair reserves the right to reject any request(s).
User will be required to enter a valid name and phone number while placing a request for services available on the Website. By registering his/her phone number on the Website, the User consents to be contacted via phone calls and/or SMS notifications, in case of any order or shipment or pickup or delivery related confirmation, including verification of pickup and delivery address. In the event the User cannot be contacted after the initial attempt, Instarepair reserves the right to cancel/delay the order placed by the User. Instarepair will use its best efforts to deliver the products pursuant to any order(s) placed by the User within the time period applicable to such order(s). Notwithstanding anything contained, Instarepair shall not be held liable for, and the User shall have no claim against Instarepair whether in law or equity, for any delay in delivery of the products so bailed.
Services once delivered, unless found dysfunctional, will not be taken back by INSTAREPAIR. INSTAREPAIR’s only liability towards the User in respect of orders placed through the Website will be for replacement of any defective products or unsatisfactory service, or services for which user was billed for, after INSTAREPAIR has verified the User’s claim to its satisfaction.
In the event that the User refuses any service and wishes back delivery, after the initial pickup and technical verification of the product by JLN, pursuant to the order placed by the User through the Website, the User shall nonetheless be liable for payment of service charges associated with such products and INSTAREPAIR or its affiliates or third party carrier shall have the right to recover such service charges from the User.
Processing of payments for orders purchased through the Website is facilitated by a third party payment gateway. INSTAREPAIR shall have no responsibility or liability for any payment related dispute or claims for refund and the User should directly contact the third party payment gateway and/or the bank for any issues related to payment for products purchased through the Website. INSTAREPAIR does not have to access to or store any information provided by the User whilst making payments for any products using the third party payment gateway. The collection and usage of such information will be governed by the policies of the payment gateway provider.

<br><br>
<strong class='underline_font'  >
Use and Disclosure</strong><br><br>
The User by registering his/her Personal Information (as defined in the Privacy Policy) on the Website, also consents to be contacted via telephone, e-mail, letter and/or SMS notifications, whereby Instarepair would provide information to the User from time to time about promotional offers, news relating to new products as also for future sales of the products of Instarepair under various schemes and offers or otherwise, and for any other purpose specified. By providing us with your Personal Information you consent to being contacted by these methods for these purposes.

<br><br>
<strong class='underline_font'  >
FAIR USAGE POLICY; SUSPENSION OR TERMINATION OF SUBSCRIPTION:</strong><br><br>
Though Instarepair has no limits on the amount of online support requests a Subscription based plan user may make during the subscription period, however, each Subscriber's use of the support services for the subscription based plans are subject to Instarepair's "fair use" policy. Under this policy, if at any time, in Instarepair sole discretion, a subscription based plan user is found to be abusing the service by exceeding the level of use reasonably expected from someone using a Subscription based Plan for individual use, then Instarepair reserves the right to suspend or terminate Subscriber's Subscription Services. In addition, Instarepair reserves the right to suspend or terminate any Subscription Services of any Subscriber that Instarepair in its sole discretion, determines are being used (a) fraudulently, (b) by any person other than Subscriber, or (c) for any computer system other than a Registered System. User may terminate the Service at any time by giving written or electronic notice to Instarepair; provided, however, that User will not be entitled to a refund of any fees prepaid by User for the Service.

<br><br>
<strong class='underline_font'  >
Liability disclaimer</strong><br><br>
While Instarepair endeavors to ensure that the contents of the Website are accurate and reliable, Instarepair makes no representations about the suitability of the information and services contained or obtained through this Website for any purpose, or the results that may be obtained from using this Website. All such information is provided “as is” without warranty of any kind. Instarepair does not make any representation or warranty with respect to the veracity or the completeness of the information available on the Website and assumes no liability or responsibility for any omissions or errors in the information available on the Website. In no event shall Instarepair and/or its affiliates be liable for any direct, indirect, punitive, incidental, special or consequential damages arising out of or in any way connected with the use of this Website, or for any information or services obtained including products purchased, through this Website, or otherwise arising out of the use of this Website, whether based on contract, equity, tort, strict liability or otherwise, even if Instarepair or any of its affiliates has been advised of the possibility of damages.
All information and products available on/through this Website are provided on an “as is” and “as available” basis. With respect to the contents, products and information available on the Website, INSTAREPAIR does not make any representation or warranty, express or implied, of any kind, including, but not limited to, warranties of merchantability, non-infringement, or fitness for any particular purpose, except as expressly stated in writing.
The User agrees that some or all of the contents on this Website may be unavailable, from time to time. It is further agreed that INSTAREPAIR does not make any representation or warranty that the contents of this Website are free from viruses or other items of destructive nature.
This Website may contain forward-looking statements about INSTAREPAIR and/or INSTAREPAIR’s financial and operating performance, business plans and prospects, in-line products and product development that involve substantial risks and uncertainties. Actual results could differ materially from the expectations and projections set forth in those statements. INSTAREPAIR undertakes no obligation to publicly update or revise any forward-looking statements. The information contained on this Website does not comprise a prospectus or an admission document and does not contain or constitute or form part of any offer or invitation, or any solicitation of an offer to invest in the shares, or any other products or services or otherwise deal in these or enter into a contract with INSTAREPAIR or any other company. The information provided should not be relied upon in connection with any investment decision. Accordingly, INSTAREPAIR assumes no liability or responsibility for any decisions made on the basis of any forward-looking statements.

<br><br>
<strong class='underline_font'  >
Limitation of liability</strong><br><br>
In no event shall INSTAREPAIR be liable for any damages whatsoever arising out of, or in connection with, the User’s access or use of this Website or any information contained at the Website or any linked websites. In particular, INSTAREPAIR shall not be liable for special, indirect, consequential or incidental damages, whether an action alleging such damages is brought in contract, negligence or tort. Notwithstanding anything to the contrary contained herein, INSTAREPAIR’s total liability in respect of any order placed by the User through the Website shall be limited to the value of the concerned order.

<br><br>
<strong class='underline_font'  >
ESCALATION</strong><br><br>
If a problem is not resolved expeditiously, the customer may escalate the problem by contacting 1800-75-75-75 or writing to the following mail id: support@instarepair.in.
USER RESPONSIBILITY
In connection with obtaining Services, you agree that you will:
• Cooperate with the Instarepair’s Technician: We will use commercially reasonable efforts to provide the support to you. Our experience shows that most issues can be corrected as a result of close cooperation between you and the technician. Please listen carefully to the technician and follow the technician's instructions.
• Software/Data Backup: You understand and agree that Instarepair shall under no circumstance be responsible for any lost or corrupted software or data. Instarepair strongly recommends that you at all times maintain a complete data backup.
Representations and warranties of User
User acknowledges, represents and warrants to INSTAREPAIR as follows:
• User agrees not to modify the contents of the Website.
• User shall not interrupt or attempt to interrupt the operations of the Website, in any manner whatsoever.
• User is prohibited from using the Website to post or transmit any infringing, threatening, false, misleading, abusive, harassing, libelous, defamatory, vulgar, obscene, scandalous, inflammatory, pornographic, or profane material or any material that could constitute or encourage conduct that would be considered a criminal offense, give rise to civil liability, or otherwise violate any law. User further agrees not to use the Website for any purpose that is unlawful or prohibited by these Terms and Conditions of Use or any applicable laws. INSTAREPAIR will fully cooperate with any law enforcement authorities or any court order requesting or directing INSTAREPAIR to disclose the identity of anyone posting or transmitting any such information or material on the Website.
• User is solely responsible for his/her use of this Website includig content, material and information posted, published, submitted or otherwise disseminated by User through this Website. User will use this Website legally and only for the purposes that it is intended to be used for.
• User will evaluate, and bear all risks associated with, the use of any content, including any reliance on the accuracy, completeness, or usefulness of such content.
• User will comply fully with these Terms and Conditions of Use.
• User acknowledges that the Internet or INSTAREPAIR’s systems, services and equipment may from time to time be inoperative in full or in part as a consequence of but not limited to, mechanical breakdown, maintenance, hardware or software upgrades, any communication connectivity problems or other facts beyond the control of INSTAREPAIR. User acknowledges that INSTAREPAIR will not be held liable for any failure or inability to provide continuous, error free, uninterrupted services under these or any other circumstances.

<br><br>
<strong class='underline_font'  >
Indemnification</strong><br><br>
The User agrees to defend, indemnify and hold INSTAREPAIR harmless from and against any and all claims, damages, costs and expenses, including advocates fees, arising from and related to User’s access and use of the Website.

Links to third party websites
The User hereby agrees not to establish a link of the Website on third party website, for any purposes whatsoever, without the prior written permission of INSTAREPAIR.
This Website may contain hyperlinks to websites operated by parties other than INSTAREPAIR. Such hyperlinks are provided for your reference only. INSTAREPAIR does not control such websites and is not responsible for their contents. INSTAREPAIR’s inclusion of hyperlinks to such websites does not imply any endorsement of the material on such websites or any association with their operators.
INSTAREPAIR and/or its affiliates may also present advertisements or promotional materials on or through this Website. User’s participation in any promotional event is subject to the terms and conditions associated with that event. User’s dealings with, or participation in promotions of, any third-party advertisers on or through this Website are solely between User and such third-party. User agrees that INSTAREPAIR and/or its affiliates shall not be responsible or liable for any loss or damage of any sort incurred as the result of any such dealings or as the result of the presence of such third parties reference on this Website. Without limiting any of the disclaimers of warranty set forth in these Terms and Conditions of Use, INSTAREPAIR does not provide or make any representation as to the quality or nature of any of the third party information, products or services provided through this Website, or any other representation, warranty or guaranty. Furthermore, INSTAREPAIR disclaims any responsibility, if such third party websites:
• infringe any third party’s intellectual property rights;
• provide any information which is inaccurate, incomplete or misleading;
• Are not merchantable or fit for a particular purpose;
• Do not undertake adequate security measures;
• Contain viruses or other items of destructive nature; or
• Provide any libelous or defamatory contents or information.
<br><br>
<strong class='underline_font'  >
Modifications</strong><br><br>
User’s use of this Website constitutes User’s agreement to be bound, without any modifications or reservations whatsoever, by these Terms and Conditions of Use, which may be updated or modified from time to time without notice to User. Any changes shall become part of these Terms and Conditions of Use and shall apply immediately. By continuing to use this Website after such modifications, User indicates acceptance of those modifications. User may also be required to re-accept a substantially revised Terms and Conditions of Use to continue to use this Website.
Governing Law and Jurisdiction. These Terms and Conditions of Use are governed by the laws of India. User hereby consents to the exclusive jurisdiction and venue of courts in Bangalore in all disputes arising out of or relating to the use of this Website. Use of this Website is unauthorized in any jurisdiction that does not give effect to all provisions of these Terms and Conditions of Use, including without limitation this paragraph.
• Any rights or permissions not expressly granted herein are reserved.
• For any feedback regarding this Website, please contact: mail@instarepair.in







</div>


</div>
 

</div>


<?php 

include('footer2.php');

?>



<!-- ===== the form part starts here ================== -->
</body> 

<style type="text/css">

/* -------------------------media queries startt here ------------------------------- */

          @media screen and (min-width:00px){


.underline_font{


  font-style: italic;
    color: #131010;
    border-bottom: 1px groove black;
}

.orange_font{

      color: #F4B912;
    font-family: helvetica;
    font-style: italic;
    font-weight: normal;
}
.submit1{
      font-size:16px;
    width: 200px;
    border: none;
    background: #F4B912;
    height: 48px;
    color: black;
    text-transform: uppercase;
}


.submit2{
padding:3px;
      font-size:15px;
    width: 200px;
    border: none;
    background:black;
    height: 48px;
    color:white;
    text-transform: uppercase;
}
label{

     color: black;
    font-family: calibri;
    font-size: 17px;
}
.input1 {
    border: 1px groove white;
    margin-left: 0px;
    width: 88%;
    height: 45px;

    font-size: 20px;
    color: black;
    text-align: center;
  }
div#yellow_tab_outline {

    border: 2px groove black;
    background: white;
    height: 120px;
    padding-top: 24px;
    font-weight: bold;
    font-size: 28px;
    border-radius: 15px;
    padding: 17px;
    margin-top: 12px;
    height: 125px;
    border: 3px groove #000000;
}



div#yellow_tab_outline:hover{

    background: #F4B912;


}div#yellow_tab {
 
    height:80px;
    padding-top: 24px;
    font-weight: bold;
    font-size: 17px;
}
div#yellow_tab:hover{
    background:black;
        color: white;
}

.sell_gadget_title_bar{
padding-left: 5%;
background: #f4b912;
    height: 58px;
vertical-align: middle;
    font-size: 29px;
    font-family: calibri;
}
.gadget_id_container{

      border: 2px groove #F4B912;
    margin-top: 44px;

        border: 1px groove #F4B912;
    margin-top: 23px;
    padding: 18px;
}

.device_pic{

    width: 31%;
    max-width: 96px;
    float: left;
    min-width: 70px;

}

div#gadget_id_container{

  border: 2px groove #F4B912;
    margin-top: 27px;
    padding: 16px;
}

div#formshow1{


      padding-left: 26px;
      font-size: 13px;
}


}
          @media screen and (min-width:1000px){
div#yellow_tab_outline {
     border: 3px groove black;
    height: 91px;
    padding-top: 11px;
    font-weight: bold;
    font-size: 18px;
    }


.input1{
      width: 68%;
}

  }
/* ============== media queries ends here ====================================== */


</style>
<script type="text/javascript">

function show_costing_popup()
{




var brandname = $("#brandname").val();
var modelname= $("#modelname").val();
var switchon= $("#switchon").val();
var age= $("#age").val();
var allaccessories_id=$("#allaccessories_id").val();
// AJAX Code To Submit Form.
modelname=encodeURIComponent(modelname);

var dataString ='brandname='+brandname+'&modelname='+modelname+'&switchon='+switchon+'&age='+age+'&allaccessories_id'+allaccessories_id+'&submit_buyback=1';

// AJAX Code To Submit Form.
$.ajax({
type: "GET",

data: dataString,
cache: false,
success: function(result){


$('#showhiddenpop').click();
       $('#oldhandcost').load('cost_calculator.php?brandname='+brandname+'&modelname='+modelname+'&switchon='+switchon+'&age='+age+'&acc='+allaccessories_id+'&submit_buyback=1', function() {

// loading the buy back price once again here =======
document.getElementById('shownprice').value=document.getElementById('shownpriceajax').innerHTML;
var t=document.getElementById('shownpriceajax').innerHTML;



       });


}


});

return false;







}


function add_accessories(a)
{


if(document.getElementById('checkbox_'+a).checked === false ) {
      var removestring=a+',';
    document.getElementById("allaccessories_id").value=document.getElementById("allaccessories_id").value.replace(removestring,'');
}else{

     var newt=document.getElementById('allaccessories_id').value+=a+',';
          document.getElementById('allaccessories_id').value=newt;

              }


}</script>
</html>