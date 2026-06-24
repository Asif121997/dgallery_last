<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceTranslation;
class ServiceController extends Controller
{
    public function index(){


        $services = Service::active()->get();
        
        $meta['title'] = 'Xidmətlər';
        
        $lang = [
            'az' => '/xidmetler',
            'ru' => '/ru/xidmetler',
        ];

        return view('site.services.list',compact('services','meta','lang'));
    }

    public function inner($slug){

        $service = Service::whereHas('serviceTranslations', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })->active()->firstOrFail();

       


        $lastServices = Service::active()->where('id','!=',$service->id)->orderBy('created_at','desc')->get();
        
        $meta['title'] = $service->serviceTranslations->where('locale','az')->first()->title;
        $meta['description'] = $service->serviceTranslations->where('locale','az')->first()->description;
       
         
        $lang = [
            'az' => '/xidmet'.$service->serviceTranslations->where('locale','az')->first()->slug,
            'ru' => '/ru/xidmet'.$service->serviceTranslations->where('locale','ru')->first()->slug,
        ];
        

        return view('site.services.inner',compact('service','lastServices','meta','lang'));
    }
}
