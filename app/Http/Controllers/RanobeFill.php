<?php

namespace App\Http\Controllers;

use App\Models\Ranobe;
use Illuminate\Http\Request;
use App\Services\ApiClient;
use JetBrains\PhpStorm\NoReturn;

class RanobeFill extends Controller
{
    protected $apiClient;

    public function __construct(ApiClient $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @throws \Exception
     */
    #[NoReturn] public function show()
    {
        $data = $this->apiClient->get('manga', [
            'site_id' => (array) config('api.ranobe_site_id')
        ]);
        foreach ($data['data'] as &$item){
            $ranobe = new Ranobe();
            $ranobe->id = $item['id'];
            $ranobe->name = $item['name'];
            $ranobe->rus_name = $item['rus_name'];
            $ranobe->eng_name = $item['eng_name'];
            $ranobe->slug = $item['slug'];
            $ranobe->slug_url = $item['slug_url'];
            //remove filename
            unset($item['cover']['filename']);
            $ranobe->cover = json_encode($item['cover']);
            $ranobe->release_date = $item['releaseDateString'];
            $ranobe->rating = json_encode($item['rating']);
            $ranobe->title_status = $item['status']['id'];
            $ranobe->save();
        }
    }
}
