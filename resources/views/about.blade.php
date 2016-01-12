@extends('layouts.master')

@section('meta-description', 'I Love 浜松まつりのサイトについての説明ページです。このサイトはInstagramにハッシュタグ「#浜松まつり」付きで投稿された写真をまとめたサイトです。' )
@section('meta-keyword', '浜松まつり,浜松祭,凧揚げ,屋台引き回し,激練り,初子,ラッパ隊,Instagram' )
@section('title', 'このサイトについて | I Love 浜松まつり')
@section('og-title', 'I Love 浜松まつり' )
@section('og-description', 'I Love 浜松まつりはInstagramにハッシュタグ「#浜松まつり」付きで投稿された写真をまとめたサイトです。' )
@section('og-url', 'http://ilovehm.net' )

@section('content')
    <div class="row">

        <h2 class="page-title">このサイトについて</h2>

        <p>このサイトは、Instagramにハッシュタグ「#浜松まつり」付きで投稿された写真をまとめたサイトです。</p>

        <p>InstagramのAPIを利用して取得した写真を掲載しております。</p>

        <p>ぜひ「#浜松まつり」のハッシュタグ付きでInstagramに投稿ください。</p>

        <p>またFacebookページにおいても、浜松まつりに関する情報を投稿しておりますので、ご参照ください。</p>

    </div>
@endsection