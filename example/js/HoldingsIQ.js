

function HoldingsIQ() {


    // ===============================================================================================================
    //                                              VENDORS
    // ===============================================================================================================
    HoldingsIQ.prototype.showVendorSearch = function() {
        $("#vendorSearchForm").show();
        $("#vendorResults").show();
        $("#vendorDetails").show();
        $("#vendorResultsHeading").show();

        $("#packageSearchForm").hide();
        $("#packageResults").hide();
        $("#packageDetails").hide();
        $("#packageResultsHeading").hide();
        $("#newCustomPackage").hide();
        $("#newCustomPackageSuccess").hide();


        $("#titleSearchForm").hide();
        $("#titleResults").hide();
        $("#titleDetails").hide();
        $("#titleResultsHeading").hide();
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
        $("#packageDetails").show();
        $("#packageResultsHeading").show();

        $("#vendorSearchForm").hide();
        $("#vendorResults").hide();
        $("#vendorDetails").hide();
        $("#vendorResultsHeading").hide();

        $("#titleSearchForm").hide();
        $("#titleResults").hide();
        $("#titleDetails").hide();
        $("#titleResultsHeading").hide();
    };

    HoldingsIQ.prototype.getPackages = function() {

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
                    // var result_text = result_count + " packages found:";
                    // if (result_count === 1) result_text = result_count + " package found:";
                    // if (result_count === 0) result_text = "No packages found.";
                    // $("#totalPackageResults").text(result_text);
                    $("#packageResultsText").text("Packages ("+result_count+")");
                    // $("#packageResultsList").empty();
                    // $.each( data.packagesList, function( i, package ) {
                    //     var selectedText = "Not selected";
                    //     if (package.isSelected) { selectedText = "Selected" };
                    //     var result_item =
                    //         "<div class=\"item left aligned\">\n" +
                    //         "   <div class=\"content\">\n" +
                    //         "       <a onclick='hiq.getPackageDetails(" + package.vendorId + "," + package.packageId+ ");' class=\"header\">" + package.packageName + "</a>\n" +
                    //         "       <div class=\"description\">" + package.vendorName + "</div>\n" +
                    //         "       <div class=\"description\">" + selectedText + "</div>\n" +
                    //         "   </div>\n" +
                    //         "</div>";
                    //     $("#packageResultsList").append(result_item);
                    // });
                    // $("#resultsLoader").removeClass("active");
                    // $("#packageResults").show();
                });
        })();

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

    };

    HoldingsIQ.prototype.getPackageDetails = function(vid, pid) {
        $("#packageDetails").hide();
        $("#detailsLoader").addClass("active");
        (function () {
            $.getJSON("php-clients/packages/getPackageDetails.php?vid=" + vid + "&pid=" + pid)
                .done(function (data) {

                    $("#packageDetailName").text(data.packageName);

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
                    $("#packageInformation").append(provider);
                    $("#packageInformation").append(titles_selected);
                    $("#packageInformation").append(total_titles);
                    $("#packageInformation").append(content_type);
                    $("#packageInformation").append(package_type);

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

                    $("#packageCoverage").empty();
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
                        $("#packageCoverage").append(custom_begin_coverage);
                        $("#packageCoverage").append(custom_end_coverage);
                    } else {
                        $("#packageCoverage").append(no_custom_coverage);
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
                    $("#detailsLoader").removeClass("active");
                    $("#packageDetailAccordians").show();
                    $("#packageDetails").show();
                });
        })();
    };

    HoldingsIQ.prototype.showNewCustomPackage = function() {
        $("#newCustomPackage").show();
        $("#newCustomPackageSuccess").hide();
    };

    HoldingsIQ.prototype.submitNewCustomPackage = function() {
        var name = $("#customPackageName").val() || null;
        var contentType = $("#customPackageContentType").val() || null;
        var packageId = null;
        var vendorId = null;
        $("#newCustomPackage").addClass("loading");
        var url = `php-clients/packages/createCustomPackage.php?name=${name}&contentType=${contentType}`;
        var self = this;
        (function() {
            $.getJSON(url)
                .done(function( data ) {
                    packageId = data.packageId;
                    vendorId = data.vendorId;
                    self.getPackageDetails(vendorId, packageId);
                    $("#newCustomPackage").removeClass("loading");
                    $("#newCustomPackage").hide();
                    $("#newCustomPackageSuccess").show();
                });
        })();
    };

    // ===============================================================================================================
    //                                              TITLES
    // ===============================================================================================================
    HoldingsIQ.prototype.showTitleSearch = function() {
        $("#packageSearchForm").hide();
        $("#packageResults").hide();
        $("#packageDetails").hide();
        $("#packageResultsHeading").hide();
        $("#newCustomPackage").hide();
        $("#newCustomPackageSuccess").hide();

        $("#vendorSearchForm").hide();
        $("#vendorResults").hide();
        $("#vendorDetails").hide();
        $("#vendorResultsHeading").hide();

        $("#titleSearchForm").show();
        $("#titleResults").show();
        $("#titleDetails").show();
        $("#titleResultsHeading").show();
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
                    // var result_text = result_count + " titles found:";
                    // if (result_count === 1) result_text = result_count + " title found:";
                    // if (result_count === 0) result_text = "No titles found.";
                    // $("#totalTitleResults").text(result_text);
                    $("#titleResultsHeading").text("Titles ("+result_count+")");
                    // $("#titleResultsList").empty();
                    // $.each( data.titles, function( i, title ) {
                    //     var result_item =
                    //         "<div class=\"item left aligned\">\n" +
                    //         "   <div class=\"content\">\n" +
                    //         "       <a onclick='hiq.getTitleDetails(" + title.titleId + ");' class=\"header\">" + title.titleName + "</a>\n" +
                    //         "       <div class=\"description\">" + title.pubType + " - " + title.publisherName + "</div>\n" +
                    //         "   </div>\n" +
                    //         "</div>";
                    //     $("#titleResultsList").append(result_item);
                    // });
                    // $("#resultsLoader").removeClass("active");
                    // $("#titleResults").show();
                });
        })();

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