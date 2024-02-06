<?php
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="title" content="Aworex">
<meta name="description" content="Experience the pinnacle of gaming enhancement with Aworex – the ultimate platform for boosting your gameplay. Elevate your gaming sessions with our innovative solutions and test the waters with a 3-hour free trial.">
<meta name="keywords" content="Escape From Tarkov, Cheat For Tarkov, Escape From Tarkov Cheat, Escape From Tarkov Hack, Cheats For Escape from Tarkov, Free Tarkov Hack, Buy Cheats for Escape, Escape From Tarkov Aimbot">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="language" content="English">
<link rel="canonical" href="https://aworex.com/">
<meta name="google-site-verification" content="a_RjLFofP_v3Jg15mNbRYyvsGes39UejE4OVWN2Udpc" />
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js" type="text/javascript"></script>
    <link
  rel="stylesheet"
  href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
/>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <style>
        .carousel {
            position: relative;
            box-sizing: border-box
        }

        .carousel *,
        .carousel *:before,
        .carousel *:after {
            box-sizing: inherit
        }

        .carousel.is-draggable {
            cursor: move;
            cursor: grab
        }

        .carousel.is-dragging {
            cursor: move;
            cursor: grabbing
        }

        .carousel__viewport {
            position: relative;
            overflow: hidden;
            max-width: 100%;
            max-height: 100%
        }

        .carousel__track {
            display: flex
        }

        .carousel__slide {
            flex: 0 0 auto;
            width: var(--carousel-slide-width, 60%);
            max-width: 100%;
            padding: 1rem;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
            overscroll-behavior: contain
        }

        .has-dots {
            margin-bottom: calc(0.5rem + 22px)
        }

        .carousel__dots {
            margin: 0 auto;
            padding: 0;
            position: absolute;
            top: calc(100% + 0.5rem);
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            list-style: none;
            user-select: none
        }

        .carousel__dots .carousel__dot {
            margin: 0;
            padding: 0;
            display: block;
            position: relative;
            width: 22px;
            height: 22px;
            cursor: pointer
        }

        .carousel__dots .carousel__dot:after {
            content: "";
            width: 8px;
            height: 8px;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: currentColor;
            opacity: .25;
            transition: opacity .15s ease-in-out
        }

        .carousel__dots .carousel__dot.is-selected:after {
            opacity: 1
        }

        .carousel__button {
            width: var(--carousel-button-width, 48px);
            height: var(--carousel-button-height, 48px);
            padding: 0;
            border: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            pointer-events: all;
            cursor: pointer;
            color: var(--carousel-button-color, currentColor);
            background: var(--carousel-button-bg, transparent);
            border-radius: var(--carousel-button-border-radius, 50%);
            box-shadow: var(--carousel-button-shadow, none);
            transition: opacity .15s ease
        }

        .carousel__button.is-prev,
        .carousel__button.is-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%)
        }

        .carousel__button.is-prev {
            left: 10px
        }

        .carousel__button.is-next {
            right: 10px
        }

        .carousel__button[disabled] {
            cursor: default;
            opacity: .3
        }

        .carousel__button svg {
            width: var(--carousel-button-svg-width, 50%);
            height: var(--carousel-button-svg-height, 50%);
            fill: none;
            stroke: currentColor;
            stroke-width: var(--carousel-button-svg-stroke-width, 1.5);
            stroke-linejoin: bevel;
            stroke-linecap: round;
            filter: var(--carousel-button-svg-filter, none);
            pointer-events: none
        }

        html.with-fancybox {
            scroll-behavior: auto
        }

        body.compensate-for-scrollbar {
            overflow: hidden !important;
            touch-action: none
        }

        .fancybox__container {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            direction: ltr;
            margin: 0;
            padding: env(safe-area-inset-top, 0px) env(safe-area-inset-right, 0px) env(safe-area-inset-bottom, 0px) env(safe-area-inset-left, 0px);
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            color: var(--fancybox-color, #fff);
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
            z-index: 1050;
            outline: none;
            transform-origin: top left;
            --carousel-button-width: 48px;
            --carousel-button-height: 48px;
            --carousel-button-svg-width: 24px;
            --carousel-button-svg-height: 24px;
            --carousel-button-svg-stroke-width: 2.5;
            --carousel-button-svg-filter: drop-shadow(1px 1px 1px rgba(0, 0, 0, 0.4))
        }

        .fancybox__container *,
        .fancybox__container *::before,
        .fancybox__container *::after {
            box-sizing: inherit
        }

        .fancybox__container :focus {
            outline: none
        }

        body:not(.is-using-mouse) .fancybox__container :focus {
            box-shadow: 0 0 0 1px #fff, 0 0 0 2px var(--fancybox-accent-color, rgba(1, 210, 232, 0.94))
        }

        @media all and (min-width: 1024px) {
            .fancybox__container {
                --carousel-button-width: 48px;
                --carousel-button-height: 48px;
                --carousel-button-svg-width: 27px;
                --carousel-button-svg-height: 27px
            }
        }

        .fancybox__backdrop {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            z-index: -1;
            background: var(--fancybox-bg, rgba(24, 24, 27, 0.92))
        }

        .fancybox__carousel {
            position: relative;
            flex: 1 1 auto;
            min-height: 0;
            height: 100%;
            z-index: 10
        }

        .fancybox__carousel.has-dots {
            margin-bottom: calc(0.5rem + 22px)
        }

        .fancybox__viewport {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: visible;
            cursor: default
        }

        .fancybox__track {
            display: flex;
            height: 100%
        }

        .fancybox__slide {
            flex: 0 0 auto;
            width: 100%;
            max-width: 100%;
            margin: 0;
            padding: 48px 8px 8px 8px;
            position: relative;
            overscroll-behavior: contain;
            display: flex;
            flex-direction: column;
            outline: 0;
            overflow: auto;
            --carousel-button-width: 36px;
            --carousel-button-height: 36px;
            --carousel-button-svg-width: 22px;
            --carousel-button-svg-height: 22px
        }

        .fancybox__slide::before,
        .fancybox__slide::after {
            content: "";
            flex: 0 0 0;
            margin: auto
        }

        @media all and (min-width: 1024px) {
            .fancybox__slide {
                padding: 64px 100px
            }
        }

        .fancybox__content {
            margin: 0 env(safe-area-inset-right, 0px) 0 env(safe-area-inset-left, 0px);
            padding: 36px;
            color: var(--fancybox-content-color, #374151);
            background: var(--fancybox-content-bg, #fff);
            position: relative;
            align-self: center;
            display: flex;
            flex-direction: column;
            z-index: 20
        }

        .fancybox__content :focus:not(.carousel__button.is-close) {
            outline: thin dotted;
            box-shadow: none
        }

        .fancybox__caption {
            align-self: center;
            max-width: 100%;
            margin: 0;
            padding: 1rem 0 0 0;
            line-height: 1.375;
            color: var(--fancybox-color, currentColor);
            visibility: visible;
            cursor: auto;
            flex-shrink: 0;
            overflow-wrap: anywhere
        }

        .is-loading .fancybox__caption {
            visibility: hidden
        }

        .fancybox__container>.carousel__dots {
            top: 100%;
            color: var(--fancybox-color, #fff)
        }

        .fancybox__nav .carousel__button {
            z-index: 40
        }

        .fancybox__nav .carousel__button.is-next {
            right: 8px
        }

        @media all and (min-width: 1024px) {
            .fancybox__nav .carousel__button.is-next {
                right: 40px
            }
        }

        .fancybox__nav .carousel__button.is-prev {
            left: 8px
        }

        @media all and (min-width: 1024px) {
            .fancybox__nav .carousel__button.is-prev {
                left: 40px
            }
        }

        .carousel__button.is-close {
            position: absolute;
            top: 8px;
            right: 8px;
            top: calc(env(safe-area-inset-top, 0px) + 8px);
            right: calc(env(safe-area-inset-right, 0px) + 8px);
            z-index: 40
        }

        @media all and (min-width: 1024px) {
            .carousel__button.is-close {
                right: 40px
            }
        }

        .fancybox__content>.carousel__button.is-close {
            position: absolute;
            top: -40px;
            right: 0;
            color: var(--fancybox-color, #fff)
        }

        .fancybox__no-click,
        .fancybox__no-click button {
            pointer-events: none
        }

        .fancybox__spinner {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            color: var(--fancybox-color, currentColor)
        }

        .fancybox__slide .fancybox__spinner {
            cursor: pointer;
            z-index: 1053
        }

        .fancybox__spinner svg {
            animation: fancybox-rotate 2s linear infinite;
            transform-origin: center center;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            width: 100%;
            height: 100%
        }

        .fancybox__spinner svg circle {
            fill: none;
            stroke-width: 2.75;
            stroke-miterlimit: 10;
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
            animation: fancybox-dash 1.5s ease-in-out infinite;
            stroke-linecap: round;
            stroke: currentColor
        }

        @keyframes fancybox-rotate {
            100% {
                transform: rotate(360deg)
            }
        }

        @keyframes fancybox-dash {
            0% {
                stroke-dasharray: 1, 200;
                stroke-dashoffset: 0
            }

            50% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -35px
            }

            100% {
                stroke-dasharray: 89, 200;
                stroke-dashoffset: -124px
            }
        }

        .fancybox__backdrop,
        .fancybox__caption,
        .fancybox__nav,
        .carousel__dots,
        .carousel__button.is-close {
            opacity: var(--fancybox-opacity, 1)
        }

        .fancybox__container.is-animated[aria-hidden=false] .fancybox__backdrop,
        .fancybox__container.is-animated[aria-hidden=false] .fancybox__caption,
        .fancybox__container.is-animated[aria-hidden=false] .fancybox__nav,
        .fancybox__container.is-animated[aria-hidden=false] .carousel__dots,
        .fancybox__container.is-animated[aria-hidden=false] .carousel__button.is-close {
            animation: .15s ease backwards fancybox-fadeIn
        }

        .fancybox__container.is-animated.is-closing .fancybox__backdrop,
        .fancybox__container.is-animated.is-closing .fancybox__caption,
        .fancybox__container.is-animated.is-closing .fancybox__nav,
        .fancybox__container.is-animated.is-closing .carousel__dots,
        .fancybox__container.is-animated.is-closing .carousel__button.is-close {
            animation: .15s ease both fancybox-fadeOut
        }

        .fancybox-fadeIn {
            animation: .15s ease both fancybox-fadeIn
        }

        .fancybox-fadeOut {
            animation: .1s ease both fancybox-fadeOut
        }

        .fancybox-zoomInUp {
            animation: .2s ease both fancybox-zoomInUp
        }

        .fancybox-zoomOutDown {
            animation: .15s ease both fancybox-zoomOutDown
        }

        .fancybox-throwOutUp {
            animation: .15s ease both fancybox-throwOutUp
        }

        .fancybox-throwOutDown {
            animation: .15s ease both fancybox-throwOutDown
        }

        @keyframes fancybox-fadeIn {
            from {
                opacity: 0
            }

            to {
                opacity: 1
            }
        }

        @keyframes fancybox-fadeOut {
            to {
                opacity: 0
            }
        }

        @keyframes fancybox-zoomInUp {
            from {
                transform: scale(0.97) translate3d(0, 16px, 0);
                opacity: 0
            }

            to {
                transform: scale(1) translate3d(0, 0, 0);
                opacity: 1
            }
        }

        @keyframes fancybox-zoomOutDown {
            to {
                transform: scale(0.97) translate3d(0, 16px, 0);
                opacity: 0
            }
        }

        @keyframes fancybox-throwOutUp {
            to {
                transform: translate3d(0, -30%, 0);
                opacity: 0
            }
        }

        @keyframes fancybox-throwOutDown {
            to {
                transform: translate3d(0, 30%, 0);
                opacity: 0
            }
        }

        .fancybox__carousel .carousel__slide {
            scrollbar-width: thin;
            scrollbar-color: #ccc rgba(255, 255, 255, .1)
        }

        .fancybox__carousel .carousel__slide::-webkit-scrollbar {
            width: 8px;
            height: 8px
        }

        .fancybox__carousel .carousel__slide::-webkit-scrollbar-track {
            background-color: rgba(255, 255, 255, .1)
        }

        .fancybox__carousel .carousel__slide::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 2px;
            box-shadow: inset 0 0 4px rgba(0, 0, 0, .2)
        }

        .fancybox__carousel.is-draggable .fancybox__slide,
        .fancybox__carousel.is-draggable .fancybox__slide .fancybox__content {
            cursor: move;
            cursor: grab
        }

        .fancybox__carousel.is-dragging .fancybox__slide,
        .fancybox__carousel.is-dragging .fancybox__slide .fancybox__content {
            cursor: move;
            cursor: grabbing
        }

        .fancybox__carousel .fancybox__slide .fancybox__content {
            cursor: auto
        }

        .fancybox__carousel .fancybox__slide.can-zoom_in .fancybox__content {
            cursor: zoom-in
        }

        .fancybox__carousel .fancybox__slide.can-zoom_out .fancybox__content {
            cursor: zoom-out
        }

        .fancybox__carousel .fancybox__slide.is-draggable .fancybox__content {
            cursor: move;
            cursor: grab
        }

        .fancybox__carousel .fancybox__slide.is-dragging .fancybox__content {
            cursor: move;
            cursor: grabbing
        }

        .fancybox__image {
            transform-origin: 0 0;
            user-select: none;
            transition: none
        }

        .has-image .fancybox__content {
            padding: 0;
            background: rgba(0, 0, 0, 0);
            min-height: 1px
        }

        .is-closing .has-image .fancybox__content {
            overflow: visible
        }

        .has-image[data-image-fit=contain] {
            overflow: visible;
            touch-action: none
        }

        .has-image[data-image-fit=contain] .fancybox__content {
            flex-direction: row;
            flex-wrap: wrap
        }

        .has-image[data-image-fit=contain] .fancybox__image {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain
        }

        .has-image[data-image-fit=contain-w] {
            overflow-x: hidden;
            overflow-y: auto
        }

        .has-image[data-image-fit=contain-w] .fancybox__content {
            min-height: auto
        }

        .has-image[data-image-fit=contain-w] .fancybox__image {
            max-width: 100%;
            height: auto
        }

        .has-image[data-image-fit=cover] {
            overflow: visible;
            touch-action: none
        }

        .has-image[data-image-fit=cover] .fancybox__content {
            width: 100%;
            height: 100%
        }

        .has-image[data-image-fit=cover] .fancybox__image {
            width: 100%;
            height: 100%;
            object-fit: cover
        }

        .fancybox__carousel .fancybox__slide.has-iframe .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-map .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-pdf .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-video .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-html5video .fancybox__content {
            max-width: 100%;
            flex-shrink: 1;
            min-height: 1px;
            overflow: visible
        }

        .fancybox__carousel .fancybox__slide.has-iframe .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-map .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-pdf .fancybox__content {
            width: 100%;
            height: 80%
        }

        .fancybox__carousel .fancybox__slide.has-video .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-html5video .fancybox__content {
            width: 960px;
            height: 540px;
            max-width: 100%;
            max-height: 100%
        }

        .fancybox__carousel .fancybox__slide.has-map .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-pdf .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-video .fancybox__content,
        .fancybox__carousel .fancybox__slide.has-html5video .fancybox__content {
            padding: 0;
            background: rgba(24, 24, 27, .9);
            color: #fff
        }

        .fancybox__carousel .fancybox__slide.has-map .fancybox__content {
            background: #e5e3df
        }

        .fancybox__html5video,
        .fancybox__iframe {
            border: 0;
            display: block;
            height: 100%;
            width: 100%;
            background: rgba(0, 0, 0, 0)
        }

        .fancybox-placeholder {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            border-width: 0
        }

        .fancybox__thumbs {
            flex: 0 0 auto;
            position: relative;
            padding: 0px 3px;
            opacity: var(--fancybox-opacity, 1)
        }

        .fancybox__container.is-animated[aria-hidden=false] .fancybox__thumbs {
            animation: .15s ease-in backwards fancybox-fadeIn
        }

        .fancybox__container.is-animated.is-closing .fancybox__thumbs {
            opacity: 0
        }

        .fancybox__thumbs .carousel__slide {
            flex: 0 0 auto;
            width: var(--fancybox-thumbs-width, 96px);
            margin: 0;
            padding: 8px 3px;
            box-sizing: content-box;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: visible;
            cursor: pointer
        }

        .fancybox__thumbs .carousel__slide .fancybox__thumb::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-width: 5px;
            border-style: solid;
            border-color: var(--fancybox-accent-color, rgba(34, 213, 233, 0.96));
            opacity: 0;
            transition: opacity .15s ease;
            border-radius: var(--fancybox-thumbs-border-radius, 4px)
        }

        .fancybox__thumbs .carousel__slide.is-nav-selected .fancybox__thumb::after {
            opacity: .92
        }

        .fancybox__thumbs .carousel__slide>* {
            pointer-events: none;
            user-select: none
        }

        .fancybox__thumb {
            position: relative;
            width: 100%;
            padding-top: calc(100%/(var(--fancybox-thumbs-ratio, 1.5)));
            background-size: cover;
            background-position: center center;
            background-color: rgba(255, 255, 255, .1);
            background-repeat: no-repeat;
            border-radius: var(--fancybox-thumbs-border-radius, 4px)
        }

        .fancybox__toolbar {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            z-index: 20;
            background: linear-gradient(to top, hsla(0deg, 0%, 0%, 0) 0%, hsla(0deg, 0%, 0%, 0.006) 8.1%, hsla(0deg, 0%, 0%, 0.021) 15.5%, hsla(0deg, 0%, 0%, 0.046) 22.5%, hsla(0deg, 0%, 0%, 0.077) 29%, hsla(0deg, 0%, 0%, 0.114) 35.3%, hsla(0deg, 0%, 0%, 0.155) 41.2%, hsla(0deg, 0%, 0%, 0.198) 47.1%, hsla(0deg, 0%, 0%, 0.242) 52.9%, hsla(0deg, 0%, 0%, 0.285) 58.8%, hsla(0deg, 0%, 0%, 0.326) 64.7%, hsla(0deg, 0%, 0%, 0.363) 71%, hsla(0deg, 0%, 0%, 0.394) 77.5%, hsla(0deg, 0%, 0%, 0.419) 84.5%, hsla(0deg, 0%, 0%, 0.434) 91.9%, hsla(0deg, 0%, 0%, 0.44) 100%);
            padding: 0;
            touch-action: none;
            display: flex;
            justify-content: space-between;
            --carousel-button-svg-width: 20px;
            --carousel-button-svg-height: 20px;
            opacity: var(--fancybox-opacity, 1);
            text-shadow: var(--fancybox-toolbar-text-shadow, 1px 1px 1px rgba(0, 0, 0, 0.4))
        }

        @media all and (min-width: 1024px) {
            .fancybox__toolbar {
                padding: 8px
            }
        }

        .fancybox__container.is-animated[aria-hidden=false] .fancybox__toolbar {
            animation: .15s ease-in backwards fancybox-fadeIn
        }

        .fancybox__container.is-animated.is-closing .fancybox__toolbar {
            opacity: 0
        }

        .fancybox__toolbar__items {
            display: flex
        }

        .fancybox__toolbar__items--left {
            margin-right: auto
        }

        .fancybox__toolbar__items--center {
            position: absolute;
            left: 50%;
            transform: translateX(-50%)
        }

        .fancybox__toolbar__items--right {
            margin-left: auto
        }

        @media(max-width: 640px) {
            .fancybox__toolbar__items--center:not(:last-child) {
                display: none
            }
        }

        .fancybox__counter {
            min-width: 72px;
            padding: 0 10px;
            line-height: var(--carousel-button-height, 48px);
            text-align: center;
            font-size: 17px;
            font-variant-numeric: tabular-nums;
            -webkit-font-smoothing: subpixel-antialiased
        }

        .fancybox__progress {
            background: var(--fancybox-accent-color, rgba(34, 213, 233, 0.96));
            height: 3px;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transform: scaleX(0);
            transform-origin: 0;
            transition-property: transform;
            transition-timing-function: linear;
            z-index: 30;
            user-select: none
        }

        .fancybox__container:fullscreen::backdrop {
            opacity: 0
        }

        .fancybox__button--fullscreen g:nth-child(2) {
            display: none
        }

        .fancybox__container:fullscreen .fancybox__button--fullscreen g:nth-child(1) {
            display: none
        }

        .fancybox__container:fullscreen .fancybox__button--fullscreen g:nth-child(2) {
            display: block
        }

        .fancybox__button--slideshow g:nth-child(2) {
            display: none
        }

        .fancybox__container.has-slideshow .fancybox__button--slideshow g:nth-child(1) {
            display: none
        }

        .fancybox__container.has-slideshow .fancybox__button--slideshow g:nth-child(2) {
            display: block
        }

        .gb1 {
        background-image: url(/static/img/gb4_.png); 
        transition: 0.2s;
        background-size: cover!important;
        display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
        
        }
        .gb2 {
        background-image: url(/static/img/gb3_.png);
        transition: 0.2s; 
        background-size: cover!important;
        display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
  background-color:rgba(0, 0, 0, 0.5);
        }
        .gb3 {
        background-image: url(/static/img/gb2_.png); 
        transition: 0.2s;
        background-size: cover!important;
      display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
  
        }
        .gb4 {
        background-image: url(/static/img/gb1_.png); 
        transition: 0.3s;
        background-size: cover!important;
       display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
        }
        .gb5 {
        background-image: url(/static/img/gb5.jpg); 
        transition: 0.3s;
        background-size: cover!important;
       display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
        }
        .gb6 {
        background-image: url(/static/img/gb6.jpg); 
        transition: 0.3s;
        background-size: cover!important;
       display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
        }
        .gb7 {
        background-image: url(/static/img/gb7.jpg); 
        transition: 0.3s;
        background-size: cover!important;
       display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
        }
        .gb8 {
        background-image: url(/static/img/cs2s.png); 
        transition: 0.3s;
        background-size: cover!important;
       display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
        }
        .gb9 {
        background-image: url(/static/img/efta__b.jpg); 
        transition: 0.3s;
        background-size: cover!important;
       display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
        }
         .gb10 {
        background-image: url(/static/img/fivem__b.jpg); 
        transition: 0.3s;
        background-size: cover!important;
       display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  overflow: hidden;
  background-position: center center;
  background-size: cover;
  background-repeat: no-repeat;
        }
        .cardd::after{
  content: "";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  background: inherit;
  background-size: cover;
  transform-origin: center;
  transition: transform 0.4s ease-in-out;
  
}

.cardd::after {
transform: scale(1);
  
}
.cardd:focus::after, .card:hover::after {
  transform: scale(1.25);
}

.cardd::before {
opacity: 0.6;}

.cardd .card-body {
z-index: 99999;
}
        .gb1:hover {
        
             -webkit-animation: zoomin 5s 1;
            cursor: pointer;
            background-size: cover !important;
            transition: 0.3s;
        }
         .gb2:hover {

            cursor: pointer;
            transition: 0.3s;
            background-size: cover!important;
        }
         .gb3:hover {

            cursor: pointer;
            transition: 0.3s;
            background-size: cover!important;
        }
         .gb4:hover {

            cursor: pointer;
            transition: 0.3s;
            background-size: cover!important;
        }
    </style>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Escape From Tarkov Cheats | Aworex | Aimbot & Hacks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="/static/fonts/tt/stylesheet.css" rel="stylesheet">
    <link href="/static/fonts/sfpro/stylesheet.css" rel="stylesheet">
    <link href="/root.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="icon" type="image/x-icon" href="/static/img/logo.png">
    <script async="" src="https://mc.yandex.ru/metrika/tag.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>

<body style="
background-color: #000610;">
<style>
.mdlbtn-1 {
    content: url(/static/img/modal__logo1.png);
}
.mdlbtn-2 {
    content: url(/static/img/modal__logo2.png);
}
</style>
<div class="modal fade" id="selModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title fs-5" id="exampleModalLabel">Select EFT Cheat</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
                    <div class="col-1"></div>
                            <div class="col-5 mdlbtn">
                                <a href="/tarkov"><center>
                                    
                                    <div class="mdlbtn-1" alt=""></div>
                                    <h5 style="margin-top: 5px;">Aworex</h5>
                                </center></a>
                            </div>
                            <div class="col-5 mdlbtn">
                                <a href="/valkyrie"><center>
                                    <div class="mdlbtn-2" alt=""></div>
                                <h5 style="margin-top: 5px;">Valkyrie</h5>
                            </center></a>
                            </div>
                            <div class="col-1"></div>
                            
                        
                </div>
      </div>
    </div>
  </div>
</div>

    <?php
    require $_SERVER['DOCUMENT_ROOT'] . "/classes/Navbar.php";
    ?>
    <style>
    @media screen and (min-width: 768px) {
    h1 {
    font-size: 66px;
    }
    .lft {
    margin-top: -50px;
    }
    }
      @media screen and (max-width: 768px) {
   
    .lft {
    margin-top: 165px;
    }
    }
    @media (min-width: 768px) {
.col-md-1 {
    flex: 0 0 auto;
    width: 13% !important;
}
.crd {
    margin-left: 35vh;
}
}
    </style>
    <script>
    function createModal(link, modalid) {
     var modal = `<div class="modal fade" id="` + modalid + `" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
        <h3 class="modal-title" style="font-size: 25px; font-weight: 700;">Warning</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>if you want to read the original message you need to join our server</p>
        </div>
        <div class="modal-footer">
        <div><a onclick="window.location.href='https://discord.gg/yMcSssBEJf'; return false;" href="https://discord.gg/yMcSssBEJf" data-bs-dismiss="modal" class="btn btn-block btn-secondary">Join Server</a>
                    </div>       
        <div><a onclick="window.location.href='`+link+`'; return false;" href="`+link+`" data-bs-dismiss="modal" class="btn btn-block btn-primary">View Message</a>
                    </div>       
        </div>
        </div>
        </div>
        </div>`;
         $("body").append(modal);
    $('#' + modalid).modal('show')
    
    }
    </script>
    <div class=" container col-xxl-8 px-4 py-5">
        <center>
            <h1 style="" class="fw-bold lh-1 mb-3">The best store selling cheats for various games</h1>
        </center>
        <center>
            <p style="color: #FFFFFFA6; font-size: 22px;">If you have any questions, feel free to join our discord where you can ask us or our community!</p>
        </center>
        <center><a style="margin-top: 10px;" class="loginbtn" href="https://discord.gg/yMcSssBEJf"><img width="120" src="/static/img/discord-logo-white.svg"></a></center>
        <img src="/static/img/bckt.png" alt="">
        
        <div class="row">
        <center class="mb-3"><h2>Our Products</h2></center>
        <div class="lft"></div>
        <div class="col-md-1"></div>
            <div class="col-md-3 col-6 mb-3"><a href="/tarkov">
                <div style="background-color: #00000000; background-size: cover; border-radius: 15px;" class="card cardd gb4">
                    <div class="card-body">
                    
                        <center style="margin-top: 268px;">
                            <p style="font-size: 15px; text-shadow: 2px 2px 20px #000000; color: #fff;"><b>Escape From Tarkov</b></p>
                        </center>
                    </div>
                </div></a>
            </div>
            <div class="col-md-3 col-6  mb-3"><a href="/arena">
                <div style="background-color: #00000000; background-size: cover; border-radius: 15px; " class="card cardd gb9">
                    <div class="card-body">
                        <center style="margin-top: 268px;">
                            <p style="font-size: 20px; text-shadow: 2px 2px 20px #000000; color: #fff;"><b>EFT: Arena</b></p>
                        </center>
                    </div>
                </div></a>
            </div>
            <div class="col-md-3 col-6 mb-3"><a href="/cs2">
                <div style="background-color: #00000000; background-size: cover; border-radius: 15px;" class="card cardd gb8">
                    <div class="card-body">
                    
                        <center style="margin-top: 268px;">
                            <p style="font-size: 15px; text-shadow: 2px 2px 20px #000000; color: #fff;"><b>CS2</b></p>
                        </center>
                    </div>
                </div></a>
            </div>
            
         <div class="col-md-3 col-6 mb-3 crd"><a href="/fivem">
                <div style="background-color: #00000000; background-size: cover; border-radius: 15px;" class="card cardd gb10">
                    <div class="card-body">
                    
                        <center style="margin-top: 268px;">
                            <p style="font-size: 15px; text-shadow: 2px 2px 20px #000000; color: #fff;"><b>FiveM</b></p>
                        </center>
                    </div>
                </div></a>
            </div>
             <div class="col-md-3 col-6  mb-3"><a href="/spoofer">
                <div style="background-color: #00000000;background-size: cover; border-radius: 15px;" class="card cardd gb2">
                    <div class="card-body">
                        <center style="margin-top: 268px;">
                            <p style="font-size: 20px; text-shadow: 0px 0px 3px #000000; color: #fff;"><b>Spoofer</b></p>
                        </center>
                    </div>
                </div></a>
            </div>
            
        </div>
        <center>
            <h2 style="margin-top: 50px;" class="fw-bold lh-1 mb-3">Why can we be trusted?</h2>
        </center>



        <div class="row">
            <div class="col-md-4 mb-3">
                <div style="background-color: #060b14; border-radius: 15px; border: none;" class="card">
                    <div class="card-body">
                        
<svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" width="40px" fill="#246bf4"><path d="M0 0h24v24H0V0z" fill="none"/><circle cx="15.5" cy="9.5" r="1.5"/><circle cx="8.5" cy="9.5" r="1.5"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm4.41-6.11c-.35-.22-.82-.11-1.03.24-.74 1.17-2 1.87-3.38 1.87s-2.64-.7-3.38-1.88c-.22-.35-.68-.46-1.03-.24-.35.22-.46.68-.24 1.03C8.37 16.54 10.1 17.5 12 17.5s3.63-.97 4.65-2.58c.22-.35.11-.81-.24-1.03z"/></svg>
                        <h2 class="mt-3">Safety</h2>
                        <p style="color: #FFFFFF99; font-size: 18px;">Ensuring the security of your gaming experience is our top priority. Our software features advanced measures to safeguard your account and data. Regular security audits are conducted to maintain a safe gaming environment.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #060b14; border-radius: 15px; border: none;" class="card">
                    <div class="card-body">
                       
<svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" width="40px" fill="#246bf4"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 13c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm6-5h-1V6c0-2.76-2.24-5-5-5-2.28 0-4.27 1.54-4.84 3.75-.14.54.18 1.08.72 1.22.53.14 1.08-.18 1.22-.72C9.44 3.93 10.63 3 12 3c1.65 0 3 1.35 3 3v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm0 11c0 .55-.45 1-1 1H7c-.55 0-1-.45-1-1v-8c0-.55.45-1 1-1h10c.55 0 1 .45 1 1v8z"/></svg>
                        <h2 class="mt-3">Open</h2>
                        <p style="color: #FFFFFF99; font-size: 18px;">We believe in transparency and collaboration. Our development process is open, and we value feedback from the community. We actively incorporate suggestions, enhancing your gaming experience.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #060b14; border-radius: 15px; border: none;" class="card">
                    <div class="card-body">
                        
<svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" width="40px" fill="#246bf4"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                        <h2 class="mt-3">Sales</h2>
                        <p style="color: #FFFFFF99; font-size: 18px;">We offer a range of flexible pricing options to suit your preferences. Our payment methods are secure. Keep an eye out for limited-time offers and discounts that make getting your hands on our software even more rewarding.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #060b14; border-radius: 15px; border: none;" class="card">
                    <div class="card-body">
                        

<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px" viewBox="0 0 24 24" width="40px" fill="#246bf4"><g><rect fill="none" height="24" width="24"/></g><g><path d="M12,2C6.48,2,2,6.48,2,12c0,5.52,4.48,10,10,10s10-4.48,10-10C22,6.48,17.52,2,12,2z M19.46,9.12l-2.78,1.15 c-0.51-1.36-1.58-2.44-2.95-2.94l1.15-2.78C16.98,5.35,18.65,7.02,19.46,9.12z M12,15c-1.66,0-3-1.34-3-3s1.34-3,3-3s3,1.34,3,3 S13.66,15,12,15z M9.13,4.54l1.17,2.78c-1.38,0.5-2.47,1.59-2.98,2.97L4.54,9.13C5.35,7.02,7.02,5.35,9.13,4.54z M4.54,14.87 l2.78-1.15c0.51,1.38,1.59,2.46,2.97,2.96l-1.17,2.78C7.02,18.65,5.35,16.98,4.54,14.87z M14.88,19.46l-1.15-2.78 c1.37-0.51,2.45-1.59,2.95-2.97l2.78,1.17C18.65,16.98,16.98,18.65,14.88,19.46z"/></g></svg>

                        <h2 class="mt-3">Support</h2>
                        <p style="color: #FFFFFF99; font-size: 18px;">Rest assured, we will support you without fail. Our dedicated customer service team is available 24 hours a day, 7 days a week to help you with any questions or problems you may have
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #060b14; border-radius: 15px;" class="card">
                    <div class="card-body">
                        
<svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 0 24 24" width="40px" fill="#246bf4"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M22 9.24l-7.19-.62L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21 12 17.27 18.18 21l-1.63-7.03L22 9.24zM12 15.4l-3.76 2.27 1-4.28-3.32-2.88 4.38-.38L12 6.1l1.71 4.04 4.38.38-3.32 2.88 1 4.28L12 15.4z"/></svg>
                        <h2 class="mt-3">Guarantees</h2>
                        <p style="color: #FFFFFF99; font-size: 18px;">Your satisfaction is guaranteed. We stand behind the quality of our software, offering a satisfaction guarantee. If the cheat doesn't work on your pc, our refund policy ensures you're taken care of.

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div style="background-color: #060b14; border-radius: 15px;" class="card">
                    <div class="card-body">
                        
<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="40px" viewBox="0 0 24 24" width="40px" fill="#246bf4"><g><rect fill="none" height="24" width="24"/></g><g><g><path d="M19.03,3.56c-1.67-1.39-3.74-2.3-6.03-2.51v2.01c1.73,0.19,3.31,0.88,4.61,1.92L19.03,3.56z"/><path d="M11,3.06V1.05C8.71,1.25,6.64,2.17,4.97,3.56l1.42,1.42C7.69,3.94,9.27,3.25,11,3.06z"/><path d="M4.98,6.39L3.56,4.97C2.17,6.64,1.26,8.71,1.05,11h2.01C3.25,9.27,3.94,7.69,4.98,6.39z"/><path d="M20.94,11h2.01c-0.21-2.29-1.12-4.36-2.51-6.03l-1.42,1.42C20.06,7.69,20.75,9.27,20.94,11z"/><polygon points="7,12 10.44,13.56 12,17 13.56,13.56 17,12 13.56,10.44 12,7 10.44,10.44"/><path d="M12,21c-3.11,0-5.85-1.59-7.46-4H7v-2H1v6h2v-2.7c1.99,2.84,5.27,4.7,9,4.7c4.87,0,9-3.17,10.44-7.56l-1.96-0.45 C19.25,18.48,15.92,21,12,21z"/></g></g></svg>
                        <h2 class="mt-3">Updates</h2>
                        <p style="color: #FFFFFF99; font-size: 18px;">Expect constant improvement and content. Our software receives regular updates that enhance features, introduce content and maps, and address any bugs for a smoother experience.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <center>
            <h2 style="margin-top: 50px;" class="fw-bold lh-1 mb-3">Reviews</h2>
            <p style="color: #9b9da1; font-size: 27px;">Reviews copied from our server in Discord</p>
        </center>
       
        <div class="col-md-4">
         <center>
         <?php
         $total = DB::query('SELECT COUNT(*) FROM reviews WHERE rewed=1 ORDER BY id DESC')[0]['COUNT(*)'];
         $totalg = DB::query('SELECT COUNT(*) FROM reviews WHERE type=1 AND rewed=1 ORDER BY id DESC', array(':t'=>'1_a'))[0]['COUNT(*)'];
          $totalb = DB::query('SELECT COUNT(*) FROM reviews WHERE type=2 AND rewed=1 ORDER BY id DESC', array(':t'=>'2_a'))[0]['COUNT(*)'];
          ?>
            <p style="color: #FFFFFFA6; text-align: left; font-size: 20px; <?php if (isLoggedIn()) { ?> padding-top: 11px; <?php } ?>"><b><img src="/static/img/staric.png" width="20" style="margin-right: 5px;">Total:</b> <?=$total?><br></p>
        </center>
        </div>
        <?php if (isLoggedIn()) { ?>
        <center style="margin-top: -54px;"><button data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="createpost" class="loginbtn mt-2 mb-3">Add review</button></center>
        <?php } ?>
        <div class="row">
        <div class="col-md-4">
         
        </div>
        <div class="col-md-4">
        </div>
        
         </div>
        <div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="reviews" method="post">
                            <?php
                            if (!isLoggedIn()) {
                                echo '<div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nickname</label>
                <input style="background-color: #060b14; border-color: #1a253b; color: #8da2b8; color: #fff;" type="text" name="title" class="form-control" id="exampleFormControlInput1">
              </div>';
                            } ?>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                <textarea type="text" name="text" class="form-control" id="exampleFormControlInput1"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Type</label>
                                <select style="background-color: #060b14; border-color: #1a253b; color: #8da2b8; box-shadow: none;" name="type" class="form-select" aria-label="Default select example">
                                    <option value="1">Positive</option>
                                    <option value="2">Negative</option>
                                </select>
                            </div>
                            <script src="https://www.google.com/recaptcha/api.js"></script>

                            <div class="mt-3 mb-3">
                                <div class="g-recaptcha" data-sitekey="6Lft_vEcAAAAAGTgU9L2BtV0j-CAzFD37p3E1wRs"></div>
                            </div>

                            <div class="mb-3">
                                <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="createpost" class="loginbtn">Create</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
<style>

    </style>
                    <div class="" style="grid-auto-flow: dense; /* Важное свойство */" id="reviewsb">
                    <?php
                    $reviews = DB::query('SELECT * FROM reviews WHERE rewed=1 ORDER BY id DESC LIMIT 8');
            $start = 8;
            $style = '';
           foreach ($reviews as $r) {
               $start++;
                if ($r['type'] === '1_a' || $r['type'] === '2_a') {
                    $date = $r['date'];
                } else {
                    
                    $date = gmdate("Y-m-d", $r['date']);
                }
                if ($r['type'] === '1' || $r['type'] === '1_a') {
                    $img = 'good';
                    $color = '#1456ff;';
                } else {
                    $img = 'bad';
                    $color = '#ff002e;';
                }
            if ((int)$r['fromdiscord'] === 0) {
                echo '
                <div style="text-align: start; background-color: #060b14; border-radius: 15px;" class="card mb-3">
            <div class="card-body">
            
                <img src="/static/img/'.$img.'.png" style="object-fit: cover; width: 45px; height: 45px; border-radius: 150px; margin-top: -33px;" class="fill-current mp-5 imgav' . $p['id'] . '" onerror="imgError(this);">
                <h5 style="margin-bottom: -0px; margin-left: 4px; color: '.$color.';" href="testings" class="col-md-10 ml-3  d-inline-block font-weight-bold">'.$r['title'].'
                
                    <br><p href="testings" style="font-size: 15px; font-weight: 500; margin-top: -45px;" class="col-md-10 d-inline-block font-weight-bold">'.$date.'</p></h5>
             
                <p href="testings" style="color: #9b9da1; font-size: 20px;" class="col-10 d-inline-block font-weight-bold">'.$r['text'].'</p>
               

                </div></div>';
            } else if (time() <= $date + 47580 || (int)$r['rewed'] === 1) {
                 echo '
                <div style="text-align: start; background-color: #060b14; border-radius: 15px;" class="card mb-3">
            <div class="card-body">
            <div class="col" style="display: inline-block;     float: right;">
        

        <a onclick="createModal(`https://discord.com/channels/964252124076716092/1076842734083641434/'.$r['dsid'].'`, `'.$r['dsid'].'`); return false;" id="dropdownMenuLink" href="https://discord.com/channels/964252124076716092/1076842734083641434/'.$r['dsid'].'" style="float: left; color: #8F8F8F;" class="dropdown-item gap-2 d-flex align-items-center nav__link">Original Message<i style="color: #8F8F8F; font-size: 22px; margin-left: 4.5px;" class="bx bx-link-external nav__icon"></i><span class="nav__namec ml-3"></span></a>

            
        </div>
        <div class="col-md-10">
                <img src="/static/img/'.$img.'.png" style="object-fit: cover; width: 45px; height: 45px; border-radius: 150px; margin-top: -33px;" class="fill-current mp-5 imgav' . $p['id'] . '" onerror="imgError(this);">
                <h5 style="margin-bottom: -0px; margin-left: 4px; color: '.$color.';" href="testings" class="col-md-10 ml-3  d-inline-block font-weight-bold">'.$r['title'].'
                
                    <br><p href="testings" style="font-size: 15px; font-weight: 500; margin-top: -45px;" class="col-md-10 d-inline-block font-weight-bold">'.$date.'</p></h5>
             </div>
                <p href="testings" style="color: #9b9da1; font-size: 20px;" class="col-12 d-inline-block font-weight-bold">'.$r['text'].'</p>
               

                </div></div>';
            } } ?>
                       

                    
                    
        
    </div>
<script>
var start = 8;
function load() {
 $.ajax({

                                        type: "GET",
                                        url: "/api/LoadReviews?start=" + start,
                                        processData: false,
                                        async: true,
                                        data: '',
                                        success: function(r) {
                                            $('#reviewsb').append(r)



                                            start += 8;

                                            working = false;


                                        },
                                        error: function(r) {
                                            console.log(r)
                                        }

                                    });}
                                    </script>
    <center style="margin-top: 25px;"><button onclick="load()" name="createpost" class="loginbtn mt-2 mb-3">Load more</button></center>



    </div>

    <script type="module">
        import Swiper from 'https://unpkg.com/swiper@7/swiper-bundle.esm.browser.min.js'

        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
           
        });
    </script>
    <style>
        .footer {
            border-top: 0 solid #000;
        }

        .footer {
            border-top: 0.1px solid #2d303f;
        }

        .footer {
            padding-top: 0;
        }

        .footer {
            margin: 0 auto;
            padding: 28px 0 46px;
        }

        .footer__container {
            position: relative;
        }

        .footer__container {
            border-top: 1px solid #1E2028;
        }

        .footer__container {
            border-top: 0 solid #000;
        }

        .footer__container {
            padding-top: 50px;
        }

        .footer__container,
        .footer__wrap {
            display: flex;
            align-items: center;
        }

        .footer__container {
            max-width: 1320px;
            justify-content: space-between;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer__link:last-of-type {
            max-width: 200px;
            display: inline-block;
        }

        .footer__link:last-of-type {
            margin: 0;
        }

        .footer__link {
            text-decoration: none;
        }

        .footer__link {
            transition: 0.4s linear;
            margin: 0 16px 0 0;
        }

        @media screen and (max-width: 775px) {
            .footer__developer {
                font-size: 12px;
                line-height: 14px;
            }
        }

        .footer__developer {
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 19px;
            letter-spacing: 0.02em;
            color: #8e91a7;
            margin: 0;
            cursor: pointer;
        }
    </style>
 <section style="background: none;" class="footer"><a class="d-flex instructionRun" href="javascript:void(0);">
        </a>
        <div class="footer__container"><a class="d-flex instructionRun" href="javascript:void(0);">
                <img src="./index_files/logogray.png" width="40" alt="">
            </a><a  href="/privacy-policy" class="footer__developer">Privacy Policy

                </a>
                <a href="/refund-policy" class="footer__developer">Refund Policy

                </a>
                <p class="footer__developer">Aworex © 2024 • <a class="footer__developer" href="/terms">Terms</a></p>

                </a>
                <a href="/support" class="footer__developer">Contact Us

                </a>
            <div class="footer_dev"><a class="d-flex instructionRun" href="javascript:void(0);">
                </a>
                <a href="/blog" class="footer__developer">Blog

                </a>
            </div>
            <div class="footer__wrap">
                <a class="footer__link" href="https://discord.gg/aworex" target="_blank">
                    <svg class="footer__image" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path class="footer__link" d="M18.2601 6.592C17.0866 6.08067 15.8404 5.708 14.5396 5.5C14.3759 5.76867 14.194 6.13266 14.0666 6.41867C12.6831 6.228 11.3095 6.228 9.94504 6.41867C9.81769 6.13266 9.62666 5.76867 9.47201 5.5C8.16216 5.708 6.91595 6.08067 5.7507 6.592C3.39474 9.90265 2.758 13.1353 3.07637 16.3246C4.64094 17.4079 6.15096 18.0666 7.63458 18.5C7.99844 18.032 8.32591 17.5293 8.6079 17.0007C8.07121 16.81 7.56181 16.576 7.07061 16.2986C7.19796 16.212 7.32531 16.1167 7.44356 16.0213C10.409 17.3127 13.6209 17.3127 16.5499 16.0213C16.6773 16.1167 16.7955 16.212 16.9229 16.2986C16.4317 16.576 15.9223 16.81 15.3856 17.0007C15.6676 17.5293 15.9951 18.032 16.3589 18.5C17.8416 18.0666 19.3607 17.4079 20.9171 16.3246C21.3082 12.6327 20.2976 9.42602 18.2601 6.592ZM9.01723 14.3573C8.12577 14.3573 7.39806 13.586 7.39806 12.6413C7.39806 11.6967 8.10758 10.9253 9.01723 10.9253C9.91775 10.9253 10.6545 11.6967 10.6363 12.6413C10.6363 13.586 9.91775 14.3573 9.01723 14.3573ZM14.9945 14.3573C14.103 14.3573 13.3744 13.586 13.3744 12.6413C13.3744 11.6967 14.0848 10.9253 14.9945 10.9253C15.895 10.9253 16.6318 11.6967 16.6136 12.6413C16.6136 13.586 15.9041 14.3573 14.9945 14.3573Z" fill="#C2C6D7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>
</body>

</html>