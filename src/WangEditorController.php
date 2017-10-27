<?php

namespace Tonyski\WangEditor;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

/**
 * Class WangEditorController
 *
 * @package Tonyski\WangEditor
 */
class WangEditorController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Config\Repository|mixed
     */
    public function upload(Request $request)
    {
        $upload_disk = config('wang-editor.upload.disk', 'public');
        $upload_path = config('wang-editor.upload.path', '');
        if ($request->hasFile('wang-editor-image-file')) {
            $path = $request->file('wang-editor-image-file')->store('wang-editor-file/' . $upload_path, $upload_disk);
            $result = [
                'errno' => 0,
                'data'  => [asset('storage/' . $path)]
            ];
        } else {
            $result = ['errno' => 1];
        }
        return response()->json($result);
    }
}