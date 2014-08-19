<?php
    $ranges = array(
        'main' => array(
            'min' => 1,
            'max' => 42,
            'count' => 6,
            'numbersPerRow' => 6,
        ),
        'stars' => array(
            'min' => 1,
            'max' => 6,
            'count' => 1,
            'numbersPerRow' => 3,
        )
    );
    
    foreach($ranges as $key=>$attribs) {
        $numbers = generateSet($attribs);
        $layout = getLayout($numbers,$attribs);
        
        print strtoupper($key) . "\n" . str_repeat('=',strlen($key)) . "\n" . $layout . "\n";
    }
    
    function generateSet($attribs) {
        $min = $attribs['min'];
        $max = $attribs['max'];
        $count = $attribs['count'];
        
        $out = array();
        $current = 0;
        while($current < $count) {
            $current++;
            
            $duplicate = true;
            while($duplicate) {
                $number = rand($min,$max);
                
                if(!isset($out[$number])) {
                    $out[$number] = $number;
                    break;
                }
            }
        }
        
        return $out;
    }
    
    function getLayout($numbers,$attribs) {
        $min = $attribs['min'];
        $max = $attribs['max'];
        $numbersPerRow = $attribs['numbersPerRow'];
        
        $out = null;
        for($i = $min; $i<=$max; $i++) {
            if(isset($numbers[$i])) {
                $spacer = '|';
            }
            else {
                $spacer = ' ';
            }
            
            if($i < 10) {
                $fill = ' ';
            }
            else {
                $fill = null;
            }
            
            $out .= $spacer . $fill . $i . $spacer . ' ';
            
            if($i % $numbersPerRow == 0) {
                $out .= "\n";
            }
        }
        
        return $out;
    }
?>