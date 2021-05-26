<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTraits;
use App\Traits\StorageImageTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;


class AdminSliderController extends Controller
{
    protected $slider;
    use StorageImageTraits;
    use DeleteModelTraits;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;

    }

    public function index()
    {
        $sliders = $this->slider->latest()->paginate(5);
        return view('backEnd.admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('backEnd.admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataImageSlider)) {
                $dataInsert['image_name'] = $dataImageSlider['file_name'];
                $dataInsert['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->create($dataInsert);
            DB::commit();
            return redirect()->route('sliders.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $sliders = $this->slider->find($id);
        return view('backEnd.admin.slider.edit', compact('sliders'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
            if (!empty($dataImageSlider)) {
                $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                $dataUpdate['image_path'] = $dataImageSlider['file_path'];
            }
            $this->slider->find($id)->update($dataUpdate);
            DB::commit();
            return redirect()->route('sliders.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getLine());
        }
    }

    public function delete($id)
    {
       return $this->deleteModelTraits($id, $this->slider);
    }
}
