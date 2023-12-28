<?php
   if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
   }
   session_start();
   error_reporting(0);
   if ($_SESSION['cb_user_id'] == '') {
      header("Location: cb-login.php");
  }
   include "connection.php";
   $id = $_GET['id'];
$query2 = mysqli_query($db, "SELECT * from `cb_user_edit_fpo_profile` WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
$row2 = mysqli_fetch_assoc($query2);

   $query = "SELECT * FROM `fpo_registration` WHERE DeletedStatus='0' AND FPO_Registration_ID='$id'";
   $result = mysqli_query($db, $query);
   $row = mysqli_fetch_array($result);
   $FPOExporterName = $row['FPOExporterName'];
   if (isset($_POST['Submit'])) {
       $FPO_Registration_ID = mysqli_real_escape_string($db, $_GET["id"]);
       $CB_User = mysqli_real_escape_string($db, $_SESSION["cb_Name"]);
       $CB_User_Email = mysqli_real_escape_string($db, $_SESSION["cb_Email"]);
       $CB_User_Phone = mysqli_real_escape_string($db, $_SESSION["cb_Mobile"]);
       $Unique_Number = mysqli_real_escape_string($db, $_POST['Unique_Number']);
       $Status_of_IndGAP = mysqli_real_escape_string($db, $_POST['Status_of_IndGAP']);

       $CG_Client_Name = mysqli_real_escape_string($db, $_POST['CG_Client_Name']);
       $CG_Current_Status = mysqli_real_escape_string($db, $_POST['CG_Current_Status']);

       $CG_Certificate_No = mysqli_real_escape_string($db,$_POST['CG_Certificate_No']);
       $CG_Certificate_Date = mysqli_real_escape_string($db,$_POST['CG_Certificate_Date']);
       $CG_Certificate_End_Date = mysqli_real_escape_string($db,$_POST['CG_Certificate_End_Date']);
       $CG_Certificate_Renewal_Date = mysqli_real_escape_string($db,$_POST['CG_Certificate_Renewal_Date']);


       $R_Client_Name = mysqli_real_escape_string($db,$_POST['R_Client_Name']);
       $R_Current_Status = mysqli_real_escape_string($db,$_POST['R_Current_Status']);    
 
       $DescriptionOfCompliance = mysqli_real_escape_string($db,$_POST['DescriptionOfCompliance']);

       $S_Client_Name = mysqli_real_escape_string($db, $_POST['S_Client_Name']);
       $S_Certificate_Issue_Date = mysqli_real_escape_string($db, $_POST['S_Certificate_Issue_Date']);
       $S_Certificate_Validity_Date = mysqli_real_escape_string($db, $_POST['S_Certificate_Validity_Date']);
       $S_Suspended_Date = mysqli_real_escape_string($db, $_POST['S_Suspended_Date']);
       $S_Reason_for_Suspended = mysqli_real_escape_string($db, $_POST['S_Reason_for_Suspended']);

       $OtherDocument_Discription = mysqli_real_escape_string($db,$_POST['OtherDocument_Discription']);


       $W_Client_Name = mysqli_real_escape_string($db, $_POST['W_Client_Name']);
       $W_Certificate_Issue_Date = mysqli_real_escape_string($db, $_POST['W_Certificate_Issue_Date']);
       $W_Certificate_Validity_Date = mysqli_real_escape_string($db, $_POST['W_Certificate_Validity_Date']);
       $W_Withdrawal_Date = mysqli_real_escape_string($db, $_POST['W_Withdrawal_Date']);
       $W_Reason_for_Withdrawal = mysqli_real_escape_string($db, $_POST['W_Reason_for_Withdrawal']);


       $E_Client_Name = mysqli_real_escape_string($db, $_POST['E_Client_Name']);
       $E_Certificate_Issue_Date = mysqli_real_escape_string($db, $_POST['E_Certificate_Issue_Date']);
       $E_Certificate_Validity_Date = mysqli_real_escape_string($db, $_POST['E_Certificate_Validity_Date']);
       $E_Reason_for_Expired = mysqli_real_escape_string($db, $_POST['E_Reason_for_Expired']);







       $AssessmentReport = mysqli_real_escape_string($db, $_POST['AssessmentReport']);
       $AuditManDaysSpentByCB = mysqli_real_escape_string($db, $_POST['AuditManDaysSpentByCB']);
       $QMSAudit = mysqli_real_escape_string($db, $_POST['QMSAudit']);
       $MembersInspections = mysqli_real_escape_string($db, $_POST['MembersInspections']);
       $NonConformityReports = mysqli_real_escape_string($db, $_POST['NonConformityReports']);
       $ClientCorrectiveActions = mysqli_real_escape_string($db, $_POST['ClientCorrectiveActions']);
       $CBClosure = mysqli_real_escape_string($db, $_POST['CBClosure']);
       $CBAssessmentSchedule = mysqli_real_escape_string($db, $_POST['CBAssessmentSchedule']);
       $ScheduleDate = mysqli_real_escape_string($db, $_POST['ScheduleDate']);
       $ClientSigned_Document = mysqli_real_escape_string($db, $_POST['ClientSigned_Document']);
       $CertificationAgreement_Document_Name = mysqli_real_escape_string($db, $_POST['CertificationAgreement_Document_Name']);
       $ScopeStatus = mysqli_real_escape_string($db, $_POST['ScopeStatus']);
       $GrantedScopeStatus = mysqli_real_escape_string($db, $_POST['GrantedScopeStatus']);
       $Scope_Document_Name = mysqli_real_escape_string($db, $_POST['Scope_Document_Name']);
       $Clientqualifiedinternalinspectors = mysqli_real_escape_string($db, $_POST['Clientqualifiedinternalinspectors']);
       $ClientqualifiedInternalAuditors = mysqli_real_escape_string($db, $_POST['ClientqualifiedInternalAuditors']);
       $MassBalanceGranting_Document_Name = mysqli_real_escape_string($db, $_POST['MassBalanceGranting_Document_Name']);
       $MassBalanceGranting_Document_Date = mysqli_real_escape_string($db, $_POST['MassBalanceGranting_Document_Date']);
       $CBProcedure_DocumentName = mysqli_real_escape_string($db, $_POST['CBProcedure_DocumentName']);
       $ClientFeedback = mysqli_real_escape_string($db, $_POST['ClientFeedback']);
       $OtherDocument_Name = mysqli_real_escape_string($db, $_POST['OtherDocument_Name']);
       

       $query3 = mysqli_query($db, "SELECT * from `cb_user_edit_fpo_profile` WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
       $row3_num = mysqli_num_rows($query3);
       if($row3_num == 1){

        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Unique_Number`='$Unique_Number',`Status_of_IndGAP`='$Status_of_IndGAP',`R_Client_Name`='$R_Client_Name',`R_Current_Status`='$R_Current_Status',`CG_Client_Name`='$CG_Client_Name',`CG_Current_Status`='$CG_Current_Status',`S_Client_Name`='$S_Client_Name',`S_Certificate_Issue_Date`='$S_Certificate_Issue_Date', `S_Certificate_Validity_Date`='$S_Certificate_Validity_Date', `S_Suspended_Date`='$S_Suspended_Date',`S_Reason_for_Suspended`='$S_Reason_for_Suspended',`W_Client_Name`='$W_Client_Name', `W_Certificate_Issue_Date`='$W_Certificate_Issue_Date', `W_Certificate_Validity_Date`='$W_Certificate_Validity_Date', `W_Withdrawal_Date`='$W_Withdrawal_Date', `W_Reason_for_Withdrawal`='$W_Reason_for_Withdrawal', `E_Client_Name`='$E_Client_Name', `E_Certificate_Issue_Date`='$E_Certificate_Issue_Date', `E_Certificate_Validity_Date`='$E_Certificate_Validity_Date', `E_Reason_for_Expired`='$E_Reason_for_Expired',`AssessmentReport`='$AssessmentReport',`AuditManDaysSpentByCB`='$AuditManDaysSpentByCB',`QMSAudit`='$QMSAudit',`MembersInspections`='$MembersInspections',`NonConformityReports`='$NonConformityReports',`ClientCorrectiveActions`='$ClientCorrectiveActions',`CBClosure`='$CBClosure',`CBAssessmentSchedule`='$CBAssessmentSchedule',`ScheduleDate`='$ScheduleDate',`ClientSigned_Document`='$ClientSigned_Document',`GrantedScopeStatus`='$GrantedScopeStatus',`CertificationAgreement_Document_Name`='$CertificationAgreement_Document_Name',`ScopeStatus`='$ScopeStatus',`Scope_Document_Name`='$Scope_Document_Name',`Clientqualifiedinternalinspectors`='$Clientqualifiedinternalinspectors',`ClientqualifiedInternalAuditors`='$ClientqualifiedInternalAuditors',`OtherDocument_Discription`='$OtherDocument_Discription',`MassBalanceGranting_Document_Name`='$MassBalanceGranting_Document_Name',`DescriptionOfCompliance`='$DescriptionOfCompliance',`MassBalanceGranting_Document_Date`='$MassBalanceGranting_Document_Date',`CG_Certificate_No`='$CG_Certificate_No',`CG_Certificate_Date`='$CG_Certificate_Date',`CG_Certificate_End_Date`='$CG_Certificate_End_Date',`CG_Certificate_Renewal_Date`='$CG_Certificate_Renewal_Date',`CBProcedure_DocumentName`='$CBProcedure_DocumentName',`ClientFeedback`='$ClientFeedback',`OtherDocument_Name`='$OtherDocument_Name' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
        if ($_FILES['CG_Client_Application_Form'] != '') {
           $extensioncg1 = pathinfo($_FILES['CG_Client_Application_Form']['name'], PATHINFO_EXTENSION);
           $CG_Client_Application_Form1 = time() . rand(1000, 9999) . "." . $extensioncg1;
           $CG_Client_Application_Form2 = $_FILES["CG_Client_Application_Form"]["name"];
           if ($_FILES["CG_Client_Application_Form"]["name"] != '') {
               if (strtolower(end(explode(".", $CG_Client_Application_Form2))) == "pdf") {
                   if (move_uploaded_file($_FILES["CG_Client_Application_Form"]["tmp_name"], "CBDocument/" . $CG_Client_Application_Form1)) {
                       $CG_Client_Application_Form = $CG_Client_Application_Form1;
                       $query_insert1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Client_Application_Form`='$CG_Client_Application_Form' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['CG_Signed_Certification_Agreement'] != '') {
           $extensioncg2 = pathinfo($_FILES['CG_Signed_Certification_Agreement']['name'], PATHINFO_EXTENSION);
           $CG_Signed_Certification_Agreement1 = time() . rand(1000, 9999) . "." . $extensioncg2;
           $CG_Signed_Certification_Agreement2 = $_FILES["CG_Signed_Certification_Agreement"]["name"];
           if ($_FILES["CG_Signed_Certification_Agreement"]["name"] != '') {
               if (strtolower(end(explode(".", $CG_Signed_Certification_Agreement2))) == "pdf") {
                   if (move_uploaded_file($_FILES["CG_Signed_Certification_Agreement"]["tmp_name"], "CBDocument/" . $CG_Signed_Certification_Agreement1)) {
                       $CG_Signed_Certification_Agreement = $CG_Signed_Certification_Agreement1;
                       $query_insert2 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Signed_Certification_Agreement`='$CG_Signed_Certification_Agreement' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['CG_Scope'] != '') {
           $extensioncg3 = pathinfo($_FILES['CG_Scope']['name'], PATHINFO_EXTENSION);
           $CG_Scope1 = time() . rand(1000, 9999) . "." . $extensioncg3;
           $CG_Scope2 = $_FILES["CG_Scope"]["name"];
           if ($_FILES["CG_Scope"]["name"] != '') {
               if (strtolower(end(explode(".", $CG_Scope2))) == "pdf") {
                   if (move_uploaded_file($_FILES["CG_Scope"]["tmp_name"], "CBDocument/" . $CG_Scope1)) {
                       $CG_Scope = $CG_Scope1;
                       $query_insert3 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Scope`='$CG_Scope' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['R_Client_Application_Form'] != '') {
         $R_Client_Application_Form = pathinfo($_FILES['R_Client_Application_Form']['name'], PATHINFO_EXTENSION);
         $R_Client_Application_Form1 = time() . rand(1000, 9999) . "." . $R_Client_Application_Form;
         $R_Client_Application_Form2 = $_FILES["R_Client_Application_Form"]["name"];
         if ($_FILES["R_Client_Application_Form"]["name"] != '') {
             if (strtolower(end(explode(".", $R_Client_Application_Form2))) == "pdf") {
                 if (move_uploaded_file($_FILES["R_Client_Application_Form"]["tmp_name"], "CBDocument/" . $R_Client_Application_Form1)) {
                     $R_Client_Application_Form_New = $R_Client_Application_Form1;
                     $query_insert3r = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Client_Application_Form`='$R_Client_Application_Form_New' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['R_Signed_Certification_Agreement'] != '') {
      $R_Signed_Certification_Agreement = pathinfo($_FILES['R_Signed_Certification_Agreement']['name'], PATHINFO_EXTENSION);
      $R_Signed_Certification_Agreement1 = time() . rand(1000, 9999) . "." . $R_Signed_Certification_Agreement;
      $R_Signed_Certification_Agreement2 = $_FILES["R_Signed_Certification_Agreement"]["name"];
      if ($_FILES["R_Signed_Certification_Agreement"]["name"] != '') {
          if (strtolower(end(explode(".", $R_Signed_Certification_Agreement2))) == "pdf") {
              if (move_uploaded_file($_FILES["R_Signed_Certification_Agreement"]["tmp_name"], "CBDocument/" . $R_Signed_Certification_Agreement1)) {
                  $R_Signed_Certification_Agreement_New = $R_Signed_Certification_Agreement1;
                  $query_insert3r1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Signed_Certification_Agreement`='$R_Signed_Certification_Agreement_New' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
              }
          }
      }
   }


   if ($_FILES['R_Scope'] != '') {
      $R_Scopeext = pathinfo($_FILES['R_Scope']['name'], PATHINFO_EXTENSION);
      $R_Scope1 = time() . rand(1000, 9999) . "." . $R_Scopeext;
      $R_Scope2 = $_FILES["R_Scope"]["name"];
      if ($_FILES["R_Scope"]["name"] != '') {
          if (strtolower(end(explode(".", $R_Scope2))) == "pdf") {
              if (move_uploaded_file($_FILES["R_Scope"]["tmp_name"], "CBDocument/" . $R_Scope1)) {
                  $R_Scope = $R_Scope1;
                  $query_insert3r1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Scope`='$R_Scope' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
              }
          }
      }
   }



       if ($_FILES['S_Document_Upload'] != '') {
           $extensioncgs1 = pathinfo($_FILES['S_Document_Upload']['name'], PATHINFO_EXTENSION);
           $S_Document_Upload1 = time() . rand(1000, 9999) . "." . $extensioncgs1;
           $S_Document_Upload2 = $_FILES["S_Document_Upload"]["name"];
           if ($_FILES["S_Document_Upload"]["name"] != '') {
               if (strtolower(end(explode(".", $S_Document_Upload2))) == "pdf") {
                   if (move_uploaded_file($_FILES["S_Document_Upload"]["tmp_name"], "CBDocument/" . $S_Document_Upload1)) {
                       $S_Document_Upload = $S_Document_Upload1;
                       $query_insert4 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `S_Document_Upload`='$S_Document_Upload' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }


       if ($_FILES['W_Document_Upload'] != '') {
           $extensioncgw1 = pathinfo($_FILES['W_Document_Upload']['name'], PATHINFO_EXTENSION);
           $W_Document_Upload1 = time() . rand(1000, 9999) . "." . $extensioncgw1;
           $W_Document_Upload2 = $_FILES["W_Document_Upload"]["name"];
           if ($_FILES["W_Document_Upload"]["name"] != '') {
               if (strtolower(end(explode(".", $W_Document_Upload2))) == "pdf") {
                   if (move_uploaded_file($_FILES["W_Document_Upload"]["tmp_name"], "CBDocument/" . $W_Document_Upload1)) {
                       $W_Document_Upload = $W_Document_Upload1;
                       $query_insert5 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `W_Document_Upload`='$W_Document_Upload' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }
       if ($_FILES['E_Document_Upload'] != '') {
         $E_Document_Upload = pathinfo($_FILES['E_Document_Upload']['name'], PATHINFO_EXTENSION);
         $E_Document_Upload1 = time() . rand(1000, 9999) . "." . $E_Document_Upload;
         $E_Document_Upload2 = $_FILES["W_Document_Upload"]["name"];
         if ($_FILES["E_Document_Upload"]["name"] != '') {
             if (strtolower(end(explode(".", $E_Document_Upload2))) == "pdf") {
                 if (move_uploaded_file($_FILES["E_Document_Upload"]["tmp_name"], "CBDocument/" . $E_Document_Upload1)) {
                     $E_Document_Upload_New = $E_Document_Upload1;
                     $query_insert5e = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `E_Document_Upload`='$E_Document_Upload_New' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }


       if ($_FILES['Status_of_IndGAP_Document'] != '') {
           $extension1 = pathinfo($_FILES['Status_of_IndGAP_Document']['name'], PATHINFO_EXTENSION);
           $Status_of_IndGAP_Document1 = time() . rand(1000, 9999) . "." . $extension1;
           $Status_of_IndGAP_Document2 = $_FILES["Status_of_IndGAP_Document"]["name"];
           if ($_FILES["Status_of_IndGAP_Document"]["name"] != '') {
               if (strtolower(end(explode(".", $Status_of_IndGAP_Document2))) == "pdf") {
                   if (move_uploaded_file($_FILES["Status_of_IndGAP_Document"]["tmp_name"], "CBDocument/" . $Status_of_IndGAP_Document1)) {
                       $Status_of_IndGAP_Document = $Status_of_IndGAP_Document1;
                       $query_insert6 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Status_of_IndGAP_Document`='$Status_of_IndGAP_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['ClientSignedApplicationFormForRegistration'] != '') {
           $extension3 = pathinfo($_FILES['ClientSignedApplicationFormForRegistration']['name'], PATHINFO_EXTENSION);
           $ClientSignedApplicationFormForRegistration1 = time() . rand(1000, 9999) . "." . $extension3;
           $ClientSignedApplicationFormForRegistration2 = $_FILES["ClientSignedApplicationFormForRegistration"]["name"];
           if ($_FILES["ClientSignedApplicationFormForRegistration"]["name"] != '') {
               if (strtolower(end(explode(".", $ClientSignedApplicationFormForRegistration2))) == "pdf") {
                   if (move_uploaded_file($_FILES["ClientSignedApplicationFormForRegistration"]["tmp_name"], "CBDocument/" . $ClientSignedApplicationFormForRegistration1)) {
                       $ClientSignedApplicationFormForRegistration = $ClientSignedApplicationFormForRegistration1;
                       $query_insert7 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientSignedApplicationFormForRegistration`='$ClientSignedApplicationFormForRegistration' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['CertificationAgreementSigned_Document'] != '') {
           $extension4 = pathinfo($_FILES['CertificationAgreementSigned_Document']['name'], PATHINFO_EXTENSION);
           $CertificationAgreementSigned_Document1 = time() . rand(1000, 9999) . "." . $extension4;
           $CertificationAgreementSigned_Document2 = $_FILES["CertificationAgreementSigned_Document"]["name"];
           if ($_FILES["CertificationAgreementSigned_Document"]["name"] != '') {
               if (strtolower(end(explode(".", $CertificationAgreementSigned_Document2))) == "pdf") {
                   if (move_uploaded_file($_FILES["CertificationAgreementSigned_Document"]["tmp_name"], "CBDocument/" . $CertificationAgreementSigned_Document1)) {
                       $CertificationAgreementSigned_Document = $CertificationAgreementSigned_Document1;
                       $query_insert8 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CertificationAgreementSigned_Document`='$CertificationAgreementSigned_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['Scope_Document'] != '') {
           $extension5 = pathinfo($_FILES['Scope_Document']['name'], PATHINFO_EXTENSION);
           $Scope_Document1 = time() . rand(1000, 9999) . "." . $extension5;
           $Scope_Document2 = $_FILES["Scope_Document"]["name"];
           if ($_FILES["Scope_Document"]["name"] != '') {
               if (strtolower(end(explode(".", $Scope_Document2))) == "pdf") {
                   if (move_uploaded_file($_FILES["Scope_Document"]["tmp_name"], "CBDocument/" . $Scope_Document1)) {
                       $Scope_Document = $Scope_Document1;
                       $query_insert9 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Scope_Document`='$Scope_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['MassBalanceGranting_Document'] != '') {
           $extension6 = pathinfo($_FILES['MassBalanceGranting_Document']['name'], PATHINFO_EXTENSION);
           $MassBalanceGranting_Document1 = time() . rand(1000, 9999) . "." . $extension6;
           $MassBalanceGranting_Document2 = $_FILES["MassBalanceGranting_Document"]["name"];
           if ($_FILES["MassBalanceGranting_Document"]["name"] != '') {
               if (strtolower(end(explode(".", $MassBalanceGranting_Document2))) == "pdf") {
                   if (move_uploaded_file($_FILES["MassBalanceGranting_Document"]["tmp_name"], "CBDocument/" . $MassBalanceGranting_Document1)) {
                       $MassBalanceGranting_Document = $MassBalanceGranting_Document1;
                       $query_insert10 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `MassBalanceGranting_Document`='$MassBalanceGranting_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['CBProcedure_Document'] != '') {
           $extension7 = pathinfo($_FILES['CBProcedure_Document']['name'], PATHINFO_EXTENSION);
           $CBProcedure_Document1 = time() . rand(1000, 9999) . "." . $extension7;
           $CBProcedure_Document2 = $_FILES["CBProcedure_Document"]["name"];
           if ($_FILES["CBProcedure_Document"]["name"] != '') {
               if (strtolower(end(explode(".", $CBProcedure_Document2))) == "pdf") {
                   if (move_uploaded_file($_FILES["CBProcedure_Document"]["tmp_name"], "CBDocument/" . $CBProcedure_Document1)) {
                       $CBProcedure_Document = $CBProcedure_Document1;
                       $query_insert11 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CBProcedure_Document`='$CBProcedure_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['OtherDocument'] != '') {
           $extension8 = pathinfo($_FILES['OtherDocument']['name'], PATHINFO_EXTENSION);
           $OtherDocument1 = time() . rand(1000, 9999) . "." . $extension8;
           $OtherDocument2 = $_FILES["OtherDocument"]["name"];
           if ($_FILES["OtherDocument"]["name"] != '') {
               if (strtolower(end(explode(".", $OtherDocument2))) == "pdf") {
                   if (move_uploaded_file($_FILES["OtherDocument"]["tmp_name"], "CBDocument/" . $OtherDocument1)) {
                       $OtherDocument = $OtherDocument1;
                       $query_insert12 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `OtherDocument`='$OtherDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['AssessmentReportDocument'] != '') {
           $extension9 = pathinfo($_FILES['AssessmentReportDocument']['name'], PATHINFO_EXTENSION);
           $AssessmentReportDocument1 = time() . rand(1000, 9999) . "." . $extension9;
           $AssessmentReportDocument2 = $_FILES["AssessmentReportDocument"]["name"];
           if ($_FILES["AssessmentReportDocument"]["name"] != '') {
               if (strtolower(end(explode(".", $AssessmentReportDocument2))) == "pdf") {
                   if (move_uploaded_file($_FILES["AssessmentReportDocument"]["tmp_name"], "CBDocument/" . $AssessmentReportDocument1)) {
                       $AssessmentReportDocument = $AssessmentReportDocument1;
                       $query_insert13 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `AssessmentReportDocument`='$AssessmentReportDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['NonConformityReportsDocument'] != '') {
           $extension10 = pathinfo($_FILES['NonConformityReportsDocument']['name'], PATHINFO_EXTENSION);
           $NonConformityReportsDocument1 = time() . rand(1000, 9999) . "." . $extension10;
           $NonConformityReportsDocument2 = $_FILES["NonConformityReportsDocument"]["name"];
           if ($_FILES["NonConformityReportsDocument"]["name"] != '') {
               if (strtolower(end(explode(".", $NonConformityReportsDocument2))) == "pdf") {
                   if (move_uploaded_file($_FILES["NonConformityReportsDocument"]["tmp_name"], "CBDocument/" . $NonConformityReportsDocument1)) {
                       $NonConformityReportsDocument = $NonConformityReportsDocument1;
                       $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument`='$NonConformityReportsDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['NonConformityReportsDocument_two'] != '') {
         $extension101 = pathinfo($_FILES['NonConformityReportsDocument_two']['name'], PATHINFO_EXTENSION);
         $NonConformityReportsDocument11 = time() . rand(1000, 9999) . "." . $extension101;
         $NonConformityReportsDocument22 = $_FILES["NonConformityReportsDocument_two"]["name"];
         if ($_FILES["NonConformityReportsDocument_two"]["name"] != '') {
             if (strtolower(end(explode(".", $NonConformityReportsDocument22))) == "pdf") {
                 if (move_uploaded_file($_FILES["NonConformityReportsDocument_two"]["tmp_name"], "CBDocument/" . $NonConformityReportsDocument11)) {
                     $NonConformityReportsDocument_two = $NonConformityReportsDocument11;
                     $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument_two`='$NonConformityReportsDocument_two' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['NonConformityReportsDocument_three'] != '') {
      $extension102 = pathinfo($_FILES['NonConformityReportsDocument_three']['name'], PATHINFO_EXTENSION);
      $NonConformityReportsDocument12 = time() . rand(1000, 9999) . "." . $extension102;
      $NonConformityReportsDocument23 = $_FILES["NonConformityReportsDocument_three"]["name"];
      if ($_FILES["NonConformityReportsDocument_three"]["name"] != '') {
          if (strtolower(end(explode(".", $NonConformityReportsDocument23))) == "pdf") {
              if (move_uploaded_file($_FILES["NonConformityReportsDocument_three"]["tmp_name"], "CBDocument/" . $NonConformityReportsDocument12)) {
                  $NonConformityReportsDocument_three = $NonConformityReportsDocument12;
                  $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument_three`='$NonConformityReportsDocument_three' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
              }
          }
      }
  }
  if ($_FILES['Granted_Scope_Document'] != '') {
   $extension51 = pathinfo($_FILES['Granted_Scope_Document']['name'], PATHINFO_EXTENSION);
   $Granted_Scope_Document1 = time() . rand(1000, 9999) . "." . $extension51;
   $Granted_Scope_Document2 = $_FILES["Granted_Scope_Document"]["name"];
   if ($_FILES["Granted_Scope_Document"]["name"] != '') {
       if (strtolower(end(explode(".", $Granted_Scope_Document2))) == "pdf") {
           if (move_uploaded_file($_FILES["Granted_Scope_Document"]["tmp_name"], "CBDocument/" . $Granted_Scope_Document1)) {
               $Granted_Scope_Document = $Granted_Scope_Document1;
               $query_insert9 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Granted_Scope_Document`='$Granted_Scope_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
           }
       }
   }
}

       if ($_FILES['AssessmentScheduleDocument'] != '') {
           $extension11 = pathinfo($_FILES['AssessmentScheduleDocument']['name'], PATHINFO_EXTENSION);
           $AssessmentScheduleDocument1 = time() . rand(1000, 9999) . "." . $extension11;
           $AssessmentScheduleDocument2 = $_FILES["AssessmentScheduleDocument"]["name"];
           if ($_FILES["AssessmentScheduleDocument"]["name"] != '') {
               if (strtolower(end(explode(".", $AssessmentScheduleDocument2))) == "pdf") {
                   if (move_uploaded_file($_FILES["AssessmentScheduleDocument"]["tmp_name"], "CBDocument/" . $AssessmentScheduleDocument1)) {
                       $AssessmentScheduleDocument = $AssessmentScheduleDocument1;
                       $query_insert15 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `AssessmentScheduleDocument`='$AssessmentScheduleDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['ClientqualifiedinternalinspectorsDocument'] != '') {
           $extension12 = pathinfo($_FILES['ClientqualifiedinternalinspectorsDocument']['name'], PATHINFO_EXTENSION);
           $ClientqualifiedinternalinspectorsDocument1 = time() . rand(1000, 9999) . "." . $extension12;
           $ClientqualifiedinternalinspectorsDocument2 = $_FILES["ClientqualifiedinternalinspectorsDocument"]["name"];
           if ($_FILES["ClientqualifiedinternalinspectorsDocument"]["name"] != '') {
               if (strtolower(end(explode(".", $ClientqualifiedinternalinspectorsDocument2))) == "pdf") {
                   if (move_uploaded_file($_FILES["ClientqualifiedinternalinspectorsDocument"]["tmp_name"], "CBDocument/" . $ClientqualifiedinternalinspectorsDocument1)) {
                       $ClientqualifiedinternalinspectorsDocument = $ClientqualifiedinternalinspectorsDocument1;
                       $query_insert16 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientqualifiedinternalinspectorsDocument`='$ClientqualifiedinternalinspectorsDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['ClientqualifiedInternalAuditorsDocument'] != '') {
           $extension13 = pathinfo($_FILES['ClientqualifiedInternalAuditorsDocument']['name'], PATHINFO_EXTENSION);
           $ClientqualifiedInternalAuditorsDocument1 = time() . rand(1000, 9999) . "." . $extension13;
           $ClientqualifiedInternalAuditorsDocument2 = $_FILES["ClientqualifiedInternalAuditorsDocument"]["name"];
           if ($_FILES["ClientqualifiedInternalAuditorsDocument"]["name"] != '') {
               if (strtolower(end(explode(".", $ClientqualifiedInternalAuditorsDocument2))) == "pdf") {
                   if (move_uploaded_file($_FILES["ClientqualifiedInternalAuditorsDocument"]["tmp_name"], "CBDocument/" . $ClientqualifiedInternalAuditorsDocument1)) {
                       $ClientqualifiedInternalAuditorsDocument = $ClientqualifiedInternalAuditorsDocument1;
                       $query_insert17 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientqualifiedInternalAuditorsDocument`='$ClientqualifiedInternalAuditorsDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                   }
               }
           }
       }

       if ($_FILES['DescriptionOfCompliance_Document'] != '') {
         $extension14 = pathinfo($_FILES['DescriptionOfCompliance_Document']['name'], PATHINFO_EXTENSION);
         $DescriptionOfCompliance_Document1 = time() . rand(1000, 9999) . "." . $extension14;
         $DescriptionOfCompliance_Document2 = $_FILES["DescriptionOfCompliance_Document"]["name"];
         if ($_FILES["DescriptionOfCompliance_Document"]["name"] != '') {
             if (strtolower(end(explode(".", $DescriptionOfCompliance_Document2))) == "pdf") {
                 if (move_uploaded_file($_FILES["DescriptionOfCompliance_Document"]["tmp_name"], "CBDocument/" . $DescriptionOfCompliance_Document1)) {
                     $DescriptionOfCompliance_Document = $DescriptionOfCompliance_Document1;
                     $query_insert16 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `DescriptionOfCompliance_Document`='$DescriptionOfCompliance_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }



       }else{
       $query_insert = mysqli_query($db, "INSERT INTO `cb_user_edit_fpo_profile` (`ID`, `FPO_Registration_ID`, `CB_User`, `CB_User_Email`, `CB_User_Phone`, `Status_of_IndGAP_Document`, `Status_of_IndGAP_DocumentName`, `Unique_Number`, `Status_of_IndGAP`,`R_Client_Name`,`R_Current_Status`,`R_Client_Application_Form`,`R_Signed_Certification_Agreement`,`R_Scope`,`CG_Client_Name`, `CG_Certificate_No`, `CG_Certificate_Date`, `CG_Certificate_End_Date`, `CG_Certificate_Renewal_Date` ,`CG_Current_Status`, `CG_Client_Application_Form`, `CG_Signed_Certification_Agreement`, `CG_Scope`, `S_Client_Name`, `S_Certificate_Issue_Date`, `S_Certificate_Validity_Date`, `S_Suspended_Date`, `S_Reason_for_Suspended`, `S_Document_Upload`, `W_Client_Name`, `W_Certificate_Issue_Date`, `W_Certificate_Validity_Date`, `W_Withdrawal_Date`, `W_Reason_for_Withdrawal`, `W_Document_Upload`,`E_Client_Name`,`E_Certificate_Issue_Date`,`E_Certificate_Validity_Date`,`E_Reason_for_Expired`, `E_Document_Upload` ,`AssessmentReport`,`AssessmentReportDocument`, `AuditManDaysSpentByCB`, `QMSAudit`, `MembersInspections`, `NonConformityReports`, `ClientCorrectiveActions`, `CBClosure`, `NonConformityReportsDocument`, `CBAssessmentSchedule`, `ScheduleDate`, `AssessmentScheduleDocument`, `ClientSignedApplicationFormForRegistration`, `ClientSigned_Document`, `CertificationAgreementSigned_Document`, `CertificationAgreement_Document_Name`, `ScopeStatus`, `Scope_Document`, `Scope_Document_Name`,`GrantedScopeStatus`,`Granted_Scope_Document`,`Clientqualifiedinternalinspectors`, `ClientqualifiedinternalinspectorsDocument`, `ClientqualifiedInternalAuditors`, `ClientqualifiedInternalAuditorsDocument`, `MassBalanceGranting_Document`, `MassBalanceGranting_Document_Name`, `MassBalanceGranting_Document_Date`, `CBProcedure_Document`, `CBProcedure_DocumentName`, `ClientFeedback`, `DescriptionOfCompliance` ,`OtherDocument`, `OtherDocument_Name`,`OtherDocument_Discription`,`Remark`, `Deleted_Status`, `CreatedDate`) VALUES (NULL, '$FPO_Registration_ID', '$CB_User', '$CB_User_Email', '$CB_User_Phone', NULL, NULL, '$Unique_Number', '$Status_of_IndGAP','$R_Client_Name','$R_Current_Status', NULL, NULL, NULL,'$CG_Client_Name','$CG_Certificate_No','$CG_Certificate_Date','$CG_Certificate_End_Date','$CG_Certificate_Renewal_Date','$CG_Current_Status',NULL,NULL,NULL,'$S_Client_Name','$S_Certificate_Issue_Date', '$S_Certificate_Validity_Date', '$S_Suspended_Date','$S_Reason_for_Suspended', NULL,'$W_Client_Name', '$W_Certificate_Issue_Date', '$W_Certificate_Validity_Date', '$W_Withdrawal_Date', '$W_Reason_for_Withdrawal', '$W_Document_Upload','$E_Client_Name','$E_Certificate_Issue_Date','$E_Certificate_Validity_Date','$E_Reason_for_Expired',NULL,'$AssessmentReport',NULL,'$AuditManDaysSpentByCB','$QMSAudit','$MembersInspections','$NonConformityReports','$ClientCorrectiveActions','$CBClosure',NULL,'$CBAssessmentSchedule','$ScheduleDate',NULL,NULL,'$ClientSigned_Document',NULL,'$CertificationAgreement_Document_Name','$ScopeStatus',NULL,'$Scope_Document_Name','$GrantedScopeStatus',NULL,'$Clientqualifiedinternalinspectors',NULL,'$ClientqualifiedInternalAuditors',NULL,NULL,'$MassBalanceGranting_Document_Name','$MassBalanceGranting_Document_Date',NULL,'$CBProcedure_DocumentName','$ClientFeedback','$DescriptionOfCompliance',NULL,NULL,'$OtherDocument_Name', '$OtherDocument_Discription' ,NULL, '0', current_timestamp());");
       if ($_FILES['CG_Client_Application_Form'] != '') {
         $extensioncg1 = pathinfo($_FILES['CG_Client_Application_Form']['name'], PATHINFO_EXTENSION);
         $CG_Client_Application_Form1 = time() . rand(1000, 9999) . "." . $extensioncg1;
         $CG_Client_Application_Form2 = $_FILES["CG_Client_Application_Form"]["name"];
         if ($_FILES["CG_Client_Application_Form"]["name"] != '') {
             if (strtolower(end(explode(".", $CG_Client_Application_Form2))) == "pdf") {
                 if (move_uploaded_file($_FILES["CG_Client_Application_Form"]["tmp_name"], "CBDocument/" . $CG_Client_Application_Form1)) {
                     $CG_Client_Application_Form = $CG_Client_Application_Form1;
                     $query_insert1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Client_Application_Form`='$CG_Client_Application_Form' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['CG_Signed_Certification_Agreement'] != '') {
         $extensioncg2 = pathinfo($_FILES['CG_Signed_Certification_Agreement']['name'], PATHINFO_EXTENSION);
         $CG_Signed_Certification_Agreement1 = time() . rand(1000, 9999) . "." . $extensioncg2;
         $CG_Signed_Certification_Agreement2 = $_FILES["CG_Signed_Certification_Agreement"]["name"];
         if ($_FILES["CG_Signed_Certification_Agreement"]["name"] != '') {
             if (strtolower(end(explode(".", $CG_Signed_Certification_Agreement2))) == "pdf") {
                 if (move_uploaded_file($_FILES["CG_Signed_Certification_Agreement"]["tmp_name"], "CBDocument/" . $CG_Signed_Certification_Agreement1)) {
                     $CG_Signed_Certification_Agreement = $CG_Signed_Certification_Agreement1;
                     $query_insert2 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Signed_Certification_Agreement`='$CG_Signed_Certification_Agreement' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['CG_Scope'] != '') {
         $extensioncg3 = pathinfo($_FILES['CG_Scope']['name'], PATHINFO_EXTENSION);
         $CG_Scope1 = time() . rand(1000, 9999) . "." . $extensioncg3;
         $CG_Scope2 = $_FILES["CG_Scope"]["name"];
         if ($_FILES["CG_Scope"]["name"] != '') {
             if (strtolower(end(explode(".", $CG_Scope2))) == "pdf") {
                 if (move_uploaded_file($_FILES["CG_Scope"]["tmp_name"], "CBDocument/" . $CG_Scope1)) {
                     $CG_Scope = $CG_Scope1;
                     $query_insert3 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Scope`='$CG_Scope' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['R_Client_Application_Form'] != '') {
       $R_Client_Application_Form = pathinfo($_FILES['R_Client_Application_Form']['name'], PATHINFO_EXTENSION);
       $R_Client_Application_Form1 = time() . rand(1000, 9999) . "." . $R_Client_Application_Form;
       $R_Client_Application_Form2 = $_FILES["R_Client_Application_Form"]["name"];
       if ($_FILES["R_Client_Application_Form"]["name"] != '') {
           if (strtolower(end(explode(".", $R_Client_Application_Form2))) == "pdf") {
               if (move_uploaded_file($_FILES["R_Client_Application_Form"]["tmp_name"], "CBDocument/" . $R_Client_Application_Form1)) {
                   $R_Client_Application_Form_New = $R_Client_Application_Form1;
                   $query_insert3r = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Client_Application_Form`='$R_Client_Application_Form_New' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
               }
           }
       }
   }

   if ($_FILES['R_Signed_Certification_Agreement'] != '') {
    $R_Signed_Certification_Agreement = pathinfo($_FILES['R_Signed_Certification_Agreement']['name'], PATHINFO_EXTENSION);
    $R_Signed_Certification_Agreement1 = time() . rand(1000, 9999) . "." . $R_Signed_Certification_Agreement;
    $R_Signed_Certification_Agreement2 = $_FILES["R_Signed_Certification_Agreement"]["name"];
    if ($_FILES["R_Signed_Certification_Agreement"]["name"] != '') {
        if (strtolower(end(explode(".", $R_Signed_Certification_Agreement2))) == "pdf") {
            if (move_uploaded_file($_FILES["R_Signed_Certification_Agreement"]["tmp_name"], "CBDocument/" . $R_Signed_Certification_Agreement1)) {
                $R_Signed_Certification_Agreement_New = $R_Signed_Certification_Agreement1;
                $query_insert3r1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Signed_Certification_Agreement`='$R_Signed_Certification_Agreement_New' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
            }
        }
    }
 }


 if ($_FILES['R_Scope'] != '') {
    $R_Scopeext = pathinfo($_FILES['R_Scope']['name'], PATHINFO_EXTENSION);
    $R_Scope1 = time() . rand(1000, 9999) . "." . $R_Scopeext;
    $R_Scope2 = $_FILES["R_Scope"]["name"];
    if ($_FILES["R_Scope"]["name"] != '') {
        if (strtolower(end(explode(".", $R_Scope2))) == "pdf") {
            if (move_uploaded_file($_FILES["R_Scope"]["tmp_name"], "CBDocument/" . $R_Scope1)) {
                $R_Scope = $R_Scope1;
                $query_insert3r1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Scope`='$R_Scope' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
            }
        }
    }
 }



     if ($_FILES['S_Document_Upload'] != '') {
         $extensioncgs1 = pathinfo($_FILES['S_Document_Upload']['name'], PATHINFO_EXTENSION);
         $S_Document_Upload1 = time() . rand(1000, 9999) . "." . $extensioncgs1;
         $S_Document_Upload2 = $_FILES["S_Document_Upload"]["name"];
         if ($_FILES["S_Document_Upload"]["name"] != '') {
             if (strtolower(end(explode(".", $S_Document_Upload2))) == "pdf") {
                 if (move_uploaded_file($_FILES["S_Document_Upload"]["tmp_name"], "CBDocument/" . $S_Document_Upload1)) {
                     $S_Document_Upload = $S_Document_Upload1;
                     $query_insert4 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `S_Document_Upload`='$S_Document_Upload' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }


     if ($_FILES['W_Document_Upload'] != '') {
         $extensioncgw1 = pathinfo($_FILES['W_Document_Upload']['name'], PATHINFO_EXTENSION);
         $W_Document_Upload1 = time() . rand(1000, 9999) . "." . $extensioncgw1;
         $W_Document_Upload2 = $_FILES["W_Document_Upload"]["name"];
         if ($_FILES["W_Document_Upload"]["name"] != '') {
             if (strtolower(end(explode(".", $W_Document_Upload2))) == "pdf") {
                 if (move_uploaded_file($_FILES["W_Document_Upload"]["tmp_name"], "CBDocument/" . $W_Document_Upload1)) {
                     $W_Document_Upload = $W_Document_Upload1;
                     $query_insert5 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `W_Document_Upload`='$W_Document_Upload' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }
     if ($_FILES['E_Document_Upload'] != '') {
       $E_Document_Upload = pathinfo($_FILES['E_Document_Upload']['name'], PATHINFO_EXTENSION);
       $E_Document_Upload1 = time() . rand(1000, 9999) . "." . $E_Document_Upload;
       $E_Document_Upload2 = $_FILES["W_Document_Upload"]["name"];
       if ($_FILES["E_Document_Upload"]["name"] != '') {
           if (strtolower(end(explode(".", $E_Document_Upload2))) == "pdf") {
               if (move_uploaded_file($_FILES["E_Document_Upload"]["tmp_name"], "CBDocument/" . $E_Document_Upload1)) {
                   $E_Document_Upload_New = $E_Document_Upload1;
                   $query_insert5e = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `E_Document_Upload`='$E_Document_Upload_New' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
               }
           }
       }
   }


     if ($_FILES['Status_of_IndGAP_Document'] != '') {
         $extension1 = pathinfo($_FILES['Status_of_IndGAP_Document']['name'], PATHINFO_EXTENSION);
         $Status_of_IndGAP_Document1 = time() . rand(1000, 9999) . "." . $extension1;
         $Status_of_IndGAP_Document2 = $_FILES["Status_of_IndGAP_Document"]["name"];
         if ($_FILES["Status_of_IndGAP_Document"]["name"] != '') {
             if (strtolower(end(explode(".", $Status_of_IndGAP_Document2))) == "pdf") {
                 if (move_uploaded_file($_FILES["Status_of_IndGAP_Document"]["tmp_name"], "CBDocument/" . $Status_of_IndGAP_Document1)) {
                     $Status_of_IndGAP_Document = $Status_of_IndGAP_Document1;
                     $query_insert6 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Status_of_IndGAP_Document`='$Status_of_IndGAP_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['ClientSignedApplicationFormForRegistration'] != '') {
         $extension3 = pathinfo($_FILES['ClientSignedApplicationFormForRegistration']['name'], PATHINFO_EXTENSION);
         $ClientSignedApplicationFormForRegistration1 = time() . rand(1000, 9999) . "." . $extension3;
         $ClientSignedApplicationFormForRegistration2 = $_FILES["ClientSignedApplicationFormForRegistration"]["name"];
         if ($_FILES["ClientSignedApplicationFormForRegistration"]["name"] != '') {
             if (strtolower(end(explode(".", $ClientSignedApplicationFormForRegistration2))) == "pdf") {
                 if (move_uploaded_file($_FILES["ClientSignedApplicationFormForRegistration"]["tmp_name"], "CBDocument/" . $ClientSignedApplicationFormForRegistration1)) {
                     $ClientSignedApplicationFormForRegistration = $ClientSignedApplicationFormForRegistration1;
                     $query_insert7 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientSignedApplicationFormForRegistration`='$ClientSignedApplicationFormForRegistration' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['CertificationAgreementSigned_Document'] != '') {
         $extension4 = pathinfo($_FILES['CertificationAgreementSigned_Document']['name'], PATHINFO_EXTENSION);
         $CertificationAgreementSigned_Document1 = time() . rand(1000, 9999) . "." . $extension4;
         $CertificationAgreementSigned_Document2 = $_FILES["CertificationAgreementSigned_Document"]["name"];
         if ($_FILES["CertificationAgreementSigned_Document"]["name"] != '') {
             if (strtolower(end(explode(".", $CertificationAgreementSigned_Document2))) == "pdf") {
                 if (move_uploaded_file($_FILES["CertificationAgreementSigned_Document"]["tmp_name"], "CBDocument/" . $CertificationAgreementSigned_Document1)) {
                     $CertificationAgreementSigned_Document = $CertificationAgreementSigned_Document1;
                     $query_insert8 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CertificationAgreementSigned_Document`='$CertificationAgreementSigned_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['Scope_Document'] != '') {
         $extension5 = pathinfo($_FILES['Scope_Document']['name'], PATHINFO_EXTENSION);
         $Scope_Document1 = time() . rand(1000, 9999) . "." . $extension5;
         $Scope_Document2 = $_FILES["Scope_Document"]["name"];
         if ($_FILES["Scope_Document"]["name"] != '') {
             if (strtolower(end(explode(".", $Scope_Document2))) == "pdf") {
                 if (move_uploaded_file($_FILES["Scope_Document"]["tmp_name"], "CBDocument/" . $Scope_Document1)) {
                     $Scope_Document = $Scope_Document1;
                     $query_insert9 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Scope_Document`='$Scope_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['MassBalanceGranting_Document'] != '') {
         $extension6 = pathinfo($_FILES['MassBalanceGranting_Document']['name'], PATHINFO_EXTENSION);
         $MassBalanceGranting_Document1 = time() . rand(1000, 9999) . "." . $extension6;
         $MassBalanceGranting_Document2 = $_FILES["MassBalanceGranting_Document"]["name"];
         if ($_FILES["MassBalanceGranting_Document"]["name"] != '') {
             if (strtolower(end(explode(".", $MassBalanceGranting_Document2))) == "pdf") {
                 if (move_uploaded_file($_FILES["MassBalanceGranting_Document"]["tmp_name"], "CBDocument/" . $MassBalanceGranting_Document1)) {
                     $MassBalanceGranting_Document = $MassBalanceGranting_Document1;
                     $query_insert10 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `MassBalanceGranting_Document`='$MassBalanceGranting_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['CBProcedure_Document'] != '') {
         $extension7 = pathinfo($_FILES['CBProcedure_Document']['name'], PATHINFO_EXTENSION);
         $CBProcedure_Document1 = time() . rand(1000, 9999) . "." . $extension7;
         $CBProcedure_Document2 = $_FILES["CBProcedure_Document"]["name"];
         if ($_FILES["CBProcedure_Document"]["name"] != '') {
             if (strtolower(end(explode(".", $CBProcedure_Document2))) == "pdf") {
                 if (move_uploaded_file($_FILES["CBProcedure_Document"]["tmp_name"], "CBDocument/" . $CBProcedure_Document1)) {
                     $CBProcedure_Document = $CBProcedure_Document1;
                     $query_insert11 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CBProcedure_Document`='$CBProcedure_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['OtherDocument'] != '') {
         $extension8 = pathinfo($_FILES['OtherDocument']['name'], PATHINFO_EXTENSION);
         $OtherDocument1 = time() . rand(1000, 9999) . "." . $extension8;
         $OtherDocument2 = $_FILES["OtherDocument"]["name"];
         if ($_FILES["OtherDocument"]["name"] != '') {
             if (strtolower(end(explode(".", $OtherDocument2))) == "pdf") {
                 if (move_uploaded_file($_FILES["OtherDocument"]["tmp_name"], "CBDocument/" . $OtherDocument1)) {
                     $OtherDocument = $OtherDocument1;
                     $query_insert12 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `OtherDocument`='$OtherDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['AssessmentReportDocument'] != '') {
         $extension9 = pathinfo($_FILES['AssessmentReportDocument']['name'], PATHINFO_EXTENSION);
         $AssessmentReportDocument1 = time() . rand(1000, 9999) . "." . $extension9;
         $AssessmentReportDocument2 = $_FILES["AssessmentReportDocument"]["name"];
         if ($_FILES["AssessmentReportDocument"]["name"] != '') {
             if (strtolower(end(explode(".", $AssessmentReportDocument2))) == "pdf") {
                 if (move_uploaded_file($_FILES["AssessmentReportDocument"]["tmp_name"], "CBDocument/" . $AssessmentReportDocument1)) {
                     $AssessmentReportDocument = $AssessmentReportDocument1;
                     $query_insert13 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `AssessmentReportDocument`='$AssessmentReportDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['NonConformityReportsDocument'] != '') {
         $extension10 = pathinfo($_FILES['NonConformityReportsDocument']['name'], PATHINFO_EXTENSION);
         $NonConformityReportsDocument1 = time() . rand(1000, 9999) . "." . $extension10;
         $NonConformityReportsDocument2 = $_FILES["NonConformityReportsDocument"]["name"];
         if ($_FILES["NonConformityReportsDocument"]["name"] != '') {
             if (strtolower(end(explode(".", $NonConformityReportsDocument2))) == "pdf") {
                 if (move_uploaded_file($_FILES["NonConformityReportsDocument"]["tmp_name"], "CBDocument/" . $NonConformityReportsDocument1)) {
                     $NonConformityReportsDocument = $NonConformityReportsDocument1;
                     $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument`='$NonConformityReportsDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['NonConformityReportsDocument_two'] != '') {
       $extension101 = pathinfo($_FILES['NonConformityReportsDocument_two']['name'], PATHINFO_EXTENSION);
       $NonConformityReportsDocument11 = time() . rand(1000, 9999) . "." . $extension101;
       $NonConformityReportsDocument22 = $_FILES["NonConformityReportsDocument_two"]["name"];
       if ($_FILES["NonConformityReportsDocument_two"]["name"] != '') {
           if (strtolower(end(explode(".", $NonConformityReportsDocument22))) == "pdf") {
               if (move_uploaded_file($_FILES["NonConformityReportsDocument_two"]["tmp_name"], "CBDocument/" . $NonConformityReportsDocument11)) {
                   $NonConformityReportsDocument_two = $NonConformityReportsDocument11;
                   $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument_two`='$NonConformityReportsDocument_two' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
               }
           }
       }
   }

   if ($_FILES['NonConformityReportsDocument_three'] != '') {
    $extension102 = pathinfo($_FILES['NonConformityReportsDocument_three']['name'], PATHINFO_EXTENSION);
    $NonConformityReportsDocument12 = time() . rand(1000, 9999) . "." . $extension102;
    $NonConformityReportsDocument23 = $_FILES["NonConformityReportsDocument_three"]["name"];
    if ($_FILES["NonConformityReportsDocument_three"]["name"] != '') {
        if (strtolower(end(explode(".", $NonConformityReportsDocument23))) == "pdf") {
            if (move_uploaded_file($_FILES["NonConformityReportsDocument_three"]["tmp_name"], "CBDocument/" . $NonConformityReportsDocument12)) {
                $NonConformityReportsDocument_three = $NonConformityReportsDocument12;
                $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument_three`='$NonConformityReportsDocument_three' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
            }
        }
    }
}
if ($_FILES['Granted_Scope_Document'] != '') {
 $extension51 = pathinfo($_FILES['Granted_Scope_Document']['name'], PATHINFO_EXTENSION);
 $Granted_Scope_Document1 = time() . rand(1000, 9999) . "." . $extension51;
 $Granted_Scope_Document2 = $_FILES["Granted_Scope_Document"]["name"];
 if ($_FILES["Granted_Scope_Document"]["name"] != '') {
     if (strtolower(end(explode(".", $Granted_Scope_Document2))) == "pdf") {
         if (move_uploaded_file($_FILES["Granted_Scope_Document"]["tmp_name"], "CBDocument/" . $Granted_Scope_Document1)) {
             $Granted_Scope_Document = $Granted_Scope_Document1;
             $query_insert9 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Granted_Scope_Document`='$Granted_Scope_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
         }
     }
 }
}

     if ($_FILES['AssessmentScheduleDocument'] != '') {
         $extension11 = pathinfo($_FILES['AssessmentScheduleDocument']['name'], PATHINFO_EXTENSION);
         $AssessmentScheduleDocument1 = time() . rand(1000, 9999) . "." . $extension11;
         $AssessmentScheduleDocument2 = $_FILES["AssessmentScheduleDocument"]["name"];
         if ($_FILES["AssessmentScheduleDocument"]["name"] != '') {
             if (strtolower(end(explode(".", $AssessmentScheduleDocument2))) == "pdf") {
                 if (move_uploaded_file($_FILES["AssessmentScheduleDocument"]["tmp_name"], "CBDocument/" . $AssessmentScheduleDocument1)) {
                     $AssessmentScheduleDocument = $AssessmentScheduleDocument1;
                     $query_insert15 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `AssessmentScheduleDocument`='$AssessmentScheduleDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['ClientqualifiedinternalinspectorsDocument'] != '') {
         $extension12 = pathinfo($_FILES['ClientqualifiedinternalinspectorsDocument']['name'], PATHINFO_EXTENSION);
         $ClientqualifiedinternalinspectorsDocument1 = time() . rand(1000, 9999) . "." . $extension12;
         $ClientqualifiedinternalinspectorsDocument2 = $_FILES["ClientqualifiedinternalinspectorsDocument"]["name"];
         if ($_FILES["ClientqualifiedinternalinspectorsDocument"]["name"] != '') {
             if (strtolower(end(explode(".", $ClientqualifiedinternalinspectorsDocument2))) == "pdf") {
                 if (move_uploaded_file($_FILES["ClientqualifiedinternalinspectorsDocument"]["tmp_name"], "CBDocument/" . $ClientqualifiedinternalinspectorsDocument1)) {
                     $ClientqualifiedinternalinspectorsDocument = $ClientqualifiedinternalinspectorsDocument1;
                     $query_insert16 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientqualifiedinternalinspectorsDocument`='$ClientqualifiedinternalinspectorsDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

     if ($_FILES['DescriptionOfCompliance_Document'] != '') {
      $extension14 = pathinfo($_FILES['DescriptionOfCompliance_Document']['name'], PATHINFO_EXTENSION);
      $DescriptionOfCompliance_Document1 = time() . rand(1000, 9999) . "." . $extension14;
      $DescriptionOfCompliance_Document2 = $_FILES["DescriptionOfCompliance_Document"]["name"];
      if ($_FILES["DescriptionOfCompliance_Document"]["name"] != '') {
          if (strtolower(end(explode(".", $DescriptionOfCompliance_Document2))) == "pdf") {
              if (move_uploaded_file($_FILES["DescriptionOfCompliance_Document"]["tmp_name"], "CBDocument/" . $DescriptionOfCompliance_Document1)) {
                  $DescriptionOfCompliance_Document = $DescriptionOfCompliance_Document1;
                  $query_insert16 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `DescriptionOfCompliance_Document`='$DescriptionOfCompliance_Document' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
              }
          }
      }
  }

     if ($_FILES['ClientqualifiedInternalAuditorsDocument'] != '') {
         $extension13 = pathinfo($_FILES['ClientqualifiedInternalAuditorsDocument']['name'], PATHINFO_EXTENSION);
         $ClientqualifiedInternalAuditorsDocument1 = time() . rand(1000, 9999) . "." . $extension13;
         $ClientqualifiedInternalAuditorsDocument2 = $_FILES["ClientqualifiedInternalAuditorsDocument"]["name"];
         if ($_FILES["ClientqualifiedInternalAuditorsDocument"]["name"] != '') {
             if (strtolower(end(explode(".", $ClientqualifiedInternalAuditorsDocument2))) == "pdf") {
                 if (move_uploaded_file($_FILES["ClientqualifiedInternalAuditorsDocument"]["tmp_name"], "CBDocument/" . $ClientqualifiedInternalAuditorsDocument1)) {
                     $ClientqualifiedInternalAuditorsDocument = $ClientqualifiedInternalAuditorsDocument1;
                     $query_insert17 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientqualifiedInternalAuditorsDocument`='$ClientqualifiedInternalAuditorsDocument' WHERE FPO_Registration_ID = '$id' AND CB_User = '$_SESSION[cb_Name]' AND CB_User_Email = '$_SESSION[cb_Email]' AND CB_User_Phone = '$_SESSION[cb_Mobile]' AND Deleted_Status = '0'");
                 }
             }
         }
     }

       }

       
       if ($query_insert) {
           echo "<script>alert('FPO Record Successfully Saved.')</script>";
           echo "<script>window.location.href = 'cb_profile_summary.php'</script>";
         //   echo "<script>window.location.href = 'edit_cb_profile_summary.php?id=" . $id . "</script>";
       } else {
           echo "<script>alert('FPO Record Not Saved.')</script>";
         //   echo "<script>window.location.href = 'edit_cb_profile_summary.php?id=" . $id . "'</script>";
       }
   }
   ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Edit FPO Record</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
</head>

<body style="background-image: url('images/fpo-bg2.jpg');background-repeat: repeat-y;background-position: center;">
    <?php include "cb_header.php"; ?>
    <main id="main">
        <div class="slider img">
            <img src="assets/img/slide/slider.jpg">
        </div>
        <div class="container mt-5 mb-5">
            <div class="section-title">
                <h2>
                    <?php echo $FPOExporterName ?> - (
                    <?php if(empty($row['FPO_UniqueCode'])){ echo "NA"; } else { echo $row['FPO_UniqueCode']; } ?>)
                </h2>
            </div>
            <div class="form-1">
                <?php
                  $msg = $_GET['msg'];
                  if ($msg == 'fail') { ?>
                <center>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bs-component">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Production not saved.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                <?php
                  } ?>
                <?php
                  $msg = $_GET['msg'];
                  if ($msg == 'success') { ?>
                <center>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bs-component">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Production successfully saved.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                <?php
                  } ?>
                <form method="POST" enctype="multipart/form-data" autocomplete="off">
                    <h4 class="heading-text mt-3 mb-3 fb"><strong>QMS Audit</strong></h4>
                    <div class="sprt-box pb-5">
                        <div class="row">
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Auditor Name</label>
                                <input value="" type="text" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Audit Dates</label>
                                <input value="" type="date" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Name of Operator</label>
                                <input value="" type="text" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Date of Upload</label>
                                <input value="" type="date" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Document Upload</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3 text-end">
                                <p class="mb-2">&nbsp;</p>
                                <button type="button" class="btn btn-outline-success" name="" value="">Add More</button>
                            </div>
                        </div>
                    </div>


                    <h4 class="heading-text mt-3 mb-3 fb"><strong>PMU Inspection</strong></h4>
                    <div class="sprt-box pb-5">
                        <div class="row">
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Inspector Name</label>
                                <input value="" type="text" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Unique Number</label>
                                <input value="" type="text" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Inspection Dates</label>
                                <input value="" type="date" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Name of Producer Member</label>
                                <input value="" type="text" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Date of Upload</label>
                                <input value="" type="date" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <label class="mb-2">Document Upload</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-12 form-group mt-3 text-end">
                                <p class="mb-2">&nbsp;</p>
                                <button type="button" class="btn btn-outline-success" name="" value="">Add More</button>
                            </div>
                        </div>
                    </div>


                    <h4 class="heading-text mt-3 mb-3">Non-Conformity Reports</h4>
                    <h4 class="heading-text mt-3 mb-3"><strong>QMS Audit</strong></h4>
                    <div class="sprt-box pb-5">
                        <div class="row">
                            <div class="col-md-5 form-group mt-3">
                                <label class="mb-2">Date</label>
                                <input value="" type="date" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-5 form-group mt-3">
                                <label class="mb-2">Document Upload</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-2 form-group mt-3 text-end">
                                <p class="mb-2">&nbsp;</p>
                                <button type="button" class="btn btn-outline-success" name="" value="">Add More</button>
                            </div>
                        </div>
                    </div>


                    <h4 class="heading-text mt-3 mb-3"><strong>Producer Member Inspection </strong></h4>
                    <div class="sprt-box pb-5">
                        <div class="row">
                            <div class="col-md-6 form-group mt-3">
                                <label class="mb-2">Name of Producer Member</label>
                                <input value="" type="text" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label class="mb-2">Unique Number</label>
                                <input value="" type="text" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label class="mb-2">Date</label>
                                <input value="" type="date" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label class="mb-2">Document Upload</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-12 form-group mt-3 text-end">
                                <p class="mb-2">&nbsp;</p>
                                <button type="button" class="btn btn-outline-success" name="" value="">Add More</button>
                            </div>
                        </div>
                    </div>

                    <h4 class="heading-text mt-3 mb-3"><strong>Sample Collection for Residue Testing</strong></h4>
                    <div class="sprt-box pb-5">
                        <div class="row">
                            <!--<div class="col-md-4 form-group mt-3">-->
                            <!--    <label class="mb-2">Name of the Producer</label>-->
                            <!--    <input value="" type="text" name="" class="form-control" placeholder="">-->
                            <!--</div>-->
                            <!--<div class="col-md-4 form-group mt-3">-->
                            <!--    <label class="mb-2">Unique Number</label>-->
                            <!--    <input value="" type="text" name="" class="form-control" placeholder="">-->
                            <!--</div>-->
                            <!--<div class="col-md-4 form-group mt-3">-->
                            <!--    <label class="mb-2">Number of Samples</label>-->
                            <!--    <input value="" type="text" name="" class="form-control" placeholder="">-->
                            <!--</div>-->
                            <div class="col-md-6 form-group mt-3">
                                <label class="mb-2">Sample slip (Document upload)</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label class="mb-2">Any other Document</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>

                    <h4 class="heading-text mt-3 mb-3"><strong>Any other documents</strong></h4>
                    <div class="sprt-box pb-5">
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label class="mb-2">Any other Document</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>

                    <h4 class="heading-text mt-3 mb-3"><strong>Technical Review Report</strong></h4>
                    <div class="sprt-box pb-5">
                        <div class="row">
                            <div class="col-md-6 form-group mt-3">
                                <label class="mb-2">Document Upload</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label class="mb-2">Any Other Document</label>
                                <input value="" type="file" name="" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>

                    <div class="text-right pt-4">
                        <input type="submit" value="Submit" name="" class="btn btn-success">
                    </div>

                </form>
            </div>
        </div>
    </main>
    <?php include "footer.php"; ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script>
        // var Privileges = jQuery('#IndGAP_Status');
        var select = this.value;
        jQuery('#IndGAP_Status').change(function () {
            if ($(this).val() == 'Registered') {
                $('.registered').show();
                $('.suspension').hide();
                $('.grant').hide();
                $('.withdraw').hide();
                $('.expired').hide();
            }
            if ($(this).val() == 'Granted') {
                $('.grant').show();
                $('.suspension').hide();
                $('.withdraw').hide();
                $('.expired').hide();
                $('.registered').hide();
            }
            if ($(this).val() == 'Suspended') {
                $('.suspension').show();
                $('.grant').hide();
                $('.withdraw').hide();
                $('.expired').hide();
                $('.registered').hide();
            }
            if ($(this).val() == 'Withdrawal') {
                $('.withdraw').show();
                $('.suspension').hide();
                $('.grant').hide();
                $('.expired').hide();
                $('.registered').hide();
            }
            if ($(this).val() == 'Expired') {
                $('.expired').show();
                $('.withdraw').hide();
                $('.suspension').hide();
                $('.grant').hide();
                $('.registered').hide();
            }
            // else $('.application-box').hide();
        });
    </script>

    <script>
        $(document).ready(function () {
            $("#registered-box").click(function () {
                $("#registered").addClass("Registered-hidden");
                $("#registered").css("display", "none");
            });
        });
        $(document).ready(function () {
            $("#grant-box").click(function () {
                $("#grant").addClass("Grant-hidden");
                $("#grant").css("display", "none");
            });
        });

        $(document).ready(function () {
            $("#suspension-box").click(function () {
                $("#suspension").addClass("suspension-hidden");
                $("#suspension").css("display", "none");
            });
        });

        $(document).ready(function () {
            $("#withdraw-box").click(function () {
                $("#withdraw").addClass("withdraw-hidden");
                $("#withdraw").css("display", "none");
            });
        });

        $(document).ready(function () {
            $("#expired-box").click(function () {
                $("#expired").addClass("expired-hidden");
                $("#expired").css("display", "none");
            });
        });
    </script>
</body>

</html>