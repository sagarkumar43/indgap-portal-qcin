<?php
if (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off') {
       $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
       header("Location: $redirect_url");
       exit();
}
session_start();
error_reporting(0);
$Buyer_Registration_ID = $_SESSION['Buyer_Registration_ID'];
if ($Buyer_Registration_ID == '') {
    header("Location: buyer-login.php");
}
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Buyer Interested Commodities</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css">
    <link href="assets/css/buyer.css" rel="stylesheet">
    <style>
        .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
            width: 420px !important;
        }
    </style>
</head>

<body>
    <?php include "buyer-menu.php"; ?>
    <main id="main">
        <section id="hero">
            <div class="hero-container">
                <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade"
                    data-bs-ride="carousel">
                    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active" style="background: url(assets/img/slide/slider5.jpg)">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="background:url(assets/img/slide/slider2.jpg)">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="background:url(assets/img/slide/slide-1.jpg)">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="background:url(assets/img/slide/slide4.jpg)">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                        </a>
                        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                        </a>
                    </div>
                </div>
        </section>

        <div class="container register-box mt-5 mb-5">
            <form method="POST">
                <div class="section-title">
                    <h2>Buyer Interested Commodities</h2>
                </div>
                <div class="form-1">
                    <div class="row">
                        <div class="col-md-6 form-group mt-3">
                            <label class="mb-2">Category</label>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <label class="mb-2">Commodities</label>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <select class="selectpicker" aria-label="Default select example" data-live-search="true"
                                tabindex="null" id="inputCommodities" name="Category">
                                <option>--Select Category--</option>
                                <option value="Fruits">Fruits</option>
                                <option value="Vegetables">Vegetables</option>
                                <option value="Spices">Spices</option>
                                <option value="Pulses">Pulses</option>
                                <option value="Cereals">Cereals</option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group mt-3">
                            <!-- <select class="selectpicker" multiple="" aria-label="Default select example" data-live-search="true" tabindex="null" id="inputCategory">
                                <option value="">Select Commodities</option>
                                <option value="">Select Commodities</option>
                                <option value="">Select Commodities</option>
                                <option value="">Select Commodities</option>
                            </select> -->
                            <select name="Commodities[]" class="form-control" multiple=""
                                aria-label="Default select example" data-live-search="true" tabindex="null"
                                id="inputCategory">
                                <option value="">Select Category First</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-right pt-4">
                        <button type="reset" class="btn btn-danger">Cancel</button>
                        <input type="submit" value="Add" class="btn btn-success" name="AddIntereste">
                    </div>
            </form>

            <?php
                    if(isset($_POST['AddIntereste']))
                    {
                        $Category = $_POST['Category'];
                        $Commodities = implode(",",$_POST['Commodities']);

                        $interested = "INSERT INTO `buyer_interested_commodities` SET Category='$Category',Commodities='$Commodities',Buyer_Registration_ID='$Buyer_Registration_ID'";

                        $execute = mysqli_query($db,$interested);

                        if($execute == TRUE)
                        {
                            echo "<script>alert('Data Save Successfully')</script>";
                            echo "<script>window.location.href = 'interested-commodities.php'</script>";
                        }
                        else
                        {
                            echo "<script>alert('Oops! Something Wents Wrong! Please Try Again,')</script>";
                        }
                    }
                ?>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#example-includeSelectAllOption').multiselect({
                        includeSelectAllOption: true
                    });
                });
            </script>
            <div class="container mt-5">
                <div class="row">
                    <table class="table table-bordered">
                        <thead style="background-color: darkgreen;color: white;">
                            <tr>
                                <th>S.No.</th>
                                <th>Category</th>
                                <th>Commodities</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                            $select = "SELECT * FROM `buyer_interested_commodities` WHERE Buyer_Registration_ID='$Buyer_Registration_ID'";
                            $fetch = mysqli_query($db,$select);
                            $count = 1;
                            while($read = mysqli_fetch_assoc($fetch))
                            {
                        ?>
                        <tbody>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $read['Category'] ?></td>
                                <td><?php echo $read['Commodities'] ?></td>
                                <td>
                                    <!-- <a onclick="return confirm('Are you sure want to delete?')" href="delete_interested-commodities.php?deleterecord=<?php echo $read['Id']; ?>"><i class="bi-trash"></i></a> -->
                                   <div class="row">
                                        <div class="col-md-6">
                                            <a onclick="return confirm('Are you sure want to edit?')" href="edit_interested-commodities.php?editrecord=<?php echo $read['Id']; ?>"><i class="bi-pencil"></i></a>
                                        </div>

                                        <div class="col-md-6">
                                            <a onclick="return confirm('Are you sure want to delete?')" href="delete_interested-commodities.php?deleterecord=<?php echo $read['Id']; ?>"><i class="bi-trash"></i></a>
                                        </div>
                                   </div>
                                </td>
                        </tbody>
                        <?php $count++; } ?>
                    </table>
                </div>
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
        var Fruits = ["Apple", "Apricot", "Avocado", "Banana", "Blackberry", "Blueberry", "Cherry", "Coconut", "Fig", "Grapefruit", "Grapes", "Kiwi", "Lemon", "Lime", "Mango", "Orange", "Papaya", "Passion Fruit", "Peach", "Pear", "Pineapple", "Plum", "Pomegranate", "Raspberry", "Strawberry", "Tangerine", "Watermelon"];

        var Vegetables = ["Artichoke", "Arugula", "Asparagus", "Bell Peppers", "Beet Greens", "Beetroot", "Bok Choy", "Broccoli", "Broccoli Rabe (Rapini)", "Brussels Sprouts", "Butternut Squash", "Cabbage (Green)", "Cabbage (Red)", "Carrots", "Cauliflower", "Celery", "Chives", "Collard Greens", "Crookneck Squash", "Daikon Radish", "Dandelion Greens", "Eggplant", "Endive", "Garlic", "Green Onion (Spring Onion)", "Jicama", "Kale", "Kimchi", "Kohlrabi", "Leeks", "Lettuce", "Mushrooms", "Mustard Greens", "Okra", "Onions (Red)", "Onions (Yellow)", "Parsnips", "Potatoes", "Pumpkin", "Purple Sweet Potato", "Radicchio", "Radish", "Swede (Rutabaga)", "Sauerkraut", "Seaweed", "Shallots", "Spaghetti Squash", "Spinach", "Sweet Potatoes", "Swiss Chard", "Tomatillo", "Tomatoes", "Turnips", "Watercress", "Water Chestnut", "Zucchini"];

        var Spices = ["Asafetida", "Basil Seeds", "Bay Leaf", "Black Cardamom", "Black Cumin", "Black Pepper", "Brown Mustard", "Cardamom", "Carom Seeds", "Cassia Bark", "Cinnamon", "Cloves", "Coriander Powder", "Coriander Seeds", "Cumin", "Curry Leaves", "Dried Mango Powder", "Fennel Seeds", "Fenugreek leaves", "Fenugreek Seeds", "Garam Masala", "Garlic", "Ginger", "Ginger Powder", "Gooseberry Grass Powder", "Holy Basil", "Mace", "Mint", "Mustard Seeds", "Nutmug", "Pomegranate Seeds", "Poppy Seeds", "Red Chilli", "Red Papper", "Saffron", "Sesame Seeds", "Star Anise", "Tamarind", "Turmeric"];

        var Pulses = ["Adzuki Beans", "Bengal Gram", "Black Chickpea", "Black Gram", "Chickpeas", "Garbanzo Beans", "Green Gram", "Green Pigeon Peas", "Horse Gram", "RedGram", "Turkish Gram", "White Peas", "White Urad Dal", "Yellow Pigeon Peas"];

        var Cereals = ["Maize", "Barley", "Millet", "Oat", "Paddy", "Rye And Triticale", "Sorghum", "Wheat"];

        $("#inputCommodities").change(function () {
            var StateSelected = $(this).val();

            var optionsList;

            var htmlString = "";
            switch (StateSelected) {

                case "Fruits":

                    optionsList = Fruits;

                    break;

                case "Vegetables":

                    optionsList = Vegetables;

                    break;

                case "Spices":

                    optionsList = Spices;

                    break;

                case "Pulses":

                    optionsList = Pulses;

                    break;

                case "Cereals":

                    optionsList = Cereals;

                    break;

            }
            for (var i = 0; i < optionsList.length; i++) {
                htmlString = htmlString + "<option value='" + optionsList[i] + "'>" + optionsList[i] + "</option>";
            }
            $("#inputCategory").html(htmlString);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="assets/js/buyer.js"></script>
</body>

</html>