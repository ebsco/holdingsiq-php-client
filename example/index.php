<?php ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
<link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css'>
<link rel="stylesheet" href="js/calendar.min.css" />

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
<script type="text/javascript" src="js/calendar.min.js"></script>
<script src="js/HoldingsIQ.js"></script>
<script>
    const hiq = new HoldingsIQ();
</script>

<div class="ui stackable equal width three column padded grid">

    <!-- SEARCH -->
    <div class="column">
        <h3 class="ui top attached center aligned header">Search</h3>
        <div style="border: none;" class="ui attached segment">
           <!-- SEARCH TYPES -->
           <div class="ui fluid blue inverted three item menu">
                <a id="providers" class="item active" onclick="hiq.showVendorSearch();">Providers</a>
                <a id="packages" class="item" onclick="hiq.showPackageSearch();">Packages</a>
                <a id="titles" class="item" onclick="hiq.showTitleSearch();">Titles</a>
            </div>
            <!-- PROVIDER -->
            <?php
            include('php-includes/providerSearch.php');
            ?>
            <!-- PACKAGE -->
            <?php
            include('php-includes/packageSearch.php');
            ?>
            <!-- TITLE -->
            <?php
            include('php-includes/titleSearch.php');
            ?>
        </div>
    </div>

    <!-- RESULTS -->
    <div class="column">
        <h3 class="ui top attached center aligned header">
            <span id="vendorResultsHeading">Providers</span>
            <span id="packageResultsHeading" style="display: none">
                <span id="packageResultsText">Packages</span>
                <button style="margin-top: -3px;"
                        onclick="hiq.showNewCustomPackage();"
                        class="mini ui right floated primary button">
                    <i class="plus icon"></i>
                    New
                </button>
            </span>
            <span id="titleResultsHeading" style="display: none">Titles</span>
        </h3>
        <div id="resultsLoader" class="ui loader"></div>

        <!-- PROVIDER -->
        <?php
        include('php-includes/providerResults.php');
        ?>

        <!-- PACKAGE -->
        <?php
        include('php-includes/packageResults.php');
        ?>
        <?php
        include('php-includes/newCustomPackage.php');
        ?>

        <!-- TITLE -->
        <?php
        include('php-includes/titleResults.php');
        ?>

    </div>

    <!-- DETAILS -->
    <div class="column">
        <h3 class="ui top attached center aligned header">
            <span id="vendorDetailsHeading">Provider Details</span>
            <span id="packageDetailsHeading" style="display: none">
                <span id="packageDetailsText">Package Details</span>
                <button id="deleteCustomPackageButton"
                        style="display: none; margin-top: -3px;"
                        onclick="hiq.deleteCustomPackage();"
                        class="mini ui right floated red button">
                    <i class="x icon"></i>
                    Delete
                </button>
                <button id="editCustomPackageButton"
                        style="display: none; margin-top: -3px;"
                        onclick="hiq.showEditCustomPackage();"
                        class="mini ui right floated blue button">
                    <i class="pencil alternate icon"></i>
                    Edit
                </button>
             </span>
            <span id="titleDetailsHeading" style="display: none">Title Details</span>
        </h3>
        <div id="detailsLoader" class="ui loader"></div>
        <!-- PROVIDER -->
        <?php
        include('php-includes/providerDetails.php');
        ?>
        <!-- PACKAGE -->
        <?php
        include('php-includes/packageDetails.php');
        ?>
        <!-- TITLE -->
        <?php
        include('php-includes/titleDetails.php');
        ?>
    </div>
</div>

<script>
    // parse url parameters
    $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^]*)').exec(window.location.href);
        if (results==null) {
            return null;
        } else { return results[1] || 0; }
    };

   $(document).ready(function(){
        $('.ui a.item').on('click', function() {
            $('.ui a.item').removeClass('active');
            $(this).addClass('active');
        });

        if ($.urlParam('query') !== null) {
            var q = $.urlParam('query').replace(/\+/g, '%20');
            q = decodeURIComponent(q);
            $("#query").val(q);
        }

       // init semantic-ui accordians and open them all by default
       $('.ui.accordion').accordion({ exclusive: false });
       $('.ui.accordion .individual').each(function(i){
           $(this).parent().accordion('open',i);
       });

       // init semantic-ui checkboxes
       $('.ui.radio.checkbox').checkbox();

       // init dropdowns
       $('.ui.dropdown').dropdown();

       $('.ui.calendar').calendar({
           type: 'date'
       });

       $('.ui.toggle.checkbox')
           .checkbox()
       ;

   });

</script>
