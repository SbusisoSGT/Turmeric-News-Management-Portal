@extends('layouts.main')

@section('page-name', "")

@section('page-includes')
<link rel="stylesheet" href={{ asset('css/index.css') }}>
@endsection

@section('content')
<div class="main-content">
    <h1 class="h2">Trending News</h1>
    <div class="news-card-container" id="main-news-card">
        <a href="main_article.url" target="_blank">
            <img src={{ asset('images\blog\articles\covers\rainbow_16_4k_5k_hd_nature-1366x768.jpg') }} alt="">
        </a>
        <div class="news-card-details">
            <span class="news-publication">Finance</span>
            <h2 class="news-title">Lorem ipsum dolor sit amet</h2>
            <p class="news-summary">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At imperdiet dui accumsan sit amet nulla. Ut eu sem integer vitae justo. Gravida dictum fusce ut placerat orci nulla pellentesque. Purus in massa tempor nec. Vel pharetra vel turpis nunc eget lorem dolor. Enim nulla aliquet porttitor lacus luctus accumsan tortor. Sodales ut eu sem integer vitae justo. Sed lectus vestibulum mattis ullamcorper.</p>
            <div class="news-meta-data">
                <span class="news-timestamp">4 hours ago</span> 
                •
                <span class="news-author">James Gbenro</span>
            </div>
        </div>
    </div>
    <div class="news-container">
        <div class="news-card-container">
            <a href="main_article.url" target="_blank">
                <img src="https://businesstech.co.za/news/wp-content/uploads/2024/02/Godongwana-Budget-2-300x200.jpg" alt="">
            </a>
            <div class="news-card-details">
                <span class="news-publication">Economy</span>
                <h2 class="news-title">South Africa now has protection from failing banks</h2>
                <p class="news-summary">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At imperdiet dui accumsan sit amet nulla. Ut eu sem integer vitae justo. Gravida dictum fusce ut placerat orci nulla pellentesque. Purus in massa tempor nec. </p>
                <div class="news-meta-data">
                    <span class="news-timestamp">9 hours ago</span> 
                    •
                    <span class="news-author">Vini Jnr</span>
                </div>
            </div>
        </div>
        <div class="news-card-container">
            <a href="main_article.url" target="_blank">
                <img src="https://businesstech.co.za/news/wp-content/uploads/2024/02/Godongwana-Budget-2-300x200.jpg" alt="">
            </a>
            <div class="news-card-details">
                <span class="news-publication">Economy</span>
                <h2 class="h2 news-title">South Africa now has protection from failing banks</h2>
                <p class="news-summary">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At imperdiet dui accumsan sit amet nulla. Ut eu sem integer vitae justo. Gravida dictum fusce ut placerat orci nulla pellentesque. Purus in massa tempor nec. </p>
                <div class="news-meta-data">
                    <span class="news-timestamp">9 hours ago</span> 
                    •
                    <span class="news-author">Vini Jnr</span>
                </div>
            </div>
        </div>
        <div class="news-card-container">
            <a href="main_article.url" target="_blank">
                <img src="https://businesstech.co.za/news/wp-content/uploads/2024/02/Godongwana-Budget-2-300x200.jpg" alt="">
            </a>
            <div class="news-card-details">
                <span class="news-publication">Economy</span>
                <h2 class="h2 news-title">South Africa now has protection from failing banks</h2>
                <p class="news-summary">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At imperdiet dui accumsan sit amet nulla. Ut eu sem integer vitae justo. Gravida dictum fusce ut placerat orci nulla pellentesque. Purus in massa tempor nec. </p>
                <div class="news-meta-data">
                    <span class="news-timestamp">9 hours ago</span> 
                    •
                    <span class="news-author">Vini Jnr</span>
                </div>
            </div>
        </div>
        <div class="news-card-container">
            <a href="main_article.url" target="_blank">
                <img src="https://businesstech.co.za/news/wp-content/uploads/2023/04/Clicks-300x200.jpg" alt="">
            </a>
            <div class="news-card-details">
                <span class="news-publication">Business</span>
                <h2 class="news-title">Clicks boosts profit - and plans to open 50 new stores</h2>
                <p class="news-summary">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At imperdiet dui accumsan sit amet nulla. Ut eu sem integer vitae justo. Gravida dictum fusce ut placerat orci nulla pellentesque. Purus in massa tempor nec. </p>
                <div class="news-meta-data">
                    <span class="news-timestamp">9 hours ago</span> 
                    •
                    <span class="news-author">Rodrygo</span>
                </div>
            </div>
        </div>
        <div class="news-card-container">
            <a href="main_article.url" target="_blank">
                <img src="https://businesstech.co.za/news/wp-content/uploads/2024/01/Eskom-Gordhan-Ramokgopa-300x200.jpg" alt="">
            </a>
            <div class="news-card-details">
                <span class="news-publication">Energy</span>
                <h2 class="news-title">Eskom's monster diesel bill to keep the lights on in South Africa</h2>
                <p class="news-summary">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. At imperdiet dui accumsan sit amet nulla. Ut eu sem integer vitae justo. Gravida dictum fusce ut placerat orci nulla pellentesque. Purus in massa tempor nec. </p>
                <div class="news-meta-data">
                    <span class="news-timestamp">9 hours ago</span> 
                    •
                    <span class="news-author">Jude Bellingham</span>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js-code')
    
@endsection