@extends('layouts.master')

@section('meta-description', 'I Love 浜松まつりはInstagramにハッシュタグ「#浜松まつり」付きで投稿された写真をまとめたサイトです。' )
@section('meta-keyword', '浜松まつり,浜松祭,凧揚げ,屋台引き回し,激練り,初子,ラッパ隊' )
@section('title', 'I Love 浜松まつり')
@section('og-title', 'I Love 浜松まつり' )
@section('og-description', 'I Love 浜松まつりはInstagramにハッシュタグ「#浜松まつり」付きで投稿された写真をまとめたサイトです。' )
@section('og-url', 'http://ilovehm.net' )

@section('content')
    <div class="row">
        @foreach( $items as $item )
        <div class="item col-xs-4 col-sm-3 col-md-2 col-lg-1">
            <div class="item-head"></div>
            <div class="item-img"><img src="/img/dummy.png" class="lazy" data-original="{{ $item->images->low_resolution->url }}" alt="{{ $item->caption->text }}" /></div>
        </div>
        @endforeach
    </div>
    <div class="page-bottom">
        <div class="more">
            <form action="" method="post">
                <input type="hidden" name="max_tag_id" value="{{ $max_tag_id }}">
                <input type="submit" class="btn_more" value="さらに表示">
            </form>
        </div>
    </div>
@endsection