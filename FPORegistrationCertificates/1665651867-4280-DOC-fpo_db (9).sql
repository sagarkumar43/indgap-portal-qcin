-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 11:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fpo_db`
--

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
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_profile`
--

INSERT INTO `admin_profile` (`Id`, `Name`, `Email`, `Profile_image`, `Phone`, `Password`, `CreatedDate`) VALUES
(1, 'Administrator123', 'admin@gmail.com', 'icon2.png', '9876543210123', '123', '2022-10-06 06:48:48');

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
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `Account_Status` varchar(255) NOT NULL COMMENT 'Active / Inactive',
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer_registration`
--

INSERT INTO `buyer_registration` (`Buyer_Registration_ID`, `ContactPersonName`, `MobileNo`, `LandlineNo`, `Email`, `Password`, `Designation`, `CompanyName`, `CompanyWeb`, `BusinessActivities`, `State`, `CompanyAddress`, `BuyerType`, `Retailer_gst`, `Retailer_gst_file`, `Retailer_pan`, `Retailer_pan_file`, `Retailer_fssai`, `Retailer_fssai_status`, `Retailer_fassai_file`, `Retailer_iec`, `Retailer_iec_file`, `Wholesaler_gst`, `Wholesaler_file`, `Wholesaler_pan`, `Wholesaler_pan_file`, `Wholesaler_fssai`, `Wholesaler_fssai_status`, `Wholesaler__fassai`, `Wholesaler_iec`, `Wholesaler_iec_file`, `processor_gst`, `processor_gst_file`, `processor_pan`, `processor_pan_file`, `processor_fssai`, `processor_fssai_status`, `processor_fssai_file`, `processor_iec`, `processor_iec_file`, `exporter_gst`, `exporter_gst_file`, `exporter_pan`, `exporter_pan_file`, `exporter_fssai`, `exporter_fssai_status`, `exporter_fssai_file`, `exporter_iec`, `exporter_iec_file`, `DeletedStatus`, `Account_Status`, `CreatedDate`) VALUES
(2, 'test', 'iyiyiyiy', '', 'test@gmail.com', '202cb962ac59075b964b07152d234b70', 'iy', 'iyiyiu', '', '', 'Karnataka', 'ljlkjl', 'Wholesaler', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '2022-08-03 22:47:50');

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
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
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
(10, 8, 'Delhi', 'North West Delhi', 'North West Collection Centers', 'Delhi', '15 Km', 'Government of Delhi', 0, '', '2022-09-15 16:43:21');

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
  `DeletedStatus` int(100) NOT NULL DEFAULT 0,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
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
(11, 2, '8', 'Crop1', 687, 6, 876, 876, 87, 68, 76, 87, 687, 6, 68, 8, 0, '2022-08-05 03:16:09');

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
  `Village` varchar(250) NOT NULL,
  `HarvestingMonth` varchar(50) NOT NULL,
  `CropName` varchar(100) NOT NULL,
  `Grade` varchar(255) NOT NULL,
  `Variety` varchar(255) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_farmers`
--

INSERT INTO `cluster_farmers` (`Cluster_Farmer_Id`, `Cluster_Registration_ID`, `FPOSelfHelpGroup`, `FarmerName`, `PhoneNo`, `TotalIrrigatedArea`, `District`, `State`, `Block`, `SowingMonth`, `ExpectedYeildinMT`, `CurrentMarketPlace`, `FatherName`, `Village`, `HarvestingMonth`, `CropName`, `Grade`, `Variety`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(3, 4, '686', '6', '876', '876', 'Bokaro', 'Jharkhand', '87', 'October', '876', '786', '786', '786', 'August', 'Kharif', '', '', 0, '', '2022-08-05 12:21:18'),
(4, 2, '8678', '68', '76', '876', 'Araria', 'Bihar', '876', 'April', '876', '78', '68', '876', 'November', 'Rabi', '', '', 0, '', '2022-08-05 03:28:00'),
(5, 8, 'Testing', 'Neeraj', '9876543210', '5', 'Chirang', 'Assam', '6', 'January', '50', '12', 'Sonu', 'Bengtol', 'August', 'Kharif', '', '', 0, '', '2022-09-15 16:59:27'),
(11, 9, '6', '7', '9', '10', '2', '5', '3', '14', '16', '17', '8', '4', '15', '11', '12', '13', 0, '', '2022-10-01 05:21:31');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_production`
--

CREATE TABLE `cluster_production` (
  `Cluster_Production_ID` int(100) NOT NULL,
  `Cluster_Registration_ID` int(100) NOT NULL,
  `CollectionCenter` varchar(250) NOT NULL,
  `SeasonName` varchar(250) NOT NULL,
  `VarietyName` varchar(250) NOT NULL,
  `Grade` varchar(100) NOT NULL,
  `Size` varchar(100) NOT NULL,
  `TotalQtyInMT` int(50) NOT NULL,
  `QtySoldInMT` int(50) NOT NULL,
  `QtyBalanceInMT` int(50) NOT NULL,
  `CropSpecification` varchar(250) NOT NULL,
  `FoodSaftyCertification` varchar(250) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_production`
--

INSERT INTO `cluster_production` (`Cluster_Production_ID`, `Cluster_Registration_ID`, `CollectionCenter`, `SeasonName`, `VarietyName`, `Grade`, `Size`, `TotalQtyInMT`, `QtySoldInMT`, `QtyBalanceInMT`, `CropSpecification`, `FoodSaftyCertification`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(2, 0, '3', '998', '798', '79', '87', 98, 7, 987, '89', 'IndGAP', 0, '', '2022-08-04 20:37:48'),
(3, 0, '3', '6876', '87', '687', '6', 876, 87, 6, '87676', 'Global GAP', 0, '', '2022-08-04 20:48:55'),
(4, 0, '3', '798', '7', '98798', '7', 987, 98, 79, '98', 'IndGAP', 0, '', '2022-08-04 20:50:02'),
(5, 4, '3', '908', '908', '098', '09', 8, 98, 9809, '08098', 'IndGAP', 1, '', '2022-08-04 20:54:24'),
(6, 2, '6', '979', '87', '98', '798', 79, 7, 98, '79', 'NPOP Organic', 0, '', '2022-08-05 02:55:09'),
(7, 8, 'North West Collection Centers', 'Winter', 'Cashews', '15', '', 150, 125, 25, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-09-15 16:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_production_certifications`
--

CREATE TABLE `cluster_production_certifications` (
  `cluster_production_certification_id` int(100) NOT NULL,
  `Cluster_Production_ID` int(100) NOT NULL,
  `certification_name` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
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
(10, 7, '1663240538-3113-DOC-countries-compared-by-po.xls', 0, '2022-09-15 16:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `cluster_production_images`
--

CREATE TABLE `cluster_production_images` (
  `cluster_production_image_id` int(100) NOT NULL,
  `Cluster_Production_ID` int(100) NOT NULL,
  `image_name` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
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
(7, 7, '1663240538-8445-DOC-nuts.png', 0, '2022-09-15 16:45:38');

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
  `NoofFarmer` int(100) NOT NULL,
  `TotalLandHAWithFPOfarmers` varchar(100) NOT NULL,
  `PaidupShareCapital` varchar(100) NOT NULL,
  `PromotingAgency` varchar(100) NOT NULL,
  `BussinessActivity` varchar(200) NOT NULL,
  `TotalIrrigatedArea` varchar(100) NOT NULL,
  `CropType` varchar(200) NOT NULL,
  `MajorCropName` varchar(200) NOT NULL,
  `YearofTurnoverRs` int(100) NOT NULL,
  `TurnoverRs` varchar(200) NOT NULL,
  `FixedInfrastructureBuildings` varchar(200) NOT NULL,
  `Plantandmachinery` varchar(200) NOT NULL,
  `Others` varchar(200) NOT NULL,
  `WarehouseFaclity` varchar(200) NOT NULL,
  `WarehouseFaclityDescription` varchar(200) NOT NULL,
  `WarehouseFacilityYearofConstruction` varchar(200) NOT NULL,
  `WarehouseFacilityLocation` varchar(200) NOT NULL,
  `WarehouseFacilityLocationAreainsqft` varchar(200) NOT NULL,
  `Lenght` varchar(100) NOT NULL,
  `Width` varchar(100) NOT NULL,
  `Depth` varchar(100) NOT NULL,
  `ProduceStored` varchar(100) NOT NULL,
  `Capacity` varchar(100) NOT NULL,
  `PresentStatus` varchar(100) NOT NULL,
  `ProcessingEquipment` varchar(100) NOT NULL,
  `DescriptionofEquipment` longtext NOT NULL,
  `YearofPurchaseEquipment` int(100) NOT NULL,
  `ProcessingActivityofEquipment` varchar(100) NOT NULL,
  `Capacity1` varchar(100) NOT NULL,
  `DescriptionofOutputEquipment` longtext NOT NULL,
  `PresentStatus1` varchar(100) NOT NULL,
  `FarmEquipment` varchar(100) NOT NULL,
  `DescriptionofEquipmentFarm` longtext NOT NULL,
  `YearofPurchaseEquipmentFarm` int(100) NOT NULL,
  `ActivityofFarm` varchar(100) NOT NULL,
  `PresentStatus2` varchar(100) NOT NULL,
  `SalesHistory` varchar(100) NOT NULL,
  `Year` int(100) NOT NULL,
  `CropName` varchar(200) NOT NULL,
  `ProduceVariety` varchar(100) NOT NULL,
  `Grade` varchar(100) NOT NULL,
  `QtyinMT` int(100) NOT NULL,
  `ValuesRsinLakhs` varchar(100) NOT NULL,
  `MarketPlace` varchar(100) NOT NULL,
  `CustomerList` varchar(200) NOT NULL,
  `AveragePriceperMT` varchar(100) NOT NULL,
  `CollectionCenterorWarehouse` varchar(100) NOT NULL,
  `Storagetype` varchar(100) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `Account_Status` varchar(255) NOT NULL COMMENT 'Active / Inactive',
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cluster_registration`
--

INSERT INTO `cluster_registration` (`Cluster_Registration_ID`, `ClusterName`, `ClusterAddress`, `block_taluka_mandal`, `State`, `District`, `ContactPerson`, `ContactNo`, `Email`, `RegistrationCertificates`, `RegistrationDate`, `NoofFarmer`, `TotalLandHAWithFPOfarmers`, `PaidupShareCapital`, `PromotingAgency`, `BussinessActivity`, `TotalIrrigatedArea`, `CropType`, `MajorCropName`, `YearofTurnoverRs`, `TurnoverRs`, `FixedInfrastructureBuildings`, `Plantandmachinery`, `Others`, `WarehouseFaclity`, `WarehouseFaclityDescription`, `WarehouseFacilityYearofConstruction`, `WarehouseFacilityLocation`, `WarehouseFacilityLocationAreainsqft`, `Lenght`, `Width`, `Depth`, `ProduceStored`, `Capacity`, `PresentStatus`, `ProcessingEquipment`, `DescriptionofEquipment`, `YearofPurchaseEquipment`, `ProcessingActivityofEquipment`, `Capacity1`, `DescriptionofOutputEquipment`, `PresentStatus1`, `FarmEquipment`, `DescriptionofEquipmentFarm`, `YearofPurchaseEquipmentFarm`, `ActivityofFarm`, `PresentStatus2`, `SalesHistory`, `Year`, `CropName`, `ProduceVariety`, `Grade`, `QtyinMT`, `ValuesRsinLakhs`, `MarketPlace`, `CustomerList`, `AveragePriceperMT`, `CollectionCenterorWarehouse`, `Storagetype`, `Password`, `DeletedStatus`, `Account_Status`, `CreatedDate`) VALUES
(6, '565', '65675', '', 'Andhra Pradesh', 'Anantapur', '86', '87676', 'test@gmail.com', '1659795329-2724-DOC-1656415426-5097-img-demo-1.pdf', '2022-08-11', 687, '6786', '786', '87', '687', '6', 'Crop1', '87', 2022, '687', '687', '68', '76', 'No', '87', '676', '876', '87', '687', '6', '876', '87', '6', '6', 'Yes', '76', 87, '687', '', '76', '87', 'Yes', '876', 76, '876', '78', '6', 2022, '76', '87', '67', 68, '76', '876', '78', '68', '76', '6', '202cb962ac59075b964b07152d234b70', 0, '', '2022-08-06 19:45:29'),
(7, 'testing', 'new delhi', '', 'Delhi', 'South Delhi', 'test', '9876543210', 'testing@gmail.com', '1662439115-3913-DOC-', '2022-08-30', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, '', '2022-09-06 10:08:35'),
(8, 'CRD Pvt Ltd', 'New Delhi', '', 'Delhi', 'North West Delhi', 'Sagar', '9876543210', 'Sagar@gmail.com', '1663239977-1805-DOC-countries-compared-by-po.xls', '2022-09-06', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, '', '2022-09-15 16:36:17'),
(9, 'DPS Zone', 'Agra Uttar Pradesh', 'Akbarpur', 'Uttar Pradesh', 'Agra', 'DPS', '9876543210', 'dps@gmail.com', '1664191628-9839-DOC-fpo_db (2).sql', '2022-09-26', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', 0, '', '', '', 0, '', '', '', 0, '', '', '', '', '', '', '202cb962ac59075b964b07152d234b70', 0, '', '2022-09-26 16:57:08');

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
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
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
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collection_center`
--

INSERT INTO `collection_center` (`Collection_Center_ID`, `FPO_Registration_ID`, `State`, `District`, `CollectionCenter`, `NearestTwonForTransport`, `DistanceByRoadToTheCollectionCanter`, `GovermentMandiProductAuctionLocation`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(3, 4, 'Andhra Pradesh', 'Anantapur', 'test1', 'iy', 'iuyiu', 'yiuy', 1, '', '2022-08-04 03:09:08'),
(4, 4, 'Andhra Pradesh', 'Anantapur', 'test2', '', '', '', 1, '', '2022-08-04 03:11:32'),
(5, 4, 'Andhra Pradesh', 'Anantapur', 'test 2', '', '', '', 1, '', '2022-08-03 23:22:02'),
(6, 4, 'Andhra Pradesh', 'Anantapur', 'iy', 'iuy', 'iuyi', 'uyi', 1, '', '2022-08-06 05:10:07'),
(7, 10, 'Tamil Nadu', 'Namakkal', 'Namakkal Collection Center', 'Namakkal', '15 Km', 'Government of Tamil Nadu ', 0, '', '2022-09-09 15:26:14');

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
  `DeletedStatus` int(100) NOT NULL DEFAULT 0,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
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
(9, 4, '5', 'Crop1', 76, 876, 87, 68, 76, 87, 687, 6, 876, 87, 6, 8768, 0, '2022-08-04 22:51:13');

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
  `District` varchar(100) NOT NULL,
  `State` varchar(50) NOT NULL,
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
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`Farmer_Id`, `FPO_Registration_ID`, `FPOSelfHelpGroup`, `FarmerName`, `PhoneNo`, `TotalIrrigatedArea`, `District`, `State`, `Block`, `SowingMonth`, `ExpectedYeildinMT`, `CurrentMarketPlace`, `FatherName`, `Village`, `HarvestingMonth`, `CropName`, `Grade`, `Variety`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(1, 10, '676', '7868', '76', '8761', 'Agar Malwa', 'Madya Pradesh', '876', 'October', '687', '6', '876', '87', 'September', 'Kharif', 'A', '3', 0, '', '2022-08-05 00:01:32'),
(3, 0, 'FPO / Self help Group', 'Farmer Name', 'Mobile', 'Total Irrigated Area', 'District', 'State', 'Block', 'Sowing Month', 'Expected Yeild in MT', 'Current Market Place', 'Father Name', 'Village', 'Harvesting Month', 'Commodity Name', 'Grade', 'Variety', 0, '', '2022-09-30 15:53:09'),
(12, 10, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 0, '', '2022-09-30 17:09:01'),
(13, 10, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 0, '', '2022-10-01 12:10:50'),
(14, 10, 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 0, '', '2022-10-01 12:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_registration`
--

CREATE TABLE `fpo_registration` (
  `FPO_Registration_ID` int(100) NOT NULL,
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
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `Account_Status` varchar(255) NOT NULL COMMENT 'Active / Inactive',
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration`
--

INSERT INTO `fpo_registration` (`FPO_Registration_ID`, `FPOExporterName`, `Address`, `BlockMandalTaluk`, `District`, `State`, `ContactPerson`, `Landline`, `Email`, `YearofFormatation`, `RegistrationCertificate`, `NoofFarmersRegistered`, `Active`, `Inactive`, `EquitySharecapitalPaidup`, `Year`, `RsinLakhs`, `PromotingAgencyName`, `ContactPersonName`, `EmailId`, `BusinessActivity`, `Password`, `DeletedStatus`, `Account_Status`, `CreatedDate`) VALUES
(10, 'tuy', 'tuy', 'tu', 'Namakkal', 'Tamil Nadu', 'uy', '444444444', 'test@gmail.com', '2020', '1661790554-1275-DOC-Neural_Network_Models_for_Word_Sense_Disambiguatio.pdf', 55, 'yt', 'uy', 'tyu', '2027', 'uyt', 'uy', 'tuy', 'test1@gmail.com', 'Activity', '202cb962ac59075b964b07152d234b70', 0, '', '2022-08-29 21:59:14'),
(11, 's', '', '', 'Bokaro', 'Jharkhand', '', '', 'testw@gmail.com', '', '1661790947-8440-DOC-Neural_Network_Models_for_Word_Sense_Disambiguatio.pdf', 0, '', '', '', '2018', '', '', '', 'testw1@gmail.com', 'Activity', '202cb962ac59075b964b07152d234b70', 0, '', '2022-08-29 22:05:47'),
(12, 'PALAMURU RAITHULA PRODUCER COMPANY LIMITED', 'H:NO 11-57,RAJENDRAOTARI NAGAR,PEBBAIR MANDAL WANAPARTHY DISTRICT 509104', 'Pebbair ', 'Wanaparthy', 'Telangana', 'R Venkatesh ', '', 'venkateshlaxmi1981@gmail.com', '2016', '1662034204-6193-DOC-INDIA_SPICE_MAP.jpg', 680, '680', '0', '680000', '2019', '680000', 'Youth for action ', 'Hari babu ', 'test@gmail.com', 'Activity', 'c73ac60f1329fae76c84c4ef312cf71a', 0, '', '2022-09-01 05:10:04');

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
  `CropName` varchar(200) NOT NULL,
  `AreainHa` varchar(100) NOT NULL,
  `Variety` varchar(250) NOT NULL,
  `IrrigationSource` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration_crops_cultivated`
--

INSERT INTO `fpo_registration_crops_cultivated` (`fpo_registration_crops_cultivated_id`, `FPO_Registration_ID`, `CropsCultivated`, `Year`, `Season`, `ProjectFarmOutputMT`, `CropName`, `AreainHa`, `Variety`, `IrrigationSource`, `DeletedStatus`, `CreatedDate`) VALUES
(4, 10, 'yut', '2027', 'tu', 'yt', 'yut', 'uy', 't', 'yut', 0, '2022-08-29 21:59:14'),
(5, 11, 'www', '', '', '', '', '', '', '', 0, '2022-08-29 22:05:47'),
(6, 11, 'wwww', '', '', '', '', '', '', '', 0, '2022-08-29 22:05:47'),
(7, 12, 'Paddy ', '2021', 'Kharif ', '2040MT ', 'Paddy ', '255', ' RNR, BPT ', 'Canal & Borewell ', 0, '2022-09-01 05:10:04'),
(8, 12, 'Redgram ', '2020', 'Kharif ', '', 'Redgram ', '30', 'PRG-176, Pinky, WRGe-97', 'Canal & Borewell ', 0, '2022-09-01 05:10:04'),
(9, 12, 'Blackgram ', '2020', 'Kharif ', '', 'Blackgram ', '40', 'T-9 ', 'Canal & Borewell ', 0, '2022-09-01 05:10:04'),
(10, 12, 'Ground nut ', '2020', 'Kharif ', '', 'Ground nut ', '140', 'Tag-24', 'Canal &Borewell', 0, '2022-09-01 05:10:04');

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
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration_details`
--

INSERT INTO `fpo_registration_details` (`fpo_registration_detail_id`, `FPO_Registration_ID`, `GrossRevenue_Year`, `GrossRevenue_CropName`, `GrossRevenue_CropVariety`, `GrossRevenue_QuantityMT`, `GrossRevenue_RevenueinLakhs`, `GrossRevenue_MarketPlace`, `GrossRevenue_AveragePricePerMT`, `Warehouse_YearofSetup`, `Warehouse_AreainSqft`, `Warehouse_Capacityinmt`, `Warehouse_OwnedorLeased`, `Warehouse_AccredeationStatus`, `Procesing_Equipment_Activity`, `Procesing_Equipment_Operational_Status`, `Procesing_Equipment_ValueRsinLakhs`, `Procesing_Equipment_Discription`, `Farm_Equipment_Activity`, `Farm_Equipment_OperationalStatus`, `Farm_Equipment_ValueRsinLakhs`, `Farm_Equipment_Discription`, `Credit_Facilities_Availed_Bank`, `Credit_Facilities_Availed_FacilityType`, `Credit_Facilities_Availed_AmountReleasedRs`, `Credit_Facilities_Availed_AmountOutstandingRs`, `Credit_Facilities_Availed_OperationStatusRegularIrregular`, `Market_Linkage_Season`, `Market_Linkage_CropName`, `Market_Linkage_Variety`, `Market_Linkage_Grade`, `Market_Linkage_HarvestMonth`, `Market_Linkage_QuntatySoldinmt`, `Market_Linkage_ProductImage`, `Market_Linkage_ProductDeliveryLocation`, `Market_Linkage_MarketPlace`, `Market_Linkage_FoodSafetyCertificationStatus`, `Market_Linkage_UploadCertificate`, `Market_Linkage_TermandConditions`, `DeletedStatus`, `CreatedDate`) VALUES
(1, 12, '2019', '8687', '6', '876', '876', '876', '87', '2017', '87687', '6', '876', '876', '8687', '6', '876', '87687', '8687', '6876', '87687', '687', '8687', '6876', '8768', '768768', '68', '44', '44', '4444', '4444', 'March', '4444', '1661934326-9533-DOC-Disclaimer.docx', '444', '44444', 'Yes', '1661934326-4076-DOC-Disclaimer.docx', '1661934326-8448-DOC-Demo farm (2).docx', 0, '2022-08-31 11:35:57'),
(5, 10, '2015,2017,2016', 'Testing,Testing2,Testing1', 'Testing,Testing2,Testing1', '20,22,21', '20,22,21', '20,22,21', '20,22,21', '2015,2016', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing2,Testing1', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing1,Testing2', 'Testing', 'Testing', 'Testing', 'Testing', 'January', 'Testing', '', 'Testing', 'Testing', 'Yes', '', '', 0, '2022-09-01 05:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_registration_mobileno`
--

CREATE TABLE `fpo_registration_mobileno` (
  `fpo_registration_mobileno_id` int(50) NOT NULL,
  `FPO_Registration_ID` int(50) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration_mobileno`
--

INSERT INTO `fpo_registration_mobileno` (`fpo_registration_mobileno_id`, `FPO_Registration_ID`, `MobileNo`, `DeletedStatus`, `CreatedDate`) VALUES
(2, 10, '1111111111', 0, '2022-08-29 21:59:14'),
(3, 10, '2222222', 0, '2022-08-29 21:59:14'),
(4, 10, '33333333', 0, '2022-08-29 21:59:14'),
(5, 10, '66666666', 0, '2022-08-29 21:59:14'),
(6, 10, '7777777', 0, '2022-08-29 21:59:14'),
(7, 10, '888888888', 0, '2022-08-29 21:59:14'),
(8, 12, '9542433174', 0, '2022-09-01 05:10:04'),
(9, 12, '9542433174', 0, '2022-09-01 05:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `fpo_registration_mobilenumber`
--

CREATE TABLE `fpo_registration_mobilenumber` (
  `fpo_registration_mobilenumber_id` int(50) NOT NULL,
  `FPO_Registration_ID` int(50) NOT NULL,
  `MobileNo` varchar(50) NOT NULL,
  `DeletedStatus` int(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fpo_registration_mobilenumber`
--

INSERT INTO `fpo_registration_mobilenumber` (`fpo_registration_mobilenumber_id`, `FPO_Registration_ID`, `MobileNo`, `DeletedStatus`, `CreatedDate`) VALUES
(2, 10, '5555555', 0, '2022-08-29 21:59:14'),
(3, 12, '9949961337', 0, '2022-09-01 05:10:04'),
(4, 12, '9949961337', 0, '2022-09-01 05:10:04');

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
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `UpdatedDate` varchar(50) NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production`
--

INSERT INTO `production` (`Production_ID`, `FPO_Registration_ID`, `CollectionCenter`, `SeasonName`, `CommodityName`, `CommodityCategory`, `VarietyName`, `Grade`, `Size`, `TotalQtyInMT`, `QtySoldInMT`, `QtyBalanceInMT`, `CropSpecification`, `FoodSaftyCertification`, `DeletedStatus`, `UpdatedDate`, `CreatedDate`) VALUES
(7, 10, 'Namakkal Collection Center', 'Winter', 'Fruits', 'Fruits', 'Banana', '15', '62', 15, 15, 15, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-09-09 15:34:53'),
(9, 10, 'Namakkal Collection Center', 'Winter', 'Vegetables', 'Vegetables', 'Potato', '13', '15', 51, 45, 7, 'Temperature In refer 13.5 degree', 'IndGAP', 0, '', '2022-09-09 15:50:15'),
(11, 10, 'Namakkal Collection Center', 'Winter', 'Nuts', 'Nuts', 'Cashews', '15', '62', 65, 60, 5, 'Temperature In refer 13.5 degree', 'NPOP Organic', 0, '', '2022-09-09 16:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `production_certifications`
--

CREATE TABLE `production_certifications` (
  `production_certification_id` int(100) NOT NULL,
  `Production_ID` int(100) NOT NULL,
  `certification_name` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
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
(20, 11, '1662719669-1213-DOC-nuts.png', 0, '2022-09-09 16:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `production_images`
--

CREATE TABLE `production_images` (
  `production_image_id` int(100) NOT NULL,
  `Production_ID` int(100) NOT NULL,
  `image_name` longtext NOT NULL,
  `DeletedStatus` int(50) NOT NULL DEFAULT 0,
  `CreatedDate` datetime NOT NULL DEFAULT current_timestamp()
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
(17, 11, '1662719870-9165-DOC-download.jpg', 0, '2022-09-09 16:07:50');

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
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `village_info`
--

INSERT INTO `village_info` (`id`, `Cluster_Registration_ID`, `VillageName`, `No_of_Villagers`, `Block_Taluk_Mandal`, `ClusterName`, `State`, `District`, `Distance_HQ_Kms`, `No_of_Farmers`, `CropSeason`, `CropType`, `CropName`, `Variety`, `Grade`, `ShowingMonth`, `Land_Under_Cultivation_in_Ha`, `Appoximate_Yield_per_Ha_in_MT`, `HarvestMonth`, `Expected_Quantity_in_MT`, `Marketable_Surplus_In_MT`, `Product_Procurement_Location`, `Market_Price_per_MT_Last_Season`, `FoodSeftyery`, `Upload_Food_Seftyery_Certifications`, `PaymentTerms`, `Video`, `Discription_Equipment`, `Activity`, `Operational_Status`, `Sq_ft`, `Capacity`, `Accreditation_Status`, `Logistic_facilities_for_Produce_transport`, `Agricultaral_Practices_Implimentation`, `Outage_Name`, `Outage_Address`, `Outage_Activity`, `Outage_Mobile`, `Outage_Email`, `Outage_Local_Challenges`, `Government_Facilities`, `Government_Institution_Name`, `Government_Facilities_Address`, `Government_facilities_contact_details`, `Export_Year`, `Export_qty`, `Export_amount_in_lakh`, `Export_countries`, `DeletedStatus`, `CreatedDate`) VALUES
(7, '7', 'Sonipat', '55', 'testing16', 'testing15', 'Karnataka', 'Bagalkot', 'testing15', '20', '1', 'Rabi', 'testing15', 'testing15', '50', 'September', '150000', '150000', '150000', '150000', '150000', '150000', '150000', 'No', 'slider.jpg', '150000', 'movie.mp4', 'Testing', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '                            ', '150000', '150000', '150000', '150000', '150000', '150000', '150000', '150000', 0, '2022-09-08 04:36:25'),
(8, '7', 'Amritsar', '20', 'testing15', 'testing152', 'Punjab', 'Amritsar', 'testing152', '21', 'test', 'Rabi', 'test', 'test', '16', 'October', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'Yes', 'et00334734-pprwynjffy-portrait.jpg', 'testtesttest', 'fpo_db (1).sql', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', '                            testing152testing152testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152', 'testing152testing152', 'testing152', 'testing152', 0, '2022-09-13 08:21:07'),
(10, '8', 'Bengtol', '15', 'Bengtol', 'CRD Pvt Ltd', 'Assam', 'Chirang', '15', '20', 'Tea', 'Kharif', 'test', '50', '50', 'January', '20', '20', '8', '55', '55', '55', '55', 'Yes', 'countries-compared-by-po.xls', 'No', 'countries-compared-by-po.xls', 'Testing', 'Testing', 'testing15', '500', '500', '500', '500', '500', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing                            ', 'Testing', 'Testing', 'Testing', '987654321', '2022', '55', '55', 'India', 0, '2022-09-15 11:37:07'),
(11, '0', 'Sonipat', '1', 'testing15', 'testing152', 'Delhi', '', '15', '', '', 'Kharif', 'test', 'test', 'test', 'January', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'Yes', 'fpo_db (2).sql', 'testtesttest', 'fpo_db (2).sql', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'Testing', 'testing152', '150000', 'Testing', 'Testing', 'Testing', '98786543210', 'Testing@gmail.com', 'lkajsdlfjalkd', 'testing152', 'Testing', 'Testing', '12345678960', '2013', '58', '7500000', 'India', 0, '2022-09-26 11:22:45'),
(12, '9', 'Agra', '965', 'Akbarpur', 'DPS Zone', 'Uttar Pradesh', 'Agra', '15', '', '', 'Kharif', 'Rice,Soybean', '50,20', 'A', 'June', '2', '20', 'November', '55', '55', '55', '55', 'Yes', 'fpo_db (1).sql', 'No', 'fpo_db (1).sql', 'Testing', 'Testing', 'Approved', '490.248', '500', 'Approved', '150000', '500', '150000', '150000', '150000', '150000', 'Testing@gmail.com', 'we want to purchase you whole kharif iteams', 'Purchase', 'Govt of UP', 'Govt of UP', '9876543210', '2014', '150000', '1500000', 'India', 0, '2022-09-26 11:25:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_profile`
--
ALTER TABLE `admin_profile`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  ADD PRIMARY KEY (`Buyer_Registration_ID`);

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
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`Farmer_Id`);

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
-- Indexes for table `village_info`
--
ALTER TABLE `village_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_profile`
--
ALTER TABLE `admin_profile`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buyer_registration`
--
ALTER TABLE `buyer_registration`
  MODIFY `Buyer_Registration_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cluster_collection_center`
--
ALTER TABLE `cluster_collection_center`
  MODIFY `Cluster_Collection_Center_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cluster_crop_calenders`
--
ALTER TABLE `cluster_crop_calenders`
  MODIFY `Cluster_Crop_Calender_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cluster_farmers`
--
ALTER TABLE `cluster_farmers`
  MODIFY `Cluster_Farmer_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cluster_production`
--
ALTER TABLE `cluster_production`
  MODIFY `Cluster_Production_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cluster_production_certifications`
--
ALTER TABLE `cluster_production_certifications`
  MODIFY `cluster_production_certification_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cluster_production_images`
--
ALTER TABLE `cluster_production_images`
  MODIFY `cluster_production_image_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cluster_registration`
--
ALTER TABLE `cluster_registration`
  MODIFY `Cluster_Registration_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cluster_supporting_information`
--
ALTER TABLE `cluster_supporting_information`
  MODIFY `cluster_supporting_information_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collection_center`
--
ALTER TABLE `collection_center`
  MODIFY `Collection_Center_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `crop_calenders`
--
ALTER TABLE `crop_calenders`
  MODIFY `Crop_Calender_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `Farmer_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `fpo_registration`
--
ALTER TABLE `fpo_registration`
  MODIFY `FPO_Registration_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fpo_registration_crops_cultivated`
--
ALTER TABLE `fpo_registration_crops_cultivated`
  MODIFY `fpo_registration_crops_cultivated_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fpo_registration_details`
--
ALTER TABLE `fpo_registration_details`
  MODIFY `fpo_registration_detail_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fpo_registration_mobileno`
--
ALTER TABLE `fpo_registration_mobileno`
  MODIFY `fpo_registration_mobileno_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fpo_registration_mobilenumber`
--
ALTER TABLE `fpo_registration_mobilenumber`
  MODIFY `fpo_registration_mobilenumber_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `production`
--
ALTER TABLE `production`
  MODIFY `Production_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `production_certifications`
--
ALTER TABLE `production_certifications`
  MODIFY `production_certification_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `production_images`
--
ALTER TABLE `production_images`
  MODIFY `production_image_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `village_info`
--
ALTER TABLE `village_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
