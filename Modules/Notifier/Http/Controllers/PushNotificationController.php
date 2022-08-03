<?php

namespace Modules\Notifier\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notifier\Entities\PushNotification;
use Modules\Notifier\Http\Requests\PushNotificationRequest;
use Modules\Notifier\Proxies\Repositories\NotificationRepository;
use Modules\Notifier\Proxies\Repositories\PushNotificationRepository;
use Modules\Notifier\Transformers\PushNotificationResource;

class PushNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return PushNotificationResource::collection(PushNotification::with('notification')->filter());
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('notifier::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PushNotificationRequest $request)
    {
        $notification = NotificationRepository::create($request->all());
        $data = $request->all();

        $data['notification_id'] = $notification->id;
        $pushNotification = PushNotificationRepository::create($data);

        return $this->show($pushNotification->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return new PushNotificationResource(PushNotificationRepository::with('notification')->findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('notifier::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PushNotificationRequest $request, $id)
    {
       $pushNotification = PushNotificationRepository::findorFail($id);

       $notification = $pushNotification->notification()->first();
       $notification->update($request->all());

       $pushNotification->update($request->all());

       return $this->show($pushNotification->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $pushNotification = PushNotificationRepository::findorFail($id);
        $pushNotification->notification->delete();
        $pushNotification->delete();

        return response()->json(['success'=>'push notification is deleted']);
    }
}
