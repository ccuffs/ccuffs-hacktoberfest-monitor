<template>
  <div id="app">
    <div 
        v-for="owner in owners"
        :key="owner.name"
    >
        <h1>
            {{ owner.name }}
        </h1>
        <div v-for="repo in owner.repos"
            :key="repo"
        >
            <h2>
                {{ repo }}
            </h2>
        </div>
    </div>
  </div>
</template>

<script>

import Owners from './data/owners';

export default {
    name: 'App',
    data(){
        return {}     
    },
    components: {
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
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: white;
  background-color: #183d5d;
  margin-top: 60px;
}
</style>
