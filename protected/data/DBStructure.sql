


/* @Creation of Table 'User' with physical name of 'tbl_User'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_User`;

CREATE TABLE `tbl_User` (
`UserID` int (7) NOT NULL AUTO_INCREMENT,
`LoginName` varchar (25) NOT NULL,
`FirstName` varchar (25) NOT NULL,
`LastName` varchar (25) NOT NULL,
`Mail` varchar (25) NOT NULL,
`Password` varchar (25) NOT NULL,
`DefaultLanguageID` int (7),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`UserID`)
);


/* @Creation of Table 'Country' with physical name of 'tbl_Country'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Country`;

CREATE TABLE `tbl_Country` (
`CountryID` int (7) NOT NULL AUTO_INCREMENT,
`CountryName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`CountryID`),
 CONSTRAINT `Country_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Country_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Program' with physical name of 'tbl_Program'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Program`;

CREATE TABLE `tbl_Program` (
`ProgramID` int (7) NOT NULL AUTO_INCREMENT,
`ProgramName` varchar (25) NOT NULL,
`ProgramDescription` varchar (50),
`CountryID` int (7) NOT NULL,
`StartDate` date,
`BudgetID` varchar (25),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ProgramID`)
,
 CONSTRAINT `Program_Country_CountryID` FOREIGN KEY (`CountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Program_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Program_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Family_Relation' with physical name of 'tbl_Family_Relation'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Family_Relation`;

CREATE TABLE `tbl_Family_Relation` (
`RelationID` int (7) NOT NULL AUTO_INCREMENT,
`RelationName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`RelationID`),
 CONSTRAINT `Family_Relation_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Family_Relation_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Medical_Status' with physical name of 'tbl_Medical_Status'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Medical_Status`;

CREATE TABLE `tbl_Medical_Status` (
`StatusID` int (7) NOT NULL AUTO_INCREMENT,
`StatusName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`StatusID`),
 CONSTRAINT `Medical_Status_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Medical_Status_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Document_Type' with physical name of 'tbl_Document_Type'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Document_Type`;

CREATE TABLE `tbl_Document_Type` (
`TypeID` int (7) NOT NULL AUTO_INCREMENT,
`TypeName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`TypeID`),
 CONSTRAINT `Document_Type_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Document_Type_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'City' with physical name of 'tbl_City'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_City`;

CREATE TABLE `tbl_City` (
`CityID` int (7) NOT NULL AUTO_INCREMENT,
`CityName` varchar (25) NOT NULL,
`CountryID` int (7) NOT NULL,
`Region` varchar (25),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`CityID`)
,
 CONSTRAINT `City_Country_CountryID` FOREIGN KEY (`CountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `City_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `City_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Subject' with physical name of 'tbl_Subject'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Subject`;

CREATE TABLE `tbl_Subject` (
`SubjectID` int (7) NOT NULL AUTO_INCREMENT,
`SubjectName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`SubjectID`),
 CONSTRAINT `Subject_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Subject_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Student' with physical name of 'tbl_Student'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Student`;

CREATE TABLE `tbl_Student` (
`ProgramID` int (7) NOT NULL,
`StudentID` int (7) NOT NULL AUTO_INCREMENT,
`Name` varchar (25) NOT NULL,
`LastName` varchar (25) NOT NULL,
`FullName` varchar (51) NOT NULL,
`ArabicName` varchar (25) NOT NULL,
`ArabicLastName` varchar (25) NOT NULL,
`ArabicFullName` varchar (51) NOT NULL,
`DocumentTypeId` int (7),
`DocumentId` varchar (25),
`FatherDID` int (7),
`FatherIsAlive` tinyint,
`MotherDID` int (7),
`MotherIsAlive` tinyint,
`RegisteredinEducation` tinyint,
`LastGradeServed` int (7),
`IsMale` tinyint NOT NULL,
`BirthDate` date NOT NULL,
`BirthCountryID` int (7) NOT NULL,
`PhoneNumber` varchar (25),
`Whatsup` varchar (25),
`MedicalStatusID` int (7) NOT NULL,
`HouseHeadRelationID` int (7),
`NumberOfPersons` int (7),
`CurrentCountryID` int (7) NOT NULL,
`CurrentCityID` int (7) NOT NULL,
`OriginalCountryID` int (7) NOT NULL,
`OriginalCityID` int (7) NOT NULL,
`BenefitFromIRC` tinyint NOT NULL,
`MediaApproval` tinyint NOT NULL,
`RgistrationCountryID` int (7) NOT NULL,
`RegistrationCityID` int (7) NOT NULL,
`RegistrationEmpID` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`StudentID`)
, CONSTRAINT `Student_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Student_Document_Type_DocumentTypeId` FOREIGN KEY (`DocumentTypeId`) REFERENCES `tbl_Document_Type` (`TypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Country_BirthCountryID` FOREIGN KEY (`BirthCountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Medical_Status_MedicalStatusID` FOREIGN KEY (`MedicalStatusID`) REFERENCES `tbl_Medical_Status` (`StatusID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Family_Relation_HouseHeadRelationID` FOREIGN KEY (`HouseHeadRelationID`) REFERENCES `tbl_Family_Relation` (`RelationID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Country_CurrentCountryID` FOREIGN KEY (`CurrentCountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_City_CurrentCityID` FOREIGN KEY (`CurrentCityID`) REFERENCES `tbl_City` (`CityID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Country_OriginalCountryID` FOREIGN KEY (`OriginalCountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_City_OriginalCityID` FOREIGN KEY (`OriginalCityID`) REFERENCES `tbl_City` (`CityID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Country_RgistrationCountryID` FOREIGN KEY (`RgistrationCountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_City_RegistrationCityID` FOREIGN KEY (`RegistrationCityID`) REFERENCES `tbl_City` (`CityID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_User_RegistrationEmpID` FOREIGN KEY (`RegistrationEmpID`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Student_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Student_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Document' with physical name of 'tbl_Document'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Document`;

CREATE TABLE `tbl_Document` (
`ProgramID` int (7) NOT NULL,
`DID` int (7) NOT NULL AUTO_INCREMENT,
`DocumentTypeID` int (7),
`DocumentID` varchar (25),
`Reason` varchar (25) NOT NULL,
`StudentID` int (7) NOT NULL,
`FirstName` varchar (25) NOT NULL,
`LastName` varchar (25) NOT NULL,
`FullName` varchar (51) NOT NULL,
`ArabicFirstName` varchar (25) NOT NULL,
`ArabicLastName` varchar (25) NOT NULL,
`ArabicFullName` varchar (51) NOT NULL,
`FatherName` varchar (25),
`ArabicFatherName` varchar (25),
`MotherName` varchar (25),
`ArabicMotherName` varchar (25),
`IsStudent` tinyint NOT NULL,
`IsFather` tinyint NOT NULL,
`IsMother` tinyint NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`DID`)
, CONSTRAINT `Document_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Document_Document_Type_DocumentTypeID` FOREIGN KEY (`DocumentTypeID`) REFERENCES `tbl_Document_Type` (`TypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Document_Student_StudentID` FOREIGN KEY (`StudentID`) REFERENCES `tbl_Student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Document_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Document_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'User_Default' with physical name of 'tbl_User_Default'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_User_Default`;

CREATE TABLE `tbl_User_Default` (
`ProgramID` int (7) NOT NULL,
`DefaultID` int (7) NOT NULL AUTO_INCREMENT,
`UserID` int (7) NOT NULL,
`FieldName` varchar (25) NOT NULL,
`DefaultValue` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`DefaultID`)
, CONSTRAINT `User_Default_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `User_Default_User_UserID` FOREIGN KEY (`UserID`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `User_Default_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `User_Default_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Coordinator_Group' with physical name of 'tbl_Coordinator_Group'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Coordinator_Group`;

CREATE TABLE `tbl_Coordinator_Group` (
`GroupID` int (7) NOT NULL AUTO_INCREMENT,
`GroupName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`GroupID`),
 CONSTRAINT `Coordinator_Group_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Coordinator_Group_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Coordinator' with physical name of 'tbl_Coordinator'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Coordinator`;

CREATE TABLE `tbl_Coordinator` (
`ProgramID` int (7) NOT NULL,
`CoordinatorID` int (7) NOT NULL AUTO_INCREMENT,
`CoordinatorName` varchar (25) NOT NULL,
`CoordinatorLastName` varchar (25) NOT NULL,
`CoordinatorFullName` varchar (51) NOT NULL,
`DocumentTypeID` int (7) NOT NULL,
`DocumentID` varchar (25) NOT NULL,
`GroupID` int (7) NOT NULL,
`PhoneNumber` varchar (25),
`Whatsup` varchar (25),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`CoordinatorID`)
, CONSTRAINT `Coordinator_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Coordinator_Document_Type_DocumentTypeID` FOREIGN KEY (`DocumentTypeID`) REFERENCES `tbl_Document_Type` (`TypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Coordinator_Coordinator_Group_GroupID` FOREIGN KEY (`GroupID`) REFERENCES `tbl_Coordinator_Group` (`GroupID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Coordinator_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Coordinator_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Course_Group' with physical name of 'tbl_Course_Group'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Course_Group`;

CREATE TABLE `tbl_Course_Group` (
`GroupID` int (7) NOT NULL AUTO_INCREMENT,
`GroupName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`GroupID`),
 CONSTRAINT `Course_Group_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Course_Group_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Course_Type' with physical name of 'tbl_Course_Type'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Course_Type`;

CREATE TABLE `tbl_Course_Type` (
`CourseTypeID` int (7) NOT NULL AUTO_INCREMENT,
`CourseTypeName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`CourseTypeID`),
 CONSTRAINT `Course_Type_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Course_Type_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Course' with physical name of 'tbl_Course'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Course`;

CREATE TABLE `tbl_Course` (
`ProgramID` int (7) NOT NULL,
`CourseID` int (7) NOT NULL AUTO_INCREMENT,
`CourseCode` varchar (25),
`CourseName` varchar (25) NOT NULL,
`CourseDescription` varchar (25),
`Provider` varchar (25),
`IsSchool` tinyint NOT NULL,
`CoordinatorID` int (7),
`CourseTypeID` int (7),
`CourseGroupID` int (7),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`CourseID`)
, CONSTRAINT `Course_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Course_Coordinator_CoordinatorID` FOREIGN KEY (`CoordinatorID`) REFERENCES `tbl_Coordinator` (`CoordinatorID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Course_Course_Type_CourseTypeID` FOREIGN KEY (`CourseTypeID`) REFERENCES `tbl_Course_Type` (`CourseTypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Course_Course_Group_CourseGroupID` FOREIGN KEY (`CourseGroupID`) REFERENCES `tbl_Course_Group` (`GroupID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Course_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Course_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Exam' with physical name of 'tbl_Exam'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Exam`;

CREATE TABLE `tbl_Exam` (
`ProgramID` int (7) NOT NULL,
`ExamID` int (7) NOT NULL AUTO_INCREMENT,
`ExamName` varchar (25) NOT NULL,
`ExamScore` decimal NOT NULL,
`ExamPassingPercentage` decimal NOT NULL,
`ExamCertification` tinyint NOT NULL,
`CoordinatorID` int (7) NOT NULL,
`SubjectID` int (7),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ExamID`)
, CONSTRAINT `Exam_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Exam_Coordinator_CoordinatorID` FOREIGN KEY (`CoordinatorID`) REFERENCES `tbl_Coordinator` (`CoordinatorID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Exam_Subject_SubjectID` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_Subject` (`SubjectID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Exam_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Exam_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Age_Range' with physical name of 'tbl_Age_Range'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Age_Range`;

CREATE TABLE `tbl_Age_Range` (
`RangeID` int (7) NOT NULL AUTO_INCREMENT,
`RangeName` varchar (25) NOT NULL,
`RangeFrom` int (7) NOT NULL,
`RangeTo` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`RangeID`),
 CONSTRAINT `Age_Range_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Age_Range_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Level' with physical name of 'tbl_Level'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Level`;

CREATE TABLE `tbl_Level` (
`ProgramID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL AUTO_INCREMENT,
`LevelName` varchar (25) NOT NULL,
`LevelDescription` varchar (25),
`CourseID` int (7) NOT NULL,
`LevelCertification` tinyint,
`RangeID` int (7) NOT NULL,
`AgeFlexability` int (7) NOT NULL,
`NumberOfHours` int (7),
`CoordinatorID` int (7),
`Sequence` int (7),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`LevelID`)
, CONSTRAINT `Level_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Level_course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_course` (`courseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Level_Age_Range_RangeID` FOREIGN KEY (`RangeID`) REFERENCES `tbl_Age_Range` (`RangeID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Level_Coordinator_CoordinatorID` FOREIGN KEY (`CoordinatorID`) REFERENCES `tbl_Coordinator` (`CoordinatorID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Level_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Level_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Level_Subject' with physical name of 'tbl_Level_Subject'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Level_Subject`;

CREATE TABLE `tbl_Level_Subject` (
`ProgramID` int (7) NOT NULL,
`ID` int (7) NOT NULL AUTO_INCREMENT,
`CourseID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL,
`SubjectID` int (7) NOT NULL,
`SubjectWieght` int (7),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ID`)
, CONSTRAINT `Level_Subject_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Level_Subject_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`CourseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Level_Subject_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Level_Subject_Subject_SubjectID` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_Subject` (`SubjectID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Level_Subject_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Level_Subject_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Level_Exam' with physical name of 'tbl_Level_Exam'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Level_Exam`;

CREATE TABLE `tbl_Level_Exam` (
`ProgramID` int (7) NOT NULL,
`ID` int (7) NOT NULL AUTO_INCREMENT,
`CourseID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL,
`SubjectID` int (7),
`ExamID` int (7) NOT NULL,
`Pre` tinyint NOT NULL,
`Post` tinyint NOT NULL,
`Mid` tinyint NOT NULL,
`Score` decimal NOT NULL,
`PassingPercentage` decimal,
`PassingRequired` tinyint NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ID`)
, CONSTRAINT `Level_Exam_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Level_Exam_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`courseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Level_Exam_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Level_Exam_Subject_SubjectID` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_Subject` (`SubjectID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Level_Exam_Exam_ExamID` FOREIGN KEY (`ExamID`) REFERENCES `tbl_Exam` (`ExamID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Level_Exam_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Level_Exam_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Center' with physical name of 'tbl_Center'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Center`;

CREATE TABLE `tbl_Center` (
`ProgramID` int (7) NOT NULL,
`CenterID` int (7) NOT NULL AUTO_INCREMENT,
`CenterName` varchar (25) NOT NULL,
`CountryID` int (7) NOT NULL,
`CityID` int (7) NOT NULL,
`CoordinatorID` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`CenterID`)
, CONSTRAINT `Center_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Center_Country_CountryID` FOREIGN KEY (`CountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Center_City_CityID` FOREIGN KEY (`CityID`) REFERENCES `tbl_City` (`CityID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Center_Coordinator_CoordinatorID` FOREIGN KEY (`CoordinatorID`) REFERENCES `tbl_Coordinator` (`CoordinatorID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Center_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Center_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Facilitator' with physical name of 'tbl_Facilitator'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Facilitator`;

CREATE TABLE `tbl_Facilitator` (
`ProgramID` int (7) NOT NULL,
`FacilitatorID` int (7) NOT NULL AUTO_INCREMENT,
`FacilitatorName` varchar (25) NOT NULL,
`FacilitatorLastName` varchar (25) NOT NULL,
`FacilitatorFullName` varchar (51) NOT NULL,
`BirthDate` date NOT NULL,
`EducationLevel` varchar (25),
`DocumentTypeID` int (7),
`DocumentID` varchar (25),
`IsMale` char (1) NOT NULL,
`CountryID` int (7) NOT NULL,
`CityID` int (7) NOT NULL,
`StartDate` date,
`EndDate` date,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`FacilitatorID`)
, CONSTRAINT `Facilitator_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Facilitator_Document_Type_DocumentTypeID` FOREIGN KEY (`DocumentTypeID`) REFERENCES `tbl_Document_Type` (`TypeID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Facilitator_Country_CountryID` FOREIGN KEY (`CountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Facilitator_City_CityID` FOREIGN KEY (`CityID`) REFERENCES `tbl_City` (`CityID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Facilitator_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Facilitator_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Cycle' with physical name of 'tbl_Cycle'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Cycle`;

CREATE TABLE `tbl_Cycle` (
`ProgramID` int (7) NOT NULL,
`CycleID` int (7) NOT NULL AUTO_INCREMENT,
`CycleName` varchar (25) NOT NULL,
`CycleDescription` varchar (25),
`CourseID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL,
`CountryID` int (7),
`CityID` int (7),
`CenterID` int (7),
`Room` int (7),
`StartDate` date,
`EndDate` date,
`AgeID` int (7),
`AgeFlexability` int (7),
`NumberOfStudent` int (7),
`NumberOfHours` decimal,
`FacilitatorID` int (7),
`Certification` tinyint NOT NULL,
`CoordinatorID` int (7) NOT NULL,
`Transportation` tinyint NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`CycleID`)
, CONSTRAINT `Cycle_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Cycle_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`courseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Country_CountryID` FOREIGN KEY (`CountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_City_CityID` FOREIGN KEY (`CityID`) REFERENCES `tbl_City` (`CityID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Center_CenterID` FOREIGN KEY (`CenterID`) REFERENCES `tbl_Center` (`CenterID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Age_range_AgeID` FOREIGN KEY (`AgeID`) REFERENCES `tbl_Age_range` (`RangeID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Facilitator_FacilitatorID` FOREIGN KEY (`FacilitatorID`) REFERENCES `tbl_Facilitator` (`FacilitatorID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Coordinator_CoordinatorID` FOREIGN KEY (`CoordinatorID`) REFERENCES `tbl_Coordinator` (`CoordinatorID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Cycle_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Cycle_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Cycle_Subject' with physical name of 'tbl_Cycle_Subject'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Cycle_Subject`;

CREATE TABLE `tbl_Cycle_Subject` (
`ProgramID` int (7) NOT NULL,
`ID` int (7) NOT NULL AUTO_INCREMENT,
`CourseID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL,
`SubjectID` int (7) NOT NULL,
`LevelSubjectID` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ID`)
, CONSTRAINT `Cycle_Subject_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Cycle_Subject_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`CourseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Subject_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Subject_Subject_SubjectID` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_Subject` (`SubjectID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Subject_Level_Subject_LevelSubjectID` FOREIGN KEY (`LevelSubjectID`) REFERENCES `tbl_Level_Subject` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Cycle_Subject_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Cycle_Subject_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Cycle_Exam' with physical name of 'tbl_Cycle_Exam'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Cycle_Exam`;

CREATE TABLE `tbl_Cycle_Exam` (
`ProgramID` int (7) NOT NULL,
`ID` int (7) NOT NULL AUTO_INCREMENT,
`CourseID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL,
`SubjectID` int (7),
`CycleID` int (7) NOT NULL,
`ExamID` int (7) NOT NULL,
`Pre` tinyint NOT NULL,
`Post` tinyint NOT NULL,
`Mid` tinyint NOT NULL,
`Score` decimal NOT NULL,
`PassingScore` decimal,
`PassingRequired` tinyint NOT NULL,
`LevelExamID` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ID`)
, CONSTRAINT `Cycle_Exam_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Cycle_Exam_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`courseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Exam_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Exam_Subject_SubjectID` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_Subject` (`SubjectID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Exam_Cycle_CycleID` FOREIGN KEY (`CycleID`) REFERENCES `tbl_Cycle` (`CycleID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Exam_Exam_ExamID` FOREIGN KEY (`ExamID`) REFERENCES `tbl_Exam` (`ExamID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Exam_Level_Exam_LevelExamID` FOREIGN KEY (`LevelExamID`) REFERENCES `tbl_Level_Exam` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Cycle_Exam_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Cycle_Exam_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Cycle_Session' with physical name of 'tbl_Cycle_Session'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Cycle_Session`;

CREATE TABLE `tbl_Cycle_Session` (
`ProgramID` int (7) NOT NULL,
`SessionID` int (7) NOT NULL AUTO_INCREMENT,
`CourseID` date NOT NULL,
`LevelID` time NOT NULL,
`CycleID` time NOT NULL,
`SubjectID` int (7),
`SessionDate` date NOT NULL,
`TimeFrom` time NOT NULL,
`TimeTo` time NOT NULL,
`FacilitatorID` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`SessionID`)
, CONSTRAINT `Cycle_Session_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Cycle_Session_Facilitator_FacilitatorID` FOREIGN KEY (`FacilitatorID`) REFERENCES `tbl_Facilitator` (`FacilitatorID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Cycle_Session_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Cycle_Session_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Waiting' with physical name of 'tbl_Waiting'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Waiting`;

CREATE TABLE `tbl_Waiting` (
`ProgramID` int (7) NOT NULL,
`WaitingID` int (7) NOT NULL AUTO_INCREMENT,
`StudentID` int (7) NOT NULL,
`CourseID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL,
`Enrolled` tinyint NOT NULL,
`EnrolmentDate` date,
`CycleStartDate` date,
`InformedOfCycleOpening` int (7),
`Closed` tinyint,
`CloseDate` date,
`ClosedBy` int (7),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`WaitingID`)
, CONSTRAINT `Waiting_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Waiting_Student_StudentID` FOREIGN KEY (`StudentID`) REFERENCES `tbl_Student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Waiting_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`courseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Waiting_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Waiting_User_ClosedBy` FOREIGN KEY (`ClosedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Waiting_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Waiting_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Cycle_Enrolment' with physical name of 'tbl_Cycle_Enrolment'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Cycle_Enrolment`;

CREATE TABLE `tbl_Cycle_Enrolment` (
`ProgramID` int (7) NOT NULL,
`EnrolmentID` int (7) NOT NULL AUTO_INCREMENT,
`StudentID` int (7) NOT NULL,
`CycleID` int (7) NOT NULL,
`CourseID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL,
`WaitingID` int (7),
`Transportation` tinyint,
`Withdrawl` tinyint,
`WithdrawlDate` date,
`WithdrawlUpdate` date,
`WithdrawlUpdatedBy` int (7),
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`EnrolmentID`)
, CONSTRAINT `Cycle_Enrolment_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Cycle_Enrolment_Student_StudentID` FOREIGN KEY (`StudentID`) REFERENCES `tbl_Student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Enrolment_Cycle_CycleID` FOREIGN KEY (`CycleID`) REFERENCES `tbl_Cycle` (`CycleID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Enrolment_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`courseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Enrolment_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Cycle_Enrolment_Waiting_WaitingID` FOREIGN KEY (`WaitingID`) REFERENCES `tbl_Waiting` (`WaitingID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Cycle_Enrolment_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Cycle_Enrolment_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Student_Exam' with physical name of 'tbl_Student_Exam'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Student_Exam`;

CREATE TABLE `tbl_Student_Exam` (
`ProgramID` int (7) NOT NULL,
`ID` int (7) NOT NULL AUTO_INCREMENT,
`StudentID` int (7) NOT NULL,
`EnrolmentID` int (7),
`CourseID` int (7),
`LevelID` int (7),
`CycleID` int (7),
`SubjectID` int (7),
`ExamID` int (7) NOT NULL,
`LevelExamID` int (7),
`CycleExamID` int (7),
`StudentScore` decimal NOT NULL,
`ExamDate` date NOT NULL,
`ExamTime` Time NOT NULL,
`CountryID` int (7) NOT NULL,
`CityID` int (7) NOT NULL,
`CenterID` int (7) NOT NULL,
`TotalScore` decimal NOT NULL,
`PassingScore` decimal NOT NULL,
`Pre` tinyint NOT NULL,
`Post` tinyint NOT NULL,
`Mid` tinyint NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ID`)
, CONSTRAINT `Student_Exam_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Student_Exam_Student_StudentID` FOREIGN KEY (`StudentID`) REFERENCES `tbl_Student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Cycle_Enrolment_EnrolmentID` FOREIGN KEY (`EnrolmentID`) REFERENCES `tbl_Cycle_Enrolment` (`EnrolmentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`courseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Cycle_CycleID` FOREIGN KEY (`CycleID`) REFERENCES `tbl_Cycle` (`CycleID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Subject_SubjectID` FOREIGN KEY (`SubjectID`) REFERENCES `tbl_Subject` (`SubjectID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Exam_ExamID` FOREIGN KEY (`ExamID`) REFERENCES `tbl_Exam` (`ExamID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Level_Exam_LevelExamID` FOREIGN KEY (`LevelExamID`) REFERENCES `tbl_Level_Exam` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Cycle_Exam_CycleExamID` FOREIGN KEY (`CycleExamID`) REFERENCES `tbl_Cycle_Exam` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Country_CountryID` FOREIGN KEY (`CountryID`) REFERENCES `tbl_Country` (`CountryID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_City_CityID` FOREIGN KEY (`CityID`) REFERENCES `tbl_City` (`CityID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Student_Exam_Center_CenterID` FOREIGN KEY (`CenterID`) REFERENCES `tbl_Center` (`CenterID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Student_Exam_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Student_Exam_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'LeaveReason' with physical name of 'tbl_LeaveReason'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_LeaveReason`;

CREATE TABLE `tbl_LeaveReason` (
`ReasonID` int (7) NOT NULL AUTO_INCREMENT,
`ReasonName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ReasonID`),
 CONSTRAINT `LeaveReason_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `LeaveReason_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Leave' with physical name of 'tbl_Leave'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Leave`;

CREATE TABLE `tbl_Leave` (
`ProgramID` int (7) NOT NULL,
`LeaveID` int (7) NOT NULL AUTO_INCREMENT,
`LeaveName` varchar (25) NOT NULL,
`LeaveDate` date NOT NULL,
`ReasonID` int (7) NOT NULL,
`EnrolmentID` int (7) NOT NULL,
`StudentID` int (7) NOT NULL,
`CycleID` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`LeaveID`)
, CONSTRAINT `Leave_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Leave_LeaveReason_ReasonID` FOREIGN KEY (`ReasonID`) REFERENCES `tbl_LeaveReason` (`ReasonID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Leave_Cycle_Enrolment_EnrolmentID` FOREIGN KEY (`EnrolmentID`) REFERENCES `tbl_Cycle_Enrolment` (`EnrolmentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Leave_Student_StudentID` FOREIGN KEY (`StudentID`) REFERENCES `tbl_Student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Leave_Cycle_CycleID` FOREIGN KEY (`CycleID`) REFERENCES `tbl_Cycle` (`CycleID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Leave_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Leave_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Attendance' with physical name of 'tbl_Attendance'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Attendance`;

CREATE TABLE `tbl_Attendance` (
`ProgramID` int (7) NOT NULL,
`AttendanceID` int (7) NOT NULL AUTO_INCREMENT,
`StudentID` int (7) NOT NULL,
`FacilitatorID` int (7) NOT NULL,
`CycleID` int (7) NOT NULL,
`CourseID` int (7) NOT NULL,
`LevelID` int (7) NOT NULL,
`Present` tinyint NOT NULL,
`Absent` tinyint NOT NULL,
`SessionID` int (7) NOT NULL,
`AttendanceDate` date NOT NULL,
`UserID` int (7) NOT NULL,
`EnrolmentID` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`AttendanceID`)
, CONSTRAINT `Attendance_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Attendance_Student_StudentID` FOREIGN KEY (`StudentID`) REFERENCES `tbl_Student` (`StudentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Attendance_Facilitator_FacilitatorID` FOREIGN KEY (`FacilitatorID`) REFERENCES `tbl_Facilitator` (`FacilitatorID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Attendance_Cycle_CycleID` FOREIGN KEY (`CycleID`) REFERENCES `tbl_Cycle` (`CycleID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Attendance_Course_CourseID` FOREIGN KEY (`CourseID`) REFERENCES `tbl_Course` (`courseID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Attendance_Level_LevelID` FOREIGN KEY (`LevelID`) REFERENCES `tbl_Level` (`LevelID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Attendance_Cycle_Session_SessionID` FOREIGN KEY (`SessionID`) REFERENCES `tbl_Cycle_Session` (`SessionID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Attendance_User_UserID` FOREIGN KEY (`UserID`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
, CONSTRAINT `Attendance_Cycle_Enrolment_EnrolmentID` FOREIGN KEY (`EnrolmentID`) REFERENCES `tbl_Cycle_Enrolment` (`EnrolmentID`) ON DELETE RESTRICT ON UPDATE RESTRICT 
,
 CONSTRAINT `Attendance_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Attendance_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Vacation' with physical name of 'tbl_Vacation'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Vacation`;

CREATE TABLE `tbl_Vacation` (
`ProgramID` int (7) NOT NULL,
`VacationID` int (7) NOT NULL AUTO_INCREMENT,
`VacationName` varchar (25) NOT NULL,
`VacationDate` date NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`VacationID`)
, CONSTRAINT `Vacation_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Vacation_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Vacation_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'Config' with physical name of 'tbl_Config'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Config`;

CREATE TABLE `tbl_Config` (
`AdminUser` int (7) NOT NULL
);


/* @Creation of Table 'Session_Change_Reason' with physical name of 'tbl_Session_Change_Reason'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_Session_Change_Reason`;

CREATE TABLE `tbl_Session_Change_Reason` (

`ReasonID` int (7) NOT NULL AUTO_INCREMENT,
`ReasonName` varchar (25) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ReasonID`)
, CONSTRAINT `Session_Change_Reason_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `Session_Change_Reason_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `Session_Change_Reason_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


/* @Creation of Table 'ValueChange' with physical name of 'tbl_ValueChange'
 * @Updated on '20.09.2016'*/

DROP TABLE IF EXISTS `tbl_ValueChange`;

CREATE TABLE `tbl_ValueChange` (
`ProgramID` int (7) NOT NULL,
`ChangeID` int (7) NOT NULL AUTO_INCREMENT,
`ChangeTypeID` int (7) NOT NULL,
`ChangeTypeName` varchar (25) NOT NULL,
`RecordID` int (7) NOT NULL,
`OldValue` varchar (25) NOT NULL,
`NewValue` varchar (25) NOT NULL,
`ChangeReasonID` int (7) NOT NULL,
`Active` tinyint NOT NULL,
`Created` DATETIME NOT NULL,
`CreatedBy` int(7) NOT NULL,
`Updated` DATETIME NOT NULL,
`UpdatedBy` int(7) NOT NULL,
PRIMARY KEY (`ChangeID`)
, CONSTRAINT `ValueChange_Program_ProgramID` FOREIGN KEY (`ProgramID`) REFERENCES `tbl_Program` (`ProgramID`) ON DELETE RESTRICT ON UPDATE RESTRICT ,
 CONSTRAINT `ValueChange_User_CreatedBy` FOREIGN KEY (`CreatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT
,CONSTRAINT `ValueChange_User_UpdatedBy` FOREIGN KEY (`UpdatedBy`) REFERENCES `tbl_User` (`UserID`) ON DELETE RESTRICT ON UPDATE RESTRICT

);


