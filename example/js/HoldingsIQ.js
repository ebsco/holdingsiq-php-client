

function HoldingsIQ() {


    // ===============================================================================================================
    //                                              VENDORS
    // ===============================================================================================================
    HoldingsIQ.prototype.showVendorSearch = function() {
        $("#vendorSearchForm").show();
        $("#vendorResults").show();
        $("#vendorDetails").show();
        $("#vendorResultsHeading").show();
        $("#vendorDetailsHeading").show();

        this.hidePackagesUI();

        $("#titleSearchForm").hide();
        $("#titleResults").hide();
        $("#titleDetailsColumn").hide();
        $("#titleResultsHeading").hide();
        $("#titleDetailsHeading").hide();
    };

    HoldingsIQ.prototype.getVendors = function() {

        $("#vendorDetails").hide();
        $("#vendorResults").hide();
        $("#resultsLoader").addClass("active");

        var query = $("#vendorQuery").val() || null;
        query = encodeURIComponent(query);
        var orderby = $("input[name='vendorsort']:checked").val() || 'relevance';
        var count = 100;
        var offset = 1;
        var url = `php-clients/vendors/getVendors.php?q=${query}&orderby=${orderby}&count=${count}&offset=${offset}`;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    var result_count = data.totalResults;
                    result_count = numberWithCommas(result_count);
                    var result_text = result_count + " providers found:";
                    if (result_count === 1) result_text = result_count + " provider found:";
                    if (result_count === 0) result_text = "No providers found.";
                    // $("#totalVendorResults").text(result_text);
                    $("#vendorResultsHeading").text("Providers ("+result_count+")");
                    $("#vendorResultsList").empty();
                    if (data.totalResults > 0) {
                        $.each( data.vendors, function( i, vendor ) {
                            var result_item =
                                "<div class=\"item left aligned\">\n" +
                                "   <div class=\"content\">\n" +
                                "       <a onclick='hiq.getVendorDetails(" + vendor.vendorId + ");' class=\"header\">" + vendor.vendorName + "</a>\n" +
                                "       <div class=\"description\">" + vendor.packagesSelected + "/" + vendor.packagesTotal + " Packages</div>\n" +
                                "   </div>\n" +
                                "</div>";
                            $("#vendorResultsList").append(result_item);
                        });
                    } else {
                        var result_item =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div class=\"description\">No Providers found.</div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#vendorResultsList").append(result_item);
                    }

                    $("#resultsLoader").removeClass("active");
                    $("#vendorResults").show();
                });
        })();
    };

    HoldingsIQ.prototype.getVendorDetails = function(id) {
        // fetch and display vendor details
        $("#vendorDetails").hide();
        $("#detailsLoader").addClass("active");
        (function () {
            $.getJSON("php-clients/vendors/getVendorDetails.php?id=" + id)
                .done(function (data) {

                    $("#providerInfoList").empty();
                    $("#providerSettingsList").empty();
                    $("#vendorDetailName").text(data.vendorName);

                    var p_selected =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Packages selected: <strong>" + data.packagesSelected + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#providerInfoList").append(p_selected);

                    var p_total =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Total packages: <strong>" + data.packagesTotal + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#providerInfoList").append(p_total);

                    var proxy =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Proxy: <strong>Inherited = " + data.proxy.inherited + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#providerSettingsList").append(proxy);

                    if (typeof data.vendorToken !== 'undefined') {
                        var tokenPrompt = (typeof data.vendorToken.prompt !== 'undefined') ? data.vendorToken.prompt + ":" : "";
                        var tokenValue = (typeof data.vendorToken.value !== 'undefined') ? data.vendorToken.value : "";
                        var token =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>Provider token: <strong>" + tokenPrompt + tokenValue + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#providerSettingsList").append(token);
                    }
                });
        })();
        this.getVendorPackages(id);

    };

    HoldingsIQ.prototype.getVendorPackages = function(id) {
        // fetch and display vendor packages
        (function () {
            $.getJSON("php-clients/vendors/getVendorPackages.php?id=" + id)
                .done(function (data) {
                    $("#packageList").empty();
                    $.each( data.packagesList, function( i, package ) {
                        var selectedText = "Not selected";
                        if (package.isSelected) { selectedText = "Selected"; }
                        var result_item =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <a onclick='' class=\"header\">" + package.packageName + "</a>\n" +
                            "       <div class=\"description\">" + selectedText + " - " + package.selectedCount + "/" + package.titleCount + " Titles</div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#packageList").append(result_item);
                    });
                    // hide loader, show results
                    $("#detailsLoader").removeClass("active");
                    $("#vendorDetails").show();
                    $("#vendorDetailAccordians").show();
                });
        })();
    };

    // ===============================================================================================================
    //                                              PACKAGES
    // ===============================================================================================================
    HoldingsIQ.prototype.showPackageSearch = function() {
        $("#packageSearchForm").show();
        $("#packageResults").show();
        $("#packageResultsHeading").show();
        $("#packageDatatable_wrapper").show();
        $("#packageDetailsColumn").show();
        $("#packageDetailsHeading").show();

        $("#vendorSearchForm").hide();
        $("#vendorResults").hide();
        $("#vendorDetails").hide();
        $("#vendorResultsHeading").hide();
        $("#vendorDetailsHeading").hide();

        $("#titleSearchForm").hide();
        $("#titleResults").hide();
        $("#titleDetailsColumn").hide();
        $("#titleResultsHeading").hide();
        $("#titleDetailsHeading").hide();
    };


    HoldingsIQ.prototype.hidePackagesUI = function() {
        // search column
        $("#packageSearchForm").hide();
        // results column
        $("#packageResults").hide();
        $("#packageResultsHeading").hide();
        // $("#newCustomPackage").hide();
        $("#newCustomPackageSuccess").hide();
        // details column
        $("#packageDetailsColumn").hide();
        $("#packageDetailsHeading").hide();
    };

    HoldingsIQ.prototype.getPackages = function() {

        // $("#newCustomPackage").hide();
        $("#newCustomPackageSuccess").hide();
        $("#packageDetails").hide();
        $("#packageResults").hide();
        $("#resultsLoader").addClass("active");

        var query = $("#packageQuery").val() || null;
        query = encodeURIComponent(query);
        var orderby = $("input[name='packagesort']:checked").val() || 'relevance';
        var selection = $("input[name='packageSelection']:checked").val() || 'all';
        var contenttype = $("input[name='packageContentType']:checked").val() || 'all';
        var count = 20;
        var offset = 1;
        var url = `php-clients/packages/getPackages.php?q=${query}&orderby=${orderby}&count=${count}&offset=${offset}&selection=${selection}&contenttype=${contenttype}`;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    var result_count = data.totalResults;
                    result_count = numberWithCommas(result_count);
                    $("#packageResultsText").text("Packages ("+result_count+")");

                    if (data.totalResults > 0) {
                        $("#packagesNotFound").remove();
                        // paginated datatable
                        var datatablesUrl = `php-clients/packages/getPackagesDatatable.php?q=${query}&orderby=${orderby}&count=${count}&offset=${offset}&selection=${selection}&contenttype=${contenttype}`;
                        $("#packageDatatable").DataTable().destroy();
                        $('#packageDatatable').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "searching": false,
                            "ordering": false,
                            "info": false,
                            "lengthChange": false,
                            "pageLength": 20,
                            "paging": true,
                            "ajax": datatablesUrl
                        } );
                        $('#packageDatatable_paginate').css("position", "absolute");
                        $('#packageDatatable_paginate').css("left", "-200px");
                        $("#resultsLoader").removeClass("active");
                        $("#packageResults").show();
                        $('#packageDatatable').show();
                    } else {
                        $('#packageDatatable').hide();
                        $('#packageDatatable_paginate').hide();
                        var result_item =
                            "<div id=\"packagesNotFound\" class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div class=\"description\">No Packages found.</div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#packagesNotFound").remove();
                        $("#packageResults").append(result_item);
                        $("#resultsLoader").removeClass("active");
                        $("#packageResults").show();
                    }
                });
        })();

    };

    // PACKAGE DETAILS
    HoldingsIQ.prototype.getPackageDetails = function(vid, pid) {
        $("#packageDetails").hide();
        $("#deleteCustomPackageSuccess").hide();
        $("#editCustomPackageSuccess").hide();
        $("#editCustomPackage").hide();
        $("#detailsLoader").addClass("active");
        (function () {
            $.getJSON("php-clients/packages/getPackageDetails.php?vid=" + vid + "&pid=" + pid)
                .done(function (data) {

                    $("#packageDetailName").text(data.packageName);
                    $("#editCustomPackageName").val(data.packageName);

                    // hidden package id
                    $("#packageDetailId").text(data.packageId);

                    $("#packageHoldingStatus").empty();
                    var selectedText = "Not selected";
                    if (data.isSelected) { selectedText = "Selected" };
                    var holding_status =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div><strong>" + selectedText + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#packageHoldingStatus").append(holding_status);

                    // display add to holdings button if not currently selected
                    if (!data.isSelected) {
                        var selectButton = "<button id=\"selectPackageButton\"\n" +
                            "                        onclick=\"hiq.selectPackage(" + vid + ", " + pid + ");\"\n" +
                            "                        class=\"mini ui blue button\">\n" +
                            "                    <i class=\"check icon\"></i>\n" +
                            "                    Add to holdings\n" +
                            "                </button>\n";
                        $("#packageHoldingStatus").append(selectButton);
                    }

                    // set isSelected in edit form
                    $("#editPackageSelectedCheckbox").prop('checked', data.isSelected);

                    $("#packageInformation").empty();
                    var provider =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Provider: <strong>" + data.vendorName + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    var titles_selected =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Titles selected: <strong>" + data.selectedCount + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    var total_titles =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Total titles: <strong>" + data.titleCount + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    var content_type =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Content type: <strong>" + data.contentType + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    var package_type =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Package type: <strong>" + data.packageType + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    var package_id =
                        "<div style='display: none;' id='currentPackageId'>" + data.packageId + "</div>\n";

                    $("#packageInformation").append(provider);
                    $("#packageInformation").append(titles_selected);
                    $("#packageInformation").append(total_titles);

                    $("#packageInformation").append(content_type);
                    $("#editCustomPackageContentTypeDropdown").dropdown('set selected', data.contentType);

                    $("#packageInformation").append(package_type);
                    $("#packageInformation").append(package_id);

                    $("#packageSettings").empty();
                    var showTitlesText = "Yes";
                    if (data.visibilityData.isHidden) { showTitlesText = "No" };
                    var show_titles =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Show titles in package to patrons: <strong>" + showTitlesText + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    var autoSelectTitlesText = "No";
                    if (data.allowEbscoToAddTitles) { autoSelectTitlesText = "Yes" };
                    var auto_select_titles =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Automatically select new titles: <strong>" + autoSelectTitlesText + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    var proxy =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Proxy: <strong>Inherited = " + data.proxy.inherited + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#packageSettings").append(show_titles);
                    $("#packageSettings").append(auto_select_titles);
                    $("#packageSettings").append(proxy);

                    // set title visibility in edit form
                    $("#editPackageShowTitlesCheckbox").prop('checked', !data.visibilityData.isHidden);

                    if (typeof data.vendorToken !== 'undefined') {
                        var tokenPrompt = (typeof data.vendorToken.prompt !== 'undefined') ? data.vendorToken.prompt + ":" : "";
                        var tokenValue = (typeof data.vendorToken.value !== 'undefined') ? data.vendorToken.value : "";
                        var token =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>Provider token: <strong>" + tokenPrompt + tokenValue + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#packageSettings").append(token);
                    }
                    // custom coverage
                    $("#packageDetailCoverage").empty();
                    var no_custom_coverage =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>No custom coverage dates set.</div>\n" +
                        "   </div>\n" +
                        "</div>";
                    if (data.customCoverage.beginCoverage !== "" || data.customCoverage.endCoverage !== "") {
                        var custom_begin_coverage =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>Custom begin coverage: <strong>" + data.customCoverage.beginCoverage + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        var custom_end_coverage =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>Custom end coverage: <strong>" + data.customCoverage.endCoverage + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#packageDetailCoverage").append(custom_begin_coverage);
                        $("#packageDetailCoverage").append(custom_end_coverage);

                        // set edit form values
                        $("#editCustomPackageStartDate").val(data.customCoverage.beginCoverage);
                        $("#editCustomPackageEndDate").val(data.customCoverage.endCoverage);

                    } else {
                        $("#packageDetailCoverage").append(no_custom_coverage);
                    }

                    // show or hide delete & edit custom package button?
                    if( data.packageType === 'Custom') {
                        $("#selectPackageButton").hide();
                        $("#deleteCustomPackageButton").show();
                        $("#editCustomPackageButton").show();
                    } else {
                        $("#selectPackageButton").show();
                        $("#deleteCustomPackageButton").hide();
                        $("#editCustomPackageButton").hide();
                    }

                });
        })();
        this.getPackageTitles(vid, pid);
    };

    HoldingsIQ.prototype.getPackageTitles = function(vid, pid) {
        (function () {
            $.getJSON("php-clients/packages/getPackageTitles.php?vid=" + vid + "&pid=" + pid)
                .done(function (data) {
                    $("#packageTitlesList").empty();
                    if (data.totalResults > 0) {
                        $.each( data.titles, function( i, title ) {
                            var selectedText = "Not selected";
                            if (title.customerResourcesList[0].isSelected) { selectedText = "Selected"; }
                            var result_item =
                                "<div class=\"item left aligned\">\n" +
                                "   <div class=\"content\">\n" +
                                "       <a onclick='' class=\"header\">" + title.titleName + "</a>\n" +
                                "       <div class=\"description\">" + selectedText + "</div>\n" +
                                "   </div>\n" +
                                "</div>";
                            $("#packageTitlesList").append(result_item);
                        });
                    } else {
                        var result_item =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div class=\"description\">No titles found.</div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#packageTitlesList").append(result_item);
                    }
                    $("#detailsLoader").removeClass("active");
                    $("#packageDetailAccordians").show();
                    $("#packageDetails").show();
                });
        })();
    };

    HoldingsIQ.prototype.showNewCustomPackage = function() {

        $("#newCustomPackageModal").modal('show');
        // $("#newCustomPackage").show();

        $("#newCustomPackageSuccess").hide();
        // $("#packageDatatable_wrapper").hide();

    };

    HoldingsIQ.prototype.submitNewCustomPackage = function() {
        var name = $("#customPackageName").val() || null;
        var contentType = $("#customPackageContentType").val() || null;
        var dateRanges = $('div[name="packageDateRange"]');
        //console.log('dateRanges', dateRanges);

        var dateRangeArray = [];
        for (var i=0; i < dateRanges.length; i++) {
            var range = dateRanges[i];
            var start = range.querySelectorAll('[name=customPackageStartDate]')[0].value;
            var end = range.querySelectorAll('[name=customPackageEndDate]')[0].value;
            dateRangeArray.push('{ "beginCoverage": "' + start + '", "endCoverage": "' + end + '" }')
        }
        var dateRangeJson = "[" + dateRangeArray.join(", ") + "]";
        var jsonRequest = '{ "packageName": "' + name + '", "contentType": "' + contentType + '", "customCoverage": ' + dateRangeJson + ' }';
        var requestBody = encodeURIComponent(jsonRequest);

        var packageId = null;
        var vendorId = null;
        $("#newCustomPackage").addClass("loading");
        var url = `php-clients/packages/createCustomPackage.php?body=${requestBody}`;
        var self = this;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    // show details of new package
                    packageId = data.packageId;
                    vendorId = data.vendorId;
                    self.getPackageDetails(vendorId, packageId);
                    // remove form, loading, show success message
                    $("#newCustomPackage").removeClass("loading");
                    // $("#newCustomPackage").hide();
                    self.resetCustomPackageForm();
                    $("#newCustomPackageSuccess").show();
                });
        })();
    };

    HoldingsIQ.prototype.cancelNewCustomPackage = function() {
        this.resetCustomPackageForm();
        $("#newCustomPackage").removeClass("loading");
        // $("#newCustomPackage").hide();
        $("#newCustomPackageModal").modal('hide');
        $("#packageDetails").show();
        $("#packageResults").show();
        $('#packageDatatable').show();
        $("#packageDatatable_wrapper").show();
    };

    HoldingsIQ.prototype.resetCustomPackageForm = function() {
        $("#customPackageName").val('');
        $("#customPackageContentTypeDropdown").dropdown('clear');
        $('input[name="customPackageStartDate"]').val('');
        $('input[name="customPackageEndDate"]').val('');
    };

    HoldingsIQ.prototype.addNewCustomPackageDateRange = function() {

        var rangeInput =
            '           <div style="margin-top: 12px;" class="field">\n' +
            '            <div name="packageDateRange" class="two fields">\n' +
            '                <div class="field">\n' +
            '                    <div class="ui calendar" id="rangestart">\n' +
            '                        <div class="ui input left icon">\n' +
            '                            <i class="calendar icon"></i>\n' +
            '                            <input name="customPackageStartDate" type="text" placeholder="Start date">\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="field">\n' +
            '                    <div class="ui calendar" id="rangeend">\n' +
            '                        <div class="ui input left icon">\n' +
            '                            <i class="calendar icon"></i>\n' +
            '                            <input name="customPackageEndDate" type="text" placeholder="End date">\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '              <!-- <div class="circular ui icon button" onclick="$(this).parent().parent().remove();"><i class="trash alternate outline icon"></i></div> -->\n' +
            '              </div>\n' +
            '            </div>';

        $("#packageCoverage").append(rangeInput);
        $('.ui.calendar').calendar({
            type: 'date',
            formatter: {
                date: function (date, settings) {
                    if (!date) return '';
                    var day = ('0' + date.getDate()).slice(-2);
                    var month = ('0' + (date.getMonth()+1)).slice(-2);
                    var year = date.getFullYear();
                    return year + '-' + month + '-' + day;
                }
            }
        });

    };

    HoldingsIQ.prototype.confirmDeleteCustomPackage = function() {
        $("#confirmDeleteCustomPackage").modal('setting', 'closable', false).modal('show');
    };

    HoldingsIQ.prototype.deleteCustomPackage = function() {
        var pid =  $("#currentPackageId").text();
        //console.log('current pid', pid);
        var url = `php-clients/packages/deleteCustomPackage.php?packageId=${pid}`;
        $("#detailsLoader").addClass("active");
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    console.log('delete package', data);
                    $("#detailsLoader").removeClass("active");
                    // show success message, hide edit-delete buttons
                    $("#deleteCustomPackageSuccess").show();
                    $("#deleteCustomPackageButton").hide();
                    $("#editCustomPackageButton").hide();
                    // empty all of the details
                    var deletedPackageTitle = '<h2><s>' + $("#packageDetailName").text() + '</s></h2>';
                    $("#packageDetailName").empty().append(deletedPackageTitle);
                    $("#packageHoldingStatus").empty();
                    $("#packageInformation").empty();
                    $("#packageSettings").empty();
                    $("#packageDetailCoverage").empty();
                    $("#packageTitlesList").empty();
                });
        })();
    };

    HoldingsIQ.prototype.showEditCustomPackage = function() {
        $("#editCustomPackageModal").modal('show');
        $("#editCustomPackage").show();
        $("#editCustomPackageSuccess").hide();
    };

    HoldingsIQ.prototype.submitEditCustomPackage = function() {
        var name = $("#editCustomPackageName").val() || null;
        var packageId = $("#packageDetailId").text();
        var contentType = $("#editCustomPackageContentType").val() || null;
        var isHidden = !$("#editPackageShowTitlesCheckbox").prop('checked');
        var isSelected = $("#editPackageSelectedCheckbox").prop('checked');
        var dateRanges = $('div[name="editPackageDateRange"]');
        //console.log('dateRanges', dateRanges);

        var dateRangeArray = [];
        for (var i=0; i < dateRanges.length; i++) {
            var range = dateRanges[i];
            var start = range.querySelectorAll('[name=editCustomPackageStartDate]')[0].value;
            var end = range.querySelectorAll('[name=editCustomPackageEndDate]')[0].value;
            dateRangeArray.push('{ "beginCoverage": "' + start + '", "endCoverage": "' + end + '" }')
        }
        var dateRangeJson = "[" + dateRangeArray.join(", ") + "]";
        var jsonRequest = '{ "packageName": "' + name + '", "packageId": "' + packageId + '", "contentType": "' + contentType + '", "isHidden": ' + isHidden + ', "isSelected": ' + isSelected + ', "customCoverage": ' + dateRangeJson + ' }';
        var requestBody = encodeURIComponent(jsonRequest);

        $("#editCustomPackage").addClass("loading");
        var url = `php-clients/packages/editCustomPackage.php?body=${requestBody}`;
        var self = this;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    // show details of new package
                    packageId = data.packageId;
                    vendorId = data.vendorId;
                    self.getPackageDetails(vendorId, packageId);
                    // // remove form, loading, show success message
                    $("#editCustomPackage").removeClass("loading");
                    $("#editCustomPackage").hide();
                    $("#editCustomPackageSuccess").show();
                });
        })();
    };

    HoldingsIQ.prototype.cancelEditCustomPackage = function() {
        this.resetCustomPackageForm();
        $("#editCustomPackageModal").modal('hide');
        $("#editCustomPackageSuccess").hide();
    };

    HoldingsIQ.prototype.selectPackage = function(vid, pid) {
        $("#editCustomPackage").addClass("loading");
        var url = `php-clients/packages/selectPackage.php?packageId=${pid}&vendorId=${vid}`;
        var self = this;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    // show details of new package
                    packageId = data.packageId;
                    vendorId = data.vendorId;
                    self.getPackageDetails(vendorId, packageId);
                });
        })();
    };


    // ===============================================================================================================
    //                                              TITLES
    // ===============================================================================================================
    HoldingsIQ.prototype.showTitleSearch = function() {

        this.hidePackagesUI();

        $("#vendorSearchForm").hide();
        $("#vendorResults").hide();
        $("#vendorDetails").hide();
        $("#vendorResultsHeading").hide();
        $("#vendorDetailsHeading").hide();

        $("#titleSearchForm").show();
        $("#titleResults").show();
        $("#titleDetailsColumn").show();
        $("#titleResultsHeading").show();
        $("#titleDetailsHeading").show();
    };

    HoldingsIQ.prototype.getTitles = function() {

        $("#packageDetails").hide();
        $("#packageResults").hide();

        $("#vendorResults").hide();
        $("#vendorDetails").hide();

        $("#resultsLoader").addClass("active");

        var query = $("#titleQuery").val() || null;
        query = encodeURIComponent(query);
        var orderby = $("input[name='titleSort']:checked").val() || 'relevance';
        var selection = $("input[name='titleSelection']:checked").val() || 'all';
        var resourcetype = $("input[name='titlePublicationType']:checked").val() || 'all';
        var searchfield = $("input[name='titleSearchField']:checked").val() || 'titlename';
        var count = 20;
        var offset = 1;
        var url = `php-clients/titles/getTitles.php?q=${query}&orderby=${orderby}&count=${count}&offset=${offset}&selection=${selection}&resourcetype=${resourcetype}&searchfield=${searchfield}`;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    var result_count = data.totalResults;
                    result_count = numberWithCommas(result_count);
                    $("#titleResultsText").text("Titles ("+result_count+")");
                    if (data.totalResults > 0) {
                        $("#titlesNotFound").remove();
                        // paginated datatable
                        var datatablesUrl = `php-clients/titles/getTitlesDatatable.php?q=${query}&orderby=${orderby}&count=${count}&offset=${offset}&selection=${selection}&resourcetype=${resourcetype}&searchfield=${searchfield}`;
                        $("#titleDatatable").DataTable().destroy();
                        $('#titleDatatable').DataTable( {
                            "processing": true,
                            "serverSide": true,
                            "searching": false,
                            "ordering": false,
                            "info": false,
                            "lengthChange": false,
                            "pageLength": 20,
                            "paging": true,
                            "ajax": datatablesUrl
                        } );
                        $('#titleDatatable_paginate').css("position", "absolute");
                        $('#titleDatatable_paginate').css("left", "-200px");
                        $("#resultsLoader").removeClass("active");
                        $('#titleDatatable').show();
                    } else {
                        $('#titleDatatable').hide();
                        $('#titleDatatable_paginate').hide();
                        $("#titlesNotFound").remove();
                        var result_item =
                            "<div id=\"titlesNotFound\" class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div class=\"description\">No titles found.</div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#titleResults").append(result_item);
                    }
                    $("#resultsLoader").removeClass("active");
                    $("#titleResults").show();
                });
        })();

    };

    HoldingsIQ.prototype.getTitleDetails = function(tid) {
        // fetch and display vendor details
        $("#titleDetails").hide();
        $("#titleDetailsHeading").show();
        $("#detailsLoader").addClass("active");
        var self = this;
        (function () {
            $.getJSON("php-clients/titles/getTitleDetails.php?tid=" + tid)
                .done(function (data) {

                    $('#customTitleForm')[0].reset(); // reset form

                    // title header
                    $("#titleDetailName").text(data.titleName);
                    $("#customTitleName").val(data.titleName); // form

                    $("#titleInfo").empty();

                    // description
                    if (data.description) {
                        var description =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>Description: <strong>" + data.description + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#titleInfo").append(description);
                        $("#customTitleDescription").val(data.description); // form
                    }

                    // publisher
                    if (data.publisherName) {
                        var publisher =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>Publisher: <strong>" + data.publisherName + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#titleInfo").append(publisher);
                        $("#customTitlePublisher").val(data.publisherName); // form
                    }

                    // pub type
                    var pub_type =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Publication type: <strong>" + data.pubType + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#titleInfo").append(pub_type);
                    $("#customTitlePublicationTypeDropdown").dropdown('set selected', data.pubType.toLowerCase()); // form

                    // edition
                    if (data.edition) {
                        var edition =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>Edition: <strong>" + data.edition + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#titleInfo").append(edition);
                        $("#customTitleEdition").val(data.edition); // form
                    }

                    // peer review
                    var peer_review_text = data.isPeerReviewed ? "Yes" : "No";
                    var peer_review =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Peer reviewed: <strong>" + peer_review_text + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#titleInfo").append(peer_review);
                    $("#customTitleIsPeerReviewed").prop('checked', data.isPeerReviewed); // form

                    // custom?
                    if (data.isTitleCustom) {
                        $("#editCustomTitleButton").show();
                    } else {
                        $("#editCustomTitleButton").hide();
                    }
                    var custom_title_text = data.isTitleCustom ? "Yes" : "No";
                    var custom_title =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Custom title: <strong>" + custom_title_text + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#titleInfo").append(custom_title);

                    // url
                    if (data.customerResourcesList[0].url) {
                        var urlDiv =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>URL: <strong>" + data.customerResourcesList[0].url + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#titleInfo").append(urlDiv);
                        $("#customTitleUrl").val(data.customerResourcesList[0].url); // form
                    }

                    // ISBNs
                    var isbn_print_list = [];
                    var isbn_online_list = [];
                    $.each(data.identifiersList, function(i, identifier) {
                        if (identifier.source === "ResourceIdentifier" && identifier.subtype === 1 && identifier.type === 1){
                            isbn_print_list.push(identifier.id);
                        }
                        if (identifier.source === "ResourceIdentifier" && identifier.subtype === 2 && identifier.type === 1){
                            isbn_online_list.push(identifier.id);
                        }

                    });
                    if (isbn_print_list.length > 0) {
                        var isbn_print =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>ISBN (Print): <strong>" + isbn_print_list.join(", ") + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#titleInfo").append(isbn_print);
                    }
                    if (isbn_online_list.length > 0) {
                        var isbn_online =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <div>ISBN (Online): <strong>" + isbn_online_list.join(", ") + "</strong></div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#titleInfo").append(isbn_online);
                    }

                    // display add to custom package button
                    if (!data.isSelected) {
                        var addTitle = "<button id=\"addTitleToCustomPackage\"\n" +
                            "                        onclick=\"hiq.showAddTitleToCustomPackage('" + tid + "', '" + data.titleName + "', '" + data.pubType + "');\"\n" +
                            "                        style=\"margin-top: 10px\" class=\"mini ui blue button\">\n" +
                            "                    <i class=\"plus icon\"></i>\n" +
                            "                    Add to custom package\n" +
                            "                </button>\n";
                        $("#titleInfo").append(addTitle);
                    }

                    // IN SELECTED CUSTOM PACKAGES
                    $("#titleSelectedPackages").empty();
                    var skipPackageIdList = [];
                    $.each(data.customerResourcesList, function(i, resource) {
                        if (resource.isSelected) {
                            var package_resource =
                                "<div class=\"item left aligned\">\n" +
                                "   <div class=\"content\">\n" +
                                "       <a onclick='' class=\"header\">" + resource.packageName + "</a>\n" +
                                "   </div>\n" +
                                "</div>";
                            $("#titleSelectedPackages").append(package_resource);
                            if (resource.isPackageCustom) {
                                skipPackageIdList.push(resource.packageId);
                            }
                        }
                    });
                    // todo: populate package list in edit form with everything except skip list
                    self.getAvailableCustomPackages(skipPackageIdList).done(function(packageList) {
                        $.each(packageList, function(i, p) {
                            $("#customTitlePackageDropdownSelect").append('<div class="item" data-value="' + p.packageId + '">' + p.packageName + '</div>');
                        });
                    });


                    // IN UNSELECTED PACKAGES
                    $("#titleUnselectedPackages").empty();
                    $.each(data.customerResourcesList, function(i, resource) {
                        if (!resource.isSelected) {
                            var package_resource =
                                "<div class=\"item left aligned\">\n" +
                                "   <div class=\"content\">\n" +
                                "       <a onclick='' class=\"header\">" + resource.packageName + "</a>\n" +
                                "   </div>\n" +
                                "</div>";
                            $("#titleUnselectedPackages").append(package_resource);
                        }
                    });

                    $("#detailsLoader").removeClass("active");
                    $("#titleDetailAccordians").show();
                    $("#titleDetails").show();

                });
        })();
    };

    HoldingsIQ.prototype.showNewCustomTitle = function() {

        // hide fields not applicable to creating a new title
        $("#customTitleIsSelectedField").hide();
        $("#customTitleIsHiddenField").hide();

        $("#customTitleFormModal").modal('show');
        $("#customTitleForm").addClass("loading");

        // dynamically load the available custom packages for customer
        $("#customTitlePackageDropdownSelect").empty();
        this.getAvailableCustomPackages().done(function(packageList) {
            $.each(packageList, function(i, p) {
                $("#customTitlePackageDropdownSelect").append('<div class="item" data-value="' + p.packageId + '">' + p.packageName + '</div>');
            });
            $("#customTitleForm").removeClass("loading");
        });
    };

    // populate list of packages
    // note: only applies to custom packages created by customer, so don't pass a vendor id (no vendor id = customer)
    HoldingsIQ.prototype.getAvailableCustomPackages = function (skip = []) {
        var def = $.Deferred();
        var plist = [];
        var url = `php-clients/vendors/getVendorPackages.php`;
        $.getJSON(url)
            .done(function( data ) {
                $.each(data.packagesList, function(i, package) {
                    if (!skip.includes(package.packageId)) {
                        plist.push(package);
                    }
                });
                def.resolve(plist);
            });
        return def;
    };

    HoldingsIQ.prototype.cancelNewCustomTitle = function() {
        this.resetCustomPackageForm();
        $("#newCustomTitle").removeClass("loading");
        $("#newCustomTitleModal").modal('hide');
    };

    HoldingsIQ.prototype.submitCustomTitleForm = function() {

        var name = $("#customTitleName").val() || null;
        var packageId = $("#customTitlePackage").val() || null;
        var pubType = $("#customTitlePublicationType").val() || null;
        var publisherName = $("#customTitlePublisher").val() || null;
        var edition = $("#customTitleEdition").val() || null;
        var description = $("#customTitleDescription").val() || null;
        var coverageStatement = $("#customTitleCoverageStatement").val() || null;
        var titleUrl = $("#customTitleUrl").val() || null;
        var isPeerReviewed = $("#customTitleIsPeerReviewed").prop('checked') || false;

        // COVERAGE DATES
        var dateRanges = $('div[name="titleDateRange"]');
        var dateRangeArray = [];
        for (var i=0; i < dateRanges.length; i++) {
            var range = dateRanges[i];
            var start = range.querySelectorAll('[name=customTitleStartDate]')[0].value;
            var end = range.querySelectorAll('[name=customTitleEndDate]')[0].value;
            if (start !== "" &&  end !== "") {
                dateRangeArray.push('{ "beginCoverage": "' + start + '", "endCoverage": "' + end + '" }')
            }
        }
        var dateRangeJson = " \"customCoverageList\": [" + dateRangeArray.join(", ") + "]";

        // CONTRIBUTORS
        var contribs = $('div[name="titleContrib"]');
        var contribArray = [];
        for (var i=0; i < contribs.length; i++) {
            var contrib = contribs[i];
            var contribType = contrib.querySelectorAll('[name=contributorType]')[0].value;
            var contribName = contrib.querySelectorAll('[name=contributorName]')[0].value;
            if (contribType !== "" && contribName !== "") {
                contribArray.push('{ "type": "' + contribType + '", "contributor": "' + contribName + '" }')
            }
        }
        var contribJson = " \"contributorsList\": [" + contribArray.join(", ") + "]";

        // IDENTIFIERS
        var idents = $('div[name="titleIdent"]');
        var identArray = [];
        for (var i=0; i < idents.length; i++) {
            var ident = idents[i];
            var identTypeCombined = ident.querySelectorAll('[name=identifierType]')[0].value;
            var type = identTypeCombined.split('-')[0];
            var subtype = identTypeCombined.split('-')[1];
            var identValue = ident.querySelectorAll('[name=identifierValue]')[0].value;
            if (type !== "" && subtype !== "" && identValue !== "") {
                identArray.push('{ "type": "' + type + '", "subtype": "' + subtype + '", "id": "' + identValue + '" }')
            }
        }
        var identJson = " \"identifiersList\": [" + identArray.join(", ") + "]";

        // EMBARGO PERIOD
        var embargos = $('div[name="titleEmbargo"]');
        var embargoArray = [];
        for (var i=0; i < embargos.length; i++) {
            var embargo = embargos[i];
            var embargoUnit = embargo.querySelectorAll('[name=embargoUnit]')[0].value;
            var embargoValue = embargo.querySelectorAll('[name=embargoValue]')[0].value;
            embargoArray.push('{ "embargoUnit": "' + embargoUnit + '", "embargoValue": "' + embargoValue + '" }')
        }
        var embargoJson = " \"embargoPeriod\": ";
        if (typeof embargoArray[0] !== 'undefined') {
            embargoJson += embargoArray[0];
        } else {
            embargoJson += '[]';
        }

        var jsonRequest = '{ "titleName": "' + escape(name) +
            '", "packageId": ' + packageId +
            ', "pubType": "' + pubType +
            '", "publisherName": "' + escape(publisherName) +
            '", "edition": "' + escape(edition) +
            '", "description": "' + escape(description) +
            '", "coverageStatement": "' + escape(coverageStatement) +
            '", "url": "' + escape(titleUrl) +
            '", "peerReviewed": ' + isPeerReviewed +
            ', ' + embargoJson +
            ', ' + dateRangeJson +
            ', ' + contribJson +
            ', ' + identJson + ' }';

        console.log('new title request', jsonRequest);
        var requestBody = encodeURIComponent(jsonRequest);

        $("#newCustomTitle").addClass("loading");
        var url = `php-clients/titles/createCustomTitle.php?body=${requestBody}`;
        var self = this;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    // show details of new title
                    self.getTitleDetails(data.titleId);
                    // remove form, loading, show success message
                    $("#newCustomTitle").removeClass("loading");
                    self.resetCustomTitleForm();
                    $("#newCustomTitleSuccess").show();
                });
        })();
    };

    HoldingsIQ.prototype.resetCustomTitleForm = function() {
        $("#customTitleName").val('');
        $("#customTitleEdition").val('');
        $("#customTitlePublisher").val('');
        $("#customTitleDescription").val('');
        $("#customTitleUrl").val('');
        $("#customTitlePublicationTypeDropdown").dropdown('clear');
        $("#customTitlePackageDropdown").dropdown('clear');
        $("#customTitleIsPeerReviewed").prop('checked', false);
        $(".customTitleField").remove();
    };

    HoldingsIQ.prototype.addNewCustomTitleDateRange = function() {
        var rangeInput =
            '           <div style="margin-top: 12px;" class="customTitleField field">\n' +
            '            <div name="titleDateRange" class="two fields">\n' +
            '                <div class="field">\n' +
            '                    <div class="ui calendar" id="rangestart">\n' +
            '                        <div class="ui input left icon">\n' +
            '                            <i class="calendar icon"></i>\n' +
            '                            <input name="customTitleStartDate" type="text" placeholder="Start date">\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '                <div class="field">\n' +
            '                    <div class="ui calendar" id="rangeend">\n' +
            '                        <div class="ui input left icon">\n' +
            '                            <i class="calendar icon"></i>\n' +
            '                            <input name="customTitleEndDate" type="text" placeholder="End date">\n' +
            '                        </div>\n' +
            '                    </div>\n' +
            '                </div>\n' +
            '              <div class="circular ui icon button" onclick="$(this).parent().parent().remove();"><i class="trash alternate outline icon"></i></div>\n' +
            '              </div>\n' +
            '            </div>';
        $("#titleCoverage").append(rangeInput);
        $('.ui.calendar').calendar({
            type: 'date',
            formatter: {
                date: function (date, settings) {
                    if (!date) return '';
                    var day = ('0' + date.getDate()).slice(-2);
                    var month = ('0' + (date.getMonth()+1)).slice(-2);
                    var year = date.getFullYear();
                    return year + '-' + month + '-' + day;
                }
            }
        });
    };

    HoldingsIQ.prototype.addNewCustomTitleContrib = function() {
        var contribInput =
            '           <div style="margin-top: 12px;" class="customTitleField field">\n' +
            '            <div name="titleContrib" class="two fields">\n' +
            '                <div class="field">\n' +
            '                   <div id="customTitleContribDropdown" class="ui selection dropdown">\n' +
            '                       <input id="contributorType" type="hidden" name="contributorType">\n' +
            '                       <i class="dropdown icon"></i>\n' +
            '                       <div class="default text">Select the contributor type...</div>\n' +
            '                       <div class="menu">\n' +
            '                           <div class="item" data-value="Author">Author</div>\n' +
            '                           <div class="item" data-value="Editor">Editor</div>\n' +
            '                           <div class="item" data-value="Illustrator">Illustrator</div>\n' +
            '                       </div>\n' +
            '                   </div>\n' +
            '               </div>\n' +
            '               <div class="field">\n' +
            '                   <input id="customTitleContribName" name="contributorName" type="text" placeholder="Enter name here...">\n' +
            '               </div>\n' +
            '              <div class="circular ui icon button" onclick="$(this).parent().parent().remove();"><i class="trash alternate outline icon"></i></div>\n' +
            '              </div>\n' +
            '            </div>';
        $("#titleContribList").append(contribInput);
        $('.ui.dropdown').dropdown();
    };

    HoldingsIQ.prototype.addNewCustomTitleIdent = function(options) {
        var options = options || {};
        var type = (options.type  && options.subtype) ? options.type + '-' + options.subtype : null;
        var value = options.value || null;
        var identInput =
            '           <div style="margin-top: 12px;" class="customTitleField field">\n' +
            '            <div name="titleIdent" class="two fields">\n' +
            '                <div class="field">\n' +
            '                   <div id="customTitleIdentDropdown" class="ui selection dropdown">\n' +
            '                       <input id="identifierType" type="hidden" name="identifierType">\n' +
            '                       <i class="dropdown icon"></i>\n' +
            '                       <div class="default text">Select the identifier type...</div>\n' +
            '                       <div class="menu">\n' +
            '                           <div class="item" data-value="0-2">ISSN-Online</div>\n' +
            '                           <div class="item" data-value="0-1">ISSN-Print</div>\n' +
            '                           <div class="item" data-value="1-2">ISBN-Online</div>\n' +
            '                           <div class="item" data-value="1-1">ISBN-Print</div>\n' +
            '                       </div>\n' +
            '                   </div>\n' +
            '               </div>\n' +
            '               <div class="field">\n' +
            '                   <input id="identifierValue" name="identifierValue" type="text" placeholder="Enter identifier here...">\n' +
            '               </div>\n' +
            '              <div class="circular ui icon button" onclick="$(this).parent().parent().remove();"><i class="trash alternate outline icon"></i></div>\n' +
            '              </div>\n' +
            '            </div>';
        $("#titleIdentList").append(identInput);
        $('.ui.dropdown').dropdown();
    };

    HoldingsIQ.prototype.addNewCustomTitleEmbargo = function() {
        var embargoInput =
            '           <div style="margin-top: 12px;" class="customTitleField field">\n' +
            '            <div name="titleEmbargo" class="two fields">\n' +
            '                <div class="field">\n' +
            '                   <div id="customTitleEmbargoDropdown" class="ui selection dropdown">\n' +
            '                       <input id="embargoUnit" type="hidden" name="embargoUnit">\n' +
            '                       <i class="dropdown icon"></i>\n' +
            '                       <div class="default text">Select the embargo unit...</div>\n' +
            '                       <div class="menu">\n' +
            '                           <div class="item" data-value="Days">Days</div>\n' +
            '                           <div class="item" data-value="Weeks">Weeks</div>\n' +
            '                           <div class="item" data-value="Months">Months</div>\n' +
            '                           <div class="item" data-value="Years">Years</div>\n' +
            '                       </div>\n' +
            '                   </div>\n' +
            '               </div>\n' +
            '               <div class="field">\n' +
            '                   <input id="embargoValue" name="embargoValue" type="text" placeholder="Enter value here...">\n' +
            '               </div>\n' +
            '              <div class="circular ui icon button" ' +
            '                      onclick="$(this).parent().parent().remove(); $(\'#titleEmbargoButton\').show();">' +
            '                   <i class="trash alternate outline icon"></i>' +
            '              </div>\n' +
            '              </div>\n' +
            '            </div>';
        $("#titleEmbargo").append(embargoInput);
        $("#titleEmbargoButton").hide();
        $('.ui.dropdown').dropdown();
    };

    HoldingsIQ.prototype.showAddTitleToCustomPackage = function(tid, name, type) {

        $("#addTitleToCustomPackageModal").modal('show');
        $("#addTitleToCustomPackageForm").addClass("loading");

        // set hidden input for title id
        $("#addCustomTitleId").val(tid);
        $("#addCustomTitleName").val(name);
        $("#addCustomTitlePubType").val(type);

        // populate list of packages
        var url = `php-clients/vendors/getVendorPackages.php`;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    $("#addCustomTitlePackageDropdownSelect").empty();
                    $.each(data.packagesList, function(i, package) {
                        $("#addCustomTitlePackageDropdownSelect").append('<div class="item" data-value="' + package.packageId + '">' + package.packageName + '</div>');
                    });
                    $("#addTitleToCustomPackageForm").removeClass("loading");
                });
        })();
    };

    HoldingsIQ.prototype.showCustomTitleFormModal = function() {
        $("#customTitleFormModal").modal('show');

    };

    HoldingsIQ.prototype.submitAddTitleToCustomPackage = function() {

        var packageId = $("#addCustomTitlePackage").val() || null;
        var titleId = $("#addCustomTitleId").val();
        var titleName = $("#addCustomTitleName").val();
        titleName = encodeURIComponent(titleName);
        var titlePubType = $("#addCustomTitlePubType").val();
        var url = `php-clients/titles/addTitleToCustomPackage.php?packageId=${packageId}&titleId=${titleId}&titleName=${titleName}&pubType=${titlePubType}`;

        $("#detailsLoader").addClass("active");

        var self = this;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    console.log('add title to custom package result', data);
                    // show details of new title
                    self.getTitleDetails(data.titleId);
                    // remove form, loading, show success message
                    $("#detailsLoader").removeClass("loading");
                    //self.resetCustomTitleForm();
                    $("#addCustomTitleSuccess").show();
                });
        })();
    };

    HoldingsIQ.prototype.cancelAddTitleToCustomPackage = function() {
        this.resetCustomPackageForm();
        $("#addTitleToCustomPackageForm").removeClass("loading");
        $("#addTitleToCustomPackageModal").modal('hide');
    };

    // UTILS

    // function to add commas to long numbers
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function escape (val) {
        if (typeof(val)!="string") return "";
        return val
            .replace(/[\\]/g, '\\\\')
            .replace(/[\/]/g, '\\/')
            .replace(/[\b]/g, '\\b')
            .replace(/[\f]/g, '\\f')
            .replace(/[\n]/g, '\\n')
            .replace(/[\r]/g, '\\r')
            .replace(/[\t]/g, '\\t')
            .replace(/[\"]/g, '\\"')
            .replace(/\\'/g, "\\'");
    }
}