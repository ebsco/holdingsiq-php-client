<?php ?>

<div id="titleDetailsColumn">

    <!-- modals -->
    <?php
    include('addTitleToCustomPackageModal.php');
    ?>

    <!-- TITLE DETAILS -->
    <div id="titleDetails" style="border: none; display: none; height: 100%;" class="ui attached segment">

        <div id="newCustomTitleSuccess" style="display: none;" class="ui success message">
            <div class="header">Custom Title Created</div>
            <p>Your custom title has been created.</p>
        </div>

        <div id="addCustomTitleSuccess" style="display: none;" class="ui success message">
            <div class="header">Custom Title Updated</div>
            <p>This title has been added to a new custom package.</p>
        </div>


        <h2 id="titleDetailName" class="ui top left aligned header"></h2>
        <div id="titleDetailAccordians" style="display: none" class="ui accordion">

            <div class="active title">
                <i class="dropdown icon"></i>
                Title information
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="titleInfo" class="ui relaxed divided list">
                    <!-- info will go here... -->
                </div>
            </div>

<!--            <div class="active title">-->
<!--                <i class="dropdown icon"></i>-->
<!--                Coverage settings-->
<!--            </div>-->
<!--            <div class="active content">-->
<!--                <div style="margin-left: 25px;" id="titleDetailCoverage" class="ui relaxed divided list">-->
<!--                </div>-->
<!--            </div>-->

            <div class="active title">
                <i class="dropdown icon"></i>
                In selected custom packages
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="titleSelectedPackages" class="ui relaxed divided list">
                    <!-- info will go here... -->
                </div>
            </div>

            <div class="active title">
                <i class="dropdown icon"></i>
                In unselected packages
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="titleUnselectedPackages" class="ui relaxed divided list">
                    <!-- info will go here... -->
                </div>
            </div>


        </div>
    </div>

</div>
