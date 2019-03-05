<?php ?>

<!-- PACKAGE SEARCH -->
<form id="packageSearchForm"
      class="ui form"
      style="display: none"
      action="javascript:void(0)"
      onsubmit="return hiq.getPackages(this);">

    <div style="margin-top: 15px;" class="ui fluid category search">
        <div style="width: 100%" class="ui icon input">
            <input class="prompt" type="text" name="query" id="packageQuery" placeholder="Search packages...">
            <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>

    <button style="margin-top: 15px; width: 100%" class="ui button" type="submit">Search</button>
    <!-- SORT OPTIONS -->
    <div class="ui accordion">
        <div class="active title">
            <i class="dropdown icon"></i>
            Sort options
        </div>
        <div class="active content">
            <div style="margin-left: 25px" class="grouped fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="relevance" type="radio" name="packagesort" checked="" tabindex="0" class="hidden">
                        <label>Relevance</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="packagename" type="radio" name="packagesort" tabindex="0" class="hidden">
                        <label>Package name</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SELECTION STATUS -->
    <div class="ui accordion">
        <div class="active title">
            <i class="dropdown icon"></i>
            Selection status
        </div>
        <div class="active content">
            <div style="margin-left: 25px" class="grouped fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="all" type="radio" name="packageSelection" checked="" tabindex="0" class="hidden">
                        <label>All</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="selected" type="radio" name="packageSelection" tabindex="0" class="hidden">
                        <label>Selected</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="notselected" type="radio" name="packageSelection" tabindex="0" class="hidden">
                        <label>Not selected</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="orderedthroughebsco" type="radio" name="packageSelection" tabindex="0" class="hidden">
                        <label>Ordered through EBSCO</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT TYPE -->
    <div class="ui accordion">
        <div class="active title">
            <i class="dropdown icon"></i>
            Content type
        </div>
        <div class="active content">
            <div style="margin-left: 25px" class="grouped fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="all" type="radio" name="packageContentType" checked="" tabindex="0" class="hidden">
                        <label>All</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="aggregatedfulltext" type="radio" name="packageContentType" tabindex="0" class="hidden">
                        <label>Aggregated Full Text</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="abstractandindex" type="radio" name="packageContentType" tabindex="0" class="hidden">
                        <label>Abstract and Index</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="ebook" type="radio" name="packageContentType" tabindex="0" class="hidden">
                        <label>E-Book</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="ejournal" type="radio" name="packageContentType" tabindex="0" class="hidden">
                        <label>E-Journal</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="print" type="radio" name="packageContentType" tabindex="0" class="hidden">
                        <label>Print</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="onlinereference" type="radio" name="packageContentType" tabindex="0" class="hidden">
                        <label>Online Reference</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="unknown" type="radio" name="packageContentType" tabindex="0" class="hidden">
                        <label>Unknown</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>