<?php

if (!function_exists('wang_editor')) {

    /**
     * @param string $editor_id
     * @param string $textarea_id
     * @param bool $asset
     * @return string
     */
    function wang_editor(string $editor_id = 'WangEditor', string $textarea_id = 'TextArea', bool $asset = true)
    {
        $editor_zIndex = config('wang-editor.zIndex', 99);
        $editor_menu = json_encode(config('wang-editor.menu', [
            'head', 'bold', 'italic', 'underline', 'strikeThrough', 'foreColor', 'backColor', 'link', 'list', 'justify',
            'quote', 'emoticon', 'image', 'table', 'video', 'code', 'undo', 'redo'
        ]));
        $is_debug = config('wang-editor.debug', 'true');
        $is_paste_filter_style = config('wang-editor.pasteFilterStyle', 'false');
        $route_name = config('wang-editor.route.name', '/wang-editor/upload');
        $upload_name = config('wang-editor.upload.name', 'wang-editor-image-file');
        if ($asset) {
            $js_asset = asset('vendor/wang-editor/wangEditor.min.js');
            $asset_script = '<script type="text/javascript" src="' . $js_asset . '"></script>' . PHP_EOL;
        }
        $wang_editor_script = <<<EOT
<script type="text/javascript">
    let E = window.wangEditor
    let editor = new E('#{$editor_id}')
    let textarea = $('#{$textarea_id}')
    editor.customConfig.onchange = function (html) {
        textarea.val(html)
    }
    editor.customConfig.zIndex = {$editor_zIndex}
    editor.customConfig.menus = {$editor_menu}
    editor.customConfig.debug = {$is_debug}
    editor.customConfig.pasteFilterStyle = {$is_paste_filter_style}
    editor.customConfig.uploadImgServer = '{$route_name}'
    editor.customConfig.uploadFileName = '{$upload_name}'
    editor.create()
    textarea.val(editor.txt.html())
</script>   
EOT;
        return ($asset_script ?? '') . $wang_editor_script;
    }
}

if (!function_exists('wang_editor_asset')) {

    /**
     * @return string
     */
    function wang_editor_asset()
    {
        $js_asset = asset('vendor/wang-editor/wangEditor.min.js');
        $asset_script = '<script type="text/javascript" src="' . $js_asset . '"></script>' . PHP_EOL;
        return $asset_script;
    }
}