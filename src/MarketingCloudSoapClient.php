<?php

namespace MarketingCloud;

use MarketingCloud\Soapwsse;
use MarketingCloud\Xmlseclibs;

class MarketingCloudSoapClient extends \SoapClient {

    public $authtoken = NULL;

    #[\ReturnTypeWillChange]
    function __doRequest($request, $location, $saction, $version, $one_way = NULL) {
        $doc = new \DOMDocument();
        $doc->loadXML($request);

        $objWSSE = new Soapwsse\WSSESoap($doc);

        //Check for authtoken
        if ($this->authtoken != null){
    			$token = $this->authtoken;
    			$objWSSE->addOAuth($doc, $token);
        }

        return parent::__doRequest($objWSSE->saveXML(), $location, $saction, $version, false);
   }

}

class MarketingCloud_APIObject {
  public $Client; // MarketingCloud_ClientID
  public $PartnerKey; // string
  public $PartnerProperties; // MarketingCloud_APIProperty
  public $CreatedDate; // dateTime
  public $ModifiedDate; // dateTime
  public $ID; // int
  public $ObjectID; // string
  public $CustomerKey; // string
  public $Owner; // MarketingCloud_Owner
  public $CorrelationID; // string
}

class MarketingCloud_ClientID {
  public $ClientID; // int
  public $ID; // int
  public $PartnerClientKey; // string
  public $UserID; // int
  public $PartnerUserKey; // string
  public $CreatedBy; // int
  public $ModifiedBy; // int
}

class MarketingCloud_APIProperty {
  public $Name; // string
  public $Value; // string
}

class MarketingCloud_Owner {
  public $Client; // MarketingCloud_ClientID
  public $FromName; // string
  public $FromAddress; // string
}

class MarketingCloud_AsyncResponseType {
  const None='None';
  const email='email';
  const FTP='FTP';
  const HTTPPost='HTTPPost';
}

class MarketingCloud_AsyncResponse {
  public $ResponseType; // MarketingCloud_AsyncResponseType
  public $ResponseAddress; // string
  public $RespondWhen; // MarketingCloud_RespondWhen
  public $IncludeResults; // boolean
  public $IncludeObjects; // boolean
  public $OnlyIncludeBase; // boolean
}

class MarketingCloud_ContainerID {
  public $APIObject; // MarketingCloud_APIObject
}

class MarketingCloud_Request {
}

class MarketingCloud_Result {
  public $StatusCode; // string
  public $StatusMessage; // string
  public $OrdinalID; // int
  public $ErrorCode; // int
  public $RequestID; // string
  public $ConversationID; // string
  public $OverallStatusCode; // string
  public $RequestType; // MarketingCloud_RequestType
  public $ResultType; // string
  public $ResultDetailXML; // string
}

class MarketingCloud_Options {
  public $Client; // MarketingCloud_ClientID
  public $SendResponseTo; // MarketingCloud_AsyncResponse
  public $SaveOptions; // MarketingCloud_SaveOptions
  public $Priority; // byte
  public $ConversationID; // string
  public $SequenceCode; // int
  public $CallsInConversation; // int
  public $ScheduledTime; // dateTime
  public $RequestType; // MarketingCloud_RequestType
  public $QueuePriority; // MarketingCloud_Priority
  public $BatchSize; // MarketingCloud_Priority
  public $IncludeObjects;
}

class MarketingCloud_SaveOptions {
  public $SaveOption; // MarketingCloud_SaveOption
}

class MarketingCloud_TaskResult {
  public $StatusCode; // string
  public $StatusMessage; // string
  public $OrdinalID; // int
  public $ErrorCode; // int
  public $ID; // string
  public $InteractionObjectID; // string
}

class MarketingCloud_SaveOption {
  public $PropertyName; // string
  public $SaveAction; // MarketingCloud_SaveAction
}

class MarketingCloud_SaveAction {
  const AddOnly='AddOnly';
  const _Default='Default';
  const Nothing='Nothing';
  const UpdateAdd='UpdateAdd';
  const UpdateOnly='UpdateOnly';
}

class MarketingCloud_NullAPIProperty {
}

class MarketingCloud_ResultMessage {
  public $RequestID; // string
  public $ConversationID; // string
  public $OverallStatusCode; // string
  public $StatusCode; // string
  public $StatusMessage; // string
  public $ErrorCode; // int
  public $RequestType; // MarketingCloud_RequestType
  public $ResultType; // string
  public $ResultDetailXML; // string
  public $SequenceCode; // int
  public $CallsInConversation; // int
}

class MarketingCloud_ResultItem {
  public $RequestID; // string
  public $ConversationID; // string
  public $StatusCode; // string
  public $StatusMessage; // string
  public $OrdinalID; // int
  public $ErrorCode; // int
  public $RequestType; // MarketingCloud_RequestType
  public $RequestObjectType; // string
}

class MarketingCloud_Priority {
  const Low='Low';
  const Medium='Medium';
  const High='High';
}

class MarketingCloud_RequestType {
  const Synchronous='Synchronous';
  const Asynchronous='Asynchronous';
}

class MarketingCloud_RespondWhen {
  const Never='Never';
  const OnError='OnError';
  const Always='Always';
  const OnConversationError='OnConversationError';
  const OnConversationComplete='OnConversationComplete';
  const OnCallComplete='OnCallComplete';
}

class MarketingCloud_CreateRequest {
  public $Options; // MarketingCloud_CreateOptions
  public $Objects; // MarketingCloud_APIObject
}

class MarketingCloud_CreateResult {
  public $NewID; // int
  public $NewObjectID; // string
  public $PartnerKey; // string
  public $Object; // MarketingCloud_APIObject
  public $CreateResults; // MarketingCloud_CreateResult
  public $ParentPropertyName; // string
}

class MarketingCloud_CreateResponse {
  public $Results; // MarketingCloud_CreateResult
  public $RequestID; // string
  public $OverallStatus; // string
}

class MarketingCloud_CreateOptions {
  public $Container; // MarketingCloud_ContainerID
}

class MarketingCloud_UpdateOptions {
  public $Container; // MarketingCloud_ContainerID
  public $Action; // string
}

class MarketingCloud_UpdateRequest {
  public $Options; // MarketingCloud_UpdateOptions
  public $Objects; // MarketingCloud_APIObject
}

class MarketingCloud_UpdateResult {
  public $Object; // MarketingCloud_APIObject
  public $UpdateResults; // MarketingCloud_UpdateResult
  public $ParentPropertyName; // string
}

class MarketingCloud_UpdateResponse {
  public $Results; // MarketingCloud_UpdateResult
  public $RequestID; // string
  public $OverallStatus; // string
}

class MarketingCloud_DeleteOptions {
}

class MarketingCloud_DeleteRequest {
  public $Options; // MarketingCloud_DeleteOptions
  public $Objects; // MarketingCloud_APIObject
}

class MarketingCloud_DeleteResult {
  public $Object; // MarketingCloud_APIObject
}

class MarketingCloud_DeleteResponse {
  public $Results; // MarketingCloud_DeleteResult
  public $RequestID; // string
  public $OverallStatus; // string
}

class MarketingCloud_RetrieveRequest {
  public $ClientIDs; // MarketingCloud_ClientID
  public $ObjectType; // string
  public $Properties; // string
  public $Filter; // MarketingCloud_FilterPart
  public $RespondTo; // MarketingCloud_AsyncResponse
  public $PartnerProperties; // MarketingCloud_APIProperty
  public $ContinueRequest; // string
  public $QueryAllAccounts; // boolean
  public $RetrieveAllSinceLastBatch; // boolean
  public $RepeatLastResult; // boolean
  public $Retrieves; // MarketingCloud_Retrieves
  public $Options; // MarketingCloud_RetrieveOptions
}

class MarketingCloud_Retrieves {
  public $Request; // MarketingCloud_Request
}

class MarketingCloud_RetrieveRequestMsg {
  public $RetrieveRequest; // MarketingCloud_RetrieveRequest
}

class MarketingCloud_RetrieveResponseMsg {
  public $OverallStatus; // string
  public $RequestID; // string
  public $Results; // MarketingCloud_APIObject
}

class MarketingCloud_RetrieveSingleRequest {
  public $RequestedObject; // MarketingCloud_APIObject
  public $RetrieveOption; // MarketingCloud_Options
}

class MarketingCloud_Parameters {
  public $Parameter; // MarketingCloud_APIProperty
}

class MarketingCloud_RetrieveSingleOptions {
  public $Parameters; // MarketingCloud_Parameters
}

class MarketingCloud_RetrieveOptions {
  public $BatchSize; // int
}

class MarketingCloud_QueryRequest {
  public $ClientIDs; // MarketingCloud_ClientID
  public $Query; // MarketingCloud_Query
  public $RespondTo; // MarketingCloud_AsyncResponse
  public $PartnerProperties; // MarketingCloud_APIProperty
  public $ContinueRequest; // string
  public $QueryAllAccounts; // boolean
  public $RetrieveAllSinceLastBatch; // boolean
}

class MarketingCloud_QueryRequestMsg {
  public $QueryRequest; // MarketingCloud_QueryRequest
}

class MarketingCloud_QueryResponseMsg {
  public $OverallStatus; // string
  public $RequestID; // string
  public $Results; // MarketingCloud_APIObject
}

class MarketingCloud_QueryObject {
  public $ObjectType; // string
  public $Properties; // string
  public $Objects; // MarketingCloud_QueryObject
}

class MarketingCloud_Query {
  public $Object; // MarketingCloud_QueryObject
  public $Filter; // MarketingCloud_FilterPart
}

class MarketingCloud_FilterPart {
}

class MarketingCloud_SimpleFilterPart {
  public $Property; // string
  public $SimpleOperator; // MarketingCloud_SimpleOperators
  public $Value; // string
  public $DateValue; // dateTime
}

class MarketingCloud_TagFilterPart {
  public $Tags; // MarketingCloud_Tags
}

class MarketingCloud_Tags {
  public $Tag; // string
}

class MarketingCloud_ComplexFilterPart {
  public $LeftOperand; // MarketingCloud_FilterPart
  public $LogicalOperator; // MarketingCloud_LogicalOperators
  public $RightOperand; // MarketingCloud_FilterPart
}

class MarketingCloud_SimpleOperators {
  const equals='equals';
  const notEquals='notEquals';
  const greaterThan='greaterThan';
  const lessThan='lessThan';
  const isNull='isNull';
  const isNotNull='isNotNull';
  const greaterThanOrEqual='greaterThanOrEqual';
  const lessThanOrEqual='lessThanOrEqual';
  const between='between';
  const IN='IN';
  const like='like';
}

class MarketingCloud_LogicalOperators {
  const _OR='OR';
  const _AND='AND';
}

class MarketingCloud_DefinitionRequestMsg {
  public $DescribeRequests; // MarketingCloud_ArrayOfObjectDefinitionRequest
}

class MarketingCloud_ArrayOfObjectDefinitionRequest {
  public $ObjectDefinitionRequest; // MarketingCloud_ObjectDefinitionRequest
}

class MarketingCloud_ObjectDefinitionRequest {
  public $Client; // MarketingCloud_ClientID
  public $ObjectType; // string
}

class MarketingCloud_DefinitionResponseMsg {
  public $ObjectDefinition; // MarketingCloud_ObjectDefinition
  public $RequestID; // string
}

class MarketingCloud_PropertyDefinition {
  public $Name; // string
  public $DataType; // string
  public $ValueType; // MarketingCloud_SoapType
  public $PropertyType; // MarketingCloud_PropertyType
  public $IsCreatable; // boolean
  public $IsUpdatable; // boolean
  public $IsRetrievable; // boolean
  public $IsQueryable; // boolean
  public $IsFilterable; // boolean
  public $IsPartnerProperty; // boolean
  public $IsAccountProperty; // boolean
  public $PartnerMap; // string
  public $AttributeMaps; // MarketingCloud_AttributeMap
  public $Markups; // MarketingCloud_APIProperty
  public $Precision; // int
  public $Scale; // int
  public $Label; // string
  public $Description; // string
  public $DefaultValue; // string
  public $MinLength; // int
  public $MaxLength; // int
  public $MinValue; // string
  public $MaxValue; // string
  public $IsRequired; // boolean
  public $IsViewable; // boolean
  public $IsEditable; // boolean
  public $IsNillable; // boolean
  public $IsRestrictedPicklist; // boolean
  public $PicklistItems; // MarketingCloud_PicklistItems
  public $IsSendTime; // boolean
  public $DisplayOrder; // int
  public $References; // MarketingCloud_References
  public $RelationshipName; // string
  public $Status; // string
  public $IsContextSpecific; // boolean
}

class MarketingCloud_PicklistItems {
  public $PicklistItem; // MarketingCloud_PicklistItem
}

class MarketingCloud_References {
  public $Reference; // MarketingCloud_APIObject
}

class MarketingCloud_ObjectDefinition {
  public $ObjectType; // string
  public $Name; // string
  public $IsCreatable; // boolean
  public $IsUpdatable; // boolean
  public $IsRetrievable; // boolean
  public $IsQueryable; // boolean
  public $IsReference; // boolean
  public $ReferencedType; // string
  public $IsPropertyCollection; // string
  public $IsObjectCollection; // boolean
  public $Properties; // MarketingCloud_PropertyDefinition
  public $ExtendedProperties; // MarketingCloud_ExtendedProperties
  public $ChildObjects; // MarketingCloud_ObjectDefinition
}

class MarketingCloud_ExtendedProperties {
  public $ExtendedProperty; // MarketingCloud_PropertyDefinition
}

class MarketingCloud_AttributeMap {
  public $EntityName; // string
  public $ColumnName; // string
  public $ColumnNameMappedTo; // string
  public $EntityNameMappedTo; // string
  public $AdditionalData; // MarketingCloud_APIProperty
}

class MarketingCloud_PicklistItem {
  public $IsDefaultValue; // boolean
  public $Label; // string
  public $Value; // string
}


class MarketingCloud_SoapType {
  const xsd_string='xsd:string';
  const xsd_boolean='xsd:boolean';
  const xsd_double='xsd:double';
  const xsd_dateTime='xsd:dateTime';
}

class MarketingCloud_PropertyType {
  const string='string';
  const boolean='boolean';
  const double='double';
  const datetime='datetime';
}

class MarketingCloud_ExecuteRequest {
  public $Client; // MarketingCloud_ClientID
  public $Name; // string
  public $Parameters; // MarketingCloud_APIProperty
}

class MarketingCloud_ExecuteResponse {
  public $StatusCode; // string
  public $StatusMessage; // string
  public $OrdinalID; // int
  public $Results; // MarketingCloud_APIProperty
  public $ErrorCode; // int
}

class MarketingCloud_ExecuteRequestMsg {
  public $Requests; // MarketingCloud_ExecuteRequest
}

class MarketingCloud_ExecuteResponseMsg {
  public $OverallStatus; // string
  public $RequestID; // string
  public $Results; // MarketingCloud_ExecuteResponse
}

class MarketingCloud_InteractionDefinition {
  public $InteractionObjectID; // string
}

class MarketingCloud_InteractionBaseObject {
  public $Name; // string
  public $Description; // string
  public $Keyword; // string
}

class MarketingCloud_PerformOptions {
}

class MarketingCloud_CampaignPerformOptions {
  public $OccurrenceIDs; // string
  public $OccurrenceIDsIndex; // int
}

class MarketingCloud_PerformRequest {
  public $Client; // MarketingCloud_ClientID
  public $Action; // string
  public $Definitions; // MarketingCloud_Definitions
}

class MarketingCloud_Definitions {
  public $Definition; // MarketingCloud_InteractionBaseObject
}

class MarketingCloud_PerformResponse {
  public $StatusCode; // string
  public $StatusMessage; // string
  public $OrdinalID; // int
  public $Results; // MarketingCloud_Results
  public $ErrorCode; // int
}

class MarketingCloud_Results {
  public $Result; // MarketingCloud_APIProperty
}

class MarketingCloud_PerformResult {
  public $Object; // MarketingCloud_InteractionBaseObject
  public $Task; // MarketingCloud_TaskResult
}

class MarketingCloud_PerformRequestMsg {
  public $Options; // MarketingCloud_PerformOptions
  public $Action; // string
  public $Definitions; // MarketingCloud_Definitions
}



class MarketingCloud_PerformResponseMsg {
  public $Results; // MarketingCloud_Results
  public $OverallStatus; // string
  public $OverallStatusMessage; // string
  public $RequestID; // string
}



class MarketingCloud_ConfigureOptions {
}

class MarketingCloud_ConfigureResult {
  public $Object; // MarketingCloud_APIObject
}

class MarketingCloud_ConfigureRequestMsg {
  public $Options; // MarketingCloud_ConfigureOptions
  public $Action; // string
  public $Configurations; // MarketingCloud_Configurations
}

class MarketingCloud_Configurations {
  public $Configuration; // MarketingCloud_APIObject
}

class MarketingCloud_ConfigureResponseMsg {
  public $Results; // MarketingCloud_Results
  public $OverallStatus; // string
  public $OverallStatusMessage; // string
  public $RequestID; // string
}



class MarketingCloud_ScheduleDefinition {
  public $Name; // string
  public $Description; // string
  public $Recurrence; // MarketingCloud_Recurrence
  public $RecurrenceType; // MarketingCloud_RecurrenceTypeEnum
  public $RecurrenceRangeType; // MarketingCloud_RecurrenceRangeTypeEnum
  public $StartDateTime; // dateTime
  public $EndDateTime; // dateTime
  public $Occurrences; // int
  public $Keyword; // string
}

class MarketingCloud_ScheduleOptions {
}

class MarketingCloud_ScheduleResponse {
  public $StatusCode; // string
  public $StatusMessage; // string
  public $OrdinalID; // int
  public $Results; // MarketingCloud_Results
  public $ErrorCode; // int
}



class MarketingCloud_ScheduleResult {
  public $Object; // MarketingCloud_ScheduleDefinition
  public $Task; // MarketingCloud_TaskResult
}

class MarketingCloud_ScheduleRequestMsg {
  public $Options; // MarketingCloud_ScheduleOptions
  public $Action; // string
  public $Schedule; // MarketingCloud_ScheduleDefinition
  public $Interactions; // MarketingCloud_Interactions
}

class MarketingCloud_Interactions {
  public $Interaction; // MarketingCloud_InteractionBaseObject
}

class MarketingCloud_ScheduleResponseMsg {
  public $Results; // MarketingCloud_Results
  public $OverallStatus; // string
  public $OverallStatusMessage; // string
  public $RequestID; // string
}



class MarketingCloud_RecurrenceTypeEnum {
  const Secondly='Secondly';
  const Minutely='Minutely';
  const Hourly='Hourly';
  const Daily='Daily';
  const Weekly='Weekly';
  const Monthly='Monthly';
  const Yearly='Yearly';
}

class MarketingCloud_RecurrenceRangeTypeEnum {
  const EndAfter='EndAfter';
  const EndOn='EndOn';
}

class MarketingCloud_Recurrence {
}

class MarketingCloud_HourlyRecurrencePatternTypeEnum {
  const Interval='Interval';
}

class MarketingCloud_DailyRecurrencePatternTypeEnum {
  const Interval='Interval';
  const EveryWeekDay='EveryWeekDay';
}

class MarketingCloud_WeeklyRecurrencePatternTypeEnum {
  const ByDay='ByDay';
}

class MarketingCloud_MonthlyRecurrencePatternTypeEnum {
  const ByDay='ByDay';
  const ByWeek='ByWeek';
}

class MarketingCloud_WeekOfMonthEnum {
  const first='first';
  const second='second';
  const third='third';
  const fourth='fourth';
  const last='last';
}

class MarketingCloud_DayOfWeekEnum {
  const Sunday='Sunday';
  const Monday='Monday';
  const Tuesday='Tuesday';
  const Wednesday='Wednesday';
  const Thursday='Thursday';
  const Friday='Friday';
  const Saturday='Saturday';
}

class MarketingCloud_YearlyRecurrencePatternTypeEnum {
  const ByDay='ByDay';
  const ByWeek='ByWeek';
  const ByMonth='ByMonth';
}

class MarketingCloud_MonthOfYearEnum {
  const January='January';
  const February='February';
  const March='March';
  const April='April';
  const May='May';
  const June='June';
  const July='July';
  const August='August';
  const September='September';
  const October='October';
  const November='November';
  const December='December';
}

class MarketingCloud_HourlyRecurrence {
  public $HourlyRecurrencePatternType; // MarketingCloud_HourlyRecurrencePatternTypeEnum
  public $HourInterval; // int
}

class MarketingCloud_DailyRecurrence {
  public $DailyRecurrencePatternType; // MarketingCloud_DailyRecurrencePatternTypeEnum
  public $DayInterval; // int
}

class MarketingCloud_WeeklyRecurrence {
  public $WeeklyRecurrencePatternType; // MarketingCloud_WeeklyRecurrencePatternTypeEnum
  public $WeekInterval; // int
  public $Sunday; // boolean
  public $Monday; // boolean
  public $Tuesday; // boolean
  public $Wednesday; // boolean
  public $Thursday; // boolean
  public $Friday; // boolean
  public $Saturday; // boolean
}

class MarketingCloud_MonthlyRecurrence {
  public $MonthlyRecurrencePatternType; // MarketingCloud_MonthlyRecurrencePatternTypeEnum
  public $MonthlyInterval; // int
  public $ScheduledDay; // int
  public $ScheduledWeek; // MarketingCloud_WeekOfMonthEnum
  public $ScheduledDayOfWeek; // MarketingCloud_DayOfWeekEnum
}

class MarketingCloud_YearlyRecurrence {
  public $YearlyRecurrencePatternType; // MarketingCloud_YearlyRecurrencePatternTypeEnum
  public $ScheduledDay; // int
  public $ScheduledWeek; // MarketingCloud_WeekOfMonthEnum
  public $ScheduledMonth; // MarketingCloud_MonthOfYearEnum
  public $ScheduledDayOfWeek; // MarketingCloud_DayOfWeekEnum
}

class MarketingCloud_ExtractRequest {
  public $Client; // MarketingCloud_ClientID
  public $ID; // string
  public $Options; // MarketingCloud_ExtractOptions
  public $Parameters; // MarketingCloud_Parameters
  public $Description; // MarketingCloud_ExtractDescription
  public $Definition; // MarketingCloud_ExtractDefinition
}



class MarketingCloud_ExtractResult {
  public $Request; // MarketingCloud_ExtractRequest
}

class MarketingCloud_ExtractRequestMsg {
  public $Requests; // MarketingCloud_ExtractRequest
}

class MarketingCloud_ExtractResponseMsg {
  public $OverallStatus; // string
  public $RequestID; // string
  public $Results; // MarketingCloud_ExtractResult
}

class MarketingCloud_ExtractOptions {
}

class MarketingCloud_ExtractParameter {
}

class MarketingCloud_ExtractTemplate {
  public $Name; // string
  public $ConfigurationPage; // string
}

class MarketingCloud_ExtractDescription {
  public $Parameters; // MarketingCloud_Parameters
}



class MarketingCloud_ExtractDefinition {
  public $Parameters; // MarketingCloud_Parameters
}



class MarketingCloud_ExtractParameterDataType {
  const datetime='datetime';
  const bool='bool';
  const string='string';
  const integer='integer';
}

class MarketingCloud_ParameterDescription {
}

class MarketingCloud_ExtractParameterDescription {
  public $Name; // string
  public $DataType; // MarketingCloud_ExtractParameterDataType
  public $DefaultValue; // string
  public $IsOptional; // boolean
}

class MarketingCloud_VersionInfoResponse {
  public $Version; // string
  public $VersionDate; // dateTime
  public $Notes; // string
  public $VersionHistory; // MarketingCloud_VersionInfoResponse
}

class MarketingCloud_VersionInfoRequestMsg {
  public $IncludeVersionHistory; // boolean
}

class MarketingCloud_VersionInfoResponseMsg {
  public $VersionInfo; // MarketingCloud_VersionInfoResponse
  public $RequestID; // string
}

class MarketingCloud_Account {
  public $AccountType; // MarketingCloud_AccountTypeEnum
  public $ParentID; // int
  public $BrandID; // int
  public $PrivateLabelID; // int
  public $ReportingParentID; // int
  public $Name; // string
  public $Email; // string
  public $FromName; // string
  public $BusinessName; // string
  public $Phone; // string
  public $Address; // string
  public $Fax; // string
  public $City; // string
  public $State; // string
  public $Zip; // string
  public $Country; // string
  public $IsActive; // int
  public $IsTestAccount; // boolean
  public $OrgID; // int
  public $DBID; // int
  public $ParentName; // string
  public $CustomerID; // long
  public $DeletedDate; // dateTime
  public $EditionID; // int
  public $Children; // MarketingCloud_AccountDataItem
  public $Subscription; // MarketingCloud_Subscription
  public $PrivateLabels; // MarketingCloud_PrivateLabel
  public $BusinessRules; // MarketingCloud_BusinessRule
  public $AccountUsers; // MarketingCloud_AccountUser
  public $InheritAddress; // boolean
}

class MarketingCloud_AccountTypeEnum {
  const None='None';
  const EXACTTARGET='EXACTTARGET';
  const PRO_CONNECT='PRO_CONNECT';
  const CHANNEL_CONNECT='CHANNEL_CONNECT';
  const CONNECT='CONNECT';
  const PRO_CONNECT_CLIENT='PRO_CONNECT_CLIENT';
  const LP_MEMBER='LP_MEMBER';
  const DOTO_MEMBER='DOTO_MEMBER';
  const ENTERPRISE_2='ENTERPRISE_2';
  const BUSINESS_UNIT='BUSINESS_UNIT';
}

class MarketingCloud_AccountDataItem {
  public $ChildAccountID; // int
  public $BrandID; // int
  public $PrivateLabelID; // int
  public $AccountType; // int
}

class MarketingCloud_Subscription {
  public $SubscriptionID; // int
  public $EmailsPurchased; // int
  public $AccountsPurchased; // int
  public $AdvAccountsPurchased; // int
  public $LPAccountsPurchased; // int
  public $DOTOAccountsPurchased; // int
  public $BUAccountsPurchased; // int
  public $BeginDate; // dateTime
  public $EndDate; // dateTime
  public $Notes; // string
  public $Period; // string
  public $NotificationTitle; // string
  public $NotificationMessage; // string
  public $NotificationFlag; // string
  public $NotificationExpDate; // dateTime
  public $ForAccounting; // string
  public $HasPurchasedEmails; // boolean
}

class MarketingCloud_PrivateLabel {
  public $ID; // int
  public $Name; // string
  public $ColorPaletteXML; // string
  public $LogoFile; // string
  public $Delete; // int
  public $SetActive; // boolean
}

class MarketingCloud_AccountPrivateLabel {
  public $Name; // string
  public $OwnerMemberID; // int
  public $ColorPaletteXML; // string
}

class MarketingCloud_BusinessRule {
  public $MemberBusinessRuleID; // int
  public $BusinessRuleID; // int
  public $Data; // int
  public $Quality; // string
  public $Name; // string
  public $Type; // string
  public $Description; // string
  public $IsViewable; // boolean
  public $IsInheritedFromParent; // boolean
  public $DisplayName; // string
  public $ProductCode; // string
}

class MarketingCloud_AccountUser {
  public $AccountUserID; // int
  public $UserID; // string
  public $Password; // string
  public $Name; // string
  public $Email; // string
  public $MustChangePassword; // boolean
  public $ActiveFlag; // boolean
  public $ChallengePhrase; // string
  public $ChallengeAnswer; // string
  public $UserPermissions; // MarketingCloud_UserAccess
  public $Delete; // int
  public $LastSuccessfulLogin; // dateTime
  public $IsAPIUser; // boolean
  public $NotificationEmailAddress; // string
  public $IsLocked; // boolean
  public $Unlock; // boolean
  public $BusinessUnit; // int
  public $DefaultBusinessUnit; // int
}

class MarketingCloud_UserAccess {
  public $Name; // string
  public $Value; // string
  public $Description; // string
  public $Delete; // int
}

class MarketingCloud_Brand {
  public $BrandID; // int
  public $Label; // string
  public $Comment; // string
  public $BrandTags; // MarketingCloud_BrandTag
}

class MarketingCloud_BrandTag {
  public $BrandID; // int
  public $Label; // string
  public $Data; // string
}

class MarketingCloud_Email {
  public $Name; // string
  public $Folder; // string
  public $CategoryID; // int
  public $HTMLBody; // string
  public $TextBody; // string
  public $ContentAreas; // MarketingCloud_ContentArea
  public $Subject; // string
  public $IsActive; // boolean
  public $IsHTMLPaste; // boolean
  public $ClonedFromID; // int
  public $Status; // string
  public $EmailType; // string
  public $CharacterSet; // string
  public $HasDynamicSubjectLine; // boolean
  public $ContentCheckStatus; // string
}

class MarketingCloud_ContentArea {
  public $Key; // string
  public $Content; // string
  public $IsBlank; // boolean
  public $CategoryID; // int
  public $Name; // string
  public $Layout; // MarketingCloud_LayoutType
  public $IsDynamicContent; // boolean
  public $IsSurvey; // boolean
}

class MarketingCloud_LayoutType {
  const HTMLWrapped='HTMLWrapped';
  const RawText='RawText';
  const SMS='SMS';
}

class MarketingCloud_Message {
  public $TextBody; // string
}

class MarketingCloud_TrackingEvent {
  public $SendID; // int
  public $SubscriberKey; // string
  public $EventDate; // dateTime
  public $EventType; // MarketingCloud_EventType
  public $TriggeredSendDefinitionObjectID; // string
  public $BatchID; // int
}

class MarketingCloud_EventType {
  const Open='Open';
  const Click='Click';
  const HardBounce='HardBounce';
  const SoftBounce='SoftBounce';
  const OtherBounce='OtherBounce';
  const Unsubscribe='Unsubscribe';
  const Sent='Sent';
  const NotSent='NotSent';
  const Survey='Survey';
  const ForwardedEmail='ForwardedEmail';
  const ForwardedEmailOptIn='ForwardedEmailOptIn';
}

class MarketingCloud_OpenEvent {
}

class MarketingCloud_BounceEvent {
  public $SMTPCode; // string
  public $BounceCategory; // string
  public $SMTPReason; // string
  public $BounceType; // string
}

class MarketingCloud_UnsubEvent {
}

class MarketingCloud_ClickEvent {
  public $URLID; // int
  public $URL; // string
}

class MarketingCloud_SentEvent {
}

class MarketingCloud_NotSentEvent {
}

class MarketingCloud_SurveyEvent {
  public $Question; // string
  public $Answer; // string
}

class MarketingCloud_ForwardedEmailEvent {
}

class MarketingCloud_ForwardedEmailOptInEvent {
  public $OptInSubscriberKey; // string
}

class MarketingCloud_Subscriber {
  public $EmailAddress; // string
  public $Attributes; // MarketingCloud_Attribute
  public $SubscriberKey; // string
  public $UnsubscribedDate; // dateTime
  public $Status; // MarketingCloud_SubscriberStatus
  public $PartnerType; // string
  public $EmailTypePreference; // MarketingCloud_EmailType
  public $Lists; // MarketingCloud_SubscriberList
  public $GlobalUnsubscribeCategory; // MarketingCloud_GlobalUnsubscribeCategory
  public $SubscriberTypeDefinition; // MarketingCloud_SubscriberTypeDefinition
}

class MarketingCloud_Attribute {
  public $Name; // string
  public $Value; // string
}

class MarketingCloud_SubscriberStatus {
  const Active='Active';
  const Bounced='Bounced';
  const Held='Held';
  const Unsubscribed='Unsubscribed';
  const Deleted='Deleted';
}

class MarketingCloud_SubscriberTypeDefinition {
  public $SubscriberType; // string
}

class MarketingCloud_EmailType {
  const Text='Text';
  const HTML='HTML';
}

class MarketingCloud_ListSubscriber {
  public $Status; // MarketingCloud_SubscriberStatus
  public $ListID; // int
  public $SubscriberKey; // string
}

class MarketingCloud_SubscriberList {
  public $Status; // MarketingCloud_SubscriberStatus
  public $List; // MarketingCloud_List
  public $Action; // string
}

class MarketingCloud_List {
  public $ListName; // string
  public $Category; // int
  public $Type; // MarketingCloud_ListTypeEnum
  public $Description; // string
  public $Subscribers; // MarketingCloud_Subscriber
}

class MarketingCloud_ListTypeEnum {
  const _Public='Public';
  const _Private='Private';
  const SalesForce='SalesForce';
  const GlobalUnsubscribe='GlobalUnsubscribe';
  const Master='Master';
}

class MarketingCloud_Group {
  public $Name; // string
  public $Category; // int
  public $Description; // string
  public $Subscribers; // MarketingCloud_Subscriber
}

class MarketingCloud_GlobalUnsubscribeCategory {
  public $Name; // string
  public $IgnorableByPartners; // boolean
  public $Ignore; // boolean
}

class MarketingCloud_Campaign {
}

class MarketingCloud_Send {
  public $Email; // MarketingCloud_Email
  public $List; // MarketingCloud_List
  public $SendDate; // dateTime
  public $FromAddress; // string
  public $FromName; // string
  public $Duplicates; // int
  public $InvalidAddresses; // int
  public $ExistingUndeliverables; // int
  public $ExistingUnsubscribes; // int
  public $HardBounces; // int
  public $SoftBounces; // int
  public $OtherBounces; // int
  public $ForwardedEmails; // int
  public $UniqueClicks; // int
  public $UniqueOpens; // int
  public $NumberSent; // int
  public $NumberDelivered; // int
  public $Unsubscribes; // int
  public $MissingAddresses; // int
  public $Subject; // string
  public $PreviewURL; // string
  public $Links; // MarketingCloud_Link
  public $Events; // MarketingCloud_TrackingEvent
  public $SentDate; // dateTime
  public $EmailName; // string
  public $Status; // string
  public $IsMultipart; // boolean
  public $SendLimit; // int
  public $SendWindowOpen; // time
  public $SendWindowClose; // time
  public $IsAlwaysOn; // boolean
}

class MarketingCloud_Link {
  public $LastClicked; // dateTime
  public $Alias; // string
  public $TotalClicks; // int
  public $UniqueClicks; // int
  public $URL; // string
  public $Subscribers; // MarketingCloud_TrackingEvent
}

class MarketingCloud_SendSummary {
  public $AccountID; // int
  public $AccountName; // string
  public $AccountEmail; // string
  public $IsTestAccount; // boolean
  public $SendID; // int
  public $DeliveredTime; // string
  public $TotalSent; // int
  public $Transactional; // int
  public $NonTransactional; // int
}

class MarketingCloud_TriggeredSendDefinition {
  public $TriggeredSendType; // MarketingCloud_TriggeredSendTypeEnum
  public $TriggeredSendStatus; // MarketingCloud_TriggeredSendStatusEnum
  public $Email; // MarketingCloud_Email
  public $List; // MarketingCloud_List
  public $AutoAddSubscribers; // boolean
  public $AutoUpdateSubscribers; // boolean
  public $BatchInterval; // int
  public $BccEmail; // string
  public $EmailSubject; // string
  public $DynamicEmailSubject; // string
  public $IsMultipart; // boolean
  public $IsWrapped; // boolean
  public $AllowedSlots; // short
  public $NewSlotTrigger; // int
  public $SendLimit; // int
  public $SendWindowOpen; // time
  public $SendWindowClose; // time
  public $SendWindowDelete; // boolean
  public $RefreshContent; // boolean
  public $ExclusionFilter; // string
  public $Priority; // string
  public $SendSourceCustomerKey; // string
  public $ExclusionListCollection; // MarketingCloud_TriggeredSendExclusionList
  public $CCEmail; // string
  public $SendSourceDataExtension; // MarketingCloud_DataExtension
  public $IsAlwaysOn; // boolean
}

class MarketingCloud_TriggeredSendExclusionList {
}

class MarketingCloud_TriggeredSendTypeEnum {
  const Continuous='Continuous';
  const Batched='Batched';
  const Scheduled='Scheduled';
}

class MarketingCloud_TriggeredSendStatusEnum {
  const _New='New';
  const Inactive='Inactive';
  const Active='Active';
  const Canceled='Canceled';
  const Deleted='Deleted';
}

class MarketingCloud_TriggeredSend {
  public $TriggeredSendDefinition; // MarketingCloud_TriggeredSendDefinition
  public $Subscribers; // MarketingCloud_Subscriber
  public $Attributes; // MarketingCloud_Attribute
}

class MarketingCloud_TriggeredSendCreateResult {
  public $SubscriberFailures; // MarketingCloud_SubscriberResult
}

class MarketingCloud_SubscriberResult {
  public $Subscriber; // MarketingCloud_Subscriber
  public $ErrorCode; // string
  public $ErrorDescription; // string
  public $Ordinal; // int
}

class MarketingCloud_SubscriberSendResult {
  public $Send; // MarketingCloud_Send
  public $Email; // MarketingCloud_Email
  public $Subscriber; // MarketingCloud_Subscriber
  public $ClickDate; // dateTime
  public $BounceDate; // dateTime
  public $OpenDate; // dateTime
  public $SentDate; // dateTime
  public $LastAction; // string
  public $UnsubscribeDate; // dateTime
  public $FromAddress; // string
  public $FromName; // string
  public $TotalClicks; // int
  public $UniqueClicks; // int
  public $Subject; // string
  public $ViewSentEmailURL; // string
}

class MarketingCloud_TriggeredSendSummary {
  public $TriggeredSendDefinition; // MarketingCloud_TriggeredSendDefinition
  public $Sent; // long
  public $NotSentDueToOptOut; // long
  public $NotSentDueToUndeliverable; // long
  public $Bounces; // long
  public $Opens; // long
  public $Clicks; // long
  public $UniqueOpens; // long
  public $UniqueClicks; // long
  public $OptOuts; // long
  public $SurveyResponses; // long
  public $FTAFRequests; // long
  public $FTAFEmailsSent; // long
  public $FTAFOptIns; // long
  public $Conversions; // long
  public $UniqueConversions; // long
  public $InProcess; // long
  public $NotSentDueToError; // long
}

class MarketingCloud_AsyncRequestResult {
  public $Status; // string
  public $CompleteDate; // dateTime
  public $CallStatus; // string
  public $CallMessage; // string
}

class MarketingCloud_VoiceTriggeredSend {
  public $VoiceTriggeredSendDefinition; // MarketingCloud_VoiceTriggeredSendDefinition
  public $Subscriber; // MarketingCloud_Subscriber
  public $Message; // string
  public $Number; // string
}

class MarketingCloud_VoiceTriggeredSendDefinition {
}

class MarketingCloud_SMSTriggeredSend {
  public $SMSTriggeredSendDefinition; // MarketingCloud_SMSTriggeredSendDefinition
  public $Subscriber; // MarketingCloud_Subscriber
  public $Message; // string
  public $Number; // string
}

class MarketingCloud_SMSTriggeredSendDefinition {
}

class MarketingCloud_SendClassification {
  public $SendClassificationType; // MarketingCloud_SendClassificationTypeEnum
  public $Name; // string
  public $Description; // string
  public $SenderProfile; // MarketingCloud_SenderProfile
  public $DeliveryProfile; // MarketingCloud_DeliveryProfile
}

class MarketingCloud_SendClassificationTypeEnum {
  const Operational='Operational';
  const Marketing='Marketing';
}

class MarketingCloud_SenderProfile {
  public $Name; // string
  public $Description; // string
  public $FromName; // string
  public $FromAddress; // string
  public $UseDefaultRMMRules; // boolean
  public $AutoForwardToEmailAddress; // string
  public $AutoForwardToName; // string
  public $DirectForward; // boolean
  public $AutoForwardTriggeredSend; // MarketingCloud_TriggeredSendDefinition
  public $AutoReply; // boolean
  public $AutoReplyTriggeredSend; // MarketingCloud_TriggeredSendDefinition
  public $SenderHeaderEmailAddress; // string
  public $SenderHeaderName; // string
  public $DataRetentionPeriodLength; // short
  public $DataRetentionPeriodUnitOfMeasure; // MarketingCloud_RecurrenceTypeEnum
}

class MarketingCloud_DeliveryProfile {
  public $Name; // string
  public $Description; // string
  public $SourceAddressType; // MarketingCloud_DeliveryProfileSourceAddressTypeEnum
  public $PrivateIP; // MarketingCloud_PrivateIP
  public $DomainType; // MarketingCloud_DeliveryProfileDomainTypeEnum
  public $PrivateDomain; // MarketingCloud_PrivateDomain
  public $HeaderSalutationSource; // MarketingCloud_SalutationSourceEnum
  public $HeaderContentArea; // MarketingCloud_ContentArea
  public $FooterSalutationSource; // MarketingCloud_SalutationSourceEnum
  public $FooterContentArea; // MarketingCloud_ContentArea
}

class MarketingCloud_DeliveryProfileSourceAddressTypeEnum {
  const DefaultPrivateIPAddress='DefaultPrivateIPAddress';
  const CustomPrivateIPAddress='CustomPrivateIPAddress';
}

class MarketingCloud_DeliveryProfileDomainTypeEnum {
  const DefaultDomain='DefaultDomain';
  const CustomDomain='CustomDomain';
}

class MarketingCloud_SalutationSourceEnum {
  const _Default='Default';
  const ContentLibrary='ContentLibrary';
  const None='None';
}

class MarketingCloud_PrivateDomain {
}

class MarketingCloud_PrivateIP {
  public $Name; // string
  public $Description; // string
  public $IsActive; // boolean
  public $OrdinalID; // short
  public $IPAddress; // string
}

class MarketingCloud_SendDefinition {
  public $CategoryID; // int
  public $SendClassification; // MarketingCloud_SendClassification
  public $SenderProfile; // MarketingCloud_SenderProfile
  public $FromName; // string
  public $FromAddress; // string
  public $DeliveryProfile; // MarketingCloud_DeliveryProfile
  public $SourceAddressType; // MarketingCloud_DeliveryProfileSourceAddressTypeEnum
  public $PrivateIP; // MarketingCloud_PrivateIP
  public $DomainType; // MarketingCloud_DeliveryProfileDomainTypeEnum
  public $PrivateDomain; // MarketingCloud_PrivateDomain
  public $HeaderSalutationSource; // MarketingCloud_SalutationSourceEnum
  public $HeaderContentArea; // MarketingCloud_ContentArea
  public $FooterSalutationSource; // MarketingCloud_SalutationSourceEnum
  public $FooterContentArea; // MarketingCloud_ContentArea
  public $SuppressTracking; // boolean
  public $IsSendLogging; // boolean
}

class MarketingCloud_AudienceItem {
  public $List; // MarketingCloud_List
  public $SendDefinitionListType; // MarketingCloud_SendDefinitionListTypeEnum
  public $CustomObjectID; // string
  public $DataSourceTypeID; // MarketingCloud_DataSourceTypeEnum
}

class MarketingCloud_EmailSendDefinition {
  public $SendDefinitionList; // MarketingCloud_SendDefinitionList
  public $Email; // MarketingCloud_Email
  public $BccEmail; // string
  public $AutoBccEmail; // string
  public $TestEmailAddr; // string
  public $EmailSubject; // string
  public $DynamicEmailSubject; // string
  public $IsMultipart; // boolean
  public $IsWrapped; // boolean
  public $SendLimit; // int
  public $SendWindowOpen; // time
  public $SendWindowClose; // time
  public $SendWindowDelete; // boolean
  public $DeduplicateByEmail; // boolean
  public $ExclusionFilter; // string
  public $TrackingUsers; // MarketingCloud_TrackingUsers
  public $Additional; // string
  public $CCEmail; // string
}

class MarketingCloud_TrackingUsers {
  public $TrackingUser; // MarketingCloud_TrackingUser
}

class MarketingCloud_SendDefinitionList {
  public $FilterDefinition; // MarketingCloud_FilterDefinition
  public $IsTestObject; // boolean
  public $SalesForceObjectID; // string
  public $Name; // string
  public $Parameters; // MarketingCloud_Parameters
}



class MarketingCloud_SendDefinitionStatusEnum {
  const Active='Active';
  const Archived='Archived';
  const Deleted='Deleted';
}

class MarketingCloud_SendDefinitionListTypeEnum {
  const SourceList='SourceList';
  const ExclusionList='ExclusionList';
  const DomainExclusion='DomainExclusion';
}

class MarketingCloud_DataSourceTypeEnum {
  const _List='List';
  const CustomObject='CustomObject';
  const DomainExclusion='DomainExclusion';
  const SalesForceReport='SalesForceReport';
  const SalesForceCampaign='SalesForceCampaign';
  const FilterDefinition='FilterDefinition';
}

class MarketingCloud_TrackingUser {
  public $IsActive; // boolean
  public $EmployeeID; // int
}

class MarketingCloud_MessagingVendorKind {
  public $Vendor; // string
  public $Kind; // string
  public $IsUsernameRequired; // boolean
  public $IsPasswordRequired; // boolean
  public $IsProfileRequired; // boolean
}

class MarketingCloud_MessagingConfiguration {
  public $Code; // string
  public $MessagingVendorKind; // MarketingCloud_MessagingVendorKind
  public $IsActive; // boolean
  public $Url; // string
  public $UserName; // string
  public $Password; // string
  public $ProfileID; // string
  public $CallbackUrl; // string
  public $MediaTypes; // string
}

class MarketingCloud_UserMap {
  public $ETAccountUser; // MarketingCloud_AccountUser
  public $AdditionalData; // MarketingCloud_APIProperty
}

class MarketingCloud_Folder {
  public $ID; // int
  public $ParentID; // int
}

class MarketingCloud_FileTransferLocation {
}

class MarketingCloud_DataExtractActivity {
  public $ID;
  public $CustomerKey;
  public $Name;
  public $Description;

}

class MarketingCloud_Automation {
  public $ObjectID;
}

class MarketingCloud_MessageSendActivity {
}

class MarketingCloud_SmsSendActivity {
}

class MarketingCloud_ReportActivity {
}

class MarketingCloud_DataExtension {
  public $Name; // string
  public $Description; // string
  public $IsSendable; // boolean
  public $IsTestable; // boolean
  public $SendableDataExtensionField; // MarketingCloud_DataExtensionField
  public $SendableSubscriberField; // MarketingCloud_Attribute
  public $Template; // MarketingCloud_DataExtensionTemplate
  public $DataRetentionPeriodLength; // int
  public $DataRetentionPeriodUnitOfMeasure; // int
  public $RowBasedRetention; // boolean
  public $ResetRetentionPeriodOnImport; // boolean
  public $DeleteAtEndOfRetentionPeriod; // boolean
  public $RetainUntil; // string
  public $Fields; // MarketingCloud_Fields
  public $DataRetentionPeriod; // MarketingCloud_DateTimeUnitOfMeasure
}

class MarketingCloud_Fields {
  public $Field; // MarketingCloud_DataExtensionField
}

class MarketingCloud_DataExtensionField {
  public $Ordinal; // int
  public $IsPrimaryKey; // boolean
  public $FieldType; // MarketingCloud_DataExtensionFieldType
  public $DataExtension; // MarketingCloud_DataExtension
  public $DefaultValue;
}

class MarketingCloud_DataExtensionFieldType {
  const Text='Text';
  const Number='Number';
  const Date='Date';
  const Boolean='Boolean';
  const EmailAddress='EmailAddress';
  const Phone='Phone';
}

class MarketingCloud_DateTimeUnitOfMeasure {
  const Days='Days';
  const Weeks='Weeks';
  const Months='Months';
  const Years='Years';
}

class MarketingCloud_DataExtensionTemplate {
  public $Name; // string
}

class MarketingCloud_DataExtensionObject {
  public $Name; // string
  public $Keys; // MarketingCloud_Keys
}

class MarketingCloud_Keys {
  public $Key; // MarketingCloud_APIProperty
}

class MarketingCloud_DataExtensionError {
  public $Name; // string
  public $ErrorCode; // integer
  public $ErrorMessage; // string
}

class MarketingCloud_DataExtensionCreateResult {
  public $ErrorMessage; // string
  public $KeyErrors; // MarketingCloud_KeyErrors
  public $ValueErrors; // MarketingCloud_ValueErrors
}

class MarketingCloud_KeyErrors {
  public $KeyError; // MarketingCloud_DataExtensionError
}

class MarketingCloud_ValueErrors {
  public $ValueError; // MarketingCloud_DataExtensionError
}

class MarketingCloud_DataExtensionUpdateResult {
  public $ErrorMessage; // string
  public $KeyErrors; // MarketingCloud_KeyErrors
  public $ValueErrors; // MarketingCloud_ValueErrors
}



class MarketingCloud_DataExtensionDeleteResult {
  public $ErrorMessage; // string
  public $KeyErrors; // MarketingCloud_KeyErrors
}



class MarketingCloud_FileType {
  const CSV='CSV';
  const TAB='TAB';
  const Other='Other';
}

class MarketingCloud_ImportDefinitionSubscriberImportType {
  const Email='Email';
  const SMS='SMS';
}

class MarketingCloud_ImportDefinitionUpdateType {
  const AddAndUpdate='AddAndUpdate';
  const AddAndDoNotUpdate='AddAndDoNotUpdate';
  const UpdateButDoNotAdd='UpdateButDoNotAdd';
  const Merge='Merge';
  const Overwrite='Overwrite';
}

class MarketingCloud_ImportDefinitionFieldMappingType {
  const InferFromColumnHeadings='InferFromColumnHeadings';
  const MapByOrdinal='MapByOrdinal';
  const ManualMap='ManualMap';
}

class MarketingCloud_FieldMap {
  public $SourceName; // string
  public $SourceOrdinal; // int
  public $DestinationName; // string
}

class MarketingCloud_ImportDefinition {
  public $AllowErrors; // boolean
  public $DestinationObject; // MarketingCloud_APIObject
  public $FieldMappingType; // MarketingCloud_ImportDefinitionFieldMappingType
  public $FieldMaps; // MarketingCloud_FieldMaps
  public $FileSpec; // string
  public $FileType; // MarketingCloud_FileType
  public $Notification; // MarketingCloud_AsyncResponse
  public $RetrieveFileTransferLocation; // MarketingCloud_FileTransferLocation
  public $SubscriberImportType; // MarketingCloud_ImportDefinitionSubscriberImportType
  public $UpdateType; // MarketingCloud_ImportDefinitionUpdateType
  public $MaxFileAge; // int
  public $MaxFileAgeScheduleOffset; // int
  public $MaxImportFrequency; // int
  public $Delimiter; // string
  public $HeaderLines; // int
}

class MarketingCloud_FieldMaps {
  public $FieldMap; // MarketingCloud_FieldMap
}

class MarketingCloud_ImportDefinitionFieldMap {
  public $SourceName; // string
  public $SourceOrdinal; // int
  public $DestinationName; // string
}

class MarketingCloud_ImportResultsSummary {
  public $ImportDefinitionCustomerKey; // string
  public $StartDate; // string
  public $EndDate; // string
  public $DestinationID; // string
  public $NumberSuccessful; // int
  public $NumberDuplicated; // int
  public $NumberErrors; // int
  public $TotalRows; // int
  public $ImportType; // string
  public $ImportStatus; // string
  public $TaskResultID; // int
}

class MarketingCloud_FilterDefinition {
}

class MarketingCloud_GroupDefinition {
}

class MarketingCloud_FileTransferActivity {
}

class MarketingCloud_ListSend {
  public $SendID; // int
  public $List; // MarketingCloud_List
  public $Duplicates; // int
  public $InvalidAddresses; // int
  public $ExistingUndeliverables; // int
  public $ExistingUnsubscribes; // int
  public $HardBounces; // int
  public $SoftBounces; // int
  public $OtherBounces; // int
  public $ForwardedEmails; // int
  public $UniqueClicks; // int
  public $UniqueOpens; // int
  public $NumberSent; // int
  public $NumberDelivered; // int
  public $Unsubscribes; // int
  public $MissingAddresses; // int
  public $PreviewURL; // string
  public $Links; // MarketingCloud_Link
  public $Events; // MarketingCloud_TrackingEvent
}

class MarketingCloud_LinkSend {
  public $SendID; // int
  public $Link; // MarketingCloud_Link
}

class MarketingCloud_ObjectExtension {
  public $Type; // string
  public $Properties; // MarketingCloud_Properties
}

class MarketingCloud_Properties {
  public $Property; // MarketingCloud_APIProperty
}

class MarketingCloud_PublicKeyManagement {
  public $Name; // string
  public $Key; // base64Binary
}

class MarketingCloud_SystemStatusOptions {
}

class MarketingCloud_SystemStatusRequestMsg {
  public $Options; // MarketingCloud_SystemStatusOptions
}

class MarketingCloud_SystemStatusResult {
  public $SystemStatus; // MarketingCloud_SystemStatusType
  public $Outages; // MarketingCloud_Outages
}

class MarketingCloud_Outages {
  public $Outage; // MarketingCloud_SystemOutage
}

class MarketingCloud_SystemStatusResponseMsg {
  public $Results; // MarketingCloud_Results
  public $OverallStatus; // string
  public $OverallStatusMessage; // string
  public $RequestID; // string
}



class MarketingCloud_SystemStatusType {
  const OK='OK';
  const UnplannedOutage='UnplannedOutage';
  const InMaintenance='InMaintenance';
}

class MarketingCloud_SystemOutage {
}

class MarketingCloud_Authentication {
}

class MarketingCloud_UsernameAuthentication {
  public $UserName; // string
  public $PassWord; // string
}

class MarketingCloud_ResourceSpecification {
  public $URN; // string
  public $Authentication; // MarketingCloud_Authentication
}

class MarketingCloud_Portfolio {
  public $Source; // MarketingCloud_ResourceSpecification
  public $CategoryID; // int
  public $FileName; // string
  public $DisplayName; // string
  public $Description; // string
  public $TypeDescription; // string
  public $IsUploaded; // boolean
  public $IsActive; // boolean
  public $FileSizeKB; // int
  public $ThumbSizeKB; // int
  public $FileWidthPX; // int
  public $FileHeightPX; // int
  public $FileURL; // string
  public $ThumbURL; // string
  public $CacheClearTime; // dateTime
  public $CategoryType; // string
}

class MarketingCloud_QueryDefinition {
  public $QueryText; // string
  public $TargetType; // string
  public $DataExtensionTarget; // MarketingCloud_InteractionBaseObject
  public $TargetUpdateType; // string
  public $FileSpec; // string
  public $FileType; // string
  public $Status; // string
}

?>
