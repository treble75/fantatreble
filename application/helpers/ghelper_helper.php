<?php
	function replace($string)
	{
		$string = str_replace (".",",",$string);
		return $string;
	}
	
	function dataIns($data)
	{
		$data = substr($data,8,2)."/".substr($data,5,2)."/".substr($data,0,4);
		return $data;
	}
        
        function dataSettimanale($data)
	{
                $mese = substr($data,5,2);
                switch ($mese) {
                                case ($mese == "01"):
                                    $label = 'Gennaio';
                                    break;
                                case ($mese == "02"):
                                    $label = 'Febbraio';
                                    break;
                                case ($mese == "03"):
                                    $label = 'Marzo';
                                    break;
                                case ($mese == "04"):
                                    $label = 'Aprile';
                                    break;
                                case ($mese == "05"):
                                    $label = 'Maggio';
                                    break;
                                case ($mese == "06"):
                                    $label = 'Giugno';
                                    break;
                                case ($mese == "07"):
                                    $label = 'Luglio';
                                    break;
                                case ($mese == "08"):
                                    $label = 'Agosto';
                                    break;
                                case ($mese == "09"):
                                    $label = 'Settembre';
                                    break;
                                case ($mese == "10"):
                                    $label = 'Ottobre';
                                    break;
                                case ($mese == "11"):
                                    $label = 'Novembre';
                                    break;
                                case ($mese == "12"):
                                    $label = 'Dicembre';
                                    break;
                            }
		$data_calendario = substr($data,8,2)." ".$label." ".substr($data,0,4);
		return $data_calendario;
	}
?>