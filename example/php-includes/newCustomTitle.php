<?php ?>
<div id="newCustomTitleModal" class="ui modal">

    <i class="close icon"></i>
    <div class="header">
        Create a new custom title
    </div>
    <div class="scrolling content">
        <!-- form -->
        <form id="newCustomTitle"
              class="ui form"
              action="javascript:void(0)">

            <!-- title name -->
            <div class="field required">
                <label>Title name</label>
                <input id="customTitleName" name="customTitleName" type="text" placeholder="Enter your custom title name here...">
            </div>

            <!-- edition -->
            <div class="field">
                <label>Edition</label>
                <input id="customTitleEdition" name="customTitleEdition" type="text" placeholder="Enter edition here...">
            </div>

            <!-- publisher -->
            <div class="field">
                <label>Publisher</label>
                <input id="customTitlePublisher" name="customTitlePublisher" type="text" placeholder="Enter publisher here...">
            </div>

            <!-- description -->
            <div class="field">
                <label>Description</label>
                <textarea rid="customTitleDescription" name="customTitleDescription" rows="2"></textarea>
            </div>

            <!-- publication type -->
            <div class="field required">
                <label>Publication type</label>
                <div id="customTitlePublicationTypeDropdown" class="ui selection dropdown">
                    <input id="customTitlePublicationType" type="hidden" name="publicationType">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select the publication type...</div>
                    <div class="menu">
                        <div class="item" data-value="Audio Book">Audio Book</div>
                        <div class="item" data-value="Book">Book</div>
                        <div class="item" data-value="Book Series">Book Series</div>
                        <div class="item" data-value="Database">Database</div>
                        <div class="item" data-value="Journal">Journal</div>
                        <div class="item" data-value="Newsletter">Newsletter</div>
                        <div class="item" data-value="Newspaper">Newspaper</div>
                        <div class="item" data-value="Proceedings">Proceedings</div>
                        <div class="item" data-value="Report">Report</div>
                        <div class="item" data-value="Streaming Audio">Streaming Audio</div>
                        <div class="item" data-value="Streaming Video">Streaming Video</div>
                        <div class="item" data-value="Thesis/Disertation">Thesis & Dissertation</div>
                        <div class="item" data-value="Unspecified">Unspecified</div>
                        <div class="item" data-value="Web Site">Website</div>

                    </div>
                </div>
            </div>

            <!-- package -->
            <div class="field required">
                <label>Package</label>
                <div id="customTitlePackageDropdown" class="ui selection dropdown">
                    <input id="customTitlePackage" type="hidden" name="customTitlePackage">
                    <i class="dropdown icon"></i>
                    <div class="default text">Select a package...</div>
                    <div id="customTitlePackageDropdownSelect" class="menu">

                    </div>
                </div>
            </div>

            <!-- peer reviewed -->
            <div class="inline field">
                <div class="ui toggle checkbox">
                    <input id="customTitleIsPeerReviewed" type="checkbox" tabindex="0" class="hidden">
                    <label>Peer reviewed</label>
                </div>
            </div>

            <!-- contributors -->
            <div class="field">
                <label>Contributors</label>
                <div id="titleContribList"></div>
                <div class="ui basic button" onclick="hiq.addNewCustomTitleContrib();">+ Add contributor</div>
            </div>

            <!-- date ranges -->
            <div class="field">
                <label>Coverage settings</label>
                <div id="titleCoverage"></div>
                <div class="ui basic button" onclick="hiq.addNewCustomTitleDateRange();">+ Add date range</div>
            </div>

            <!-- identifiers -->
            <div class="field">
                <label>Identifiers</label>
                <div id="titleIdentList"></div>
                <div class="ui basic button" onclick="hiq.addNewCustomTitleIdent();">+ Add identifier</div>
            </div>


            <div class="content">
                <div class="ui divider"></div>
                <!-- buttons -->
                <div class="ui positive button" onclick="$('#newCustomTitle').submit();")>Save</div>
                <div class="ui button" onclick="hiq.cancelNewCustomTitle();">Cancel</div>
            </div>

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

    $('#newCustomTitle')
        .form({
            fields: {
                customPackageName: {
                    rules: [
                        {
                            type: 'empty',
                            prompt: 'Please enter a title name'
                        }
                    ]
                }
            },
            onSuccess: function(event, fields) {
                $('#newCustomTitleModal').modal('hide');
                hiq.submitNewCustomTitle();
                event.preventDefault();
            }
        });
</script>

<div id="newCustomTitleSuccess" style="display: none;" class="ui success message">
    <div class="header">Custom Title Created</div>
    <p>Your custom title has been created.</p>
</div>

