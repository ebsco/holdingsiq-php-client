<?php ?>

<form id="newCustomPackage"
      class="ui form"
      style="display: none"
      action="javascript:void(0)">
    <div class="ui medium header">New custom package</div>
    <div class="field required">
        <label>Package name</label>
        <input id="customPackageName" name="customPackageName" type="text" placeholder="Enter your custom package name here...">
    </div>

    <div class="field">
        <label>Content type</label>
        <div id="customPackageContentTypeDropdown" class="ui selection dropdown">
            <input id="customPackageContentType" type="hidden" name="contentType">
            <i class="dropdown icon"></i>
            <div class="default text">Select the content type...</div>
            <div class="menu">
                <div class="item" data-value="AggregatedFullText">Aggregated Full Text</div>
                <div class="item" data-value="AbstractAndIndex">Abstract and Index</div>
                <div class="item" data-value="EBook">E-Book</div>
                <div class="item" data-value="EJournal">E-Journal</div>
                <div class="item" data-value="Print">Print</div>
                <div class="item" data-value="OnlineReference">Online Reference</div>
                <div class="item" data-value="Unknown">Unknown</div>
            </div>
        </div>
    </div>

    <div id="packageCoverage" class="field">
        <label>Coverage settings</label>
        <!-- <div class="ui basic button" onclick="hiq.addNewCustomPackageDateRange();">+ Add date range</div> -->
        <div name="packageDateRange" class="two fields">
            <div class="field">
                <div class="ui calendar" id="rangestart">
                    <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input name="customPackageStartDate" type="text" placeholder="Start date">
                    </div>
                </div>
            </div>
            <div class="field">
                <div class="ui calendar" id="rangeend">
                    <div class="ui input left icon">
                        <i class="calendar icon"></i>
                        <input name="customPackageEndDate" type="text" placeholder="End date">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="field">
        <button class="ui button" type="submit">Save</button>
        <div class="ui button" onclick="hiq.cancelNewCustomPackage();">Cancel</div>
    </div>
</form>

<div id="newCustomPackageSuccess" style="display: none;" class="ui success message">
    <div class="header">Custom Package Created</div>
    <p>Your custom package has been created.</p>
</div>

<script>
    $('#newCustomPackage')
        .form({
            fields: {
                customPackageName: {
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Please enter a package name'
                        }
                    ]
                }
            },
            onSuccess: function(event, fields) {
                hiq.submitNewCustomPackage();
                event.preventDefault();
            }
        });
</script>