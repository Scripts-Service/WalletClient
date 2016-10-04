/* 
* facebook.com/mooos.os
* WALLET_FUNCTION_CALL_TOTAL FUNCTION */

CREATE PROCEDURE [dbo].[WALLET_FUNCTION_CALL_TOTAL]
@in_date varchar(30)
AS
BEGIN
SET NOCOUNT ON;
select SUM(Amount) as Total from WALLET_TOPUP_LOG WHERE TransectionTime LIKE '%' + @in_date + '%'
return;
END
