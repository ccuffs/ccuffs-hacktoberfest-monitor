<template>
    <div class="repository col-lg-4 col-12 mb-4 mr-4 border" @click="showRepo">
        <div class="p-4">
            <div class="col-12">
                <img :src="imagePath" alt="image" class="repository__image">
            </div>
            <div class="pt-5">
                <div class="left">
                    <h2 class="orange">
                        {{ name.toUpperCase() }}
                    </h2>
                </div>
                <div class="description">
                    <div class="left">
                        {{ repoInfo.description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';

export default {
    name: 'Repository',

    data(){
        return {
            imagePath: require(`@/assets/images/${this.image}`),
            repoInfo: Object
        }
    },

    props: {
        name: {
            type: String,
            required: true
        },
        owner: {
            type: String,
            required: true
        },
        image: {
            type: String,
            required: true
        },
        baseUrl: {
            type: String,
            required: false,
            default: 'https://api.github.com/repos'
        }
    },

    methods: {
        showRepo(){
            let routeOptions = {
                name: 'Show',
                params: { 
                    name: this.name,
                    owner: this.owner
                }
            }
            this.$router.push(routeOptions);
        },

        fetchRepoDescription(){
            axios.get(`${this.baseUrl}/${this.owner}/${this.name}`)
            .then(response => {
                this.repoInfo = response.data;
            })
            .catch(err => {
                console.log(err);
            });
        }
    },

    mounted(){
        this.fetchRepoDescription();
    }
}
</script>

<style>
    .repository {
        background-color: #4c4c4c;
        min-height: 255px;
    }

    .repository:hover {
        transform: scale(1.02);
        cursor: pointer;
    }

    .repository__image{
        width: inherit;
    }

    .left {
        text-align: left;
    }
</style>