<?php

namespace App;

use Curl;
use Illuminate\Database\Eloquent\Model;
use Image;

class boudoir extends Model
{
    public static function getCountries()
    {
        return Curl::to('https://restcountries.eu/rest/v2/all')
            ->asJson()
            ->get();

    }
#-------------------------------------------------------------------------------
    public static function imageHandling($name, $input_field, $request, $width, $height)
    {

        $image_name = $name;
        $ex = ['png', 'jpg', 'jpeg', 'gif', 'bmp'];

        if ($request->hasFile($input_field) && $request->file($input_field)->isValid()) {
            if (isset($_FILES[$input_field]['name'])) {
                $file_info = pathinfo($_FILES[$input_field]['name']);
                if (in_array(strtolower($file_info['extension']), $ex)) {
                    if (isset($_FILES[$input_field]['tmp_name']) && is_uploaded_file($_FILES[$input_field]['tmp_name'])) {

                        $file = $request->file($input_field);
                        $image_name = date('d.m.Y.H.i.s') . '-' . $file->getClientOriginalName();

                        $request->file($input_field)->move(public_path() . '/images', $image_name);
                        $img = Image::make(public_path() . '/images/' . $image_name);
                        $img->resize($width, $height, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $img->save();
                    }
                }
            }

        }
        return $image_name;
    }
    #-------------------------------------------------------------------------------

    public static function fetch_urls($sub_id)
    {
        return \DB::table('products as p')
            ->join('sub_categories as s', 's.id', '=', 'p.subcategorie_id')
            ->select('s.s_url')
            ->where('s.id', '=', $sub_id)
            ->limit(1)
            ->get()
            ->toArray();
    }
}
