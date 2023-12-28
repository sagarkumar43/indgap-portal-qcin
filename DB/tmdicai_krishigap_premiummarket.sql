-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 28, 2023 at 06:45 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tmdicai_krishigap_premiummarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_buyer_interface`
--

CREATE TABLE `about_buyer_interface` (
  `Id` int(11) NOT NULL,
  `about_buyer_interface` text NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_buyer_interface`
--

INSERT INTO `about_buyer_interface` (`Id`, `about_buyer_interface`, `CreatedDate`) VALUES
(1, '<p>Sourcing of quality &amp; certified produce is a real pain point for buyers. Exporters and domestic premium buyers are looking for digital connectivity for procuring quality products conforming to international standards.&nbsp;Buyers can access this information to ensure compliance with food safety standards and other regulatory requirements.&nbsp;This&nbsp;&nbsp;traceability and transparency help build trust between suppliers and buyers and promote responsible sourcing practices&nbsp;</p>\r\n\r\n<p><a class=\"btn btn-success\" href=\"https://premiummarket.krishigap.com/home.php\">Login</a></p>\r\n', '2022-10-31 08:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `about_cluster`
--

CREATE TABLE `about_cluster` (
  `Id` int(11) NOT NULL,
  `about_cluster` text NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_cluster`
--

INSERT INTO `about_cluster` (`Id`, `about_cluster`, `CreatedDate`) VALUES
(1, '<p>Data capturing and its visibility of a crop cluster can provide the buyer with valuable information about the crop like crop calendar, sowing &amp; harvesting periods, estimated marketable qty, logistics infrastructure, etc</p>\r\n\r\n<a href=\"https://premiummarket.krishigap.com/home.php\" class=\"btn btn-success\">Login</a>', '2022-10-31 09:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `about_fpo`
--

CREATE TABLE `about_fpo` (
  `Id` int(11) NOT NULL,
  `about_fpo` text NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_fpo`
--

INSERT INTO `about_fpo` (`Id`, `about_fpo`, `CreatedDate`) VALUES
(1, '<p>Food safety-certified suppliers can upload information with their profile, certificate details, certification body audit report, produce test reports, products with their image, the origin, production methods, regulatory compliances, etc.&nbsp;&nbsp;This traceability and transparency help build trust between suppliers and buyers and promote responsible sourcing practices. These details will be visible to the buyers.</p>\r\n\r\n<p><a class=\"btn btn-success\" href=\"https://premiummarket.krishigap.com/home.php\">Login</a></p>\r\n', '2022-10-31 08:53:36');

-- --------------------------------------------------------

--
-- Table structure for table `about_website`
--

CREATE TABLE `about_website` (
  `Id` int(11) NOT NULL,
  `Heading` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_website`
--

INSERT INTO `about_website` (`Id`, `Heading`, `details`, `CreatedDate`) VALUES
(1, 'Premium Market', '', '2022-10-28 05:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `admin_profile`
--

CREATE TABLE `admin_profile` (
  `Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Profile_image` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`Id`, `Name`, `Email`, `Profile_image`, `Phone`, `Password`, `CreatedDate`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'icon2.png', '9876543210123', 'premiummarket', '2022-10-06 06:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_interested_commodities`
--

CREATE TABLE `buyer_interested_commodities` (
  `Id` int(11) NOT NULL,
  `Buyer_Registration_ID` int(11) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Commodities` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_interested_commodities`
--

INSERT INTO `buyer_interested_commodities` (`Id`, `Buyer_Registration_ID`, `Category`, `Commodities`, `CreatedDate`) VALUES
(1, 2, 'Pulses', 'Black Gram,Green Gram,RedGram', '2022-11-07 06:15:44'),
(5, 16, 'Cereals', 'Wheat', '2022-11-07 09:21:24'),
(6, 15, 'Spices', 'Bay Leaf', '2022-11-07 10:54:19'),
(7, 16, 'Pulses', 'Red Gram', '2022-11-08 12:09:16'),
(8, 2, 'Fruits', 'Apple,Avocado,Banana,Blackberry,Blueberry,Cherry,Coconut,Fig,Grapefruit,Grapes,Kiwi,Lemon', '2023-08-03 05:07:09'),
(9, 2, 'Cereals', 'Maize,Barley,Millet', '2023-08-03 05:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `buyer_registration`
--

CREATE TABLE `buyer_registration` (
  `Buyer_Registration_ID` int(100) NOT NULL,
  `ContactPersonName` varchar(200) NOT NULL,
  `MobileNo` varchar(100) NOT NULL,
  `LandlineNo` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `CompanyName` varchar(250) NOT NULL,
  `CompanyWeb` varchar(255) NOT NULL,
  `BusinessActivities` varchar(255) NOT NULL,
  `State` varchar(100) NOT NULL,
  `CompanyAddress` longtext NOT NULL,
  `BuyerType` varchar(100) NOT NULL,
  `Retailer_gst` varchar(255) NOT NULL,
  `Retailer_gst_file` varchar(255) NOT NULL,
  `Retailer_pan` varchar(255) NOT NULL,
  `Retailer_pan_file` varchar(255) NOT NULL,
  `Retailer_fssai` varchar(255) NOT NULL,
  `Retailer_fssai_status` varchar(255) NOT NULL,
  `Retailer_fassai_file` varchar(255) NOT NULL,
  `Retailer_iec` varchar(255) NOT NULL,
  `Retailer_iec_file` varchar(255) NOT NULL,
  `Wholesaler_gst` varchar(255) NOT NULL,
  `Wholesaler_file` varchar(255) NOT NULL,
  `Wholesaler_pan` varchar(255) NOT NULL,
  `Wholesaler_pan_file` varchar(255) NOT NULL,
  `Wholesaler_fssai` varchar(255) NOT NULL,
  `Wholesaler_fssai_status` varchar(255) NOT NULL,
  `Wholesaler__fassai` varchar(255) NOT NULL,
  `Wholesaler_iec` varchar(255) NOT NULL,
  `Wholesaler_iec_file` varchar(255) NOT NULL,
  `processor_gst` varchar(255) NOT NULL,
  `processor_gst_file` varchar(255) NOT NULL,
  `processor_pan` varchar(255) NOT NULL,
  `processor_pan_file` varchar(255) NOT NULL,
  `processor_fssai` varchar(255) NOT NULL,
  `processor_fssai_status` varchar(255) NOT NULL,
  `processor_fssai_file` varchar(255) NOT NULL,
  `processor_iec` varchar(255) NOT NULL,
  `processor_iec_file` varchar(255) NOT NULL,
  `exporter_gst` varchar(255) NOT NULL,
  `exporter_gst_file` varchar(255) NOT NULL,
  `exporter_pan` varchar(255) NOT NULL,
  `exporter_pan_file` varchar(255) NOT NULL,
  `exporter_fssai` varchar(255) NOT NULL,
  `exporter_fssai_status` varchar(255) NOT NULL,
  `exporter_fssai_file` varchar(255) NOT NULL,
  `exporter_iec` varchar(255) NOT NULL,
  `exporter_iec_file` varchar(255) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `Account_Status` varchar(255) NOT NULL COMMENT 'Active / Inactive',
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_registration`
--

INSERT INTO `buyer_registration` (`Buyer_Registration_ID`, `ContactPersonName`, `MobileNo`, `LandlineNo`, `Email`, `Password`, `Designation`, `CompanyName`, `CompanyWeb`, `BusinessActivities`, `State`, `CompanyAddress`, `BuyerType`, `Retailer_gst`, `Retailer_gst_file`, `Retailer_pan`, `Retailer_pan_file`, `Retailer_fssai`, `Retailer_fssai_status`, `Retailer_fassai_file`, `Retailer_iec`, `Retailer_iec_file`, `Wholesaler_gst`, `Wholesaler_file`, `Wholesaler_pan`, `Wholesaler_pan_file`, `Wholesaler_fssai`, `Wholesaler_fssai_status`, `Wholesaler__fassai`, `Wholesaler_iec`, `Wholesaler_iec_file`, `processor_gst`, `processor_gst_file`, `processor_pan`, `processor_pan_file`, `processor_fssai`, `processor_fssai_status`, `processor_fssai_file`, `processor_iec`, `processor_iec_file`, `exporter_gst`, `exporter_gst_file`, `exporter_pan`, `exporter_pan_file`, `exporter_fssai`, `exporter_fssai_status`, `exporter_fssai_file`, `exporter_iec`, `exporter_iec_file`, `DeletedStatus`, `Account_Status`, `CreatedDate`) VALUES
(2, 'Sumit', '9876543210', '', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'iy', 'iyiyiu', '', '', 'Karnataka', 'ljlkjl', 'Wholesaler', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'Active', '2022-08-03 22:47:50'),
(15, 'John', '1111100000', '6598984', 'ab@gmail.com', '202cb962ac59075b964b07152d234b70', 'sdvs', 'sfvafs', 'sfvaf', 'fva', 'Delhi', 'fvad', 'OrganizedRetailer', 'gdfgfdg', 'GAP.pdf', 'dfsdf', 'GAP2.pdf', 'sfdsf', 'Yes', 'GAP4.pdf', 'fsdfs', 'GAP4.pdf', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'Active', '2022-10-10 18:43:56'),
(16, 'Raju Manchana ', '9100588804', '', 'rajumanchana@gmail.com', '202cb962ac59075b964b07152d234b70', 'Owner ', 'Test ', '', 'Trading ', 'Telangana', 'Hyderabad ', 'Wholesaler', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'No', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'Active', '2022-10-18 09:10:18'),
(17, 'admin', '9654911220', '', 'brocoder787@gmail.com', 'b593b5ed1a62f15da3c21b51f3634e1b', '', '', '', '', 'Delhi', '', 'Processor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 'Inactive', '2023-05-02 07:35:14');

-- --------------------------------------------------------

--
-- Table structure for table `cb_users`
--

CREATE TABLE `cb_users` (
  `cb_user_id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `DeletedStatus` int(11) NOT NULL DEFAULT '0',
  `CreatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cb_users`
--

INSERT INTO `cb_users` (`cb_user_id`, `Name`, `Email`, `Mobile`, `Password`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 'Sagar', 'Sagar@gmail.com', '8510872717', '202cb962ac59075b964b07152d234b70', 1, '2023-05-15 08:44:31'),
(2, 'QCI', 'Qci@gmail.com', '9876543210', '202cb962ac59075b964b07152d234b70', 0, '2023-05-23 08:31:25'),
(3, 'DPS', 'dps@gmail.com', '987654321', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2023-05-24 04:04:48'),
(4, 'Inspector', 'Inspector@gmail.com', '987654321', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2023-05-24 09:34:48'),
(5, 'Director', 'Director@gmail.com', '987654321', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2023-05-24 09:34:48'),
(6, 'Reviewer', 'Reviewer@gmail.com', '987654321', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2023-05-24 09:34:48'),
(7, 'Quality Manager', 'QM@gmail.com', '987654321', '81dc9bdb52d04dc20036dbd8313ed055', 0, '2023-05-24 09:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `cb_user_edit_fpo_profile`
--

CREATE TABLE `cb_user_edit_fpo_profile` (
  `ID` int(11) NOT NULL,
  `FPO_Registration_ID` int(50) DEFAULT NULL,
  `CB_User` varchar(255) DEFAULT NULL,
  `CB_User_Email` varchar(255) DEFAULT NULL,
  `CB_User_Phone` varchar(255) DEFAULT NULL,
  `Status_of_IndGAP_DocumentName` varchar(255) DEFAULT NULL,
  `Status_of_IndGAP_Document` varchar(255) DEFAULT NULL,
  `Status_of_IndGAP` varchar(255) DEFAULT NULL,
  `Unique_Number` varchar(100) DEFAULT NULL,
  `R_Client_Name` varchar(150) DEFAULT NULL,
  `R_Current_Status` varchar(150) DEFAULT NULL,
  `R_Client_Application_Form` longtext,
  `R_Signed_Certification_Agreement` longtext,
  `R_Scope` longtext,
  `CG_Client_Name` varchar(100) DEFAULT NULL,
  `CG_Certificate_No` varchar(200) DEFAULT NULL,
  `CG_Certificate_Date` date DEFAULT NULL,
  `CG_Certificate_End_Date` date DEFAULT NULL,
  `CG_Certificate_Renewal_Date` date DEFAULT NULL,
  `CG_Current_Status` varchar(100) DEFAULT NULL,
  `CG_Client_Application_Form` longtext,
  `CG_Signed_Certification_Agreement` longtext,
  `CG_Scope` longtext,
  `S_Client_Name` varchar(100) DEFAULT NULL,
  `S_Certificate_Issue_Date` date DEFAULT NULL,
  `S_Certificate_Validity_Date` date DEFAULT NULL,
  `S_Suspended_Date` date DEFAULT NULL,
  `S_Reason_for_Suspended` varchar(250) DEFAULT NULL,
  `S_Document_Upload` longtext,
  `W_Client_Name` varchar(100) DEFAULT NULL,
  `W_Certificate_Issue_Date` date DEFAULT NULL,
  `W_Certificate_Validity_Date` date DEFAULT NULL,
  `W_Withdrawal_Date` date DEFAULT NULL,
  `W_Reason_for_Withdrawal` varchar(250) DEFAULT NULL,
  `W_Document_Upload` longtext,
  `E_Client_Name` varchar(150) DEFAULT NULL,
  `E_Certificate_Issue_Date` date DEFAULT NULL,
  `E_Certificate_Validity_Date` date DEFAULT NULL,
  `E_Reason_for_Expired` varchar(255) DEFAULT NULL,
  `E_Document_Upload` longtext,
  `AssessmentReport` text,
  `AssessmentReportDocument` longtext,
  `AuditManDaysSpentByCB` varchar(255) DEFAULT NULL,
  `QMSAudit` varchar(255) DEFAULT NULL,
  `MembersInspections` varchar(255) DEFAULT NULL,
  `NonConformityReports` varchar(255) DEFAULT NULL,
  `ClientCorrectiveActions` varchar(255) DEFAULT NULL,
  `CBClosure` varchar(255) DEFAULT NULL,
  `NonConformityReportsDocument` longtext,
  `NonConformityReportsDocument_two` longtext,
  `NonConformityReportsDocument_three` longtext,
  `CBAssessmentSchedule` varchar(255) DEFAULT NULL,
  `ScheduleDate` varchar(255) DEFAULT NULL,
  `AssessmentScheduleDocument` longtext,
  `ClientSignedApplicationFormForRegistration` varchar(255) DEFAULT NULL,
  `ClientSigned_Document` varchar(255) DEFAULT NULL,
  `CertificationAgreementSigned_Document` varchar(255) DEFAULT NULL,
  `CertificationAgreement_Document_Name` varchar(255) DEFAULT NULL,
  `ScopeStatus` varchar(255) DEFAULT NULL,
  `Scope_Document` varchar(255) DEFAULT NULL,
  `GrantedScopeStatus` varchar(255) DEFAULT NULL,
  `Granted_Scope_Document` varchar(255) DEFAULT NULL,
  `Scope_Document_Name` varchar(255) DEFAULT NULL,
  `Clientqualifiedinternalinspectors` text,
  `ClientqualifiedinternalinspectorsDocument` longtext,
  `ClientqualifiedInternalAuditors` text,
  `ClientqualifiedInternalAuditorsDocument` longtext,
  `MassBalanceGranting_Document` varchar(255) DEFAULT NULL,
  `MassBalanceGranting_Document_Name` varchar(255) DEFAULT NULL,
  `MassBalanceGranting_Document_Date` varchar(255) DEFAULT NULL,
  `CBProcedure_Document` varchar(255) DEFAULT NULL,
  `CBProcedure_DocumentName` varchar(255) DEFAULT NULL,
  `ClientFeedback` varchar(255) DEFAULT NULL,
  `DescriptionOfCompliance` varchar(255) DEFAULT NULL,
  `DescriptionOfCompliance_Document` longtext,
  `OtherDocument` varchar(255) DEFAULT NULL,
  `OtherDocument_Name` varchar(255) DEFAULT NULL,
  `OtherDocument_Discription` text,
  `ResidueAnalysisDocument` longtext,
  `QMSChecklist` longtext,
  `CPCCChecklists` longtext,
  `Sampleslip` longtext,
  `TechnicalReviewReport` longtext,
  `CertificationCommitteeReport` longtext,
  `MassBalanceGrantingCertificate` longtext,
  `ProcedureforAssessmentandInspection` longtext,
  `Formats` longtext,
  `Organogramwithstaffdetails` longtext,
  `Remark` longtext,
  `Deleted_Status` int(11) DEFAULT '0',
  `CreatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cluster_collection_center`
--

CREATE TABLE `cluster_collection_center` (
  `Cluster_Collection_Center_ID` int(100) NOT NULL,
  `Cluster_Registration_ID` int(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `CollectionCenter` varchar(250) NOT NULL,
  `NearestTwonForTransport` varchar(250) NOT NULL,
  `DistanceByRoadToTheCollectionCanter` varchar(250) NOT NULL,
  `GovermentMandiProductAuctionLocation` varchar(250) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_collection_center`
--

INSERT INTO `cluster_collection_center` (`Cluster_Collection_Center_ID`, `Cluster_Registration_ID`, `State`, `District`, `CollectionCenter`, `NearestTwonForTransport`, `DistanceByRoadToTheCollectionCanter`, `GovermentMandiProductAuctionLocation`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(3, 4, 'Andhra Pradesh', 'Anantapur', 'test1', '', '', '', 0, '', '2022-08-04 03:09:08'),
(4, 4, 'Andhra Pradesh', 'Anantapur', 'test2', '', '', '', 1, '', '2022-08-04 03:11:32'),
(5, 4, 'Andhra Pradesh', 'Anantapur', 'test2', '', '', '', 0, '', '2022-08-04 11:51:34'),
(6, 2, 'Kerala', 'Alappuzha', 'test1', 'i', 'iuy', 'iu', 0, '', '2022-08-05 14:37:25'),
(7, 2, 'Kerala', 'Alappuzha', 'test2', '', '', '', 0, '', '2022-08-05 14:37:30'),
(8, 2, 'Kerala', 'Alappuzha', 'test3', '', '', '', 1, '', '2022-08-05 14:37:37'),
(9, 2, 'Kerala', 'Alappuzha', 'test3', '', '', '', 1, '', '2022-08-05 02:17:27'),
(10, 8, 'Delhi', 'North West Delhi', 'North West Collection Centers', 'Delhi', '15 Km', 'Government of Delhi', 0, '', '2022-09-15 16:43:21'),
(11, 6, 'Andhra Pradesh', 'Anantapur', 'testing', 'testing123', 'testing456', 'testing 00', 0, '', '2022-11-04 16:27:21'),
(12, 14, 'Meghalaya', '', 'LASIKEN ', 'Meghalaya ', '34', ' LASIKEN ', 0, '', '2023-01-04 00:24:54'),
(13, 9, 'Uttar Pradesh', 'Agra', 'Agra Center', 'Agra Center', 'Agra Center', 'Agra Center', 0, '', '2023-01-06 02:59:41'),
(14, 9, 'Uttar Pradesh', 'Agra', 'test', 'test', 'test', 'test', 1, '', '2023-04-23 19:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_crop_calenders`
--

CREATE TABLE `cluster_crop_calenders` (
  `Cluster_Crop_Calender_Id` int(100) NOT NULL,
  `Cluster_Registration_ID` int(100) NOT NULL,
  `CategoryName` varchar(200) NOT NULL,
  `CropName` varchar(200) NOT NULL,
  `January` int(50) NOT NULL,
  `February` int(50) NOT NULL,
  `March` int(50) NOT NULL,
  `April` int(50) NOT NULL,
  `May` int(50) NOT NULL,
  `June` int(50) NOT NULL,
  `July` int(50) NOT NULL,
  `August` int(50) NOT NULL,
  `September` int(50) NOT NULL,
  `October` int(50) NOT NULL,
  `November` int(50) NOT NULL,
  `December` int(50) NOT NULL,
  `DeletedStatus` int(100) NOT NULL DEFAULT '0',
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_crop_calenders`
--

INSERT INTO `cluster_crop_calenders` (`Cluster_Crop_Calender_Id`, `Cluster_Registration_ID`, `CategoryName`, `CropName`, `January`, `February`, `March`, `April`, `May`, `June`, `July`, `August`, `September`, `October`, `November`, `December`, `DeletedStatus`, `CreatedDate`) VALUES
(4, 4, '3', 'Crop1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 22:30:15'),
(5, 4, '5', 'Crop1', 76, 876, 87, 68, 76, 87, 687, 6, 876, 87, 6, 8768, 0, '2022-08-04 22:30:30'),
(6, 4, '3', 'Crop1', 5, 65, 675, 76576, 5, 76, 57, 65, 76, 5, 765, 67, 0, '2022-08-04 22:30:45'),
(7, 4, '4', 'Crop1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 22:50:59'),
(8, 4, '5', 'Crop1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 22:51:04'),
(9, 4, '5', 'Crop1', 76, 876, 87, 68, 76, 87, 687, 6, 876, 87, 6, 8768, 0, '2022-08-04 22:51:13'),
(10, 2, '2', 'Crop1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-05 03:15:54'),
(11, 2, '8', 'Crop1', 687, 6, 876, 876, 87, 68, 76, 87, 687, 6, 68, 8, 0, '2022-08-05 03:16:09'),
(12, 9, '1', 'Crop1', 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 6, 1, '2023-04-23 19:14:17');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_farmers`
--

CREATE TABLE `cluster_farmers` (
  `Cluster_Farmer_Id` int(100) NOT NULL,
  `Cluster_Registration_ID` int(100) NOT NULL,
  `FPOSelfHelpGroup` varchar(100) NOT NULL,
  `FarmerName` varchar(100) NOT NULL,
  `PhoneNo` varchar(50) NOT NULL,
  `TotalIrrigatedArea` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Block` varchar(150) NOT NULL,
  `SowingMonth` varchar(50) NOT NULL,
  `ExpectedYeildinMT` varchar(200) NOT NULL,
  `CurrentMarketPlace` varchar(150) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `Village` varchar(250) NOT NULL,
  `HarvestingMonth` varchar(50) NOT NULL,
  `CropName` varchar(100) NOT NULL,
  `Grade` varchar(255) NOT NULL,
  `Variety` varchar(255) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_farmers`
--

INSERT INTO `cluster_farmers` (`Cluster_Farmer_Id`, `Cluster_Registration_ID`, `FPOSelfHelpGroup`, `FarmerName`, `PhoneNo`, `TotalIrrigatedArea`, `District`, `State`, `Block`, `SowingMonth`, `ExpectedYeildinMT`, `CurrentMarketPlace`, `FatherName`, `FileName`, `Village`, `HarvestingMonth`, `CropName`, `Grade`, `Variety`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(3, 4, '686', '6', '876', '876', 'Bokaro', 'Jharkhand', '87', 'October', '876', '786', '786', 'Manual Entry', '786', 'August', 'Kharif', '', '', 0, '', '2022-08-05 12:21:18'),
(4, 2, '8678', '68', '76', '876', 'Araria', 'Bihar', '876', 'April', '876', '78', '68', 'Manual Entry', '876', 'November', 'Rabi', '', '', 0, '', '2022-08-05 03:28:00'),
(5, 8, 'Testing', 'Neeraj', '9876543210', '5', 'Chirang', 'Assam', '6', 'January', '50', '12', 'Sonu', 'Manual Entry', 'Bengtol', 'August', 'Kharif', '', '', 0, '', '2022-09-15 16:59:27'),
(42, 9, 'Testing', 'Testing', '9876543210', '500', 'Arwal', 'Bihar', 'B Block', 'January', '50', '12', 'Testing41', 'Manual Entry', 'Burari Gaon', 'March', 'Blackgram', 'C', 'BBG-130', 0, '', '2022-11-28 10:59:47'),
(48, 9, 'Self', 'Testing', '9876543210', '1000', 'North West', 'Delhi', 'A Block', 'Dec-22', '50000', '20000', 'Testing Sharma', 'FPO Farmer CSV Format File.csv', 'Mundka ', 'June', 'Blackgram', 'A', 'BBG-160', 0, '', '2022-11-28 11:51:58'),
(49, 9, 'Self', 'Testing', '9876543210', '1000', 'North West', 'Delhi', 'A Block', '', '60000', '20000', 'Testing Sharma', 'FPO Farmer CSV Format File.csv', 'Mundka ', '', 'Blackgram', 'B', 'BBG', 0, '', '2022-11-28 11:51:58'),
(50, 9, 'Self', 'Testing', '9876543210', '1000', 'North West', 'Delhi', 'A Block', '', '70000', '20000', 'Testing Sharma', 'FPO Farmer CSV Format File.csv', 'Mundka ', '', 'Blackgram', 'C', 'BBG-130', 0, '', '2022-11-28 11:51:58'),
(51, 9, 'Self', 'Testing', '9876543210', '1000', 'North West', 'Delhi', 'A Block', '', '80000', '20000', 'Testing Sharma', 'FPO Farmer CSV Format File.csv', 'Mundka ', '', 'Blackgram', 'A', 'BBG-160', 0, '', '2022-11-28 11:51:58'),
(52, 9, 'Self', 'Testing', '9876543210', '1000', 'North West', 'Delhi', 'A Block', '', '90000', '20000', 'Testing Sharma', 'FPO Farmer CSV Format File.csv', 'Mundka ', '', 'Blackgram', 'B', 'BBG', 0, '', '2022-11-28 11:51:58'),
(53, 9, 'Testing', 'Neeraj', '9876543210', '50', 'Anantapur', 'Andhra Pradesh', 'B Block', 'January', '50', '12', 'Sonu', 'Manual Entry', 'Burari Gaon', 'June', 'Kharif', 'A', 'A', 0, '', '2023-01-23 14:21:30'),
(54, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2023-05-03 08:23:39');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_food_safety_standard_docs`
--

CREATE TABLE `cluster_food_safety_standard_docs` (
  `Id` int(11) NOT NULL,
  `Cluster_Registration_ID` varchar(255) NOT NULL,
  `document_standard` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_desc` varchar(255) NOT NULL,
  `Profile_document` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_food_safety_standard_docs`
--

INSERT INTO `cluster_food_safety_standard_docs` (`Id`, `Cluster_Registration_ID`, `document_standard`, `document_name`, `document_desc`, `Profile_document`, `CreatedDate`) VALUES
(2, '6', 'IndGAP', 'Lorem_ipsum', 'ipsum123', 'FPO Farmer CSV Format File.csv', '2022-11-05 08:57:33'),
(3, '6', 'IndGAP', 'tt', 'ttt', 'dummy.pdf', '2023-05-03 06:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_production`
--

CREATE TABLE `cluster_production` (
  `Cluster_Production_ID` int(100) NOT NULL,
  `Cluster_Registration_ID` int(100) NOT NULL,
  `CollectionCenter` varchar(250) NOT NULL,
  `SeasonName` varchar(250) NOT NULL,
  `CommodityName` varchar(255) DEFAULT NULL,
  `CommodityCategory` varchar(255) DEFAULT NULL,
  `VarietyName` varchar(250) NOT NULL,
  `Grade` varchar(100) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `TotalQtyInMT` int(50) NOT NULL,
  `QtySoldInMT` int(50) NOT NULL,
  `QtyBalanceInMT` int(50) NOT NULL,
  `CropSpecification` varchar(250) NOT NULL,
  `FoodSaftyCertification` varchar(250) DEFAULT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `UpdatedDate` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_production`
--

INSERT INTO `cluster_production` (`Cluster_Production_ID`, `Cluster_Registration_ID`, `CollectionCenter`, `SeasonName`, `CommodityName`, `CommodityCategory`, `VarietyName`, `Grade`, `Size`, `TotalQtyInMT`, `QtySoldInMT`, `QtyBalanceInMT`, `CropSpecification`, `FoodSaftyCertification`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(2, 0, '3', '998', '', '', '798', '79', '87', 98, 7, 987, '89', 'IndGAP', 0, '', '2022-08-04 20:37:48'),
(3, 0, '3', '6876', '', '', '87', '687', '6', 876, 87, 6, '87676', 'Global GAP', 0, '', '2022-08-04 20:48:55'),
(4, 0, '3', '798', '', '', '7', '98798', '7', 987, 98, 79, '98', 'IndGAP', 0, '', '2022-08-04 20:50:02'),
(5, 4, '3', '908', '', '', '908', '098', '09', 8, 98, 9809, '08098', 'IndGAP', 1, '', '2022-08-04 20:54:24'),
(6, 2, '6', '979', '', '', '87', '98', '798', 79, 7, 98, '79', 'NPOP Organic', 0, '', '2022-08-05 02:55:09'),
(7, 8, 'North West Collection Centers', 'Winter', '', '', 'Cashews', '15', '', 150, 125, 25, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-09-15 16:45:38'),
(8, 6, 'testing', 'Kharif', 'Blackgram', 'Pulses', 'BBG', 'A', '', 430, 400, 55, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-11-04 16:37:14'),
(9, 14, '12', 'Kharif ', '', '', 'LAKADANG TURMERIC ', 'A ', '', 100, 10, 90, '', '', 0, '', '2023-01-04 00:27:54'),
(10, 9, '13', 'Winter', '', '', 'BBG-226', 'A1', '62', 4, 4, 4, 'Temperature In refer 13.5 degree', 'Global GAP', 1, '', '2023-01-06 03:07:29'),
(11, 9, '13', 'Winter', '', '', 'Cashews and Almond', 'A1', '15', 0, 0, 0, '', '', 1, '', '2023-01-06 03:10:56'),
(12, 9, 'Agra Center', 'Winter', '', '', 'Banana', 'C', '', 0, 0, 0, '', '', 0, '', '2023-01-06 03:12:54'),
(13, 9, 'Agra Center', 'test', '', '', 'sagar', '15', '15', 0, 0, 0, 'Temperature In refer 13.5 degreefsdfsd', 'Rain Forest Alliance', 1, '', '2023-01-06 03:13:29'),
(14, 6, 'testing', 'test', '', '', 'tt', 'tt', '55', 44, 44, 44, 'tt', 'IndGAP', 0, '', '2023-05-03 06:29:34'),
(15, 6, 'testing', 'tt', '', '', 'tt', 'tt', 'tt', 55, 55, 55, '55', 'IndGAP', 0, '', '2023-05-03 06:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_production_certifications`
--

CREATE TABLE `cluster_production_certifications` (
  `cluster_production_certification_id` int(100) NOT NULL,
  `Cluster_Production_ID` int(100) NOT NULL,
  `certification_name` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_production_certifications`
--

INSERT INTO `cluster_production_certifications` (`cluster_production_certification_id`, `Cluster_Production_ID`, `certification_name`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 4, '1659626402-3370-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 20:50:02'),
(2, 4, '1659626402-2521-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 20:50:02'),
(3, 4, '1659626402-9498-DOC-1659345246-6791-DOC-Central Agriculture Universities (1).xlsx', 0, '2022-08-04 20:50:02'),
(4, 5, '1659626664-9621-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 20:54:24'),
(5, 5, '1659626664-8059-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 20:54:24'),
(6, 5, '1659626664-1098-DOC-1659345246-6791-DOC-Central Agriculture Universities (1).xlsx', 0, '2022-08-04 20:54:24'),
(7, 6, '1659693309-8105-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-05 02:55:09'),
(8, 6, '1659693309-2185-DOC-1659345246-6791-DOC-Central Agriculture Universities (1).xlsx', 0, '2022-08-05 02:55:09'),
(9, 6, '1659693309-1945-DOC-1659345246-6791-DOC-Central Agriculture Universities.xlsx', 0, '2022-08-05 02:55:09'),
(10, 7, '1663240538-3113-DOC-countries-compared-by-po.xls', 0, '2022-09-15 16:45:38'),
(11, 0, '1682277179-7505-DOC-coming-soon.png', 0, '2023-04-23 19:12:59'),
(12, 0, '1682277758-7846-DOC-ashish sir.pdf', 0, '2023-04-23 19:22:38'),
(13, 0, '1682278283-9624-DOC-fg.webp', 0, '2023-04-23 19:31:23'),
(14, 21, '1682278497-9851-DOC-fg.webp', 0, '2023-04-23 19:34:57'),
(15, 0, '1682278711-2843-DOC-coming-soon.png', 0, '2023-04-23 19:38:31'),
(16, 0, '1682279269-5032-DOC-dataset.png', 0, '2023-04-23 19:47:49'),
(17, 0, '1682279305-5960-DOC-dataset.png', 0, '2023-04-23 19:48:25'),
(18, 23, '1682279631-5337-DOC-dataset.png', 0, '2023-04-23 19:53:51'),
(19, 14, '1683095374-8386-DOC-dummy.pdf', 0, '2023-05-03 06:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_production_images`
--

CREATE TABLE `cluster_production_images` (
  `cluster_production_image_id` int(100) NOT NULL,
  `Cluster_Production_ID` int(100) NOT NULL,
  `image_name` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_production_images`
--

INSERT INTO `cluster_production_images` (`cluster_production_image_id`, `Cluster_Production_ID`, `image_name`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 4, '1659626402-4042-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 20:50:02'),
(2, 4, '1659626402-7668-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 20:50:02'),
(3, 5, '1659626664-1751-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 20:54:24'),
(4, 5, '1659626664-6776-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 20:54:24'),
(5, 6, '1659693309-3515-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-05 02:55:09'),
(6, 6, '1659693309-3092-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-05 02:55:09'),
(7, 7, '1663240538-8445-DOC-nuts.png', 0, '2022-09-15 16:45:38'),
(8, 0, '1682277147-9602-DOC-coming-soon.png', 0, '2023-04-23 19:12:27'),
(9, 0, '1682277179-2297-DOC-coming-soon.png', 0, '2023-04-23 19:12:59'),
(10, 0, '1682277758-5164-DOC-fg.webp', 0, '2023-04-23 19:22:38'),
(11, 0, '1682278283-7303-DOC-fg.webp', 0, '2023-04-23 19:31:23'),
(12, 21, '1682278497-5515-DOC-fg.webp', 0, '2023-04-23 19:34:57'),
(13, 0, '1682278711-8364-DOC-coming-soon.png', 0, '2023-04-23 19:38:31'),
(14, 0, '1682279269-6004-DOC-dataset.png', 0, '2023-04-23 19:47:49'),
(15, 0, '1682279305-5183-DOC-dataset.png', 0, '2023-04-23 19:48:25'),
(16, 23, '1682279631-6130-DOC-dataset.png', 0, '2023-04-23 19:53:51'),
(17, 14, '1683095374-5420-DOC-img-sample.png', 0, '2023-05-03 06:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_registration`
--

CREATE TABLE `cluster_registration` (
  `Cluster_Registration_ID` int(100) NOT NULL,
  `ClusterName` varchar(200) NOT NULL,
  `ClusterAddress` longtext NOT NULL,
  `block_taluka_mandal` varchar(255) NOT NULL,
  `State` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `ContactPerson` varchar(100) NOT NULL,
  `ContactNo` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `RegistrationCertificates` varchar(100) NOT NULL,
  `RegistrationDate` varchar(100) NOT NULL,
  `NoofFarmer` varchar(100) DEFAULT NULL,
  `TotalLandHAWithFPOfarmers` varchar(100) DEFAULT NULL,
  `PaidupShareCapital` varchar(100) DEFAULT NULL,
  `PromotingAgency` varchar(100) DEFAULT NULL,
  `BussinessActivity` varchar(200) DEFAULT NULL,
  `TotalIrrigatedArea` varchar(100) DEFAULT NULL,
  `CropType` varchar(200) DEFAULT NULL,
  `MajorCropName` varchar(200) DEFAULT NULL,
  `YearofTurnoverRs` varchar(100) DEFAULT NULL,
  `TurnoverRs` varchar(200) DEFAULT NULL,
  `FixedInfrastructureBuildings` varchar(200) DEFAULT NULL,
  `Plantandmachinery` varchar(200) DEFAULT NULL,
  `Others` varchar(200) DEFAULT NULL,
  `WarehouseFaclity` varchar(200) DEFAULT NULL,
  `WarehouseFaclityDescription` varchar(200) DEFAULT NULL,
  `WarehouseFacilityYearofConstruction` varchar(200) DEFAULT NULL,
  `WarehouseFacilityLocation` varchar(200) DEFAULT NULL,
  `WarehouseFacilityLocationAreainsqft` varchar(200) DEFAULT NULL,
  `Lenght` varchar(100) DEFAULT NULL,
  `Width` varchar(100) DEFAULT NULL,
  `Depth` varchar(100) DEFAULT NULL,
  `ProduceStored` varchar(100) DEFAULT NULL,
  `Capacity` varchar(100) DEFAULT NULL,
  `PresentStatus` varchar(100) DEFAULT NULL,
  `ProcessingEquipment` varchar(100) DEFAULT NULL,
  `DescriptionofEquipment` longtext,
  `YearofPurchaseEquipment` varchar(100) DEFAULT NULL,
  `ProcessingActivityofEquipment` varchar(100) DEFAULT NULL,
  `Capacity1` varchar(100) DEFAULT NULL,
  `DescriptionofOutputEquipment` longtext,
  `PresentStatus1` varchar(100) DEFAULT NULL,
  `FarmEquipment` varchar(100) DEFAULT NULL,
  `DescriptionofEquipmentFarm` longtext,
  `YearofPurchaseEquipmentFarm` varchar(100) DEFAULT NULL,
  `ActivityofFarm` varchar(100) DEFAULT NULL,
  `PresentStatus2` varchar(100) DEFAULT NULL,
  `SalesHistory` varchar(100) DEFAULT NULL,
  `Year` varchar(100) DEFAULT NULL,
  `CropName` varchar(200) DEFAULT NULL,
  `ProduceVariety` varchar(100) DEFAULT NULL,
  `Grade` varchar(100) DEFAULT NULL,
  `QtyinMT` varchar(100) DEFAULT NULL,
  `ValuesRsinLakhs` varchar(100) DEFAULT NULL,
  `MarketPlace` varchar(100) DEFAULT NULL,
  `CustomerList` varchar(200) DEFAULT NULL,
  `AveragePriceperMT` varchar(100) DEFAULT NULL,
  `CollectionCenterorWarehouse` varchar(100) DEFAULT NULL,
  `Storagetype` varchar(100) DEFAULT NULL,
  `Password` varchar(250) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `Account_Status` varchar(255) DEFAULT NULL COMMENT 'Active / Inactive',
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_registration`
--

INSERT INTO `cluster_registration` (`Cluster_Registration_ID`, `ClusterName`, `ClusterAddress`, `block_taluka_mandal`, `State`, `District`, `ContactPerson`, `ContactNo`, `Email`, `RegistrationCertificates`, `RegistrationDate`, `NoofFarmer`, `TotalLandHAWithFPOfarmers`, `PaidupShareCapital`, `PromotingAgency`, `BussinessActivity`, `TotalIrrigatedArea`, `CropType`, `MajorCropName`, `YearofTurnoverRs`, `TurnoverRs`, `FixedInfrastructureBuildings`, `Plantandmachinery`, `Others`, `WarehouseFaclity`, `WarehouseFaclityDescription`, `WarehouseFacilityYearofConstruction`, `WarehouseFacilityLocation`, `WarehouseFacilityLocationAreainsqft`, `Lenght`, `Width`, `Depth`, `ProduceStored`, `Capacity`, `PresentStatus`, `ProcessingEquipment`, `DescriptionofEquipment`, `YearofPurchaseEquipment`, `ProcessingActivityofEquipment`, `Capacity1`, `DescriptionofOutputEquipment`, `PresentStatus1`, `FarmEquipment`, `DescriptionofEquipmentFarm`, `YearofPurchaseEquipmentFarm`, `ActivityofFarm`, `PresentStatus2`, `SalesHistory`, `Year`, `CropName`, `ProduceVariety`, `Grade`, `QtyinMT`, `ValuesRsinLakhs`, `MarketPlace`, `CustomerList`, `AveragePriceperMT`, `CollectionCenterorWarehouse`, `Storagetype`, `Password`, `DeletedStatus`, `Account_Status`, `CreatedDate`) VALUES
(6, '565', '65675', '', 'Andhra Pradesh', 'Anantapur', '86', '87676', 'test@gmail.com', '1659795329-2724-DOC-1656415426-5097-img-demo-1.pdf', '2022-08-11', '687', '6786', '786', '87', '687', '6', 'Crop1', '87', '2022', '687', '687', '68', '76', 'No', '87', '676', '876', '87', '687', '6', '876', '87', '6', '6', 'Yes', '76', '87', '687', '', '76', '87', 'Yes', '876', '76', '876', '78', '6', '2022', '76', '87', '67', '68', '76', '876', '78', '68', '76', '6', '202cb962ac59075b964b07152d234b70', 0, 'Active', '2022-08-06 19:45:29'),
(7, 'testing', 'new delhi', '', 'Delhi', 'South Delhi', 'test', '9876543210', 'testing@gmail.com', '1662439115-3913-DOC-', '2022-08-30', '0', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, 'Active', '2022-09-06 10:08:35'),
(8, 'CRD Pvt Ltd', 'New Delhi', '', 'Delhi', 'North West Delhi', 'Sagar', '9876543210', 'Sagar@gmail.com', '1663239977-1805-DOC-countries-compared-by-po.xls', '2022-09-06', '0', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, 'Inactive', '2022-09-15 16:36:17'),
(9, 'DPS Zone', 'Agra Uttar Pradesh', 'Akbarpur', 'Uttar Pradesh', 'Agra', 'DPS', '9876543210', 'dps@gmail.com', '1664191628-9839-DOC-fpo_db (2).sql', '2022-09-26', '0', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, 'Active', '2022-09-26 16:57:08'),
(11, 'test ', 'Hyd ', 'Hyd ', 'Telangana', '', 'raju', '9100588804', 'rajumanchana@gmail.com', '1665646990-3827-DOC-', '', '0', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, 'Inactive', '2022-10-13 00:43:10'),
(12, 'test ', 'Hyd ', 'Hyd ', 'Telangana', '', 'raju', '6300930818', 'raju.manchana@efreshglobal.com', '1665647151-1965-DOC-', '', '0', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Inactive', '2022-10-13 00:45:51'),
(13, 'raju ', 'Hyderabad ', 'hyderabad ', 'Telangana', '', 'Raju  ', '9010466610', 'anjireddy@efreshglobal.com', '1666005811-3775-DOC-', '', '0', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, 'Active', '2022-10-17 04:23:31'),
(14, 'LAKADONG TURMERIC CLUSTER ', 'Madankansaw Vi, ', 'Mowkyndeng', 'Meghalaya', '', 'Steward William Poshai ', '9568236763', 'stewardwpassah@gmail.com', '1672813723-1694-DOC-', '', '0', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 'Active', '2023-01-03 23:28:43'),
(16, 'test', 'new delhi', 'testing15', 'Maharashtra', 'Ahmednagar', 'test', '9876543210', 'test@mail.com', '1674462082-6568-DOC-', '', '0', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '', '', '', '0', '', '', '', '0', '', '', '', '0', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, 'Active', '2023-01-23 01:21:22'),
(21, 'Sagar', 'Sagar', 'Sagar', 'Delhi', 'Central Delhi', 'Sagar', '8510872717', 'Sagar.arete@gmail.com', '1683030552-8849-DOC-Lorem_ipsum.pdf', '2023-05-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, '', '2023-05-02 12:29:12');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_supporting_information`
--

CREATE TABLE `cluster_supporting_information` (
  `cluster_supporting_information_id` int(100) NOT NULL,
  `Cluster_Registration_ID` int(100) NOT NULL,
  `VillageName` varchar(250) NOT NULL,
  `State` varchar(100) NOT NULL,
  `District` varchar(150) NOT NULL,
  `DistancefromHQinKms` varchar(100) NOT NULL,
  `NoofFarmers` int(50) NOT NULL,
  `CropName` varchar(150) NOT NULL,
  `Variety` varchar(250) NOT NULL,
  `Grade` varchar(200) NOT NULL,
  `CropSeason` varchar(200) NOT NULL,
  `LandUnderCultivationinHa` varchar(200) NOT NULL,
  `AppoximateYieldperHainMT` varchar(200) NOT NULL,
  `HarvestMonth` varchar(100) NOT NULL,
  `ExpectedQuantityinMT` varchar(100) NOT NULL,
  `MarketableSurplus` varchar(100) NOT NULL,
  `Marketplace` varchar(100) NOT NULL,
  `MarketPriceperMTLastSeasoninRs` varchar(100) NOT NULL,
  `DiscriptionofEquipmentInfrastructurefacilitiesforValuead` longtext NOT NULL,
  `ActivityInfrastructurefacilitiesforValueadditionoffarm` varchar(200) NOT NULL,
  `OperationalStatusInfrastructurefacilitiesforValueaddition` varchar(200) NOT NULL,
  `SQFTWarehouseFacilities` varchar(200) NOT NULL,
  `CapacityinMTWarehouseFacilities` varchar(150) NOT NULL,
  `AccreditationstatusWarehouseFacilities` varchar(200) NOT NULL,
  `LogisticfacilitiesforProducetransport` varchar(200) NOT NULL,
  `GoodAgricultaralPracticesImplimentation` varchar(200) NOT NULL,
  `NameFarmoutputAggregators` varchar(200) NOT NULL,
  `Address` longtext NOT NULL,
  `ActivityFarmoutputAggregators` varchar(100) NOT NULL,
  `MobileFarmoutputAggregators` int(100) NOT NULL,
  `EmailFarmoutputAggregators` varchar(100) NOT NULL,
  `Challenges` varchar(200) NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `collection_center`
--

CREATE TABLE `collection_center` (
  `Collection_Center_ID` int(100) NOT NULL,
  `FPO_Registration_ID` int(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `District` varchar(100) NOT NULL,
  `CollectionCenter` varchar(250) NOT NULL,
  `NearestTwonForTransport` varchar(250) NOT NULL,
  `DistanceByRoadToTheCollectionCanter` varchar(250) NOT NULL,
  `GovermentMandiProductAuctionLocation` varchar(250) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection_center`
--

INSERT INTO `collection_center` (`Collection_Center_ID`, `FPO_Registration_ID`, `State`, `District`, `CollectionCenter`, `NearestTwonForTransport`, `DistanceByRoadToTheCollectionCanter`, `GovermentMandiProductAuctionLocation`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(3, 4, 'Andhra Pradesh', 'Anantapur', 'test1', 'iy', 'iuyiu', 'yiuy', 1, '', '2022-08-04 03:09:08'),
(4, 4, 'Andhra Pradesh', 'Anantapur', 'test2', '', '', '', 1, '', '2022-08-04 03:11:32'),
(5, 4, 'Andhra Pradesh', 'Anantapur', 'test 2', '', '', '', 1, '', '2022-08-03 23:22:02'),
(6, 4, 'Andhra Pradesh', 'Anantapur', 'iy', 'iuy', 'iuyi', 'uyi', 1, '', '2022-08-06 05:10:07'),
(7, 10, 'Tamil Nadu', 'Namakkal', 'Namakkal Collection Center', 'Namakkal', '15 Km', 'Government of Tamil Nadu', 0, '', '2022-09-09 15:26:14'),
(8, 12, 'Telangana', 'Wanaparthy', 'Test _1 ', 'Mahaboobnagar ', '15 ', 'Mahaboobnagar ', 0, '', '2022-10-18 02:17:19'),
(9, 12, 'Telangana', 'Wanaparthy', 'TEST_2 ', 'HYD ', '120 ', 'Hyd ', 0, '', '2022-10-18 02:26:33'),
(10, 13, 'Maharashtra', 'Ahmednagar', 'Namakkal Collection Center', 'Namakkal', '15 Km', 'Government of Tamil Nadu ', 0, '', '2022-10-18 02:46:13'),
(11, 14, 'Telangana', 'Wanaparthy', 'Kashimnagar ', 'Wanaparthy ', '15 ', 'AMC Wanaparthy ', 0, '', '2022-12-01 03:53:07'),
(12, 12, 'Telangana', 'Wanaparthy', 'Testing3', 'Testing3', 'Testing3', 'Testing3', 0, '', '2023-04-23 16:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `crop_calenders`
--

CREATE TABLE `crop_calenders` (
  `Crop_Calender_Id` int(100) NOT NULL,
  `FPO_Registration_ID` int(100) NOT NULL,
  `CategoryName` varchar(200) NOT NULL,
  `CropName` varchar(200) NOT NULL,
  `January` int(50) NOT NULL,
  `February` int(50) NOT NULL,
  `March` int(50) NOT NULL,
  `April` int(50) NOT NULL,
  `May` int(50) NOT NULL,
  `June` int(50) NOT NULL,
  `July` int(50) NOT NULL,
  `August` int(50) NOT NULL,
  `September` int(50) NOT NULL,
  `October` int(50) NOT NULL,
  `November` int(50) NOT NULL,
  `December` int(50) NOT NULL,
  `DeletedStatus` int(100) NOT NULL DEFAULT '0',
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crop_calenders`
--

INSERT INTO `crop_calenders` (`Crop_Calender_Id`, `FPO_Registration_ID`, `CategoryName`, `CropName`, `January`, `February`, `March`, `April`, `May`, `June`, `July`, `August`, `September`, `October`, `November`, `December`, `DeletedStatus`, `CreatedDate`) VALUES
(4, 4, '3', 'Crop1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 22:30:15'),
(5, 4, '5', 'Crop1', 76, 876, 87, 68, 76, 87, 687, 6, 876, 87, 6, 8768, 0, '2022-08-04 22:30:30'),
(6, 4, '3', 'Crop1', 5, 65, 675, 76576, 5, 76, 57, 65, 76, 5, 765, 67, 0, '2022-08-04 22:30:45'),
(7, 4, '4', 'Crop1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 22:50:59'),
(8, 4, '5', 'Crop1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2022-08-04 22:51:04'),
(9, 4, '5', 'Crop1', 76, 876, 87, 68, 76, 87, 687, 6, 876, 87, 6, 8768, 0, '2022-08-04 22:51:13'),
(10, 12, '4', 'Crop1', 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-10-18 22:09:18'),
(11, 12, '4', 'Crop1', 150, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2022-10-18 22:09:18'),
(12, 12, '4', 'Crop1', 150, 500, 200, 200, 200, 150, 150, 100, 150, 150, 150, 200, 0, '2022-10-18 22:10:35'),
(13, 12, 'Pulses ', 'Black Gram ', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, '2023-04-23 18:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `export_document`
--

CREATE TABLE `export_document` (
  `Id` int(11) NOT NULL,
  `Standard` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Doc_Name` text NOT NULL,
  `Document` varchar(255) NOT NULL,
  `Doc_Source` text NOT NULL,
  `Source_Link` varchar(255) NOT NULL,
  `DeletedStatus` int(11) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `export_document`
--

INSERT INTO `export_document` (`Id`, `Standard`, `Country`, `Doc_Name`, `Document`, `Doc_Source`, `Source_Link`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 'Others', 'India', 'Agmark grading Procedure for export to EU', 'Agmark-grading-procedure-for-export-to-EU.pdf', 'Directorate of marketing & Inspection, Ministry of Agriculture', 'https://dmi.gov.in/GradesStandard.aspx', 0, '2023-09-15 07:10:23'),
(2, 'Others', 'India', 'Procedure for issuance of PhytoSanitary Certificate and issuance offices', 'Procdure-for-Phyto-Sanitary-Certificate-Issuance.pdf', 'Directorate of Plant Protection ,Quarantine and Storage', 'https://ppqs.gov.in/', 0, '2023-09-15 07:10:49'),
(3, 'Others', 'India', 'Registration with APEDA for Export', 'Registration-with-APEDA-for-Export.pdf', 'APEDA', 'https://apeda.gov.in', 0, '2023-09-15 07:13:33'),
(4, 'Others', 'India', 'General Compliances for Export of Agri Products', 'General-Compliances-for-Export-of-Agri-Products.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'N/A', 0, '2023-09-15 07:13:58'),
(5, 'Others', 'India', 'Product Wise Compliances for Export of Agri products', 'Product-Wise-Compliances-for-Export-of-Agri-products.pdf', 'APEDA', 'https://apeda.gov.in/', 0, '2023-09-15 07:14:28'),
(6, 'Others', 'India', 'Fresh Fruits and Vegetables Notified under Agmark Act', 'Fresh-Fruits-and-Vegetables-Notified-under-Agmark-Act.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'N/A', 0, '2023-09-15 07:14:54'),
(7, 'Others', 'India', 'Phytosanitary Certificate', 'Phyto-Sanitary-Certificate-Issuance.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/DMI from time to time to facilitate exports', 'N/A', 0, '2023-09-15 07:15:50'),
(8, 'Others', 'India', 'Certificate of Origin', 'Certificate-of-Origin.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'https://apeda.gov.in/', 0, '2023-09-15 07:16:12'),
(9, 'Others', 'India', 'Certificate of Conformity', 'Certificate-of-Conformity.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'https://apeda.gov.in/', 0, '2023-09-15 07:16:27'),
(10, 'Others', 'India', 'Certificate of Analysis', 'Certificate-of-Analysis.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'https://apeda.gov.in/', 0, '2023-09-15 07:16:47'),
(11, 'Others', 'India', 'Authenticity Certificate', 'Authenticity-Certificate.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'https://apeda.gov.in/', 0, '2023-09-15 07:17:10'),
(12, 'Others', 'India', 'Health Certificate to European Countries', 'Health-Certificate-to-European-Countries.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'https://apeda.gov.in/', 0, '2023-09-15 07:17:34'),
(13, 'Others', 'India', 'Agmark Grading Certificate procedure for export of fresh fruits and vegetables to European countries', 'Agmark-Grading-Certificate-to-European-Countries.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/DMI from time to time to facilitate exports', 'N/A', 0, '2023-09-15 07:18:10'),
(14, 'Others', 'India', 'Agmark Grading Certificate for Onions', 'Agmark-Grading-for-Onion.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'N/A', 0, '2023-09-15 07:18:29'),
(15, 'Others', 'India', 'Agmark Grading Certificate for Grapes', 'Agmark-Grading-for-Grapes.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'N/A', 0, '2023-09-15 07:18:48'),
(16, 'Others', 'India', 'Agmark Grading Certificate for Pomegranates', 'Agmark-Grading-Pomegranates.pdf', 'Trade Notices/Advisories/Export Procedures issued by APEDA/Directorate of Marketing & Inspection from time to time to facilitate exports', 'N/A', 0, '2023-09-15 07:19:14'),
(17, 'Others', 'India', 'FSSAI Food Safety License for processed foods', 'FSSAI-Food-Safety-License-for-processed-foods.pdf', 'Food Safety and Standards Authority of India', 'https://www.fssaiindia.in/documents-and-Procedures/', 0, '2023-09-15 07:19:40'),
(18, 'General', 'India', 'General', 'General Compliances.pdf', '', '', 0, '2023-09-15 06:37:49'),
(19, 'APEDA', 'India', 'Apeda', 'APEDA.pdf', 'APEDA', 'https://apeda.gov.in/', 0, '2023-09-15 06:41:37'),
(20, 'Customs', 'India', 'Customs', 'Customs.pdf', 'Central Board of Indirect Taxes and customs', 'https://commerce.gov.in/', 0, '2023-09-15 06:43:59'),
(21, 'DGFT', 'India', 'DGFT', 'DGFT.pdf', 'DGFT', 'https://www.dgft.gov.in/', 0, '2023-09-15 06:40:16'),
(22, 'ExportInspectionCouncil', 'India', 'EIC', 'EIC.pdf', 'Ministry of Commerce and Industry', 'https://commerce.gov.in/about-us/autonomous-bodies/export-inspection-council-of-india-eic/', 0, '2023-09-15 06:42:53'),
(23, 'Others', 'India', 'Others', 'Others.pdf', '', '', 0, '2023-09-15 07:20:01'),
(24, 'FSSAI', 'India', 'FSSAI', 'FSSAI.pdf', 'Food Safety and Standards Authority of India', 'https://fssai.gov.in/', 0, '2023-09-15 06:39:33'),
(25, 'DirectorateofPlantProtection', 'India', 'DPPQS', 'DPPQS.pdf', 'Plant Quarantine Information System', 'https://plantquarantineindia.nic.in/PQISPub/html/Export.htm', 0, '2023-09-15 06:43:20'),
(26, 'General', 'India', 'Export Middle East', 'Export-Middle-East.pdf', '', '', 0, '2023-09-15 06:37:22'),
(27, 'General', 'India', 'Export to EU', 'Export-European-union.pdf', '', '', 0, '2023-09-15 06:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `Farmer_Id` int(100) NOT NULL,
  `FPO_Registration_ID` int(100) NOT NULL,
  `FPOSelfHelpGroup` varchar(100) NOT NULL,
  `FarmerName` varchar(100) NOT NULL,
  `PhoneNo` varchar(50) NOT NULL,
  `TotalIrrigatedArea` varchar(100) NOT NULL,
  `State` varchar(50) NOT NULL,
  `District` varchar(100) NOT NULL,
  `Block` varchar(150) NOT NULL,
  `SowingMonth` varchar(50) NOT NULL,
  `ExpectedYeildinMT` varchar(200) NOT NULL,
  `CurrentMarketPlace` varchar(150) NOT NULL,
  `FatherName` varchar(100) NOT NULL,
  `Village` varchar(250) NOT NULL,
  `HarvestingMonth` varchar(50) NOT NULL,
  `CropName` varchar(100) NOT NULL,
  `Grade` varchar(255) NOT NULL,
  `Variety` varchar(255) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `UpdatedDate` varchar(50) DEFAULT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`Farmer_Id`, `FPO_Registration_ID`, `FPOSelfHelpGroup`, `FarmerName`, `PhoneNo`, `TotalIrrigatedArea`, `State`, `District`, `Block`, `SowingMonth`, `ExpectedYeildinMT`, `CurrentMarketPlace`, `FatherName`, `Village`, `HarvestingMonth`, `CropName`, `Grade`, `Variety`, `FileName`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(122, 14, 'Kashimnagar FPO ', 'Kethavath Laxmanna', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '6', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(123, 14, 'Kashimnagar FPO ', 'Kethavath Naresh', '', '2', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '7', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(124, 14, 'Kashimnagar FPO ', 'K. Pomya Naik', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(125, 14, 'Kashimnagar FPO ', 'K. Raju', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(126, 14, 'Kashimnagar FPO ', 'K. Raju', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2.5', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(127, 14, 'Kashimnagar FPO ', 'K. Pujitha', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(128, 14, 'Kashimnagar FPO ', 'K. EEremma', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(129, 14, 'Kashimnagar FPO ', 'K. Swami', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(130, 14, 'Kashimnagar FPO ', 'K. Sonamma', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(131, 14, 'Kashimnagar FPO ', 'L. Balya', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(132, 14, 'Kashimnagar FPO ', 'L. Gopya', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(133, 14, 'Kashimnagar FPO ', 'L. Lanbadi dan singh', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(134, 14, 'Kashimnagar FPO ', 'K. Valamma', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(135, 14, 'Kashimnagar FPO ', 'K. Puliya', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2', 'Wanaparthy ', '', 'Megya Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(136, 14, 'Kashimnagar FPO ', 'M Govindu', '', '2', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '7', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(137, 14, 'Kashimnagar FPO ', 'M Bojya', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '4.5', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(138, 14, 'Kashimnagar FPO ', 'M Lokya', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(139, 14, 'Kashimnagar FPO ', 'M Krishna', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(140, 14, 'Kashimnagar FPO ', 'Darma', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(141, 14, 'Kashimnagar FPO ', 'Mudavath Thulcha', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '4.5', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(142, 14, 'Kashimnagar FPO ', 'Bajya Nayak', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(143, 14, 'Kashimnagar FPO ', 'Chittamma', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(144, 14, 'Kashimnagar FPO ', 'Kurumaiah', '', '2', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '5', 'Wanaparthy ', '', 'Nagamma thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(145, 14, 'Kashimnagar FPO ', 'Mudavath Pedda Devula Nayak', '', '3', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '5', 'Wanaparthy ', '', 'Rayanpet Thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(146, 14, 'Kashimnagar FPO ', 'P. Pandu Naik', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2', 'Wanaparthy ', '', 'Rayanpet thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(147, 14, 'Kashimnagar FPO ', 'Rathlavath Srinivas', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Rayanpet thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(148, 14, 'Kashimnagar FPO ', 'Mudavath Venkatesh', '', '1.3', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.5', 'Wanaparthy ', '', 'Rayanpet thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(149, 14, 'Kashimnagar FPO ', 'Mudavath Gori', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '2.8', 'Wanaparthy ', '', 'Rayanpet thanda', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(150, 14, 'Kashimnagar FPO ', 'G.Venkataiah', '', '2', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '4.5', 'Wanaparthy ', '', 'Kashimnagar', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(151, 14, 'Kashimnagar FPO ', 'Peddagudam Chinna Narashimha', '', '1', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '3.2', 'Wanaparthy ', '', 'Kashimnagar', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(152, 14, 'Kashimnagar FPO ', 'Lambadi lokya', '', '4', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '54', 'Wanaparthy ', '', 'Kasimnagar ', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(153, 14, 'Kashimnagar FPO ', 'B Jagan', '', '2', 'Telangana ', 'Wanaparthy ', 'Wanaparthy ', 'Jun-22', '4', 'Wanaparthy ', '', 'Kashimnagar', 'Sep-22', 'Sorghum ', 'A', '', 'FPO Farmer CSV Format File (5).csv', 0, '', '2022-12-15 22:41:36'),
(155, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, '2023-04-23 18:18:07'),
(156, 1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, '2023-05-03 09:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_extra_details`
--

CREATE TABLE `fpo_extra_details` (
  `ID` int(11) NOT NULL,
  `FPO_Registration_ID` varchar(255) DEFAULT NULL,
  `CertificateNo` text,
  `document_standard` varchar(255) DEFAULT NULL,
  `CertificateDate` varchar(255) DEFAULT NULL,
  `CertificateEndDate` varchar(255) DEFAULT NULL,
  `CertificateUpload` varchar(255) DEFAULT NULL,
  `ReportNumber_Audit_report` varchar(255) DEFAULT NULL,
  `ReportNumber_Audit_doc_Upload` varchar(255) DEFAULT NULL,
  `Produce_Report_Number` varchar(255) DEFAULT NULL,
  `Produce_Report_Number_Doc_Upload` varchar(255) DEFAULT NULL,
  `ProductName` varchar(255) DEFAULT NULL,
  `ProductImage` varchar(255) DEFAULT NULL,
  `ProductSpecification` varchar(255) DEFAULT NULL,
  `MassBalanceGranting_Document` varchar(255) DEFAULT NULL,
  `MassBalanceGranting_Document_Name` varchar(255) DEFAULT NULL,
  `Singed_Application_Registration` varchar(255) DEFAULT NULL,
  `Sub_License_Certification_Agreement_Document` varchar(255) DEFAULT NULL,
  `Sub_License_Certification_Agreement_Document_Name` varchar(255) DEFAULT NULL,
  `Sub_License_Certification_Agreement_Document_Date` varchar(255) DEFAULT NULL,
  `Overall_Responsible_person_name` varchar(255) DEFAULT NULL,
  `Overall_Responsible_person_position` varchar(255) DEFAULT NULL,
  `Overall_Responsible_person_image` varchar(255) DEFAULT NULL,
  `Location_address` varchar(255) DEFAULT NULL,
  `Registred_office_photo` varchar(255) DEFAULT NULL,
  `Virtual_Tour_Facilities_Photo` varchar(255) DEFAULT NULL,
  `Copies_of_regulartory_License_Document_name` longtext,
  `Copies_of_regulartory_License_Document_docu` longtext,
  `miscellaneous` varchar(255) DEFAULT NULL,
  `DeletedStatus` int(11) DEFAULT '0',
  `CreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_extra_details`
--

INSERT INTO `fpo_extra_details` (`ID`, `FPO_Registration_ID`, `CertificateNo`, `document_standard`, `CertificateDate`, `CertificateEndDate`, `CertificateUpload`, `ReportNumber_Audit_report`, `ReportNumber_Audit_doc_Upload`, `Produce_Report_Number`, `Produce_Report_Number_Doc_Upload`, `ProductName`, `ProductImage`, `ProductSpecification`, `MassBalanceGranting_Document`, `MassBalanceGranting_Document_Name`, `Singed_Application_Registration`, `Sub_License_Certification_Agreement_Document`, `Sub_License_Certification_Agreement_Document_Name`, `Sub_License_Certification_Agreement_Document_Date`, `Overall_Responsible_person_name`, `Overall_Responsible_person_position`, `Overall_Responsible_person_image`, `Location_address`, `Registred_office_photo`, `Virtual_Tour_Facilities_Photo`, `Copies_of_regulartory_License_Document_name`, `Copies_of_regulartory_License_Document_docu`, `miscellaneous`, `DeletedStatus`, `CreateDate`) VALUES
(1, '13', 'Voluptas ex providen', 'Others', '1980-10-19', '2017-11-18', '1689160253-5835-DOC-', '640', '1689160253-7425-DOC-', '253', '1689160253-3147-DOC-', '253', '1689160253-8794-DOC-', 'Eiusmod voluptas aut', '1689160253-1567-DOC-', 'Casey Weeks', '1689160253-8807-DOC-', '1689160253-2621-DOC-', 'Dawn Wiley', '2005-08-28', 'Deborah Valenzuela', 'Laudantium inventor', '1689160253-8714-DOC-', 'Eu quia in ipsum es', '1689160253-5693-DOC-', '1689160253-6205-DOC-', 'Teagan Barry,test', '1689160253-2352-DOC-,1689160253-5999-DOC-', 'Asperiores sunt non ', 1, '2023-07-11 05:50:31'),
(3, '14', 'QCI/PADD/INDGAP/TQCERT/OPT-2/000009', 'IndGAP', '2022-10-28', '2023-10-29', '1689400209-3146-DOC-IndGAP Certificate.pdf', '', '1689400209-2608-DOC-', '', '1689400209-1968-DOC-', '', '1689400209-1819-DOC-', '', '1689400209-4762-DOC-', '', '1689400209-8752-DOC-', '1689400209-9904-DOC-', '', '', '', '', '1689400209-8574-DOC-', '', '1689400209-3542-DOC-', '1689400209-3288-DOC-', '', '1689400209-2531-DOC-', '', 1, '2023-07-15 05:50:09'),
(4, '14', 'QCI/PADD/INDGAP/TQCERT/OPT-2/000009', 'IndGAP', '2022-10-28', '2023-10-29', '1689400711-5907-DOC-IndGAP Certificate.pdf', 'TQC/0922/KFPC/INDG/023', '1689400711-5226-DOC-Audit Plan.pdf', '1102210355A', '1689400711-1984-DOC-Produce Test Report.pdf', 'Sorghum', '1689400711-2714-DOC-Sorghum.png', '', '1689400711-3624-DOC-', '', '1689400711-2108-DOC-Application Form for registration with CB.pdf', '1689400711-4000-DOC-Certification Agreement with CB.pdf', 'Certification Agreement with CB', '2020-09-23', 'Mr. Haribabu', 'Manager', '1689400711-3903-DOC-', 'Wanaparthy (Dist), Telangana State- 509103', '1689400711-9482-DOC-', '1689400711-4499-DOC-', 'Soil Sample Collection,Soil Test Report,Sorghum crop Sowing activity,Digitalization of farmer and field profile,Agronomic fields visits,Field inspections by inspectors,Crop Harvesting,Post harvesting,Crop calendar,One farmer agreement,Seed and fertilization usage record,Plant protection application record,Stage wise IPM,Food safety training to inspectors,ISO 19011 training to inspectors,Seed Certificate', '1689400711-9448-DOC-Soil Sample Collection.pdf,1689400711-1059-DOC-Soil Test Report.pdf,1689400711-1073-DOC-Sorghum Crop Sowing Activity.pdf,1689400711-1063-DOC-Digitalization of Farmer And Dield Profile.pdf,1689400711-1060-DOC-Agronomist Field Visits to Monitor The Crop & Crop Advisory.pdf,1689400711-1065-DOC-Field Inspections by Inspectors.pdf,1689400711-1062-DOC-Crop Harvesting.pdf,1689400711-1069-DOC-Post Harvest.pdf,1689400711-1061-DOC-Crop Calendar.pdf,1689400711-1064-DOC-Farmer Agreement.pdf,1689400711-1070-DOC-Seed and Fertilizer Usage Records.pdf,1689400711-1068-DOC-Plant Protection Application Record.pdf,1689400711-1074-DOC-Stage wise IPM.pdf,1689400711-1066-DOC-Food Safety Training to Inspectors.pdf,1689400711-1067-DOC-ISO19011 Training to the inspectors.pdf,1689400711-1071-DOC-Seed Certificate.pdf', '', 0, '2023-07-15 05:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_food_safety_standard_docs`
--

CREATE TABLE `fpo_food_safety_standard_docs` (
  `Id` int(11) NOT NULL,
  `FPO_Registration_ID` int(11) NOT NULL,
  `document_standard` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_desc` varchar(255) NOT NULL,
  `Profile_document` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_food_safety_standard_docs`
--

INSERT INTO `fpo_food_safety_standard_docs` (`Id`, `FPO_Registration_ID`, `document_standard`, `document_name`, `document_desc`, `Profile_document`, `CreatedDate`) VALUES
(2, 13, 'IndGAP', 'Lorem_ipsum', 'ipsum12356', 'Lorem_ipsum.pdf', '2022-11-05 06:09:30'),
(3, 12, 'IndGAP', 'IndGAP Certificate ', 'Kashimnagar FPO ', 'Kashimnagar- Certificate.pdf', '2022-11-08 12:03:44'),
(4, 12, 'IndGAP', 'Kashimnagr FPO ', 'IndGAP Certificate ', 'Kashimnagar- Certificate.pdf', '2022-11-09 05:41:02'),
(5, 14, 'IndGAP', 'IndGAP Certificate ', 'Kashimnagar FPO ', 'Kashimnagar- Certificate.pdf', '2022-12-01 10:54:34'),
(6, 14, 'IndGAP', 'Digital Presentation', 'Implementation Process ', 'Implemenatation.pdf', '2022-12-16 06:28:18'),
(7, 1, '', '', '', '', '2023-05-03 09:19:39'),
(8, 10, 'IndGAP', 'tt', 'ttt', 'dummy.pdf', '2023-05-03 09:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_registration`
--

CREATE TABLE `fpo_registration` (
  `FPO_Registration_ID` int(100) NOT NULL,
  `FPO_UniqueCode` varchar(255) NOT NULL,
  `FPOExporterName` varchar(250) NOT NULL,
  `Address` longtext NOT NULL,
  `BlockMandalTaluk` varchar(200) NOT NULL,
  `District` varchar(100) NOT NULL,
  `State` varchar(100) NOT NULL,
  `ContactPerson` varchar(100) NOT NULL,
  `Landline` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `YearofFormatation` varchar(50) NOT NULL,
  `RegistrationCertificate` longtext NOT NULL,
  `NoofFarmersRegistered` int(50) NOT NULL,
  `Active` varchar(50) NOT NULL,
  `Inactive` varchar(50) NOT NULL,
  `EquitySharecapitalPaidup` varchar(250) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `RsinLakhs` varchar(100) NOT NULL,
  `PromotingAgencyName` varchar(250) NOT NULL,
  `ContactPersonName` varchar(200) NOT NULL,
  `EmailId` varchar(100) NOT NULL,
  `BusinessActivity` varchar(100) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `Account_Status` varchar(255) NOT NULL COMMENT 'Active / Inactive',
  `document_standard` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `document_desc` varchar(255) NOT NULL,
  `Profile_document` varchar(255) NOT NULL,
  `Profile_Img` varchar(255) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration`
--

INSERT INTO `fpo_registration` (`FPO_Registration_ID`, `FPO_UniqueCode`, `FPOExporterName`, `Address`, `BlockMandalTaluk`, `District`, `State`, `ContactPerson`, `Landline`, `Email`, `YearofFormatation`, `RegistrationCertificate`, `NoofFarmersRegistered`, `Active`, `Inactive`, `EquitySharecapitalPaidup`, `Year`, `RsinLakhs`, `PromotingAgencyName`, `ContactPersonName`, `EmailId`, `BusinessActivity`, `Password`, `DeletedStatus`, `Account_Status`, `document_standard`, `document_name`, `document_desc`, `Profile_document`, `Profile_Img`, `CreatedDate`) VALUES
(10, '', 'tuy', 'tuy', 'tu', 'Namakkal', 'Tamil Nadu', 'uy', '444444444', 'test@gmail.com', '2020', '1661790554-1275-DOC-Neural_Network_Models_for_Word_Sense_Disambiguatio.pdf', 55, '', 'uy', 'tyu', '2027', 'uyt', 'uy', 'tuy', 'test1@gmail.com', 'Activity', '202cb962ac59075b964b07152d234b70', 0, 'Active', 'Organic NOP', 'test', 'test', 'Viaakonnect Host User Lists.pdf', '', '2022-08-29 21:59:14'),
(11, '', 's', '', '', 'Bokaro', 'Jharkhand', '', '', 'testw@gmail.com', '', '1661790947-8440-DOC-Neural_Network_Models_for_Word_Sense_Disambiguatio.pdf', 0, '', '', '', '2018', '', '', '', 'testw1@gmail.com', 'Activity', '202cb962ac59075b964b07152d234b70', 0, 'Inactive', '', '', '', '', '', '2022-08-29 22:05:47'),
(12, 'AB9514', 'PALAMURU RAITHULA PRODUCER COMPANY LIMITED', 'H:NO 11-57,RAJENDRAOTARI NAGAR,PEBBAIR MANDAL WANAPARTHY DISTRICT 509104', 'Pebbair ', 'Wanaparthy', 'Telangana', 'R Venkatesh ', '', 'venkateshlaxmi1981@gmail.com', '2016', '1662034204-6193-DOC-INDIA_SPICE_MAP.jpg', 680, '680', '0', '680000', '2019', '680000', 'Youth for action ', 'Hari babu nnnn', 'test@gmail.com', 'Activity', '202cb962ac59075b964b07152d234b70', 0, 'Active', '', '', '', '', '', '2022-09-01 05:10:04'),
(13, '', 'asdf', 'asdfad', 'asdf', 'Ahmednagar', 'Maharashtra', 'test', '987654321', 'dps@gmail.com', '2020', '1665651867-4280-DOC-fpo_db (9).sql', 12, '55', '41', '987654321', '2017', '987654321', 'asdf', 'test', 'admin@gmail.com', 'Activity', '202cb962ac59075b964b07152d234b70', 0, 'Active', 'IndGAP,Others', 'test,test1', 'test,test1', 'icon5.png', '', '2022-10-13 02:04:27'),
(14, 'HR9752', 'Kashimnagar Farmer Producer Compamny Ltd ', 'H. No: 1-50/3 Anjanagiri, Village, ', 'Wanaparthy ', 'Wanaparthy', 'Telangana', 'R Rajesh ', '9876543210', 'KFPCL@gmail.com', '2019', '1669891582-4291-DOC-ADMIN.png', 426, '426', '426', '500000', '2019', '500000', 'Youth For Action ', 'Haribabu ', '', 'Activity', '202cb962ac59075b964b07152d234b70', 0, 'Active', '', '', '', '', '', '2022-12-01 03:46:22'),
(16, 'AB8207', 'Test', 'test', 'South Delhi', 'Ahmedabad', 'Gujarat', 'Sagar', 'S6UngnTQJ2', 'Sagar.arete@gmail.com', '2024', '1684731783-2793-DOC-Corrigendum-Gujarat-Agro-Industries-Corporation-Ltd_1952023103216366.pdf', 20, '10', '5', '55', '2027', '25', 'Test Agency', 'Sagar', 'Sagar.arete@gmail.com', 'test', '202cb962ac59075b964b07152d234b70', 0, 'Inactive', '', '', '', '', '', '2023-05-22 10:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_registration_crops_cultivated`
--

CREATE TABLE `fpo_registration_crops_cultivated` (
  `fpo_registration_crops_cultivated_id` int(50) NOT NULL,
  `FPO_Registration_ID` int(50) NOT NULL,
  `CropsCultivated` varchar(200) NOT NULL,
  `Year` varchar(50) NOT NULL,
  `Season` varchar(100) NOT NULL,
  `ProjectFarmOutputMT` varchar(100) NOT NULL,
  `CommodityTypes` varchar(255) NOT NULL,
  `CropName` varchar(200) NOT NULL,
  `AreainHa` varchar(100) NOT NULL,
  `Variety` varchar(250) NOT NULL,
  `IrrigationSource` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration_crops_cultivated`
--

INSERT INTO `fpo_registration_crops_cultivated` (`fpo_registration_crops_cultivated_id`, `FPO_Registration_ID`, `CropsCultivated`, `Year`, `Season`, `ProjectFarmOutputMT`, `CommodityTypes`, `CropName`, `AreainHa`, `Variety`, `IrrigationSource`, `DeletedStatus`, `CreatedDate`) VALUES
(4, 10, 'yut', '2027', 'tu', 'yt', 'Testing', 'yut', 'uy', 't', 'yut', 0, '2022-08-29 21:59:14'),
(5, 11, 'www', '', '', '', '', '', '', '', '', 0, '2022-08-29 22:05:47'),
(6, 11, 'wwww', '', '', '', '', '', '', '', '', 0, '2022-08-29 22:05:47'),
(7, 12, 'Paddy ', '2021', 'Kharif ', '2040MT ', '', 'Paddy ', '255', ' RNR, BPT ', 'Canal & Borewell ', 0, '2022-09-01 05:10:04'),
(8, 12, 'Redgram ', '2020', 'Kharif ', '', '', 'Redgram ', '30', 'PRG-176, Pinky, WRGe-97', 'Canal & Borewell ', 0, '2022-09-01 05:10:04'),
(9, 12, 'Blackgram ', '2020', 'Kharif ', '', '', 'Blackgram ', '40', 'T-9 ', 'Canal & Borewell ', 0, '2022-09-01 05:10:04'),
(10, 13, 'Ground nut,Blackgram', '2020,2030', 'Kharif , Rabi', '456,456', 'Testing,Testing', 'Ground nut ,Wheat', '140,200', 'Tag-24,Tag-140', 'Canal & Borewell,Testing', 0, '2022-09-01 05:10:04'),
(12, 14, 'Millets ', '2022', 'Kharif ', '200', '', 'Jowar ', '102 ', 'CSN-15', 'rainfed ', 0, '2022-12-01 03:46:22'),
(13, 16, 'ww', '2025', 'www', 'ww', 'Millets', 'ww', '22', 'ww', 'www', 0, '2023-05-02 13:04:28'),
(14, 17, 'ww', '2025', 'www', 'ww', 'Millets', 'ww', '22', 'ww', 'www', 0, '2023-05-02 13:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_registration_details`
--

CREATE TABLE `fpo_registration_details` (
  `fpo_registration_detail_id` int(100) NOT NULL,
  `FPO_Registration_ID` int(100) NOT NULL,
  `GrossRevenue_Year` varchar(50) NOT NULL,
  `GrossRevenue_CropName` varchar(150) NOT NULL,
  `GrossRevenue_CropVariety` varchar(200) NOT NULL,
  `GrossRevenue_QuantityMT` varchar(100) NOT NULL,
  `GrossRevenue_RevenueinLakhs` varchar(100) NOT NULL,
  `GrossRevenue_MarketPlace` varchar(200) NOT NULL,
  `GrossRevenue_AveragePricePerMT` varchar(100) NOT NULL,
  `Warehouse_YearofSetup` varchar(100) NOT NULL,
  `Warehouse_AreainSqft` varchar(100) NOT NULL,
  `Warehouse_Capacityinmt` varchar(100) NOT NULL,
  `Warehouse_OwnedorLeased` varchar(100) NOT NULL,
  `Warehouse_AccredeationStatus` varchar(100) NOT NULL,
  `Procesing_Equipment_Activity` longtext NOT NULL,
  `Procesing_Equipment_Operational_Status` varchar(200) NOT NULL,
  `Procesing_Equipment_ValueRsinLakhs` varchar(200) NOT NULL,
  `Procesing_Equipment_Discription` longtext NOT NULL,
  `Farm_Equipment_Activity` longtext NOT NULL,
  `Farm_Equipment_OperationalStatus` varchar(200) NOT NULL,
  `Farm_Equipment_ValueRsinLakhs` varchar(200) NOT NULL,
  `Farm_Equipment_Discription` longtext NOT NULL,
  `Credit_Facilities_Availed_Bank` varchar(200) NOT NULL,
  `Credit_Facilities_Availed_FacilityType` varchar(200) NOT NULL,
  `Credit_Facilities_Availed_AmountReleasedRs` varchar(100) NOT NULL,
  `Credit_Facilities_Availed_AmountOutstandingRs` varchar(100) NOT NULL,
  `Credit_Facilities_Availed_OperationStatusRegularIrregular` varchar(100) NOT NULL,
  `Market_Linkage_Season` varchar(200) NOT NULL,
  `Market_Linkage_CropName` varchar(200) NOT NULL,
  `Market_Linkage_Variety` varchar(200) NOT NULL,
  `Market_Linkage_Grade` varchar(200) NOT NULL,
  `Market_Linkage_HarvestMonth` varchar(100) NOT NULL,
  `Market_Linkage_QuntatySoldinmt` varchar(100) NOT NULL,
  `Market_Linkage_ProductImage` longtext NOT NULL,
  `Market_Linkage_ProductDeliveryLocation` longtext NOT NULL,
  `Market_Linkage_MarketPlace` varchar(200) NOT NULL,
  `Market_Linkage_FoodSafetyCertificationStatus` varchar(100) NOT NULL,
  `Market_Linkage_UploadCertificate` longtext NOT NULL,
  `Market_Linkage_TermandConditions` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration_details`
--

INSERT INTO `fpo_registration_details` (`fpo_registration_detail_id`, `FPO_Registration_ID`, `GrossRevenue_Year`, `GrossRevenue_CropName`, `GrossRevenue_CropVariety`, `GrossRevenue_QuantityMT`, `GrossRevenue_RevenueinLakhs`, `GrossRevenue_MarketPlace`, `GrossRevenue_AveragePricePerMT`, `Warehouse_YearofSetup`, `Warehouse_AreainSqft`, `Warehouse_Capacityinmt`, `Warehouse_OwnedorLeased`, `Warehouse_AccredeationStatus`, `Procesing_Equipment_Activity`, `Procesing_Equipment_Operational_Status`, `Procesing_Equipment_ValueRsinLakhs`, `Procesing_Equipment_Discription`, `Farm_Equipment_Activity`, `Farm_Equipment_OperationalStatus`, `Farm_Equipment_ValueRsinLakhs`, `Farm_Equipment_Discription`, `Credit_Facilities_Availed_Bank`, `Credit_Facilities_Availed_FacilityType`, `Credit_Facilities_Availed_AmountReleasedRs`, `Credit_Facilities_Availed_AmountOutstandingRs`, `Credit_Facilities_Availed_OperationStatusRegularIrregular`, `Market_Linkage_Season`, `Market_Linkage_CropName`, `Market_Linkage_Variety`, `Market_Linkage_Grade`, `Market_Linkage_HarvestMonth`, `Market_Linkage_QuntatySoldinmt`, `Market_Linkage_ProductImage`, `Market_Linkage_ProductDeliveryLocation`, `Market_Linkage_MarketPlace`, `Market_Linkage_FoodSafetyCertificationStatus`, `Market_Linkage_UploadCertificate`, `Market_Linkage_TermandConditions`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 12, '2019,', 'Redgram ,', 'RRB-123 ,', '1500,', '1500,', 'Hyderabad ,', '150,', '2017', '1500', '600', 'Own ', 'NA ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1661934326-9533-DOC-Disclaimer.docx', '', '', '', '1661934326-4076-DOC-Disclaimer.docx', '', 0, '2022-08-31 11:35:57'),
(5, 10, '2022,2022,2022', 'Testing,Testing2,Testing1', 'Testing,Testing2,Testing1', '20,22,21', '20,22,21', '20,22,21', '20,22,21', '2015,2016', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing', 'Testing', 'Testing', 'Testing', 'January', 'Testing', '1667906015-7539-DOC-22.png,1667906654-3979-DOC-1.jpg,1683102920-2508-DOC-img-sample.png', 'Testing', 'Testing', 'Yes', '1667907197-5855-DOC-sample.pdf,1667907221-4632-DOC-sample.pdf,1683102920-8919-DOC-dummy.pdf', 'test', 0, '2022-09-01 05:10:04'),
(9, 16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-05-02 13:04:28'),
(10, 17, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-05-02 13:09:38'),
(12, 16, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '2023-05-22 10:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_registration_mobileno`
--

CREATE TABLE `fpo_registration_mobileno` (
  `fpo_registration_mobileno_id` int(50) NOT NULL,
  `FPO_Registration_ID` int(50) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration_mobileno`
--

INSERT INTO `fpo_registration_mobileno` (`fpo_registration_mobileno_id`, `FPO_Registration_ID`, `MobileNo`, `DeletedStatus`, `CreatedDate`) VALUES
(2, 10, '', 0, '2022-08-29 21:59:14'),
(3, 10, '', 0, '2022-08-29 21:59:14'),
(4, 10, '', 0, '2022-08-29 21:59:14'),
(5, 10, '', 0, '2022-08-29 21:59:14'),
(6, 10, '', 0, '2022-08-29 21:59:14'),
(7, 10, '', 0, '2022-08-29 21:59:14'),
(8, 12, '', 0, '2022-09-01 05:10:04'),
(9, 12, '', 0, '2022-09-01 05:10:04'),
(10, 13, '', 0, '2022-10-13 02:04:27'),
(11, 14, '9177414249', 0, '2022-12-01 03:46:22'),
(12, 16, '9654536160', 0, '2023-05-02 13:04:28'),
(13, 17, '9654536160', 0, '2023-05-02 13:09:38'),
(15, 16, '8974563210', 0, '2023-05-22 10:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_registration_mobilenumber`
--

CREATE TABLE `fpo_registration_mobilenumber` (
  `fpo_registration_mobilenumber_id` int(50) NOT NULL,
  `FPO_Registration_ID` int(50) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration_mobilenumber`
--

INSERT INTO `fpo_registration_mobilenumber` (`fpo_registration_mobilenumber_id`, `FPO_Registration_ID`, `MobileNo`, `DeletedStatus`, `CreatedDate`) VALUES
(2, 10, '5555555', 0, '2022-08-29 21:59:14'),
(3, 12, '9949961337', 0, '2022-09-01 05:10:04'),
(4, 12, '9949961337', 0, '2022-09-01 05:10:04'),
(5, 13, '987654321', 0, '2022-10-13 02:04:27'),
(6, 14, '8790601575', 0, '2022-12-01 03:46:22'),
(7, 16, '5555555555', 0, '2023-05-02 13:04:28'),
(8, 17, '5555555555', 0, '2023-05-02 13:09:38'),
(10, 16, '9874563210', 0, '2023-05-22 10:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_user_to_assign_cb`
--

CREATE TABLE `fpo_user_to_assign_cb` (
  `User_Assing_ID` int(11) NOT NULL,
  `FPO_User_ID` varchar(255) DEFAULT NULL,
  `CB_User` varchar(255) DEFAULT NULL,
  `DeletedStatus` int(11) DEFAULT '0',
  `CreatedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_user_to_assign_cb`
--

INSERT INTO `fpo_user_to_assign_cb` (`User_Assing_ID`, `FPO_User_ID`, `CB_User`, `DeletedStatus`, `CreatedDate`) VALUES
(1, '12', '1', 1, '2023-05-16 11:03:07'),
(2, '14,16', '2', 1, '2023-05-23 08:32:48'),
(3, '14', '2,3,4,5,6,7', 0, '2023-05-23 09:12:41'),
(4, '12', '3', 1, '2023-06-05 09:55:38'),
(5, '12', '7', 1, '2023-12-17 06:20:32');

-- --------------------------------------------------------

--
-- Table structure for table `market_linkage_productimages`
--

CREATE TABLE `market_linkage_productimages` (
  `Market_Linkage_ProductImage_id` int(50) NOT NULL,
  `FPO_Registration_ID` int(5) NOT NULL,
  `content` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_linkage_productimages`
--

INSERT INTO `market_linkage_productimages` (`Market_Linkage_ProductImage_id`, `FPO_Registration_ID`, `content`, `DeletedStatus`, `CreatedDate`) VALUES
(2, 10, 'ww', 0, '2022-11-08 04:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `other_production`
--

CREATE TABLE `other_production` (
  `Id` int(11) NOT NULL,
  `FPO_Registration_ID` varchar(255) NOT NULL,
  `CommodityName` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Variety` varchar(255) NOT NULL,
  `Grade` varchar(255) NOT NULL,
  `ExpectedYeild` varchar(255) NOT NULL,
  `ActualYield` varchar(255) NOT NULL,
  `DifferenceQty` varchar(255) NOT NULL,
  `PercentageOfVariation` varchar(255) NOT NULL,
  `FarmerName` varchar(255) NOT NULL,
  `FatherName` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `District` varchar(255) NOT NULL,
  `Block` varchar(255) NOT NULL,
  `Village` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `FPO_SelfHelpGroup` varchar(255) NOT NULL,
  `CollectionCenter` varchar(255) NOT NULL,
  `Season` varchar(255) NOT NULL,
  `TotalQuantity` varchar(255) NOT NULL,
  `QtySoldInMt` varchar(255) NOT NULL,
  `QuantityBalanceInMT` varchar(255) NOT NULL,
  `QtyBalanceason` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Specifications` varchar(255) NOT NULL,
  `FoodSaftyCertification` varchar(255) NOT NULL,
  `Imgae` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_production`
--

INSERT INTO `other_production` (`Id`, `FPO_Registration_ID`, `CommodityName`, `Category`, `Variety`, `Grade`, `ExpectedYeild`, `ActualYield`, `DifferenceQty`, `PercentageOfVariation`, `FarmerName`, `FatherName`, `Mobile`, `District`, `Block`, `Village`, `State`, `FPO_SelfHelpGroup`, `CollectionCenter`, `Season`, `TotalQuantity`, `QtySoldInMt`, `QuantityBalanceInMT`, `QtyBalanceason`, `Specifications`, `FoodSaftyCertification`, `Imgae`, `CreatedDate`) VALUES
(1, '13', 'Blackgram', 'Pulses', 'BBG-557', 'A1', '500000', '150000', '0', '0', 'test', 'Sonu123', '123456', 'Anantapur', 'B Block', 'Burari Gaon', 'Andhra Pradesh', 'Testing', 'Namakkal Collection Center', 'Kharif', '510000', '210000', '0', '2022-11-16 08:44:22', 'Temperature In refer 13.5 degree', 'Rain Forest Alliance', '45.PNG', '2022-11-16 08:44:22'),
(3, '12', 'RED Gram ', 'Pulses ', 'RRR-123 ', 'A ', '1500', '1000', '500', '', 'RAJU ', 'RAJU ', '9100588804', 'Jagtial', 'Jagtial ', 'Jagtial ', 'Telangana', 'NA ', 'Test _1 ', 'Kharif', '1000', '100', '900', '2022-11-16 11:23:01', '', '', '', '2022-11-16 11:23:01'),
(4, '12', 'RED Gram ', 'Pulses ', 'RRR-123 ', 'A ', '1500', '1500', '0', '0', 'xxxx', 'xxx', '', 'Jagtial', '', '', 'Telangana', '', 'Test _1 ', 'Rabi', '1500', '', '1500', '2022-11-16 11:33:43', '', '', '', '2022-11-16 11:33:43'),
(5, '14', 'Redgram ', 'Pulses', 'RBG-226 ', 'A ', '1800', '1500', '300', '', '', '', '', '00', '', '', '', '', 'Kashimnagar ', '0', '1500', '500', '1000', '2022-12-16 06:07:44', '', 'IndGAP', '', '2022-12-16 06:07:44'),
(6, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2023-05-03 09:09:01', '', '', '', '2023-05-03 09:09:01'),
(7, '10', '6', '87', '687', '6', '68', '76', '876', '87', '876', '7868', '7633333333', 'Agar Malwa', '6', '876', 'Madya Pradesh', '876', 'Namakkal Collection Center', 'Kharif', '876', '87', '687', '2023-05-03 09:15:16', '68', 'IndGAP', 'img-sample.png', '2023-05-03 09:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `other_purchase`
--

CREATE TABLE `other_purchase` (
  `Production_ID` int(100) NOT NULL DEFAULT '0',
  `FPO_Registration_ID` int(100) NOT NULL,
  `CollectionCenter` varchar(250) NOT NULL,
  `SeasonName` varchar(250) NOT NULL,
  `CommodityName` varchar(255) NOT NULL,
  `CommodityCategory` varchar(255) NOT NULL,
  `VarietyName` varchar(250) NOT NULL,
  `Grade` varchar(100) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `TotalQtyInMT` int(50) NOT NULL,
  `QtySoldInMT` int(50) NOT NULL,
  `QtyBalanceInMT` int(50) NOT NULL,
  `CropSpecification` varchar(250) NOT NULL,
  `FoodSaftyCertification` varchar(250) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `other_purchase`
--

INSERT INTO `other_purchase` (`Production_ID`, `FPO_Registration_ID`, `CollectionCenter`, `SeasonName`, `CommodityName`, `CommodityCategory`, `VarietyName`, `Grade`, `Size`, `TotalQtyInMT`, `QtySoldInMT`, `QtyBalanceInMT`, `CropSpecification`, `FoodSaftyCertification`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(7, 10, 'Namakkal Collection Center', 'Winter', 'Fruits', 'Fruits', 'Banana', '15', '62', 15, 15, 0, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-09-09 15:34:53'),
(9, 10, 'Namakkal Collection Center', 'Winter', 'Vegetables', 'Vegetables', 'Potato', '13', '', 51, 50, 6, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-11-02 13:27:17'),
(11, 10, 'Namakkal Collection Center', 'Winter', 'Nuts', 'Nuts', 'Cashews', '15', '', 65, 60, 5, 'Temperature In refer 13.5 degree', 'NPOP Organic', 0, '', '2022-11-02 07:59:32'),
(12, 12, 'Test _1 ', 'Kharif ', 'Redgram ', 'Pulses ', 'RBG-226 ', 'A ', '', 120, 0, 120, 'Moisture-12%, inhert material - 4% ', 'IndGAP', 0, '', '2022-10-18 02:25:23'),
(13, 12, 'TEST_2 ', 'Rabi', 'Black Gram ', 'Pulses ', 'BBG-226', 'A ', '', 249, 0, 249, 'Moisture-12%, inhert material - 4% ', 'Global GAP', 0, '', '2022-10-18 02:34:07'),
(14, 12, 'Test _1 ', '', 'Black Gram ', 'Pulses ', 'BBG-226', 'A ', '', 0, 0, 0, '', '', 1, '', '2022-10-18 02:45:47'),
(15, 13, 'Namakkal Collection Center', 'Rabi', 'Black Gram', 'Pulses', 'BBG-125', 'A', '', 450, 350, 100, '', '', 0, '', '2022-11-07 09:38:58'),
(16, 13, 'Namakkal Collection Center', 'Kharif', 'Wheat', 'Cereals', 'BBG', 'A', '', 20, 5, 0, 'Temperature In refer 13.5 degree', '', 1, '', '2022-11-07 12:52:49'),
(17, 12, 'Test _1 ', '', 'Test', 'Pulses', '', '', '', 0, 0, 0, 'Moisture-12%, inhert material - 4%', '', 1, '', '2022-10-18 02:47:30'),
(18, 13, 'Namakkal Collection Center', 'Kharif', 'Mango', 'Fruits', 'BBG', 'D', '', 500, 250, 2500, '', '', 0, '', '2022-11-14 15:59:44'),
(19, 13, 'Namakkal Collection Center', 'Rabi', 'Bay Leaf', 'Spices', 'BBG-226', 'A', '', 100, 40, 50, 'Temperature In refer 13.5 degree', '', 0, '', '2022-11-14 15:58:51'),
(20, 13, 'Namakkal Collection Center', 'Rabi', 'Black Gram', 'Pulses', 'BBG', 'A', '', 500, 350, 100, '', '', 1, '', '2022-11-07 09:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `own_production`
--

CREATE TABLE `own_production` (
  `Id` int(11) NOT NULL,
  `FPO_Registration_ID` varchar(255) NOT NULL,
  `CommodityName` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Variety` varchar(255) NOT NULL,
  `Grade` varchar(255) NOT NULL,
  `ExpectedYeild` varchar(255) NOT NULL,
  `ActualYield` varchar(255) NOT NULL,
  `DifferenceQty` varchar(255) NOT NULL,
  `PercentageOfVariation` varchar(255) NOT NULL,
  `FileName` text NOT NULL,
  `FarmerName` varchar(255) NOT NULL,
  `FatherName` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `District` varchar(255) NOT NULL,
  `Block` varchar(255) NOT NULL,
  `Village` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `FPO_SelfHelpGroup` varchar(255) NOT NULL,
  `CollectionCenter` varchar(255) NOT NULL DEFAULT ' ',
  `Season` varchar(255) NOT NULL,
  `TotalQuantity` varchar(255) NOT NULL,
  `QtySoldInMt` varchar(255) NOT NULL,
  `QuantityBalanceInMT` varchar(255) NOT NULL,
  `QtyBalanceason` varchar(255) NOT NULL,
  `Specifications` varchar(255) NOT NULL,
  `FoodSaftyCertification` varchar(255) NOT NULL DEFAULT '',
  `Imgae` varchar(255) NOT NULL DEFAULT '',
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `own_production`
--

INSERT INTO `own_production` (`Id`, `FPO_Registration_ID`, `CommodityName`, `Category`, `Variety`, `Grade`, `ExpectedYeild`, `ActualYield`, `DifferenceQty`, `PercentageOfVariation`, `FileName`, `FarmerName`, `FatherName`, `Mobile`, `District`, `Block`, `Village`, `State`, `FPO_SelfHelpGroup`, `CollectionCenter`, `Season`, `TotalQuantity`, `QtySoldInMt`, `QuantityBalanceInMT`, `QtyBalanceason`, `Specifications`, `FoodSaftyCertification`, `Imgae`, `CreatedDate`) VALUES
(23, '12', 'Green Gram ', 'Pulses ', 'XXX ', 'A', '300', '210', '90', '30', 'Manual Entry', 'xxxxxxxx', 'xxxxxxxx', 'xxxxxxxx', 'xxxxxxxx', 'xxxxxxxx', 'xxxxxxxx', 'xxxxxxxx', 'xxxxxxxx', '', '', '500', '50', '0000-00-00 00:00:00', '70', '', '', '', '2022-11-17 05:53:26'),
(24, '13', 'Black Gram', 'Pulses', '6', 'B', '50000', '43000', '7000', '14', 'Manual Entry', 'Rohit', 'Mukesh', '987654321', 'North West', 'A Block', 'Mundka', 'Delhi', 'MRM Testing', 'MRM PVt ltd', 'Rabi', '90000', '70000', '0000-00-00 00:00:00', '15-11-2022', 'blackgram  specification', '', 'Fruits.png', '2022-11-17 06:48:00'),
(113, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '6', '3', '3', '50%', 'Farmer CSV -for Own Production Format File (4).csv', 'Kethavath Laxmanna', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '3', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(114, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '7', '4.5', '2.5', '36%', 'Farmer CSV -for Own Production Format File (4).csv', 'Kethavath Naresh', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '4.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(115, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3', '1.5', '1.5', '50%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. Pomya Naik', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(116, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2', '1.5', '0.5', '25%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. Raju', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(117, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2.5', '1.5', '1', '40%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. Raju', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(118, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3', '2', '1', '33%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. Pujitha', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(119, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2', '1.5', '0.5', '25%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. EEremma', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(120, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2', '1.5', '0.5', '25%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. Swami', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(121, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2', '1.5', '0.5', '25%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. Sonamma', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(122, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'L. Balya', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(123, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'L. Gopya', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(124, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2', '1.5', '0.5', '25%', 'Farmer CSV -for Own Production Format File (4).csv', 'L. Lanbadi dan singh', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(125, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2', '1.5', '0.5', '25%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. Valamma', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(126, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2', '1.5', '0.5', '25%', 'Farmer CSV -for Own Production Format File (4).csv', 'K. Puliya', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Megya Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(127, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '7', '5', '2', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'M Govindu', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(128, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '4.5', '3.5', '1', '22%', 'Farmer CSV -for Own Production Format File (4).csv', 'M Bojya', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '3.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(129, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'M Lokya', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(130, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'M Krishna', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(131, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'Darma', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(132, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '4.5', '3.5', '1', '22%', 'Farmer CSV -for Own Production Format File (4).csv', 'Mudavath Thulcha', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '3.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(133, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'Bajya Nayak', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(134, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'Chittamma', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(135, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '5', '4.5', '0.5', '10%', 'Farmer CSV -for Own Production Format File (4).csv', 'Kurumaiah', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Nagamma thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '4.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(136, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '5', '4.5', '0.5', '10%', 'Farmer CSV -for Own Production Format File (4).csv', 'Mudavath Pedda Devula Nayak', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Rayanpet Thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '4.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(137, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2', '1', '1', '50%', 'Farmer CSV -for Own Production Format File (4).csv', 'P. Pandu Naik', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Rayanpet thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(138, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'Rathlavath Srinivas', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Rayanpet thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(139, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.5', '2.5', '1', '29%', 'Farmer CSV -for Own Production Format File (4).csv', 'Mudavath Venkatesh', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Rayanpet thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(140, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '2.8', '1.5', '1.3', '46%', 'Farmer CSV -for Own Production Format File (4).csv', 'Mudavath Gori', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Rayanpet thanda', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(141, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '4.5', '3', '1.5', '33%', 'Farmer CSV -for Own Production Format File (4).csv', 'G.Venkataiah', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Kashimnagar', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '3', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(142, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '3.2', '1.5', '1.7', '53%', 'Farmer CSV -for Own Production Format File (4).csv', 'Peddagudam Chinna Narashimha', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Kashimnagar', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '1.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(143, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '54', '31', '23', '43%', 'Farmer CSV -for Own Production Format File (4).csv', 'Lambadi lokya', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Kasimnagar ', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '31', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(144, '14', 'Sorghum ', 'Millets', 'CSV-15', 'A', '4', '2.5', '1.5', '38%', 'Farmer CSV -for Own Production Format File (4).csv', 'B Jagan', '', '', 'Wanaparthy ', 'Wanaparthy ', 'Kashimnagar', 'Telangana ', 'Kashimnagar FPO ', '', 'Kharif-2022', '2.5', '0', '0000-00-00 00:00:00', '16-12-2022', '', '', '', '2022-12-16 05:39:35'),
(146, '10', '876', '78', '687', '687', '876', '786', '7', '676', 'Manual Entry', '6876', '6', '7687622222', 'Bokaro', '68', '76', 'Jharkhand', '786', 'Namakkal Collection Center', 'Kharif', '6', '876', '876', '', '67', 'IndGAP', 'img-sample.png', '2023-05-03 09:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `production`
--

CREATE TABLE `production` (
  `Production_ID` int(100) NOT NULL,
  `FPO_Registration_ID` int(100) NOT NULL,
  `CollectionCenter` varchar(250) NOT NULL,
  `SeasonName` varchar(250) NOT NULL,
  `CommodityName` varchar(255) NOT NULL,
  `CommodityCategory` varchar(255) NOT NULL,
  `VarietyName` varchar(250) NOT NULL,
  `Grade` varchar(100) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `TotalQtyInMT` int(50) NOT NULL,
  `QtySoldInMT` int(50) NOT NULL,
  `QtyBalanceInMT` int(50) NOT NULL,
  `CropSpecification` varchar(250) NOT NULL,
  `FoodSaftyCertification` varchar(250) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`Production_ID`, `FPO_Registration_ID`, `CollectionCenter`, `SeasonName`, `CommodityName`, `CommodityCategory`, `VarietyName`, `Grade`, `Size`, `TotalQtyInMT`, `QtySoldInMT`, `QtyBalanceInMT`, `CropSpecification`, `FoodSaftyCertification`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(7, 10, 'Namakkal Collection Center', 'Winter', 'Fruits', 'Fruits', 'Banana', '15', '62', 15, 15, 0, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-09-09 15:34:53'),
(9, 10, 'Namakkal Collection Center', 'Winter', 'Vegetables', 'Vegetables', 'Potato', '13', '', 51, 50, 6, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-11-02 13:27:17'),
(11, 10, 'Namakkal Collection Center', 'Winter', 'Nuts', 'Nuts', 'Cashews', '15', '', 65, 60, 5, 'Temperature In refer 13.5 degree', 'NPOP Organic', 0, '', '2022-11-02 07:59:32'),
(12, 12, 'Test _1 ', 'Kharif ', 'Redgram ', 'Pulses ', 'RBG-226 ', 'A ', '', 120, 0, 120, 'Moisture-12%, inhert material - 4% ', 'IndGAP', 1, '', '2022-10-18 02:25:23'),
(13, 12, 'TEST_2 ', 'Rabi ', 'Black Gram ', 'Pulses ', 'BBG-226', 'A ', '', 249, 100, 249, 'Moisture-12%, inhert material - 4% ', 'Global GAP', 0, '', '2022-11-09 05:55:15'),
(14, 12, 'Test _1 ', '', 'Black Gram ', 'Pulses ', 'BBG-226', 'A ', '', 0, 0, 0, '', '', 1, '', '2022-10-18 02:45:47'),
(15, 13, 'Namakkal Collection Center', '', 'Black Gram', 'Pulses', 'BBG', 'A', '', 450, 350, 100, '', '', 0, '', '2022-11-07 09:38:58'),
(16, 13, 'Namakkal Collection Center', '', 'Wheat', 'Cereals', 'BBG', 'A', '', 20, 5, 0, 'Temperature In refer 13.5 degree', '', 0, '', '2022-11-07 12:52:49'),
(17, 12, 'Test _1 ', '', 'Test', 'Pulses', '', '', '', 0, 0, 0, 'Moisture-12%, inhert material - 4%', '', 1, '', '2022-10-18 02:47:30'),
(18, 13, 'Namakkal Collection Center', 'Kharif', 'Mango', 'Fruits', 'BBG', 'A', '', 500, 250, 4000, '', '', 0, '', '2022-11-07 10:14:14'),
(19, 13, 'Namakkal Collection Center', 'Rabi', 'Bay Leaf', 'Spices', 'BBG-226', 'C', '', 100, 40, 50, 'Temperature In refer 13.5 degree', '', 0, '', '2022-11-07 16:23:54'),
(20, 12, 'Test _1 ', 'Kharif', 'Paddy', 'Cereals ', 'RNR-150408', 'A ', '', 1500, 200, 1300, 'fdfg', 'NA', 0, '', '2022-11-11 03:43:24'),
(21, 12, 'Test _1 ', 'Kharif', 'Maize ', 'Cereals ', 'RASI- 359', 'A ', '', 1500, 100, 1400, 'fdfg', 'NA', 0, '', '2022-11-11 04:55:24'),
(22, 12, 'Test _1 ', 'Kharif', 'Kandulu  ', 'Pulses ', 'rrr', '', '', 1500, 100, 1400, '', '', 1, '', '2022-11-11 04:56:55');

-- --------------------------------------------------------

--
-- Table structure for table `production_certifications`
--

CREATE TABLE `production_certifications` (
  `production_certification_id` int(100) NOT NULL,
  `Production_ID` int(100) NOT NULL,
  `certification_name` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_certifications`
--

INSERT INTO `production_certifications` (`production_certification_id`, `Production_ID`, `certification_name`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 4, '1659626402-3370-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 20:50:02'),
(2, 4, '1659626402-2521-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 20:50:02'),
(3, 4, '1659626402-9498-DOC-1659345246-6791-DOC-Central Agriculture Universities (1).xlsx', 0, '2022-08-04 20:50:02'),
(4, 5, '1659626664-9621-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 20:54:24'),
(5, 5, '1659626664-8059-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 20:54:24'),
(6, 5, '1659626664-1098-DOC-1659345246-6791-DOC-Central Agriculture Universities (1).xlsx', 0, '2022-08-04 20:54:24'),
(7, 0, '1659628455-4979-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 08:54:15'),
(8, 0, '1659628455-7787-DOC-1659345246-6791-DOC-Central Agriculture Universities (1).xlsx', 0, '2022-08-04 08:54:15'),
(9, 0, '1659628455-3281-DOC-1659345246-6791-DOC-Central Agriculture Universities.xlsx', 0, '2022-08-04 08:54:15'),
(10, 6, '1659628623-2776-DOC-1659345246-6791-DOC-Central Agriculture Universities (1).xlsx', 0, '2022-08-04 08:57:03'),
(11, 6, '1659628623-8089-DOC-1659345246-6791-DOC-Central Agriculture Universities.xlsx', 0, '2022-08-04 08:57:03'),
(12, 0, '1662717559-8808-DOC-Fruits.png', 0, '2022-09-09 15:29:19'),
(13, 0, '1662717711-4455-DOC-Fruits.png', 0, '2022-09-09 15:31:51'),
(14, 0, '1662717771-5790-DOC-Fruits.png', 0, '2022-09-09 15:32:51'),
(15, 0, '1662717797-3814-DOC-Fruits.png', 0, '2022-09-09 15:33:17'),
(16, 0, '1662717806-8636-DOC-Fruits.png', 0, '2022-09-09 15:33:26'),
(17, 0, '1662717828-7566-DOC-banner_img.jpg', 0, '2022-09-09 15:33:48'),
(18, 7, '1662717893-7769-DOC-banner_img.jpg', 0, '2022-09-09 15:34:53'),
(19, 9, '1662718815-2808-DOC-Vegetables.png', 0, '2022-09-09 15:50:15'),
(20, 11, '1662719669-1213-DOC-nuts.png', 0, '2022-09-09 16:04:29'),
(21, 12, '1666085123-1001-DOC-Comp2-14.jpg', 0, '2022-10-18 02:25:23'),
(22, 13, '1666085647-3109-DOC-Black_gram.jpg', 0, '2022-10-18 02:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `production_images`
--

CREATE TABLE `production_images` (
  `production_image_id` int(100) NOT NULL,
  `Production_ID` int(100) NOT NULL,
  `image_name` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT '0',
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_images`
--

INSERT INTO `production_images` (`production_image_id`, `Production_ID`, `image_name`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 4, '1659626402-4042-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 20:50:02'),
(2, 4, '1659626402-7668-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 20:50:02'),
(3, 5, '1659626664-1751-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 20:54:24'),
(4, 5, '1659626664-6776-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 20:54:24'),
(5, 0, '1659628455-6401-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 08:54:15'),
(6, 0, '1659628455-5874-DOC-1659345246-6791-DOC-Central Agriculture Universities (2).xlsx', 0, '2022-08-04 08:54:15'),
(7, 6, '1659628623-7447-DOC-1659345361-3599-DOC-ICAR- Agricultural Universities.xlsx', 0, '2022-08-04 08:57:03'),
(8, 0, '1662717559-3389-DOC-Fruits.png', 0, '2022-09-09 15:29:19'),
(9, 0, '1662717711-5513-DOC-Fruits.png', 0, '2022-09-09 15:31:51'),
(10, 0, '1662717771-9258-DOC-Fruits.png', 0, '2022-09-09 15:32:51'),
(11, 0, '1662717797-3533-DOC-Fruits.png', 0, '2022-09-09 15:33:17'),
(12, 0, '1662717806-6595-DOC-Fruits.png', 0, '2022-09-09 15:33:26'),
(13, 0, '1662717828-6639-DOC-Fruits.png', 0, '2022-09-09 15:33:48'),
(14, 7, '1662717893-4280-DOC-Fruits.png', 0, '2022-09-09 15:34:53'),
(15, 9, '1662718815-8322-DOC-Vegetables.png', 0, '2022-09-09 15:50:15'),
(16, 11, '1662719669-2187-DOC-nuts.png', 0, '2022-09-09 16:04:29'),
(17, 11, '1662719870-9165-DOC-download.jpg', 0, '2022-09-09 16:07:50'),
(18, 12, '1666085123-2571-DOC-Comp2-14.jpg', 0, '2022-10-18 02:25:23'),
(19, 13, '1666085647-4045-DOC-BlackGram_big_1.jpg', 0, '2022-10-18 02:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `qci_users`
--

CREATE TABLE `qci_users` (
  `QCI_ID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Mobile` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `DeletedStatus` int(11) DEFAULT '0',
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qci_users`
--

INSERT INTO `qci_users` (`QCI_ID`, `Name`, `Email`, `Mobile`, `Password`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 'QCI Head', 'qci@gmail.com', '9876543210', '202cb962ac59075b964b07152d234b70', 0, '2023-05-25 05:37:41');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `Super_admin_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Profile_image` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`Super_admin_id`, `Name`, `Email`, `Profile_image`, `Phone`, `Password`, `CreatedDate`) VALUES
(1, 'CB', 'cb@gmail.com', 'icon2.png', '9876543210123', '123', '2022-10-06 06:48:48');

-- --------------------------------------------------------

--
-- Table structure for table `village_info`
--

CREATE TABLE `village_info` (
  `id` int(11) NOT NULL,
  `Cluster_Registration_ID` varchar(255) NOT NULL,
  `VillageName` varchar(255) NOT NULL,
  `No_of_Villagers` varchar(255) NOT NULL,
  `Block_Taluk_Mandal` varchar(255) NOT NULL,
  `ClusterName` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `District` varchar(255) NOT NULL,
  `Distance_HQ_Kms` varchar(255) NOT NULL,
  `No_of_Farmers` varchar(255) NOT NULL,
  `CropSeason` varchar(255) NOT NULL,
  `CropType` varchar(255) NOT NULL,
  `CropName` varchar(255) NOT NULL,
  `Variety` varchar(255) NOT NULL,
  `Grade` varchar(255) NOT NULL,
  `ShowingMonth` varchar(255) NOT NULL,
  `Land_Under_Cultivation_in_Ha` varchar(255) NOT NULL,
  `Appoximate_Yield_per_Ha_in_MT` varchar(255) NOT NULL,
  `HarvestMonth` varchar(255) NOT NULL,
  `Expected_Quantity_in_MT` varchar(255) NOT NULL,
  `Marketable_Surplus_In_MT` varchar(255) NOT NULL,
  `Product_Procurement_Location` varchar(255) NOT NULL,
  `Market_Price_per_MT_Last_Season` varchar(255) NOT NULL,
  `FoodSeftyery` varchar(255) NOT NULL,
  `Upload_Food_Seftyery_Certifications` varchar(255) NOT NULL,
  `PaymentTerms` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Discription_Equipment` varchar(255) NOT NULL,
  `Activity` varchar(255) NOT NULL,
  `Operational_Status` varchar(255) NOT NULL,
  `Sq_ft` varchar(255) NOT NULL,
  `Capacity` varchar(255) NOT NULL,
  `Accreditation_Status` varchar(255) NOT NULL,
  `Logistic_facilities_for_Produce_transport` varchar(255) NOT NULL,
  `Agricultaral_Practices_Implimentation` varchar(255) NOT NULL,
  `Outage_Name` varchar(255) NOT NULL,
  `Outage_Address` varchar(255) NOT NULL,
  `Outage_Activity` varchar(255) NOT NULL,
  `Outage_Mobile` varchar(255) NOT NULL,
  `Outage_Email` varchar(255) NOT NULL,
  `Outage_Local_Challenges` varchar(255) NOT NULL,
  `Government_Facilities` varchar(255) NOT NULL,
  `Government_Institution_Name` varchar(255) NOT NULL,
  `Government_Facilities_Address` varchar(255) NOT NULL,
  `Government_facilities_contact_details` varchar(255) NOT NULL,
  `Export_Year` varchar(255) NOT NULL,
  `Export_qty` varchar(255) NOT NULL,
  `Export_amount_in_lakh` varchar(255) NOT NULL,
  `Export_countries` varchar(255) NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `FileName` varchar(50) DEFAULT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `village_info`
--

INSERT INTO `village_info` (`id`, `Cluster_Registration_ID`, `VillageName`, `No_of_Villagers`, `Block_Taluk_Mandal`, `ClusterName`, `State`, `District`, `Distance_HQ_Kms`, `No_of_Farmers`, `CropSeason`, `CropType`, `CropName`, `Variety`, `Grade`, `ShowingMonth`, `Land_Under_Cultivation_in_Ha`, `Appoximate_Yield_per_Ha_in_MT`, `HarvestMonth`, `Expected_Quantity_in_MT`, `Marketable_Surplus_In_MT`, `Product_Procurement_Location`, `Market_Price_per_MT_Last_Season`, `FoodSeftyery`, `Upload_Food_Seftyery_Certifications`, `PaymentTerms`, `Video`, `Discription_Equipment`, `Activity`, `Operational_Status`, `Sq_ft`, `Capacity`, `Accreditation_Status`, `Logistic_facilities_for_Produce_transport`, `Agricultaral_Practices_Implimentation`, `Outage_Name`, `Outage_Address`, `Outage_Activity`, `Outage_Mobile`, `Outage_Email`, `Outage_Local_Challenges`, `Government_Facilities`, `Government_Institution_Name`, `Government_Facilities_Address`, `Government_facilities_contact_details`, `Export_Year`, `Export_qty`, `Export_amount_in_lakh`, `Export_countries`, `DeletedStatus`, `FileName`, `CreatedDate`) VALUES
(7, '7', 'Sonipat', '55', 'testing16', 'testing15', 'Karnataka', 'Bagalkot', 'testing15', '20', '1', 'Rabi', 'testing15', 'testing15', '50', 'September', '150000', '150000', '150000', '150000', '150000', '150000', '150000', 'No', 'slider.jpg', '150000', 'movie.mp4', 'Testing', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '                            ', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', 0, '0', '2022-09-08 04:36:25'),
(8, '7', 'Amritsar', '20', 'testing15', 'testing152', 'Punjab', 'Amritsar', 'testing152', '21', 'test', 'Rabi', 'test', 'test', '16', 'October', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'Yes', 'et00334734-pprwynjffy-portrait.jpg', 'testtesttest', 'fpo_db (1).sql', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', '                            testing152testing152testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152testing152', 'testing152', 'testing152', 0, '0', '2022-09-13 08:21:07'),
(10, '8', 'Bengtol', '15', 'Bengtol', 'CRD Pvt Ltd', 'Assam', 'Chirang', '15', '20', 'Tea', 'Kharif', 'test', '50', '50', 'January', '20', '20', '8', '55', '55', '55', '55', 'Yes', 'countries-compared-by-po.xls', 'No', 'countries-compared-by-po.xls', 'Testing', 'Testing', 'testing15', '500', '500', '500', '500', '500', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing                            ', 'Testing', 'Testing', 'Testing', '987654321', '2022', '55', '55', 'India', 0, '0', '2022-09-15 11:37:07'),
(11, '0', 'Sonipat', '1', 'testing15', 'testing152', 'Delhi', '', '15', '', '', 'Kharif', 'test', 'test', 'test', 'January', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'Yes', 'fpo_db (2).sql', 'testtesttest', 'fpo_db (2).sql', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'testing152', '150000', 'Testing', 'Testing', 'Testing', '98786543210', 'Testing@gmail.com', 'lkajsdlfjalkd', 'testing152', 'Testing', 'Testing', '12345678960', '2013', '58', '7500000', 'India', 0, '0', '2022-09-26 11:22:45'),
(12, '9', 'Agra', '965', 'Akbarpur', 'DPS Zone', 'Uttar Pradesh', 'Agra', '15', '', '', 'Kharif', 'Rice,Soybean', '50,20', 'A', 'June', '2', '20', 'November', '55', '55', '55', '55', 'Yes', 'fpo_db (1).sql', 'No', 'fpo_db (1).sql', 'Testing', 'Testing', 'Approved', '490.248', '500', 'Approved', '150000', '500', '150000', '150000', '150000', '150000', 'Testing@gmail.com', 'we want to purchase you whole kharif iteams', 'Purchase', 'Govt of UP', 'Govt of UP', '9876543210', '2014', '150000', '1500000', 'India', 0, '0', '2022-09-26 11:25:01'),
(13, '14', 'Mowkaiaw ', '350', 'Lasiken ', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya', 'West Jaintia Hills', '34', '', '', 'Kharif', 'Turmeric ', 'Lakadong ', 'A', 'May', '110 ', '7', 'October ', '770', '770', 'Mokaiaw ', '18000', 'No', 'Slide1.PNG', 'Against the Delivery ', 'Slide1.PNG', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA                      ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 1, '0', '2023-01-04 06:54:30'),
(14, '9', 'test', '33', 'test', 'test', 'Meghalaya', 'East Garo Hills', 'test', '', '', 'Kharif', 'test', 'A', 'A', 'March', 'test', 'test', '0', 'tesrt', 'tes', 'test', 'test', 'Select', ',', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '                     ', '', '', '', '', '', '', '', '', 1, '0', '2023-01-16 04:41:34'),
(16, '9', 'Village Name', 'No. of Farmers', 'Block/Taluk/Mandal', 'Cluster Name', 'State', 'District', 'Distance from HQ in Kms', '', 'Season', '', 'Commodity Name', 'Variety  ', 'Grade ', 'Sowing Month', 'Land Under Cultivation in Ha', 'Appoximate Yield per Ha in MT', 'Harvest Month', 'Expected Quantity in MT', 'Marketable Surplus In MT', 'Product Procurement Location', 'Market Price per MT Last Season in Rs', 'Food Seftyery Certifications (Yes/No)', '', 'Payment Terms', '', 'Discription of Equipment', 'Activity', 'Operational Status', 'SQ FT', 'Capacity in MT', 'Accreditation status', 'Logistic facilities for Produce transport', 'Good Agricultaral Practices Implimentation', 'Name', 'Address', 'Activity', 'Mobile', 'Email', 'Local Challenges', 'Facilities', 'Institution Name', 'Address', 'Contact Details', 'Export Year', 'Qty in Mt', 'Rs in Lakhs', 'Countries', 1, '0', '2023-01-19 12:19:17'),
(17, '14', 'Mowkaiaw', '350', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '34', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '112', '7', 'January ', 'Mowkaiaw', '784', '784', 'Mowkaiaw', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(18, '14', 'Mukhap', '250', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '33', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '125', '7', 'January ', 'Mowkaiaw', '875', '875', 'Mukhap ', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(19, '14', 'Mowtyrshiah', '310', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '36', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '152', '7', 'January ', 'Mowkaiaw', '1064', '1064', 'Mowtyrshiah', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(20, '14', 'Laskein', '300', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '36', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '165', '7', 'January ', 'Laskein', '1155', '1155', 'Lasiken ', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(21, '14', 'Mulum', '120', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '30', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '84', '7', 'January ', 'Laskein', '588', '588', 'Mulum', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(22, '14', 'Mulieh', '200', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '31', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '95', '7', 'January ', 'Laskein', '665', '665', 'Mulieh', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(23, '14', 'Biar', '120', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '34', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '97', '7', 'January ', 'Laskein', '679', '679', 'Biar ', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(24, '14', 'Mowkyndeng', '198', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '29', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '180', '7', 'January ', 'Laskein', '1260', '1260', 'Mowkyndeng', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(25, '14', 'Nongkynrih', '120', 'Laskein', 'Lakadong Turmeric ', 'Meghalaya ', 'West Jaintia hills ', '30', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '68', '7', 'January ', 'Laskein', '476', '476', 'Nongkynrih', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 1, '0', '2023-01-19 12:30:53'),
(26, '14', 'Mowkaiaw', '350', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '34', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '112', '7', 'January ', 'Mowkaiaw', '784', '784', 'Mowkaiaw', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(27, '14', 'Mukhap', '250', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '33', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '125', '7', 'January ', 'Mowkaiaw', '875', '875', 'Mukhap ', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(28, '14', 'Mowtyrshiah', '310', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '36', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '152', '7', 'January ', 'Mowkaiaw', '1064', '1064', 'Mowtyrshiah', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(29, '14', 'Laskein', '300', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '36', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '165', '7', 'January ', 'Laskein', '1155', '1155', 'Lasiken ', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(30, '14', 'Mulum', '120', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '30', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '84', '7', 'January ', 'Laskein', '588', '588', 'Mulum', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(31, '14', 'Mulieh', '200', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '31', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '95', '7', 'January ', 'Laskein', '665', '665', 'Mulieh', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(32, '14', 'Biar', '120', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '34', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '97', '7', 'January ', 'Laskein', '679', '679', 'Biar ', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(33, '14', 'Mowkyndeng', '198', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '29', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '180', '7', 'January ', 'Laskein', '1260', '1260', 'Mowkyndeng', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(34, '14', 'Nongkynrih', '120', 'Laskein', 'LAKADONG TURMERIC CLUSTER', 'Meghalaya ', 'West Jaintia hills ', '30', '', 'Kharif', '', 'Turmeric ', 'Lakadong ', 'A ', 'May ', '68', '7', 'January ', 'Laskein', '476', '476', 'Nongkynrih', '18000', '', 'No', '', 'Cash and Carry ', 'NA ', 'NA ', 'NA ', 'NA', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA ', 'NA', 'NA', 'NA', 'NA', 'NA', 0, '0', '2023-01-20 05:13:46'),
(35, '9', 'test', '34343', 'test', 'test', 'Jammu and Kashmir', 'Anantnag', 'test', '', '', 'Rabi', 'bali', 'Z', 'Z', 'September', '50', '50', 'January', '50', '50', 'tset', '55', 'No', ',', 'test', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '                     ', '', '', '', '', '', '', '', '', 0, '0', '2023-01-23 08:58:32'),
(36, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, '2023-05-03 07:39:22'),
(37, '6', '86', '87', '687', '76', 'Kerala', 'Alappuzha', '68', '', '', 'Select', '876', '87', '687', '0', '876', '876', '0', '87', '687', '6', '876', 'Select', ',', '68', '', '876', '87', '68', '76', '87', '687', '6', '876', '876', '876', '87', '6873333333', '6@gmail.com', '786                     ', '876', '87', '68', '76', '876', '87', '687', '6', 0, 'Manual Entry', '2023-05-03 08:00:01'),
(38, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, NULL, '2023-05-03 08:16:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_buyer_interface`
--
ALTER TABLE `about_buyer_interface`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `about_cluster`
--
ALTER TABLE `about_cluster`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `about_fpo`
--
ALTER TABLE `about_fpo`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `about_website`
--
ALTER TABLE `about_website`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `buyer_interested_commodities`
--
ALTER TABLE `buyer_interested_commodities`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  ADD PRIMARY KEY (`Buyer_Registration_ID`);

--
-- Indexes for table `cb_users`
--
ALTER TABLE `cb_users`
  ADD PRIMARY KEY (`cb_user_id`);

--
-- Indexes for table `cb_user_edit_fpo_profile`
--
ALTER TABLE `cb_user_edit_fpo_profile`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cluster_collection_center`
--
ALTER TABLE `cluster_collection_center`
  ADD PRIMARY KEY (`Cluster_Collection_Center_ID`);

--
-- Indexes for table `cluster_crop_calenders`
--
ALTER TABLE `cluster_crop_calenders`
  ADD PRIMARY KEY (`Cluster_Crop_Calender_Id`);

--
-- Indexes for table `cluster_farmers`
--
ALTER TABLE `cluster_farmers`
  ADD PRIMARY KEY (`Cluster_Farmer_Id`);

--
-- Indexes for table `cluster_food_safety_standard_docs`
--
ALTER TABLE `cluster_food_safety_standard_docs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `cluster_production`
--
ALTER TABLE `cluster_production`
  ADD PRIMARY KEY (`Cluster_Production_ID`);

--
-- Indexes for table `cluster_production_certifications`
--
ALTER TABLE `cluster_production_certifications`
  ADD PRIMARY KEY (`cluster_production_certification_id`);

--
-- Indexes for table `cluster_production_images`
--
ALTER TABLE `cluster_production_images`
  ADD PRIMARY KEY (`cluster_production_image_id`);

--
-- Indexes for table `cluster_registration`
--
ALTER TABLE `cluster_registration`
  ADD PRIMARY KEY (`Cluster_Registration_ID`);

--
-- Indexes for table `cluster_supporting_information`
--
ALTER TABLE `cluster_supporting_information`
  ADD PRIMARY KEY (`cluster_supporting_information_id`);

--
-- Indexes for table `collection_center`
--
ALTER TABLE `collection_center`
  ADD PRIMARY KEY (`Collection_Center_ID`);

--
-- Indexes for table `crop_calenders`
--
ALTER TABLE `crop_calenders`
  ADD PRIMARY KEY (`Crop_Calender_Id`);

--
-- Indexes for table `export_document`
--
ALTER TABLE `export_document`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`Farmer_Id`);

--
-- Indexes for table `fpo_extra_details`
--
ALTER TABLE `fpo_extra_details`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fpo_food_safety_standard_docs`
--
ALTER TABLE `fpo_food_safety_standard_docs`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `fpo_registration`
--
ALTER TABLE `fpo_registration`
  ADD PRIMARY KEY (`FPO_Registration_ID`);

--
-- Indexes for table `fpo_registration_crops_cultivated`
--
ALTER TABLE `fpo_registration_crops_cultivated`
  ADD PRIMARY KEY (`fpo_registration_crops_cultivated_id`);

--
-- Indexes for table `fpo_registration_details`
--
ALTER TABLE `fpo_registration_details`
  ADD PRIMARY KEY (`fpo_registration_detail_id`);

--
-- Indexes for table `fpo_registration_mobileno`
--
ALTER TABLE `fpo_registration_mobileno`
  ADD PRIMARY KEY (`fpo_registration_mobileno_id`);

--
-- Indexes for table `fpo_registration_mobilenumber`
--
ALTER TABLE `fpo_registration_mobilenumber`
  ADD PRIMARY KEY (`fpo_registration_mobilenumber_id`);

--
-- Indexes for table `fpo_user_to_assign_cb`
--
ALTER TABLE `fpo_user_to_assign_cb`
  ADD PRIMARY KEY (`User_Assing_ID`);

--
-- Indexes for table `market_linkage_productimages`
--
ALTER TABLE `market_linkage_productimages`
  ADD PRIMARY KEY (`Market_Linkage_ProductImage_id`);

--
-- Indexes for table `other_production`
--
ALTER TABLE `other_production`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `own_production`
--
ALTER TABLE `own_production`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `production`
--
ALTER TABLE `production`
  ADD PRIMARY KEY (`Production_ID`);

--
-- Indexes for table `production_certifications`
--
ALTER TABLE `production_certifications`
  ADD PRIMARY KEY (`production_certification_id`);

--
-- Indexes for table `production_images`
--
ALTER TABLE `production_images`
  ADD PRIMARY KEY (`production_image_id`);

--
-- Indexes for table `qci_users`
--
ALTER TABLE `qci_users`
  ADD PRIMARY KEY (`QCI_ID`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`Super_admin_id`);

--
-- Indexes for table `village_info`
--
ALTER TABLE `village_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_buyer_interface`
--
ALTER TABLE `about_buyer_interface`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_cluster`
--
ALTER TABLE `about_cluster`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_fpo`
--
ALTER TABLE `about_fpo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_website`
--
ALTER TABLE `about_website`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_interested_commodities`
--
ALTER TABLE `buyer_interested_commodities`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  MODIFY `Buyer_Registration_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cb_users`
--
ALTER TABLE `cb_users`
  MODIFY `cb_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cb_user_edit_fpo_profile`
--
ALTER TABLE `cb_user_edit_fpo_profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cluster_collection_center`
--
ALTER TABLE `cluster_collection_center`
  MODIFY `Cluster_Collection_Center_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cluster_crop_calenders`
--
ALTER TABLE `cluster_crop_calenders`
  MODIFY `Cluster_Crop_Calender_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cluster_farmers`
--
ALTER TABLE `cluster_farmers`
  MODIFY `Cluster_Farmer_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `cluster_food_safety_standard_docs`
--
ALTER TABLE `cluster_food_safety_standard_docs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cluster_production`
--
ALTER TABLE `cluster_production`
  MODIFY `Cluster_Production_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cluster_production_certifications`
--
ALTER TABLE `cluster_production_certifications`
  MODIFY `cluster_production_certification_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cluster_production_images`
--
ALTER TABLE `cluster_production_images`
  MODIFY `cluster_production_image_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cluster_registration`
--
ALTER TABLE `cluster_registration`
  MODIFY `Cluster_Registration_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `cluster_supporting_information`
--
ALTER TABLE `cluster_supporting_information`
  MODIFY `cluster_supporting_information_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_center`
--
ALTER TABLE `collection_center`
  MODIFY `Collection_Center_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `crop_calenders`
--
ALTER TABLE `crop_calenders`
  MODIFY `Crop_Calender_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `export_document`
--
ALTER TABLE `export_document`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `Farmer_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `fpo_extra_details`
--
ALTER TABLE `fpo_extra_details`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fpo_food_safety_standard_docs`
--
ALTER TABLE `fpo_food_safety_standard_docs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fpo_registration`
--
ALTER TABLE `fpo_registration`
  MODIFY `FPO_Registration_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `fpo_registration_crops_cultivated`
--
ALTER TABLE `fpo_registration_crops_cultivated`
  MODIFY `fpo_registration_crops_cultivated_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fpo_registration_details`
--
ALTER TABLE `fpo_registration_details`
  MODIFY `fpo_registration_detail_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fpo_registration_mobileno`
--
ALTER TABLE `fpo_registration_mobileno`
  MODIFY `fpo_registration_mobileno_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fpo_registration_mobilenumber`
--
ALTER TABLE `fpo_registration_mobilenumber`
  MODIFY `fpo_registration_mobilenumber_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fpo_user_to_assign_cb`
--
ALTER TABLE `fpo_user_to_assign_cb`
  MODIFY `User_Assing_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `market_linkage_productimages`
--
ALTER TABLE `market_linkage_productimages`
  MODIFY `Market_Linkage_ProductImage_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other_production`
--
ALTER TABLE `other_production`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `own_production`
--
ALTER TABLE `own_production`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `Production_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `production_certifications`
--
ALTER TABLE `production_certifications`
  MODIFY `production_certification_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `production_images`
--
ALTER TABLE `production_images`
  MODIFY `production_image_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `qci_users`
--
ALTER TABLE `qci_users`
  MODIFY `QCI_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `Super_admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `village_info`
--
ALTER TABLE `village_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
