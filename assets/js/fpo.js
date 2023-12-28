function add_gross() {
    var count = 1;
    count = count + $('#employee_table').length;
    document.querySelector('.row').insertAdjacentHTML(
        `afterend`, `<div class="row" id="row` + count + `"><hr class="mt-3"><div class="col-md-4 form-group mt-3" id="row"><label class="mb-2" style="float: left;">Crop Name</label><input value="" name="GrossRevenue_CropName[]" type="text" placeholder="Crop Name" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Year</label><select class="form-control" name="GrossRevenue_Year[]" style="height: 50px;margin-top: 40px !important;"><option value="">Select</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option  value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option  value="2028">2028</option><option  value="2029">2029</option><option value="2030">2030</option></select></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Crop Variety</label><input value="" name="GrossRevenue_CropVariety[]" type="text" placeholder="Crop variety"/></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Quantity (MT)</label><input value="" name="GrossRevenue_QuantityMT[]" type="number" placeholder="Quantity (MT)" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Revenue (in Lakhs)</label><input value="" name="GrossRevenue_RevenueinLakhs[]" type="text" placeholder="Revenue (in Lakhs)" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Market Place</label><input value="" name="GrossRevenue_MarketPlace[]" type="text"placeholder="Market Place" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Average Price Per MT</label><input value="" name="GrossRevenue_AveragePricePerMT[]"type="text" placeholder="Average Price" /></div><div class="col-md-4 mt-5"><input type="button" class="btn btn-danger mt-3" value="DELETE" onclick=delete_gross('row` + count + `')></div></div>`
    )
}

function delete_gross(count) {
    $('#' + count).remove();
}

function add_warehouse() {
    var count1 = 1;
    count1 = count1 + $('#warehouse_section').length;
    document.querySelector('#warehouse_row1').insertAdjacentHTML(
        `afterend`, `<div class="row" id="warehouse_row` + count1 + `"><hr class="mt-3"><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Year of Setup</label><select class="form-control" name="Warehouse_YearofSetup[]" style="height: 50px;margin-top: 40px !important;"><option value="">Select</option><option  value="2015">2015</option><option  value="2016">2016</option><option value="2017">2017</option><option  value="2018">2018</option><option  value="2019">2019</option><option  value="2020">2020</option><option  value="2021">2021</option><option value="2022">2022</option><option  value="2023">2023</option><option  value="2024">2024</option><option  value="2025">2025</option><option  value="2026">2026</option><option  value="2027">2027</option><option  value="2028">2028</option><option  value="2029">2029</option><option  value="2030">2030</option></select></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Area(in Sqft)</label><input value="" name="Warehouse_AreainSqft[]" type="text"placeholder="Area(in Sqft)" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Capacity(in mt)</label><input value="" name="Warehouse_Capacityinmt[]" type="text" placeholder="Capacity(in mt)" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Owned or Leased</label><input value="" name="Warehouse_OwnedorLeased[]" type="text" placeholder="Owned or Leased " /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Accredeation Status</label><input value="" name="Warehouse_AccredeationStatus[]" type="text" placeholder="Accredeation Status"/> </div><div class="col-md-4 mt-5"><input type="button" class="btn btn-danger mt-3" value="DELETE" onclick=delete_warehouse('warehouse_row` + count1 + `')></div></div>`
    )
}

function delete_warehouse(count1) {
    $('#' + count1).remove();
}

function add_equipment() {
    var count2 = 1;
    count2 = count2 + $('#euipment').length;
    document.querySelector('#euipmentid1').insertAdjacentHTML(
        `afterend`, `<div class="row" id="euipmentid` + count2 + `"><hr class="mt-3"><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Activity</label><input value="" name="Procesing_Equipment_Activity[]" type="text" placeholder="Activity" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Operational Status</label><input value=""name="Procesing_Equipment_Operational_Status[]" type="text" placeholder="Operational Status" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Value Rs in Lakhs</label><input value="" name="Procesing_Equipment_ValueRsinLakhs[]" type="text" placeholder="Value Rs in Lakhs" /></div><div class="col-md-6 form-group mt-3"><label class="mb-2" style="float: left;">Discription</label><input value="" name="Procesing_Equipment_Discription[]" type="text" placeholder="Discription" /></div><div class="col-md-6 mt-5"><input type="button" class="btn btn-danger mt-3" value="DELETE" onclick=delete_equipment('euipmentid` + count2 + `')></div></div>`
    )
}

function delete_equipment(count2) {
    $('#' + count2).remove();
}

function add_farm_equipment() {
    var count3 = 1;
    count3 = count3 + $('#farm_euipment').length;
    document.querySelector('#farm_euipment1').insertAdjacentHTML(
        `afterend`, `<div class="container" id="farm_euipment"><div class="row" id="farm_euipment` + count3 + `"><hr class="mt-3"><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Activity</label><input value="" name="Farm_Equipment_Activity[]"type="text" placeholder="Activity" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Operational Status</label><input value="" name="Farm_Equipment_OperationalStatus[]" type="text" placeholder="Operational Status" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Value Rs in Lakhs</label><input value="" name="Farm_Equipment_ValueRsinLakhs[]" type="text" placeholder="Value Rs in Lakhs" /></div><div class="col-md-6 form-group mt-3"><label class="mb-2" style="float: left;">Discription</label><input value="" name="Farm_Equipment_Discription[]" type="text" placeholder="Discription" /></div><div class="col-md-6 mt-5"><input type="button" class="btn btn-danger mt-3" value="DELETE" onclick=delete_equipment('farm_euipment` + count3 + `')></div></div></div>`
    )
}

function delete_equipment(count3) {
    $('#' + count3).remove();
}

function add_credit_facilities() {
    var count4 = 1;
    count4 = count4 + $('#credit_facilities').length;
    document.querySelector('#credit_facilities1').insertAdjacentHTML(
        `afterend`, `<div class="container" id="credit_facilities"><div class="row" id="credit_facilities` + count4 + `"><hr class="mt-3"><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Bank</label><input value="" name="Credit_Facilities_Availed_Bank[]" type="text" placeholder="Bank" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Facility Type</label><input value="" name="Credit_Facilities_Availed_FacilityType[]" type="text" placeholder="Facility Type" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Amount Released (Rs)</label><input value="" name="Credit_Facilities_Availed_AmountReleasedRs[]" type="text" placeholder="Amount Released" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Amount Outstanding (Rs)</label><input value="" name="Credit_Facilities_Availed_AmountOutstandingRs[]" type="text" placeholder="Amount outstanding(in lakhs) " /></div><div class="col-md-6 form-group mt-3"><label class="mb-2" style="float: left;">Operation Status (Regular/Irregular)</label><input value="" name="Credit_Facilities_Availed_OperationStatusRegularIrregular[]" type="text" placeholder="Operation Status (Regular/Irregular )" /></div><div class="col-md-2 form-group mt-5"><input type="button" class="btn btn-danger mt-3" value="DELETE" onclick=delete_equipment('credit_facilities` + count4 + `')></div></div></div>`
    )
}

function delete_equipment(count4) {
    $('#' + count4).remove();
}

function add_market_linkage() {
    var count5 = 1;
    count5 = count5 + $('#market_linkage').length;
    document.querySelector('#market_linkage1').insertAdjacentHTML(
        `afterend`, `<div class="row" id="market_linkage` + count5 + `"><hr class="mt-3"><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Season </label><input value="" name="Market_Linkage_Season[]" type="text" placeholder="Harvest Month" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Crop Name </label><input value="" name="Market_Linkage_CropName[]" type="text" placeholder="Harvest Month" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Variety</label><input value="" name="Market_Linkage_Variety[]" type="text" placeholder="Harvest Month" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Grade</label><input value="" name="Market_Linkage_Grade[]" type="text" placeholder="Harvest Month" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Harvest Month </label><select class="form-control" name="Market_Linkage_HarvestMonth[]" style="height: 50px;margin-top: 40px !important;"><option value="">Select</option><option value='January'>January</option><option value='February'>February</option><option value='March'>March</option><option value='April'>April</option><option value='May'>May</option><option value='June'>June</option><option value='July'>July</option><option value='August'>August</option><option value='September'>September</option><option value='October'>October</option><option value='November'>November</option><option value='December'>December</option></select></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Quntaty Sold(in mt) </label><input value="" name="Market_Linkage_QuntatySoldinmt[]" type="text" placeholder="Quntaty Sold(in mt)" /></div><div class="col-md-6 form-group mt-3"><label class="mb-2" style="float: left;">Product Image </label><input value="" name="Market_Linkage_ProductImage[]" type="file" placeholder="Product Image" /></div><div class="col-md-6 form-group mt-3"><label class="mb-2" style="float: left;">Product Delivery Location </label><input value="" name="Market_Linkage_ProductDeliveryLocation[]" type="text" placeholder="Product Image" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Market Place</label><input value="" name="Market_Linkage_MarketPlace[]" type="text" placeholder="Market Place" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Food Safety Certification Status</label><select class="form-control" name="Market_Linkage_FoodSafetyCertificationStatus[]" style="height: 50px;margin-top: 40px !important;"><option value="Yes">Yes</option><option value="No">No</option></select></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Upload Certificate</label><input name="Market_Linkage_UploadCertificate[]" type="file" placeholder="" /></div><div class="col-md-4 form-group mt-3"><label class="mb-2" style="float: left;">Term and Conditions</label><input name="Market_Linkage_TermandConditions[]" type="file" placeholder="" /><input type="button" class="btn btn-danger mt-3" value="DELETE" onclick=delete_market_linkage('market_linkage` + count5 + `')></div></div>`
    )
}
function delete_market_linkage(count5) {
    $('#' + count5).remove();
}
$(document).ready(function() {
    var base_color = "rgb(230,230,230)";
    var active_color = "rgb(237, 40, 70)";
    var child = 1;
    var length = $("section").length - 1;
    $("#prev").addClass("disabled");
    $("#submit").addClass("disabled");
    $("section").not("section:nth-of-type(1)").hide();
    $("section").not("section:nth-of-type(1)").css('transform', 'translateX(100px)');
    var svgWidth = length * 200 + 24;
    $("#svg_wrap").html('<svg version="1.1" id="svg_form_time" xmlns="" xmlns:xlink="" x="0px" y="0px" viewBox="0 0 ' +
        svgWidth +' 24" xml:space="preserve"></svg>'
    );
    function makeSVG(tag, attrs) {
        var el = document.createElementNS("", tag);
        for (var k in attrs) el.setAttribute(k, attrs[k]);
        return el;
    }
    for (i = 0; i < length; i++) {
        var positionX = 12 + i * 200;
        var rect = makeSVG("rect", {
            x: positionX,
            y: 9,
            width: 200,
            height: 6
        });
        document.getElementById("svg_form_time").appendChild(rect);
        var circle = makeSVG("circle", {
            cx: positionX,
            cy: 12,
            r: 12,
            width: positionX,
            height: 6
        });
        document.getElementById("svg_form_time").appendChild(circle);
    }
    var circle = makeSVG("circle", {
        cx: positionX + 200,
        cy: 12,
        r: 12,
        width: positionX,
        height: 6
    });
    document.getElementById("svg_form_time").appendChild(circle);
    $('#svg_form_time rect').css('fill', base_color);
    $('#svg_form_time circle').css('fill', base_color);
    $("circle:nth-of-type(1)").css("fill", active_color);
    $(".button").click(function() {
        $("#svg_form_time rect").css("fill", active_color);
        $("#svg_form_time circle").css("fill", active_color);
        var id = $(this).attr("id");
        if (id == "next") {
            $("#prev").removeClass("disabled");
            if (child >= length) {
                $(this).addClass("disabled");
                $('#submit').removeClass("disabled");
            }
            if (child <= length) {
                child++;
            }
        } else if (id == "prev") {
            $("#next").removeClass("disabled");
            $('#submit').addClass("disabled");
            if (child <= 2) {
                $(this).addClass("disabled");
            }
            if (child > 1) {
                child--;
            }
        }
        var circle_child = child + 1;
        $("#svg_form_time rect:nth-of-type(n + " + child + ")").css(
            "fill",
            base_color
        );
        $("#svg_form_time circle:nth-of-type(n + " + circle_child + ")").css(
            "fill",
            base_color
        );
        var currentSection = $("section:nth-of-type(" + child + ")");
        currentSection.fadeIn();
        currentSection.css('transform', 'translateX(0)');
        currentSection.prevAll('section').css('transform', 'translateX(-100px)');
        currentSection.nextAll('section').css('transform', 'translateX(100px)');
        $('section').not(currentSection).hide();
    });
});