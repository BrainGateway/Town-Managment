<?php

namespace Modules\Notifier\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Notifier\Http\Requests\NotificationRequest;
use Modules\Notifier\Proxies\Repositories\NotificationRepository;
use Modules\Notifier\Transformers\NotificationResource;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return NotificationResource::collection(NotificationRepository::filter());
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
    public function store(NotificationRequest $request)
    {
        $notification = NotificationRepository::create($request->all());
        return $this->show($notification->id);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       return new NotificationResource(NotificationRepository::findorFail($id));
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
    public function update(NotificationRequest $request, $id)
    {
        $notification = NotificationRepository::findorFail($id);
        $notification->update($request->all());

        return $this->show($notification->id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $notification = NotificationRepository::findorFail($id);
        $notification->delete();

        return response()->json(['success'=>'notification is deleted']);
    }
}
