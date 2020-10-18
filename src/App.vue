<template>
    <div id="app">
        <div class="p-8">
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
        <footer>
            <div class="p-4">
                Ícones feitos por <a href="https://www.flaticon.com/br/autores/smashicons" title="Smashicons">Smashicons</a> from <a href="https://www.flaticon.com/br/" title="Flaticon"> www.flaticon.com</a>
            </div>
        </footer>
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
