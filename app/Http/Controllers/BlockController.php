<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Http\Requests\StoreBlockRequest;
use App\Http\Requests\UpdateBlockRequest;
use Illuminate\Http\Request;
use App\Http\Resources\BlockResource;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->is('api/*')) {
                return BlockResource::collection(Block::all());
            } else {
                if ($request->ajax()) {
                    $block = Block::indexBlock();
                    $blockDatatable =  !empty($block) ? $block : [];
                    return $blockDatatable;
                }
                return view('block.index');
            }
            
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status' => 'error' , 'message' => $th->getMessage()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('block.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlockRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlockRequest $request)
    {
        try {
            $data                  = Arr::only($request->validated(),['name', 'address', 'NumOfPlots' ,'town_id']);
            if ($request->hasFile('logo')) {
                $logo = time().'-logo.'.$request->logo->getClientOriginalExtension();
                $data['logo'] = $logo;
                // Store Image in Public Folder
                $request->logo->move(public_path('block'), $logo); 

            }else{
                $data['logo'] = time(). '-logo.';
            }
            
            $block = Block::createBlock($data);


            if ($request->is('api/*')) {
                return $this->show($block->id);
            }else{
                return redirect()->route('block.index');
            }
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status' => 'error' , 'message' => $th->getTraceAsString()]);   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new BlockResource(Block::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $block = Block::findOrFail($id);
        return view('block.edit', compact('block'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlockRequest  $request
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlockRequest $request, $id)
    {
        try{   
            $block         = Block::find($id);
            $data          = Arr::only($request->validated(), ['name', 'address', 'town_id', 'NumOfPlots']);
            $logo          = time().'-logo.'.$request->logo->getClientOriginalExtension();

            if ($request->hasFile('logo')) {

                if (File::exists(asset("block/".$block->logo))) {
                    unlink(asset(asset("block/".$block->logo)));
                }  
                
                $logo               = time().'-logo.'.$request->logo->getClientOriginalExtension();
                $data['logo'] = $logo;
            }
            // dd($data);
            Block::updateBlock($id , $data);
            if ($request->is('api/*')) {
                return $this->show($id);
            } else {
                return redirect()->route('block.index');
            }
        } catch(\Throwable $th){
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(['status' => 'error' , 'message'=>$th->getMessage() ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Block  $block
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Block::destroyBlock($id);
            return response()->json(['status'=>'success' , 'message' => 'Requested block is deleted successfully']);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            Log::debug($th->getTraceAsString());
            return response()->json(["message" => 'error', 'message' => $th->getMessage()]);
        }
    }
}
