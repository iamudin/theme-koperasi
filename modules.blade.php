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

add_default_polling_topic([
    'penilaian_public' => [
        'title' => 'Bagaimana Kualitas Website Kami saat ini ?',
        'description' => 'Untuk jajak pendapat tentang kualitas website',
        'status' => 'publish',
        'duration' => 60,
        'option' => ['Buruk', 'Cukup Baik', 'Sangat Baik']
    ]
]);
add_default_category(['menu'=>['Header','Footer'],'banner'=>['Home','Sidebar','Header','Banner Berita','Popup']]);
use_module([
    'sambutan'=>true,
    'download'=>['active'=>true,'web'=>['auto_query'=>true,'post_perpage'=>20],'datatable'=>['custom_column'=>'File']] ,
    'pengumuman'=>true,
    'kepegawaian'=>['form'=>['post_parent'=>false]],
    'layanan'=>true,
	'unit-kerja'=>true,
	'agenda'=>true,
    'galeri'=>true,
	'faq'=>['web'=>['detail'=>false],'datatable'=>['custom_column'=>['Jawaban']],'form'=>['editor'=>false,'custom_field'=>[['Jawaban',['type'=>'rich-text']]]]]
]);

add_option('template',[
['Tahun Pembuatan','text']
]);

use_module([
    'page'=>['form'=>['custom_field'=>[
        ['Lampiran',['type'=>'file','mime_type'=>['image/webp','application/pdf']]]
    ],
    'looping_name'=>'Info Halaman','looping_data'=>[['Label','text'],['Keterangan','textarea']]]]
]);
