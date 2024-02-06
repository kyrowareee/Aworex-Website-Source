<?php
session_start();
require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
require $_SERVER['DOCUMENT_ROOT'] . "/classes/DB.php";
include($_SERVER['DOCUMENT_ROOT'] . '/classes/Auth.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js" type="text/javascript"></script>
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
</style>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aworex</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="/static/fonts/tt/stylesheet.css" rel="stylesheet">
  <link href="/static/fonts/sfpro/stylesheet.css" rel="stylesheet">
  <link href="/root.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
    crossorigin="anonymous"></script>
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
  <link rel="icon" type="image/x-icon" href="/static/img/logo.png">
  <script async="" src="https://mc.yandex.ru/metrika/tag.js"></script><script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
</head>

<body style="
background-image: url('/static/img/bckfl.png') !important;
background-repeat: no-repeat; background-size: cover; ">

<?php
require $_SERVER['DOCUMENT_ROOT']."/classes/Navbar.php";

if ($_SESSION['val'] === 'eu') {
    $ad = '5.49';
    $bd = '24.99';
    $cd = '74.99';
    $lf = '164.99';
    $valic = '€';
} else {
    $ad = '3';
    $bd = '15';
    $cd = '50';
    $lf = '179';
    $valic = '$';
}
?>
    <div class=" container col-xxl-8 px-4 py-5">
  <div class="row align-items-center g-5 py-5">
    
    <div class="col-lg-6">
        <p style="font-size: 17px;"><b style="color: #86FF0D; font-weight: 400; margin-left: 20px;">
            <svg style="margin-right: 7px;" width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="5" cy="5" r="5" fill="#86FF0D"/> Undetected
            </svg>
             Undetected</b></p>
      <h1 style="color: #fff !important; font-size: 75px;" class="fw-bold text-body-emphasis lh-1 mb-3"><img style="margin-right: 10px;" width="60" src="/static/img/flic.png">Fortnite</h1>
      <p style="font-size: 20px; color: #aca6a7; margin-top: 20px; margin-bottom: 20px;">Welcome to Aworex – Your Ultimate Farlight Mastery!<br><br>

Aworex is the ultimate cheat designed to master your Farlight gaming experience. Dive into the world of Farlight with confidence, knowing that Aworex offers unparalleled enhancements. Our advanced features are fortified by robust security measures, ensuring you can excel in the game without worries. Join our community and conquer Farlight like never before with Aworex.</p>
      <div class="d-grid d-flex justify-content-md-start mt-2">
        <a href="/freetrial" class="loginbtn">Apply for free trial</a>
        <p class="px-4" style="color: #246bf4; font-size: 22px; padding-top: 12px;">3 hours</p>
      </div>
    </div>
    <div class="col-10 col-sm-8 col-lg-6">
        <video style="width: 100% !important; margin-top: 30px;" src="/static/farlight.mp4" class="d-block imgFullItem" controls="" autoplay="" muted=""></video>
    </div>
  </div>
  </div>
  <div class="container col-xxl-8">
    <center><h1 style="color: #fff !important; font-size: 75px;" class="fw-bold text-body-emphasis lh-1 mb-3">Functions</h1></center>
  </div>
  <div class="container col-xxl-8">
    <div class="row">
<div class="col-lg-4">
          <div class="row">
           <center> <h4><b>ESP</b></h4></center>
            <div class="accordion" id="accordionExample">
            <div  style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button style="background-color: #020b1c; color: #246bf4" class="accordion-button bbt" type="button">
              <b>Skeleton</b> 
                </button>
              </h2>
              <div style="background-color: #020b1c;" id="collapseOne" class="accordion-collapse  show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                   will draw a line under your opponent's body, just showing you a skeleton shape
                </div>
              </div>
            </div>
            <div  style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnet">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button" >
                <b>Head</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnet" class="accordion-collapse  show" aria-labelledby="headingOnet" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                     will draw a circle around the head of the characters/their opponents
                  </div>
                </div>
              </div>
              <div  style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnett">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button" type="button">
                <b>Box</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnett" class="accordion-collapse  show" aria-labelledby="headingOnett" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                   will draw a box around the body of the characters/their opponents
                  </div>
                </div>
              </div>

              <div  style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnett">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button" type="button">
                <b>Distance</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnett" class="accordion-collapse  show" aria-labelledby="headingOnett" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                     allows you to get the distance of your opponent
                  </div>
                </div>
              </div>
            
              <div  style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnett">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button" type="button">
                <b>Line</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnett" class="accordion-collapse  show" aria-labelledby="headingOnett" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                      will draw a line connected to all characters/their opponents, which can be changed to 3 positions on the screen
                  </div>
                </div>
              </div>
            

          </div>
          </div>
      </div>
      <div class="col-lg-4 container">
      <center><h4><b>AIM</b></h4></center>
        <div class="accordion" id="accordionExample">
            
            <div style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnet">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button">
                <b>Aimbot</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnet" class="accordion-collapse  show" aria-labelledby="headingOnet" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                     enable to have AIM settings
                  </div>
                </div>
              </div>
             
              <div style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnettt">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button" type="button">
                <b>ComboBox key</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnettt" class="accordion-collapse  show" aria-labelledby="headingOnettt" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                    allows you to choose the key you want to make your Aim work
                  </div>
                </div>
              </div>
             
              <div style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnettt">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button" type="button">
                <b>Smooth</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnettt" class="accordion-collapse  show" aria-labelledby="headingOnettt" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                      Aim speed, the higher its value, the more legit it will be
                  </div>
                </div>
              </div>
             
              <div style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnettt">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button" type="button">
                <b>Fov AIM</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnettt" class="accordion-collapse  show" aria-labelledby="headingOnettt" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                     enable to have FOV AIM settings
                  </div>
                </div>
              </div>
              <div style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
                <h2 class="accordion-header" id="headingOnettt">
                  <div style="background-color: #020b1c; color: #246bf4" class="accordion-button" type="button">
                <b>Sliderbar FOV</b> 
                  </div>
                </h2>
                <div style="background-color: #020b1c;" id="collapseOnettt" class="accordion-collapse  show" aria-labelledby="headingOnettt" data-bs-parent="#accordionExample">
                  <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                       will determine the size of the capture circle for enemies, so the smaller the more legit it will be
                  </div>
                </div>
              </div>
              
              

          </div>
          
          
      </div>
      <div class="col-lg-4 container">
      <center><h4><b>MISC</b></h4></center>
        <div class="accordion" id="accordionExample">
            <div  style="border-color: #020b1c; margin-bottom: 15px; border-radius: 15px;" class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button style="background-color: #020b1c; color: #246bf4" class="accordion-button" type="button">
              <b>No Recoil</b> 
                </button>
              </h2>
              <div style="background-color: #020b1c;" id="collapseOne" class="accordion-collapse  show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div style="color: #afa6a8; margin-top: -20px;" class="accordion-body">
                   control recoil in all weapons
                </div>
              </div>
            </div>
            
            
              
              

          </div>
          
          
      </div>
    </div>
    </div>
    <div class=" container col-xxl-8">
  <div class="row align-items-center">
    <div class="col-lg-6">
    <div class="d-grid d-md-flex justify-content-md-start mt-2">
            <div class="col d-flex align-items-start mt-3">
                <div class="d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                  <img style="margin-top: 13px;" width="50" src="/static/img/windows-10.png" alt="">
                </div>
                <div style="padding-top: 15px;">
                  <h6 style="color: #fff;">Supported Systems</h6>
                  <h6 style="color: #6B6B6B;">Windows 10 | Windows 11</h6>
                </div>
              </div>
              <div class="col d-flex align-items-start mt-3">
                <div class="d-inline-flex align-items-center justify-content-center fs-4 flex-shrink-0 me-3">
                  <img style="margin-top: 13px;" width="50" src="/static/img/processor.png" alt="">
                </div>
                <div style="padding-top: 15px;">
                  <h6 style="color: #fff;">Supported Processors</h6>
                  <h6 style="color: #6B6B6B;">Intel | AMD</h6>
                </div>
              </div>
          </div></div></div></div>
    <div class="mt-5 colch container col-md-12">
        <h1 style="color: #fff !important;" class="fw-bold text-body-emphasis lh-1 mb-3 chtsb">Cheat subscription<br>plans</h1>
                <div class="d-md-flex mt-2" style=" justify-content: center !important;padding-top: 30px;
                ">
                    <a href="/my/login" class="nav__link"><a id="btn1" onclick="changePrice('btn1', '5')" class="buybtn btnbuypage">1 day</a></a>
                    <a style="margin-left: 5px;" href="/my/login" class="nav__link"><a id="btn2" onclick="changePrice('btn2', '30')" class="loginbtn btnbuypage">7 days</a></a>
                    <a style="margin-left: 5px;" href="/my/login" class="nav__link"><a id="btn3" onclick="changePrice('btn3', '80')"class="buybtn btnbuypage">30 days</a></a>
                  </div>
                  <div style="justify-content: center !important; margin: auto; padding-top: 30px; margin-bottom: 50px;" class="row">
                    <div class="col-md-3 mb-3">
                        <div style="background-color: #020b1c; border-color: #020b1c; border-radius: 22px;" class="card">
                            <div class="card-body">
                                <center><h5>Price</h5>
                                    <h1 id="price"><b style="color: #246bf4; font-weight: 500;"><?=$valic?></b><?=$bd?></h1>
                                    <a style="margin-left: 15px;" href="/my/login" class="nav__link"><a href="/my/buy?id=cheat3" id="btnbuy" class="loginbtn">Buy</a></a></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div style="background-color: #020b1c; border-color: #020b1c; border-radius: 22px;" class="card">
                            <div class="card-body">
                                <center><h5>How to buy</h5>
                                    <p style="color: #FFFFFFA6;">1. Register or log in<br>
                                        2. Choose your tariff plan<br>
                                        3. You will be redirect to the payment page, you will need to pay.<br>
                                        4. After successful payment you will get cheat</p></center>
                            </div>
                        </div>
                    </div>
                  </div>
      </div>
    
</div>

<script>


  function changePrice(btnid, price) {
      if (btnid === 'btn1') {
        document.getElementById(btnid).classList.add("loginbtn");
        document.getElementById(btnid).classList.remove("buybtn");

        document.getElementById('btn2').classList.remove("loginbtn");
        document.getElementById('btn2').classList.add("buybtn");

        document.getElementById('btn3').classList.remove("loginbtn");
        document.getElementById('btn3').classList.add("buybtn");



        document.getElementById('price').innerHTML = '<b style="color: #246bf4; font-weight: 500;"><?=$valic?></b><?=$ad?>';
        document.getElementById('btnbuy').setAttribute("href", "/my/buy?id=frl1");
      }

      if (btnid === 'btn2') {
        document.getElementById(btnid).classList.add("loginbtn");
        document.getElementById(btnid).classList.remove("buybtn");

        document.getElementById('btn1').classList.remove("loginbtn");
        document.getElementById('btn1').classList.add("buybtn");

        document.getElementById('btn3').classList.remove("loginbtn");
        document.getElementById('btn3').classList.add("buybtn");



        document.getElementById('price').innerHTML = '<b style="color: #246bf4; font-weight: 500;"><?=$valic?></b><?=$bd?>';
        document.getElementById('btnbuy').setAttribute("href", "/my/buy?id=frl2");
      }

      if (btnid === 'btn3') {
        document.getElementById(btnid).classList.add("loginbtn");
        document.getElementById(btnid).classList.remove("buybtn");

        document.getElementById('btn1').classList.remove("loginbtn");
        document.getElementById('btn1').classList.add("buybtn");

        document.getElementById('btn2').classList.remove("loginbtn");
        document.getElementById('btn2').classList.add("buybtn");


        document.getElementById('price').innerHTML = '<b style="color: #246bf4; font-weight: 500;"><?=$valic?></b><?=$cd?>';
        document.getElementById('btnbuy').setAttribute("href", "/my/buy?id=frl3");
      }



  

      
      
      
    
    

    
    
  }
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
.footer__container, .footer__wrap {
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
			</a>
			<div class="footer_dev"><a class="d-flex instructionRun" href="javascript:void(0);">
				</a>
					<p class="footer__developer">Aworex © 2023 • <a class="footer__developer" href="/terms">Terms</a></p>
         
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