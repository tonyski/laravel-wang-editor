<?php

return [

    'zIndex' => 99,

    'menu' => [
        'head',           // 标题
        'bold',           // 粗体
        'italic',         // 斜体
        'underline',      // 下划线
        'strikeThrough',  // 删除线
        'foreColor',      // 文字颜色
        'backColor',      // 背景颜色
        'link',           // 插入链接
        'list',           // 列表
        'justify',        // 对齐方式
        'quote',          // 引用
        'emoticon',       // 表情
        'image',          // 插入图片
        'table',          // 表格
        'video',          // 插入视频
        'code',           // 插入代码
        'undo',           // 撤销
        'redo'            // 重复
    ],

    'debug' => 'true',

    'upload' => [
        'disk' => 'public',
        'path' => date('Y-m-d'),
        'name' => 'wang-editor-image-file'
    ],

    'route'            => [
        'name'    => '/wang-editor/server',
        'options' => [
            // middleware => 'auth',
        ],
    ],

    //粘贴样式的过滤（该配置暂时对IE无效）
    'pasteFilterStyle' => 'false'

];