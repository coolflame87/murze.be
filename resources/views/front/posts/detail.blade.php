@extends('front.layouts.master')

@section('title', $post->formatted_title )

@section('content')

    @auth
        <div class="pb-4">
            <a class="button" target="_blank" href="{{ action('Back\PostsController@edit', $post->id) }}">Edit</a>
        </div>
    @endauth

    @if($post->title === 'Today DigitalOcean lost our entire server')
        <div class="bg-white border-2 rounded mb-4 py-4 px-6 mt-4 text-xs">
            Avoid this from happening to you by using SnapShooter to keep your DigitalOcean servers safe, secure and backed up. SnapShooter offers daily to hourly backups with backup rotation and retention policies. Get started at <a href="https://snapshooter.io/">SnapShooter</a> today! (sponsored link)
        </div>
    @endif

    <h1>{{ $post->formatted_title }}</h1>

    <div class="text-grey-darker text-sm pb-6 border-b text-grey">
        Posted on {{ $post->publish_date }} | {{ $post->author }}
    </div>

    <div class="pt-4 post-content">
        {!! $post->text !!}
    </div>

    <div class="pt-4">
        @include('front.posts._partials.tags')
    </div>


@endsection

@section('seo')
    <meta property="og:title" content="{{ $post->title }} | murze.be"/>
    <meta property="og:description" content="{{ $post->excerpt }}"/>

    @foreach($post->tags as $tag)
        <meta property="article:tag" content="{{ $tag->name }}"/>
    @endforeach
    <meta property="article:published_time" content="{{ $post->publish_date->toIso8601String() }}"/>
    <meta property="og:updated_time" content="{{ $post->updated_at->toIso8601String() }}"/>

    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:description" content="{{ $post->excerpt }}"/>
    <meta name="twitter:title" content="{{ $post->title }} | murze.be"/>
    <meta name="twitter:site" content="@freekmurze"/>
    <meta name="twitter:image" content="https://murze.be/images/avatar-boxed.jpg"/>
    <meta name="twitter:creator" content="@freekmurze"/>
@endsection