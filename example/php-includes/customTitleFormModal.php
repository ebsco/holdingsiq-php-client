<?php ?>
<div id="customTitleFormModal" class="ui modal">

    <i class="close icon"></i>
    <div id="customTitleFormHeader" class="header">
        Create/Edit a custom title
    </div>
    <div class="scrolling content">
        <!-- form -->
        <form id="customTitleForm"
              class="ui form"
              action="javascript:void(0)">

            <div id="titleFormAccordians" class="ui accordion">

                <!-- title-level info -->
                <div class="active title">
                    <i class="dropdown icon"></i>
                    General Title Settings
                </div>
                <div class="active content">
                    <div style="margin-left: 25px; margin-top: 10px;" id="TitleInfoAccordian" class="ui relaxed divided list">

                        <!-- title name -->
                        <div class="field required">
                            <label>Title name</label>
                            <input id="customTitleName" name="customTitleName" type="text" placeholder="Enter your custom title name here...">
                        </div>

                        <!-- publication type -->
                        <div class="field required">
                            <label>Publication type</label>
                            <div id="customTitlePublicationTypeDropdown" class="ui selection dropdown">
                                <input id="customTitlePublicationType" type="hidden" name="publicationType">
                                <i class="dropdown icon"></i>
                                <div class="default text">Select the publication type...</div>
                                <div class="menu">
                                    <div class="item" data-value="audiobook">Audio Book</div>
                                    <div class="item" data-value="book">Book</div>
                                    <div class="item" data-value="bookseries">Book Series</div>
                                    <div class="item" data-value="database">Database</div>
                                    <div class="item" data-value="journal">Journal</div>
                                    <div class="item" data-value="newsletter">Newsletter</div>
                                    <div class="item" data-value="newspaper">Newspaper</div>
                                    <div class="item" data-value="proceedings">Proceedings</div>
                                    <div class="item" data-value="report">Report</div>
                                    <div class="item" data-value="streamingaudio">Streaming Audio</div>
                                    <div class="item" data-value="streamingvideo">Streaming Video</div>
                                    <div class="item" data-value="thesisdissertation">Thesis & Dissertation</div>
                                    <div class="item" data-value="unspecified">Unspecified</div>
                                    <div class="item" data-value="website">Website</div>
                                </div>
                            </div>
                        </div>

                        <!-- packages -->
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
                            <textarea id="customTitleDescription" name="customTitleDescription" rows="2"></textarea>
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

                        <!-- identifiers -->
                        <div class="field">
                            <label>Identifiers</label>
                            <div id="titleIdentList"></div>
                            <div class="ui basic button" onclick="hiq.addNewCustomTitleIdent();">+ Add identifier</div>
                        </div>

                    </div>
                </div>
                <!-- end title-level accordion -->

                <!-- package-title-level info -->
                <div class="active title">
                    <i class="dropdown icon"></i>
                    Package-Title Settings
                </div>
                <div class="active content">
                    <div style="margin-left: 25px; margin-top: 10px;" id="PackageTitleInfoAccordian" class="ui relaxed divided list">

                        <!-- isSelected -->
                        <div id="customTitleIsSelectedField" class="inline field">
                            <div class="ui toggle checkbox">
                                <input id="customTitleIsSelected" type="checkbox" tabindex="0" class="hidden">
                                <label>Selected</label>
                            </div>
                        </div>

                        <!-- isHidden-->
                        <div id="customTitleIsHiddenField" class="inline field">
                            <div class="ui toggle checkbox">
                                <input id="customTitleIsHidden" type="checkbox" tabindex="0" class="hidden">
                                <label>Visible to patrons</label>
                            </div>
                        </div>

                        <!-- url -->
                        <div class="field">
                            <label>URL</label>
                            <input id="customTitleUrl" name="customTitleUrl" type="text" placeholder="Enter URL here...">
                        </div>

                        <!-- coverage statement -->
                        <div class="field">
                            <label>Coverage statement</label>
                            <input id="customTitleCoverageStatement" name="customTitleCoverageStatement" type="text" placeholder="Enter coverage statment here...">
                        </div>

                        <!-- date ranges -->
                        <div class="field">
                            <label>Coverage dates</label>
                            <div id="titleCoverage"></div>
                            <div class="ui basic button" onclick="hiq.addNewCustomTitleDateRange();">+ Add date range</div>
                        </div>

                        <!-- embargo -->
                        <div class="field">
                            <label>Embargo period</label>
                            <div id="titleEmbargo"></div>
                            <div id="titleEmbargoButton" class="ui basic button" onclick="hiq.addNewCustomTitleEmbargo();">+ Add embargo period</div>
                        </div>

                    </div>
                </div>
                <!-- end package-title accordion -->

            </div>
            <!-- end accordions -->

            <div class="content">
                <div class="ui divider"></div>
                <!-- buttons -->
                <div class="ui positive button" onclick="$('#customTitleForm').submit();")>Save</div>
                <div class="ui button" onclick="hiq.cancelCustomTitleForm();">Cancel</div>
            </div>

        </form>
    </div>
</div>

<script>

    $('#customTitleFormModal')
        .modal({
            closable  : true,
            onDeny    : function(){
            },
            onApprove : function() {
                return false;
            }
        })
        .modal('hide');

    $('#customTitleForm')
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
                $('#customTitleFormModal').modal('hide');
                hiq.submitCustomTitleForm();
                event.preventDefault();
            }
        });

</script>

