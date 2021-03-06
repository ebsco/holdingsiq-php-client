<?php ?>

<div id="newCustomPackageModal" class="ui modal">

    <i class="close icon"></i>
    <div class="header">
        Create a new custom package
    </div>
    <div class="content">
        <!-- form -->
        <form id="newCustomPackage"
              class="ui form"
              action="javascript:void(0)">
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

            <!-- buttons -->
            <div class="ui divider"></div>
            <div class="ui positive button" onclick="$('#newCustomPackage').submit();")>Save</div>
            <div class="ui button" onclick="hiq.cancelNewCustomPackage();">Cancel</div>

        </form>
    </div>
</div>

<script>

    $('#newCustomPackageModal')
        .modal({
            closable  : true,
            onDeny    : function(){
            },
            onApprove : function() {
                return false;
            }
        })
        .modal('hide');

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
                $('#newCustomPackageModal').modal('hide');
                hiq.submitNewCustomPackage();
                event.preventDefault();
            }
        });
</script>