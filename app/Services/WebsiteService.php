<?php

namespace App\Services;

use App\Models\Banner;
use App\Models\Expert;
use App\Models\Favourite;
use App\Models\Feature;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Product;

class WebsiteService
{
    private $service, $active, $inactive;
    public function __construct()
    {
        $this->service = new QueryService();
        $this->active = config('dummy.status.active.key');
        $this->inactive = config('dummy.status.disabled.key');
    }

    public function getBanner($page)
    {
        return $this->service->collectionFirst(Banner::query(), $this->active, "page:$page");
    }

    public function getProduct($perPage = null)
    {
        return $this->service->collectionGet(Product::query(), $this->active, "id:desc")
                ->when(request()->has('search'), function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                })
                ->paginate($perPage ?? 15);
    }

    public function detailProduct($slug)
    {
        return $this->service->collectionFirst(Product::query(), $this->active,"slug:$slug");
    }

    public function getRecentlyAdded($id)
    {
        return $this->service->collectionGet(Product::query(), $this->active, "id:desc")
        ->whereNotIn('id', [$id])
        ->limit(6)
        ->get();
    }
    public function getRelatedProduct($id)
    {
        
        $recent = $this->getRecentlyAdded($id);
        $ids = [];
        foreach($recent as $key => $item){
            $ids[$key] = $item->id;
        }

        return $this->service->collectionGet(Product::query(), $this->active, "id:desc")
                ->whereNotIn('id', $ids)
                ->limit(6)
                ->get();
    }
    
    public function getPage($page)
    {
        return $this->service->collectionFirst(Page::query(), $this->active,"page:$page");
    }

    public function storeFavoriteProduct($id)
    {
        $message = 'Added to wishlist';
        $status  = 'success';
        $type    = 'add';

        $favorite = Favourite::query()
                    ->whereProductId($id)
                    ->whereUserId(auth('web')->user()->id)
                    ->first();

        if ($favorite) {
            if ($favorite->is_favorite == $this->active) {
                $message = 'Removed from wishlist';
                $status = 'success';
                $type = 'remove';
            }

            $favorite->update([
                'is_favorite' => $favorite->is_favorite == $this->active ? $this->inactive : $this->active,
            ]);
        }else{
            Favourite::create([
                'product_id' => $id,
                'user_id'   => auth('web')->user()->id,
                'is_favorite' => $this->active,
            ]);
        }

        return [
            'message' => $message,
            'status'  => $status,
            'type'    => $type,
        ];
    }

    public function getFavoriteProduct()
    {
        return Favourite::query()
                    ->whereUserId(auth('web')->user()->id)
                    ->whereIsFavorite($this->active)
                    ->pluck('product_id')
                    ->toArray();
    }

    public function getExpert()
    {
        return $this->service->collectionGet(Expert::query(), $this->active, "id:desc")
                ->get();
    }

    public function getPartner()
    {
        return $this->service->collectionGet(Partner::query(), $this->active, "id:desc")
                ->get();
    }
    
    // public function getFeature()
    // {
    //     return $this->service->collectionGet(Feature::query(), $this->active, "id:desc")
    //             ->get();
    // }
}