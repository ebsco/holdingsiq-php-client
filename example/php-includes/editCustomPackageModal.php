<?php ?>

<div id="editCustomPackageModal" class="ui modal">

    <i class="close icon"></i>
    <div class="header">
        Edit custom package
    </div>
    <div class="content">

        <!-- form -->
        <form id="editCustomPackage"
              class="ui form"
              action="javascript:void(0)">

            <div class="field required">
                <label>Package name</label>
                <input id="editCustomPackageName" name="editCustomPackageName" type="text" placeholder="Enter your custom package name here...">
            </div>

            <div class="field">
                <label>Content type</label>
                <div id="editCustomPackageContentTypeDropdown" class="ui selection dropdown">
                    <input id="editCustomPackageContentType" type="hidden" name="contentType">
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

            <div class="field">
                <label>Package settings</label>
                <div style="margin-left: 25px" class="ui form">
                    <!-- hiding selected since unchecking it will delete a custom package! -->
                    <div style="display: none;" class="inline field">
                        <div class="ui toggle checkbox">
                            <label>Selected</label>
                            <input id="editPackageSelectedCheckbox" type="checkbox" tabindex="0" class="hidden">
                        </div>
                    </div>
                    <div class="inline field">
                        <div class="ui toggle checkbox">
                            <label>Show titles to patrons</label>
                            <input id="editPackageShowTitlesCheckbox" type="checkbox" tabindex="0" class="hidden">
                        </div>
                    </div>
                </div>
            </div>

            <div id="editPackageCoverage" class="field">
                <label>Coverage settings</label>
                <div name="editPackageDateRange" class="two fields">
                    <div class="field">
                        <div class="ui calendar" id="rangestart">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input id="editCustomPackageStartDate" name="editCustomPackageStartDate" type="text" placeholder="Start date">
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui calendar" id="rangeend">
                            <div class="ui input left icon">
                                <i class="calendar icon"></i>
                                <input id="editCustomPackageEndDate" name="editCustomPackageEndDate" type="text" placeholder="End date">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- buttons -->
            <div class="ui divider"></div>
            <div class="ui positive button" onclick="$('#editCustomPackage').submit();")>Save</div>
            <div class="ui button" onclick="hiq.cancelEditCustomPackage();">Cancel</div>

        </form>

    </div>
</div>

<script>

    $('#editCustomPackageModal')
        .modal({
            closable  : true,
            onDeny    : function(){
            },
            onApprove : function() {
                return false;
            }
        })
        .modal('hide');

    $('#editCustomPackage')
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
                $('#editCustomPackageModal').modal('hide');
                hiq.submitEditCustomPackage();
                event.preventDefault();
            }
        });
</script>




