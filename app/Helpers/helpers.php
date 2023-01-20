<?php

/**
 * Write code on Method
 * 
 * @return response()
 **/

 if(!function_exists('browserName')){
    function browserName($user_agent)
    {
        $result = Browser::parse($user_agent)->browserFamily();

       return $result;
    }
}

if(!function_exists('activeGuard')){

    function activeGuard()
    {
        foreach(array_keys(config('auth.guards')) as $guard){
            if(auth()->guard($guard)->check()) return $guard;
        }
        return null;
    }
}

if(!function_exists('platformName')){
    function platformName($user_agent)
    {
        $result = Browser::parse($user_agent)->platformFamily();

       return $result;
    }
}

if(!function_exists('browserIcon')){
    function browserIcon($user_agent)
    {
        $browser = Browser::parse($user_agent);
        $icon = '';
        
        $icon = $browser->isWindows() ? 'ti-brand-windows text-info' : 'ti-device-mobile text-danger';
        $icon = $browser->isAndroid() ? 'ti-brand-android text-success' : $icon;
        $icon = $browser->isMac() ? 'ti-brand-apple' : $icon;
        $icon = $browser->isLinux() ? 'ti-brand-ubuntu text-warning' : $icon;

        return $icon;
    }
}

if(!function_exists('deviceName')){
    function deviceName($user_agent)
    {
        $result = Browser::parse($user_agent);

       return $result->platformFamily;
    }
}

 if(!function_exists('userCategory')){
    function userCategory($category)
    {
        $title = '';
        switch ($category) {
           case '1':
               $title = 'Advocate';
               break;

           case '2':
               $title = 'Intern Advocate';
               break;

           case '3':
               $title = 'Support Staff';
               break;                      
               
           default:
               $title = 'Technical Staff';
               break;
       }

       return $title;
    }
}

if(!function_exists('userStatus')){
    function userStatus($status)
    {
        $icon = '';
        $btn_class = '';
        $title = '';
        switch ($status) {
           case '1':
               $title = 'N/A';
               $btn_class = 'info';
               $icon = 'user-check';
               break;

           case '2':
               $title = 'Active';
               $btn_class = 'success';
               $icon = 'user-check';
               break;

           case '3':
               $title = 'Inactive';
               $btn_class = 'primary';
               $icon = 'user-minus';
               break;

           case '4':
               $title = 'Suspended';
               $btn_class = 'warning';
               $icon = 'user-exclamation';
               break;

           case '5':
               $title = 'Struck Off';
               $btn_class = 'danger';
               $icon = 'user-x';
               break;                        
               
           default:
               $title = 'Deceased';
               $btn_class = 'secondary';
               $icon = 'user-off';
               break;
       }

       return $title;
    }
}

if(!function_exists('badge')){
    function badge($status)
    {
        $icon = '';
        $btn_class = '';
        $title = '';
        switch ($status) {
           case '1':
               $title = 'N/A';
               $btn_class = 'info';
               $icon = 'user-check';
               break;

           case '2':
               $title = 'Active';
               $btn_class = 'success';
               $icon = 'user-check';
               break;

           case '3':
               $title = 'Inactive';
               $btn_class = 'primary';
               $icon = 'user-minus';
               break;

           case '4':
               $title = 'Suspended';
               $btn_class = 'warning';
               $icon = 'user-exclamation';
               break;

           case '5':
               $title = 'Struck Off';
               $btn_class = 'danger';
               $icon = 'user-x';
               break;                        
               
           default:
               $title = 'Deceased';
               $btn_class = 'secondary';
               $icon = 'user-off';
               break;
       }

       return $btn_class;
    }
}

    if(!function_exists('icon')){
        function icon($status)
        {
            $icon = '';
            $btn_class = '';
            $title = '';
            switch ($status) {
               case '1':
                   $title = 'N/A';
                   $btn_class = 'info';
                   $icon = 'user-check';
                   break;
    
               case '2':
                   $title = 'Active';
                   $btn_class = 'success';
                   $icon = 'user-check';
                   break;
    
               case '3':
                   $title = 'Inactive';
                   $btn_class = 'primary';
                   $icon = 'user-minus';
                   break;
    
               case '4':
                   $title = 'Suspended';
                   $btn_class = 'warning';
                   $icon = 'user-exclamation';
                   break;
    
               case '5':
                   $title = 'Struck Off';
                   $btn_class = 'danger';
                   $icon = 'user-x';
                   break;                        
                   
               default:
                   $title = 'Deceased';
                   $btn_class = 'secondary';
                   $icon = 'user-off';
                   break;
           }
    
           return $icon;
        }
}