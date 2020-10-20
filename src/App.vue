<template>
    <div id="app">
        <transition name="fade" mode="out-in">
            <router-view/>
        </transition>   
    </div>
</template>

<script>

export default {
    name: 'App',
    data(){
        return {}
    }
}
</script>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;1,100&display=swap");

    #app {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: white;
        background-color: #303030;
        font-family: 'Roboto', sans-serif;
    }

    .bg-secondary {
        background-color: #4c4c4c;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
        transform: translateX(-2em);
    }

    .fade-enter-active, .fade-leave-active {
        transition: all .3s ease-in-out;
    }
</style>
