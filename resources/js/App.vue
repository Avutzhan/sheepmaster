<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><i class="fad fa-sheep fa-3x"></i></a>

            <ul class="navbar-nav">
                <li class="nav-item active">
                    <router-link to="/" class="nav-link">Corrals</router-link>
                </li>
                <li class="nav-item">
                    <router-link to="/reports" class="nav-link">Reports</router-link>
                </li>
            </ul>
        </nav>

        <transition name="fade">
            <router-view></router-view>
        </transition>
    </div>
</template>

<style>
    .container {
        margin-top: 1rem;
    }
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s
    }
    .fade-enter, .fade-leave-active {
        opacity: 0
    }
</style>
