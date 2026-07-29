<?php

add_default_polling_topic([
    'penilaian_public' => [
        'title' => 'Bagaimana Kualitas Website Kami saat ini ?',
        'description' => 'Untuk jajak pendapat tentang kualitas website',
        'status' => 'publish',
        'duration' => 60,
        'option' => ['Buruk', 'Cukup Baik', 'Sangat Baik']
    ]
]);
use_module([
  'galeri' => true,
  'download' => ['web' => ['auto_query' => true]],
  'kepegawaian' => true,
  'pengumuman' => true,
  'unit-kerja' => true,
  'sambutan' => true,
  'layanan' => true,
  'faq'=>true
]);
