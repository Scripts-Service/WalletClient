/* 
* facebook.com/mooos.os
* WALLET_FUNCTION_CALL_ADD FUNCTION */

CREATE PROCEDURE [dbo].[WALLET_FUNCTION_CALL_ADD]
@in_TransectionID varchar(20),
@in_Amount int,
@in_personalMessage varchar(128),
@in_Ref varchar(10),
@in_TransectionTime varchar(128)
AS
BEGIN
SET NOCOUNT ON;
declare @CustomerID int
	if not exists (SELECT TransectionID from WALLET_TOPUP_LOG WHERE TransectionID = @in_TransectionID) begin
		if not exists (SELECT CustomerID from Accounts WHERE email = @in_personalMessage) 
			begin
				INSERT INTO WALLET_TOPUP_LOG(TransectionID, Amount, personalMessage, Ref, TransectionTime, Status) VALUES (@in_TransectionID, @in_Amount, @in_personalMessage, @in_Ref, @in_TransectionTime, 1)
				select 1 as ResultCode, 'Email Error' as ResultMsg;
				return;
			end
			ELSE
			BEGIN
					SELECT @CustomerID = CustomerID from Accounts WHERE email = @in_personalMessage
					INSERT INTO WALLET_TOPUP_LOG(TransectionID, Amount, personalMessage, Ref, TransectionTime, Status, CustomerID) VALUES (@in_TransectionID, @in_Amount, @in_personalMessage, @in_Ref, @in_TransectionTime, 0, @CustomerID)				
					/*
					D.I.Y
					*/
					select 2 as ResultCode, 'Success' as ResultMsg;
					return;		
			end
	end
	ELSE
	BEGIN
		select 0 as ResultCode, 'already add' as ResultMsg;
		return;		
	end
END
