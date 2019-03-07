<?php ?>

<form id="newCustomPackage"
      class="ui form"
      style="display: none"
      action="javascript:void(0)"
      onsubmit="return hiq.submitNewCustomPackage(this);">
    <div class="ui medium header">New custom package</div>
    <div class="field required">
        <label>Name</label>
        <input id="customPackageName" type="text" name="first-name" placeholder="Custom package name">
    </div>
    <div class="field">
        <div class="ui selection dropdown">
            <input id="customPackageContentType" type="hidden" name="gender">
            <i class="dropdown icon"></i>
            <div class="default text">Content type</div>
            <div class="menu">
                <div class="item" data-value="1">Aggregated Full Text</div>
                <div class="item" data-value="2">Abstract and Index</div>
                <div class="item" data-value="3">E-Book</div>
                <div class="item" data-value="4">E-Journal</div>
                <div class="item" data-value="5">Print</div>
                <div class="item" data-value="7">Online Reference</div>
                <div class="item" data-value="6">Unknown</div>
            </div>
        </div>
    </div>
    <div class="field">
        <button class="ui button" type="submit">Save</button>
    </div>
</form>

<div id="newCustomPackageSuccess" style="display: none;" class="ui success message">
    <div class="header">Custom Package Created</div>
    <p>Your custom package has been created.</p>
</div>
