@extends('layouts.master')

@section('title', 'I Love 浜松まつり')

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