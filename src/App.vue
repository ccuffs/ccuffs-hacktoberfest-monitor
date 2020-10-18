<template>
    <div id="app">
        <div class="px-8 pt-8">
            <div class="d-lg-flex flex-wrap justify-content-center"
            >
                <template 
                    v-for="owner in owners"
                >
                    <Repository
                        v-for="repo in owner.repos"
                        :key="repo.name"
                        :name="repo.name"
                        :owner="owner.name"
                        :image="repo.image"
                    />

                    <input type="hidden" :key="owner.name">
                </template>
            </div>
        </div>
        <TheFooter/>
    </div>
</template>

<script>

import Owners from './data/owners'
import Repository from './components/Repository'

export default {
    name: 'App',
    data(){
        return {}     
    },
    components: {
        Repository
    },
    computed: {
        owners(){
            return Owners;
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

.justify-content-center {
    justify-content: center;
}

.orange {
    color: #ff9900;
}
</style>
