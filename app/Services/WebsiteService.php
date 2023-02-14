<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Favorite;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Review;
use App\Models\Slider;

class WebsiteService
{
    private $service, $active, $inactive;
    public function __construct()
    {
        $this->service = new QueryService();
        $this->active = config('dummy.status.active.key');
        $this->inactive = config('dummy.status.disabled.key');
    }

    public function getSlider()
    {
        return $this->service->collectionGet(Slider::query(), $this->active, "ordering:asc")->get();
    }

    public function getCategory()
    {
        return $this->service->collectionGet(Category::query(), $this->active, "id:desc")->whereNull('parent_id')->get();
    }

    public function getProduct($perPage = null)
    {
        $product = Product::query()->when(session()->has('default_sorting'), function ($query) {
            switch (session()->get('default_sorting')) {
                case config('dummy.default_sorting.newest.key'):
                    $query->orderByDesc('id');
                    break;
                case config('dummy.default_sorting.oldest.key'):
                    $query->orderBy('id');
                    break;
                case config('dummy.default_sorting.price_low_to_high.key'):
                    $query->orderBy('price');
                    break;
                case config('dummy.default_sorting.price_high_to_low.key'):
                    $query->orderByDesc('price');
                    break;
                default:
                    $query->orderByDesc('id');
                    break;
            }
        });

        return $this->service->collectionGet($product, $this->active, "id:desc")
                ->when(request()->has('search'), function ($query) {
                    $query->where('name', 'like', '%' . request('search') . '%');
                })
                ->when(request()->has('category'), function ($query) {
                    $query->whereRaw('JSON_CONTAINS(category, \'[{"_id":'.request('category').'}]\')');
                })
                ->paginate($perPage ?? 15);
    }

    public function detailProduct($slug)
    {
        return $this->service->collectionFirst(Product::query(), $this->active,"slug:$slug");
    }

    public function getGallery($id)
    {
        return $this->service->collectionGet(ProductColor::query(), $this->active, "id:desc")
                ->whereId($id)
                ->pluck('gallery')
                ->toArray();
    }

    public function getCollectionProduct($id)
    {
        return $this->service->collectionGet(Product::query(), $this->active, "id:desc")
                ->whereParentId($id)
                ->get();
    }

    public function getRelatedProduct($id, $category)
    {
        $categories = collect(json_decode($category, true))->pluck('_id')->toArray();

        return $this->service->collectionGet(Product::query(), $this->active, "id:desc")
                ->whereNotIn('id', [$id])
                ->when($categories, function ($query) use ($categories) {
                    foreach ($query->get() as $key => $value) {
                        $valueCategories = collect(json_decode($value->category, true))->pluck('_id')->toArray();
                        if (count(array_intersect($categories, $valueCategories)) == 0) {
                            $query->whereNotIn('id', [$value->id]);
                        }
                    }
                })
                ->limit(12)
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

        $favorite = Favorite::query()
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
            Favorite::create([
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
        return Favorite::query()
                    ->whereUserId(auth('web')->user()->id)
                    ->whereIsFavorite($this->active)
                    ->pluck('product_id')
                    ->toArray();
    }

    public function storeReviewProduct($id)
    {
        $message = 'Review added successfully';
        $status  = 'success';

        $review = Review::query()
                    ->whereUserId(auth('web')->user()->id)
                    ->whereProductId($id)
                    ->first();

        $items = [
            'product_id'      => $id,
            'user_id'         => auth('web')->user()->id,
            'quality_rate'    => request('quantity'),
            'service_rate'    => request('supplier'),
            'delivery_rate'   => request('shipping'),
        ];

        if ($review) {
            $message = 'Review updated successfully';
            $review->update($items);
        }else{
            Review::create($items);
        }

        return [
            'message' => $message,
            'status'  => $status,
        ];
    }
}