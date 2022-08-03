<?php

namespace Modules\Notifier\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notifier\Http\Requests\SmsNotificationRequest;
use Modules\Notifier\Proxies\Repositories\NotificationRepository;
use Modules\Notifier\Proxies\Repositories\SmsNotificationRepository;
use Modules\Notifier\Transformers\SmsNotificationResource;

class SmsNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return SmsNotificationResource::collection(SmsNotificationRepository::with('notification')->filter());
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
    public function store(SmsNotificationRequest $request)
    {
        $notification = NotificationRepository::create($request->all());
        $data = $request->all();

        $data['notification_id'] = $notification->id;
        $sms = SmsNotificationRepository::create($data);

        return $this->show($sms->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       return new SmsNotificationResource(SmsNotificationRepository::with('notification')->findorFail($id));
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
    public function update(SmsNotificationRequest $request, $id)
    {
        $sms = SmsNotificationRepository::findorFail($id);
        $notification = $sms->notification()->first();

        $notification->update($request->all());
        $sms->update($request->all());

        return $this->show($sms->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $sms = SmsNotificationRepository::findorFail($id);
        $sms->notification->delete();
        $sms->delete();

        return response()->json(['success'=>'sms notification is deleted']);
    }
}
