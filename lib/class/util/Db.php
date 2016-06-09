<?php
# ERROR CLASS *****************************************************************************************************
class DB
{
	function ResultOk($RST, $Msg, $mode = false)
	{
		if(!($RST && mysql_num_rows($RST) ) )
		{
			if($mode)
			{
				$err_no = mysql_errno();
				$err_msg = mysql_error();
				$Msg = "ERROR CODE " . $err_no . " : $err_msg";
			}
			$Msg = addslashes($Msg);
			JS::HistoryBack($Msg);
		}
	}
	function QueryOk($RST, $Msg, $mode = false)
	{
		if(!($RST) )
		{
			if($mode)
			{
				$err_no = mysql_errno();
				$err_msg = mysql_error();
				$Msg = "ERROR CODE " . $err_no . " : $err_msg";
			}
			$Msg = addslashes($Msg);
			JS::HistoryBack($Msg);
		}
	}
}
?>