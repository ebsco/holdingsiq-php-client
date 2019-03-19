<?php ?>

<div id="titleDetailsColumn">


    <!-- TITLE DETAILS -->
    <div id="titleDetails" style="border: none; display: none; height: 100%;" class="ui attached segment">

        <div id="newCustomTitleSuccess" style="display: none;" class="ui success message">
            <div class="header">Custom Title Created</div>
            <p>Your custom title has been created.</p>
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
            <div class="active title">
                <i class="dropdown icon"></i>
                Coverage settings
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="titleDetailCoverage" class="ui relaxed divided list">
                    <!-- packages will go here... -->
                </div>
            </div>
            <div class="active title">
                <i class="dropdown icon"></i>
                Packages
            </div>
            <div class="active content">
                <div style="margin-left: 25px;" id="titlePackages" class="ui relaxed divided list">
                    <!-- info will go here... -->
                </div>
            </div>
        </div>
    </div>

</div>
