<?php

return [
    'show_warnings' => false,
    'orientation' => 'portrait',
    'defines' => [
        "font_dir" => storage_path('fonts/'), // Direcionar para o caminho de armazenamento
        "font_cache" => storage_path('fonts/'),
        "temp_dir" => storage_path('fonts/'),
        "chroot" => base_path(),
        "log_output_file" => null,
        "default_media_type" => "screen",
        "default_paper_size" => "a4",
        "default_font" => "dejavu serif",
        "dpi" => 96,
        "enable_php" => false,
        "enable_javascript" => true,
        "enable_remote" => true,
        "font_height_ratio" => 1.1,
        "enable_html5_parser" => true,
    ],
    'font_path' => storage_path('fonts/'),
    'font_cache' => storage_path('fonts/'),
    'font' => [
        'dejavu sans' => [
            'R' => 'DejaVuSans.ttf',
            'B' => 'DejaVuSans-Bold.ttf',
            'I' => 'DejaVuSans-Oblique.ttf',
            'BI' => 'DejaVuSans-BoldOblique.ttf',
        ],
    ],
];
