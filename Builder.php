<?php
class Builder{
  public static function build($path){
    $files = [];
    foreach(glob($path.'/*') as $file)
      if(!is_dir($file))
        $files[] = $file;
        
    return $files;
  }

  public static function reqursiveBuild($path){
    $files = [];
    foreach(glob($path.'/*') as $file)
      if(!is_dir($file))
        $files[] = $file;
      else
        foreach(static::reqursiveBuild($file) as $file)
          $files[] = $file;

    return $files;
  }
}
?>
