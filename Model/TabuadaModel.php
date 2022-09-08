<?php 

class TabuadaModel
{
    public function GetTabelaCalculada($n)
    {
        
    	$s = "";
    	for($i=1; $i<=10; $i++)
    	{
    		$s .= $i . ' x ' . $n . ' = ' . ($i*$n) . '<br>';
    	}

    	return $s;

    } // TabelaCalculada

} // class TabuadaModel