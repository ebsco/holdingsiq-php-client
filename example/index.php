<?php ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
<link rel='stylesheet prefetch' href='https://cdn.datatables.net/1.10.19/css/dataTables.semanticui.min.css'>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src='https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.semanticui.min.js"></script>
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
            <span id="packageResultsHeading" style="display: none">Packages</span>
            <span id="titleResultsHeading" style="display: none">Titles</span>
        </h3>
        <div id="resultsLoader" class="ui loader"></div>
        <!-- PROVIDER -->
        <div id="vendorResults" style="display: none; border: none;" class="ui attached segment">
            <div id="totalVendorResults"></div>
            <div id="vendorResultsList" class="ui relaxed divided list"></div>
        </div>
        <!-- PACKAGE -->
        <div id="packageResults" style="display: none; border: none;" class="ui attached segment">
            <div id="totalPackageResults"></div>
            <div id="packageResultsList" class="ui relaxed divided list"></div>
        </div>
        <!-- TITLE -->
        <div id="titleResults" style="display: none; border: none;" class="ui attached segment">
<!--            <div id="totalTitleResults"></div>-->
<!--            <div id="titleResultsList" class="ui relaxed divided list"></div>-->
            <table id="titleDatatable" class="ui celled table" style="display: none; width:100%">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Pub type</th>
                    <th>Publisher</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- DETAILS -->
    <div class="column">
        <h3 class="ui top attached center aligned header">Details</h3>
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

   });

</script>
