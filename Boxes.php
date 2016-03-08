<?php
class Boxes 
{
  const LARGE_BOX_CAPACITY = 5;
  const SMALL_BOX_CAPASITY = 1;
  
  public static function minimalNumberOfBoxes($products, $availableLargeBoxes, $availableSmallBoxes) 
  {
    $totalBoxes = 0;    
    if ($availableLargeBoxes > 0 && $availableSmallBoxes == 0) {
        $totalBoxes = ceil($products / self::LARGE_BOX_CAPACITY);
    } else if ($availableLargeBoxes == 0 && $availableSmallBoxes > 0) {
        $totalBoxes = ceil($products / self::SMALL_BOX_CAPASITY);
    } else if ($availableSmallBoxes == 0 && $availableLargeBoxes == 0) {
        $totalBoxes = -1;
    } else {
        $largeBoxesToUse = floor($products / self::LARGE_BOX_CAPACITY);
        $smallBoxesToUse = ceil((($products - $largeBoxesToUse * self::LARGE_BOX_CAPACITY) / self::SMALL_BOX_CAPASITY));
        $totalBoxes = $largeBoxesToUse + $smallBoxesToUse;      
    }
    if ($totalBoxes > ($availableLargeBoxes + $availableSmallBoxes)) {
        $totalBoxes = -1;
    }    
    return $totalBoxes;
  }
}

// For testing purposes (do not submit uncommented)
//echo Boxes::minimalNumberOfBoxes(12, 3, 3);
