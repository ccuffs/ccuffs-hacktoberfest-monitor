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
                <div class="contributions">
                    <h4 class="left light-orange">
                        Soon!!
                    </h4>
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
            issues: String,
            pullRequests: String,
            commits: String
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
        currentYear: {
            type: Number,
            default: new Date().getFullYear()
        }
    },

    methods: {
        showRepo(){
            let routeOptions = {
                name: 'Show',
                params: { 
                    name: this.name,
                    owner: this.owner,
                    currentYear: this.currentYear,
                    issues: this.issues
                }
            }
            this.$router.push(routeOptions);
        },

        fetchContributions(){
            let baseUrl = `https://api.github.com/repos/${this.owner}/${this.name}`;
            
            axios.get(`${baseUrl}/issues?since=${this.currentYear}-10-01`)
            .catch((err)=> {
                console.log(err);
            })
            .then((response)=> {
                this.issues = response;
            });
        }
    },

    created(){
        this.fetchContributions();
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