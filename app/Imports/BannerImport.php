<?php

namespace App\Imports;

use App\Models\Banner;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;

class BannerImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach($rows as $row){
            $ban_creator = Auth::user()->id;
            $ban_slug = uniqid(2026)."_".uniqid(1258);
                Banner::create([
                    'ban_title'=>$row['0'],
                    'ban_subtitle'=>$row['1'],
                    'ban_btn'=>$row['2'],
                    'ban_url'=>$row['3'],
                    'ban_slug'=>$ban_slug,
                    'ban_creator'=>$ban_creator,
                ]);
        }
    }
}
