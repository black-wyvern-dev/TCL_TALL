<?php

namespace App\Http\Controllers;

use App\Models\Tanker;
use Illuminate\Http\Request;
use App\Http\Requests\TankerStoreRequest;
use App\Http\Requests\TankerUpdateRequest;

class TankerController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Tanker::class);
        $archive = false;
        if($request->archive) {
            $archive = true;
        }
        $search = $request->get('search', '');

        $tankers = Tanker::search($search)
            ->where('archive', '=', $archive)
            ->latest()
            ->paginate(20);

        return view('app.tankers.index', compact('tankers', 'search', 'archive'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Tanker::class);
        $tanker = null;
        return view('app.tankers.create', ['tanker' => $tanker]);
    }

    /**
     * @param \App\Http\Requests\TankerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TankerStoreRequest $request)
    {
        $this->authorize('create', Tanker::class);
        $validated = $request->validated();
        $tanker = Tanker::create($validated);
        if($tanker->type == "Rigid")
        {
            $src = "./img/splat-side-2.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2.png';
            $tanker->ext_splat_right = $dest;

            $src = "./img/splat-side-1.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1.png';
            $tanker->ext_splat_left = $dest;

            $src = "./img/splat-rear.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-rear.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear.png';
            $tanker->ext_splat_rear = $dest;

            $src = "./img/splat-side-front.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front.png';
            $tanker->ext_splat_front = $dest;

            $src = "./img/splat-internal.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-internal.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal.png';
            $tanker->int_splat = $dest;

        }
        else if($tanker->type == "Non-Rigid")
        {
            $src = "./img/splat-side-2.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2.png';
            $tanker->ext_splat_right = $dest;

            $src = "./img/splat-side-1.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1.png';
            $tanker->ext_splat_left = $dest;

            $src = "./img/splat-rear.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-rear.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear.png';
            $tanker->ext_splat_rear = $dest;

            $src = "./img/splat-side-front.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front.png';
            $tanker->ext_splat_front = $dest;

            $src = "./img/splat-internal.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-internal.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal.png';
            $tanker->int_splat = $dest;
        }
        else if($tanker->type == "Food")
        {
            $src = "./img/splat-side-2-food.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-food.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-food.png';
            $tanker->ext_splat_right = $dest;

            $src = "./img/splat-side-1-food.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-food.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-food.png';
            $tanker->ext_splat_left = $dest;

            $src = "./img/splat-rear-food.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-food.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-food.png';
            $tanker->ext_splat_rear = $dest;

            $src = "./img/splat-side-front-food.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-food.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-food.png';
            $tanker->ext_splat_front = $dest;

            $src = "./img/splat-internal-food.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-food.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-food.png';
            $tanker->int_splat = $dest;
        }
        else if($tanker->type == "Milk")
        {
            $src = "./img/splat-side-2-milk.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-milk.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-milk.png';
            $tanker->ext_splat_right = $dest;

            $src = "./img/splat-side-1-milk.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-milk.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-milk.png';
            $tanker->ext_splat_left = $dest;

            $src = "./img/splat-rear-milk.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-milk.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-milk.png';
            $tanker->ext_splat_rear = $dest;

            $src = "./img/splat-side-front-milk.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-milk.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-milk.png';
            $tanker->ext_splat_front = $dest;

            $src = "./img/splat-internal-milk.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-milk.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-milk.png';
            $tanker->int_splat = $dest;
        }
        else if($tanker->type == "Petrol")
        {
            $src = "./img/splat-side-2-petrol.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-petrol.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-petrol.png';
            $tanker->ext_splat_right = $dest;

            $src = "./img/splat-side-1-petrol.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-petrol.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-petrol.png';
            $tanker->ext_splat_left = $dest;

            $src = "./img/splat-rear-petrol.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-petrol.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-petrol.png';
            $tanker->ext_splat_rear = $dest;

            $src = "./img/splat-side-front-petrol.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-petrol.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-petrol.png';
            $tanker->ext_splat_front = $dest;

            $src = "./img/splat-internal-petrol.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-petrol.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-petrol.png';
            $tanker->int_splat = $dest;

        }
        else if($tanker->type == "Vacuum")
        {
            $src = "./img/splat-side-2-vacuum.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-vacuum.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-vacuum.png';
            $tanker->ext_splat_right = $dest;

            $src = "./img/splat-side-1-vacuum.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-vacuum.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-vacuum.png';
            $tanker->ext_splat_left = $dest;

            $src = "./img/splat-rear-vacuum.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-vacuum.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-vacuum.png';
            $tanker->ext_splat_rear = $dest;

            $src = "./img/splat-side-front-vacuum.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-vacuum.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-vacuum.png';
            $tanker->ext_splat_front = $dest;

            $src = "./img/splat-internal-vacuum.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-vacuum.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-vacuum.png';
            $tanker->int_splat = $dest;
        }
        else if($tanker->type == "Waste")
        {
            $src = "./img/splat-side-2-waste.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-waste.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-waste.png';
            $tanker->ext_splat_right = $dest;

            $src = "./img/splat-side-1-waste.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-waste.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-waste.png';
            $tanker->ext_splat_left = $dest;

            $src = "./img/splat-rear-waste.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-waste.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-waste.png';
            $tanker->ext_splat_rear = $dest;

            $src = "./img/splat-side-front-waste.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-waste.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-waste.png';
            $tanker->ext_splat_front = $dest;

            $src = "./img/splat-internal-waste.png";  // source folder or file
            $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-waste.png';
            copy($src, $dest);
            $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-waste.png';
            $tanker->int_splat = $dest;

        }
        $tanker->save();
        return redirect()
            ->route('tankers.edit', $tanker)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tanker $tanker)
    {
        $this->authorize('view', $tanker);

        return view('app.tankers.show', compact('tanker'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tanker $tanker)
    {
        $this->authorize('update', $tanker);

        return view('app.tankers.edit', compact('tanker'));
    }

    /**
     * @param \App\Http\Requests\TankerUpdateRequest $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function update(TankerUpdateRequest $request, Tanker $tanker)
    {
        $this->authorize('update', $tanker);

        $validated = $request->validated();
        if(!$request->type)
            $type = $tanker->type;
        else
            $type = $request->type;
        $tanker->update($validated);
        $tanker->type = $type;
        $tanker->ext_splat_right = $request->ext_splat_right;
        $tanker->ext_splat_left = $request->ext_splat_left;
        $tanker->ext_splat_rear = $request->ext_splat_rear;
        $tanker->ext_splat_front = $request->ext_splat_front;
        $tanker->int_splat = $request->int_splat;
        $tanker->save();
        return redirect()
            ->route('tankers.edit', $tanker)
            ->withSuccess(__('crud.common.saved'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tanker $tanker
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tanker $tanker)
    {
        $this->authorize('delete', $tanker);

        $tanker->delete();

        return redirect()
            ->route('tankers.index')
            ->withSuccess(__('crud.common.removed'));
    }

    public function archive(Request $request)
    {
        $archive_item = Tanker::find($request->tanker_id);
        if($archive_item) {
            if($archive_item->archive == false) {
                $archive_item->archive = true;
            } else {
                $archive_item->archive = false;
            }
            $archive_item->save();
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function refresh(Request $request) {
        $tanker = Tanker::find($request->tanker_id);
        if($tanker)
        {
            if($tanker->type == "Rigid")
            {
                $src = "./img/splat-side-2.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2.png';
                $tanker->ext_splat_right = $dest;

                $src = "./img/splat-side-1.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1.png';
                $tanker->ext_splat_left = $dest;

                $src = "./img/splat-rear.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-rear.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear.png';
                $tanker->ext_splat_rear = $dest;

                $src = "./img/splat-side-front.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front.png';
                $tanker->ext_splat_front = $dest;

                $src = "./img/splat-internal.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-internal.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal.png';
                $tanker->int_splat = $dest;

            }
            else if($tanker->type == "Non-Rigid")
            {
                $src = "./img/splat-side-2.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2.png';
                $tanker->ext_splat_right = $dest;

                $src = "./img/splat-side-1.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1.png';
                $tanker->ext_splat_left = $dest;

                $src = "./img/splat-rear.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-rear.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear.png';
                $tanker->ext_splat_rear = $dest;

                $src = "./img/splat-side-front.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front.png';
                $tanker->ext_splat_front = $dest;

                $src = "./img/splat-internal.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-internal.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal.png';
                $tanker->int_splat = $dest;
            }
            else if($tanker->type == "Food")
            {
                $src = "./img/splat-side-2-food.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-food.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-food.png';
                $tanker->ext_splat_right = $dest;

                $src = "./img/splat-side-1-food.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-food.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-food.png';
                $tanker->ext_splat_left = $dest;

                $src = "./img/splat-rear-food.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-food.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-food.png';
                $tanker->ext_splat_rear = $dest;

                $src = "./img/splat-side-front-food.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-food.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-food.png';
                $tanker->ext_splat_front = $dest;

                $src = "./img/splat-internal-food.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-food.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-food.png';
                $tanker->int_splat = $dest;
            }
            else if($tanker->type == "Milk")
            {
                $src = "./img/splat-side-2-milk.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-milk.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-milk.png';
                $tanker->ext_splat_right = $dest;

                $src = "./img/splat-side-1-milk.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-milk.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-milk.png';
                $tanker->ext_splat_left = $dest;

                $src = "./img/splat-rear-milk.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-milk.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-milk.png';
                $tanker->ext_splat_rear = $dest;

                $src = "./img/splat-side-front-milk.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-milk.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-milk.png';
                $tanker->ext_splat_front = $dest;

                $src = "./img/splat-internal-milk.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-milk.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-milk.png';
                $tanker->int_splat = $dest;
            }
            else if($tanker->type == "Petrol")
            {
                $src = "./img/splat-side-2-petrol.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-petrol.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-petrol.png';
                $tanker->ext_splat_right = $dest;

                $src = "./img/splat-side-1-petrol.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-petrol.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-petrol.png';
                $tanker->ext_splat_left = $dest;

                $src = "./img/splat-rear-petrol.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-petrol.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-petrol.png';
                $tanker->ext_splat_rear = $dest;

                $src = "./img/splat-side-front-petrol.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-petrol.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-petrol.png';
                $tanker->ext_splat_front = $dest;

                $src = "./img/splat-internal-petrol.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-petrol.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-petrol.png';
                $tanker->int_splat = $dest;

            }
            else if($tanker->type == "Vacuum")
            {
                $src = "./img/splat-side-2-vacuum.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-vacuum.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-vacuum.png';
                $tanker->ext_splat_right = $dest;

                $src = "./img/splat-side-1-vacuum.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-vacuum.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-vacuum.png';
                $tanker->ext_splat_left = $dest;

                $src = "./img/splat-rear-vacuum.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-vacuum.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-vacuum.png';
                $tanker->ext_splat_rear = $dest;

                $src = "./img/splat-side-front-vacuum.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-vacuum.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-vacuum.png';
                $tanker->ext_splat_front = $dest;

                $src = "./img/splat-internal-vacuum.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-vacuum.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-vacuum.png';
                $tanker->int_splat = $dest;
            }
            else if($tanker->type == "Waste")
            {
                $src = "./img/splat-side-2-waste.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-2-waste.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-2-waste.png';
                $tanker->ext_splat_right = $dest;

                $src = "./img/splat-side-1-waste.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-1-waste.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-1-waste.png';
                $tanker->ext_splat_left = $dest;

                $src = "./img/splat-rear-waste.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-rear-waste.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-rear-waste.png';
                $tanker->ext_splat_rear = $dest;

                $src = "./img/splat-side-front-waste.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-side-front-waste.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-side-front-waste.png';
                $tanker->ext_splat_front = $dest;

                $src = "./img/splat-internal-waste.png";  // source folder or file
                $dest = './storage/uploads/trunkStates/'.time().'_splat-internal-waste.png';
                copy($src, $dest);
                $dest = env('APP_URL').'/storage/uploads/trunkStates/'.time().'_splat-internal-waste.png';
                $tanker->int_splat = $dest;

            }
            $tanker->save();
            return response()->json([
                'tanker_obj' => $tanker,
                'success' => 'success'
            ], 200);
        }
        else
            return response()->json([
                'tanker_obj' => null,
                'success' => 'fail'
            ], 200);
    }
}
