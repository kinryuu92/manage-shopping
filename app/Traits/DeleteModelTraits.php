<?php
namespace App\Traits;

use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

trait DeleteModelTraits
{
    public function deleteModelTraits($id, $model)
    {
        try {
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Delete success'
            ],200);
        }catch (Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '---Line: ' . $exception->getFile());
            return response()->json([
                'code' => 500,
                'message' => 'Delete fail',
            ],500);
        }
    }

}
