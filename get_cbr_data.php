<?php

	/**
	 * @author Max Barulin (https://github.com/linkonoid)
	 */

	$data = [];
	for ($date = strtotime('monday this week'); $date < strtotime('now'); $date = strtotime("+1 day", $date)) {

		$res = file_get_contents("http://www.cbr.ru/scripts/XML_daily.asp?date_req=".date("m/d/Y", $date));

		$obj = new SimpleXMLElement($res);

		$data[date("Y-m-d", $date)] = [
			"EUR" => (string) $obj->Valute[10]->Value,		
			"USD" => (string) $obj->Valute[9]->Value,
			"KGS" => (string) $obj->Valute[21]->Value,
		];
	}

	var_dump($data);
