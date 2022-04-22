<?php

namespace Modules\Vehicle\Enums;

use BenSampo\Enum\Rules\Enum;

final class Vehicle extends Enum{

    const vehicle_brand_name=[
        ["en"=>"Hyundai","ar"=>"هيونداي"],
        ["en"=>"Volkswagen","ar"=>"فولكس فاجن"],
        ["en"=>"BMW","ar"=>"بي إم دبليو"],
        ["en"=>"Mercedes","ar"=>"مرسيدس"],
        

    ];





    const vehicle_model_name=[
        ["en"=>"Verna","ar"=>"فيرنا"],
        ["en"=>"Beetle","ar"=>"بيتل"],
        ["en"=>" 1 Series","ar"=>" 1 Series"],
        ["en"=>"CLA 180","ar"=>"سي ال ايه 180"],
       
    ];
    
    
}