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
    },
    watch: {
        '$route'(to) {
            if(to.name == "Show") this.transitionName = "slide-fade";
            else this.transitionName = "";
        } 
    }
}
</script>

<style>
    #app {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: white;
        background-color: #303030;
    }

    .fade-enter, .fade-leave-to {
        opacity: 0;
        transform: translateX(-2em);
    }

    .fade-enter-active, .fade-leave-active {
        transition: all .3s ease-in-out;
    }
</style>
