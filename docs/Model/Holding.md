# Holding

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**publication_title** | **string** | Title of the serial or monograph being represented.  Conference proceedings serial title should be entered as a serial title, while conference proceeding volume titles should be entered as a monograph title. | 
**print_identifier** | **string** | ISSN or ISBN of the print version of the work.  Note: If the item is a book and has both an ISBN and ISSN, use ISBN. | 
**online_identifier** | **string** | ISSN or ISBN of the online version of work. Note:  If item is a book and has both an ISBN and ISSN, use the ISBN. | 
**date_first_issue_online** | **string** | The publication date of the earliest serial issue available online in the format of yyyy-mm-dd. Applicable only to serials. | 
**num_first_vol_online** | **string** | The volume number of the earliest serial issue available online. Applicable only to serials. | 
**num_first_issue_online** | **string** | The issue number of the earliest serial issue available online. Applicable only to serials. | 
**date_last_issue_online** | **string** | Date of the latest serial issue available online. Leave blank if coverage is to present. Applicable only to serials. | 
**num_last_vol_online** | **string** | The volume number of the latest serial issue available online. Leave blank if coverage is to present. Applicable only to serials. | 
**num_last_issue_online** | **string** | The issue number of the latest serial issue available online. Leave blank if coverage is to present. Applicable only to serials. | 
**title_url** | **string** | Title-level URL. Applicable to both monographs and serials. For conference proceeding, the title_url for the series and the title_url for each volume should be different. | 
**first_author** | **string** | First author of the monograph. Applicable only to monographs. | 
**title_id** | **string** | The unique identifier for the title. This is the report provider&#x27;s proprietary identifier. | 
**embargo_info** | **string** | Embargo information as a coded string following rules in section 6.6.14 of the KBART recommended practice (i.e. &#x27;P1Y&#x27; means an embargo is period of 1 year.) | 
**coverage_depth** | **string** | Coverage depth is defined in 6.6.15 of the KBART recommended practice. Multiple coverage depths can be specified with a semicolon to delimit values. | 
**notes** | **string** | Free text field to describe the specifics of the coverage policy. | 
**publisher_name** | **string** | Name of the publisher of the work. Not to be confused with the name of the hosting platform. | 
**publication_type** | **string** | Serial or Monograph. Use &#x27;serial&#x27; for journals, book series and conference proceeding series. Use &#x27;monograph&#x27; for books and individual conference proceeding volumes. | 
**date_monograph_published_print** | **string** | Date the monograph was first published in print. Applies to monographs only. | 
**date_monograph_published_online** | **string** | Date the monograph was first published online. Applies to monographs only. | 
**monograph_volume** | **string** | Number of the particular volume of the monograph. Applicable to ebooks and conference proceedings. For conference proceedings, use the volume within the conference proceedings series. | 
**monograph_edition** | **string** | Edition of the monograph. | 
**first_editor** | **string** | First editor. Applicable to monographs only. | 
**parent_publication_title_id** | **string** | Title identifier of the parent publication. For a conference proceeding, this would be the title_id of the overall conference proceeding series. | 
**preceding_publication_title_id** | **string** | The title identifier of any preceding publication title for serials and conference proceeding serials.  The publisher&#x27;s proprietary identifier should be used where it exists. | 
**access_type** | **string** | Indicates if the content in the journal is F-Free, P-Paid, H-Hybrid, PF-Paid then Free after embargo period.  The default is P-Paid. | 
**package_name** | **string** | Name of the package or full text database this title is part of. This should match the name of the same package as it appears in the KBARTManifest. | 
**package_id** | **string** | The provider&#x27;s identifier for the package or full text database this title is part of. This should match the package_id of the same package as it appears in the KBARTManifest. | 
**vendor_name** | **string** | Provider Name | 
**vendor_id** | **int** | EBSCO KB&#x27;s unique identifier for the provider. | 
**resource_type** | **string** | EBSCO&#x27;s Resource_Type in textual form. | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)

