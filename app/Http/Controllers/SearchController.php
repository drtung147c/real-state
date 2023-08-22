<?php

namespace App\Http\Controllers;

use App\Http\Resources\YesNoResource;
use App\Venue;

class SearchController extends Controller
{

    public function index()
    {
        if (!$this->validateField()) {
            $homeController = new HomeController;

            return $homeController->index();
        }

        $venues = Venue::with('event_types')
            ->orderBy('priority', 'DESC')
            ->when(request('event_type'), function($query) {
                if (request('event_type')) {
                    return $query->whereHas('event_types', function ($q) {
                        $q->where('event_types.slug', request('event_type'));
                    }
                    );
                }
            })
            ->when(request('is_rent'), function($query) {
                if (request('is_rent')) {
                    return $query->where('venues.is_rent', request('is_rent'));
                }
            })
            ->with(['location' => function($query){
                if (request('location')) {
                    return $query->where('slug', request('location'));
                }
            }])
            ->where('status', YesNoResource::YES)
            ->latest()
            ->paginate(3);

        return view('search', compact('venues'));
    }

    /**
     * @return array|bool
     */
    protected function validateField()
    {
        $result = true;
        $messages = [];
        if (!request('event_type') && !request('is_rent') && !request('location')) {
            $messages['error'] = [trans('message.message_need_choose')];
        }
        if (!empty($messages)) {
            session()->put('messages', $messages);
            $result = false;
        }

        return $result;
    }
}
