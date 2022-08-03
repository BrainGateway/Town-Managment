<?php

namespace Modules\Notifier\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notifier\Entities\Notification;
use Modules\Notifier\Http\Requests\EmailNotificationRequest;
use Modules\Notifier\Proxies\Repositories\EmailNotificationRepository;
use Modules\Notifier\Proxies\Repositories\NotificationRepository;
use Modules\Notifier\Transformers\EmailNotificationResource;

class EmailNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
       return EmailNotificationResource::collection(EmailNotificationRepository::with('notification')->filter());
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
    public function store(EmailNotificationRequest $request)
    {
        $notification = NotificationRepository::create($request->all());
        $data = $request->all();

        $data['notification_id'] = $notification->id;
        $email = EmailNotificationRepository::create($data);

        return $this->show($email->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return new EmailNotificationResource(EmailNotificationRepository::with('notification')->findorFail($id));
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
    public function update(EmailNotificationRequest $request, $id)
    {
        $email = EmailNotificationRepository::findorFail($id);
        $notification = $email->notification()->first();
        $notification->update($request->all());
        $email->update($request->all());

        return $this->show($email->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $email = EmailNotificationRepository::findorFail($id);
        $email->notification->delete();
        $email->delete();

        return response()->json(['success'=>'email notification is deleted']);
    }
}
