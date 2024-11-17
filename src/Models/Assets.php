<?php

namespace App\Models;

class Assets{
    public static function Icons(){
        // remember only absolute path works
        $baseUrl = "/public/assets/icon";
        return [
            "404" => [
                "src" => "$baseUrl/404-illustration.svg",
                "alt" => "404 illustration"
            ],
            "AddToCart" => [
                "src" => "$baseUrl/add-to-cart.svg",
                "alt" => "Add to cart icon"
            ],
            "Add" => [
                "src" => "$baseUrl/add.svg",
                "alt" => "Add icon"
            ],
            "ArrowBack" => [
                "src" => "$baseUrl/arrow-back.svg",
                "alt" => "Arrow back icon"
            ],
            "Call" => [
                "src" => "$baseUrl/call.svg",
                "alt" => "Call icon"
            ],
            "Cart" => [
                "src" => "$baseUrl/cart.svg",
                "alt" => "Cart icon"
            ],
            "ChevronLeft" => [
                "src" => "$baseUrl/chevron-left.svg",
                "alt" => "Chevron left icon"
            ],
            "ChevronRight" => [
                "src" => "$baseUrl/chevron-right.svg",
                "alt" => "Chevron right icon"
            ],
            "Close" => [
                "src" => "$baseUrl/close.svg",
                "alt" => "Close icon"
            ],
            "Eyeglass" => [
                "src" => "$baseUrl/eyeglass.svg",
                "alt" => "Eyeglass icon"
            ],
            "Facebook" => [
                "src" => "$baseUrl/facebook.svg",
                "alt" => "Facebook icon"
            ],
            "Favorite" => [
                "src" => "$baseUrl/favorite.svg",
                "alt" => "Favorite icon"
            ],
            "Hamburger" => [
                "src" => "$baseUrl/hamburger.svg",
                "alt" => "Hamburger icon"
            ],
            "Help" => [
                "src" => "$baseUrl/help.svg",
                "alt" => "Help icon"
            ],
            "HidePassword" => [
                "src" => "$baseUrl/hide-password.svg",
                "alt" => "Hide password icon"
            ],
            "Home" => [
                "src" => "$baseUrl/home.svg",
                "alt" => "Home icon"
            ],
            "Instagram" => [
                "src" => "$baseUrl/instagram.svg",
                "alt" => "Instagram icon"
            ],
            "Linkedin" => [
                "src" => "$baseUrl/linkedin.svg",
                "alt" => "Linkedin icon"
            ],
            "Location" => [
                "src" => "$baseUrl/location.svg",
                "alt" => "Location icon"
            ],
            "Login" => [
                "src" => "$baseUrl/login.svg",
                "alt" => "Login icon"
            ],
            "LogoIcon" => [
                "src" => "$baseUrl/logo-icon.svg",
                "alt" => "Logo icon"
            ],
            "Logout" => [
                "src" => "$baseUrl/logout.svg",
                "alt" => "Logout icon"
            ],
            "Mail" => [
                "src" => "$baseUrl/mail.svg",
                "alt" => "Mail icon"
            ],
            "Notification" => [
                "src" => "$baseUrl/notification.svg",
                "alt" => "Notification icon"
            ],
            "Payment" => [
                "src" => "$baseUrl/payment.svg",
                "alt" => "Payment icon"
            ],
            "Pinterest" => [
                "src" => "$baseUrl/pinterest.svg",
                "alt" => "Pinterest icon"
            ],
            "ProfileIcon" => [
                "src" => "$baseUrl/profile-icon.svg",
                "alt" => "Profile icon"
            ],
            "RatingStarEmpty" => [
                "src" => "$baseUrl/rating-star-empty.svg",
                "alt" => "Empty rating star icon"
            ],
            "RatingStar" => [
                "src" => "$baseUrl/rating-star.svg",
                "alt" => "Rating star icon"
            ],
            "Redeem" => [
                "src" => "$baseUrl/redeem.svg",
                "alt" => "Redeem icon"
            ],
            "RemoveFromCart" => [
                "src" => "$baseUrl/remove-from-cart.svg",
                "alt" => "Remove from cart icon"
            ],
            "Remove" => [
                "src" => "$baseUrl/remove.svg",
                "alt" => "Remove icon"
            ],
            "RupeeSymbol" => [
                "src" => "$baseUrl/rupee-symbol.svg",
                "alt" => "Rupee symbol icon"
            ],
            "Search" => [
                "src" => "$baseUrl/search.svg",
                "alt" => "Search icon"
            ],
            "Share" => [
                "src" => "$baseUrl/share.svg",
                "alt" => "Share icon"
            ],
            "ShowPassword" => [
                "src" => "$baseUrl/show-password.svg",
                "alt" => "Show password icon"
            ],
            "TryOnFace" => [
                "src" => "$baseUrl/try-on-face.png",
                "alt" => "Try on face icon"
            ],
            "Twitter" => [
                "src" => "$baseUrl/twitter.svg",
                "alt" => "Twitter icon"
            ],
            "ZoomIn" => [
                "src" => "$baseUrl/zoom-in.svg",
                "alt" => "Zoom in icon"
            ],
            "ZoomOut" => [
                "src" => "$baseUrl/zoom-out.svg",
                "alt" => "Zoom out icon"
            ]
        ];
    }   
    public static function Images(){
        // remember only absolute path works
        $baseUrl = "/public/assets";
        return [
            "about-us" => [
                "src" => "$baseUrl/about-us.webp",
                "alt" => "About us "
            ],
            "contact-us" => [
                "src" => "$baseUrl/contact-us.webp",
                "alt" => "contact us"
            ],
            "hero-section" => [
                "src" => "$baseUrl/hero-section.webp",
                "alt" => "hero section"
            ],
            "inspiring-young-minds-01" => [
                "src" => "$baseUrl/inspiring-young-minds-01.webp",
                "alt" => "inspiring minds image"
            ],
            "inspiring-young-minds-02" => [
                "src" => "$baseUrl/inspiring-young-minds-02.webp",
                "alt" => "inspiring minds image"
            ],
            "inspiring-young-minds-03" => [
                "src" => "$baseUrl/inspiring-young-minds-03.webp",
                "alt" => "inspiring minds image"
            ],
            "inspiring-young-minds-04" => [
                "src" => "$baseUrl/inspiring-young-minds-04.webp",
                "alt" => "inspiring minds image"
            ],
            "our-mission" => [
                "src" => "$baseUrl/our-mission.webp",
                "alt" => "our mission"
            ],
            "what-we-do-2" => [
                "src" => "$baseUrl/what-we-do-2.webp",
                "alt" => "what we do 2"
            ],
            "what-we-do-3" => [
                "src" => "$baseUrl/what-we-do-3.webp",
                "alt" => "what we do 3"
            ],
        ];
        
    }
}