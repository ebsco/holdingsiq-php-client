<?php ?>
<!-- VENDOR SEARCH -->
<form id="vendorSearchForm"
      class="ui form"
      action="javascript:void(0)"
      onsubmit="return hiq.getVendors(this);">

    <div style="margin-top: 15px;" class="ui fluid category search">
        <div style="width: 100%" class="ui icon input">
            <input class="prompt" type="text" name="query" id="vendorQuery" placeholder="Search providers...">
            <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>

    <button style="margin-top: 15px; width: 100%" class="ui button" type="submit">Search</button>

    <div class="ui accordion">
        <div class="active title">
            <i class="dropdown icon"></i>
            Sort Options
        </div>
        <div class="active content">
            <div style="margin-left: 25px" class="grouped fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="relevance" type="radio" name="vendorsort" checked="" tabindex="0" class="hidden">
                        <label>Relevance</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="vendorname" type="radio" name="vendorsort" tabindex="0" class="hidden">
                        <label>Provider</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>