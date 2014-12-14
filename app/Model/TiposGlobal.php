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
     const  PRODUCT_TYPE_ACTIVITY="ACTIVITY";    
     const  PRODUCT_TYPE_PACKAGE="PACKAGE";    
     const  PRODUCT_TYPE_RENTACAR="RENTACAR"; 
     const  PRODUCT_TYPE_VEHICLE="VEHICLE";    
     
     const  I18N_TYPE_PACKAGE_INFORMATION="INFORMATION";
     
     const  I18N_TYPE_HOTEL_ROOMNOTES="HOTEL_ROOMNOTES";
     const  I18N_TYPE_HOTEL_DININGANDDRINKING="HOTEL_DININGANDDRINKING";
     const  I18N_TYPE_PRODUCT_DIRECTION="PRODUCT_DIRECTION";
     const  I18N_TYPE_PRODUCT_DESCRIPTION="PRODUCT_DESCRIPTION";
     const  I18N_TYPE_REVIEW="REVIEW";
     const  I18N_TYPE_INCLUDE_NOTE="INCLUDE_NOTE";
     
     const  I18N_TYPE_ITENERARY_DESCRIPTION='ITINERARY_DESCRIPTION';
     const  I18N_TYPE_ITENERARY_HEADLINE='ITINERARY_HEADLINE';

     
     const  I18N_TYPE_ROOM_DESCRIPTION="ROOM_DESCRIPTION";
     const  I18N_TYPE_ROOM_INCLUDE="ROOM_INCLUDE";
     
     const  I18N_TYPE_ACTIVITY_WHATTOBRING="ACTIVITY_WHATTOBRING";
     const  I18N_TYPE_ACTIVITY_NOTES="ACTIVITY_NOTES";
     const  I18N_TYPE_ACTIVITY_INCLUDES="ACTIVITY_INCLUDES";
     const  I18N_TYPE_ACTIVITY_POLICIES="ACTIVITY_POLICIES";
     const  I18N_TYPE_ACTIVITY_SHEDULE="ACTIVITY_SHEDULE";
     
     const  I18N_TYPE_RENTACAR_SERVICENOTES="RENTACAR_SERVICENOTES";
     const  I18N_TYPE_RENTACAR_TIPSANDSAFETY="RENTACAR_TIPSANDSAFETY";
     
     
     static  $DOMAIN_COUNTRY=array('PANAMAREPS'=>'PA','COSTARICAREPS'=>'CR','GUATEMALAREPS'=>'GT','NICARAGUAREPS'=>'NI');
     
     
     static function getCountry(){
	 
         $domain=$_SERVER['SERVER_NAME'];
         return TiposGlobal::getCountryByDomain($domain);
     }
     
     static function getCountryByDomain($domain){
         //return TiposGlobal::$DOMAIN_COUNTRY['PANAMAREPS'];
         return (isset(TiposGlobal::$DOMAIN_COUNTRY[$domain]))?TiposGlobal::$DOMAIN_COUNTRY[$domain]:'CR';
     }
     
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
    
    
      static $PACKAGE_SUITABLEFOR=array(
                                'solo_travellers',
                                'women_only_trips',
                                'independent_travellers',
                                'physically_challenged',
                                'families_with_small_children',
                                'honeymoon_anniversary_trip',
                                'seniors',
                                'groups'
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
