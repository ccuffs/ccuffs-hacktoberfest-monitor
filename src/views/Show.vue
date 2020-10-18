<template>
    <div class="container-lg clearfix pt-4">
        <div class="repository-info px-4">
            <h1>
                {{ repoName }}
            </h1>
        </div>
        <TheFooter/>
    </div>
</template>

<script>
export default {
    name: 'ShowRepository',
    data(){
        return {
            repoName: String
        }
    },
    mounted(){
        this.repoName = this.$route.params.name;
    }
}
</script>

<style>
    .repository-info{
        height: 90vh;
        background-color: #4c4c4c;
    }
</style>