<?php ?>

<div id="addTitleToCustomPackageModal" class="ui modal">

    <i class="close icon"></i>
    <div class="header">
        Add title to custom package
    </div>
    <div class="content">

        <!-- form -->
        <form id="addTitleToCustomPackageForm"
              class="ui form"
              action="javascript:void(0)">

            <!-- title id or kbid -->
            <input id="addCustomTitleId" type="hidden">
            <!-- title name, required -->
            <input id="addCustomTitleName" type="hidden">
            <!-- pub type, required -->
            <input id="addCustomTitlePubType" type="hidden">

            <!-- package -->
            <div class="field required">
                <label>Package</label>
                <div id="addCustomTitlePackageDropdown" class="ui selection dropdown">
                    <input id="addCustomTitlePackage" type="hidden" name="addCustomTitlePackage">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select a custom package...</div>
                    <div id="addCustomTitlePackageDropdownSelect" class="menu">

                    </div>
                </div>
            </div>

            <!-- url -->
            <div class="field">
                <label>Custom URL</label>
                <input id="addTitleCustomTitleUrl" name="customTaddTitleCustomTitleUrlitleUrl" type="text" placeholder="Enter URL here...">
            </div>

            <!-- buttons -->
            <div class="ui divider"></div>
            <div class="ui positive button" onclick="$('#addTitleToCustomPackageForm').submit();")>Save</div>
            <div class="ui button" onclick="hiq.cancelAddTitleToCustomPackage();">Cancel</div>

        </form>

    </div>
</div>

<script>

    $('#addTitleToCustomPackageModal')
        .modal({
            closable  : true,
            onDeny    : function(){
            },
            onApprove : function() {
                return false;
            }
        })
        .modal('hide');

    $('#addTitleToCustomPackageForm')
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
                $('#addTitleToCustomPackageModal').modal('hide');
                hiq.submitAddTitleToCustomPackage();
                event.preventDefault();
            }
        });
</script>




