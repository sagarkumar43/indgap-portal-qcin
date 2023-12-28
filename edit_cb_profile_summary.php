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
$Deleted_Status = 0;

if (isset($_POST['Submit'])) {
    $FPO_Registration_ID = mysqli_real_escape_string($db, $_GET["id"]);
    $CB_User = mysqli_real_escape_string($db, $_SESSION["cb_Name"]);
    $CB_User_Email = mysqli_real_escape_string($db, $_SESSION["cb_Email"]);
    $CB_User_Phone = mysqli_real_escape_string($db, $_SESSION["cb_Mobile"]);
     $Unique_Number = mysqli_real_escape_string($db, $_POST['Unique_Number']);
    $Status_of_IndGAP = mysqli_real_escape_string($db, $_POST['Status_of_IndGAP']);
    $CG_Client_Name = mysqli_real_escape_string($db, $_POST['CG_Client_Name']);
    $CG_Current_Status = mysqli_real_escape_string($db, $_POST['CG_Current_Status']);
    $CG_Certificate_No = mysqli_real_escape_string($db, $_POST['CG_Certificate_No']);
    $CG_Certificate_Date = mysqli_real_escape_string($db, $_POST['CG_Certificate_Date']);
    $CG_Certificate_End_Date = mysqli_real_escape_string($db, $_POST['CG_Certificate_End_Date']);
    $CG_Certificate_Renewal_Date = mysqli_real_escape_string($db, $_POST['CG_Certificate_Renewal_Date']);
    $R_Client_Name = mysqli_real_escape_string($db, $_POST['R_Client_Name']);
    $R_Current_Status = mysqli_real_escape_string($db, $_POST['R_Current_Status']);
    $DescriptionOfCompliance = mysqli_real_escape_string($db, $_POST['DescriptionOfCompliance']);
     $S_Client_Name = mysqli_real_escape_string($db, $_POST['S_Client_Name']);
     $S_Certificate_Issue_Date = mysqli_real_escape_string($db, $_POST['S_Certificate_Issue_Date']);
    $S_Certificate_Validity_Date = mysqli_real_escape_string($db, $_POST['S_Certificate_Validity_Date']);
    $S_Suspended_Date = mysqli_real_escape_string($db, $_POST['S_Suspended_Date']);
    $S_Reason_for_Suspended = mysqli_real_escape_string($db, $_POST['S_Reason_for_Suspended']);
    $OtherDocument_Discription = mysqli_real_escape_string($db, $_POST['OtherDocument_Discription']);
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
    $query3 = mysqli_query($db, "SELECT * from `cb_user_edit_fpo_profile` WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
    $row3_num = mysqli_num_rows($query3);
    if ($row3_num == 1) {
        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Unique_Number`='$Unique_Number',`Status_of_IndGAP`='$Status_of_IndGAP',`R_Client_Name`='$R_Client_Name',`R_Current_Status`='$R_Current_Status',`CG_Client_Name`='$CG_Client_Name',`CG_Current_Status`='$CG_Current_Status',`S_Client_Name`='$S_Client_Name',`S_Reason_for_Suspended`='$S_Reason_for_Suspended',`W_Client_Name`='$W_Client_Name', `W_Reason_for_Withdrawal`='$W_Reason_for_Withdrawal', `E_Client_Name`='$E_Client_Name',`AssessmentReport`='$AssessmentReport',`AuditManDaysSpentByCB`='$AuditManDaysSpentByCB',`QMSAudit`='$QMSAudit',`MembersInspections`='$MembersInspections',`NonConformityReports`='$NonConformityReports',`ClientCorrectiveActions`='$ClientCorrectiveActions',`CBClosure`='$CBClosure',`CBAssessmentSchedule`='$CBAssessmentSchedule',`ScheduleDate`='$ScheduleDate',`ClientSigned_Document`='$ClientSigned_Document',`GrantedScopeStatus`='$GrantedScopeStatus',`CertificationAgreement_Document_Name`='$CertificationAgreement_Document_Name',`ScopeStatus`='$ScopeStatus',`Scope_Document_Name`='$Scope_Document_Name',`Clientqualifiedinternalinspectors`='$Clientqualifiedinternalinspectors',`ClientqualifiedInternalAuditors`='$ClientqualifiedInternalAuditors',`OtherDocument_Discription`='$OtherDocument_Discription',`MassBalanceGranting_Document_Name`='$MassBalanceGranting_Document_Name',`DescriptionOfCompliance`='$DescriptionOfCompliance',`MassBalanceGranting_Document_Date`='$MassBalanceGranting_Document_Date',`CG_Certificate_No`='$CG_Certificate_No',`CG_Certificate_Date`='$CG_Certificate_Date',`CG_Certificate_End_Date`='$CG_Certificate_End_Date',`CG_Certificate_Renewal_Date`='$CG_Certificate_Renewal_Date',`CBProcedure_DocumentName`='$CBProcedure_DocumentName',`ClientFeedback`='$ClientFeedback',`OtherDocument_Name`='$OtherDocument_Name' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
        
        $query_insert1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `S_Certificate_Issue_Date`='$S_Certificate_Issue_Date', `S_Certificate_Validity_Date`='$S_Certificate_Validity_Date', `S_Suspended_Date`='$S_Suspended_Date' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");

        $query_insert2 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `W_Certificate_Issue_Date`='$W_Certificate_Issue_Date', `W_Certificate_Validity_Date`='$W_Certificate_Validity_Date', `W_Withdrawal_Date`='$W_Withdrawal_Date' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");

        $query_insert3 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `E_Certificate_Issue_Date`='$E_Certificate_Issue_Date', `E_Certificate_Validity_Date`='$E_Certificate_Validity_Date', `E_Reason_for_Expired`='$E_Reason_for_Expired' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");

        if ($_FILES['CG_Client_Application_Form'] != '') {
            $extensioncg1 = pathinfo($_FILES['CG_Client_Application_Form']['name'], PATHINFO_EXTENSION);
            $CG_Client_Application_Form1 = time() . rand(1000, 9999) . "." . $extensioncg1;
            $CG_Client_Application_Form2 = $_FILES["CG_Client_Application_Form"]["name"];
            if ($_FILES["CG_Client_Application_Form"]["name"] != '') {
                if (strtolower(end(explode(".", $CG_Client_Application_Form2))) == "pdf") {
                    if (move_uploaded_file($_FILES["CG_Client_Application_Form"]["tmp_name"], "CBDocument/" . $CG_Client_Application_Form1)) {
                        $CG_Client_Application_Form = $CG_Client_Application_Form1;
                        $query_insert1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Client_Application_Form`='$CG_Client_Application_Form' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert2 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Signed_Certification_Agreement`='$CG_Signed_Certification_Agreement' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert3 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Scope`='$CG_Scope' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert3r = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Client_Application_Form`='$R_Client_Application_Form_New' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert3r1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Signed_Certification_Agreement`='$R_Signed_Certification_Agreement_New' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert3r1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Scope`='$R_Scope' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert4 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `S_Document_Upload`='$S_Document_Upload' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert5 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `W_Document_Upload`='$W_Document_Upload' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert5e = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `E_Document_Upload`='$E_Document_Upload_New' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert6 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Status_of_IndGAP_Document`='$Status_of_IndGAP_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert7 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientSignedApplicationFormForRegistration`='$ClientSignedApplicationFormForRegistration' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert8 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CertificationAgreementSigned_Document`='$CertificationAgreementSigned_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert9 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Scope_Document`='$Scope_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert10 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `MassBalanceGranting_Document`='$MassBalanceGranting_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert11 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CBProcedure_Document`='$CBProcedure_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert12 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `OtherDocument`='$OtherDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert13 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `AssessmentReportDocument`='$AssessmentReportDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument`='$NonConformityReportsDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument_two`='$NonConformityReportsDocument_two' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument_three`='$NonConformityReportsDocument_three' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert9 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Granted_Scope_Document`='$Granted_Scope_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert15 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `AssessmentScheduleDocument`='$AssessmentScheduleDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert16 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientqualifiedinternalinspectorsDocument`='$ClientqualifiedinternalinspectorsDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert17 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientqualifiedInternalAuditorsDocument`='$ClientqualifiedInternalAuditorsDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert16 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `DescriptionOfCompliance_Document`='$DescriptionOfCompliance_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }


        if ($_FILES['ResidueAnalysisDocument'] != '') {
            $extension = pathinfo($_FILES['ResidueAnalysisDocument']['name'], PATHINFO_EXTENSION);
            $ResidueAnalysisDocument1 = time() . rand(1000, 9999) . "." . $extension;
            $ResidueAnalysisDocument2 = $_FILES["ResidueAnalysisDocument"]["name"];
            if ($_FILES["ResidueAnalysisDocument"]["name"] != '') {
                if (strtolower(end(explode(".", $ResidueAnalysisDocument2))) == "pdf") {
                    if (move_uploaded_file($_FILES["ResidueAnalysisDocument"]["tmp_name"], "CBDocument/" . $ResidueAnalysisDocument1)) {
                        $ResidueAnalysisDocument = $ResidueAnalysisDocument1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ResidueAnalysisDocument`='$ResidueAnalysisDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['QMSChecklist'] != '') {
            $extension = pathinfo($_FILES['QMSChecklist']['name'], PATHINFO_EXTENSION);
            $QMSChecklist1 = time() . rand(1000, 9999) . "." . $extension;
            $QMSChecklist2 = $_FILES["QMSChecklist"]["name"];
            if ($_FILES["QMSChecklist"]["name"] != '') {
                if (strtolower(end(explode(".", $QMSChecklist2))) == "pdf") {
                    if (move_uploaded_file($_FILES["QMSChecklist"]["tmp_name"], "CBDocument/" . $QMSChecklist1)) {
                        $QMSChecklist = $QMSChecklist1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `QMSChecklist`='$QMSChecklist' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['CPCCChecklists'] != '') {
            $extension = pathinfo($_FILES['CPCCChecklists']['name'], PATHINFO_EXTENSION);
            $CPCCChecklists1 = time() . rand(1000, 9999) . "." . $extension;
            $CPCCChecklists2 = $_FILES["CPCCChecklists"]["name"];
            if ($_FILES["CPCCChecklists"]["name"] != '') {
                if (strtolower(end(explode(".", $CPCCChecklists2))) == "pdf") {
                    if (move_uploaded_file($_FILES["CPCCChecklists"]["tmp_name"], "CBDocument/" . $CPCCChecklists1)) {
                        $CPCCChecklists = $CPCCChecklists1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CPCCChecklists`='$CPCCChecklists' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['Sampleslip'] != '') {
            $extension = pathinfo($_FILES['Sampleslip']['name'], PATHINFO_EXTENSION);
            $Sampleslip1 = time() . rand(1000, 9999) . "." . $extension;
            $Sampleslip2 = $_FILES["Sampleslip"]["name"];
            if ($_FILES["Sampleslip"]["name"] != '') {
                if (strtolower(end(explode(".", $Sampleslip2))) == "pdf") {
                    if (move_uploaded_file($_FILES["Sampleslip"]["tmp_name"], "CBDocument/" . $Sampleslip1)) {
                        $Sampleslip = $Sampleslip1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Sampleslip`='$Sampleslip' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['TechnicalReviewReport'] != '') {
            $extension = pathinfo($_FILES['TechnicalReviewReport']['name'], PATHINFO_EXTENSION);
            $TechnicalReviewReport1 = time() . rand(1000, 9999) . "." . $extension;
            $TechnicalReviewReport2 = $_FILES["TechnicalReviewReport"]["name"];
            if ($_FILES["TechnicalReviewReport"]["name"] != '') {
                if (strtolower(end(explode(".", $TechnicalReviewReport2))) == "pdf") {
                    if (move_uploaded_file($_FILES["TechnicalReviewReport"]["tmp_name"], "CBDocument/" . $TechnicalReviewReport1)) {
                        $TechnicalReviewReport = $TechnicalReviewReport1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `TechnicalReviewReport`='$TechnicalReviewReport' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['CertificationCommitteeReport'] != '') {
            $extension = pathinfo($_FILES['CertificationCommitteeReport']['name'], PATHINFO_EXTENSION);
            $CertificationCommitteeReport1 = time() . rand(1000, 9999) . "." . $extension;
            $CertificationCommitteeReport2 = $_FILES["CertificationCommitteeReport"]["name"];
            if ($_FILES["CertificationCommitteeReport"]["name"] != '') {
                if (strtolower(end(explode(".", $CertificationCommitteeReport2))) == "pdf") {
                    if (move_uploaded_file($_FILES["CertificationCommitteeReport"]["tmp_name"], "CBDocument/" . $CertificationCommitteeReport1)) {
                        $CertificationCommitteeReport = $CertificationCommitteeReport1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CertificationCommitteeReport`='$CertificationCommitteeReport' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['MassBalanceGrantingCertificate'] != '') {
            $extension = pathinfo($_FILES['MassBalanceGrantingCertificate']['name'], PATHINFO_EXTENSION);
            $MassBalanceGrantingCertificate1 = time() . rand(1000, 9999) . "." . $extension;
            $MassBalanceGrantingCertificate2 = $_FILES["MassBalanceGrantingCertificate"]["name"];
            if ($_FILES["MassBalanceGrantingCertificate"]["name"] != '') {
                if (strtolower(end(explode(".", $MassBalanceGrantingCertificate2))) == "pdf") {
                    if (move_uploaded_file($_FILES["MassBalanceGrantingCertificate"]["tmp_name"], "CBDocument/" . $MassBalanceGrantingCertificate1)) {
                        $MassBalanceGrantingCertificate = $MassBalanceGrantingCertificate1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `MassBalanceGrantingCertificate`='$MassBalanceGrantingCertificate' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['ProcedureforAssessmentandInspection'] != '') {
            $extension = pathinfo($_FILES['ProcedureforAssessmentandInspection']['name'], PATHINFO_EXTENSION);
            $ProcedureforAssessmentandInspection1 = time() . rand(1000, 9999) . "." . $extension;
            $ProcedureforAssessmentandInspection2 = $_FILES["ProcedureforAssessmentandInspection"]["name"];
            if ($_FILES["ProcedureforAssessmentandInspection"]["name"] != '') {
                if (strtolower(end(explode(".", $ProcedureforAssessmentandInspection2))) == "pdf") {
                    if (move_uploaded_file($_FILES["ProcedureforAssessmentandInspection"]["tmp_name"], "CBDocument/" . $ProcedureforAssessmentandInspection1)) {
                        $ProcedureforAssessmentandInspection = $ProcedureforAssessmentandInspection1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ProcedureforAssessmentandInspection`='$ProcedureforAssessmentandInspection' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['Formats'] != '') {
            $extension = pathinfo($_FILES['Formats']['name'], PATHINFO_EXTENSION);
            $Formats1 = time() . rand(1000, 9999) . "." . $extension;
            $Formats2 = $_FILES["Formats"]["name"];
            if ($_FILES["Formats"]["name"] != '') {
                if (strtolower(end(explode(".", $Formats2))) == "pdf") {
                    if (move_uploaded_file($_FILES["Formats"]["tmp_name"], "CBDocument/" . $Formats1)) {
                        $Formats = $Formats1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Formats`='$Formats' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['Organogramwithstaffdetails'] != '') {
            $extension = pathinfo($_FILES['Organogramwithstaffdetails']['name'], PATHINFO_EXTENSION);
            $Organogramwithstaffdetails1 = time() . rand(1000, 9999) . "." . $extension;
            $Organogramwithstaffdetails2 = $_FILES["Organogramwithstaffdetails"]["name"];
            if ($_FILES["Organogramwithstaffdetails"]["name"] != '') {
                if (strtolower(end(explode(".", $Organogramwithstaffdetails2))) == "pdf") {
                    if (move_uploaded_file($_FILES["Organogramwithstaffdetails"]["tmp_name"], "CBDocument/" . $Organogramwithstaffdetails1)) {
                        $Organogramwithstaffdetails = $Organogramwithstaffdetails1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Organogramwithstaffdetails`='$Organogramwithstaffdetails' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }
       
       }else{

            $query_insert = mysqli_query($db, "INSERT INTO `cb_user_edit_fpo_profile` (`ID`, `FPO_Registration_ID`, `CB_User`, `CB_User_Email`, `CB_User_Phone`, `Status_of_IndGAP_DocumentName`, `Status_of_IndGAP_Document`, `Status_of_IndGAP`, `Unique_Number`, `R_Client_Name`, `R_Current_Status`, `R_Client_Application_Form`, `R_Signed_Certification_Agreement`, `R_Scope`, `CG_Client_Name`, `CG_Certificate_No`, `CG_Certificate_Date`, `CG_Certificate_End_Date`, `CG_Certificate_Renewal_Date`, `CG_Current_Status`, `CG_Client_Application_Form`, `CG_Signed_Certification_Agreement`, `CG_Scope`, `S_Client_Name`, `S_Certificate_Issue_Date`, `S_Certificate_Validity_Date`, `S_Suspended_Date`, `S_Reason_for_Suspended`, `S_Document_Upload`, `W_Client_Name`, `W_Certificate_Issue_Date`, `W_Certificate_Validity_Date`, `W_Withdrawal_Date`, `W_Reason_for_Withdrawal`, `W_Document_Upload`, `E_Client_Name`, `E_Certificate_Issue_Date`, `E_Certificate_Validity_Date`, `E_Reason_for_Expired`, `E_Document_Upload`, `AssessmentReport`, `AssessmentReportDocument`, `AuditManDaysSpentByCB`, `QMSAudit`, `MembersInspections`, `NonConformityReports`, `ClientCorrectiveActions`, `CBClosure`, `NonConformityReportsDocument`, `NonConformityReportsDocument_two`, `NonConformityReportsDocument_three`, `CBAssessmentSchedule`, `ScheduleDate`, `AssessmentScheduleDocument`, `ClientSignedApplicationFormForRegistration`, `ClientSigned_Document`, `CertificationAgreementSigned_Document`, `CertificationAgreement_Document_Name`, `ScopeStatus`, `Scope_Document`, `GrantedScopeStatus`, `Granted_Scope_Document`, `Scope_Document_Name`, `Clientqualifiedinternalinspectors`, `ClientqualifiedinternalinspectorsDocument`, `ClientqualifiedInternalAuditors`, `ClientqualifiedInternalAuditorsDocument`, `MassBalanceGranting_Document`, `MassBalanceGranting_Document_Name`, `MassBalanceGranting_Document_Date`, `CBProcedure_Document`, `CBProcedure_DocumentName`, `ClientFeedback`, `DescriptionOfCompliance`, `DescriptionOfCompliance_Document`, `OtherDocument`, `OtherDocument_Name`, `OtherDocument_Discription`, `ResidueAnalysisDocument`, `QMSChecklist`, `CPCCChecklists`, `Sampleslip`, `TechnicalReviewReport`, `CertificationCommitteeReport`, `MassBalanceGrantingCertificate`, `ProcedureforAssessmentandInspection`, `Formats`, `Organogramwithstaffdetails`, `Remark`, `Deleted_Status`, `CreatedDate`) VALUES (NULL, '$FPO_Registration_ID', '$CB_User', '$CB_User_Email', '$CB_User_Phone', NULL, NULL, '$Status_of_IndGAP', '$Unique_Number', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', CURRENT_TIMESTAMP);");

            $query_insert13 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientFeedback`='$ClientFeedback' WHERE FPO_Registration_ID = '$FPO_Registration_ID' AND Deleted_Status = '0'");

            $query_insert11 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Client_Name`='$R_Client_Name',`R_Current_Status`='$R_Current_Status',`CG_Client_Name`='$CG_Client_Name',`CG_Current_Status`='$CG_Current_Status',`S_Client_Name`='$S_Client_Name',`S_Reason_for_Suspended`='$S_Reason_for_Suspended',`W_Client_Name`='$W_Client_Name', `W_Reason_for_Withdrawal`='$W_Reason_for_Withdrawal', `E_Client_Name`='$E_Client_Name',`AssessmentReport`='$AssessmentReport',`AuditManDaysSpentByCB`='$AuditManDaysSpentByCB',`QMSAudit`='$QMSAudit',`MembersInspections`='$MembersInspections',`NonConformityReports`='$NonConformityReports',`ClientCorrectiveActions`='$ClientCorrectiveActions',`CBClosure`='$CBClosure',`CBAssessmentSchedule`='$CBAssessmentSchedule',`ScheduleDate`='$ScheduleDate',`ClientSigned_Document`='$ClientSigned_Document',`GrantedScopeStatus`='$GrantedScopeStatus',`CertificationAgreement_Document_Name`='$CertificationAgreement_Document_Name',`ScopeStatus`='$ScopeStatus',`Scope_Document_Name`='$Scope_Document_Name',`Clientqualifiedinternalinspectors`='$Clientqualifiedinternalinspectors',`ClientqualifiedInternalAuditors`='$ClientqualifiedInternalAuditors',`OtherDocument_Discription`='$OtherDocument_Discription',`MassBalanceGranting_Document_Name`='$MassBalanceGranting_Document_Name',`DescriptionOfCompliance`='$DescriptionOfCompliance',`MassBalanceGranting_Document_Date`='$MassBalanceGranting_Document_Date',`CG_Certificate_No`='$CG_Certificate_No',`CG_Certificate_Date`='$CG_Certificate_Date',`CG_Certificate_End_Date`='$CG_Certificate_End_Date',`CG_Certificate_Renewal_Date`='$CG_Certificate_Renewal_Date',`CBProcedure_DocumentName`='$CBProcedure_DocumentName',`OtherDocument_Name`='$OtherDocument_Name' WHERE FPO_Registration_ID = '$FPO_Registration_ID' AND Deleted_Status = '0'");
        
        $query_insert1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `S_Certificate_Issue_Date`='$S_Certificate_Issue_Date', `S_Certificate_Validity_Date`='$S_Certificate_Validity_Date', `S_Suspended_Date`='$S_Suspended_Date' WHERE FPO_Registration_ID = '$FPO_Registration_ID' AND Deleted_Status = '0'");

        $query_insert2 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `W_Certificate_Issue_Date`='$W_Certificate_Issue_Date', `W_Certificate_Validity_Date`='$W_Certificate_Validity_Date', `W_Withdrawal_Date`='$W_Withdrawal_Date' WHERE FPO_Registration_ID = '$FPO_Registration_ID' AND Deleted_Status = '0'");

        $query_insert3 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `E_Certificate_Issue_Date`='$E_Certificate_Issue_Date', `E_Certificate_Validity_Date`='$E_Certificate_Validity_Date', `E_Reason_for_Expired`='$E_Reason_for_Expired' WHERE FPO_Registration_ID = '$FPO_Registration_ID' AND Deleted_Status = '0'");
        

        if ($_FILES['CG_Client_Application_Form'] != '') {
            $extensioncg1 = pathinfo($_FILES['CG_Client_Application_Form']['name'], PATHINFO_EXTENSION);
            $CG_Client_Application_Form1 = time() . rand(1000, 9999) . "." . $extensioncg1;
            $CG_Client_Application_Form2 = $_FILES["CG_Client_Application_Form"]["name"];
            if ($_FILES["CG_Client_Application_Form"]["name"] != '') {
                if (strtolower(end(explode(".", $CG_Client_Application_Form2))) == "pdf") {
                    if (move_uploaded_file($_FILES["CG_Client_Application_Form"]["tmp_name"], "CBDocument/" . $CG_Client_Application_Form1)) {
                        $CG_Client_Application_Form = $CG_Client_Application_Form1;
                        $query_insert1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Client_Application_Form`='$CG_Client_Application_Form' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert2 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Signed_Certification_Agreement`='$CG_Signed_Certification_Agreement' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert3 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CG_Scope`='$CG_Scope' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert3r = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Client_Application_Form`='$R_Client_Application_Form_New' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert3r1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Signed_Certification_Agreement`='$R_Signed_Certification_Agreement_New' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert3r1 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `R_Scope`='$R_Scope' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert4 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `S_Document_Upload`='$S_Document_Upload' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert5 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `W_Document_Upload`='$W_Document_Upload' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert5e = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `E_Document_Upload`='$E_Document_Upload_New' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert6 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Status_of_IndGAP_Document`='$Status_of_IndGAP_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert7 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientSignedApplicationFormForRegistration`='$ClientSignedApplicationFormForRegistration' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert8 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CertificationAgreementSigned_Document`='$CertificationAgreementSigned_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert9 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Scope_Document`='$Scope_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert10 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `MassBalanceGranting_Document`='$MassBalanceGranting_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert11 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CBProcedure_Document`='$CBProcedure_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert12 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `OtherDocument`='$OtherDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert13 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `AssessmentReportDocument`='$AssessmentReportDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument`='$NonConformityReportsDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument_two`='$NonConformityReportsDocument_two' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert14 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `NonConformityReportsDocument_three`='$NonConformityReportsDocument_three' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert9 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Granted_Scope_Document`='$Granted_Scope_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert15 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `AssessmentScheduleDocument`='$AssessmentScheduleDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert16 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientqualifiedinternalinspectorsDocument`='$ClientqualifiedinternalinspectorsDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert17 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ClientqualifiedInternalAuditorsDocument`='$ClientqualifiedInternalAuditorsDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
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
                        $query_insert16 = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `DescriptionOfCompliance_Document`='$DescriptionOfCompliance_Document' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }


        if ($_FILES['ResidueAnalysisDocument'] != '') {
            $extension = pathinfo($_FILES['ResidueAnalysisDocument']['name'], PATHINFO_EXTENSION);
            $ResidueAnalysisDocument1 = time() . rand(1000, 9999) . "." . $extension;
            $ResidueAnalysisDocument2 = $_FILES["ResidueAnalysisDocument"]["name"];
            if ($_FILES["ResidueAnalysisDocument"]["name"] != '') {
                if (strtolower(end(explode(".", $ResidueAnalysisDocument2))) == "pdf") {
                    if (move_uploaded_file($_FILES["ResidueAnalysisDocument"]["tmp_name"], "CBDocument/" . $ResidueAnalysisDocument1)) {
                        $ResidueAnalysisDocument = $ResidueAnalysisDocument1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ResidueAnalysisDocument`='$ResidueAnalysisDocument' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['QMSChecklist'] != '') {
            $extension = pathinfo($_FILES['QMSChecklist']['name'], PATHINFO_EXTENSION);
            $QMSChecklist1 = time() . rand(1000, 9999) . "." . $extension;
            $QMSChecklist2 = $_FILES["QMSChecklist"]["name"];
            if ($_FILES["QMSChecklist"]["name"] != '') {
                if (strtolower(end(explode(".", $QMSChecklist2))) == "pdf") {
                    if (move_uploaded_file($_FILES["QMSChecklist"]["tmp_name"], "CBDocument/" . $QMSChecklist1)) {
                        $QMSChecklist = $QMSChecklist1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `QMSChecklist`='$QMSChecklist' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['CPCCChecklists'] != '') {
            $extension = pathinfo($_FILES['CPCCChecklists']['name'], PATHINFO_EXTENSION);
            $CPCCChecklists1 = time() . rand(1000, 9999) . "." . $extension;
            $CPCCChecklists2 = $_FILES["CPCCChecklists"]["name"];
            if ($_FILES["CPCCChecklists"]["name"] != '') {
                if (strtolower(end(explode(".", $CPCCChecklists2))) == "pdf") {
                    if (move_uploaded_file($_FILES["CPCCChecklists"]["tmp_name"], "CBDocument/" . $CPCCChecklists1)) {
                        $CPCCChecklists = $CPCCChecklists1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CPCCChecklists`='$CPCCChecklists' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['Sampleslip'] != '') {
            $extension = pathinfo($_FILES['Sampleslip']['name'], PATHINFO_EXTENSION);
            $Sampleslip1 = time() . rand(1000, 9999) . "." . $extension;
            $Sampleslip2 = $_FILES["Sampleslip"]["name"];
            if ($_FILES["Sampleslip"]["name"] != '') {
                if (strtolower(end(explode(".", $Sampleslip2))) == "pdf") {
                    if (move_uploaded_file($_FILES["Sampleslip"]["tmp_name"], "CBDocument/" . $Sampleslip1)) {
                        $Sampleslip = $Sampleslip1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Sampleslip`='$Sampleslip' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['TechnicalReviewReport'] != '') {
            $extension = pathinfo($_FILES['TechnicalReviewReport']['name'], PATHINFO_EXTENSION);
            $TechnicalReviewReport1 = time() . rand(1000, 9999) . "." . $extension;
            $TechnicalReviewReport2 = $_FILES["TechnicalReviewReport"]["name"];
            if ($_FILES["TechnicalReviewReport"]["name"] != '') {
                if (strtolower(end(explode(".", $TechnicalReviewReport2))) == "pdf") {
                    if (move_uploaded_file($_FILES["TechnicalReviewReport"]["tmp_name"], "CBDocument/" . $TechnicalReviewReport1)) {
                        $TechnicalReviewReport = $TechnicalReviewReport1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `TechnicalReviewReport`='$TechnicalReviewReport' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['CertificationCommitteeReport'] != '') {
            $extension = pathinfo($_FILES['CertificationCommitteeReport']['name'], PATHINFO_EXTENSION);
            $CertificationCommitteeReport1 = time() . rand(1000, 9999) . "." . $extension;
            $CertificationCommitteeReport2 = $_FILES["CertificationCommitteeReport"]["name"];
            if ($_FILES["CertificationCommitteeReport"]["name"] != '') {
                if (strtolower(end(explode(".", $CertificationCommitteeReport2))) == "pdf") {
                    if (move_uploaded_file($_FILES["CertificationCommitteeReport"]["tmp_name"], "CBDocument/" . $CertificationCommitteeReport1)) {
                        $CertificationCommitteeReport = $CertificationCommitteeReport1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `CertificationCommitteeReport`='$CertificationCommitteeReport' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['MassBalanceGrantingCertificate'] != '') {
            $extension = pathinfo($_FILES['MassBalanceGrantingCertificate']['name'], PATHINFO_EXTENSION);
            $MassBalanceGrantingCertificate1 = time() . rand(1000, 9999) . "." . $extension;
            $MassBalanceGrantingCertificate2 = $_FILES["MassBalanceGrantingCertificate"]["name"];
            if ($_FILES["MassBalanceGrantingCertificate"]["name"] != '') {
                if (strtolower(end(explode(".", $MassBalanceGrantingCertificate2))) == "pdf") {
                    if (move_uploaded_file($_FILES["MassBalanceGrantingCertificate"]["tmp_name"], "CBDocument/" . $MassBalanceGrantingCertificate1)) {
                        $MassBalanceGrantingCertificate = $MassBalanceGrantingCertificate1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `MassBalanceGrantingCertificate`='$MassBalanceGrantingCertificate' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['ProcedureforAssessmentandInspection'] != '') {
            $extension = pathinfo($_FILES['ProcedureforAssessmentandInspection']['name'], PATHINFO_EXTENSION);
            $ProcedureforAssessmentandInspection1 = time() . rand(1000, 9999) . "." . $extension;
            $ProcedureforAssessmentandInspection2 = $_FILES["ProcedureforAssessmentandInspection"]["name"];
            if ($_FILES["ProcedureforAssessmentandInspection"]["name"] != '') {
                if (strtolower(end(explode(".", $ProcedureforAssessmentandInspection2))) == "pdf") {
                    if (move_uploaded_file($_FILES["ProcedureforAssessmentandInspection"]["tmp_name"], "CBDocument/" . $ProcedureforAssessmentandInspection1)) {
                        $ProcedureforAssessmentandInspection = $ProcedureforAssessmentandInspection1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `ProcedureforAssessmentandInspection`='$ProcedureforAssessmentandInspection' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['Formats'] != '') {
            $extension = pathinfo($_FILES['Formats']['name'], PATHINFO_EXTENSION);
            $Formats1 = time() . rand(1000, 9999) . "." . $extension;
            $Formats2 = $_FILES["Formats"]["name"];
            if ($_FILES["Formats"]["name"] != '') {
                if (strtolower(end(explode(".", $Formats2))) == "pdf") {
                    if (move_uploaded_file($_FILES["Formats"]["tmp_name"], "CBDocument/" . $Formats1)) {
                        $Formats = $Formats1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Formats`='$Formats' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }

        if ($_FILES['Organogramwithstaffdetails'] != '') {
            $extension = pathinfo($_FILES['Organogramwithstaffdetails']['name'], PATHINFO_EXTENSION);
            $Organogramwithstaffdetails1 = time() . rand(1000, 9999) . "." . $extension;
            $Organogramwithstaffdetails2 = $_FILES["Organogramwithstaffdetails"]["name"];
            if ($_FILES["Organogramwithstaffdetails"]["name"] != '') {
                if (strtolower(end(explode(".", $Organogramwithstaffdetails2))) == "pdf") {
                    if (move_uploaded_file($_FILES["Organogramwithstaffdetails"]["tmp_name"], "CBDocument/" . $Organogramwithstaffdetails1)) {
                        $Organogramwithstaffdetails = $Organogramwithstaffdetails1;
                        $query_insert = mysqli_query($db, "UPDATE `cb_user_edit_fpo_profile` SET `Organogramwithstaffdetails`='$Organogramwithstaffdetails' WHERE FPO_Registration_ID = '$id' AND Deleted_Status = '0'");
                    }
                }
            }
        }






       }
    
    if ($query_insert) {
        echo "<script>alert('FPO Record Successfully Saved.')</script>";
    } else {
        echo "<script>alert('FPO Record Not Saved.')</script>";
    }
  
}

$stmt2 = $db->prepare("SELECT * from `cb_user_edit_fpo_profile` WHERE FPO_Registration_ID = ? AND Deleted_Status = ?");
$stmt2->bind_param("ii", $id, $Deleted_Status);
$stmt2->execute();
$result2 = $stmt2->get_result();
$row2 = $result2->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <title>Edit Client User</title>
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
                  <?php if (empty($row['FPO_UniqueCode'])) {
    echo "NA";
} else {
    echo $row['FPO_UniqueCode'];
} ?>)
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
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                        </div>
                     </div>
                  </div>
               </center>
               <?php
} ?>
               <form method="POST" enctype="multipart/form-data" autocomplete="off">
                  <h4 class='heading-text mt-5 mb-2'>Application Registered</h4>
                  <div class="row">
                     <!-- <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Document Name</label>
                        <input value="<?php echo $row2['Status_of_IndGAP_DocumentName']; ?>" type="text"
                           name="Status_of_IndGAP_DocumentName" class="form-control" placeholder="Document Name">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Document Upload</label>
                        <input type="file" name="Status_of_IndGAP_Document" class="form-control"
                           placeholder="Document Name">
                        </div> -->
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Unique Number</label>
                        <input value="<?php echo $row2['Unique_Number']; ?>" type="text" name="Unique_Number"
                           class="form-control" placeholder="Unique Number">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Status of IndG.A.P</label>
                        <select class="form-control" id="IndGAP_Status" name="Status_of_IndGAP">
                           <option value="">Select Status</option>
                           <option <?php if ($row2['Status_of_IndGAP'] == 'Registered') {
    echo 'selected';
} ?>
                              value="Registered">Registered</option>
                           <option <?php if ($row2['Status_of_IndGAP'] == 'Granted') {
    echo 'selected';
} ?>
                              value="Granted">Granted</option>
                           <option <?php if ($row2['Status_of_IndGAP'] == 'Suspended') {
    echo 'selected';
} ?>
                              value="Suspended">Suspended</option>
                           <option <?php if ($row2['Status_of_IndGAP'] == 'Withdrawal') {
    echo 'selected';
} ?>
                              value="Withdrawal">Withdrawal</option>
                           <option <?php if ($row2['Status_of_IndGAP'] == 'Expired') {
    echo 'selected';
} ?>
                              value="Expired">Expired</option>
                        </select>
                     </div>
                  </div>
                  <?php if ($row2['Status_of_IndGAP'] != 'Registered') { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 registered" style="display: none;" id="registered">
                     <div class="row">
                        <p class='heading-text'><strong>Application Registered</strong></p>
                        <p class="close-m" id="registered-box">&times;</p>
                        <!-- <div class="col-md-6 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['R_Client_Name']; ?>" type="text" name="R_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <!--<div class="col-md-6 form-group mt-3">-->
                        <!--   <label class="mb-2">Current Status</label>-->
                        <!--   <input value="<?php echo $row2['R_Current_Status']; ?>" type="text" name="R_Current_Status"-->
                        <!--      class="form-control" placeholder="Current Status">-->
                        <!--</div>-->
                        <div
                           class="<?php if (!empty($row2['R_Client_Application_Form'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-6';
    } ?> form-group mt-3">
                           <label class="mb-2">Application Form</label>
                           <input type="file" name="R_Client_Application_Form" class="form-control"
                              placeholder="Application Form">
                        </div>
                        <?php if (!empty($row2['R_Client_Application_Form'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['R_Client_Application_Form']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                        <!-- <div class="<?php if (!empty($row2['R_Signed_Certification_Agreement'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-3';
    } ?> form-group mt-3">
                           <label class="mb-2">Signed Certification Agreement</label>
                           <input type="file" name="R_Signed_Certification_Agreement" class="form-control"
                              placeholder="Signed Certification Agreement">
                           </div>
                           <?php if (!empty($row2['R_Signed_Certification_Agreement'])) { ?>
                           <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['R_Signed_Certification_Agreement']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                           </div>
                           <?php
    } ?> -->
                        <!-- <div class="<?php if (!empty($row2['R_Scope'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-3';
    } ?> form-group mt-3">
                           <label class="mb-2">Scope</label>
                           <input type="file" name="R_Scope" class="form-control" placeholder="Scope">
                           </div>
                           <?php if (!empty($row2['R_Scope'])) { ?>
                           <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['R_Scope']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                           </div>
                           <?php
    } ?> -->
                     </div>
                  </div>
                  <?php
} else { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 registered" style="display: block;" id="registered">
                     <div class="row">
                        <p class='heading-text'><strong>Application Registered</strong></p>
                        <p class="close-m" id="registered-box">&times;</p>
                        <!-- <div class="col-md-3 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['R_Client_Name']; ?>" type="text" name="R_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <!--<div class="col-md-6 form-group mt-3">-->
                        <!--   <label class="mb-2">Current Status</label>-->
                        <!--   <input value="<?php echo $row2['R_Current_Status']; ?>" type="text" name="R_Current_Status"-->
                        <!--      class="form-control" placeholder="Current Status">-->
                        <!--</div>-->
                        <div
                           class="<?php if (!empty($row2['R_Client_Application_Form'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-3';
    } ?> form-group mt-3">
                           <label class="mb-2">Application Form</label>
                           <input type="file" name="R_Client_Application_Form" class="form-control"
                              placeholder="Client Application Form">
                        </div>
                        <?php if (!empty($row2['R_Client_Application_Form'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['R_Client_Application_Form']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                        <!-- <div class="<?php if (!empty($row2['R_Signed_Certification_Agreement'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-3';
    } ?> form-group mt-3">
                           <label class="mb-2">Signed Certification Agreement</label>
                           <input type="file" name="R_Signed_Certification_Agreement" class="form-control"
                              placeholder="Signed Certification Agreement">
                           </div>
                           <?php if (!empty($row2['R_Signed_Certification_Agreement'])) { ?>
                           <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['R_Signed_Certification_Agreement']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                           </div>
                           <?php
    } ?>
                           <div class="<?php if (!empty($row2['R_Scope'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-3';
    } ?> form-group mt-3">
                           <label class="mb-2">Scope</label>
                           <input type="file" name="R_Scope" class="form-control" placeholder="Scope">
                           </div>
                           <?php if (!empty($row2['R_Scope'])) { ?>
                           <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['R_Scope']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                           </div>
                           <?php
    } ?> -->
                     </div>
                  </div>
                  <?php
} ?>
                  <?php if ($row2['Status_of_IndGAP'] != 'Granted') { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 grant" style="display: none;" id="grant">
                     <div class="row">
                        <p class='heading-text'><strong>Application Granted</strong></p>
                        <p class="close-m" id="grant-box">&times;</p>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['CG_Client_Name']; ?>" type="text" name="CG_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate No.</label>
                           <input type="text" value="<?php echo $row2['CG_Certificate_No']; ?>" name="CG_Certificate_No"
                              class="form-control" placeholder="Certificate No">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Date</label>
                           <input type="date" value="<?php echo $row2['CG_Certificate_Date']; ?>"
                              name="CG_Certificate_Date" class="form-control">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate End Date</label>
                           <input type="date" value="<?php echo $row2['CG_Certificate_End_Date']; ?>"
                              name="CG_Certificate_End_Date" class="form-control">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Renewal Date</label>
                           <input type="date" value="<?php echo $row2['CG_Certificate_Renewal_Date']; ?>"
                              name="CG_Certificate_Renewal_Date" class="form-control">
                        </div>
                        <!--<div class="col-md-6 form-group mt-3">-->
                        <!--   <label class="mb-2">Current Status</label>-->
                        <!--   <input value="<?php echo $row2['CG_Current_Status']; ?>" type="text" name="CG_Current_Status"-->
                        <!--      class="form-control" placeholder="Current Status">-->
                        <!--</div>-->
                        <div
                           class="<?php if (!empty($row2['CG_Client_Application_Form'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Certificate</label>
                           <input type="file" name="CG_Client_Application_Form" class="form-control"
                              placeholder="Application Form">
                        </div>
                        <?php if (!empty($row2['CG_Client_Application_Form'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['CG_Client_Application_Form']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                        <!-- <div class="<?php if (!empty($row2['CG_Signed_Certification_Agreement'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-3';
    } ?> form-group mt-3">
                           <label class="mb-2">Signed Certification Agreement</label>
                           <input type="file" name="CG_Signed_Certification_Agreement" class="form-control"
                              placeholder="Signed Certification Agreement">
                           </div>
                           <?php if (!empty($row2['CG_Signed_Certification_Agreement'])) { ?>
                           <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['CG_Signed_Certification_Agreement']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                           </div>
                           <?php
    } ?>
                           <div class="<?php if (!empty($row2['CG_Scope'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-3';
    } ?> form-group mt-3">
                           <label class="mb-2">Scope</label>
                           <input type="file" name="CG_Scope" class="form-control" placeholder="Scope">
                           </div>
                           <?php if (!empty($row2['CG_Scope'])) { ?>
                           <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['CG_Scope']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                           </div>
                           <?php
    } ?> -->
                     </div>
                  </div>
                  <?php
} else { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 grant" style="display: block;" id="grant">
                     <div class="row">
                        <p class='heading-text'><strong>Application Grant</strong></p>
                        <p class="close-m" id="grant-box">&times;</p>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['CG_Client_Name']; ?>" type="text" name="CG_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate No.</label>
                           <input type="text" value="<?php echo $row2['CG_Certificate_No']; ?>" name="CG_Certificate_No"
                              class="form-control" placeholder="Certificate No">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Date</label>
                           <input type="date" value="<?php echo $row2['CG_Certificate_Date']; ?>"
                              name="CG_Certificate_Date" class="form-control">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate End Date</label>
                           <input type="date" value="<?php echo $row2['CG_Certificate_End_Date']; ?>"
                              name="CG_Certificate_End_Date" class="form-control">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Renewal Date</label>
                           <input type="date" value="<?php echo $row2['CG_Certificate_Renewal_Date']; ?>"
                              name="CG_Certificate_Renewal_Date" class="form-control">
                        </div>
                        <!--<div class="col-md-6 form-group mt-3">-->
                        <!--   <label class="mb-2">Current Status</label>-->
                        <!--   <input value="<?php echo $row2['CG_Current_Status']; ?>" type="text" name="CG_Current_Status"-->
                        <!--      class="form-control" placeholder="Current Status">-->
                        <!--</div>-->
                        <div
                           class="<?php if (!empty($row2['CG_Client_Application_Form'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Certificate</label>
                           <input type="file" name="CG_Client_Application_Form" class="form-control"
                              placeholder="Application Form">
                        </div>
                        <?php if (!empty($row2['CG_Client_Application_Form'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['CG_Client_Application_Form']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                        <!-- <div class="<?php if (!empty($row2['CG_Signed_Certification_Agreement'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-3';
    } ?> form-group mt-3">
                           <label class="mb-2">Signed Certification Agreement</label>
                           <input type="file" name="CG_Signed_Certification_Agreement" class="form-control"
                              placeholder="Signed Certification Agreement">
                           </div>
                           <?php if (!empty($row2['CG_Signed_Certification_Agreement'])) { ?>
                           <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['CG_Signed_Certification_Agreement']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                           </div>
                           <?php
    } ?>
                           <div class="<?php if (!empty($row2['CG_Scope'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Scope</label>
                           <input type="file" name="CG_Scope" class="form-control" placeholder="Scope">
                           </div>
                           <?php if (!empty($row2['CG_Scope'])) { ?>
                           <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['CG_Scope']; ?>" target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                           </div>
                           <?php
    } ?> -->
                     </div>
                  </div>
                  <?php
}
if ($row2['Status_of_IndGAP'] != 'Suspended') { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 suspension" style="display: none;" id="suspension">
                     <div class="row">
                        <p class='heading-text'><strong>Application Suspended</strong></p>
                        <p class="close-m" id="suspension-box">&times;</p>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['S_Client_Name']; ?>" type="text" name="S_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Issue Date</label>
                           <input value="<?php echo $row2['S_Certificate_Issue_Date']; ?>" type="date"
                              name="S_Certificate_Issue_Date" class="form-control" placeholder="Certificate Issue Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Validity Date</label>
                           <input value="<?php echo $row2['S_Certificate_Validity_Date']; ?>" type="date"
                              name="S_Certificate_Validity_Date" class="form-control"
                              placeholder="Certificate Validity Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Suspended Date</label>
                           <input value="<?php echo $row2['S_Suspended_Date']; ?>" type="date" name="S_Suspended_Date"
                              class="form-control" placeholder="Suspended Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Reason for Suspension</label>
                           <input value="<?php echo $row2['S_Reason_for_Suspended']; ?>" type="text"
                              name="S_Reason_for_Suspended" class="form-control" placeholder="Reason for Suspension">
                        </div>
                        <div
                           class="<?php if (!empty($row2['S_Document_Upload'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Document Upload</label>
                           <input type="file" name="S_Document_Upload" class="form-control" placeholder="Document Upload">
                        </div>
                        <?php if (!empty($row2['S_Document_Upload'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['S_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                     </div>
                  </div>
                  <?php
} else { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 suspension" style="display: block;" id="suspension">
                     <div class="row">
                        <p class='heading-text'><strong>Application Suspended</strong></p>
                        <p class="close-m" id="suspension-box">&times;</p>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['S_Client_Name']; ?>" type="text" name="S_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Issue Date</label>
                           <input value="<?php echo $row2['S_Certificate_Issue_Date']; ?>" type="date"
                              name="S_Certificate_Issue_Date" class="form-control" placeholder="Certificate Issue Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Validity Date</label>
                           <input value="<?php echo $row2['S_Certificate_Validity_Date']; ?>" type="date"
                              name="S_Certificate_Validity_Date" class="form-control"
                              placeholder="Certificate Validity Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Suspended Date</label>
                           <input value="<?php echo $row2['S_Suspended_Date']; ?>" type="date" name="S_Suspended_Date"
                              class="form-control" placeholder="Suspended Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Reason for Suspension</label>
                           <input value="<?php echo $row2['S_Reason_for_Suspended']; ?>" type="text"
                              name="S_Reason_for_Suspended" class="form-control" placeholder="Reason for Suspension">
                        </div>
                        <div
                           class="<?php if (!empty($row2['S_Document_Upload'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Document Upload</label>
                           <input type="file" name="S_Document_Upload" class="form-control" placeholder="Document Upload">
                        </div>
                        <?php if (!empty($row2['S_Document_Upload'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['S_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                     </div>
                  </div>
                  <?php
}
if ($row2['Status_of_IndGAP'] != 'Withdrawal') { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 withdraw" style="display: none;" id="withdraw">
                     <div class="row">
                        <p class='heading-text'><strong>Application Withdrawal</strong></p>
                        <p class="close-m" id="withdraw-box">&times;</p>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['W_Client_Name']; ?>" type="text" name="W_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Issue Date</label>
                           <input value="<?php echo $row2['W_Certificate_Issue_Date']; ?>" type="date"
                              name="W_Certificate_Issue_Date" class="form-control" placeholder="Certificate Issue Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Validity Date</label>
                           <input value="<?php echo $row2['W_Certificate_Validity_Date']; ?>" type="date"
                              name="W_Certificate_Validity_Date" class="form-control"
                              placeholder="Certificate Validity Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Withdrawal Date</label>
                           <input value="<?php echo $row2['W_Withdrawal_Date']; ?>" type="date" name="W_Withdrawal_Date"
                              class="form-control" placeholder="Withdrawal Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Reason for Withdrawal</label>
                           <input value="<?php echo $row2['W_Reason_for_Withdrawal']; ?>" type="text"
                              name="W_Reason_for_Withdrawal" class="form-control" placeholder="Reason for Withdrawal">
                        </div>
                        <div
                           class="<?php if (!empty($row2['W_Document_Upload'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Document Upload</label>
                           <input type="file" name="W_Document_Upload" class="form-control" placeholder="Document Upload">
                        </div>
                        <?php if (!empty($row2['W_Document_Upload'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['W_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                     </div>
                  </div>
                  <?php
} else { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 withdraw" style="display: block;" id="withdraw">
                     <div class="row">
                        <p class='heading-text'><strong>Application Withdrawal</strong></p>
                        <p class="close-m" id="withdraw-box">&times;</p>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['W_Client_Name']; ?>" type="text" name="W_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Issue Date</label>
                           <input value="<?php echo $row2['W_Certificate_Issue_Date']; ?>" type="date"
                              name="W_Certificate_Issue_Date" class="form-control" placeholder="Certificate Issue Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Validity Date</label>
                           <input value="<?php echo $row2['W_Certificate_Validity_Date']; ?>" type="date"
                              name="W_Certificate_Validity_Date" class="form-control"
                              placeholder="Certificate Validity Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Withdrawal Date</label>
                           <input value="<?php echo $row2['W_Withdrawal_Date']; ?>" type="date" name="W_Withdrawal_Date"
                              class="form-control" placeholder="Withdrawal Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Reason for Withdrawal</label>
                           <input value="<?php echo $row2['W_Reason_for_Withdrawal']; ?>" type="text"
                              name="W_Reason_for_Withdrawal" class="form-control" placeholder="Reason for Withdrawal">
                        </div>
                        <div
                           class="<?php if (!empty($row2['W_Document_Upload'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Document Upload</label>
                           <input type="file" name="W_Document_Upload" class="form-control" placeholder="Document Upload">
                        </div>
                        <?php if (!empty($row2['W_Document_Upload'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['W_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                     </div>
                  </div>
                  <?php
}
if ($row2['Status_of_IndGAP'] != 'Expired') { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 expired" style="display: none;" id="expired">
                     <div class="row">
                        <p class='heading-text'><strong>Application Expired</strong></p>
                        <p class="close-m" id="expired-box">&times;</p>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['E_Client_Name']; ?>" type="text" name="E_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Issue Date</label>
                           <input value="<?php echo $row2['E_Certificate_Issue_Date']; ?>" type="date"
                              name="E_Certificate_Issue_Date" class="form-control" placeholder="Certificate Issue Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Validity Date</label>
                           <input value="<?php echo $row2['E_Certificate_Validity_Date']; ?>" type="date"
                              name="E_Certificate_Validity_Date" class="form-control"
                              placeholder="Certificate Validity Date">
                        </div>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Reason for Expired</label>
                           <input value="<?php echo $row2['E_Reason_for_Expired']; ?>" type="text"
                              name="E_Reason_for_Expired" class="form-control" placeholder="Reason for Expired">
                           </div> -->
                        <div
                           class="<?php if (!empty($row2['E_Document_Upload'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Document Upload</label>
                           <input type="file" name="E_Document_Upload" class="form-control" placeholder="Document Upload">
                        </div>
                        <?php if (!empty($row2['E_Document_Upload'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['E_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                     </div>
                  </div>
                  <?php
} else { ?>
                  <div class="application-box p-3 mt-3 mb-3 pb-5 expired" style="display: block;" id="expired">
                     <div class="row">
                        <p class='heading-text'><strong>Application Expired</strong></p>
                        <p class="close-m" id="expired-box">&times;</p>
                        <!-- <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Name</label>
                           <input value="<?php echo $row2['E_Client_Name']; ?>" type="text" name="E_Client_Name"
                              class="form-control" placeholder="Name">
                           </div> -->
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Issue Date</label>
                           <input value="<?php echo $row2['E_Certificate_Issue_Date']; ?>" type="date"
                              name="E_Certificate_Issue_Date" class="form-control" placeholder="Certificate Issue Date">
                        </div>
                        <div class="col-md-4 form-group mt-3">
                           <label class="mb-2">Certificate Validity Date</label>
                           <input value="<?php echo $row2['E_Certificate_Validity_Date']; ?>" type="date"
                              name="E_Certificate_Validity_Date" class="form-control"
                              placeholder="Certificate Validity Date">
                        </div>
                        <div
                           class="<?php if (!empty($row2['E_Document_Upload'])) {
        echo 'col-md-3';
    } else {
        echo 'col-md-4';
    } ?> form-group mt-3">
                           <label class="mb-2">Document Upload</label>
                           <input type="file" name="E_Document_Upload" class="form-control" placeholder="Document Upload">
                        </div>
                        <?php if (!empty($row2['E_Document_Upload'])) { ?>
                        <div class="col-md-1 form-group mt-3">
                           <a href="CBDocument/<?php echo $row2['E_Document_Upload']; ?>" target="_blank"><img
                              style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                        </div>
                        <?php
    } ?>
                     </div>
                  </div>
                  <?php
} ?>
                  <div class="row">
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Signed Application Form</h4>
                     <div
                        class="<?php if (!empty($row2['ClientSignedApplicationFormForRegistration'])) {
    echo 'col-md-5';
} else {
    echo 'col-md-6';
} ?> form-group mt-3">
                        <label class="mb-2">Signed Application Form For Registration</label>
                        <input type="file" class="form-control" name="ClientSignedApplicationFormForRegistration"
                           placeholder="Total Qty (In MT)">
                     </div>
                     <?php if (!empty($row2['ClientSignedApplicationFormForRegistration'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['ClientSignedApplicationFormForRegistration']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <!-- <div class="col-md-6 form-group mt-3">
                        <label for="" class="mb-2">Document Name</label>
                        <input value="<?php echo $row2['ClientSigned_Document']; ?>" type="text"
                           name="ClientSigned_Document" class="form-control" placeholder="Document Name">
                        </div> -->
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Sub-License Certification</h4>
                     <div
                        class="<?php if (!empty($row2['CertificationAgreementSigned_Document'])) {
    echo 'col-md-5';
} else {
    echo 'col-md-6';
} ?> form-group mt-3">
                        <label class="mb-2">Certification Agreement Signed</label>
                        <input type="file" class="form-control" name="CertificationAgreementSigned_Document"
                           placeholder="Certification Agreement Signed">
                     </div>
                     <?php if (!empty($row2['CertificationAgreementSigned_Document'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['CertificationAgreementSigned_Document']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Qualified Internal Inspectors/Auditors</h4>
                     <div class="col-md-6 form-group mt-3">
                        <label class="mb-2">Qualified Internal Inspectors</label>
                        <textarea class="form-control" name="Clientqualifiedinternalinspectors"
                           id="Clientqualifiedinternalinspectors" cols="62"
                           rows="1"><?php echo $row2['Clientqualifiedinternalinspectors']; ?></textarea>
                     </div>
                     <div
                        class="<?php if (!empty($row2['ClientqualifiedinternalinspectorsDocument'])) {
    echo 'col-md-5';
} else {
    echo 'col-md-6';
} ?> form-group mt-3">
                        <label class="mb-2">Document Upload</label>
                        <input type="file" name="ClientqualifiedinternalinspectorsDocument" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['ClientqualifiedinternalinspectorsDocument'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['ClientqualifiedinternalinspectorsDocument']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <div class="col-md-6 form-group mt-3">
                        <label class="mb-2">Qualified Internal Auditors</label>
                        <textarea class="form-control" name="ClientqualifiedInternalAuditors"
                           id="ClientqualifiedInternalAuditors" cols="62"
                           rows="1"><?php echo $row2['ClientqualifiedInternalAuditors']; ?></textarea>
                     </div>
                     <div
                        class="<?php if (!empty($row2['ClientqualifiedInternalAuditorsDocument'])) {
    echo 'col-md-5';
} else {
    echo 'col-md-6';
} ?> form-group mt-3">
                        <label class="mb-2">Document Upload</label>
                        <input type="file" name="ClientqualifiedInternalAuditorsDocument" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['ClientqualifiedInternalAuditorsDocument'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['ClientqualifiedInternalAuditorsDocument']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Assessment Schedule</h4>
                     <h5 class="heading-text-mt-3 mb-3">Members Added Schedule</h5>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Schedule</label>
                        <textarea class="form-control" name="CBAssessmentSchedule" id="CBAssessmentSchedule" cols="62"
                           rows="1"><?php echo $row2['CBAssessmentSchedule']; ?></textarea>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Schedule Date</label>
                        <input value="<?php echo $row2['ScheduleDate']; ?>" type="date" name="ScheduleDate"
                           class="form-control">
                     </div>
                     <div
                        class="<?php if (!empty($row2['AssessmentScheduleDocument'])) {
    echo 'col-md-3';
} else {
    echo 'col-md-4';
} ?> form-group mt-3">
                        <label class="mb-2">Document Upload</label>
                        <input type="file" name="AssessmentScheduleDocument" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['AssessmentScheduleDocument'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['AssessmentScheduleDocument']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <h5 class="heading-text mt-5">QMS Schedule</h5>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Schedule</label>
                        <textarea class="form-control" name="CBAssessmentSchedule" id="CBAssessmentSchedule" cols="62"
                           rows="1"><?php echo $row2['CBAssessmentSchedule']; ?></textarea>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Schedule Date</label>
                        <input value="<?php echo $row2['ScheduleDate']; ?>" type="date" name="ScheduleDate"
                           class="form-control">
                     </div>
                     <div
                        class="<?php if (!empty($row2['AssessmentScheduleDocument'])) {
    echo 'col-md-3';
} else {
    echo 'col-md-4';
} ?> form-group mt-3">
                        <label class="mb-2">Document Upload</label>
                        <input type="file" name="AssessmentScheduleDocument" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['AssessmentScheduleDocument'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['AssessmentScheduleDocument']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Non-Conformity Reports</h4>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Reports</label>
                        <textarea class="form-control" name="NonConformityReports" id="NonConformityReports" cols="40"
                           rows="1"><?php echo $row2['NonConformityReports']; ?></textarea>
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Corrective Actions</label>
                        <input value="<?php echo $row2['ClientCorrectiveActions']; ?>" type="text"
                           name="ClientCorrectiveActions" class="form-control" placeholder="Corrective Actions">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">CB Closure</label>
                        <input value="<?php echo $row2['CBClosure']; ?>" type="text" name="CBClosure" class="form-control"
                           placeholder="CB Closure">
                     </div>
                     <div
                        class="<?php if (!empty($row2['NonConformityReportsDocument'])) {
    echo 'col-md-3';
} else {
    echo 'col-md-4';
} ?> form-group mt-3">
                        <label class="mb-2">Document Upload</label>
                        <input type="file" name="NonConformityReportsDocument" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['NonConformityReportsDocument'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <div
                        class="<?php if (!empty($row2['NonConformityReportsDocument_two'])) {
    echo 'col-md-3';
} else {
    echo 'col-md-4';
} ?> form-group mt-3">
                        <label class="mb-2">Document Upload</label>
                        <input type="file" name="NonConformityReportsDocument_two" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['NonConformityReportsDocument_two'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument_two']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <div
                        class="<?php if (!empty($row2['NonConformityReportsDocument_three'])) {
    echo 'col-md-3';
} else {
    echo 'col-md-4';
} ?> form-group mt-3">
                        <label class="mb-2">Document Upload</label>
                        <input type="file" name="NonConformityReportsDocument_three" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['NonConformityReportsDocument_three'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['NonConformityReportsDocument_three']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mb-4'>Residue Analysis</h4>
                     <div
                        class="col-md-6 form-group mt-3">
                        <label class="mb-2">Residue Analysis Document</label>
                        <input type="file" class="form-control" name="ResidueAnalysisDocument" placeholder="Certification Agreement Signed">
                     </div>
                     <?php if (!empty($row2['ResidueAnalysisDocument'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['ResidueAnalysisDocument']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mb-4'>Assessment Report</h4>
                     <!-- <div class="col-md-6 form-group mt-3">
                        <label class="mb-2">Assessment Report</label>
                        <textarea class="form-control" name="AssessmentReport" id="AssessmentReport" cols="131"
                           rows="1"><?php echo $row2['AssessmentReport']; ?></textarea>
                        </div> -->
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">QMS Checklist</label>
                        <input type="file" name="QMSChecklist" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['QMSChecklist'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['QMSChecklist']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">CPCC Checklists</label>
                        <input type="file" name="CPCCChecklists" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['CPCCChecklists'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['CPCCChecklists']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Sample slip</label>
                        <input type="file" name="Sampleslip" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['Sampleslip'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['Sampleslip']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mb-4'>Technical Review</h4>
                     <div
                        class="col-md-6 form-group mt-3">
                        <label class="mb-2">Technical Review Report</label>
                        <input type="file" class="form-control" name="TechnicalReviewReport" placeholder="Certification Agreement Signed">
                     </div>
                     <?php if (!empty($row2['TechnicalReviewReport'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['TechnicalReviewReport']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mb-4'>Certification Committee</h4>
                     <div class="col-md-6 form-group mt-3">
                        <label class="mb-2">Certification Committee Report</label>
                        <input type="file" class="form-control" name="CertificationCommitteeReport" placeholder="Certification Agreement Signed">
                     </div>
                     <?php if (!empty($row2['CertificationCommitteeReport'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['CertificationCommitteeReport']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Mass Balance Register</h4>
                     <div
                        class="col-md-6 form-group mt-3">
                        <label class="mb-2">Mass Balance Granting Certificate</label>
                        <input type="file" name="MassBalanceGrantingCertificate" class="form-control"
                           placeholder="Document Name">
                     </div>
                     <?php if (!empty($row2['MassBalanceGrantingCertificate'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['MassBalanceGrantingCertificate']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Audit Days</h4>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Audit Man Days Spent By CB</label>
                        <input value="<?php echo $row2['AuditManDaysSpentByCB']; ?>" type="number" class="form-control"
                           name="AuditManDaysSpentByCB" placeholder="Audit Man days spent by CB">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">QMS Audit</label>
                        <input value="<?php echo $row2['QMSAudit']; ?>" type="text" class="form-control" name="QMSAudit"
                           placeholder="QMS Audit">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Members Inspections</label>
                        <input value="<?php echo $row2['MembersInspections']; ?>" type="text" class="form-control"
                           name="MembersInspections" placeholder="Members Inspections">
                     </div>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mb-4'>Internal folder</h4>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Procedure for Assessment and Inspection</label>
                        <input type="file" name="ProcedureforAssessmentandInspection" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['ProcedureforAssessmentandInspection'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['ProcedureforAssessmentandInspection']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Formats</label>
                        <input type="file" name="Formats" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['Formats'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['Formats']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Organogram with staff details</label>
                        <input type="file" name="Organogramwithstaffdetails" class="form-control"
                           placeholder="Document Upload">
                     </div>
                     <?php if (!empty($row2['Organogramwithstaffdetails'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['Organogramwithstaffdetails']; ?>"
                           target="_blank"><img style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php } ?>
                     <!-- <div class="col-md-6 form-group mt-3">
                        <label for="" class="mb-2">Document Name</label>
                        <input value="<?php echo $row2['CertificationAgreement_Document_Name']; ?>" type="text"
                           name="CertificationAgreement_Document_Name" class="form-control" placeholder="Document Name">
                        </div> -->
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Scope</h4>
                     <div class="col-md-6 form-group mt-3">
                        <label class="mb-2">Applied Status</label>
                        <select class="form-control" id="IndGAP_Status" name="ScopeStatus">
                           <option value="">Select Scope</option>
                           <option <?php if ($row2['ScopeStatus'] == 'Single Applied Granted') {
    echo 'selected';
} ?>
                              value="Single Applied Granted">Single Applied Granted</option>
                           <option <?php if ($row2['ScopeStatus'] == 'Multi Site Applied Granted') {
    echo 'selected';
} ?>
                              value="Multi Site Applied Granted">Multi Site Applied Granted</option>
                        </select>
                     </div>
                     <div
                        class="<?php if (!empty($row2['Scope_Document'])) {
    echo 'col-md-5';
} else {
    echo 'col-md-6';
} ?> form-group mt-3">
                        <label for="" class="mb-2">Upload Document</label>
                        <input type="file" name="Scope_Document" class="form-control" placeholder="Document Name">
                     </div>
                     <?php if (!empty($row2['Scope_Document'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['Scope_Document']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <div class="col-md-6 form-group mt-3">
                        <label class="mb-2">Granted Status</label>
                        <select class="form-control" id="IndGAP_Status" name="GrantedScopeStatus">
                           <option value="">Select Scope</option>
                           <option <?php if ($row2['GrantedScopeStatus'] == 'Single Applied Granted') {
    echo 'selected';
} ?>
                              value="Single Applied Granted">Single Applied Granted</option>
                           <option <?php if ($row2['GrantedScopeStatus'] == 'Multi Site Applied Granted') {
    echo 'selected';
}
?>
                              value="Multi Site Applied Granted">Multi Site Applied Granted</option>
                        </select>
                     </div>
                     <div
                        class="<?php if (!empty($row2['Granted_Scope_Document'])) {
    echo 'col-md-5';
} else {
    echo 'col-md-6';
} ?> form-group mt-3">
                        <label for="" class="mb-2">Upload Document</label>
                        <input type="file" name="Granted_Scope_Document" class="form-control" placeholder="Document Name">
                     </div>
                     <?php if (!empty($row2['Granted_Scope_Document'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['Granted_Scope_Document']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <!-- <div class="col-md-6 form-group mt-3">
                        <label class="mb-2">Document Name</label>
                        <input value="<?php echo $row2['CBProcedure_DocumentName']; ?>" type="text"
                           name="CBProcedure_DocumentName" id="" class="form-control" placeholder="Document Name">
                        </div> -->
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Feedback</h4>
                     <div class="col-md-12 form-group mt-3">
                        <label class="mb-2">Feedback <span style="color:red;">*</span></label>
                        <textarea class="form-control" name="ClientFeedback" id="" cols="131" rows="3"
                           required><?php echo $row2['ClientFeedback']; ?></textarea>
                     </div>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Complaints</h4>
                     <div class="col-md-6 form-group mt-3">
                        <label class="mb-2">Description of Complaint</label>
                        <input type="text" name="DescriptionOfCompliance" value="<?php echo $row2['DescriptionOfCompliance']; ?>" class="form-control"
                           placeholder="Description of Compliance">
                     </div>
                     <div
                        class="<?php if (!empty($row2['DescriptionOfCompliance_Document'])) {
    echo 'col-md-5';
} else {
    echo 'col-md-6';
} ?> form-group mt-3">
                        <label class="mb-2">Documents</label>
                        <input type="file" class="form-control" name="DescriptionOfCompliance_Document" id="">
                     </div>
                     <?php if (!empty($row2['DescriptionOfCompliance_Document'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['DescriptionOfCompliance_Document']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <hr class="mt-3" style="border: 3px solid #4bc50b;">
                     <h4 class='heading-text mt-3 mb-2'>Other</h4>
                     <div
                        class="<?php if (!empty($row2['OtherDocument'])) {
    echo 'col-md-3';
} else {
    echo 'col-md-4';
} ?> form-group mt-3">
                        <label class="mb-2">Other Documents</label>
                        <input type="file" class="form-control" name="OtherDocument" id="">
                     </div>
                     <?php if (!empty($row2['OtherDocument'])) { ?>
                     <div class="col-md-1 form-group mt-3">
                        <a href="CBDocument/<?php echo $row2['OtherDocument']; ?>" target="_blank"><img
                           style="width: 40px;margin-top:20px;" src="images/download.png"></a>
                     </div>
                     <?php
} ?>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Document Name</label>
                        <input value="<?php echo $row2['OtherDocument_Name']; ?>" type="text" class="form-control"
                           name="OtherDocument_Name" placeholder="Document Name">
                     </div>
                     <div class="col-md-4 form-group mt-3">
                        <label class="mb-2">Document Discription</label>
                        <input value="<?php echo $row2['OtherDocument_Discription']; ?>" type="text" class="form-control"
                           name="OtherDocument_Discription" placeholder="Document Discription">
                     </div>
                  </div>
                  <div class="text-right pt-4">
                     <input type="submit" value="Submit" name="Submit" class="btn btn-success" />
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