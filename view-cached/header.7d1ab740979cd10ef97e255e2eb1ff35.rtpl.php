<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/dist/main.bundle.css">

</head>
<body>
    <nav class="uk-navbar-container uk-margin" uk-navbar="mode: click">
        <div class="uk-navbar-left">
            <div class="uk-navbar-item uk-link-nav uk-logo">LibMeta <img src="/src/img/logo.png" width="80" alt="logo"></div>
        </div>
        <div class="uk-navbar-right">
            <ul class="uk-navbar-nav">
                <li>
                    <a class="uk-link-nav" href="" >Lançamentos<span uk-icon="icon: chevron-down"></span></a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a onclick="reservado()" href="#">Reservar</a></li>
                            <li><a href="#">Emprestar</a></li>
                            <li><a href="#">Devolver</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a class="uk-link-nav" href="">Cadastros<span uk-icon="icon: chevron-down"></span></a>
                    <div class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-navbar-dropdown-nav">
                            <li><a href="#">Livros</a></li>
                            <li><a href="#">Alunos</a></li>
                            <li><a href="#">Usuários</a></li>
                        </ul>
                    </div>
                </li>
                <li><a class="uk-link-nav" href="">Ajuda</a></li>                
            </ul>
        </div>
    </nav>
    <div class="uk-container">