/* 
* facebook.com/mooos.os
* WALLET_TOPUP_LOG TABLE */

CREATE TABLE [dbo].[WALLET_TOPUP_LOG] (
[TransectionID] bigint NOT NULL ,
[Amount] int NULL ,
[personalMessage] varchar(128) NULL ,
[Ref] varchar(10) NULL ,
[TransectionTime] varchar(128) NULL ,
[Status] int NULL DEFAULT ((0)) ,
[CustomerID] int NULL DEFAULT NULL 
)
GO

ALTER TABLE [dbo].[WALLET_TOPUP_LOG] ADD PRIMARY KEY ([TransectionID])
GO
