<?php


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TiposGlobal
 *
 * @author jonathan
 */
class TiposGlobal {
     const  PRODUCT_TYPE_HOTEL="HOTEL";

     
     
     
     
     const  I18N_TYPE_HOTEL_ROOMNOTES="HOTEL_ROOMNOTES";
     const  I18N_TYPE_HOTEL_DININGANDDRINKING="HOTEL_DININGANDDRINKING";
     const  I18N_TYPE_PRODUCT_DIRECTION="PRODUCT_DIRECTION";
     const  I18N_TYPE_PRODUCT_DESCRIPTION="PRODUCT_DESCRIPTION";
     const  I18N_TYPE_REVIEW="REVIEW";
     
     const  I18N_TYPE_ROOM_DESCRIPTION="ROOM_DESCRIPTION";
     const  I18N_TYPE_ROOM_INCLUDE="ROOM_INCLUDE";
     
     
     
     static $HOTEL_FEATURES=array('restaurant','bar',
                                'business_center',
                                'swimmingpool',
                                'wet_bar',
                                'wheelchair_accessible',
                                'internet',
                                'fitness_center',
                                'private_car_park',
                                'gift_shop',
                                'tour_desk',
                                'laundry_service',
                                'gardens',
                                'nature_trails',
                                'socialfunctions_services',
                                'golf_court',
                                'tennis_court',
                                'childcare',
                                'spa',
                                'beauty_salon',
                                'room_service', 
                                'concierge'         
                            );  
     
      static $HOTEL_FEATURESDETAILS=array(
                                    'conference_facilities'=>'conferencefacilities_details',
                                    'certifications'=>'certifications_details',
                                    'free_shuttle_service'=>'freeshuttleservice_details'
                                  ); 
     
    static $HOTEL_DININGANDDRINKING=array(
                                'vegetarian',
                                'kosher'
                                ); 
    
    
    static $ROOM_AMENITIES=array(
                            'air_conditioning',
                            'alarm_clock',
                            'cable_tv',
                            'coffee_maker',
                            'desk_&_chair',
                            'free_internet',
                            'hairdryer',
                            'iron_&_ironing_board',
                            'jacuzzi',
                            'microwave',
                            'minibar',
                            'orthopedic_matresses', 
                            'refrigerator',
                            'safe_deposit_box',
                            'suite_bathrooms',
                            'telephone',
                            'fan',
                            'make_up_mirror',
                            'balcony',
                            'private_garden'
                            ); 
    
    
    
    
     /*
     const  I18N_TYPE_HOTEL_DESCRIPTION="HOTEL_DESCRIPTION";
     const  I18N_TYPE_HOTEL_DESCRIPTION="HOTEL_DESCRIPTION";*/

    //put your code here
}

?>
