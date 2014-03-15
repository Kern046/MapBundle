<?php

namespace Citadel\MapBundle\Services;

use Symfony\Component\Config\Definition\Exception;

class Generator{
    
    private $repository;
    
    public function __construct($repository){
        
        $this->repository = $repository;
        
    }
    
    public function generate($map){
        
        $image = imagecreatetruecolor(492,380);
        imagealphablending($image,false);

        $background = imagecolorallocate($image,150,150,150);
        $border     = imagecolorallocate($image,0,0,0);
        $fill       = imagecolorallocate($image,240,245,230);


        imagefill($image,0,0,$background);
        imagecolortransparent($image,$background);

        $areas = $map->getAreas();
        
        foreach($areas as $area){

            $coordinates = $area->getCoordinates();
            $points_number = count($coordinates)/2;
            
            imagefilledpolygon($image, $coordinates, $points_number, $fill);
            imagepolygon($image, $coordinates, $points_number, $border);

        }

        $this->store($image);
        imagedestroy($image);
        
    }
    
    public function store($image){
        
        imagepng($image,$this->getPath().'test.png');
        
    }
    
    public function getPath(){
        
        return __DIR__.'/../../../../web/'.$this->getRepository();
        
    }
    
    public function setRepository($repository){
        
        if(is_dir($this->getPath().$repository)){
            
            $this->repository = $repository;
            
        }else{
            
            throw new Exception\InvalidDefinitionException('Configured images repository doesn\'t exist.');
            
        }
        
    }
    
    public function getRepository(){
        
        return $this->repository;
        
    }
    
}