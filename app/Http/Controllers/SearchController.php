<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\User;
use App\Models\Phonenumber;
use App\Models\Lawscategory;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function result(User $user)
    {
        $User = User::findorfail($user->id)->with('phone');
        $practicing = $user->practicing;
        $facebook = '';
        $instagram = '';
        $twitter = '';
        $whatsapp = '';
        foreach($user->socials as $social){
            $facebook = $social->social == 'facebook' ? $social->link : $facebook;
            $instagram = $social->social == 'instagram' ? $social->link : $instagram;
            $twitter = $social->social == 'twitter' ? $social->link : $twitter;
            $whatsapp = $social->social == 'whatsapp' ? $social->link : $whatsapp;
        }

        $facebook = empty($facebook) ? ['icon'=>'ti-link','link'=>'','btn'=>'secondary', 'label'=>'link'] : ['icon'=>'ti-eye','link'=>$facebook,'btn'=>'primary', 'label'=>'unlink'] ;
        $instagram = empty($instagram) ? ['icon'=>'ti-link','link'=>'','btn'=>'secondary', 'label'=>'link'] : ['icon'=>'ti-eye','link'=>$instagram,'btn'=>'primary', 'label'=>'unlink'];
        $twitter = empty($twitter) ? ['icon'=>'ti-link','link'=>'','btn'=>'secondary', 'label'=>'link'] : ['icon'=>'ti-eye','link'=>$twitter,'btn'=>'primary', 'label'=>'unlink'] ;
        $whatsapp = empty($whatsapp) ? ['icon'=>'ti-link','link'=>'','btn'=>'secondary', 'label'=>'link'] : ['icon'=>'ti-eye','link'=>$whatsapp,'btn'=>'primary', 'label'=>'unlink'] ;

       
        return view('search.profile',compact('user','facebook','instagram','twitter','whatsapp'));
    }

    public function search(Request $request){
        $name = $request->input('search');
        if($name){
            $results = User::where('name', 'like', '%'.$name.'%')
            ->orWhere('regNumber', 'like' , '%'.$name.'%')
            ->get();
              if ($results->count() == 0) {
                $categories = Lawscategory::where('title', 'like' , '%'.$name.'%')
                ->get();
                if ($categories->count() == 0) {
                    return view('search.result',[
                        'results' => $results,
                        'count' => $results->count(),
                        'search' => $name
                    ]);
                }else
                {
                    foreach($categories as $category) {
                        $results = Area::where('lawscategory_id',$category->id)->get();    
                            return view('search.category',[
                                'results' => $results,
                                'count' => $results->count(),
                                'search' => $name
                            ]);
                           
                     
                       }
                }
                          
              }
              else
              {
             return view('search.result',[
                'results' => $results,
                'count' => $results->count(),
                'search' => $name
            ]);
              }
            
        }
        else
        {
            return view('search.index');
        }
    }

    public function searchApi(Request $request){
        $data = User::pluck('name')->toArray();
        return $data;
    }

    public function searchVertical(Request $request){
        $data = User::all()->toArray();
        return $data;
    }
}
