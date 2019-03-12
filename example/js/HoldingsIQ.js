

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
        $("#titleDetails").hide();
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
        $("#titleDetails").hide();
        $("#titleResultsHeading").hide();
        $("#titleDetailsHeading").hide();
    };


    HoldingsIQ.prototype.hidePackagesUI = function() {
        // search column
        $("#packageSearchForm").hide();
        // results column
        $("#packageResults").hide();
        $("#packageResultsHeading").hide();
        $("#newCustomPackage").hide();
        $("#newCustomPackageSuccess").hide();
        // details column
        $("#packageDetailsColumn").hide();
        $("#packageDetailsHeading").hide();
    };

    HoldingsIQ.prototype.getPackages = function() {

        $("#newCustomPackage").hide();
        $("#newCustomPackageSuccess").hide();
        $("#packageDetails").hide();
        $("#packageResults").hide();
        $("#resultsLoader").addClass("active");

        var query = $("#packageQuery").val() || null;
        query = encodeURIComponent(query);
        var orderby = $("input[name='packagesort']:checked").val() || 'relevance';
        var selection = $("input[name='packageSelection']:checked").val() || 'all';
        var contenttype = $("input[name='packageContentType']:checked").val() || 'all';
        var count = 50;
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
                        $("#deleteCustomPackageButton").show();
                        $("#editCustomPackageButton").show();
                    } else {
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
                            if (title.isSelected) { selectedText = "Selected"; }
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
        $("#newCustomPackage").show();
        $("#newCustomPackageSuccess").hide();
        $("#packageDatatable_wrapper").hide();
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
                    $("#newCustomPackage").hide();
                    self.resetCustomPackageForm();
                    $("#newCustomPackageSuccess").show();
                });
        })();
    };

    HoldingsIQ.prototype.cancelNewCustomPackage = function() {
        this.resetCustomPackageForm();
        $("#newCustomPackage").removeClass("loading");
        $("#newCustomPackage").hide();
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

    HoldingsIQ.prototype.deleteCustomPackage = function() {
        var pid =  $("#currentPackageId").text();
        console.log('current pid', pid);
        var url = `php-clients/packages/deleteCustomPackage.php?packageId=${pid}`;
        // $("#packageDetails").hide();
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
        $("#editCustomPackage").show();
        $("#editCustomPackageSuccess").hide();
        $("#packageDetails").hide();
        // hide buttons on header
        $("#deleteCustomPackageButton").hide();
        $("#editCustomPackageButton").hide();
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
        $("#packageDetails").show();
        $("#editCustomPackage").hide();
        $("#editCustomPackageSuccess").hide();
        // show the buttons on header again
        $("#deleteCustomPackageButton").show();
        $("#editCustomPackageButton").show();
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
        $("#titleDetails").show();
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
                    $("#titleResultsHeading").text("Titles ("+result_count+")");
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
        $("#detailsLoader").addClass("active");
        (function () {
            $.getJSON("php-clients/titles/getTitleDetails.php?tid=" + tid)
                .done(function (data) {

                    $("#titleDetailName").text(data.titleName);

                    $("#titleInfo").empty();
                    var publisher =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Publisher: <strong>" + data.publisherName + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#titleInfo").append(publisher);
                    var pub_type =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Publication type: <strong>" + data.pubType + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#titleInfo").append(pub_type);
                    var peer_review_text = data.isPeerReviewed ? "Yes" : "No";
                    var peer_review =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Peer reviewed: <strong>" + peer_review_text + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#titleInfo").append(peer_review);
                    var custom_title_text = data.isTitleCustom ? "Yes" : "No";
                    var custom_title =
                        "<div class=\"item left aligned\">\n" +
                        "   <div class=\"content\">\n" +
                        "       <div>Custom title: <strong>" + custom_title_text + "</strong></div>\n" +
                        "   </div>\n" +
                        "</div>";
                    $("#titleInfo").append(custom_title);


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

                    // PACKAGES
                    $.each(data.customerResourcesList, function(i, resource) {
                        var selectedText = "Not selected";
                        if (resource.isSelected) { selectedText = "Selected"; }
                        var package_resource =
                            "<div class=\"item left aligned\">\n" +
                            "   <div class=\"content\">\n" +
                            "       <a onclick='' class=\"header\">" + resource.packageName + "</a>\n" +
                            "       <div class=\"description\">" + selectedText + "</div>\n" +
                            "   </div>\n" +
                            "</div>";
                        $("#titlePackages").append(package_resource);
                    });

                    $("#detailsLoader").removeClass("active");
                    $("#titleDetailAccordians").show();
                    $("#titleDetails").show();

                });
        })();
    };

    // function to add commas to long numbers
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
}