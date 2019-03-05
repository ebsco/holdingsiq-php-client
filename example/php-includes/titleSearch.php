<?php ?>

<!-- TITLE SEARCH -->
<form id="titleSearchForm"
      class="ui form"
      style="display: none"
      action="javascript:void(0)"
      onsubmit="return hiq.getTitles(this);">

    <div style="margin-top: 15px;" class="ui fluid category search">
        <div style="width: 100%" class="ui icon input">
            <input class="prompt" type="text" name="query" id="titleQuery" placeholder="Search titles...">
            <i class="search icon"></i>
        </div>
        <div class="results"></div>
    </div>

    <button style="margin-top: 15px; width: 100%" class="ui button" type="submit">Search</button>
    <!-- SEARCH FIELDS -->
    <div class="ui accordion">
        <div class="active title">
            <i class="dropdown icon"></i>
            Search within
        </div>
        <div class="active content">
            <div style="margin-left: 25px" class="grouped fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="titlename" type="radio" name="titleSearchField" checked="" tabindex="0" class="hidden">
                        <label>Title</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="publisher" type="radio" name="titleSearchField" tabindex="0" class="hidden">
                        <label>Publisher</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="isxn" type="radio" name="titleSearchField" tabindex="0" class="hidden">
                        <label>ISSN/ISBN</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="subject" type="radio" name="titleSearchField" tabindex="0" class="hidden">
                        <label>Subject</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <input value="relevance" type="radio" name="titleSort" checked="" tabindex="0" class="hidden">
                        <label>Relevance</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="titlename" type="radio" name="titleSort" tabindex="0" class="hidden">
                        <label>Title name</label>
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
                        <input value="all" type="radio" name="titleSelection" checked="" tabindex="0" class="hidden">
                        <label>All</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="selected" type="radio" name="titleSelection" tabindex="0" class="hidden">
                        <label>Selected</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="notselected" type="radio" name="titleSelection" tabindex="0" class="hidden">
                        <label>Not selected</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="orderedthroughebsco" type="radio" name="titleSelection" tabindex="0" class="hidden">
                        <label>Ordered through EBSCO</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- PUBLICATION TYPE -->
    <div class="ui accordion">
        <div class="active title">
            <i class="dropdown icon"></i>
            Publication type
        </div>
        <div class="active content">
            <div style="margin-left: 25px" class="grouped fields">
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="all" type="radio" name="titlePublicationType" checked="" tabindex="0" class="hidden">
                        <label>All</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="audiobook" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Audio Book</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="book" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Book</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="bookseries" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Book Series</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="database" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Database</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="journal" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Journal</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="newsletter" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Newsletter</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="newspaper" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Newspaper</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="proceedings" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Proceedings</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="report" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Report</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="streamingaudio" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Streaming Audio</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="streamingvideo" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Streaming Video</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="thesisdissertation" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Thesis &amp; Dissertation</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="website" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Website</label>
                    </div>
                </div>
                <div class="field">
                    <div class="ui radio checkbox">
                        <input value="unspecified" type="radio" name="titlePublicationType" tabindex="0" class="hidden">
                        <label>Unspecified</label>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
