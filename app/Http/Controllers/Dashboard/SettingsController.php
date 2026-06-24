<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Models\SettingsTranslation;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('settings index'), Response::HTTP_FORBIDDEN,'403 Forbidden');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('settings create'), Response::HTTP_FORBIDDEN,'403 Forbidden');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $setting)
    {
        abort_if(Gate::denies('settings edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        return view('back.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $setting)
    {
        abort_if(Gate::denies('settings edit'), Response::HTTP_FORBIDDEN,'403 Forbidden');

        if($request['logo']){


            $uploadedImg = $request->file('logo');
            $logo = time() . '.' . $uploadedImg->extension();
            \File::isDirectory(public_path('storage/logo')) or \File::makeDirectory(public_path('storage/logo'), 0777, true, true);
            $image = Image::make($uploadedImg);
            $image->save(public_path('storage/logo/'.$logo));
        }else{
            $logo = $request['old_logo_light'];
        }

        if($request['section_img']){


            $uploadedImg = $request->file('section_img');
            $section_img = time() . '.' . $uploadedImg->extension();
            \File::isDirectory(public_path('storage/logo')) or \File::makeDirectory(public_path('storage/logo'), 0777, true, true);
            $image = Image::make($uploadedImg);
            $image->save(public_path('storage/logo/'.$section_img));
        }else{
            $section_img = $request['old_section_img'];
        }
        
        if (filled($request->discount_check)) {
            $discount_check = '1';
        } else {
            $discount_check = '0';
        }

                
        $setting->update([
            'logo_light'=>$logo,
            'img'=>$section_img,
            'discount_check'=>$discount_check,
            'phone'=>$request['phone'],
            'email'=>$request['email'],
            'whatsapp'=>$request['whatsapp'],
            'facebook'=>$request['facebook'],
            'instagram'=>$request['instagram'],
            'linkedin'=>$request['linkedin'],
            'tiktok'=>$request['tiktok'],
            'twitter'=>$request['twitter'],
            'youtube'=>$request['youtube'],
            'telegram'=>$request['telegram'],
            'valyuta'=>$request['valyuta'],
            'valyuta_eur'=>$request['valyuta_eur'],
            'map'=>$request['map']
        ]);
        
        for($locale = 0; $locale < count($request->locale); $locale++){
            SettingsTranslation::where(['settings_id'=>$setting->id,'locale'=>$request->locale[$locale]])->update([
                'site_title'=>$request['site_title'][$locale],
                'site_desc'=>$request['site_desc'][$locale],
                'site_keywords'=>$request['site_keywords'][$locale],
                'slogan'=>$request['slogan'][$locale],
                'contact_text'=>$request['contact_text'][$locale],
                'address'=>$request['address'][$locale],
                'copyrights'=>$request['copyrights'][$locale],
                'footer_text'=>$request['footer_text'][$locale],
            ]);
        }

        return redirect()->route('settings.edit',['setting'=>$setting->id])->with(['alertTitle' => 'Təbriklər', 'alertContent' => 'Məlumatlar uğurla yeniləndi.', 'alertType' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        abort_if(Gate::denies('settings delete'), Response::HTTP_FORBIDDEN,'403 Forbidden');

    }
}
