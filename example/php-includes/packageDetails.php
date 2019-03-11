<?php ?>

<div id="packageDetailsColumn">

    <?php
    include('editCustomPackage.php');
    ?>

    <!-- PACKAGE DETAILS -->
    <div id="packageDetails" style="border: none; display: none; height: 100%;" class="ui attached segment">

        <div id="deleteCustomPackageSuccess" style="display: none;" class="ui error message">
            <div class="header">Custom Package Deleted</div>
            <p>The custom package has been deleted.</p>
        </div>

        <h2 id="packageDetailName" class="ui top left aligned header"></h2>
        <div id="packageDetailId" style="display: none;"></div>

        <div id="packageDetailAccordians" style="display: none" class="ui accordion">
            <div class="active title">
                <i class="dropdown icon"></i>
                Holding status
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="packageHoldingStatus" class="ui relaxed divided list">
                    <!-- info will go here... -->
                </div>
            </div>
            <div class="active title">
                <i class="dropdown icon"></i>
                Package information
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="packageInformation" class="ui relaxed divided list">
                    <!-- info will go here... -->
                </div>
            </div>
            <div class="active title">
                <i class="dropdown icon"></i>
                Package settings
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="packageSettings" class="ui relaxed divided list">
                    <!-- packages will go here... -->
                </div>
            </div>
            <div class="active title">
                <i class="dropdown icon"></i>
                Coverage settings
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="packageDetailCoverage" class="ui relaxed divided list">
                    <!-- packages will go here... -->
                </div>
            </div>
            <div class="active title">
                <i class="dropdown icon"></i>
                Titles
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="packageTitlesList" class="ui relaxed divided list">
                    <!-- packages will go here... -->
                </div>
            </div>
        </div>
    </div>

</div>
