<template>
    <div>
        <div class="px-4 pt-4">
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

import Owners from '@/data/owners'
import Repository from '@/components/Repository'

export default {
    name: 'Index',
    components: {
        Repository
    },
    computed: {
        owners(){
            return Owners
        }
    }
}
</script>

<style>
    .repository:last-of-type {
        margin-bottom: 0 !important;
    }

    .justify-content-center {
        justify-content: center;
    }

    .orange {
        color: #ff9900;
    }

    .light-orange {
        color: #ffab40;
    }
</style>

